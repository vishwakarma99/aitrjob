<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Applicants;
use App\Models\User;
use App\Models\PersonalDetails;
use App\Models\JobMaster;
use App\Models\ApplicantPlans;
use App\Models\EmployerPlans;
use App\Models\ApplicantPersonalDetails;
use App\Models\ApplicantEducationalDetails;
use App\Models\ApplicantDocuments;
use App\Models\ApplicantCertificates;
use App\Models\ApplicantVideoDocuments;
use App\Models\ApplicantWorkHistory;
use App\Models\ApplicantSocialMedia;
use App\Models\SocialMedia;
use App\Models\CompanyDetails;
use App\Models\Sector;
use App\Models\State;
use App\Models\Cities;
use App\Models\categories;
use App\Models\JobIndustry;
use App\Models\JobFunctionalArea;
use App\Models\JobShift;
use App\Models\JobEducation;
use App\Models\JobPaymentMaster;
use App\Models\Connector;
use App\Models\JobTypeMaster;
use App\Models\JobSubType;
use App\Models\JobExperiance;
use App\Models\JobSalary;
use App\Models\BlogsMaster;
use App\Models\BlogCategory;
use App\Models\Testimonials;
use App\Models\Slider;
use App\Models\Subscribers;
use App\Models\ManagePages;
use Carbon\Carbon;
use App\Models\PlanHistory;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     
    public function __construct()
    {
        // $this->middleware('auth');
    }
    
    public function index()
    {
        if (Auth::check()) {
                        
            return redirect('admin/dashboard'); 
        }

        return view('login');
    }

    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email', 'password' => 'required'
        ]);   
    
        $credentials = $request->only('email', 'password', 'role');

        
        
         if (Auth::attempt($credentials, $request->has('remember'))) {

            if(Auth::user()->role=='banned'){
                \Auth::logout();
                return array("errors" => 'You account has been banned!');
            }

            return $this->handleUserWasAuthenticated($request);
        }

       // return array("errors" => 'The email or the password is invalid. Please try again.');
        //return redirect('/admin');
       return redirect('/admin')->withErrors('The email or the password is invalid. Please try again.');
        
    }

    protected function handleUserWasAuthenticated(Request $request)
    {

        if (method_exists($this, 'authenticated')) {
            return $this->authenticated($request, Auth::user());
        }
        
        return redirect('admin/dashboard'); 
    }
    
    /**
     * Log the user out of the application.
     *
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        Auth::logout();

        return redirect('admin/');
        // return redirect('/');
    }

    public function dashboard()
    {
        $appUsersCount =  User::where(['role' => 1])->count();
        $empUsersCount =  User::where(['role' => 2])->count();
        $jobsCount =  JobMaster::all()->count();
        
        $appUsers = User::select(
            '*',
            'users.created_at as reg_date',
            'users.email as email_id',
            'applicant_personal_details.desired_location'
        )
        ->leftjoin('applicant_work_histories', 'applicant_work_histories.user_id', '=', 'users.uid')
        ->leftjoin('applicant_personal_details', 'applicant_personal_details.user_id', '=', 'users.uid')
        ->where('users.role', 1)->orderBy('users.id', 'DESC')->take(5)->get();

        $employerUsers = User::select(
            '*',
            'users.email as email_id',
            'company_details.company_name'
        )->leftjoin('company_details', 'company_details.user_id', '=', 'users.uid')
        ->leftjoin('personal_details', 'personal_details.user_id', '=', 'users.uid')
        ->leftjoin('sectors', 'sectors.user_id', '=', 'users.uid')
        ->where('role', 2)->orderBy('users.id', 'DESC')->take(5)->get();
        
        $appAllUsers = User::select(
            '*',
            'users.created_at as reg_date',
            'applicant_personal_details.email as email_id',
            'applicant_personal_details.desired_location'
        )
        ->leftjoin('applicant_work_histories', 'applicant_work_histories.user_id', '=', 'users.uid')
        ->leftjoin('applicant_personal_details', 'applicant_personal_details.user_id', '=', 'users.uid')
        ->where('users.role', 1)->orderBy('users.id', 'DESC')->get();

        $employerAllUsers = User::select(
            '*',
            'personal_details.email as email_id',
            'company_details.company_name'
        )->leftjoin('company_details', 'company_details.user_id', '=', 'users.uid')
        ->leftjoin('personal_details', 'personal_details.user_id', '=', 'users.uid')
        ->leftjoin('sectors', 'sectors.user_id', '=', 'users.uid')
        ->where('role', 2)->orderBy('users.id', 'DESC')->get();
        
        
        return view('dashboard',compact('appUsersCount','empUsersCount','appUsers','employerUsers','appAllUsers','employerAllUsers','jobsCount'));
        
    }

    public function getApplicantsList()
    {
        $appUsers = User::select(
            '*',
            'users.id as user_id',
            'users.status as user_status',
            'users.created_at as reg_date',
            'users.email as email_id',
            'applicant_personal_details.desired_location'
        )
        ->leftjoin('applicant_work_histories', 'applicant_work_histories.user_id', '=', 'users.uid')
        ->leftjoin('applicant_personal_details', 'applicant_personal_details.user_id', '=', 'users.uid')
        ->where('users.role', 1)->orderBy('users.id', 'DESC')->get();
        
        return view('job_seekers')->with('appUsers', $appUsers);
        
    }

    public function getAllSubscribers()
    {

        $Subscribers = Subscribers::get();
        
        return view('subscribers')->with('Subscribers', $Subscribers);
        
    }


    public function getApplicantsTransactionsList()
    {
        $appUsers = User::select(
            'users.uid as UID',
            'plan_histories.*',
            'users.id as user_id',
            'users.email as email_id',
            'applicant_personal_details.full_name',
            'applicant_personal_details.desired_location'
        )
        ->leftjoin('plan_histories', 'plan_histories.uid', '=', 'users.uid')
        ->leftjoin('applicant_personal_details', 'applicant_personal_details.user_id', '=', 'users.uid')
        ->where('users.role', 1)->orderBy('users.id', 'DESC')->get();

        $appAmount = $Jobs = User::select(DB::raw("SUM(plan_histories.paid_amount) as total_paid_amount"))
                    ->leftjoin('plan_histories', 'plan_histories.uid', '=', 'users.uid')
                    ->where('users.role', 1)
                    ->get();
                    
        $janAmount = $Jobs = User::select(DB::raw("SUM(plan_histories.paid_amount) as total_paid_amount"))
                    ->leftjoin('plan_histories', 'plan_histories.uid', '=', 'users.uid')
                    ->where('users.role', 1)
                    ->whereMonth('plan_histories.created_at', '1')
                    ->first();
        $febAmount = $Jobs = User::select(DB::raw("SUM(plan_histories.paid_amount) as total_paid_amount"))
                    ->leftjoin('plan_histories', 'plan_histories.uid', '=', 'users.uid')
                    ->where('users.role', 1)
                    ->whereMonth('plan_histories.created_at', '2')
                    ->first();
        $marAmount = $Jobs = User::select(DB::raw("SUM(plan_histories.paid_amount) as total_paid_amount"))
                    ->leftjoin('plan_histories', 'plan_histories.uid', '=', 'users.uid')
                    ->where('users.role', 1)
                    ->whereMonth('plan_histories.created_at', '3')
                    ->first();
        $aprAmount = $Jobs = User::select(DB::raw("SUM(plan_histories.paid_amount) as total_paid_amount"))
                    ->leftjoin('plan_histories', 'plan_histories.uid', '=', 'users.uid')
                    ->where('users.role', 1)
                    ->whereMonth('plan_histories.created_at', '4')
                    ->first();
        $mayAmount = $Jobs = User::select(DB::raw("SUM(plan_histories.paid_amount) as total_paid_amount"))
                    ->leftjoin('plan_histories', 'plan_histories.uid', '=', 'users.uid')
                    ->where('users.role', 1)
                    ->whereMonth('plan_histories.created_at', '5')
                    ->first();
        $junAmount = $Jobs = User::select(DB::raw("SUM(plan_histories.paid_amount) as total_paid_amount"))
                    ->leftjoin('plan_histories', 'plan_histories.uid', '=', 'users.uid')
                    ->where('users.role', 1)
                    ->whereMonth('plan_histories.created_at', '6')
                    ->first();
        $julAmount = $Jobs = User::select(DB::raw("SUM(plan_histories.paid_amount) as total_paid_amount"))
                    ->leftjoin('plan_histories', 'plan_histories.uid', '=', 'users.uid')
                    ->where('users.role', 1)
                    ->whereMonth('plan_histories.created_at', '7')
                    ->first();
        $augAmount = $Jobs = User::select(DB::raw("SUM(plan_histories.paid_amount) as total_paid_amount"))
                    ->leftjoin('plan_histories', 'plan_histories.uid', '=', 'users.uid')
                    ->where('users.role', 1)
                    ->whereMonth('plan_histories.created_at', '8')
                    ->first();
        $sepAmount = $Jobs = User::select(DB::raw("SUM(plan_histories.paid_amount) as total_paid_amount"))
                    ->leftjoin('plan_histories', 'plan_histories.uid', '=', 'users.uid')
                    ->where('users.role', 1)
                    ->whereMonth('plan_histories.created_at', '9')
                    ->first();
        $octAmount = $Jobs = User::select(DB::raw("SUM(plan_histories.paid_amount) as total_paid_amount"))
                    ->leftjoin('plan_histories', 'plan_histories.uid', '=', 'users.uid')
                    ->where('users.role', 1)
                    ->whereMonth('plan_histories.created_at', '10')
                    ->first();
        $novAmount = $Jobs = User::select(DB::raw("SUM(plan_histories.paid_amount) as total_paid_amount"))
                    ->leftjoin('plan_histories', 'plan_histories.uid', '=', 'users.uid')
                    ->where('users.role', 1)
                    ->whereMonth('plan_histories.created_at', '11')
                    ->first();
        $decAmount = $Jobs = User::select(DB::raw("SUM(plan_histories.paid_amount) as total_paid_amount"))
                    ->leftjoin('plan_histories', 'plan_histories.uid', '=', 'users.uid')
                    ->where('users.role', 1)
                    ->whereMonth('plan_histories.created_at', '12')
                    ->first();
        
        
        return view('job_seekers_transactions')->with('appUsers', $appUsers)->with('appAmount', $appAmount)->with('janAmount', $janAmount)->with('febAmount', $febAmount)->with('marAmount', $marAmount)->with('aprAmount', $aprAmount)->with('mayAmount', $mayAmount)->with('junAmount', $junAmount)->with('julAmount', $julAmount)->with('augAmount', $augAmount)->with('sepAmount', $sepAmount)->with('octAmount', $octAmount)->with('novAmount', $novAmount)->with('decAmount', $decAmount);
        
    }

    public function getEmployeeTransactionsList()
    {
        $appUsers = User::select(
            'users.uid as UID',
            'plan_histories.*',
            'users.id as user_id',
            'users.email as email_id',
            'applicant_personal_details.full_name',
            'applicant_personal_details.desired_location'
        )
        ->leftjoin('plan_histories', 'plan_histories.uid', '=', 'users.uid')
        ->leftjoin('applicant_personal_details', 'applicant_personal_details.user_id', '=', 'users.uid')
        ->where('users.role', 2)->orderBy('users.id', 'DESC')->get();

        $appAmount = $Jobs = User::select(DB::raw("SUM(plan_histories.paid_amount) as total_paid_amount"))
                    ->leftjoin('plan_histories', 'plan_histories.uid', '=', 'users.uid')
                    ->where('users.role', 2)
                    ->get();
        
        $janAmount = $Jobs = User::select(DB::raw("SUM(plan_histories.paid_amount) as total_paid_amount"))
                    ->leftjoin('plan_histories', 'plan_histories.uid', '=', 'users.uid')
                    ->where('users.role', 2)
                    ->whereMonth('plan_histories.created_at', '1')
                    ->first();
        $febAmount = $Jobs = User::select(DB::raw("SUM(plan_histories.paid_amount) as total_paid_amount"))
                    ->leftjoin('plan_histories', 'plan_histories.uid', '=', 'users.uid')
                    ->where('users.role', 2)
                    ->whereMonth('plan_histories.created_at', '2')
                    ->first();
        $marAmount = $Jobs = User::select(DB::raw("SUM(plan_histories.paid_amount) as total_paid_amount"))
                    ->leftjoin('plan_histories', 'plan_histories.uid', '=', 'users.uid')
                    ->where('users.role', 2)
                    ->whereMonth('plan_histories.created_at', '3')
                    ->first();
        $aprAmount = $Jobs = User::select(DB::raw("SUM(plan_histories.paid_amount) as total_paid_amount"))
                    ->leftjoin('plan_histories', 'plan_histories.uid', '=', 'users.uid')
                    ->where('users.role', 2)
                    ->whereMonth('plan_histories.created_at', '4')
                    ->first();
        $mayAmount = $Jobs = User::select(DB::raw("SUM(plan_histories.paid_amount) as total_paid_amount"))
                    ->leftjoin('plan_histories', 'plan_histories.uid', '=', 'users.uid')
                    ->where('users.role', 2)
                    ->whereMonth('plan_histories.created_at', '5')
                    ->first();
        $junAmount = $Jobs = User::select(DB::raw("SUM(plan_histories.paid_amount) as total_paid_amount"))
                    ->leftjoin('plan_histories', 'plan_histories.uid', '=', 'users.uid')
                    ->where('users.role', 2)
                    ->whereMonth('plan_histories.created_at', '6')
                    ->first();
        $julAmount = $Jobs = User::select(DB::raw("SUM(plan_histories.paid_amount) as total_paid_amount"))
                    ->leftjoin('plan_histories', 'plan_histories.uid', '=', 'users.uid')
                    ->where('users.role', 2)
                    ->whereMonth('plan_histories.created_at', '7')
                    ->first();
        $augAmount = $Jobs = User::select(DB::raw("SUM(plan_histories.paid_amount) as total_paid_amount"))
                    ->leftjoin('plan_histories', 'plan_histories.uid', '=', 'users.uid')
                    ->where('users.role', 2)
                    ->whereMonth('plan_histories.created_at', '8')
                    ->first();
        $sepAmount = $Jobs = User::select(DB::raw("SUM(plan_histories.paid_amount) as total_paid_amount"))
                    ->leftjoin('plan_histories', 'plan_histories.uid', '=', 'users.uid')
                    ->where('users.role', 2)
                    ->whereMonth('plan_histories.created_at', '9')
                    ->first();
        $octAmount = $Jobs = User::select(DB::raw("SUM(plan_histories.paid_amount) as total_paid_amount"))
                    ->leftjoin('plan_histories', 'plan_histories.uid', '=', 'users.uid')
                    ->where('users.role', 2)
                    ->whereMonth('plan_histories.created_at', '10')
                    ->first();
        $novAmount = $Jobs = User::select(DB::raw("SUM(plan_histories.paid_amount) as total_paid_amount"))
                    ->leftjoin('plan_histories', 'plan_histories.uid', '=', 'users.uid')
                    ->where('users.role', 2)
                    ->whereMonth('plan_histories.created_at', '11')
                    ->first();
        $decAmount = $Jobs = User::select(DB::raw("SUM(plan_histories.paid_amount) as total_paid_amount"))
                    ->leftjoin('plan_histories', 'plan_histories.uid', '=', 'users.uid')
                    ->where('users.role', 2)
                    ->whereMonth('plan_histories.created_at', '12')
                    ->first();
        
        
        return view('employers_transactions')->with('appUsers', $appUsers)->with('appAmount', $appAmount)->with('janAmount', $janAmount)->with('febAmount', $febAmount)->with('marAmount', $marAmount)->with('aprAmount', $aprAmount)->with('mayAmount', $mayAmount)->with('junAmount', $junAmount)->with('julAmount', $julAmount)->with('augAmount', $augAmount)->with('sepAmount', $sepAmount)->with('octAmount', $octAmount)->with('novAmount', $novAmount)->with('decAmount', $decAmount);
        
    }


    public function getApplicantProfile($uid)
    {
        $user_id = $uid;
        $userData = [];        
        $userData['personal_details'] =  ApplicantPersonalDetails::where(['user_id' => $user_id])->first();

        $userData['educational_details'] =  ApplicantEducationalDetails::where(['user_id' => $user_id])->first();

        $userData['work_history'] =  ApplicantWorkHistory::where(['user_id' => $user_id])->first();

        $userData['other_details'] =  ApplicantSocialMedia::where(['user_id' => $user_id])->first();
        
        $userData['upload_resume'] =  ApplicantDocuments::where(['user_id' => $user_id])->first();
        $userData['upload_certificates'] =  ApplicantCertificates::where(['user_id' => $user_id])->get();
        $userData['upload_video_link'] =  ApplicantVideoDocuments::where(['user_id' => $user_id])->first();
      
        $userData['plan_details'] = ApplicantPlans::select(    
            '*',
            'users.plan_name'
        )   
            ->where(['users.uid' => $user_id])
            ->leftjoin('users', 'users.plan_id', '=', 'applicant_plans.id')->first();
        
        return view('applicant_profile')->with('userData', $userData);
        
    }

    public function getEmployerProfile($uid)
    {
        $user_id = $uid;
        $userData = [];        
        $userData['personal_details'] =  PersonalDetails::where(['user_id' => $user_id])->first();

        $userData['social_media_links'] =  SocialMedia::where(['user_id' => $user_id])->first();

        $userData['company_details'] =  CompanyDetails::where(['user_id' => $user_id])->first();

        $userData['sector_details'] =  Sector::where(['user_id' => $user_id])->first();
      
        $userData['plan_details'] = EmployerPlans::select(    
            '*',
            'users.plan_name'
        )   
            ->where(['users.uid' => $user_id])
            ->leftjoin('users', 'users.plan_id', '=', 'employer_plans.id')->first();
        
        return view('employer_profile')->with('userData', $userData);
        
    }

    public function getEmployeeList()
    {
        $appUsers = User::select(
            '*',
            'users.created_at as reg_date',
            'users.id as user_id',
            'users.status as user_status',
            'users.email as email_id'
        )->leftjoin('company_details', 'company_details.user_id', '=', 'users.uid')
        ->leftjoin('personal_details', 'personal_details.user_id', '=', 'users.uid')
        ->leftjoin('sectors', 'sectors.user_id', '=', 'users.uid')
        ->where('users.role', 2)->orderBy('users.id', 'DESC')->get();

        return view('employers_list')->with('appUsers', $appUsers);        
    }

    public function managePages()
    {
        $managePages = ManagePages::get();
        
        return view('manage_pages')->with('managePages', $managePages);        
    }

    public function getApplicantPlanList()
    {
        $appUsers = User::select(
            '*',
            'users.created_at as reg_date',
            'users.email as email_id'
        )->leftjoin('company_details', 'company_details.user_id', '=', 'users.uid')
        ->leftjoin('personal_details', 'personal_details.user_id', '=', 'users.uid')
        ->leftjoin('sectors', 'sectors.user_id', '=', 'users.uid')
        ->leftjoin('plans', 'plans.id', '=', 'users.plan')
        ->where('users.role', 2)->orderBy('users.id', 'DESC')->get();

        return view('applicant_plans_list')->with('appUsers', $appUsers);        
    }

    public function addStateForm()
    {  
        $states = State::get();
        
        return view('add_states')->with('states', $states);
            return view('add_states');
            // $categories = Category::get();
            return view('add_partner')->with('categories', $categories);   
    }

    public function getAppPlanList()
    {
        $appplans = ApplicantPlans::get();

        return view('applicant_plans_list')->with('appplans', $appplans);        
    }

    public function addAppPlanForm()
    {  
        $appplans = ApplicantPlans::get();
        
        return view('add_seekerplan')->with('appplans', $appplans);
    }

    public function addAppPlan(Request $request)
    {
        $appplan = new ApplicantPlans;
        
        $appplan['plan_name'] = $request->plan_name;
        $appplan['plan_currency'] = $request->plan_currency;
        $appplan['plan_amount'] = $request->plan_amount;
        $appplan['coupon_code'] = $request->coupon_code;
        $appplan['coupon_amount'] = $request->coupon_amount;
        $appplan['allowed_messages'] = $request->allowed_messages;
        $appplan['job_applied_limit'] = $request->job_applied_limit;
        $appplan['plan_duration'] = $request->plan_duration;
        $appplan['plan_url'] = $request->plan_url;
        $appplan['plan_coupon_url'] = $request->plan_coupon_url;
        
        $result = $appplan->save();

        $plan_id = $appplan->id;
    
        $path = env('APP_URL');
    
        
        $callback_url = $path.'myProfile?Plan='.$plan_id;
        
        $Plan = ApplicantPlans::where('id', $plan_id);

        $Plan->update(['callback_url' => $callback_url]);    
        \Session::flash('flash_message', 'Plan Added Succesfully');
        \Session::flash('callback_message', $callback_url);
        
        return redirect('admin/addnewseekerplan');
    }

    public function updateAppPlan(Request $request,$id)
    {   
        // validate the user input
        // $data =  \Request::except(array('_token')) ;
        
        // $rule=array(
        //     'plan_name' => 'required',
        //     'plan_currency' => 'required',
        //     'plan_amount' => 'required',
        // );
        
        // $validator = \Validator::make($data,$rule);
 
        // if ($validator->fails()){
        //     return redirect()->back()->withInput()->withErrors($validator->messages());
        // }

        //storing the data to database
        // create new instance of county model
        $appplan = ApplicantPlans::findOrFail($id);
        
        $appplan->plan_name = $request->plan_name;
        $appplan->plan_currency = $request->plan_currency;
        $appplan->plan_amount = $request->plan_amount;
        $appplan->coupon_code = $request->coupon_code;
        $appplan->coupon_amount = $request->coupon_amount;
        $appplan->allowed_messages = $request->allowed_messages;
        $appplan->job_applied_limit = $request->job_applied_limit;
        $appplan->plan_duration = $request->plan_duration;
        $appplan->plan_url = $request->plan_url;
        $appplan->plan_coupon_url = $request->plan_coupon_url;
        $appplan->save();

        \Session::flash('flash_message', 'Updated Succesfully');
        
        return redirect()->back();

    }

    public function showAppPlan($id)
    {   
        $appplan = ApplicantPlans::where('id',$id)->first();             
        
        return view('edit_seekerplan',compact('appplan'));        
    }

    
    public function addEmpPlanForm()
    {  
        $empplans = EmployerPlans::get();
        
        return view('add_empplan')->with('empplans', $empplans);
    }

    public function addEmpPlan(Request $request)
    {
        // // validate the user input
        // $data =  \Request::except(array('_token')) ;
        
        // $rule=array(
        //     'plan_name' => 'required|unique:employer_plans',
        //     'plan_currency' => 'required',
        //     'plan_amount' => 'required',
        //     // 'benefit1' => 'required',
        //     // 'benefit2' => 'required',
        //     // 'benefit3' => 'required',
        //     // 'benefit4' => 'required',
        //     // 'benefit5' => 'required',
        // );
        
        // $validator = \Validator::make($data,$rule);
 
        // if ($validator->fails()){
        //     return redirect()->back()->withInput()->withErrors($validator->messages());
        // } 
        
        $empplan = new EmployerPlans;
        
        $empplan['plan_name'] = $request->plan_name;
        $empplan['plan_currency'] = $request->plan_currency;
        $empplan['plan_amount'] = $request->plan_amount;
        $empplan['message_limit'] = $request->message_limit;
        $empplan['job_post_limit'] = $request->job_post_limit;
        $empplan['hiring_limit'] = $request->hiring_limit;
        $empplan['coupon_code'] = $request->coupon_code;
        $empplan['coupon_amount'] = $request->coupon_amount;
        $empplan['plan_url'] = $request->plan_url;
        $empplan['plan_coupon_url'] = $request->plan_coupon_url;
        
        // $empplan['benefit1'] = $request->benefit1;
        // $empplan['benefit2'] = $request->benefit2;
        // $empplan['benefit3'] = $request->benefit3;
        // $empplan['benefit4'] = $request->benefit4;
        // $empplan['benefit5'] = $request->benefit5;
        $empplan['plan_duration'] = $request->plan_duration;
            
        $result = $empplan->save();
        $plan_id = $empplan->id;
    
        $path = env('APP_URL');
    
        $callback_url = $path.'myProfile?Plan='.$plan_id;
        
        $Plan = EmployerPlans::where('id', $plan_id);

        $Plan->update(['callback_url' => $callback_url]);    
        \Session::flash('flash_message', 'Plan Added Succesfully');
        \Session::flash('callback_message', $callback_url);
        
        return redirect('admin/addnewempplan');
    }

    public function getEmployeePlanList()
    {
        // $appUsers = User::select(
        //     '*',
        //     'users.created_at as reg_date',
        //     'users.email as email_id'
        // )->leftjoin('company_details', 'company_details.user_id', '=', 'users.uid')
        // ->leftjoin('personal_details', 'personal_details.user_id', '=', 'users.uid')
        // ->leftjoin('sectors', 'sectors.user_id', '=', 'users.uid')
        // ->leftjoin('plans', 'plans.id', '=', 'users.plan')
        // ->where('users.role', 2)->orderBy('users.id', 'DESC')->get();
        
        $empplans = EmployerPlans::get();

        return view('employer_plans_list')->with('empplans', $empplans);        
    }

    public function updateEmpPlan(Request $request,$id)
    {   
        // validate the user input
        // $data =  \Request::except(array('_token')) ;
        
        // $rule=array(
        //     'plan_name' => 'required',
        //     'plan_currency' => 'required',
        //     'plan_amount' => 'required',
        //     // 'benefit1' => 'required',
        //     // 'benefit2' => 'required',
        //     // 'benefit3' => 'required',
        //     // 'benefit4' => 'required',
        //     // 'benefit5' => 'required',
        // );
        
        // $validator = \Validator::make($data,$rule);
 
        // if ($validator->fails()){
        //     return redirect()->back()->withInput()->withErrors($validator->messages());
        // }

        //storing the data to database
        // create new instance of county model
        $empplan = EmployerPlans::findOrFail($id);
        
        $empplan->plan_name = $request->plan_name;
        $empplan->plan_currency = $request->plan_currency;
        $empplan->plan_amount = $request->plan_amount;
        $empplan->message_limit = $request->message_limit;
        $empplan->job_post_limit = $request->job_post_limit;
        $empplan->hiring_limit = $request->hiring_limit;
        $empplan->coupon_code = $request->coupon_code;
        $empplan->coupon_amount = $request->coupon_amount;
        $empplan->plan_url = $request->plan_url;
        $empplan->plan_coupon_url = $request->plan_coupon_url;
        
        // $empplan->benefit1 = $request->benefit1;
        // $empplan->benefit2 = $request->benefit2;
        // $empplan->benefit3 = $request->benefit3;
        // $empplan->benefit4 = $request->benefit4;
        // $empplan->benefit5 = $request->benefit5;
        $empplan->plan_duration = $request->plan_duration;
        
        $empplan->save();

        \Session::flash('flash_message', 'Updated Succesfully');
        
        return redirect()->back();

    }

    public function showEmpPlan($id)
    {   
        $empplan = EmployerPlans::where('id',$id)->first();             
        
        return view('edit_empplan',compact('empplan'));        
    }

    public function getPageManageData($id)
    {   
        $data = ManagePages::where('id',$id)->first();             
        
        return view('edit_pagemanage',compact('data'));        
    }

    public function viewEmployerJobs($id)
    {   
        $jobs = JobMaster::where('user_id',$id)->orderBy('id', 'DESC')->get();             
        
        return view('jobs',compact('jobs'));        
    }

    public function viewHighlightedJobs()
    {   
        $jobs = JobMaster::where('highlight_job_status',1)->orderBy('id', 'DESC')->get();             
        
        return view('highlight_jobs',compact('jobs'));        
    }
    

    public function addState(Request $request)
    {
        // validate the user input
        $data =  \Request::except(array('_token')) ;
        
        $rule=array(
            'state' => 'required|unique:states',
        );
        
        $validator = \Validator::make($data,$rule);
 
        if ($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator->messages());
        } 
        
        $state = new State;
        
        $state['state'] = $request->state;
        
        $result = $state->save();

        \Session::flash('flash_message', 'State Added Succesfully');
        
        return redirect('admin/addnewstate');
    }

    public function getStatesList()
    {
        $states = State::get();
        
        return view('states_list')->with('states', $states);
        
    }

    public function deleteState($id)
    {   

        $partner = State::where('id',$id)->first();             
        $partner->delete();

        \Session::flash('flash_message', 'State Deleted successfully');

        return redirect()->back();

    }

    public function deleteUser($id)
    {   
        $user = User::where('id',$id)->first();             
        $user->delete();

        \Session::flash('flash_message', 'User Deleted successfully');

        return redirect()->back();

    }

    public function updateState(Request $request,$id)
    {   
        // validate the user input
        $data =  \Request::except(array('_token')) ;
        
        $rule=array(
            'state' => 'required|unique:states',
        );
        
        $validator = \Validator::make($data,$rule);
 
        if ($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator->messages());
        } 
        
        //storing the data to database
        // create new instance of county model
        $state = State::findOrFail($id);
        
        $state->state = $request->state;
        
        $state->save();

        \Session::flash('flash_message', 'Updated Succesfully');
        
        return redirect()->back();

    }

    public function updateManagePage(Request $request,$id)
    {   

        // validate the user input
        $data =  \Request::except(array('_token')) ;
        
        $rule=array(
            'description' => 'required',
        );
        
        $validator = \Validator::make($data,$rule);
 
        if ($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator->messages());
        } 
        
        //storing the data to database
        // create new instance of county model
        $page = ManagePages::findOrFail($id);
        
        $page->description = $request->description;
        
        $page->save();

        \Session::flash('flash_message', 'Updated Succesfully');
        
        return redirect('admin/managePages');

    }

    public function showState($id)
    {   
        
        $state = State::where('id',$id)->first();             
        
        return view('edit_state',compact('state'));        
    }

    
    public function updateUserStatus($id,$status)
    {
        $user = User::findOrFail($id);
        if($status == 1){
            $user->status = 0;
        }else{
            $user->status = 1;
        }
        $user->save();
        \Session::flash('flash_message', 'Status Updated Succesfully');
        
        return redirect()->back();
    }


    public function updateEmployerStatus($id,$status)
    {
        $user = User::findOrFail($id);
        if($status == 1){
            $user->status = 0;
        }else{
            $user->status = 1;
        }
        $user->save();
        \Session::flash('flash_message', 'Status Updated Succesfully');
        
        return redirect()->back();
    }

    public function addCityForm()
    {  
        $cities =  Cities::select(
            '*',
            'cities.id as city_id'
        )
            ->leftjoin('states', 'cities.state_id', '=', 'states.id')
            ->get();
        
        
        $states = State::get();
        
        return view('add_city', compact('cities', 'states'));
            return view('add_cities');
            // $categories = Category::get();
            return view('add_partner')->with('categories', $categories);   
    }

    public function addCity(Request $request)
    {
        // validate the user input
        $data =  \Request::except(array('_token')) ;
        
        $rule=array(
            'city' => 'required|unique:cities',
        );
        
        $validator = \Validator::make($data,$rule);
 
        if ($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator->messages());
        } 
        
        $city = new Cities;
        
        $city['city'] = $request->city;
        $city['state_id'] = $request->state_id;
        
        $result = $city->save();

        \Session::flash('flash_message', 'State Added Succesfully');
        
        return redirect('admin/addnewcity');
    }

    public function deleteCity($id)
    {   

        $city = Cities::where('id',$id)->first();             
        $city->delete();

        \Session::flash('flash_message', 'State Deleted successfully');

        return redirect()->back();

    }

    public function updateCity(Request $request,$id)
    {   
        // validate the user input
        $data =  \Request::except(array('_token')) ;
        
        $rule=array(
            'city' => 'required|unique:cities',
        );
        
        $validator = \Validator::make($data,$rule);
 
        if ($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator->messages());
        } 
        
        //storing the data to database
        // create new instance of county model
        $city = Cities::findOrFail($id);
        
        $city->state_id = $request->state;
        $city->city = $request->city;
        
        $city->save();

        \Session::flash('flash_message', 'Updated Succesfully');
        
        return redirect()->back();

    }

    public function showCity($id)
    {   
        $states = State::get();
        
        $city =  Cities::select(
            '*',
            'cities.id as city_id',
            'states.id as state_id'
        )
            ->where('cities.id',$id)
            ->leftjoin('states', 'cities.state_id', '=', 'states.id')
            ->first();
        
        return view('edit_city',compact('city','states'));        
    }

    public function addJobIndustryForm()
    {  
        $jobindustry = JobIndustry::get();
        
        return view('add_jobindustry', compact('jobindustry'));
    }

    public function addJobIndustry(Request $request)
    {
        // validate the user input
        $data =  \Request::except(array('_token')) ;
        
        $rule=array(
            'job_industry_name' => 'required|unique:job_industries',
        );
        
        $validator = \Validator::make($data,$rule);
 
        if ($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator->messages());
        } 
        
        $job_industry = new JobIndustry;
        
        $job_industry['job_industry_name'] = $request->job_industry_name;
        
        $result = $job_industry->save();

        \Session::flash('flash_message', 'Job Industry Added Succesfully');
        
        return redirect('admin/addnewjobindustry');
    }

    public function deleteJobIndustry($id)
    {   

        $job_industry = JobIndustry::where('id',$id)->first();             
        $job_industry->delete();

        \Session::flash('flash_message', 'Job Industry Deleted successfully');

        return redirect()->back();

    }

    public function updateJobIndustry(Request $request,$id)
    {   
        // validate the user input
        $data =  \Request::except(array('_token')) ;
        
        $rule=array(
            'job_industry_name' => 'required|unique:job_industries',
        );
        
        $validator = \Validator::make($data,$rule);
 
        if ($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator->messages());
        } 
        
        //storing the data to database
        // create new instance of county model
        $job_industry = JobIndustry::findOrFail($id);
        
        $job_industry->job_industry_name = $request->job_industry_name;
        
        $job_industry->save();

        \Session::flash('flash_message', 'Updated Succesfully');
        
        return redirect()->back();

    }

    public function showJobIndustry($id)
    {           
        $jobindustry =  JobIndustry::where('id',$id)->first();
        
        return view('edit_jobindustry',compact('jobindustry'));        
    }

    public function oldpayter()
    {
        $unit = 'kWh,Wh';
        $Units = explode (",", $unit); 
        // $connection = DB::table('connector_meter_value_copy')->where('connector_pk', 171)->where('reading_context', 'Transaction.Begin')->get();

        // return $connection;
        $tPKCount = Connector::selectRaw('COUNT(DISTINCT transaction_pk) as countTP')
            ->where('reading_context', 'Transaction.Begin')
            ->where('connector_pk', 171)
            ->first();
        // return $tPKCount;

        // $tPKCount =  Connector::select(
        //     DB::raw('(SELECT COUNT(DISTINCT transaction_pk) FROM connector_meter_value_copy where connector_pk=171) as countTP'),
        // )->get();

        if($tPKCount->countTP <= 1){
            $connection = Connector::where('connector_pk', 127)->where('reading_context', 'Transaction.Begin');

            $connection->update(['sum_kwh' => 0]);
        }else{
            // $connection = DB::table('connector_meter_value_copy')->where('connector_pk', 171)->where('reading_context', 'Transaction.Begin')->get();

            // $TransactionPk = [];
            // foreach($connection as $key => $data){
            //     $TransactionPk[$key] = $data->transaction_pk;
            // }
        
            // $transactionPK = array_unique($TransactionPk);
            // $transaction = implode (",", $transactionPK);
            

            // foreach($transactionPK as $tran){
                $tranData = DB::table('connector_meter_value_copy')->where('transaction_pk', 5072)
                    ->whereIn('unit', $Units)
                    ->orderBy('value_timestamp', 'ASC')
                    ->get();
                
                foreach($tranData as $key => $tran){
                    $newKey = $key + 1;
                    
                    if($tran->reading_context == 'Transaction.Begin'){
                        $conn = Connector::where('autoIncrementColumn', $tran->autoIncrementColumn);

                        $conn->update(['sum_kwh' => 0]);    
                    }

                    if($key == 0){
                        if($tranData[$key]->reading_context == 'Transaction.Begin'){
                            if($tranData[$key]->reading_context == $tranData[$newKey]->reading_context){
                                continue;
                            };    
                        }
                    }
                    
                    if($tranData[$key]->unit == 'Wh'){
                        $firstValue = $tranData[$key]->value/1000;
                    }else{
                        $firstValue = $tranData[$key]->value;
                    }

                    if($tranData[$newKey]->unit == 'Wh'){
                        $secondValue = $tranData[$newKey]->value/1000;
                    }else{
                        $secondValue = $tranData[$newKey]->value;
                    }

                    $Value = $secondValue - $firstValue;
                    
                    $connection = Connector::where('autoIncrementColumn', $tranData[$newKey]->autoIncrementColumn);

                    $connection->update(['sum_kwh' => $Value]);
                    if($tranData[$newKey]->reading_context == 'Transaction.End'){
                        break;
                    }
                }
            // }
                
        }
    }
        


    public function payter()
    {
        $unit = 'kWh,Wh';
        $Units = explode (",", $unit); 
        
        $tPKCount = Connector::selectRaw('COUNT(DISTINCT transaction_pk) as countTP')
            ->where('reading_context', 'Transaction.Begin')
            ->where('connector_pk', 407364)
            ->first();

        if($tPKCount->countTP <= 1){
            if($tPKCount->countTP == 0){
                $tranData = DB::table('connector_meter_value_copy')->where('transaction_pk', 2047)
                    ->whereIn('unit', $Units)
                    ->orderBy('value_timestamp', 'ASC')
                    ->get();
                
                foreach($tranData as $key => $tran){

                    if($key == count($tranData)-1){
                        break;
                    }
                    $newKey = $key + 1;
                    
                    if($key == 0){
                        $conn = Connector::where('autoIncrementColumn', $tran->autoIncrementColumn);

                        $conn->update(['sum_kwh' => 0]);    
                    }
                        
                    if($tranData[$key]->unit == 'Wh'){
                        $firstValue = $tranData[$key]->value/1000;
                    }else{
                        $firstValue = $tranData[$key]->value;
                    }

                    if($tranData[$newKey]->unit == 'Wh'){
                        $secondValue = $tranData[$newKey]->value/1000;
                    }else{
                        $secondValue = $tranData[$newKey]->value;
                    }

                    $Value = $secondValue - $firstValue;
                    
                    $connection = Connector::where('autoIncrementColumn', $tranData[$newKey]->autoIncrementColumn);

                    $connection->update(['sum_kwh' => $Value]);    
                }    
            }else{
                $connection = Connector::where('connector_pk', 127)->where('reading_context', 'Transaction.Begin');

                $connection->update(['sum_kwh' => 0]);    
            }
            
        }else{
            $tranData = DB::table('connector_meter_value_copy')->where('transaction_pk', 5072)
                ->whereIn('unit', $Units)
                ->orderBy('value_timestamp', 'ASC')
                ->get();
            
            foreach($tranData as $key => $tran){
                $newKey = $key + 1;
                
                if($tran->reading_context == 'Transaction.Begin'){
                    $conn = Connector::where('autoIncrementColumn', $tran->autoIncrementColumn);

                    $conn->update(['sum_kwh' => 0]);    
                }

                if($key == 0){
                    if($tranData[$key]->reading_context == 'Transaction.Begin'){
                        if($tranData[$key]->reading_context == $tranData[$newKey]->reading_context){
                            continue;
                        };    
                    }
                }
                
                if($tranData[$key]->unit == 'Wh'){
                    $firstValue = $tranData[$key]->value/1000;
                }else{
                    $firstValue = $tranData[$key]->value;
                }

                if($tranData[$newKey]->unit == 'Wh'){
                    $secondValue = $tranData[$newKey]->value/1000;
                }else{
                    $secondValue = $tranData[$newKey]->value;
                }

                $Value = $secondValue - $firstValue;
                
                $connection = Connector::where('autoIncrementColumn', $tranData[$newKey]->autoIncrementColumn);

                $connection->update(['sum_kwh' => $Value]);
                if($tranData[$newKey]->reading_context == 'Transaction.End'){
                    break;
                }
            }
            
        }

        

        // $connector_pk = 171;


        // $TransactionPk = [];
        // foreach($connection as $key => $data){
        //     $TransactionPk[$key] = $data->transaction_pk;
        // }
        // // return $TransactionPk;
        // $transactionPK = array_unique($TransactionPk);
        

        // if($connection <= 1){            
        //     $connection->update(['t.sum_kwh' => 0]);
        // }else{
        //     $connection->update(['t.sum_kwh' => 0]);
        // }
        // $ConnData = DB::table('connector_meter_value_copy')->where('transaction_pk', 5072)->get();
        // foreach($ConnData )
        // // $data = 

        // (if((t.unit = 'Wh'),(t.value / 1000),t.value) - coalesce(lag(if((t.unit = 'Wh'),(t.value / 1000),t.value)) OVER (ORDER BY t.transaction_pk,t.value_timestamp ) ,0))) AS sum_kWh,

    }

    public function addCategoryForm()
    {  
        $Category = categories::get();
        
        return view('add_category')->with('Category', $Category);
    }

    public function addCategory(Request $request)
    {
        // validate the user input
        $data =  \Request::except(array('_token')) ;
        
        $rule=array(
            'category_name' => 'required|unique:categories',
            'category_image' => 'required',
        );
        
        $validator = \Validator::make($data,$rule);
 
        if ($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator->messages());
        } 
        
        $category = new categories;
        
        $category['category_name'] = $request->category_name;
        $category_image = $request->category_image->store('public/CategoryImages');
        $category['category_image'] = $category_image;

        $result = $category->save();

        \Session::flash('flash_message', 'Category Added Succesfully');
        
        return redirect('admin/addnewcategories');
    }

    public function deleteCategory($id)
    {   

        $category = categories::where('id',$id)->first();             
        $category->delete();

        \Session::flash('flash_message', 'Category Deleted successfully');

        return redirect()->back();

    }

    public function updateCategory(Request $request,$id)
    {   
        // validate the user input
        // $data =  \Request::except(array('_token')) ;
        
        // $rule=array(
        //     'category_name' => 'required|unique:categories',
        // );
        
        // $validator = \Validator::make($data,$rule);
 
        // if ($validator->fails()){
        //     return redirect()->back()->withInput()->withErrors($validator->messages());
        // } 
        
        //storing the data to database
        // create new instance of county model
        $category = categories::findOrFail($id);
        
        $category->category_name = $request->category_name;
        
        if ($request->category_image != '') {
            $category_image = $request->category_image->store('public/CategoryImages');
            $category['category_image'] = $category_image;
        }

        $category->save();

        \Session::flash('flash_message', 'Updated Succesfully');
        
        return redirect()->back();

    }

    public function showCategory($id)
    {   
        
        $category = categories::where('id',$id)->first();             
        
        return view('edit_category',compact('category'));        
    }

    public function addJobFunctionalAreaForm()
    {  
        $Fun_Industry = JobIndustry::get();
        
        $Fun_Area =  JobFunctionalArea::select(
            '*',
            'job_functional_areas.id as fun_area_id'
        )
            ->leftjoin('job_industries', 'job_functional_areas.job_industry_id', '=', 'job_industries.id')
            ->get();

        return view('add_functional_area', compact('Fun_Area', 'Fun_Industry'));
    }

    public function addJobFunctionalArea(Request $request)
    {
        // validate the user input
        $data =  \Request::except(array('_token')) ;
        
        $rule=array(
            'job_fun_area_name' => 'required|unique:job_functional_areas',
        );
        
        $validator = \Validator::make($data,$rule);
 
        if ($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator->messages());
        } 
        
        $job_fun = new JobFunctionalArea ;
        
        $job_fun['job_industry_id'] = $request->job_industry_id;
        $job_fun['job_fun_area_name'] = $request->job_fun_area_name;
        
        $result = $job_fun->save();

        \Session::flash('flash_message', 'Job Functional Area Added Succesfully');
        
        return redirect('admin/addnewjobfunctionalarea');
    }

    public function deleteJobFunctionalArea($id)
    {   
        $fun = JobFunctionalArea::where('id',$id)->first();             
        $fun->delete();

        \Session::flash('flash_message', 'Functional Area Deleted successfully');

        return redirect()->back();

    }

    public function updateJobFunctionalArea(Request $request,$id)
    {   
        // validate the user input
        $data =  \Request::except(array('_token')) ;
        
        $rule=array(
            'job_fun_area_name' => 'required|unique:job_functional_areas',
        );
        
        $validator = \Validator::make($data,$rule);
 
        if ($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator->messages());
        } 
        
        //storing the data to database
        // create new instance of county model
        $fun_area = JobFunctionalArea::findOrFail($id);
        
        $fun_area->job_industry_id = $request->job_industry_id;
        $fun_area->job_fun_area_name = $request->job_fun_area_name;
        
        $fun_area->save();

        \Session::flash('flash_message', 'Updated Succesfully');
        
        return redirect()->back();

    }

    public function showJobFunctionalArea($id)
    {           
        $Fun_Industry = JobIndustry::get();
        
        $Fun_Area = JobFunctionalArea::where('id',$id)->first();             
        // $Fun_Area =  JobFunctionalArea::select(
        //     '*',
        //     'job_functional_areas.id as fun_area_id',
        //     'job_industries.id as industry_id'
        // )
        //     ->leftjoin('job_industries', 'job_functional_areas.job_industry_id', '=', 'job_industries.id')
        //     ->first();
        
        return view('edit_functional_area',compact('Fun_Industry','Fun_Area'));        
    }

    public function addJobTypeForm()
    {  
        $jobtypes = JobTypeMaster::get();
        
        return view('add_job_type')->with('jobtypes', $jobtypes);
    }

    public function addJobType(Request $request)
    {
        // validate the user input
        $data =  \Request::except(array('_token')) ;
        
        $rule=array(
            'job_type_name' => 'required|unique:job_type_masters',
        );
        
        $validator = \Validator::make($data,$rule);
 
        if ($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator->messages());
        } 
        
        $jobtype = new JobTypeMaster;
        
        $jobtype['job_type_name'] = $request->job_type_name;
        
        $result = $jobtype->save();

        \Session::flash('flash_message', 'Job type Added Succesfully');
        
        return redirect('admin/addnewjobtypes');
    }

    public function getJobTypesList()
    {
        $states = JobTypeMaster::get();
        
        return view('states_list')->with('states', $states);
        
    }

    public function deleteJobType($id)
    {   

        $jobtype = JobTypeMaster::where('id',$id)->first();             
        $jobtype->delete();

        \Session::flash('flash_message', 'Job Type Deleted successfully');

        return redirect()->back();

    }

    public function updateJobType(Request $request,$id)
    {   
        // validate the user input
        $data =  \Request::except(array('_token')) ;
        
        $rule=array(
            'job_type_name' => 'required|unique:job_type_masters',
        );
        
        $validator = \Validator::make($data,$rule);
 
        if ($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator->messages());
        } 
        
        //storing the data to database
        // create new instance of county model
        $jobtype = JobTypeMaster::findOrFail($id);
        
        $jobtype->job_type_name = $request->job_type_name;
        
        $jobtype->save();

        \Session::flash('flash_message', 'Updated Succesfully');
        
        return redirect()->back();

    }

    public function showJobType($id)
    {   
        $jobtype = JobTypeMaster::where('id',$id)->first();             
        
        return view('edit_job_type',compact('jobtype'));        
    }

    public function addJobSubTypeForm()
    {  
        $jobSubType =  JobSubType::select(
            '*',
            'job_sub_types.id as subtype_id'
        )
            ->leftjoin('job_type_masters', 'job_sub_types.job_type_id', '=', 'job_type_masters.id')
            ->get();
        
        $jobType = JobTypeMaster::get();
        
        return view('add_job_subtype', compact('jobType', 'jobSubType'));
    }

    public function addJobSubType(Request $request)
    {
        // validate the user input
        $data =  \Request::except(array('_token')) ;
        
        $rule=array(
            'job_subtype_name' => 'required|unique:job_sub_types',
        );
        
        $validator = \Validator::make($data,$rule);
 
        if ($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator->messages());
        } 
        
        $subtype = new JobSubType;
        
        $subtype['job_type_id'] = $request->job_type_id;
        $subtype['job_subtype_name'] = $request->job_subtype_name;
        
        $result = $subtype->save();

        \Session::flash('flash_message', 'Job Subtype Added Succesfully');
        
        return redirect('admin/addnewjobsubtypes');
    }

    public function deleteJobSubType($id)
    {   

        $subtype = JobSubType::where('id',$id)->first();             
        $subtype->delete();

        \Session::flash('flash_message', 'Job Subtype Deleted successfully');

        return redirect()->back();

    }

    public function updateJobSubType(Request $request,$id)
    {   
        // validate the user input
        $data =  \Request::except(array('_token')) ;
        
        $rule=array(
            'job_subtype_name' => 'required|unique:job_sub_types',
        );
        
        $validator = \Validator::make($data,$rule);
 
        if ($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator->messages());
        } 
        
        //storing the data to database
        // create new instance of county model
        $subtype = JobSubType::findOrFail($id);
        
        $subtype->job_type_id = $request->job_type_id;
        $subtype->job_subtype_name = $request->job_subtype_name;
        
        $subtype->save();

        \Session::flash('flash_message', 'Updated Succesfully');
        
        return redirect()->back();

    }

    public function showJobSubType($id)
    {   
        $jobSubType = JobSubType::where('id',$id)->first();             
        // $jobSubType =  JobSubType::select(
        //     '*',
        //     'job_sub_types.id as jobsubtype_id',
        //     'job_type_masters.id as jobtype_id'
        // )
        //     ->leftjoin('job_type_masters', 'job_sub_types.job_type_id', '=', 'job_type_masters.id')
        //     ->first();
        
        
        $jobType = JobTypeMaster::get();
        
        return view('edit_job_subtype',compact('jobSubType','jobType'));        
    }


    public function addExperianceForm()
    {  
        $jobexp = JobExperiance::get();
        
        return view('add_job_experiance')->with('jobexp', $jobexp);
    }

    public function addExperiance(Request $request)
    {
        // validate the user input
        // $data =  \Request::except(array('_token')) ;
        
        // $rule=array(
        //     'experiance_from' => 'required|unique:job_experiances',
        //     'experiance_to' => 'required|unique:job_experiances',
        // );
        
        // $validator = \Validator::make($data,$rule);
 
        // if ($validator->fails()){
        //     return redirect()->back()->withInput()->withErrors($validator->messages());
        // } 
        
        $jobexperiance = new JobExperiance;
        
        $jobexperiance['experiance_from'] = $request->experiance_from;
        $jobexperiance['experiance_to'] = $request->experiance_to;
        
        $result = $jobexperiance->save();

        \Session::flash('flash_message', 'Job Experiance Added Succesfully');
        
        return redirect('admin/addnewexperiance');
    }

    public function deleteExperiance($id)
    {   

        $jobexp = JobExperiance::where('id',$id)->first();             
        $jobexp->delete();

        \Session::flash('flash_message', 'Job Experiance Deleted successfully');

        return redirect()->back();

    }

    public function updateExperiance(Request $request,$id)
    {   
        // validate the user input
        // $data =  \Request::except(array('_token')) ;
        
        // $rule=array(
        //     'experiance_from' => 'required|unique:job_experiances',
        //     'experiance_to' => 'required|unique:job_experiances',
        // );
        
        // $validator = \Validator::make($data,$rule);
 
        // if ($validator->fails()){
        //     return redirect()->back()->withInput()->withErrors($validator->messages());
        // } 
        
        //storing the data to database
        // create new instance of county model
        $jobexp = JobExperiance::findOrFail($id);
        
        $jobexp->experiance_from = $request->experiance_from;
        $jobexp->experiance_to = $request->experiance_to;
        
        $jobexp->save();

        \Session::flash('flash_message', 'Updated Succesfully');
        
        return redirect()->back();

    }

    public function showExperiance($id)
    {   
        $jobexp = JobExperiance::where('id',$id)->first();             
        
        return view('edit_job_experiance',compact('jobexp'));        
    }

    public function addJobShiftForm()
    {  
        $jobshift = JobShift::get();
        
        return view('add_job_shift')->with('jobshift', $jobshift);
    }

    public function addJobShift(Request $request)
    {
        // validate the user input
        $data =  \Request::except(array('_token')) ;
        
        $rule=array(
            'job_shift' => 'required|unique:job_shifts',
        );
        
        $validator = \Validator::make($data,$rule);
 
        if ($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator->messages());
        } 
        
        $jobshift = new JobShift;
        
        $jobshift['job_shift'] = $request->job_shift;
        
        $result = $jobshift->save();

        \Session::flash('flash_message', 'Job Shift Added Succesfully');
        
        return redirect('admin/addnewjobshift');
    }

    public function deleteJobShift($id)
    {   

        $jobshift = JobShift::where('id',$id)->first();             
        $jobshift->delete();

        \Session::flash('flash_message', 'Job Shift Deleted successfully');

        return redirect()->back();

    }

    public function updateJobShift(Request $request,$id)
    {   
        // validate the user input
        $data =  \Request::except(array('_token')) ;
        
        $rule=array(
            'job_shift' => 'required|unique:job_shifts',
        );
        
        $validator = \Validator::make($data,$rule);
 
        if ($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator->messages());
        } 
        
        //storing the data to database
        // create new instance of county model
        $job = JobShift::findOrFail($id);
        
        $job->job_shift = $request->job_shift;
        
        $job->save();

        \Session::flash('flash_message', 'Updated Succesfully');
        
        return redirect()->back();

    }

    public function showJobShift($id)
    {   
        $jobshift = JobShift::where('id',$id)->first();             
        
        return view('edit_job_shift',compact('jobshift'));        
    }

    public function addJobEducationForm()
    {  
        $jobedu = JobEducation::get();
        
        return view('add_job_education')->with('jobedu', $jobedu);
    }

    public function addJobEducation(Request $request)
    {
        // validate the user input
        $data =  \Request::except(array('_token')) ;
        
        $rule=array(
            'educational_name' => 'required|unique:job_education',
        );
        
        $validator = \Validator::make($data,$rule);
 
        if ($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator->messages());
        } 
        
        $jobedu = new JobEducation;
        
        $jobedu['educational_name'] = $request->educational_name;
        
        $result = $jobedu->save();

        \Session::flash('flash_message', 'Job Shift Added Succesfully');
        
        return redirect('admin/addnewjobeducation');
    }

    public function deleteJobEducation($id)
    {   

        $jobedu = JobEducation::where('id',$id)->first();             
        $jobedu->delete();

        \Session::flash('flash_message', 'Job Education Deleted successfully');

        return redirect()->back();

    }

    public function updateJobEducation(Request $request,$id)
    {   
        // validate the user input
        $data =  \Request::except(array('_token')) ;
        
        $rule=array(
            'educational_name' => 'required|unique:job_education',
        );
        
        $validator = \Validator::make($data,$rule);
 
        if ($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator->messages());
        } 
        
        //storing the data to database
        // create new instance of county model
        $job = JobEducation::findOrFail($id);
        
        $job->educational_name = $request->educational_name;
        
        $job->save();

        \Session::flash('flash_message', 'Updated Succesfully');
        
        return redirect()->back();

    }

    public function showJobEducation($id)
    {   
        $jobedu = JobEducation::where('id',$id)->first();             
        
        return view('edit_job_education',compact('jobedu'));        
    }  

    public function addJobSalaryForm()
    {  
        $jobsalary = JobSalary::get();
        
        return view('add_job_salary')->with('jobsalary', $jobsalary);
    }

    public function addJobSalary(Request $request)
    {
        // validate the user input
        $data =  \Request::except(array('_token')) ;
        
        $rule=array(
            'job_min_salary' => 'required|unique:job_salaries',
            'job_max_salary' => 'required|unique:job_salaries',
        );
        
        $validator = \Validator::make($data,$rule);
 
        if ($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator->messages());
        } 
        
        $jobsalary = new JobSalary;
        
        $jobsalary['job_min_salary'] = $request->job_min_salary;
        $jobsalary['job_max_salary'] = $request->job_max_salary;
        
        $result = $jobsalary->save();

        \Session::flash('flash_message', 'Job Salary Added Succesfully');
        
        return redirect('admin/addnewjobsalary');
    }

    public function deleteJobSalary($id)
    {   

        $jobsalary = JobSalary::where('id',$id)->first();             
        $jobsalary->delete();

        \Session::flash('flash_message', 'Job Salary Deleted successfully');

        return redirect()->back();

    }

    public function updateJobSalary(Request $request,$id)
    {   
        // validate the user input
        $data =  \Request::except(array('_token')) ;
        
        $rule=array(
            'job_min_salary' => 'required|unique:job_salaries',
            'job_max_salary' => 'required|unique:job_salaries',
        );
        
        $validator = \Validator::make($data,$rule);
 
        if ($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator->messages());
        } 
        
        //storing the data to database
        // create new instance of county model
        $job = JobSalary::findOrFail($id);
        
        $job->job_min_salary = $request->job_min_salary;
        $job->job_max_salary = $request->job_max_salary;
        
        $job->save();

        \Session::flash('flash_message', 'Updated Succesfully');
        
        return redirect()->back();

    }

    public function showJobSalary($id)
    {   
        $jobsalary = JobSalary::where('id',$id)->first();             
        
        return view('edit_job_salary',compact('jobsalary'));        
    }  
    
    public function addPaymentMethodForm()
    {  
        $paymethods = JobPaymentMaster::get();
        
        return view('add_paymentmethod')->with('paymethods', $paymethods);
    }

    public function addPaymentMethod(Request $request)
    {
        // validate the user input
        $data =  \Request::except(array('_token')) ;
        
        $rule=array(
            'payment_method' => 'required|unique:job_payment_masters',
        );
        
        $validator = \Validator::make($data,$rule);
 
        if ($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator->messages());
        } 
        
        $paymethod = new JobPaymentMaster;
        
        $paymethod['payment_method'] = $request->payment_method;
        
        $result = $paymethod->save();

        \Session::flash('flash_message', 'Payment Method Added Succesfully');
        
        return redirect('admin/addnewpaymentmethod');
    }

    public function deletePaymentMethod($id)
    {   

        $method = JobPaymentMaster::where('id',$id)->first();             
        $method->delete();

        \Session::flash('flash_message', 'Payment Method Deleted successfully');

        return redirect()->back();

    }

    public function updatePaymentMethod(Request $request,$id)
    {   
        // validate the user input
        $data =  \Request::except(array('_token')) ;
        
        $rule=array(
            'payment_method' => 'required|unique:job_payment_masters',
        );
        
        $validator = \Validator::make($data,$rule);
 
        if ($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator->messages());
        } 
        
        //storing the data to database
        // create new instance of county model
        $method = JobPaymentMaster::findOrFail($id);
        
        $method->payment_method = $request->payment_method;
        
        $method->save();

        \Session::flash('flash_message', 'Updated Succesfully');
        
        return redirect()->back();

    }

    public function showPaymentMethod($id)
    {   
        $paymethod = JobPaymentMaster::where('id',$id)->first();             
        
        return view('edit_paymentmethod',compact('paymethod'));        
    }
    
    public function addBlogCategoryForm()
    {  
        $blog = BlogCategory::get();
        
        return view('add_blog_category')->with('blog', $blog);
    }

    public function addBlogCategory(Request $request)
    {
        // validate the user input
        $data =  \Request::except(array('_token')) ;
        
        $rule=array(
            'blog_category' => 'required|unique:blog_categories',
        );
        
        $validator = \Validator::make($data,$rule);
 
        if ($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator->messages());
        } 
        
        $blogcategory = new BlogCategory;
        
        $blogcategory['blog_category'] = $request->blog_category;
        
        $result = $blogcategory->save();

        \Session::flash('flash_message', 'Blog Category Added Succesfully');
        
        return redirect('admin/addnewblogcategory');
    }

    public function deleteBlogCategory($id)
    {   

        $category = BlogCategory::where('id',$id)->first();             
        $category->delete();

        \Session::flash('flash_message', 'Blog Category Deleted successfully');

        return redirect()->back();

    }

    public function updateBlogCategory(Request $request,$id)
    {   
        // validate the user input
        $data =  \Request::except(array('_token')) ;
        
        $rule=array(
            'blog_category' => 'required|unique:blog_categories',
        );
        
        $validator = \Validator::make($data,$rule);
 
        if ($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator->messages());
        } 
        
        //storing the data to database
        // create new instance of county model
        $blogcategory = BlogCategory::findOrFail($id);
        
        $blogcategory->blog_category = $request->blog_category;
        
        $blogcategory->save();

        \Session::flash('flash_message', 'Updated Succesfully');
        
        return redirect()->back();

    }

    public function showBlogCategory($id)
    {   
        $blog = BlogCategory::where('id',$id)->first();             
        
        return view('edit_blog_category',compact('blog'));        
    }
    
    public function addBlogForm()
    {  
        // $blog = BlogsMaster::get();

        $blog =  BlogsMaster::select(
            '*',
            'blogs_masters.id as blog_id'
        )
            ->leftjoin('blog_categories', 'blogs_masters.blog_category_id', '=', 'blog_categories.id')
            ->get();
        
        $blogcategory = BlogCategory::get();
        
        return view('add_blog', compact('blog', 'blogcategory'));
        
    }

    public function addBlog(Request $request)
    {
        // validate the user input
        $data =  \Request::except(array('_token')) ;
        
        $rule=array(
            'blog_category_id' => 'required',
            'blog_heading' => 'required',
            'blog_desc' => 'required',
            'blog_image' => 'required',
        );
        
        $validator = \Validator::make($data,$rule);
 
        if ($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator->messages());
        }

        $blog = new BlogsMaster;
        
        $blog['blog_category_id'] = $request->blog_category_id;
        $blog['blog_heading'] = $request->blog_heading;
        $blog['blog_desc'] = $request->blog_desc;
        $blog_image = $request->blog_image->store('public/blogImages');
        $blog['blog_image'] = $blog_image;
        
        $result = $blog->save();

        \Session::flash('flash_message', 'Blog Added Succesfully');
        
        return redirect('admin/addnewblog');
    }

    public function deleteBlog($id)
    {   

        $blog = BlogsMaster::where('id',$id)->first();             
        $blog->delete();

        \Session::flash('flash_message', 'Blog Deleted successfully');

        return redirect()->back();

    }

    public function updateBlog(Request $request,$id)
    {   
        // validate the user input
        $data =  \Request::except(array('_token')) ;
        
        $rule=array(
            'blog_category_id' => 'required',
            'blog_heading' => 'required',
            'blog_desc' => 'required',
        );
        
        $validator = \Validator::make($data,$rule);
 
        if ($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator->messages());
        }

        // create new instance of county model
        $blog = BlogsMaster::findOrFail($id);
        
        $blog->blog_category_id = $request->blog_category_id;
        $blog->blog_heading = $request->blog_heading;
        $blog->blog_desc = $request->blog_desc;
        
        if ($request->blog_image != '') {
            $blog_image = $request->blog_image->store('public/blogImages');
            $blog->blog_image = $request->blog_image;
        }

        $blog->save();

        \Session::flash('flash_message', 'Updated Succesfully');
        
        return redirect()->back();

    }

    public function showBlog($id)
    {   
        $blog =  BlogsMaster::select(
            '*',
            'blogs_masters.id as blog_id'
        )
            ->leftjoin('blog_categories', 'blogs_masters.blog_category_id', '=', 'blog_categories.id')
            ->first();
        
        $blogcategory = BlogCategory::get();
        
        return view('edit_blog',compact('blog', 'blogcategory'));        
    }
    
    public function addTestimonialsForm()
    {  
        $testimonial =  Testimonials::all();
        
        return view('add_testimonial', compact('testimonial'));
        
    }

    public function addTestimonial(Request $request)
    {
        $testimonial = new Testimonials;
        
        $testimonial['name'] = $request->name;
        $testimonial['review'] = $request->review;
        $testimonial['profession'] = $request->profession;
        
        $result = $testimonial->save();

        \Session::flash('flash_message', 'Testimonial Added Succesfully');
        
        return redirect('admin/addnewtestimonial');
    }

    public function deleteTestimonial($id)
    {   

        $testimonial = Testimonials::where('id',$id)->first();             
        $testimonial->delete();

        \Session::flash('flash_message', 'Blog Deleted successfully');

        return redirect()->back();

    }

    public function updateTestimonial(Request $request,$id)
    {   
        // create new instance of county model
        $testimonial = Testimonials::findOrFail($id);
        
        $testimonial->name = $request->name;
        $testimonial->review = $request->review;
        $testimonial->profession = $request->profession;
        
        $testimonial->save();

        \Session::flash('flash_message', 'Updated Succesfully');
        
        return redirect()->back();

    }

    public function showTestimonial($id)
    {   
        $testimonial =  Testimonials::select(
            '*'
        )
            ->first();
        
        return view('edit_testimonial',compact('testimonial'));        
    }
    
    public function addSlider()
    {
        // $states = State::get();
        
        // return view('add_states')->with('states', $states);
        $sliders = Slider::get();
         return view('addSlider')->with('sliders', $sliders);
    }
    
    public function insertSlider(Request $request)
    {
        // validate the user input
        $data =  \Request::except(array('_token')) ;

        $rule=array(
            'banner_image'=>'required',
        );
        
        $validator = \Validator::make($data,$rule);
 
        if ($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator->messages());
        } 

        $slider = new  Slider();
        
        $bannerimg = $request->file('banner_image');

        $mime = $bannerimg->getClientMimeType();
        
        if(strstr($mime, "video/")){
            $slider->content_type = "video";
        }else{
            $slider->content_type = "image";
        }
        $banner_image = $request->banner_image->store('public/sliders');
        $slider->banner_image = $banner_image;
        $slider->save();
        \Session::flash('flash_message', 'Added Succesfully');
        return redirect()->back();
    }

    public function deleteSlider($id)
    {
        Slider::find($id)->delete();
        return redirect()->back();
    }

    public function addNotification(Request $request)
    {
        
        if ($request->has('sendtoallApplicants')) {
            $appUsers = User::select(
                '*'
            )
            ->where('role', 1)->where('status', 1)->orderBy('users.id', 'DESC')->get();

        
            foreach($appUsers as $user){
                $uid = $user->uid;
                $notification  = $request->notification;
                $curl = curl_init();
                        
                $msg = [ 
                        "title" => "Airtr Jobs",
                        "body" => $notification
                        ];
                        
                $postData = [ 
                    "to" => "/topics/".$uid,
                    "notification" => $msg,
                    "data" => $msg
                ];
                
                curl_setopt_array($curl, array(
                    CURLOPT_URL => 'https://fcm.googleapis.com/fcm/send',
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => '',
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_CUSTOMREQUEST => 'POST',
                    CURLOPT_POSTFIELDS => json_encode($postData, JSON_UNESCAPED_SLASHES),
                    CURLOPT_HTTPHEADER => array(
                        'Accept: application/json',
                        'Content-Type: application/json',
                        'Authorization: key=AAAA__8Vd28:APA91bHQ7aORBFymON31z39N2ljB9hCRwaeaR6DygjgWOIxdVfuF7Me_zbRdsplQUlpFayH-fDXwtDtNS_rMIp9jJ3VrZHdX5ngV87zs1j2gYpkDNHRipqoIIlp_zkvDp7_Fm5_ujIYQ'
                    ),
                ));
                
                $response = curl_exec($curl);
                
                curl_close($curl);
                $dataresponse = json_decode($response,true); 
            }
            \Session::flash('flash_message', 'Notification Send Succesfully');
        }
        
        if ($request->has('sendtoallEmployers')) {
            $employerUsers = User::select(
                '*'
            )
            ->where('role', 2)->where('status', 1)->orderBy('users.id', 'DESC')->get();

        
            foreach($employerUsers as $user){
                
                $uid = $user->uid;
                $notification  = $request->notification;
                $curl = curl_init();
                        
                $msg = [ 
                        "title" => "Airtr Jobs",
                        "body" => $notification
                        ];
                        
                $postData = [ 
                    "to" => "/topics/".$uid,
                    "notification" => $msg,
                    "data" => $msg
                ];
                
                curl_setopt_array($curl, array(
                    CURLOPT_URL => 'https://fcm.googleapis.com/fcm/send',
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => '',
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_CUSTOMREQUEST => 'POST',
                    CURLOPT_POSTFIELDS => json_encode($postData, JSON_UNESCAPED_SLASHES),
                    CURLOPT_HTTPHEADER => array(
                        'Accept: application/json',
                        'Content-Type: application/json',
                        'Authorization: key=AAAA__8Vd28:APA91bHQ7aORBFymON31z39N2ljB9hCRwaeaR6DygjgWOIxdVfuF7Me_zbRdsplQUlpFayH-fDXwtDtNS_rMIp9jJ3VrZHdX5ngV87zs1j2gYpkDNHRipqoIIlp_zkvDp7_Fm5_ujIYQ'
                    ),
                ));
                
                $response = curl_exec($curl);
                
                curl_close($curl);
                $dataresponse = json_decode($response,true); 
            }
            \Session::flash('flash_message', 'Notification Send Succesfully');
        }
        
        if ($request->has('notify_user') && $request->notify_user != '') {
            
            $uid = $request->notify_user;
            $notification  = $request->notification;
            $curl = curl_init();
                    
            $msg = [ 
                    "title" => "Airtr Jobs",
                    "body" => $notification
                    ];
                    
            $postData = [ 
                "to" => "/topics/".$uid,
                "notification" => $msg,
                "data" => $msg
            ];
                
            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://fcm.googleapis.com/fcm/send',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => json_encode($postData, JSON_UNESCAPED_SLASHES),
                CURLOPT_HTTPHEADER => array(
                    'Accept: application/json',
                    'Content-Type: application/json',
                    'Authorization: key=AAAA__8Vd28:APA91bHQ7aORBFymON31z39N2ljB9hCRwaeaR6DygjgWOIxdVfuF7Me_zbRdsplQUlpFayH-fDXwtDtNS_rMIp9jJ3VrZHdX5ngV87zs1j2gYpkDNHRipqoIIlp_zkvDp7_Fm5_ujIYQ'
                ),
            ));
            
            $response = curl_exec($curl);
            
            curl_close($curl);
            $dataresponse = json_decode($response,true); 
            \Session::flash('flash_message', 'Notification Send Succesfully');
        }
        
        if ($request->has('notify_emp') && $request->notify_emp != '') {
            
            $uid = $request->notify_emp;
            $notification  = $request->notification;
            $curl = curl_init();
                    
            $msg = [ 
                    "title" => "Airtr Jobs",
                    "body" => $notification
                    ];
                    
            $postData = [ 
                "to" => "/topics/".$uid,
                "notification" => $msg,
                "data" => $msg
            ];
            
            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://fcm.googleapis.com/fcm/send',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => json_encode($postData, JSON_UNESCAPED_SLASHES),
                CURLOPT_HTTPHEADER => array(
                    'Accept: application/json',
                    'Content-Type: application/json',
                    'Authorization: key=AAAA__8Vd28:APA91bHQ7aORBFymON31z39N2ljB9hCRwaeaR6DygjgWOIxdVfuF7Me_zbRdsplQUlpFayH-fDXwtDtNS_rMIp9jJ3VrZHdX5ngV87zs1j2gYpkDNHRipqoIIlp_zkvDp7_Fm5_ujIYQ'
                ),
            ));
            
            $response = curl_exec($curl);
            
            curl_close($curl);
            $dataresponse = json_decode($response,true); 
            \Session::flash('flash_message', 'Notification Send Succesfully');    
        }
        
        // $result = $notification->save();
        
        
        
        return redirect('admin/dashboard');
    }


    public function addEmail(Request $request)
    {
        if ($request->has('sendtoallApplicants')) {
            
            $appUsers = User::select(
                '*',
                'users.created_at as reg_date',
                'applicant_personal_details.email as email_id',
                'applicant_personal_details.desired_location'
            )
            ->leftjoin('applicant_personal_details', 'applicant_personal_details.user_id', '=', 'users.uid')
            ->where('users.role', 1)->where('users.status', 1)->orderBy('users.id', 'DESC')->get();

            foreach($appUsers as $user){
                $email = $user->email_id;
                if($email == ''){
                    continue;
                }
                $notification  = $request->notification;
                $data_email = array(
                    'email' => $user->email_id,
                    'notification' => $notification
                );
                    
                \Mail::send('emails.send_notification_email', $data_email, function($message) use ($data_email){
                    $message->to($data_email['email'])
                    ->from('aitrjobsemail@9demos.com', 'AitrJobs')
                    ->subject('Alert Email');
                    
                });
            }
            \Session::flash('email_message', 'Notification Send Succesfully');
        }
        
        if ($request->has('sendtoallEmployers')) {
            
            $employerUsers = User::select(
                '*',
                'personal_details.email as email_id'
            )->leftjoin('personal_details', 'personal_details.user_id', '=', 'users.uid')
            ->where('role', 2)->where('users.status', 1)->orderBy('users.id', 'DESC')->get();
        
            foreach($employerUsers as $user){
                $email = $user->email_id;
                if($email == ''){
                    continue;
                }

                $notification  = $request->notification;
                $data_email = array(
                    'email' => $user->email_id,
                    'notification' => $notification
                );
                    
                \Mail::send('emails.send_notification_email', $data_email, function($message) use ($data_email){
                    $message->to($data_email['email'])
                    ->from('aitrjobsemail@9demos.com', 'AitrJobs')
                    ->subject('Alert Email');
                    
                });
            }
            \Session::flash('email_message', 'Notification Send Succesfully');
        }
        
        if ($request->has('notify_user') && $request->notify_user != '') {
            
            $email = $request->notify_user;
            $notification  = $request->notification;
            
            $data_email = array(
                'email' => $email,
                'notification' => $notification
            );
                
            \Mail::send('emails.send_notification_email', $data_email, function($message) use ($data_email){
                $message->to($data_email['email'])
                ->from('aitrjobsemail@9demos.com', 'AitrJobs')
                ->subject('Alert Email');
                
            });
            \Session::flash('email_message', 'Notification Send Succesfully');
        }
        
        if ($request->has('notify_emp') && $request->notify_emp != '') {            
            
            $email = $request->notify_emp;
            $notification  = $request->notification;
            
            $data_email = array(
                'email' => $email,
                'message' => $notification
            );
            
            \Mail::send('emails.send_notification_email', $data_email, function($message) use ($data_email){
                $message->to($data_email['email'])
                ->from('aitrjobsemail@9demos.com', 'AitrJobs')
                ->subject('Alert Email');
                
            });
            \Session::flash('email_message', 'Notification Send Succesfully');
        }
        
        // $result = $notification->save();
        
        
        return redirect('admin/dashboard');
    }

    public function senEmailToSubscribers(Request $request)
    {
        
        if ($request->has('sendtoall')) {
            
            $Subscribers = Subscribers::get();
            
            foreach($Subscribers as $user){
                $email = $user->email;
                        
                $notification  = $request->notification;
                
                $data_email = array(
                    'email' => $user->email,
                    'notification' => $notification
                );
                
                \Mail::send('emails.send_notification_email', $data_email, function($message) use ($data_email){
                    $message->to($data_email['email'])
                    ->from('aitrjobsemail@9demos.com', 'AitrJobs')
                    ->subject('Alert Email');
                    
                });
            }
        }
        
        
        if ($request->has('notify_user') && $request->notify_user != '') {
            
            $email = $request->notify_user;
            $notification  = $request->notification;
            
            $data_email = array(
                'email' => $email,
                'notification' => $notification
            );
                
            \Mail::send('emails.send_notification_email', $data_email, function($message) use ($data_email){
                $message->to($data_email['email'])
                ->from('aitrjobsemail@9demos.com', 'AitrJobs')
                ->subject('Alert Email');
                
            });
            
        }
        
        // $result = $notification->save();
        \Session::flash('email_message', 'Notification Send Succesfully');
        
        return redirect()->back();
    }

    public function markHighlightJobs(Request $request){
        if ($request->ajax()) {
            $job = JobMaster::find($request->id);
            
            if($request->value == 'true'){
                $job->highlight_job_status = 1;
            }else{
                $job->highlight_job_status = 0;   
            }

            if ($job->save()) {
                return response()->json(['error' => false, 'msg' => 'success']);
            }
            else{
                return response()->json(['error' => true, 'msg' => 'fail']);
            }
        }
    }   

}
