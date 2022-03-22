<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\CompanyDetails;
use App\Models\JobMaster;
use App\Models\JobManagement;
use App\Models\categories;
use App\Models\JobTypeMaster;
use App\Models\JobSubType;
use App\Models\JobExperiance;
use App\Models\JobSalary;
use App\Models\Cities;
use App\Models\State;
use App\Models\JobIndustry;
use App\Models\JobFunctionalArea;
use App\Models\JobShift;
use App\Models\JobEducation;
use App\Models\JobPaymentMaster;
use App\Models\Slider;
use App\Models\Plan;
use App\Models\ApplicantPersonalDetails;
use App\Models\ApplicantEducationalDetails;
use App\Models\ApplicantDocuments;
use App\Models\ApplicantSocialMedia;
use App\Models\ApplicantWorkHistory;
use App\Models\BlogsMaster;
use App\Models\ApplicantPlans;
use App\Models\EmployerPlans;
use App\Models\PlanManagement;
use App\Models\FavouriteJobs;
use App\Models\PersonalDetails;
use App\Models\ManagePages;

class HomeController extends Controller
{
    public function insertSlider(Request $request)
    {
        $slider = new  Slider();
        $banner_image = $request->banner_image->store('public/sliders');
        $slider->banner_image = $banner_image;
        $slider->save();
        return 'Added successfully';
    }
    
    public function getDashboardData($id)
    {
        $user =  User::where(['uid' => $id])->get();
        $company =  CompanyDetails::where(['user_id' => $id])->get();
        
        $company_id = $company[0]->id;

        $live_jobs =  JobMaster::where(['user_id' => $id, 'job_status' => 'Live', 'status' => 1])->count();
        $closed_jobs =  JobMaster::where(['user_id' => $id, 'job_status' => 'Close', 'status' => 1])->count();

        $underreview_jobs =  JobManagement::where(['company_id' => $company_id, 'job_status' => 'under_review'])->count();
        $candidates_jobs =  JobManagement::where(['company_id' => $company_id, 'job_status' => 'shortlist'])->distinct('user_id')->count();
        $hired_jobs =  JobManagement::where(['company_id' => $company_id, 'job_status' => 'hired'])->count();
        
        $latest_appplicants =  JobManagement::select(
            'job_management.*',
            'job_management.created_at as job_apply_date',
            'applicant_personal_details.desired_location',
            'applicant_personal_details.full_name',
            'applicant_personal_details.profile_image',
            'job_masters.job_title',
            'users.*'
        )
            ->leftjoin('users', 'users.uid', '=', 'job_management.user_id')
            ->leftjoin('job_masters', 'job_masters.id', '=', 'job_management.job_id')
            ->leftjoin('applicant_personal_details', 'applicant_personal_details.user_id', '=', 'job_management.user_id')
            ->where(['job_management.company_id' => $company_id])
            ->get()->take(10);
            
        // $latest_appplicants =  JobManagement::select('job_management.*,users.*,')
        //                     ->where(['company_id' => $company_id])
        //                     ->leftjoin('users', 'users.id', '=', 'job_management.user_id')
        //                     ->orderBy('job_management.id','desc')
        //                         ->get()->take(10);

        return response()->json(["user"=>$user, "live_jobs"=>$live_jobs, "closed_jobs"=>$closed_jobs, "underreview_jobs"=>$underreview_jobs, "candidates_jobs"=>$candidates_jobs, "hired_jobs"=>$hired_jobs, "latest_appplicants"=>$latest_appplicants]);
    }

    public function getPageData($id)
    {
        $page =  ManagePages::where(['id' => $id])->first();
        
        return $page;
    }


    public function getUserDashboardData($id)
    {
        $allData = [];
        $allData['categories'] =  categories::all();
        $allData['banner_images'] =  Slider::all();
        
        $user_id = $id;
        
        $userData_count =  ApplicantPersonalDetails::where(['user_id' => $user_id])->count();

        $education_count =  ApplicantEducationalDetails::where(['user_id' => $user_id])->count();

        $work_count =  ApplicantWorkHistory::where(['user_id' => $user_id])->count();

        $media_count =  ApplicantSocialMedia::where(['user_id' => $user_id])->count();
        
        $document_count =  ApplicantDocuments::where(['user_id' => $user_id])->count();
        
        $userData = 0;
        $education = 0;
        $work = 0;
        $media = 0;
        $document = 0;

        $userData_check = false;
        $education_check = false;
        $work_check = false;
        $media_check = false;
        $document_check = false;

        if($userData_count >= 1){
            $userData = 20;
            $userData_check = true;
        }

        if($document_count >= 1){
            $document = 20;
            $document_check = true;
        }
        
        if($education_count >= 1){
            $education = 20;
            $education_check = true;
        }
        
        if($work_count >= 1){
            $work = 20;
            $work_check = true;
        }
        
        if($media_count >= 1){
            $media = 20;
            $media_check = true;
        }
    
        $allData['profile_percent'] = $userData + $education + $work + $media + $document;
        
                
        $jobsFav = FavouriteJobs::where(['favourite_jobs.user_id' => $user_id])->get();
        
        $jobs_array = [];
        
        foreach ($jobsFav as $key => $job) {
            $jobs_array[$key] = $job->job_id;
        }
        
        $Jobs =  JobMaster::select('job_masters.*','company_details.company_name','personal_details.full_name','personal_details.contact_number as employer_contact_number','personal_details.email as employer_email')
                ->leftjoin('company_details', 'company_details.user_id', '=', 'job_masters.user_id')
                ->leftjoin('personal_details', 'personal_details.user_id', '=', 'job_masters.user_id')
                ->where(['job_masters.job_status' => "Live", 'job_masters.status' => 1])->orderBy('id','desc')->get()->take(10);
        
        foreach ($Jobs as $key => $job) {
            if(in_array($job->id, $jobs_array)){
                $Jobs[$key]['favourite_status'] = 1;   
            }else{
                $Jobs[$key]['favourite_status'] = 0;   
            }
        }
        
        $allData['latest_jobs'] =  $Jobs;
        // $allData['latest_jobs'] =  JobMaster::where(['job_status' => "Live", 'status' => 1])->orderBy('id','desc')->get()->take(10);
        return  $allData;
        return response()->json(["categories"=>$categories, "latest_jobs"=>$latest_jobs]);
    }

    public function getAllCategories()
    {
        $categories =  categories::all();

        return response()->json(["categories"=>$categories]);
    }
    
    public function getAllJobTypes()
    {
        $job_type =  JobTypeMaster::all();

        return response()->json(["job_type"=>$job_type]);
    }

    public function getAllJobSubTypes($id)
    {
        $job_sub_type =  JobSubType::where(['job_type_id' => $id])->get();

        return response()->json(["job_sub_type"=>$job_sub_type]);
    }

    public function JobExperiance()
    {
        $job_experiance =  JobExperiance::all();

        return response()->json(["job_experiance"=>$job_experiance]);
    }

    public function JobSalary()
    {
        $job_salary =  JobSalary::all();

        return response()->json(["job_salary"=>$job_salary]);
    }

    public function getAllState()
    {
        $state =  State::all();

        return response()->json(["state"=>$state]);
    }

    public function getAllCities($id)
    {
        $Cities =  Cities::where(['state_id' => $id])->get();

        return response()->json(["Cities"=>$Cities]);
    }
    
    public function getAllJobIndustries()
    {
        $job_industry =  JobIndustry::all();

        return response()->json(["job_industry"=>$job_industry]);
    }
    
    
    public function getLatestBlogs()
    {
        $blogs = BlogsMaster::select('blogs_masters.*')
            ->orderBy('id', 'DESC')->get();

        return response()->json(["blogs"=>$blogs]);
    }

    public function getAllJobFuncationAreas($id)
    {
        $job_fun_area =  JobFunctionalArea::where(['job_industry_id' => $id])->get();

        return response()->json(["job_fun_area"=>$job_fun_area]);
    }
    
    public function getAllPlans($status)
    {
        if($status == 'Applicant'){
            $plans = ApplicantPlans::all();
        }else{
            $plans = EmployerPlans::all();
        }
        
        $plans->makeHidden([
            'created_at', 'updated_at'
        ]);

        return response()->json(["plans"=>$plans]);
    }

    public function getAllJobShifts()
    {
        $job_shift =  JobShift::all();

        return response()->json(["job_shift"=>$job_shift]);
    }

    public function getAllEducations()
    {
        $job_education =  JobEducation::all();

        return response()->json(["job_education"=>$job_education]);
    }

    public function getAllPayments()
    {
        $job_pay =  JobPaymentMaster::all();

        return response()->json(["job_pay"=>$job_pay]);
    }

    


    // public function getNotification()
    // {
    //     $live_jobs =  JobMaster::where(['user_id' => $id, 'job_status' => 'Live'])->count();
    //     $closed_jobs =  JobMaster::where(['user_id' => $id, 'job_status' => 'Close'])->count();
    //     $underreview_jobs =  JobManagement::where(['user_id' => $id, 'job_status' => 'under_review'])->count();
    //     // $candidates_jobs =  JobManagement::where(['job_id' => $id])->count();
    //     $closed_jobs =  JobManagement::where(['user_id' => $id, 'job_status' => 'hired'])->count();
        
    //     return response()->json(["user"=>$user, "user_details"=>$user_details]);
    // }

    public function getMessages()
    {
        $messsages =  JobManagement::where(['company_id' => $id])->paginate(10);
        
        return response()->json(["messages"=>$messages, "user_details"=>$user_details]);
    }
    
    public function updateMessageCount(Request $request)
    {
        $planData = PlanManagement::Where('uid',$request->uid)->first();
        $message_limit = $planData->message_limit;
        
        $plan = PlanManagement::Where('uid',$request->uid);
            
        $plan->update(['message_limit' => $message_limit - 1]);
        
        return response()->json(['successMsg' => 'Count updated successfully']);
    }
}
