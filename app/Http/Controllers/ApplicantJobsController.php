<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ApplicantJobs;
use App\Models\JobManagement;
use App\Models\JobMaster;
use App\Models\Notification;
use App\Models\NotificationHandler;
use App\Models\CompanyDetails;
use App\Models\User;
use App\Models\FavouriteJobs;
use App\Models\PlanManagement;

class ApplicantJobsController extends Controller
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
        $jobsApplied = ApplicantJobs::all();
        return response()->json(['applicantsJobs'=> $jobsApplied]);
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
        $payment_count =  PaymentDetails::where(['user_id' => $id, 'status' => 1])->count();
        if($payment_count == 0){
            $payment = new PaymentDetails;
            $payment->user_id = $request->uid;
            $payment->total_price = $request->total_price;
            $payment->payment_method = $request->payment_method;
            $payment->payment_id = $request->payment_id;
            $payment->payment_status = $request->payment_status;
            
            $result = $payment->save();
            if($result){
                return response()->json(["result"=>"Payment details added successfully"]);
            }else{
                return response()->json(["result"=>"Error in adding Payment details"]);
            }
        }else{
            return response()->json(["result"=>"Data already present please update if you want to change the details."]);
        }
    }

    public function applyForJob(Request $request)
    {
        $id = $request->uid;

        $job_count =  JobManagement::where(['user_id' => $id, 'job_id' => $request->job_id])->count();
        
        if($job_count == 0){
            $job = new JobManagement;
            $job->user_id = $request->uid;
            $job->job_id = $request->job_id;

            $jobData =  JobMaster::where(['id' => $request->job_id])->get();
            $jobUserIid = $jobData[0]->user_id; 
            $companyDetails =  CompanyDetails::where(['user_id' => $jobUserIid])->get();
            
            $job->company_id = $companyDetails[0]->id;
            $job->exp_year = $request->exp_year;
            $job->exp_month = $request->exp_month;
        
            // // $salary = $request->salary_range;
            // // $salary_new = explode ("-", $salary); 
            // // $salary = array_map('trim', $salary_new);
            // // $min_salary = $salary[0];
            // // $max_salary = $salary[1];

            // // if (str_contains($min_salary, 'K')) {
            // //     $min_salary = trim($min_salary, 'K');
            // //     $min_salary = $min_salary * 1000;
            // // } elseif(str_contains($min_salary, 'L')) {
            // //     $min_salary = trim($min_salary, 'L');
            // //     $min_salary = $min_salary * 100000;
            // // }

            // // if (str_contains($max_salary, 'K')) {
            // //     $max_salary = trim($max_salary, 'K');
            // //     $max_salary = $max_salary * 1000;
            // // } elseif(str_contains($max_salary, 'L')) {
            // //     $max_salary = trim($max_salary, 'L');
            // //     $max_salary = $max_salary * 100000;
            // // }
            
            $job->expected_salary = $request->expected_salary;
            $job->newmin_salary = $request->min_salary;
            $job->newmax_salary = $request->max_salary;
            $job->job_status = $request->job_status;
            $job->schedule_for = $request->schedule_for;
            $job->job_status = 'under_review';
            
            $result = $job->save();
            
            $planData = PlanManagement::Where('uid',$request->uid)->first();
            $apply_job_limit = $planData->job_limit;
        
            $plan = PlanManagement::Where('uid',$request->uid);
            
            $plan->update(['job_limit' => $apply_job_limit - 1]);

            $User = User::where('uid', $request->uid)->first();
            
            $jobData =  JobMaster::where(['id' => $request->job_id])->get();
            
            $jobUserIid = $jobData[0]->user_id;
            $jobUserData =  User::where(['uid' => $jobUserIid])->get();

            // $User = User::select('*')->where(['id', $request->uid])->fist();
            
            $NotifyHandler = new NotificationHandler;
            
            $NotifyHandler->user_id = 0;
            $NotifyHandler->user_role = 0;
            $NotifyHandler->notification_id = 3;
            $NotifyHandler->deliver_user_id = $jobData[0]->user_id;
            $NotifyHandler->deliver_user_role = $jobUserData[0]->role;
            $NotifyHandler->job_id = $request->job_id;
            $NotifyHandler->job_status = 'under_review';

            $NotifyHandler->save();
            
            $path = env('APP_URL');
    
            $Checkstatus = $path.'api/checkStatus';
            
            $curl = curl_init();
            
            curl_setopt_array($curl, array(
                CURLOPT_URL => $Checkstatus,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 600,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET"
            ));
    
            $response = curl_exec($curl);
    
            curl_close($curl);

            if($result){
                return response()->json(["result"=>"Applied for Job successfully"]);
            }else{
                return response()->json(["result"=>"Error in adding Job details"]);
            }
        }else{
            return response()->json(["result"=>"Already applied for job."]);
        }
    }

    public function searchByCategory($category,$id)
    {        
        
        $user_id = $id;
        
        $jobsFav = FavouriteJobs::where(['favourite_jobs.user_id' => $user_id])->get();
        $jobs_array = [];
        foreach ($jobsFav as $key => $job) {
            $jobs_array[$key] = $job->job_id;
        }
        
        $Jobs = JobMaster::select('job_masters.*','company_details.company_name','personal_details.full_name','personal_details.contact_number as employer_contact_number','personal_details.email as employer_email')
                ->leftjoin('company_details', 'company_details.user_id', '=', 'job_masters.user_id')
                ->leftjoin('personal_details', 'personal_details.user_id', '=', 'job_masters.user_id')
                ->where(['category' => $category, 'job_status' => "Live"])
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
     
    public function getApplicationStatus(Request $request)
    {        
        $Jobs =  JobManagement::select(
            'job_management.*',
            'job_management.job_status as application_status',
            'job_management.user_id as uid',
            'job_masters.*',
            'company_details.*'
            )->where(['job_management.job_id' => $request->job_id, 'job_management.user_id' => $request->uid])
            ->leftjoin('job_masters', 'job_masters.id', '=', 'job_management.job_id')
            ->leftjoin('company_details', 'company_details.id', '=', 'job_management.company_id')
            ->first();
            
        $Jobs->makeHidden([
            'created_at', 'updated_at', 'user_id'
        ]);

        return response()->json(['Jobs'=> $Jobs]);
    }

    
    public function getJobDescription(Request $request)
    {        
        $Jobs =  JobMaster::where(['id' => $request->job_id])
            ->leftjoin('company_details', 'company_details.user_id', '=', 'job_masters.user_id')
            ->first();

        return response()->json(['Jobs'=> $Jobs]);
    }

    public function getNotificationDetails(Request $request)
    {        
        $Notify =  NotificationHandler::where(['user_id' => $request->uid,'user_role' => $request->role])->get();
        $Notify->makeHidden(['created_at', 'updated_at']);
        return response()->json(['Notifications'=> $Notify]);
    }

    public function getNotifyDetails(Request $request)
    {        
        $NotificationsIds = explode(',',$request->notification_id);

        $Notification =  Notification::whereIn('id', $NotificationsIds)
                        ->get();
        $User = User::where('id', $request->uid)->first();
        
        $Notification->makeHidden(['created_at', 'updated_at']);
        return response()->json(['User' => $User->name,'Notifications'=> $Notification]);
    }


    public function getNotification($id)
    {        
        $Notification =  User::select('notifications')->where(['id' => $id])->first();

        return response()->json(['Notification'=> $Notification]);
    }

    public function addNotification($id,$userid){
        $NotifyData =  Notification::where(['id' => $id])->get();

        $notify = $NotifyData->notification;

        $result = User::Where(['id' => $userid])->update([
            'notifications' => $notify,
        ]);
    }
    
     public function addFavouriteJobs(Request $request){
        if($request->status == 'add'){
            $favouriteproperty = new FavouriteJobs();
        
            $favouriteproperty->user_id = $request->uid;
            $favouriteproperty->job_id = $request->job_id;
            $favouriteproperty->save();
            return response()->json(['msg' => 'added']);
        }
        else{
            $delete_fav = FavouriteJobs::where(['job_id' => $request->job_id,'user_id' => $request->uid])->first();
            if ($delete_fav != null) {
                $delete_fav->delete();
                return response()->json(['msg' => 'deleted']);
            }
        }
    }
    
    public function getMyFavouriteJobs($id)
    {       
        $jobs_fav = FavouriteJobs::select('job_id')->where(['user_id' => $id])->get();

        $jobIds = []; 

        foreach ($jobs_fav as $key => $job) {
            $jobIds[$key] = $job->job_id;
        }

        $jobs =  JobMaster::select('job_masters.*','company_details.company_name','personal_details.full_name','personal_details.contact_number as employer_contact_number','personal_details.email as employer_email')
                ->leftjoin('company_details', 'company_details.user_id', '=', 'job_masters.user_id')
                ->leftjoin('personal_details', 'personal_details.user_id', '=', 'job_masters.user_id')
                ->findMany($jobIds);               
        
        foreach ($jobs as $key => $job) {
            if(in_array($job->id, $jobIds)){
                $jobs[$key]['favourite_status'] = 1;   
            }else{
                $jobs[$key]['favourite_status'] = 0;   
            }
        }
        
        return $jobs;
    }
    
    public function updateNotificationStatus(Request $request)
    {
        $job = NotificationHandler::where('notification_id', $request->notification_id)
                    ->update(['status' => $request->status]);
       
        return response()->json(['successMsg' => 'Status updated successfully']);
    }
    
}