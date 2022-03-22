<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Applicants;
use App\Models\ApplicantPersonalDetails;
use App\Models\ApplicantEducationalDetails;
use App\Models\ApplicantDocuments;
use App\Models\ApplicantCertificates;
use App\Models\ApplicantVideoDocuments;
use App\Models\ApplicantWorkHistory;
use App\Models\ApplicantSocialMedia;
use App\Models\JobMaster;
use App\Models\ApplicantPlans;
use App\Models\EmployerPlans;
use App\Models\JobManagement;
use App\Models\CompanyDetails;
use DB;
use App\Models\ContactAdmin;
use App\Models\User;
use App\Models\PlanManagement;
use App\Models\FavouriteJobs;

class ApplicantsController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth:api');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $applicants = Applicants::all();
        return $applicant;
        return response()->json(['applicants'=> $applicants]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = $request->uid;
        // $id = auth('api')->user()->id;
        $applicant_count =  Applicants::where(['user_id' => $id, 'status' => 1])->count();
        if($applicant_count == 0){
            $applicant = new Applicants;
            $applicant->user_id = $request->uid;
            $applicant->dob = $request->dob;
            $applicant->about_me = $request->about_me;
            $applicant->skills = $request->skills;
            $applicant->industry = $request->industry;
            $applicant->functional_area = $request->functional_area;
            
            $result = $applicant->save();
            if($result){
                return response()->json(["result"=>"Details added successfully"]);
            }else{
                return response()->json(["result"=>"Error in added details"]);
            }
        }else{
            return response()->json(["result"=>"Data already present please update if you want to change the details."]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addAppPersonalDetails(Request $request)
    {
        $id = $request->uid;
     
        $applicant_count =  ApplicantPersonalDetails::where(['user_id' => $id])->count();
        if($applicant_count == 0){
            $applicant = new ApplicantPersonalDetails;
            $applicant->user_id = $request->uid;
            $applicant->full_name = $request->full_name;
            $applicant->profession = $request->profession;
            $applicant->email = $request->email;
            $applicant->phone_no = $request->phone_no;
            $applicant->dob = $request->dob;
            $applicant->skills = $request->skills;
            $applicant->about_me = $request->about_me;
            $applicant->desired_location = $request->desired_location;
            $image = $request->file('profile_image');

            if ($image) {
                    $profile_image = $request->profile_image->store('public/ProfileImages');
                    $applicant['profile_image'] = $profile_image;
                    //Get file name with extension
                    // $fileNameWithExt = $image->getClientOriginalName();
                    
                    // // Get only file name
                    // $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                    
                    // // Get only the extension
                    // $fileExt = $image->getClientOriginalExtension();
                    
                    // // file name to store
                    // // $fileNameToStore = $fileName.'_'.round(microtime(true)).'.'.$fileExt;
                    // $fileNameToStore = $image->hashName();
                 
                    // $image->store('toPath', ['disk' => 'my_files']);
                    
                    // $applicant->profile_image = $fileNameToStore;    
            }
            $result = $applicant->save();
            if($result){
                return response()->json(["result"=>"Details added successfully"]);
            }else{
                return response()->json(["result"=>"Error in added details"]);
            }
        }else{
            return response()->json(["result"=>"Data already present please update if you want to change the details."]);
        }
    }

    public function updateAppPersonalDetails(Request $request)
    {
        $id = $request->uid;
        
        if($request->profile_image){
            $image = $request->file('profile_image');

            if ($image) {
                    $profile_image = $request->profile_image->store('public/ProfileImages');
                    // $applicant['profile_image'] = $profile_image;
                    //Get file name with extension
                    // $fileNameWithExt = $image->getClientOriginalName();
                    
                    // // Get only file name
                    // $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                    
                    // // Get only the extension
                    // $fileExt = $image->getClientOriginalExtension();
                    
                    // // file name to store
                    // $fileNameToStore = $image->hashName();
                 
                    // $image->store('toPath', ['disk' => 'my_files']);
            }

            $result = ApplicantPersonalDetails::Where('user_id',$id)->update([
                'profile_image' => $profile_image
            ]);
        }

        $result = ApplicantPersonalDetails::Where('user_id',$id)->update([
            'full_name' => $request->full_name,
            'profession' => $request->profession,
            'email' => $request->email,
            'phone_no' => $request->phone_no,
            'dob' => $request->dob,
            'skills' => $request->skills,
            'about_me' => $request->about_me,
            'desired_location' => $request->desired_location
        ]);

        if($result >= 0){
            return response()->json(["result"=>"Applicant details Updated successfully"]);
        }else{
            return response()->json(["result"=>"Error in Updating Applicant details"]);
        }
    }
    
    public function getPersonalDetails($id)
    {
        $applicant =  ApplicantPersonalDetails::select('applicant_personal_details.*','users.user_email_status')
                    ->leftjoin('users', 'users.uid', '=', 'applicant_personal_details.user_id')
                    ->where(['user_id' => $id])->first();
        return $applicant;
        return response()->json(["applicant"=>$applicant]);
    }

    public function addAppWorkDetails(Request $request)
    {
        $id = $request->uid;
        $applicant_count =  ApplicantWorkHistory::where(['user_id' => $id])->count();
        if($applicant_count == 0){
            $applicant = new ApplicantWorkHistory;
            $applicant->user_id = $request->uid;
            $applicant->name_of_company = $request->name_of_company;
            $applicant->other_company = $request->other_company;
            $applicant->work_status = $request->work_status;
            $applicant->work_exp_years = $request->work_exp_years;
            $applicant->work_exp_months = $request->work_exp_months;
            $applicant->director_reference = $request->director_reference;
            $applicant->industry_type = $request->industry_type;
            $applicant->functional_area = $request->functional_area;
            $applicant->annual_salary = $request->annual_salary;
            $applicant->date_of_joining = $request->date_of_joining;
            $applicant->date_of_leaving = $request->date_of_leaving;
            $applicant->achivements = $request->achivements;
            
            $result = $applicant->save();
            if($result){
                return response()->json(["result"=>"Details added successfully"]);
            }else{
                return response()->json(["result"=>"Error in added details"]);
            }
        }else{
            return response()->json(["result"=>"Data already present please update if you want to change the details."]);
        }
    }

    public function updateAppWorkDetails(Request $request)
    {
        $id = $request->uid;

        $result = ApplicantWorkHistory::Where('user_id',$id)->update([
            'name_of_company' => $request->name_of_company,
            'other_company' => $request->other_company,
            'work_status' => $request->work_status,
            'work_exp_years' => $request->work_exp_years,
            'work_exp_months' => $request->work_exp_months,
            'director_reference' => $request->director_reference,
            'industry_type' => $request->industry_type,
            'functional_area' => $request->functional_area,
            'annual_salary' => $request->annual_salary,
            'date_of_joining' => $request->date_of_joining,
            'date_of_leaving' => $request->date_of_leaving,
            'achivements' => $request->achivements
        ]);

        if($result >= 0){
            return response()->json(["result"=>"Applicant details Updated successfully"]);
        }else{
            return response()->json(["result"=>"Error in Updating Applicant details"]);
        }
    }
    
    public function getWorkDetails($id)
    {
        $applicant =  ApplicantWorkHistory::where(['user_id' => $id])->first();
        return $applicant;
        return response()->json(["applicant"=>$applicant]);
    }

    public function addAppEducationalDetails(Request $request)
    {
        $id = $request->uid;
        // $applicant_count =  ApplicantEducationalDetails::where(['user_id' => $id])->count();
        // if($applicant_count == 0){
            $applicant = new ApplicantEducationalDetails;
            $applicant->user_id = $request->uid;
            $applicant->qualification = $request->qualification;
            $applicant->passout_yr = $request->passout_yr;
            $applicant->university = $request->university;
            $applicant->marks = $request->marks;
            $applicant->specification = $request->specification;
            
            $result = $applicant->save();
            if($result){
                return response()->json(["result"=>"Details added successfully"]);
            }else{
                return response()->json(["result"=>"Error in added details"]);
            }
        // }else{
        //     return response()->json(["result"=>"Data already present please update if you want to change the details."]);
        // }
    }


    public function getEducationalDetails($id)
    {
        $applicant =  ApplicantEducationalDetails::where(['user_id' => $id])->get();
        return $applicant;
        return response()->json(["applicant"=>$applicant]);
    }

        public function updateAppEducationalDetails(Request $request)
    {
        $id = $request->uid;

        $result = ApplicantEducationalDetails::Where('id',$id)->update([
            'qualification' => $request->qualification,
            'passout_yr' => $request->passout_yr,
            'university' => $request->university,
            'marks' => $request->marks,
            'specification' => $request->specification
        ]);

        if($result >= 0){
            return response()->json(["result"=>"Applicant details Updated successfully"]);
        }else{
            return response()->json(["result"=>"Error in Updating Applicant details"]);
        }
    }

    public function addAppResumeDetails(Request $request)
    {
        $id = $request->uid;
        $applicant_count =  ApplicantDocuments::where(['user_id' => $id])->count();
        if($applicant_count == 0){
            $applicant = new ApplicantDocuments;
            $applicant->user_id = $request->uid;
            $applicant->link_of_resume = $request->link_of_resume;
            
            $image = $request->file('upload_resume');

            if ($image) {
                    $upload_resume = $request->upload_resume->store('public/Resume');
                    $applicant['upload_resume'] = $upload_resume;
                    //Get file name with extension
                    // $fileNameWithExt = $image->getClientOriginalName();
                    
                    // // Get only file name
                    // $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                    
                    // // Get only the extension
                    // $fileExt = $image->getClientOriginalExtension();
                    
                    // // file name to store
                    // // $fileNameToStore = $fileName.'_'.round(microtime(true)).'.'.$fileExt;
                    // $fileNameToStore = $image->hashName();
                 
                    // $image->store('Documents', ['disk' => 'documents']);
                    
                    // $applicant->upload_resume = $fileNameToStore;    
            }

            $result = $applicant->save();
            if($result){
                return response()->json(["result"=>"Details added successfully"]);
            }else{
                return response()->json(["result"=>"Error in added details"]);
            }
        }else{
            return response()->json(["result"=>"Data already present please update if you want to change the details."]);
        }
    }

    public function updateAppResumeDetails(Request $request)
    {
        $id = $request->uid;

        $result = ApplicantDocuments::Where('user_id',$id)->update([
            'link_of_resume' => $request->link_of_resume
        ]);

        if($request->upload_resume){
            $image = $request->file('upload_resume');

            if ($image) {
                    $upload_resume = $request->upload_resume->store('public/Resume');
                    // $applicant['upload_resume'] = $upload_resume;
                    //Get file name with extension
                    // $fileNameWithExt = $image->getClientOriginalName();
                    
                    // // Get only file name
                    // $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                    
                    // // Get only the extension
                    // $fileExt = $image->getClientOriginalExtension();
                    
                    // // file name to store
                    // $fileNameToStore = $image->hashName();
                 
                    // $image->store('Documents', ['disk' => 'documents']);
            }

            $result = ApplicantDocuments::Where('user_id',$id)->update([
                'upload_resume' => $upload_resume
            ]);
        }

        if($result >= 0){
            return response()->json(["result"=>"Applicant details Updated successfully"]);
        }else{
            return response()->json(["result"=>"Error in Updating Applicant details"]);
        }
    }


    public function getResumeDetails($id)
    {
        $applicant =  ApplicantDocuments::where(['user_id' => $id])->first();
        return $applicant;
        return response()->json(["applicant"=>$applicant]);
    }

    public function addAppVideoDetails(Request $request)
    {
        $id = $request->uid;
        $applicant_count =  ApplicantVideoDocuments::where(['user_id' => $id])->count();
        if($applicant_count == 0){
            $applicant = new ApplicantVideoDocuments;
            $applicant->user_id = $request->uid;
            $applicant->link_of_video = $request->link_of_video;
            
            $image = $request->file('upload_video');

            if ($image) {
                    $upload_video = $request->upload_video->store('public/Videos');
                    $applicant['upload_video'] = $upload_video;
                    //Get file name with extension
                    // $fileNameWithExt = $image->getClientOriginalName();
                    
                    // // Get only file name
                    // $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                    
                    // // Get only the extension
                    // $fileExt = $image->getClientOriginalExtension();
                    
                    // // file name to store
                    // // $fileNameToStore = $fileName.'_'.round(microtime(true)).'.'.$fileExt;
                    // $fileNameToStore = $image->hashName();
                 
                    // $image->store('Videos', ['disk' => 'videos']);
                    
                    // $applicant->upload_video = $fileNameToStore;    
            }

            $result = $applicant->save();
            if($result){
                return response()->json(["result"=>"Details added successfully"]);
            }else{
                return response()->json(["result"=>"Error in added details"]);
            }
        }else{
            return response()->json(["result"=>"Data already present please update if you want to change the details."]);
        }
    }

    public function getVideoDetails($id)
    {
        $applicant =  ApplicantVideoDocuments::where(['user_id' => $id])->first();
        return $applicant;
        return response()->json(["applicant"=>$applicant]);
    }


    public function updateAppVideoDetails(Request $request)
    {
        $id = $request->uid;

        $result = ApplicantVideoDocuments::Where('user_id',$id)->update([
            'link_of_video' => $request->link_of_video
        ]);

        if($request->upload_video){
            $image = $request->file('upload_video');

            if ($image) {
                    $upload_video = $request->upload_video->store('public/Videos');
                    // $applicant['upload_video'] = $upload_video;
                    //Get file name with extension
                    // $fileNameWithExt = $image->getClientOriginalName();
                    
                    // // Get only file name
                    // $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                    
                    // // Get only the extension
                    // $fileExt = $image->getClientOriginalExtension();
                    
                    // // file name to store
                    // $fileNameToStore = $image->hashName();
                 
                    // $image->store('Videos', ['disk' => 'videos']);
            }

            $result = ApplicantDocuments::Where('user_id',$id)->update([
                'upload_video' => $upload_video
            ]);
        }

        if($result >= 0){
            return response()->json(["result"=>"Applicant details Updated successfully"]);
        }else{
            return response()->json(["result"=>"Error in Updating Applicant details"]);
        }
    }

    public function addAppCertificateDetails(Request $request)
    {
        $id = $request->uid;
        // $applicant_count =  ApplicantCertificates::where(['user_id' => $id])->count();
        // if($applicant_count == 0){
            $applicant = new ApplicantCertificates;
            $applicant->user_id = $request->uid;
            // $applicant->certificate1 = $request->certificate1;
            
            $image1 = $request->file('certificate1');
            // $image2 = $request->file('certificate2');

            if ($image1) {
                    $certificate1 = $request->certificate1->store('public/Documents');
                    $applicant['certificate1'] = $certificate1;
                    //Get file name with extension
                    // $fileNameWithExt = $image1->getClientOriginalName();
                    
                    // // Get only file name
                    // $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                    
                    // // Get only the extension
                    // $fileExt = $image1->getClientOriginalExtension();
                    
                    // // file name to store
                    // // $fileNameToStore = $fileName.'_'.round(microtime(true)).'.'.$fileExt;
                    // $fileNameToStore = $image1->hashName();
                 
                    // $image1->store('Documents', ['disk' => 'documents']);
                    
                    // $applicant->certificate1 = $fileNameToStore;    

            }
            // if ($image2) {
            //         //Get file name with extension
            //         $fileNameWithExt = $image2->getClientOriginalName();
                    
            //         // Get only file name
            //         $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                    
            //         // Get only the extension
            //         $fileExt = $image2->getClientOriginalExtension();
                    
            //         // file name to store
            //         // $fileNameToStore = $fileName.'_'.round(microtime(true)).'.'.$fileExt;
            //         $fileNameToStore = $image2->hashName();
                 
            //         $image2->store('Documents', ['disk' => 'documents']);
                    
            //         $applicant->certificate2 = $fileNameToStore;    

            // }

            $result = $applicant->save();
            if($result){
                return response()->json(["result"=>"Details added successfully"]);
            }else{
                return response()->json(["result"=>"Error in added details"]);
            }
        // }else{
        //     return response()->json(["result"=>"Data already present please update if you want to change the details."]);
        // }
    }

    public function getCertificateDetails($id)
    {
        $applicant =  ApplicantCertificates::where(['user_id' => $id])->get();
        return $applicant;
        return response()->json(["applicant"=>$applicant]);
    }


    public function updateAppCertificateDetails(Request $request)
    {
        $id = $request->uid;

        if($request->certificate1){
            $image = $request->file('certificate1');

            if ($image) {
                    $certificate1 = $request->certificate1->store('public/Documents');
                    // $applicant['certificate1'] = $certificate1;
                    // //Get file name with extension
                    // $fileNameWithExt = $image->getClientOriginalName();
                    
                    // // Get only file name
                    // $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                    
                    // // Get only the extension
                    // $fileExt = $image->getClientOriginalExtension();
                    
                    // // file name to store
                    // $fileNameToStore = $image->hashName();
                  
                    // $image->store('Documents', ['disk' => 'documents']);

            }

            $result = ApplicantCertificates::Where('id',$id)->update([
                'certificate1' => $certificate1
            ]);
        }

        // if($request->certificate2){
        //     $image = $request->file('certificate2');

        //     if ($image) {
        //             //Get file name with extension
        //             $fileNameWithExt = $image->getClientOriginalName();
                    
        //             // Get only file name
        //             $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                    
        //             // Get only the extension
        //             $fileExt = $image->getClientOriginalExtension();
                    
        //             // file name to store
        //             $fileNameToStore = $image->hashName();
                 
        //             $image->store('Documents', ['disk' => 'documents']);

        //     }

            // $result = ApplicantCertificates::Where('id',$id)->update([
            //     'certificate2' => $fileNameToStore
            // ]);
        // }

        if($result >= 0){
            return response()->json(["result"=>"Applicant details Updated successfully"]);
        }else{
            return response()->json(["result"=>"Error in Updating Applicant details"]);
        }
    }
    
    public function deleteMyCertificates($id)
    {
        $certificate = ApplicantCertificates::find($id);
        $document =  $certificate->certificate1;
        $image_path = public_path("/Documents/".$document);
        
        if (file_exists($image_path)) {
                @unlink($image_path);
        }
        
        $check = $certificate->delete();
        if ($check) {
            return response()->json(['successMsg' => 'Certificate deleted successFully']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $applicant =  Applicants::where(['user_id' => $id, 'status' => 1])->first();
        return $applicant;
        return response()->json(["applicant"=>$applicant]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $id = $request->uid;

        $result = Applicants::Where('user_id',$id)->update([
            'dob' => $request->dob,
            'about_me' => $request->about_me,
            'skills' => $request->skills,
            'industry' => $request->industry,
            'functional_area' => $request->functional_area
        ]);

        if($result >= 0){
            return response()->json(["result"=>"Applicant details Updated successfully"]);
        }else{
            return response()->json(["result"=>"Error in Updating Applicant details"]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $applicant_count =  Applicants::where(['user_id' => $id, 'status' => 1])->count();

        $applicant =  Applicants::where(['user_id' => $id, 'status' => 1])->get();
        
        if($applicant_count > 0){
            $id = $applicant[0]->id;
        
            $applicant = Applicants::find($id);
            $result = $applicant->delete();

            if($result){
                return response()->json(["result"=>"Applicant details Deleted successfully"]);
            }else{
                return response()->json(["result"=>"Issue in deleting Applicant details"]);
            }    
        }else{
                return response()->json(["result"=>"No record found"]);
        }
    }

    //User filter
    public function filter(Request $request)
    {
        $jobsFav = FavouriteJobs::where(['favourite_jobs.user_id' => $request->uid])->get();
        
        $jobs_array = [];
        foreach ($jobsFav as $key => $job) {
            $jobs_array[$key] = $job->job_id;
        }
        
        $jobs = JobMaster::query();

        $jobs->select('job_masters.id as job_id','job_masters.user_id as user_id','company_details.id as company_id','company_details.company_name','job_masters.*','company_details.*','personal_details.full_name','personal_details.contact_number as employer_contact_number','personal_details.email as employer_email')
        ->leftjoin('company_details', 'company_details.user_id', '=', 'job_masters.user_id')
        ->leftjoin('personal_details', 'personal_details.user_id', '=', 'job_masters.user_id');
        
        if ($request->job_type != '') {
            $jobs->where('job_masters.job_type', $request->job_type);
        }
        if ($request->exp_month != '') {
            $jobs->where('job_masters.work_exp_from' ,'>=', [$request->exp_month]);
        }
        
        if ($request->exp_year != '') {
            $jobs->where('job_masters.work_exp_to', '<=', [$request->exp_year]);
        }

        if ($request->min_salary != '') {
            $jobs->where('job_masters.min_salary' ,'>=', $request->min_salary);
        }
        if ($request->max_salary != '') {
            $jobs->where('job_masters.max_salary' ,'<=', $request->max_salary);
        }
        if ($request->state != '') {
            $jobs->where('job_masters.job_state', $request->state);
        }
        if ($request->city != '') {
            $jobs->where('job_masters.job_city', $request->city);
        }

        $ans = $jobs->paginate(10);
        
        foreach ($ans as $key => $job) {
            if(in_array($job->job_id, $jobs_array)){
                $ans[$key]['favourite_status'] = 1;   
            }else{
                $ans[$key]['favourite_status'] = 0;   
            }
        }
        
        return $ans;
    }
    
    // public function searchFunctionalArea(Request $request)
    // {
        
    //     $job_fun_area =  JobFunctionalArea::where(['job_industry_id' => $id])
    //                         ->where('job_fun_area_name', 'like', '%' . $product_info->tags . '%')       
    //                         ->get();
    //     $Jobs = JobMaster::where(['job_status' => "Live"])
    //             ->where('products.tags', 'like', '%' . $product_info->tags . '%')
    //             ->get();

    //     return response()->json(['Jobs'=> $Jobs]);
    // }
    
    public function getAllJobsByFunctionalArea($id,$uid)
    {
        $jobsFav = FavouriteJobs::where(['favourite_jobs.user_id' => $uid])->get();
        $jobs_array = [];
        foreach ($jobsFav as $key => $job) {
            $jobs_array[$key] = $job->job_id;
        }
        
        
        $Jobs = JobMaster::select('job_masters.*','company_details.company_name','personal_details.full_name','personal_details.contact_number as employer_contact_number','personal_details.email as employer_email')
                            ->leftjoin('personal_details', 'personal_details.user_id', '=', 'job_masters.user_id')
                            ->leftjoin('company_details', 'company_details.user_id', '=', 'job_masters.user_id')
                            ->where(['job_functional_area' => $id, 'job_status' => "Live"])
                            ->paginate(10);
        
        foreach ($Jobs as $key => $job) {
            if(in_array($job->id, $jobs_array)){
                $Jobs[$key]['favourite_status'] = 1;   
            }else{
                $Jobs[$key]['favourite_status'] = 0;   
            }
        }
        
        return $Jobs;   
        return response()->json(['Jobs'=> $Jobs]);
    }
    
    public function getAllJobsByIndustry($id,$uid)
    {
        $jobsFav = FavouriteJobs::where(['favourite_jobs.user_id' => $uid])->get();
        $jobs_array = [];
        foreach ($jobsFav as $key => $job) {
            $jobs_array[$key] = $job->job_id;
        }
        
        $Jobs = JobMaster::select('job_masters.*','company_details.company_name','personal_details.full_name','personal_details.contact_number as employer_contact_number','personal_details.email as employer_email')
                            ->leftjoin('company_details', 'company_details.user_id', '=', 'job_masters.user_id')
                            ->leftjoin('personal_details', 'personal_details.user_id', '=', 'job_masters.user_id')
                            ->where(['job_industry' => $id, 'job_status' => "Live"])
                            ->paginate(10);
        
        foreach ($Jobs as $key => $job) {
            if(in_array($job->id, $jobs_array)){
                $Jobs[$key]['favourite_status'] = 1;   
            }else{
                $Jobs[$key]['favourite_status'] = 0;   
            }
        }
        return $Jobs;   
        return response()->json(['Jobs'=> $Jobs]);
    }
    
    public function recommendedJob($uid)
    {
        $work =  ApplicantWorkHistory::where(['user_id' => $uid])->first();
        $industry = $work->industry_type;
        
        $jobsFav = FavouriteJobs::where(['favourite_jobs.user_id' => $uid])->get();
        $jobs_array = [];
        foreach ($jobsFav as $key => $job) {
            $jobs_array[$key] = $job->job_id;
        }
        
        $Jobs = JobMaster::select('job_masters.*','company_details.company_name','personal_details.full_name','personal_details.contact_number as employer_contact_number','personal_details.email as employer_email')
                        ->leftjoin('company_details', 'company_details.user_id', '=', 'job_masters.user_id')
                        ->leftjoin('personal_details', 'personal_details.user_id', '=', 'job_masters.user_id')
                        ->where(['job_industry' => $industry, 'job_status' => "Live"])
                        ->paginate(10);
        
        foreach ($Jobs as $key => $job) {
            if(in_array($job->id, $jobs_array)){
                $Jobs[$key]['favourite_status'] = 1;   
            }else{
                $Jobs[$key]['favourite_status'] = 0;   
            }
        }
        
        return response()->json(['Jobs'=> $Jobs]);
    }
    
    // public function searchByIndustry(Request $request)
    // {
    //     $Jobs = JobMaster::where(['job_functional_area' => $category, 'job_status' => "Live"])->get();

    //     return response()->json(['Jobs'=> $Jobs]);
    // }
    
    public function addAppSocialMediaDetails(Request $request)
    {
        $id = $request->uid;
     
        $socialmedia_count =  ApplicantSocialMedia::where(['user_id' => $id, 'status' => 1])->count();
        if($socialmedia_count == 0){
            $socialmedia = new ApplicantSocialMedia;
            $socialmedia->user_id = $id;
            $socialmedia->facebook_url = $request->facebook_url;
            $socialmedia->youtube_url = $request->youtube_url;
            $socialmedia->twitter_url = $request->twitter_url;
            $socialmedia->linkedin_url = $request->linkedin_url;
            
            $result = $socialmedia->save();
            if($result){
                return response()->json(["result"=>"Social Media details added successfully"]);
            }else{
                return response()->json(["result"=>"Error in added Social Media details"]);
            }
        }else{
            return response()->json(["result"=>"Data already present please update if you want to change the details."]);
        }
    }

    public function updateAppSocialMediaDetails(Request $request)
    {
        $id = $request->uid;

        $result = ApplicantSocialMedia::Where('user_id',$id)->update([
            'facebook_url' => $request->facebook_url,
            'youtube_url' => $request->youtube_url,
            'twitter_url' => $request->twitter_url,
            'linkedin_url' => $request->linkedin_url
        ]);

        if($result >= 0){
            return response()->json(["result"=>"Social Media details Updated successfully"]);
        }else{
            return response()->json(["result"=>"Error in Updating Social Media details"]);
        }
    }
    
    public function getSocialMediaDetails($id)
    {
        $applicant =  ApplicantSocialMedia::where(['user_id' => $id])->first();
        return $applicant;
        return response()->json(["applicant"=>$applicant]);
    }

    //Percent of profile completes
    public function profilePercent($id)
    {
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
    
        $profile_percent = $userData + $education + $work + $media + $document;

        return response()->json(['profile_percent'=> $profile_percent,'userData_details_completed'=> $userData_check,'education_details_completed'=> $document_check,'work_details_completed'=> $education_check,'media_details_completed'=> $work_check,'document_details_completed'=> $media_check]);
    }

    public function getUserAllDetails($id)
    {
        $user_id = $id;
        $userData = [];        
    
        $userData['user_details'] =  User::select(
                                    'users.*',
                                    'users.status as user_status',
                                    'plan_management.message_limit as remaining_message_limit',
                                    'plan_management.job_limit as remaining_job_limit'
                                    )
                                    ->where(['users.uid' => $user_id])
                                    ->leftjoin('plan_management', 'users.uid', '=', 'plan_management.uid')
                                    ->first();
        $userData['personal_details'] =  ApplicantPersonalDetails::where(['user_id' => $user_id])->first();

        $userData['educational_details'] =  ApplicantEducationalDetails::where(['user_id' => $user_id])->get();

        $userData['work_history'] =  ApplicantWorkHistory::where(['user_id' => $user_id])->first();

        $userData['other_details'] =  ApplicantSocialMedia::where(['user_id' => $user_id])->first();
        
        $userData['upload_resume'] =  ApplicantDocuments::where(['user_id' => $user_id])->first();
        $userData['upload_certificates'] =  ApplicantCertificates::where(['user_id' => $user_id])->get();
        $userData['upload_video_link'] =  ApplicantVideoDocuments::where(['user_id' => $user_id])->first();
      
        // $userData['plan_details'] = ApplicantPlans::select('users.plan')   
        //     ->where(['users.uid' => $id])
        //     ->leftjoin('users', 'users.plan', '=', 'plans.status')->first();
          
        return $userData;

        return response()->json(['profile_percent'=> $profile_percent,'userData_details_completed'=> $userData_check,'education_details_completed'=> $document_check,'work_details_completed'=> $education_check,'media_details_completed'=> $work_check,'document_details_completed'=> $media_check]);
    }
    
    public function getAllJobs()
    {
        $Jobs = JobMaster::select(
            'job_masters.*',
            'job_masters.status as jobmasters_status',
            'company_details.status as company_status',
            'company_details.company_name',
            'personal_details.contact_number as employer_contact_number'
            )
            
            
            ->leftjoin('company_details','company_details.user_id','=','job_masters.user_id')
            ->leftjoin('personal_details', 'personal_details.user_id', '=', 'job_masters.user_id')
        // ->where(['job_status' => "Live", 'status' => 1])
        ->paginate(10);
        // 
              
        
        // $Jobs =  JobMaster::select('job_masters.*')->where(['job_status' => "Live", 'status' => 1])->pagination(10);
        return response()->json(['jobs' => $Jobs]);
    }
    
    public function addContactAdmin(Request $request)
    {
        $contact = new ContactAdmin;
        $contact->user_id = $request->uid;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone_number = $request->phone_number;
        $contact->message = $request->message;
        
        $result = $contact->save();
        
        return response()->json(["result"=>"Added successfully"]);
        
    }
    
    public function getRejectedJobs($id)
    {
        
        $job_app =  JobManagement::select(
            'job_management.*',
            'applicant_personal_details.desired_location',
            'users.*',
            'job_masters.*',
            'company_details.company_name',
            'personal_details.full_name'
        )
            ->leftjoin('company_details', 'company_details.id', '=', 'job_management.company_id')
            ->leftjoin('users', 'users.uid', '=', 'job_management.user_id')
            ->leftjoin('job_masters', 'job_masters.id', '=', 'job_management.job_id')
            ->leftjoin('personal_details', 'personal_details.user_id', '=', 'job_masters.user_id')
            ->leftjoin('applicant_personal_details', 'applicant_personal_details.user_id', '=', 'job_management.user_id')
            ->where(['job_management.job_status' => 'reject'])
            ->where(['job_management.user_id' => $id])
            ->paginate(10);

        // $Jobs =  JobMaster::where(['user_id' => $user_id, 'job_status' => "Live", 'status' => 1])->paginate(10);
        return $job_app;
        return response()->json(['Jobs'=> $Jobs, 'jobs_count'=> $jobs_count]);
    }

    public function getHiredJobs($id)
    {
        
        $job_app =  JobManagement::select(
            'job_management.*',
            'applicant_personal_details.desired_location',
            'users.*',
            'job_masters.*',
            'company_details.company_name',
            'personal_details.full_name'
        )
            ->leftjoin('company_details', 'company_details.id', '=', 'job_management.company_id')
            ->leftjoin('users', 'users.uid', '=', 'job_management.user_id')
            ->leftjoin('job_masters', 'job_masters.id', '=', 'job_management.job_id')
            ->leftjoin('personal_details', 'personal_details.user_id', '=', 'job_masters.user_id')
            ->leftjoin('applicant_personal_details', 'applicant_personal_details.user_id', '=', 'job_management.user_id')
            ->where(['job_management.job_status' => 'hired'])
            ->where(['job_management.user_id' => $id])
            ->paginate(10);

        // $Jobs =  JobMaster::where(['user_id' => $user_id, 'job_status' => "Live", 'status' => 1])->paginate(10);
        return $job_app;
        return response()->json(['Jobs'=> $Jobs, 'jobs_count'=> $jobs_count]);
    }


    public function getAppliedJobs($id)
    {
        
        $job_app =  JobManagement::select(
            'job_management.*',
            'applicant_personal_details.desired_location',
            'users.*',
            'company_details.company_name',
            'personal_details.full_name',
            'job_masters.*'
        )
            ->leftjoin('users', 'users.uid', '=', 'job_management.user_id')
            ->leftjoin('job_masters', 'job_masters.id', '=', 'job_management.job_id')
            ->leftjoin('company_details', 'company_details.user_id', '=', 'job_masters.user_id')
            ->leftjoin('personal_details', 'personal_details.user_id', '=', 'job_masters.user_id')
            ->leftjoin('applicant_personal_details', 'applicant_personal_details.user_id', '=', 'job_management.user_id')
            ->where('job_management.job_status' ,'!=', 'reject')
            ->where(['job_management.user_id' => $id])
            ->paginate(10);

        // $Jobs =  JobMaster::where(['user_id' => $user_id, 'job_status' => "Live", 'status' => 1])->paginate(10);
        return $job_app;
        return response()->json(['Jobs'=> $Jobs, 'jobs_count'=> $jobs_count]);
    }

      public function getAllJobs_addfav()
    {
        $Jobs = DB::table('job_masters')
                    ->join('plans', 'favourite_jobs.user_id', '=', 'job_masters.user_id')->paginate(10);
                    
        return response()->json($Jobs);
    }
    
    public function updateJobSchedule(Request $request){
        $user = JobManagement::Where('user_id',$request->uid)->where('job_id', $request->job_id);
        
        
        if ($request->has('joining_date')) {
            $user->update(['joining_date' => $request->joining_date]);
        }
        
        if ($request->has('offline_test')) {
            $user->update(['offline_test' => $request->offline_test]);
        }
        
        if ($request->has('online_test')) {
            $user->update(['online_test' => $request->online_test]);
        }
        
        if ($request->has('joining_date')) {
            $user->update(['joining_date' => $request->joining_date]);
        }
        if ($request->has('interview_by')) {
            $user->update(['interview_by' => $request->interview_by]);
        }
        
        if ($request->has('schedule_for')) {
            $user->update(['schedule_for' => $request->schedule_for]);
        }
        
        
        return response()->json(['success'=> 'Updated Successfully']);

    }
        
}
