<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PersonalDetails;
use App\Models\SocialMedia;
use App\Models\CompanyDetails;
use App\Models\Sector;
use App\Models\User;
use App\Models\Plan;
use Carbon\Carbon;
use App\Models\ApplicantPlans;
use App\Models\EmployerPlans;
use App\Models\PlanManagement;
use DB;

class PersonalController extends Controller
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
        $personalDetails = PersonalDetails::all();
        return $personalDetails;
        return response()->json(['personalDetails'=> $personalDetails]);
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
        $userData_count =  PersonalDetails::where(['user_id' => $id, 'status' => 1])->count();
        if($userData_count == 0){
            $user = new PersonalDetails;
            $user->user_id = $request->uid;
            $user->full_name = $request->full_name;
            $user->contact_number = $request->contact_number;
            $user->email = $request->email;
            
            if ($request->profile_img != '') {
                $profile_img = $request->profile_img->store('public/ProfileImages');
                $user['profile_img'] = $profile_img;
            }
            
            // if($profile_img){
            //     $profile_img = $request->$profile_img->store('public/ProfileImages');
            //     return $profile_img;
            //     $user->profile_img = $profile_img;
                
            //     //Get file name with extension
            //     // $fileNameWithExt = $profile_img->getClientOriginalName();
                
            //     // // Get only file name
            //     // $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                
            //     // // Get only the extension
            //     // $fileExt = $profile_img->getClientOriginalExtension();
                
            //     // // file name to store
            //     // // $fileNameToStore = $fileName.'_'.round(microtime(true)).'.'.$fileExt;
            //     // $fileNameToStore = $profile_img->hashName();
             
            //     // $profile_img->store('toPath', ['disk' => 'my_files']);
                
            //     // $user->profile_img = $fileNameToStore;  
            // }

            $result = $user->save();
            if($result){
                return response()->json(["result"=>"User details added successfully"]);
            }else{
                return response()->json(["result"=>"Error in added user details"]);
            }
        }else{
            return response()->json(["result"=>"Data already present please update if you want to change the details."]);
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
        // $user = PersonalDetails::find($id);
                    
        $personalDetails =  PersonalDetails::select('personal_details.*','users.user_email_status')
                            ->leftjoin('users', 'users.uid', '=', 'personal_details.user_id')
                            ->where(['personal_details.user_id' => $id, 'personal_details.status' => 1])
                            ->first();
        return $personalDetails;
        return response()->json(["user"=>$user]);
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
    public function update(Request $request)
    {
        $id = $request->uid;
        
        $user = PersonalDetails::Where('user_id',$id);
        
        if ($request->has('full_name')) {
            $user->update(['full_name' => $request->full_name]);
        }
        
        if ($request->has('contact_number')) {
            $user->update(['contact_number' => $request->contact_number]);
        }
        
        if ($request->has('email')) {
            $user->update(['email' => $request->email]);
        }
        
        if ($request->profile_img != '') {
            $profile_img = $request->profile_img->store('public/ProfileImages');
            // $user['profile_img'] = $profile_img;
            // return $profile_img;
            $user->update(['profile_img' => $profile_img]);
        }
        // $profile_img = $request->file('profile_img');

        // $fileNameToStore = '';

        // if($profile_img){
        //     //Get file name with extension
        //     $fileNameWithExt = $profile_img->getClientOriginalName();
            
        //     // Get only file name
        //     $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            
        //     // Get only the extension
        //     $fileExt = $profile_img->getClientOriginalExtension();
            
        //     // file name to store
        //     // $fileNameToStore = $fileName.'_'.round(microtime(true)).'.'.$fileExt;
        //     $fileNameToStore = $profile_img->hashName();
         
        //     $profile_img->store('toPath', ['disk' => 'my_files']);
        //     $user->update(['profile_img' => $fileNameToStore]);
        // }

        return response()->json(["result"=>"Personal details Updated successfully"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $userData_count =  PersonalDetails::where(['user_id' => $id, 'status' => 1])->count();

        $userData =  PersonalDetails::where(['user_id' => $id, 'status' => 1])->get();
        
        if($userData_count > 0){
            $id = $userData[0]->id;
        
            $user = PersonalDetails::find($id);
            $result = $user->delete();

            if($result){
                return response()->json(["result"=>"Personal details Deleted successfully"]);
            }else{
                return response()->json(["result"=>"Issue in deleting Personal details"]);
            }    
        }else{
                return response()->json(["result"=>"No record found"]);
        }
    }
    
    public function getEmployeerAllDetails($id)
    {
        $user_id = $id;
        $userData = [];   
        $userData['user_details'] =  User::select(
                                        'users.*',
                                        'users.status as user_status',
                                        'plan_management.message_limit as remaining_message_limit',
                                        'plan_management.job_limit as remaining_job_limit',
                                        'plan_management.hiring_limit as remaining_hiring_limit'
                                    )
                                    ->where(['users.uid' => $user_id])
                                    ->leftjoin('plan_management', 'users.uid', '=', 'plan_management.uid')
                                    ->first();
        // $userData['user_details'] =  User::where(['uid' => $user_id])->first();
        $userData['personal_details'] =  PersonalDetails::where(['user_id' => $user_id])->first();

        $userData['social_media_links'] =  SocialMedia::where(['user_id' => $user_id])->first();

        $userData['company_details'] =  CompanyDetails::where(['user_id' => $user_id])->first();

        $userData['sector_details'] =  Sector::where(['user_id' => $user_id])->first();
        // $userData['plan_details'] =  DB::table('users')
        //                             ->where(['uid' => $user_id])
        //                             ->leftjoin('plans','plans.status','=','users.plan')->first();
        // $userData['plan_details'] = Plan::select(
            
        //     // 'plans.status',
        //     'users.plan'
        // )   
        //     ->where(['users.uid' => $id])
        //     ->leftjoin('users', 'users.plan', '=', 'plans.status')->first();
          

        return $userData;
        
        return response()->json(['profile_percent'=> $profile_percent,'userData_details_completed'=> $userData_check,'education_details_completed'=> $document_check,'work_details_completed'=> $education_check,'media_details_completed'=> $work_check,'document_details_completed'=> $media_check]);
    }
    
    
    public function updatePlanStatus(Request $request)
    {
        $user = User::Where('uid',$request->uid);
        
        if($request->status == 'Applicant'){
            $planData = ApplicantPlans::where(['id' => $request->plan_id])->first();
            
            $user->update(['message_limit' => $planData->allowed_messages]);
            $user->update(['job_limit' => $planData->job_applied_limit]);
            
            $message_limit = $planData->allowed_messages;
            $job_limit = $planData->job_applied_limit;
            $hiring_limit = NULL;
        }else{
            $planData = EmployerPlans::where(['id' => $request->plan_id])->first();
        
            $user->update(['message_limit' => $planData->message_limit]);
            $user->update(['job_limit' => $planData->job_post_limit]);
            $user->update(['hiring_limit' => $planData->hiring_limit]);
            
            $message_limit = $planData->message_limit;
            $job_limit = $planData->job_post_limit;
            $hiring_limit = $planData->hiring_limit;
        }    
        
        if ($request->has('plan_id')) {
            $user->update(['plan_id' => $request->plan_id]);
        }
        
        if ($request->has('plan_amount')) {
            $user->update(['plan_amount' => $request->plan_amount]);
        }
        
        if ($request->has('coupon_code')) {
            $user->update(['coupon_code' => $request->coupon_code]);
        }
        
        if ($request->has('coupon_amount')) {
            $user->update(['coupon_amount' => $request->coupon_amount]);
        }
        
        if ($request->has('paid_amount')) {
            $user->update(['paid_amount' => $request->paid_amount]);
        }
        
        $plan_purchase_date = Carbon::today();
        
        $user->update(['plan_name' => $planData->plan_name]);
        $user->update(['plan_duration' => $planData->plan_duration]);
        $user->update(['plan_purchase_date' => $plan_purchase_date]);
        
        $check =  PlanManagement::where(['uid' => $request->uid])->first();
        if($check == ''){
            $plan = new PlanManagement;
            $plan->uid = $request->uid;
            $plan->plan_id = $request->plan_id;
            $plan->plan_name = $planData->plan_name;
            $plan->plan_currency = $planData->plan_currency;
            $plan->plan_amount = $request->plan_amount;
            $plan->coupon_code = $request->coupon_code;
            $plan->coupon_amount = $request->coupon_amount;
            $plan->paid_amount = $request->paid_amount;
            $plan->message_limit = $message_limit;
            $plan->job_limit = $job_limit;
            $plan->hiring_limit = $hiring_limit;
            $plan->plan_duration = $planData->plan_duration;
            $plan->plan_purchase_date = $plan_purchase_date;
        
            $result = $plan->save();    
        }else{
            $plan = PlanManagement::Where('uid',$request->uid);
            
            $plan->update(['plan_id' => $request->plan_id]);
            $plan->update(['plan_name' => $planData->plan_name]);
            $plan->update(['plan_currency' => $planData->plan_currency]);
            $plan->update(['plan_amount' => $request->plan_amount]);
            $plan->update(['coupon_code' => $request->coupon_code]);
            $plan->update(['coupon_amount' => $request->coupon_amount]);
            $plan->update(['paid_amount' => $request->paid_amount]);
            $plan->update(['message_limit' => $message_limit]);
            $plan->update(['job_limit' => $job_limit]);
            $plan->update(['hiring_limit' => $hiring_limit]);
            $plan->update(['plan_duration' => $planData->plan_duration]);
            $plan->update(['plan_purchase_date' => $plan_purchase_date]);

            $planhistory = new PlanHistory;
            $planhistory->uid = $request->uid;
            $planhistory->plan_id = $request->id;
            $planhistory->plan_name = $planData->plan_name;
            $planhistory->plan_currency = $planData->plan_currency;
            $planhistory->plan_amount = $request->plan_amount;
            $planhistory->coupon_code = $request->coupon_code;
            $planhistory->coupon_amount = $request->coupon_amount;
            $planhistory->paid_amount = $request->paid_amount;
            $planhistory->message_limit = $message_limit;
            $planhistory->job_limit = $job_limit;
            $planhistory->hiring_limit = $hiring_limit;
            $planhistory->plan_duration = $planData->plan_duration;
            $planhistory->plan_purchase_date = $plan_purchase_date;
            $result = $planhistory->save();    
            
        }
        
        return response(['sucess' => 'Plan Added Successfully.']);
    }
    
    public function updateEmailStatus(Request $request)
    {
        
        $user = User::Where('uid',$request->uid);
        
        $user->update(['user_email_status' => $request->user_email_status]);
        
        return response(['sucess' => 'Email Status Updated Successfully.']);
    }
     
}
