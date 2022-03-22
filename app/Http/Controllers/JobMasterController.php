<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobMaster;
use App\Models\User;
use App\Models\JobManagement;
use App\Models\NotificationHandler;
use App\Models\ApplicantPersonalDetails;
use App\Models\ApplicantEducationalDetails;
use App\Models\PlanManagement;
use App\Models\FavouriteJobs;
use App\Models\CompanyDetails;
use DB;

class JobMasterController extends Controller
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
    public function getAllJobs($id)
    {
        $jobs_array = [];
        $user_id = $id;
        // $jobs_count = JobMaster::select('job_masters.id as job_master_id','job_masters.*','favourite_jobs.favourite_status')
        //                 ->leftjoin('favourite_jobs', 'favourite_jobs.job_id', '=', 'job_masters.id')
        //                 ->where(['job_masters.status' => 1, 'job_masters.user_id' => $user_id])->count();
        
        $jobsFav = FavouriteJobs::where(['favourite_jobs.user_id' => $user_id])->get();
        
        foreach ($jobsFav as $key => $job) {
            $jobs_array[$key] = $job->job_id;
        }
        
        $jobs = JobMaster::select('job_masters.*','company_details.company_name','personal_details.full_name','personal_details.contact_number as employer_contact_number','personal_details.email as employer_email')
                        ->leftjoin('company_details', 'company_details.user_id', '=', 'job_masters.user_id')
                        ->leftjoin('personal_details', 'personal_details.user_id', '=', 'job_masters.user_id')
                        ->paginate(10);
        
        foreach ($jobs as $key => $job) {
            if(in_array($job->id, $jobs_array)){
                $jobs[$key]['favourite_status'] = 1;   
            }else{
                $jobs[$key]['favourite_status'] = 0;   
            }
        }
        return $jobs;
        // $jobsFav = JobMaster::select('job_masters.*','favourite_jobs.favourite_status')
        //                 ->leftjoin('favourite_jobs', 'favourite_jobs.job_id', '=', 'job_masters.id')
        //                 ->where(['job_masters.status' => 1, 'favourite_jobs.user_id' => $user_id])->get();
        $jobs_array = [];

        foreach ($jobsFav as $key => $job) {
            $jobs_array[$key] = $job->id;
        }                

        $jobsMaster = JobMaster::select('job_masters.*',DB::raw('CASE WHEN job_masters.status = 1 THEN 0 end as favourite_status'))
                        ->whereNotIn('id', $jobs_array)
                        ->where(['job_masters.status' => 1])->get();
        $jobs = $jobsFav->merge($jobsMaster);
        $jobs = $jobs->paginate(10);
        return $jobs;
        return response()->json(['jobs' => $jobs, 'jobs_count' => $jobs_count]);
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
        $validateData = $request->validate([
            'uid'=>'required',
            'job_title'=>'required',
            'job_desc'=>'required',
            'job_skill'=>'required',
            'category'=>'required',
            'work_exp_from'=>'required',
            'work_exp_to'=>'required',
            'current_vacancy'=>'required',
            'location_name'=>'required',
            'job_industry'=>'required',
            'company_hiring_for'=>'required',
            'job_functional_area'=>'required',
            // 'job_shift'=>'required',
            // 'job_type'=>'required',
            'education_required'=>'required',
            'candidate_pofile_desc'=>'required',
            // 'job_payment'=>'required',
            'job_live'=>'required',
            // 'job_link'=>'required'
        ]);

        // $salary = $request->salary_range;
        // $salary_new = explode ("-", $salary); 
        // $salary = array_map('trim', $salary_new);
        // $min_salary = $salary[0];
        // $max_salary = $salary[1];

        // if (str_contains($min_salary, 'K')) {
        //     $min_salary = trim($min_salary, 'K');
        //     $min_salary = $min_salary * 1000;
        // } elseif(str_contains($min_salary, 'L')) {
        //     $min_salary = trim($min_salary, 'L');
        //     $min_salary = $min_salary * 100000;
        // }

        // if (str_contains($max_salary, 'K')) {
        //     $max_salary = trim($max_salary, 'K');
        //     $max_salary = $max_salary * 1000;
        // } elseif(str_contains($max_salary, 'L')) {
        //     $max_salary = trim($max_salary, 'L');
        //     $max_salary = $max_salary * 100000;
        // }

        $jobDetails = new JobMaster;
        $jobDetails->user_id = $request->uid;
        $jobDetails->job_title = $request->job_title;
        $jobDetails->job_desc = $request->job_desc;
        $jobDetails->job_skill = $request->job_skill;
        $jobDetails->job_state = $request->job_state;
        $jobDetails->job_city = $request->job_city;
        $jobDetails->category = $request->category;
        $jobDetails->work_exp_from = $request->work_exp_from;
        $jobDetails->work_exp_to = $request->work_exp_to;
        $jobDetails->current_vacancy = $request->current_vacancy;
        $jobDetails->location_name = $request->location_name;
        $jobDetails->job_industry = $request->job_industry;
        $jobDetails->company_hiring_for = $request->company_hiring_for;
        $jobDetails->job_functional_area = $request->job_functional_area;
        $jobDetails->job_role = $request->job_role;
        $jobDetails->job_shift = $request->job_shift;
        $jobDetails->job_type = $request->job_type;
        $jobDetails->education_required = $request->education_required;
        $jobDetails->candidate_pofile_desc = $request->candidate_pofile_desc;
        $jobDetails->job_payment = $request->job_payment;
        $jobDetails->job_live = $request->job_live;
        $jobDetails->job_link = $request->job_link;
        // $jobDetails->annual_salary = $request->annual_salary;
        $jobDetails->min_salary = $request->min_salary;
        $jobDetails->max_salary = $request->max_salary;
        $jobDetails->job_status = 'Live';
        
        $result = $jobDetails->save();

        $planData = PlanManagement::Where('uid',$request->uid)->first();
        $add_job_limit = $planData->job_limit;
        
        $plan = PlanManagement::Where('uid',$request->uid);
            
        $plan->update(['job_limit' => $add_job_limit - 1]);

        $jobUserIid = $request->uid; 
        $companyDetails =  CompanyDetails::where(['user_id' => $jobUserIid])->first();
        $company_name = $companyDetails->company_name;

        $AppicatData =  User::select(
                                        'users.*',
                                        'users.status as user_status',
                                        'applicant_work_histories.industry_type',
                                        'applicant_work_histories.annual_salary'
                                    )
                                    ->leftjoin('applicant_personal_details', 'applicant_personal_details.user_id', '=', 'users.uid')
                                    ->leftjoin('applicant_work_histories', 'applicant_work_histories.user_id', '=', 'users.uid')
                                    ->where(['users.role' => 1])
                                    ->get();
        $min_salary = $request->min_salary;
        $max_salary = $request->max_salary;
        $jobindustry = $request->job_industry;
        foreach ($AppicatData as $key => $data) {
            
            if($data->industry_type != '' && $data->annual_salary != ''){
                $salary = $data->annual_salary;
                
                $salary_new = explode ("-", $salary); 
                $salary = array_map('trim', $salary_new);
                
                // $datamin_salary = '20000';
                $datamin_salary = $salary[0];
                $datamax_salary = $salary[1];
                
                // $datamax_salary = '30000';
                
                if($data->industry_type == $jobindustry && $datamin_salary == $min_salary && $datamax_salary == $max_salary){
                    
                    $applicant_uid = $data->uid;
                    $Role = $data->role;
                    $job_id = $jobDetails->id;;
                    // $applicant_uid = 'V8p9Vew1QdWp2muJADbwdjVsS9i1';

                    $NotifyHandler = new NotificationHandler;

                    $NotifyHandler->notification_id = 3;
                    $NotifyHandler->user_id = $applicant_uid;
                    $NotifyHandler->user_role = $Role;
                    $NotifyHandler->job_id = $request->job_id;

                    $NotifyHandler->save();

                    // $curl = curl_init();
                    // $company_name = 'ABC';
                    // $notificationD = $request->job_title."\n".$jobindustry."\n".$min_salary.'-'.$max_salary;
                    
                    // $msg = [ 
                    //         "title" => "You have new Job Notification",
                    //         "body" => $notificationD
                    //         ];
                            
                    // $postData = [ 
                    //     "to" => "/topics/".$applicant_uid,
                    //     "notification" => $msg,
                    //     "data" => $msg
                    // ];
                    
                    // curl_setopt_array($curl, array(
                    //     CURLOPT_URL => 'https://fcm.googleapis.com/fcm/send',
                    //     CURLOPT_RETURNTRANSFER => true,
                    //     CURLOPT_ENCODING => '',
                    //     CURLOPT_MAXREDIRS => 10,
                    //     CURLOPT_TIMEOUT => 0,
                    //     CURLOPT_FOLLOWLOCATION => true,
                    //     CURLOPT_CUSTOMREQUEST => 'POST',
                    //     CURLOPT_POSTFIELDS => json_encode($postData, JSON_UNESCAPED_SLASHES),
                    //     CURLOPT_HTTPHEADER => array(
                    //         'Accept: application/json',
                    //         'Content-Type: application/json',
                    //         'Authorization: key=AAAAXruf6eY:APA91bFGM1oD3aMh_Lv7v0Szv9L7nVzMWh9MvpjFv7DI4p0A_zCNeZcFSdl9II1uvTWTcBI0lcIUYRKUOeEjHEZmDrkdiBi13AdABWm4roxVywMlu2_mK0iwDLKC7zDKPMdTqP_EcXQO'
                    //     ),
                    // ));
                    
                    // $response = curl_exec($curl);
                    
                    // curl_close($curl);
                    // $dataresponse = json_decode($response,true); 
                    // $message = $dataresponse['message_id'];
                    // return false;
                }

            }
        }
        
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
            return response()->json(["result"=>"New Job details added successfully"]);
        }else{
            return response()->json(["result"=>"Error in added New Job details"]);
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
        $jobDetails = JobMaster::find($id);
        return response()->json(["jobDetails"=>$jobDetails]);
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
        $salary = $request->salary_range;
        $salary_new = explode ("-", $salary); 
        $salary = array_map('trim', $salary_new);
        $min_salary = $salary[0];
        $max_salary = $salary[1];

        if (str_contains($min_salary, 'K')) {
            $min_salary = trim($min_salary, 'K');
            $min_salary = $min_salary * 1000;
        } elseif(str_contains($min_salary, 'L')) {
            $min_salary = trim($min_salary, 'L');
            $min_salary = $min_salary * 100000;
        }

        if (str_contains($max_salary, 'K')) {
            $max_salary = trim($max_salary, 'K');
            $max_salary = $max_salary * 1000;
        } elseif(str_contains($max_salary, 'L')) {
            $max_salary = trim($max_salary, 'L');
            $max_salary = $max_salary * 100000;
        }

        $result = JobMaster::Where('id',$id)->update([
            'job_title' => $request->job_title,
            'job_desc' => $request->job_desc,
            'job_skill' => $request->job_skill,
            'category'=>'required',
            'work_exp_from' => $request->work_exp_from,
            'work_exp_to' => $request->work_exp_to,
            'current_vacancy' => $request->current_vacancy,
            'location_name' => $request->location_name,
            'job_industry' => $request->job_industry,
            'company_hiring_for' => $request->company_hiring_for,
            'job_functional_area' => $request->job_functional_area,
            'job_role' => $request->job_role,
            'job_shift' => $request->job_shift,
            'job_type' => $request->job_type,
            'education_required' => $request->education_required,
            'candidate_pofile_desc' => $request->candidate_pofile_desc,
            'job_payment' => $request->job_payment,
            'job_live' => $request->job_live,
            'job_link' => $request->job_link,
            'job_state' => $request->job_state,
            'job_city' => $request->job_city,
            'min_salary' => $min_salary,
            'max_salary' => $max_salary,
        ]);

        if($result >= 0){
            return response()->json(["result"=>"Job Details Updated successfully"]);
        }else{
            return response()->json(["result"=>"Error in Updating Job details"]);
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
        $user_id = $request->uid; 

        $job_count =  JobMaster::where(['user_id' => $user_id, 'id' => $id, 'status' => 1])->count();
        
        $jobDetails = JobMaster::find($id);
        
        if($job_count > 0){
            $result = $jobDetails->delete();
            
            if($result){
                return response()->json(["result"=>"Job details Deleted successfully"]);
            }else{
                return response()->json(["result"=>"Issue in deleting Job details"]);
            }
        }else{
            return response()->json(["result"=>"No record found"]);
        }
    }

    /**
     * Display a listing of all live jobs.
     *
     * @return \Illuminate\Http\Response
    //  */
    // public function totalJobsLive()
    // {
    //     $user_id = $request->uid; 
        
    //     $jobs_count = JobMaster::where(['user_id' => $user_id, 'job_status' => 3, 'status' => 1])->count();


    //     $Jobs =  JobMaster::where(['user_id' => $user_id, 'job_status' => 3, 'status' => 1])->get();

    //     return response()->json(['Jobs'=> $Jobs, 'jobs_count'=> $jobs_count]);
    // }

    /**
     * Display a listing of all live jobs.
     *
     * @return \Illuminate\Http\Response
     */
    public function totalJobsLive($id)
    {
        $user_id = $id; 
        
        $jobs_count = JobMaster::where(['user_id' => $user_id, 'job_status' => "Live", 'status' => 1])->count();
    
        $Jobs =  JobMaster::select(
            'job_masters.id as job_id',
            'job_masters.*',
            DB::raw('(select count(job_status) from job_management where job_management.job_id=job_masters.id AND job_status = "hired") as hired_count'),
            DB::raw('(select count(job_status) from job_management where job_management.job_id=job_masters.id AND job_status = "under_review") as pending_count')
        )
            ->leftjoin('job_management', 'job_management.job_id', '=', 'job_masters.id')
            ->where(['job_masters.user_id' => $user_id, 'job_masters.job_status' => "Live", 'job_masters.status' => 1])
            ->paginate(10);

        // $Jobs =  JobMaster::where(['user_id' => $user_id, 'job_status' => "Live", 'status' => 1])->paginate(10);
        return $Jobs;
        return response()->json(['Jobs'=> $Jobs, 'jobs_count'=> $jobs_count]);
    }

    /**
     * Display a listing of all closed jobs.
     *
     * @return \Illuminate\Http\Response
     */
    public function totalJobsClosed($id)
    {
        $user_id = $id; 
        
        // $jobs_count = JobMaster::where(['user_id' => $user_id, 'job_status' => 'Close', 'status' => 1])->count();
        // $jobs_count = JobManagement::where(['user_id' => $user_id, 'job_status' => 'Close', 'status' => 1])->count();
        $Jobs =  JobMaster::select(
            'job_masters.id as job_id',
            'job_masters.*',
            DB::raw('(select count(job_status) from job_management where job_management.job_id=job_masters.id AND job_status = "hired") as hired_count'),
            DB::raw('(select count(job_status) from job_management where job_management.job_id=job_masters.id AND job_status = "under_review") as pending_count')
        )
            ->leftjoin('job_management', 'job_management.job_id', '=', 'job_masters.id')
            ->where(['job_masters.user_id' => $user_id, 'job_masters.job_status' => 'Close', 'job_masters.status' => 1])
            ->distinct('job_masters.id')
            ->paginate(10);
            
        // $Jobs =  JobMaster::where(['user_id' => $user_id, 'job_status' => 'Close', 'status' => 1])->paginate(10);
        return $Jobs;
        return response()->json(['Jobs'=> $Jobs, 'jobs_count'=> $jobs_count]);
    }

    /**
     * Update job status to closd.
     *
     * @return \Illuminate\Http\Response
     */
    public function CloseJob($id)
    {
        // $user_id = $request->uid; 
        
        $result = JobMaster::Where(['id' => $id, 'status' => 1])->update([
            'job_status' => 'Close',
        ]);

        if($result){
            return response()->json(["result"=>"Job Closed successfully"]);
        }else{
            return response()->json(["result"=>"Error in closing the job"]);
        }
    }

    /**
     * Update job status to live.
     *
     * @return \Illuminate\Http\Response
     */
    public function LiveJob($id)
    {
        // $user_id = $request->uid; 
        
        $result = JobMaster::Where(['id' => $id, 'status' => 1])->update([
            'job_status' => "Live",
        ]);

        if($result){
            return response()->json(["result"=>"Job status updated successfully"]);
        }else{
            return response()->json(["result"=>"Error in closing the job"]);
        }
    }

    public function updateJobStatus(Request $request)
    {
        $job = JobManagement::where('user_id', $request->uid)
                    ->where('job_id', $request->job_id)
                    ->update(['job_status' => $request->status]);
                    
                    
        $User = User::where('uid', $request->uid)->first();
        
        $jobData =  JobMaster::where(['id' => $request->job_id])->get();
        
        $jobUserIid = $jobData[0]->user_id;
        $jobUserData =  User::where(['uid' => $jobUserIid])->get();
        
        $planData = PlanManagement::Where('uid',$jobUserIid)->first();
        $hiring_limit = $planData->hiring_limit;
        
        $plan = PlanManagement::Where('uid',$jobUserIid);
            
        $plan->update(['hiring_limit' => $hiring_limit - 1]);
        
        $NotifyHandler = new NotificationHandler;

        $NotifyHandler->user_role = $jobUserData[0]->role;
        $NotifyHandler->user_id = $jobData[0]->user_id;
        $NotifyHandler->notification_id = 2;
        $NotifyHandler->deliver_user_id = $request->uid;
        $NotifyHandler->deliver_user_role = $User->role;
        $NotifyHandler->job_id = $request->job_id;
        $NotifyHandler->job_status = $request->status;

        $NotifyHandler->save();
        
        $curl = curl_init();
        
        $path = env('APP_URL');
    
        $Checkstatus = $path.'api/checkStatus';
        
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

        return response()->json(['successMsg' => 'Status updated successfully']);
    }

    public function deleteJobPost($id)
    {
        $job = JobMaster::where('id', $id)
                    ->update(['status' => 0]);
       
        return response()->json(['successMsg' => 'Job deleted successfully']);
    }
    
    public function getAllApplicantsByJobId($job_id)
    {
        // $job_app =  JobManagement::where(['job_id' => $job_id])->get();
        
        
        $job_app =  JobManagement::select(
            'job_management.*',
            'job_management.created_at as job_apply_date',
            'applicant_personal_details.desired_location',
            'applicant_personal_details.profession',
            'applicant_personal_details.profile_image',
            'applicant_personal_details.full_name',
            'users.*'
        ) 
            ->leftjoin('users', 'users.uid', '=', 'job_management.user_id')
            ->leftjoin('applicant_personal_details', 'applicant_personal_details.user_id', '=', 'job_management.user_id')
            ->where(['job_management.job_id' => $job_id])
            ->paginate(10);
        return $job_app;
        return response()->json(["job_sub_type"=>$job_sub_type]);
    }
    
    public function getAllApplicantsByJob($job_id)
    {
        // $job_app =  JobManagement::where(['job_id' => $job_id])->get();
    
        $job_app =  JobManagement::select(
            'job_management.*',
            'applicant_personal_details.desired_location',
            'applicant_personal_details.profession',
            'applicant_personal_details.profile_image',
            'applicant_personal_details.full_name',
            'users.email',
            'users.mobile_number',
            'users.created_at',
            'users.current_signin',
            'users.auth_type'
        ) 
            ->leftjoin('users', 'users.uid', '=', 'job_management.user_id')
            ->leftjoin('applicant_personal_details', 'applicant_personal_details.user_id', '=', 'job_management.user_id')
            ->where(['job_management.job_id' => $job_id])
            ->get();
        return $job_app;
        return response()->json(["job_sub_type"=>$job_sub_type]);
    }
    
    
    public function getApplicantsUnderReview($id)
    {
        $job_id = $id; 
        
        $job_app =  JobManagement::select(
            'job_management.*',
            'job_management.created_at as job_apply_date',
            'applicant_personal_details.desired_location',
            'applicant_personal_details.full_name',
            
              'applicant_personal_details.profile_image',
            'users.*',
             'job_masters.job_title'

        )
            ->leftjoin('users', 'users.uid', '=', 'job_management.user_id')
            ->leftjoin('job_masters', 'job_masters.id', '=', 'job_management.job_id')
            ->leftjoin('applicant_personal_details', 'applicant_personal_details.user_id', '=', 'job_management.user_id')
            ->where(['job_management.job_status' => 'under_review'])
             ->where(['job_management.job_id' => $job_id])
            ->paginate(10);

        // $Jobs =  JobMaster::where(['user_id' => $user_id, 'job_status' => "Live", 'status' => 1])->paginate(10);
        return $job_app;
        return response()->json(['Jobs'=> $Jobs, 'jobs_count'=> $jobs_count]);
    }
    
    public function getApplicantsHired($id)
    {
        $job_id = $id;  
        
        $job_app =  JobManagement::select(
            'job_management.*',
            'job_management.created_at as job_apply_date',
            'applicant_personal_details.desired_location',
             'applicant_personal_details.full_name',
            'applicant_personal_details.profile_image',
            'job_masters.job_title',
             'applicant_personal_details.profile_image',
            'users.*',
             'job_masters.job_title'
        )
            ->leftjoin('users', 'users.uid', '=', 'job_management.user_id')
            ->leftjoin('job_masters', 'job_masters.id', '=', 'job_management.job_id')
            ->leftjoin('applicant_personal_details', 'applicant_personal_details.user_id', '=', 'job_management.user_id')
            ->where(['job_management.job_status' => 'hired'])
            ->where(['job_management.job_id' => $job_id])
            ->paginate(10);

        // $Jobs =  JobMaster::where(['user_id' => $user_id, 'job_status' => "Live", 'status' => 1])->paginate(10);
        return $job_app;
        return response()->json(['Jobs'=> $Jobs, 'jobs_count'=> $jobs_count]);
    }
    
    public function getApplicantsShortListed($id)
    {
        
        $job_id = $id;  
        
        $job_app =  JobManagement::select(
            'job_management.*',
            'job_management.created_at as job_apply_date',
            'applicant_personal_details.desired_location',
            'applicant_personal_details.full_name',
            'applicant_personal_details.profile_image',
            'users.*',
            'job_masters.job_title'
            
        )
       
            ->leftjoin('users', 'users.uid', '=', 'job_management.user_id')
            ->leftjoin('job_masters', 'job_masters.id', '=', 'job_management.job_id')
            ->leftjoin('applicant_personal_details', 'applicant_personal_details.user_id', '=', 'job_management.user_id')
            ->where(['job_management.job_status' => 'shortlist'])
            ->where(['job_management.job_id' => $job_id])
            ->paginate(10);

        // $Jobs =  JobMaster::where(['user_id' => $user_id, 'job_status' => "Live", 'status' => 1])->paginate(10);
        return $job_app;
        return response()->json(['Jobs'=> $Jobs, 'jobs_count'=> $jobs_count]);
    }

    
    public function filterForJobs(Request $request)
    {
        $jobs = JobMaster::query();

        $jobs->select(
            'job_masters.id as job_id',
            'job_masters.*',
            DB::raw('(select count(job_status) from job_management where job_management.job_id=job_masters.id AND job_status = "hired") as hired_count'),
            DB::raw('(select count(job_status) from job_management where job_management.job_id=job_masters.id AND job_status = "under_review") as pending_count')
        )
        ->leftjoin('job_management', 'job_management.job_id', '=', 'job_masters.id')
        ->where(['job_masters.user_id' => $request->job_uid, 'job_masters.status' => 1]);
        
        
        if ($request->job_status != '') {
            $jobs->where('job_masters.job_status', $request->job_status);
        }
        
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
            $jobs->where('job_masters.min_salary', '>=', $request->min_salary);
        }
        
        if ($request->max_salary != '') {
            $jobs->where('job_masters.max_salary','<=', $request->max_salary);
        }
        
        if ($request->state != '') {
            $jobs->where('job_masters.job_state', $request->state);
        }
        if ($request->city != '') {
            $jobs->where('job_masters.job_city', $request->city);
        }
        if ($request->education_required != '') {
            $jobs->where('job_masters.education_required', $request->education_required);
        }
	
        $ans = $jobs->paginate(10);
        return $ans;
    }
    
    
    // public function filterForJobs(Request $request)
    // {
    //     $jobs = JobMaster::query();

    //     $jobs->select(DB::raw(
    //         "job_masters.*,
    //         company_details.*
    //         "
    //     ))
    //     ->leftjoin('company_details', 'company_details.user_id', '=', 'job_masters.user_id')
    //     ->where(['job_masters.user_id' => $request->uid]);
    //     if ($request->job_type != '') {
    //         $jobs->where('job_masters.job_type', $request->job_type);
    //     }
        
    //     if ($request->experiance != '') {
    //         $jobs->where('job_masters.work_exp_from' >= [$request->experiance]);
    //     }

    //     if ($request->min_salary != '') {
    //         $jobs->where('job_masters.min_salary' >= $request->min_salary);
    //     }
        
    //     if ($request->max_salary != '') {
    //         $jobs->where('job_masters.max_salary', $request->max_salary);
    //     }
        
    //     if ($request->state != '') {
    //         $jobs->where('job_masters.job_state', $request->state);
    //     }
    //     if ($request->city != '') {
    //         $jobs->where('job_masters.job_city', $request->city);
    //     }
    //     if ($request->education_required != '') {
    //         $jobs->where('job_masters.education_required', $request->education_required);
    //     }
    
    //     $ans = $jobs->paginate(10);
    //     return $ans;
    // }
    
    public function filterForApplicants(Request $request)
    {
        $users = User::query();

        $users->select(
            'users.id as userid',
            'users.*',
            'applicant_personal_details.*'
            
        )
        ->leftjoin('applicant_personal_details', 'applicant_personal_details.user_id', '=', 'users.uid')
        ->leftjoin('applicant_work_histories', 'applicant_work_histories.user_id', '=', 'users.uid')
        ->where(['users.role' => 1]);
        
        if ($request->full_name != '') {
            $users->where('applicant_personal_details.full_name', $request->full_name);
        }
        
        if ($request->profession != '') {
            $users->where('applicant_personal_details.profession', $request->profession);
        }
        
        if ($request->email != '') {
            $users->where('applicant_personal_details.email', $request->email);
        }
        if ($request->phone_no != '') {
            $users->where('applicant_personal_details.phone_no', $request->phone_no);
        }
        if ($request->dob != '') {
            $users->where('applicant_personal_details.dob', $request->dob);
        }
        if ($request->skills != ''){
            $users->where('applicant_personal_details.skills', $request->skills);
        }
        if ($request->about_me != '') {
            $users->where('applicant_personal_details.about_me', $request->about_me);
        }
        if ($request->desired_location != '') {
            $users->where('applicant_personal_details.desired_location', $request->desired_location);
        }
        
        if ($request->work_status != '') {
            $users->where('applicant_work_histories.work_status', $request->work_status);
        }

        if ($request->work_exp_years != '') {
            $users->where('applicant_work_histories.work_exp_years', $request->work_exp_years);
        }

        if ($request->work_exp_months != '') {
            $users->where('applicant_work_histories.work_exp_months', $request->work_exp_months);
        }

        if ($request->director_reference != '') {
            $users->where('applicant_work_histories.director_reference', $request->director_reference);
        }

        if ($request->industry_type != '') {
            $users->where('applicant_work_histories.industry_type', $request->industry_type);
        }

        if ($request->functional_area != '') {
            $users->where('applicant_work_histories.functional_area', $request->functional_area);
        }

        if ($request->annual_salary != '') {
            $users->where('applicant_work_histories.annual_salary', $request->annual_salary);
        }

        $ans = $users->paginate(10);
        return $ans;
    }
   
    
}
