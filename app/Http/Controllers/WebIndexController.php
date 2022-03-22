<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Applicants;
use App\Models\User;
use App\Models\PersonalDetails;
use App\Models\JobManagement;
use App\Models\JobMaster;
use App\Models\ApplicantPlans;
use App\Models\EmployerPlans;
use App\Models\FavouriteJobs;
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
use App\Models\Slider;
use App\Models\Subscribers;
use App\Models\PlanManagement;
use App\Models\ManagePages;
use App\Models\NotificationHandler;
use Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use App\Models\Testimonials;
use App\Models\PlanHistory;

use Kreait\Firebase;
use Kreait\Firebase\Firestore;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use \Kreait\Firebase\Database;
use Google\Cloud\Firestore\FirestoreClient;
use Kreait\Laravel\Firebase\ServiceProvider;


class WebIndexController extends Controller
{
    private $Auth = '';
    private $Role = '';
    private $Profile = '';

    public function __construct()
    {

        $this->Auth = session()->get('Auth_Uid_AirtrJobs');
        $this->Role = session()->get('Auth_Role_AirtrJobs');
        
        $this->Profile = session()->get('Auth_Profile_AirtrJobs');
    }

    public function index()
    {
        
        $uid = session()->get('Auth_Uid_AirtrJobs');
                    
        $categories =  categories::get()->take(8);

        $jobsFav = FavouriteJobs::where(['favourite_jobs.user_id' => $uid])->get();
        
        $jobs_array = [];
        
        foreach ($jobsFav as $key => $job) {
            $jobs_array[$key] = $job->job_id;
        }
        
        $RecentJobs =  JobMaster::select('job_masters.id as job_id','job_masters.*','company_details.company_name','personal_details.full_name','personal_details.contact_number as employer_contact_number','personal_details.email as employer_email')
                ->leftjoin('company_details', 'company_details.user_id', '=', 'job_masters.user_id')
                ->leftjoin('personal_details', 'personal_details.user_id', '=', 'job_masters.user_id')
                ->where(['job_masters.job_status' => "Live", 'job_masters.status' => 1])->orderBy('id','desc')->get()->take(10);
        
        foreach ($RecentJobs as $key => $job) {
            if(in_array($job->job_id, $jobs_array)){
                $RecentJobs[$key]['favourite_status'] = 1;   
            }else{
                $RecentJobs[$key]['favourite_status'] = 0;   
            }
        }

        $jobsFavImp = FavouriteJobs::where(['favourite_jobs.user_id' => $uid])->get();
        
        $jobs_array_highlight = [];
        
        foreach ($jobsFavImp as $key => $job) {
            $jobs_array_highlight[$key] = $job->job_id;
        }
        
        $JobsDataImp = JobMaster::select('job_masters.id as job_id','job_masters.*','company_details.company_name','personal_details.full_name','personal_details.contact_number as employer_contact_number','personal_details.email as employer_email')
                        ->leftjoin('company_details', 'company_details.user_id', '=', 'job_masters.user_id')
                        ->leftjoin('personal_details', 'personal_details.user_id', '=', 'job_masters.user_id')
                        ->where(['job_masters.job_status' => "Live", 'job_masters.status' => 1])
                        ->whereDate('job_masters.created_at', '>=', Carbon::now()->subDays(30))
                        ->get();
        
        if(count($JobsDataImp) >= 5){
            $JobsDataImp = JobMaster::select('job_masters.id as job_id','job_masters.*','company_details.company_name','personal_details.full_name','personal_details.contact_number as employer_contact_number','personal_details.email as employer_email')
                        ->leftjoin('company_details', 'company_details.user_id', '=', 'job_masters.user_id')
                        ->leftjoin('personal_details', 'personal_details.user_id', '=', 'job_masters.user_id')
                        ->where(['job_masters.job_status' => "Live", 'job_masters.status' => 1])
                        ->whereDate('job_masters.created_at', '>=', Carbon::now()->subDays(30))
                        ->get()->random(5);
        }
        
        foreach ($JobsDataImp as $key => $job) {
            if(in_array($job->id, $jobs_array_highlight)){
                $JobsDataImp[$key]['favourite_status'] = 1;   
            }else{
                $JobsDataImp[$key]['favourite_status'] = 0;   
            }
        }

        $testimonials = Testimonials::all();
        
        $HighlightJobs = JobMaster::where('highlight_job_status',1)->orderBy('id', 'DESC')->get();
        
        return view('web.index', compact('categories', 'RecentJobs', 'JobsDataImp', 'testimonials','HighlightJobs'));
        // return view('web.index', compact('propertieslist', 'partners', 'Properties', 'states', 'featured_properties', 'USCount', 'TurkeyCount', 'QatarCount', 'DubaiCount', 'CanadaCount', 'GeorgiaCount'));
    }

    public function getAllJobs()
    {
        $uid = session()->get('Auth_Uid_AirtrJobs');
        $job_industry =  JobIndustry::all();

        $job_type =  JobTypeMaster::all();

        $job_experiance =  JobExperiance::all();

        $job_salary =  JobSalary::all();

        $states =  State::all();

        $categories =  categories::all();

        $jobsFav = FavouriteJobs::where(['favourite_jobs.user_id' => $uid])->get();
        
        $jobs_array = [];
        
        foreach ($jobsFav as $key => $job) {
            $jobs_array[$key] = $job->job_id;
        }
        
        $Jobs = JobMaster::select(
            'job_masters.id as job_id',
            'job_masters.*',
            'job_masters.status as jobmasters_status',
            'company_details.status as company_status',
            'company_details.company_name',
            'personal_details.contact_number as employer_contact_number'
            )
            
            
            ->leftjoin('company_details','company_details.user_id','=','job_masters.user_id')
            ->leftjoin('personal_details', 'personal_details.user_id', '=', 'job_masters.user_id')
        ->where(['job_masters.job_status' => "Live", 'job_masters.status' => 1])
        ->get();
        
        foreach ($Jobs as $key => $job) {
            if(in_array($job->job_id, $jobs_array)){
                $Jobs[$key]['favourite_status'] = 1;   
            }else{
                $Jobs[$key]['favourite_status'] = 0;   
            }
        }
        
        $HighlightJobs = JobMaster::where('highlight_job_status',1)->orderBy('id', 'DESC')->get();
           
        return view('web.posted_jobs', compact('Jobs', 'job_industry', 'job_type', 'job_experiance', 'job_salary', 'job_salary', 'states', 'categories', 'HighlightJobs'));        
    }

    public function getAllEmployersJobs()
    {
        $Jobs_array = [];
        $user_id = session()->get('Auth_Uid_AirtrJobs');
        
        $jobsFav = FavouriteJobs::where(['favourite_jobs.user_id' => $user_id])->get();
        
        
        foreach ($jobsFav as $key => $job) {
            $jobs_array[$key] = $job->job_id;
        }

        $Jobs = JobMaster::select('job_masters.*','job_masters.id as job_m_id','company_details.company_name','personal_details.full_name','personal_details.contact_number as employer_contact_number','personal_details.email as employer_email'
        )
                        ->leftjoin('company_details', 'company_details.user_id', '=', 'job_masters.user_id')
                        ->leftjoin('personal_details', 'personal_details.user_id', '=', 'job_masters.user_id')
                        ->where(['job_masters.status' => 1, 'job_masters.user_id' => $user_id])
                        ->get();
        
        foreach ($Jobs as $key => $job) {
            if(in_array($job->job_m_id, $Jobs_array)){
                $Jobs[$key]['favourite_status'] = 1;   
            }else{
                $Jobs[$key]['favourite_status'] = 0;   
            }

            $job_count =  JobManagement::where(['job_id' => $job->job_m_id])->count();
            
            $Jobs[$key]['applicant_count'] = $job_count;   

        }
        
        return view('web.manage_jobs', compact('Jobs'));        
    }

    public function getAllJobsForCompany($company_id)
    {
        $uid = session()->get('Auth_Uid_AirtrJobs');

        $job_industry =  JobIndustry::all();

        $job_type =  JobTypeMaster::all();

        $job_experiance =  JobExperiance::all();

        $job_salary =  JobSalary::all();

        $states =  State::all();

        $categories =  categories::all();

        $jobsFav = FavouriteJobs::where(['favourite_jobs.user_id' => $uid])->get();
        
        $jobs_array = [];
        
        foreach ($jobsFav as $key => $job) {
            $jobs_array[$key] = $job->job_id;
        }
        
        $Jobs = JobMaster::select(
            'job_masters.id as job_id',
            'job_masters.*',
            'job_masters.status as jobmasters_status',
            'company_details.status as company_status',
            'company_details.company_name',
            'personal_details.contact_number as employer_contact_number'
            )
            
            
            ->leftjoin('company_details','company_details.user_id','=','job_masters.user_id')
            ->leftjoin('personal_details', 'personal_details.user_id', '=', 'job_masters.user_id')
        ->where(['job_masters.job_status' => "Live", 'job_masters.status' => 1, 'company_details.id' => $company_id])
        ->get();
        
        foreach ($Jobs as $key => $job) {
            if(in_array($job->job_id, $jobs_array)){
                $Jobs[$key]['favourite_status'] = 1;   
            }else{
                $Jobs[$key]['favourite_status'] = 0;   
            }
        }
        
        return view('web.posted_jobs', compact('Jobs', 'job_industry', 'job_type', 'job_experiance', 'job_salary', 'job_salary', 'states', 'categories', 'company_id'));        
    }

    public function getAllJobsForCategory($category)
    {
        $uid = session()->get('Auth_Uid_AirtrJobs');

        $job_industry =  JobIndustry::all();

        $job_type =  JobTypeMaster::all();

        $job_experiance =  JobExperiance::all();

        $job_salary =  JobSalary::all();

        $states =  State::all();

        $categories =  categories::all();

        $jobsFav = FavouriteJobs::where(['favourite_jobs.user_id' => $uid])->get();
        
        $jobs_array = [];
        
        foreach ($jobsFav as $key => $job) {
            $jobs_array[$key] = $job->job_id;
        }
        
        $Jobs = JobMaster::select(
            'job_masters.id as job_id',
            'job_masters.*',
            'job_masters.status as jobmasters_status',
            'company_details.status as company_status',
            'company_details.company_name',
            'personal_details.contact_number as employer_contact_number'
            )
            
            
            ->leftjoin('company_details','company_details.user_id','=','job_masters.user_id')
            ->leftjoin('personal_details', 'personal_details.user_id', '=', 'job_masters.user_id')
        ->where(['job_masters.job_status' => "Live", 'job_masters.status' => 1, 'job_masters.category' => $category])
        ->get();
        
        foreach ($Jobs as $key => $job) {
            if(in_array($job->job_id, $jobs_array)){
                $Jobs[$key]['favourite_status'] = 1;   
            }else{
                $Jobs[$key]['favourite_status'] = 0;   
            }
        }
        $HighlightJobs = JobMaster::where('highlight_job_status',1)->orderBy('id', 'DESC')->get();
        
        $company_id = '';
        return view('web.posted_jobs', compact('Jobs', 'job_industry', 'job_type', 'job_experiance', 'job_salary', 'job_salary', 'states', 'categories', 'company_id','HighlightJobs'));        
    }

    public function getJobDetails($id)
    {
      
        $Job = JobMaster::select(
            'job_masters.id as job_id',
            'job_masters.*',
            'job_masters.status as jobmasters_status',
            'company_details.status as company_status',
            'company_details.company_name',
            'company_details.interview_address',
            'personal_details.contact_number as employer_contact_number'
            )
            
            
            ->leftjoin('company_details','company_details.user_id','=','job_masters.user_id')
            ->leftjoin('personal_details', 'personal_details.user_id', '=', 'job_masters.user_id')
        ->where(['job_masters.status' => 1, 'job_masters.id' => $id])
        ->first();
        
    
        return view('web.job_details', compact('Job'));        
    }

    public function getAllJobsFilter(Request $request)
    {
        $filterData = $request->all();

        $job_industry =  JobIndustry::all();

        $job_type =  JobTypeMaster::all();

        $job_experiance =  JobExperiance::all();

        $job_salary =  JobSalary::all();

        $states =  State::all();

        $categories =  categories::all();

        $uid = session()->get('Auth_Uid_AirtrJobs');

        $jobsFav = FavouriteJobs::where(['favourite_jobs.user_id' => $uid])->get();
        
        $jobs_array = [];
        
        foreach ($jobsFav as $key => $job) {
            $jobs_array[$key] = $job->job_id;
        }

        $JobsData = JobMaster::query();

        $JobsData->select(
            'job_masters.*',
            'job_masters.status as jobmasters_status',
            'company_details.status as company_status',
            'company_details.id as company_id',
            'company_details.company_name',
            'personal_details.contact_number as employer_contact_number'
            )
            
            
            ->leftjoin('company_details','company_details.user_id','=','job_masters.user_id')
            ->leftjoin('personal_details', 'personal_details.user_id', '=', 'job_masters.user_id')
            ->where(['job_masters.job_status' => "Live", 'job_masters.status' => 1]);
            

        if ($request->company_id != '') {
            $JobsData->where('company_details.id', $request->company_id);
        }

        if ($request->filter_category != '') {
            $JobsData->where('job_masters.category', $request->filter_category);
        }

        if ($request->filter_experiance != '') {
            $exp = explode('-',$request->filter_experiance);
            
            $min_exp = $exp[0];
            $max_exp = $exp[1];
            $JobsData->where('job_masters.work_exp_from' ,'>=', [$min_exp]);
            $JobsData->where('job_masters.work_exp_to', '<=', [$max_exp]);
        }
        
        if ($request->filter_salary != '') {
            $salary = explode('-', $request->filter_salary);
            $min_salary = $salary[0];
            $max_salary = $salary[1];
            $JobsData->where('job_masters.min_salary' ,'>=', $min_salary);
            $JobsData->where('job_masters.max_salary' ,'<=', $max_salary);
        }
        
        if ($request->filter_state != '') {
            $JobsData->where('job_masters.job_state', $request->filter_state);
        }

        if ($request->filter_industry_type != '') {
            $JobsData->where('job_masters.job_industry', $request->filter_industry_type);
        }

        if ($request->filter_job_type != '') {
            $JobsData->where('job_masters.job_type', $request->filter_job_type);
        }

        if ($request->filter_month != '') {
            $JobsData->whereDate('job_masters.created_at', '>=', Carbon::now()->subDays($request->filter_month));
        }

        $Jobs = $JobsData->get();
        
        foreach ($Jobs as $key => $job) {
            if(in_array($job->id, $jobs_array)){
                $Jobs[$key]['favourite_status'] = 1;   
            }else{
                $Jobs[$key]['favourite_status'] = 0;   
            }
        }
        
        $HighlightJobs = JobMaster::where('highlight_job_status',1)->orderBy('id', 'DESC')->get();
           
        $company_id = $request->company_id; 
        return view('web.search_jobs', compact('Jobs', 'job_industry', 'job_type', 'job_experiance', 'job_salary', 'job_salary', 'states', 'categories', 'company_id', 'filterData', 'HighlightJobs'));        
    }

    public function getAllCompanies(){
        $Companies =  CompanyDetails::all();
        return view('web.companies', compact('Companies'));        
    }

    public function getAllCategories(){
        $categories = categories::all();
        return view('web.categories', compact('categories'));        
    }

    public function getProfileTabs(){
        return view('web.myprofilemain');        
    }

    public function getAllBlogs(){        
        $blogs = BlogsMaster::select('blogs_masters.*','blog_categories.blog_category')
            ->leftjoin('blog_categories', 'blogs_masters.blog_category_id', '=', 'blog_categories.id')
            ->orderBy('id', 'DESC')->get();

        return view('web.blogs', compact('blogs'));        
    }
    
    public function getAboutUsPage(){        
        $data = ManagePages::where('id',1)->first();             
        
        return view('web.aboutus',compact('data'));        
    }
    
    
    public function getPrivacyPolicyPage(){        
        $data = ManagePages::where('id',2)->first();             
        
        return view('web.privacy_policy',compact('data'));        
    }
    
    public function getTermsOfServicesPage(){        
        $data = ManagePages::where('id',3)->first();             
        
        return view('web.terms_of_services',compact('data'));        
    }
    
    public function getUserWritingPage(){        
        $data = ManagePages::where('id',4)->first();             
        
        return view('web.userwritings',compact('data'));        
    }
    
    public function getCommunicationsPage(){        
        $data = ManagePages::where('id',5)->first();             
        
        return view('web.communications',compact('data'));        
    }
    
    public function getLeadingLicensePage(){        
        $data = ManagePages::where('id',6)->first();             
        
        return view('web.leading_license',compact('data'));        
    }
    
    public function getHowItWorksPage(){        
        $data = ManagePages::where('id',7)->first();             
        
        return view('web.how_it_works',compact('data'));        
    }
    
    public function getForEmployersPage(){        
        $data = ManagePages::where('id',8)->first();             
        
        return view('web.for_employers',compact('data'));        
    }
    
    
    public function getBlogDetails($id)
    {
        $blog = BlogsMaster::select('blogs_masters.*','blog_categories.blog_category')
            ->leftjoin('blog_categories', 'blogs_masters.blog_category_id', '=', 'blog_categories.id')
            ->where(['blogs_masters.id' => $id])
            ->first();

        $blogs = BlogsMaster::select('blogs_masters.*','blog_categories.blog_category')
            ->leftjoin('blog_categories', 'blogs_masters.blog_category_id', '=', 'blog_categories.id')
            ->orderBy('id', 'DESC')->get()->take(3);

        return view('web.blog-details', compact('blog', 'blogs'));        
    }

    public function login(){
        if(session()->get('Auth_Uid_AirtrJobs') != ''){
            return redirect('myProfile');    
        }
        return view('web.emp_login');        
    }

    public function verifyGetOtp(){
        return view('web.verify_otp');        
    }

    public function getBack(){
        $Role = session()->get('Auth_Role_AirtrJobs');
        if($Role == 1){
            return redirect('signup');        
        }

        if($Role == 2){
            return redirect('emp_signup');        
        }
    }

    public function applicantLogin(){
        if(session()->get('Auth_Uid_AirtrJobs') != ''){
            return redirect('myProfile');    
        }     
        return view('web.applicant_login');        
    }
    
    public function register(Request $request){
        $uid = $request->uid;
        $creation_date = Carbon::now();
        $current_signin = Carbon::now();
       
        $user_count =  User::where(['uid' => $uid])->count();
        
        if($user_count == 0){
            $validateData = $request->validate([
                'uid'=>'required|unique:users',
                'auth_type'=>'required'
                // 'email'=>'unique:users',
                // 'mobile_number'=>'unique:users',
                // 'creation_date'=>'required'
                // 'password'=>'required|confirmed'
            ]);
            
            if($request->role == 1){
                $planData = ApplicantPlans::where(['id' => 1])->first();
                
                $message_limit = $planData->allowed_messages;
                $job_limit = $planData->job_applied_limit;
                $hiring_limit = NULL;
            }else{
                $planData = EmployerPlans::where(['id' => 1])->first();
            
                $message_limit = $planData->message_limit;
                $job_limit = $planData->job_post_limit;
                $hiring_limit = $planData->hiring_limit;
            }    

            $plan_purchase_date = Carbon::today();
            
            $user = new User;
            $user->uid = $request->uid;
            $user->email = $request->email;
            $user->mobile_number = $request->mobile_number;
            $user->creation_date = $creation_date;
            $user->current_signin = $current_signin;
            $user->role = $request->role;
            $user->auth_type = $request->auth_type;
            $user->plan_id = $planData->id;
            $user->plan_name = $planData->plan_name;
            $user->plan_amount = $planData->plan_amount;
            $user->coupon_code = $planData->coupon_code;
            $user->coupon_amount = $planData->coupon_amount;
            $user->message_limit = $message_limit;
            $user->job_limit = $job_limit;
            $user->hiring_limit = $hiring_limit;
            $user->plan_duration = $planData->plan_duration;
            $user->plan_purchase_date = $plan_purchase_date;
            $user->paid_amount = $planData->paid_amount;
            
            $result = $user->save();
            
            $plan = new PlanManagement;
            $plan->uid = $request->uid;
            $plan->plan_id = $planData->id;
            $plan->plan_name = $planData->plan_name;
            $plan->plan_currency = $planData->plan_currency;
            $plan->plan_amount = $planData->plan_amount;
            $plan->coupon_code = $planData->coupon_code;
            $plan->coupon_amount = $planData->coupon_amount;
            $plan->paid_amount = 0;
            $plan->message_limit = $message_limit;
            $plan->job_limit = $job_limit;
            $plan->hiring_limit = $hiring_limit;
            $plan->plan_duration = $planData->plan_duration;
            $plan->plan_purchase_date = $plan_purchase_date;
        
            $result = $plan->save();    
            
            $planhistory = new PlanHistory;
            $planhistory->uid = $request->uid;
            $planhistory->plan_id = $planData->id;
            $planhistory->plan_name = $planData->plan_name;
            $planhistory->plan_currency = $planData->plan_currency;
            $planhistory->plan_amount = $planData->plan_amount;
            $planhistory->coupon_code = $planData->coupon_code;
            $planhistory->coupon_amount = $planData->coupon_amount;
            $planhistory->paid_amount = 0;
            $planhistory->message_limit = $message_limit;
            $planhistory->job_limit = $job_limit;
            $planhistory->hiring_limit = $hiring_limit;
            $planhistory->plan_duration = $planData->plan_duration;
            $planhistory->plan_purchase_date = $plan_purchase_date;
            $result = $planhistory->save();    
            
            if($result){
                session()->put('Auth_Uid_AirtrJobs', $request->uid);
                session()->put('Auth_Role_AirtrJobs', $request->role);
                
                $UID = $request->uid;
                $Role = $request->role;
                
                if($Role == 1){
                    $userData =  ApplicantPersonalDetails::where(['user_id' => $UID])->first();    
                }else{
                    $userData =  PersonalDetails::select(
                                        'personal_details.*',
                                        'personal_details.profile_img as profile_image'
                                        )->where(['user_id' => $UID])->first();

                }
                
                $profileImg = '';
                if($userData != ''){
                    if($userData->profile_image == ''){
                        $profileImg = $userData->profile_image;    
                    }    
                }

                session()->put('Auth_Profile_AirtrJobs', $profileImg);
                
                return response()->json(['redirect' => 'myProfile']);
                // return redirect('myProfile');
            }else{
                \Session::flash('flash_message', 'Error In Login Please try after some time');
                return response()->json(['error' => 'myProfile']);
                return redirect()->back();
            }
        }else{
            session()->put('Auth_Uid_AirtrJobs', $request->uid);
            session()->put('Auth_Role_AirtrJobs', $request->role);
            $UID = $request->uid;
            $uid = $request->uid;
            $Role = $request->role;
                
            $user_count =  User::where(['uid' => $uid])->count();
            
            $user =  User::where(['uid' => $uid])->first();
            if($user_count != 0){
                if($request->role == 1 && $user->role != $request->role){
                    \Session::flash('error', 'Mobile Number Already regitered as employeer');
                    return response()->json(['error' => 'myProfile']);
                    return response()->json(["result"=>"Email Already regitered as employeer"]);
                }
                
                if($request->role == 2 && $user->role != $request->role){
                    \Session::flash('error', 'Mobile Number Already regitered as user');
                    return response()->json(['error' => 'myProfile']);
                    return response()->json(["result"=>"Email Already regitered as user"]);
                }

                if($user->status == 0){
                    \Session::flash('error', 'User is Blocked');
                    return response()->json(["error"=>'myProfile']);
                }
            }
            
            $update = User::where(['uid' => $uid]);
        
            $update->update(['current_signin' => $current_signin]);
            
            if($Role == 1){
                $userData =  ApplicantPersonalDetails::where(['user_id' => $UID])->first();    
            }else{
                $userData =  PersonalDetails::select(
                                    'personal_details.*',
                                    'personal_details.profile_img as profile_image'
                                    )->where(['user_id' => $UID])->first();
    
            }
        
            $profileImg = '';
            if($userData != ''){
                if($userData->profile_image == ''){
                    $profileImg = $userData->profile_image;    
                }    
            }
    
            session()->put('Auth_Profile_AirtrJobs', $profileImg);
    
            return response()->json(['redirect' => 'myProfile']);
            return redirect('myProfile');
        }
    }

    public function postLogin(Request $request)
    {
        $mobile_number = $request->mobile_number;

        $user =  User::where(['mobile_number' => $mobile_number])->first();
        $user_count =  User::where(['mobile_number' => $mobile_number])->count();
        
        if($user_count != 0){
            if($request->role == 1 && $user->role != $request->role){
                \Session::flash('error', 'Mobile Number Already regitered as employeer');
                return redirect()->back();
                
            }

            if($request->role == 2 && $user->role != $request->role){
                \Session::flash('error', 'Mobile Number Already regitered as user');
                return redirect()->back();
            }

            $user =  User::where(['mobile_number' => $mobile_number, 'role' => $request->role])->first();

            if($user->status == 0){
                \Session::flash('error', 'User is Blocked');
                return redirect()->back();
            }
        
        }
        
        session()->put('Auth_Role_AirtrJobs', $request->role);
        
        $curl = curl_init();

        $api_key = '900f09e6-85c2-11eb-a9bc-0200cd936042';
        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://2factor.in/API/V1/'.$api_key.'/SMS/'.$mobile_number.'/AUTOGEN',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        $dataresponse = json_decode($response,true); 
        
        $status = $dataresponse['Status'];
        
        if($status == 'Success'){
            $details = $dataresponse['Details'];
            session()->put('Auth_Session_AirtrJobs', $details);
            session()->put('Auth_Mobile_AirtrJobs', $mobile_number);
            return redirect('verify-otp');
            // return view('web.verify_otp', compact('details','mobile_number'));        

            // $curl = curl_init();

            // curl_setopt_array($curl, array(
            //     CURLOPT_URL => 'https://2factor.in/API/V1/'.$api_key.'/SMS/VERIFY/'.$details.'/',
            //     CURLOPT_RETURNTRANSFER => true,
            //     CURLOPT_ENCODING => '',
            //     CURLOPT_MAXREDIRS => 10,
            //     CURLOPT_TIMEOUT => 0,
            //     CURLOPT_FOLLOWLOCATION => true,
            //     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            //     CURLOPT_CUSTOMREQUEST => 'GET',
            // ));

            // $response = curl_exec($curl);

            // curl_close($curl);
            // echo $response;

        }
    }

    public function resendOtp(Request $request)
    {
        $mobile_number = session()->get('Auth_Mobile_AirtrJobs');

        $curl = curl_init();

        $api_key = '900f09e6-85c2-11eb-a9bc-0200cd936042';
        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://2factor.in/API/V1/'.$api_key.'/SMS/'.$mobile_number.'/AUTOGEN',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        $dataresponse = json_decode($response,true); 
        
        $status = $dataresponse['Status'];
        
        if($status == 'Success'){
            $details = $dataresponse['Details'];
            session()->put('Auth_Session_AirtrJobs', $details);
            
            return redirect('verify-otp');
            // return view('web.verify_otp', compact('details','mobile_number'));        

            // $curl = curl_init();

            // curl_setopt_array($curl, array(
            //     CURLOPT_URL => 'https://2factor.in/API/V1/'.$api_key.'/SMS/VERIFY/'.$details.'/',
            //     CURLOPT_RETURNTRANSFER => true,
            //     CURLOPT_ENCODING => '',
            //     CURLOPT_MAXREDIRS => 10,
            //     CURLOPT_TIMEOUT => 0,
            //     CURLOPT_FOLLOWLOCATION => true,
            //     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            //     CURLOPT_CUSTOMREQUEST => 'GET',
            // ));

            // $response = curl_exec($curl);

            // curl_close($curl);
            // echo $response;

        }
    }


    public function verifyOtp(Request $request)
    {
        $Role = session()->get('Auth_Role_AirtrJobs');
        $mobile_number = $request->mobile_number;
        $session_id = $request->session_id;
        $details = $request->session_id;
        $verify_otp = $request->verify_otp;

        $api_key = '900f09e6-85c2-11eb-a9bc-0200cd936042';

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://2factor.in/API/V1/'.$api_key.'/SMS/VERIFY/'.$session_id.'/'.$verify_otp,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        $dataresponse = json_decode($response,true); 
        
        $status = $dataresponse['Status'];
        
        if($status == 'Success'){
            
            $details = $dataresponse['Details'];
            session()->forget('Auth_Mobile_AirtrJobs');
            session()->forget('Auth_Session_AirtrJobs');
            
            $user_count = User::where('mobile_number', $request->mobile_number)->count();
    
            if($user_count == 0){
                if($request->role == 1){
                    $planData = ApplicantPlans::where(['id' => 1])->first();
                    
                    $message_limit = $planData->allowed_messages;
                    $job_limit = $planData->job_applied_limit;
                    $hiring_limit = NULL;
                }else{
                    $planData = EmployerPlans::where(['id' => 1])->first();
                
                    $message_limit = $planData->message_limit;
                    $job_limit = $planData->job_post_limit;
                    $hiring_limit = $planData->hiring_limit;
                }    

                $plan_purchase_date = Carbon::today();
                $uid = substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyz"), 0, 8);

                $user = new User;
                $user->uid = $uid;
                $user->email = $request->email;
                $date = Carbon::now();
                $user->mobile_number = $request->mobile_number;
                $user->creation_date = $date;
                $user->current_signin = $date;
                $user->role = $Role;
                $user->auth_type = $request->auth_type;
                $user->plan_id = $planData->id;
                $user->plan_name = $planData->plan_name;
                $user->plan_amount = $planData->plan_amount;
                $user->coupon_code = $planData->coupon_code;
                $user->coupon_amount = $planData->coupon_amount;
                $user->message_limit = $message_limit;
                $user->job_limit = $job_limit;
                $user->hiring_limit = $hiring_limit;
                $user->plan_duration = $planData->plan_duration;
                $user->plan_purchase_date = $plan_purchase_date;
                $user->paid_amount = $planData->paid_amount;
                
                $result = $user->save();
                
                $plan = new PlanManagement;
                $plan->uid = $uid;
                $plan->plan_id = $planData->id;
                $plan->plan_name = $planData->plan_name;
                $plan->plan_currency = $planData->plan_currency;
                $plan->plan_amount = $planData->plan_amount;
                $plan->coupon_code = $planData->coupon_code;
                $plan->coupon_amount = $planData->coupon_amount;
                $plan->paid_amount = 0;
                $plan->message_limit = $message_limit;
                $plan->job_limit = $job_limit;
                $plan->hiring_limit = $hiring_limit;
                $plan->plan_duration = $planData->plan_duration;
                $plan->plan_purchase_date = $plan_purchase_date;
            
                $result = $plan->save();    

                $planhistory = new PlanHistory;
                $planhistory->uid = $uid;
                $planhistory->plan_id = $planData->id;
                $planhistory->plan_name = $planData->plan_name;
                $planhistory->plan_currency = $planData->plan_currency;
                $planhistory->plan_amount = $planData->plan_amount;
                $planhistory->coupon_code = $planData->coupon_code;
                $planhistory->coupon_amount = $planData->coupon_amount;
                $planhistory->paid_amount = 0;
                $planhistory->message_limit = $message_limit;
                $planhistory->job_limit = $job_limit;
                $planhistory->hiring_limit = $hiring_limit;
                $planhistory->plan_duration = $planData->plan_duration;
                $planhistory->plan_purchase_date = $plan_purchase_date;
                $result = $planhistory->save();    
                
                if($result){
                    $UID = session()->get('Auth_Uid_AirtrJobs');
                    $Role = session()->get('Auth_Role_AirtrJobs');
                    
                    $User = User::where(['mobile_number' => $mobile_number])->first();
                    $uid = $User->uid;
                    
                    $update = User::where(['uid' => $uid]);
                    $current_signin = Carbon::now();
                    if ($request->has('current_signin')) {
                        $update->update(['current_signin' => $request->current_signin]);
                    }
                   
                   $Auth = session()->put('Auth_Uid_AirtrJobs', $uid);
                    $this->Auth = $Auth;

                    $Users =  User::where(['uid' => $Auth])->first();
                    $this->Role = $Users->role;

                    session()->put('Auth_Role_AirtrJobs', $Role);
                
                    
                    if($Role == 1){
                        $userData =  ApplicantPersonalDetails::where(['user_id' => $UID])->first();    
                    }else{
                        $userData =  PersonalDetails::select(
                                            'personal_details.*',
                                            'personal_details.profile_img as profile_image'
                                            )->where(['user_id' => $UID])->first();

                    }
                
                    $profileImg = '';
                    if($userData != ''){
                        if($userData->profile_image == ''){
                            $profileImg = $userData->profile_image;    
                        }    
                    }

                    session()->put('Auth_Profile_AirtrJobs', $profileImg);
      
                    return redirect('myProfile');
                }else{
                    return redirect('/');
                }
            }else{
  
                $User = User::where(['mobile_number' => $mobile_number])->first();
                $Auth = $User->uid;
                $update = User::where(['uid' => $Auth]);

                if ($request->has('current_signin')) {
                    $update->update(['current_signin' => $request->current_signin]);
                }
               
                session()->put('Auth_Uid_AirtrJobs', $Auth);
                $this->Auth = $Auth;
                
                $Users =  User::where(['uid' => $Auth])->first();
                $this->Role = $Users->role;

                session()->put('Auth_Role_AirtrJobs', $this->Role);
                $UID = session()->get('Auth_Uid_AirtrJobs');
                $Role = session()->get('Auth_Role_AirtrJobs');
                if($Role == 1){
                    $userData =  ApplicantPersonalDetails::where(['user_id' => $UID])->first();    
                }else{
                    $userData =  PersonalDetails::select(
                                        'personal_details.*',
                                        'personal_details.profile_img as profile_image'
                                        )->where(['user_id' => $UID])->first();

                }
            
                $profileImg = '';
                if($userData != ''){
                    if($userData->profile_image == ''){
                        $profileImg = $userData->profile_image;    
                    }    
                }

                session()->put('Auth_Profile_AirtrJobs', $profileImg);
 
                return redirect('myProfile');
            }
        }else{
            \Session::flash('flash_message', 'Invalid Otp');
            return view('web.verify_otp', compact('details','mobile_number'));        
        }
    }

    public function postNewLogin(Request $request)
    {
        $fileJson =  base_path("aitrjobs-8beca-firebase.json");
        $serviceAccount = ServiceAccount::fromJsonFile($fileJson);
        $firebase = (new Factory)
        ->withServiceAccount($serviceAccount);

        $firestore = new FirestoreClient([
            'projectId' => 'aitrjobs-8beca',
        ]);

        // Launch Firebase Auth
        // $auth = app('firebase.auth');
        // Retrieve the Firebase credential's token
        $idTokenString = $firestore->input('Firebasetoken');
          
        try { // Try to verify the Firebase credential token with Google
            
            $verifiedIdToken = $auth->verifyIdToken($idTokenString);
            
        } catch (\InvalidArgumentException $e) { // If the token has the wrong format
            
            return response()->json([
                'message' => 'Unauthorized - Can\'t parse the token: ' . $e->getMessage()
            ], 401);        
            
        } catch (InvalidToken $e) { // If the token is invalid (expired ...)
            
            return response()->json([
                'message' => 'Unauthorized - Token is invalide: ' . $e->getMessage()
            ], 401);
                
        }
    }

    public function logout()
    {
        session()->forget('Auth_Uid_AirtrJobs');
        session()->forget('Auth_Role_AirtrJobs');
        session()->forget('Auth_Profile_AirtrJobs');
        
        return redirect('/');
    }


    public function applyForJob($job_id)
    {
        $uid = session()->get('Auth_Uid_AirtrJobs');

        $job_count =  JobManagement::where(['user_id' => $uid, 'job_id' => $job_id])->count();

        if($job_count == 0){
            $job = new JobManagement;
            $job->user_id = $uid;
            $job->job_id = $job_id;

            $jobData =  JobMaster::where(['id' => $job_id])->get();
            $jobUserIid = $jobData[0]->user_id; 
            $companyDetails =  CompanyDetails::where(['user_id' => $jobUserIid])->get();
            
            $job->company_id = $companyDetails[0]->id;
            $job->job_status = 'under_review';
            
            $result = $job->save();
            
            $planData = PlanManagement::Where('uid',$uid)->first();
            $apply_job_limit = $planData->job_limit;
        
            $plan = PlanManagement::Where('uid',$uid);
            
            $plan->update(['job_limit' => $apply_job_limit - 1]);

            $User = User::where('uid', $uid)->first();
            
            $jobData =  JobMaster::where(['id' => $job_id])->get();
            
            $jobUserIid = $jobData[0]->user_id;
            $jobUserData =  User::where(['uid' => $jobUserIid])->get();

            // $User = User::select('*')->where(['id', $uid])->fist();
            
            $NotifyHandler = new NotificationHandler;

            $NotifyHandler->user_role = $User->role;
            $NotifyHandler->user_id = $uid;
            $NotifyHandler->notification_id = 1;
            $NotifyHandler->deliver_user_id = $jobData[0]->user_id;
            $NotifyHandler->deliver_user_role = $jobUserData[0]->role;
            $NotifyHandler->job_id = $job_id;
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
                return response()->json(['success' => 'added']);
                \Session::flash('flash_message', 'Applied for Job successfully');
                return redirect()->back();
                return redirect('posted-jobs');
                return response()->json(["result"=>"Applied for Job successfully"]);
            }else{
                return response()->json(['error' => 'error']);
                \Session::flash('error', 'Applied for Job successfully');
                return redirect()->back();
                return redirect('posted-jobs');
            }
        }else{
            return response()->json(['danger' => 'added']);
            \Session::flash('error', 'Already applied for job');
                return redirect()->back();
            return response()->json(["result"=>"Already applied for job."]);
        }
    }

    public function addToFavourite(Request $request){
        if ($request->ajax()) {
            if($request->sStatus == 'add'){
                
                $favouritejob = new FavouriteJobs();
            
                $favouritejob->user_id = session()->get('Auth_Uid_AirtrJobs');
                $favouritejob->job_id = $request->job_id;
                
                if ($favouritejob->save()) {
                    return response()->json(['msg' => 'added']);
                }
                else{
                    return response()->json(['error' => true, 'msg' => 'fail']);
                }    
            }else{
                $delete_fav = FavouriteJobs::where(['job_id' => $request->job_id,'user_id' => session()->get('Auth_Uid_AirtrJobs')])->first();
                if ($delete_fav != null) {
                    $delete_fav->delete();
                    return response()->json(['msg' => 'deleted']);
                }
            }
        }
    }

    public function getProfileDetails($id)
    {
        $user_id = session()->get('Auth_Uid_AirtrJobs');
        $Role = session()->get('Auth_Role_AirtrJobs');
        $userData = [];        
        $userData['user_details'] =  User::select(
                                    'users.*',
                                    'plan_management.message_limit as remaining_message_limit',
                                    'plan_management.job_limit as remaining_job_limit'
                                    )
                                    ->where(['users.uid' => $user_id])
                                    ->leftjoin('plan_management', 'users.uid', '=', 'plan_management.uid')
                                    ->first();
        
        $job_industry =  JobIndustry::all();

        if($Role == 1){

            $job_type =  JobTypeMaster::all();

            $job_experiance =  JobExperiance::all();

            $job_salary =  JobSalary::all();

            $states =  State::all();

            $categories =  categories::all();

            $startYear = 1980;
            $endYear = date('Y');
            $Years = [];
            for ($startYear=1980; $startYear <= $endYear; $startYear++) { 
                $Years[] = $startYear;
            }
            
            $userData['personal_details'] =  ApplicantPersonalDetails::where(['user_id' => $user_id])->first();

            $userData['educational_details'] =  ApplicantEducationalDetails::where(['user_id' => $user_id])->get();

            $userData['work_history'] =  ApplicantWorkHistory::where(['user_id' => $user_id])->first();

            $userData['other_details'] =  ApplicantSocialMedia::where(['user_id' => $user_id])->first();
            
            $userData['upload_resume'] =  ApplicantDocuments::where(['user_id' => $user_id])->first();
            $userData['upload_certificates'] =  ApplicantCertificates::where(['user_id' => $user_id])->get();
            $userData['upload_video_link'] =  ApplicantVideoDocuments::where(['user_id' => $user_id])->first();

            if($id == 1){
                return view('web.addpersonaldetails', compact('userData','job_industry','job_salary','Years'));        
            }elseif($id == 2){
                $funAreas = [];
                if($userData['work_history'] != ''){
                    if($userData['work_history']->industry_type != ''){
                        $jobIndustryData =  JobIndustry::where(['job_industry_name' => $userData['work_history']->industry_type])->first();
                
                        $funAreas =  JobFunctionalArea::where(['job_industry_id' => $jobIndustryData->id])->get();    
                    }
                }
            
                return view('web.workhistory', compact('userData','job_industry','job_salary','Years','funAreas'));        
            }elseif($id == 3){
                return view('web.educationaldetails', compact('userData','job_industry','job_salary','Years'));        
            }elseif($id == 4){
                return view('web.otherdetails', compact('userData','job_industry','job_salary','Years'));        
            }elseif($id == 5){
                return view('web.uploadresume', compact('userData','job_industry','job_salary','Years'));        
            }elseif($id == 6){
                return view('web.uploadcertificates', compact('userData','job_industry','job_salary','Years'));        
            }elseif($id == 7){
                return view('web.uploadvideo', compact('userData','job_industry','job_salary','Years'));        
            }
        }else{
            $states =  State::all();

            $userData['personal_details'] =  PersonalDetails::select(
                                    'personal_details.*',
                                    'personal_details.profile_img as profile_image'
                                    )->where(['user_id' => $user_id])->first();

            $userData['social_media_links'] =  SocialMedia::where(['user_id' => $user_id])->first();

            $userData['company_details'] =  CompanyDetails::where(['user_id' => $user_id])->first();

            $userData['sector_details'] =  Sector::where(['user_id' => $user_id])->first();

            if($id == 1){
                $cities = [];
                
                if($userData['company_details'] != '' && $userData['company_details']->state != ''){
                    $stateData =  State::where(['state' => $userData['company_details']->state])->first();

                    $cities =  Cities::where(['state_id' => $stateData->id])->get();    
                }
            
                return view('web.addorganisationdetails', compact('userData','states','cities'));        
            }elseif($id == 2){

                return view('web.addemppersonaldetails', compact('userData'));        
            }elseif($id == 4){
                return view('web.addsocialmedia', compact('userData'));        
            }elseif($id == 3){

                $funAreas = [];
                if($userData['sector_details'] != '' && $userData['sector_details']->industry_hire_for != ''){
                    $jobIndustryData =  JobIndustry::where(['job_industry_name' => $userData['sector_details']->industry_hire_for])->first();
            
                    $funAreas =  JobFunctionalArea::where(['job_industry_id' => $jobIndustryData->id])->get();    
                }
            
                return view('web.addindustrydetails', compact('userData','job_industry','funAreas'));        
            }
        }

    }

    public function getAllProfileDetails()
    {
        $user_id = session()->get('Auth_Uid_AirtrJobs');
        $Role = session()->get('Auth_Role_AirtrJobs');
        $userData = [];        
        $dataCount = [];        
        $userData['user_details'] =  User::select(
                                    'users.*',
                                    'plan_management.message_limit as remaining_message_limit',
                                    'plan_management.job_limit as remaining_job_limit'
                                    )
                                    ->where(['users.uid' => $user_id])
                                    ->leftjoin('plan_management', 'users.uid', '=', 'plan_management.uid')
                                    ->first();
        if($Role == 1){
            $job_industry =  JobIndustry::all();

            $job_type =  JobTypeMaster::all();

            $job_experiance =  JobExperiance::all();

            $job_salary =  JobSalary::all();

            $states =  State::all();

            $categories =  categories::all();

            $startYear = 1980;
            $endYear = date('Y');
            $Years = [];
            for ($startYear=1980; $startYear <= $endYear; $startYear++) { 
                $Years[] = $startYear;
            }
            
            $userData['personal_details'] =  ApplicantPersonalDetails::where(['user_id' => $user_id])->first();

            $userData['educational_details'] =  ApplicantEducationalDetails::where(['user_id' => $user_id])->get();

            $userData['work_history'] =  ApplicantWorkHistory::where(['user_id' => $user_id])->first();

            $userData['other_details'] =  ApplicantSocialMedia::where(['user_id' => $user_id])->first();
            
            $userData['upload_resume'] =  ApplicantDocuments::where(['user_id' => $user_id])->first();
            $userData['upload_certificates'] =  ApplicantCertificates::where(['user_id' => $user_id])->get();
            $userData['upload_video_link'] =  ApplicantVideoDocuments::where(['user_id' => $user_id])->first();
            

        $userData_count =  ApplicantPersonalDetails::where(['user_id' => $user_id])->count();

        $education_count =  ApplicantEducationalDetails::where(['user_id' => $user_id])->count();

        $work_count =  ApplicantWorkHistory::where(['user_id' => $user_id])->count();

        $media_count =  ApplicantSocialMedia::where(['user_id' => $user_id])->count();
        
        $document_count =  ApplicantDocuments::where(['user_id' => $user_id])->count();
        $dataCount['personal_details'] = $userData_count;
        $dataCount['education_details'] = $education_count;
        $dataCount['work_details'] = $work_count;
        $dataCount['media_details'] = $media_count;
        $dataCount['document_details'] = $document_count;
        $userDataCount = 0;
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
            $userDataCount = 20;
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
    
        $profile_percent = $userDataCount + $education + $work + $media + $document;



            return view('web.jobseeker_profile', compact('userData','job_industry','job_salary','Years' ,'profile_percent','dataCount'));        
            
        }else{

            $userData['personal_details'] =  PersonalDetails::select(
                                    'personal_details.*',
                                    'personal_details.profile_img as profile_image'
                                    )->where(['user_id' => $user_id])->first();

            $userData['social_media_links'] =  SocialMedia::where(['user_id' => $user_id])->first();

            $userData['company_details'] =  CompanyDetails::where(['user_id' => $user_id])->first();

            $userData['sector_details'] =  Sector::where(['user_id' => $user_id])->first();

            return view('web.employer_profile', compact('userData'));        
        }

    }
    
    public function getPlanResponse(Request $request){
        Log::info('Payment Log data ');
        $Plan = session()->get('Auth_Plan_AirtrJobs');
        if($request->payload['payment']['entity']['status'] == 'captured'){
            $paid_amount = $request->payload['order']['entity']['amount_paid'];
            // $Plan = 2;
            
            if($Plan != ''){
                
                $uid = session()->get('Auth_Uid_AirtrJobs');
                $Role = session()->get('Auth_Role_AirtrJobs');
                // $uid = 'elhtLF9PchZ9QhKB3717FmIS5Ku3';
                // $Role = 1;
                
                $user = User::Where('uid',$uid);
                if($Role == 1){
                    $planData = ApplicantPlans::where(['id' => $Plan])->first();
                    
                    $user->update(['message_limit' => $planData->allowed_messages]);
                    $user->update(['job_limit' => $planData->job_applied_limit]);
                    
                    $message_limit = $planData->allowed_messages;
                    $job_limit = $planData->job_applied_limit;
                    $hiring_limit = NULL;
                }else{
                    $planData = EmployerPlans::where(['id' => $Plan])->first();
                
                    $user->update(['message_limit' => $planData->message_limit]);
                    $user->update(['job_limit' => $planData->job_post_limit]);
                    $user->update(['hiring_limit' => $planData->hiring_limit]);
                    
                    $message_limit = $planData->message_limit;
                    $job_limit = $planData->job_post_limit;
                    $hiring_limit = $planData->hiring_limit;
                }    
                
                
                $user->update(['plan_id' => $Plan]);
                
                $user->update(['plan_amount' => $planData->plan_amount]);
                
                $user->update(['coupon_code' => $planData->coupon_code]);
                
                $user->update(['coupon_amount' => $planData->coupon_amount]);

                $user->update(['paid_amount' => $paid_amount]);
                
                
                $plan_purchase_date = Carbon::today();
                
                $user->update(['plan_name' => $planData->plan_name]);
                $user->update(['plan_duration' => $planData->plan_duration]);
                $user->update(['plan_purchase_date' => $plan_purchase_date]);
                
                $plan = PlanManagement::Where('uid',$uid);
                
                $plan->update(['plan_id' => $Plan]);
                $plan->update(['plan_name' => $planData->plan_name]);
                $plan->update(['plan_currency' => $planData->plan_currency]);
                $plan->update(['plan_amount' => $planData->plan_amount]);
                $plan->update(['coupon_code' => $planData->coupon_code]);
                $plan->update(['coupon_amount' => $planData->coupon_amount]);
                $plan->update(['paid_amount' => $paid_amount]);
                $plan->update(['message_limit' => $message_limit]);
                $plan->update(['job_limit' => $job_limit]);
                $plan->update(['hiring_limit' => $hiring_limit]);
                $plan->update(['plan_duration' => $planData->plan_duration]);
                $plan->update(['plan_purchase_date' => $plan_purchase_date]);

                $planhistory = new PlanHistory;
                $planhistory->uid = $uid;
                $planhistory->plan_id = $Plan;
                $planhistory->plan_name = $planData->plan_name;
                $planhistory->plan_currency = $planData->plan_currency;
                $planhistory->plan_amount = $planData->plan_amount;
                $planhistory->coupon_code = $planData->coupon_code;
                $planhistory->coupon_amount = $planData->coupon_amount;
                $planhistory->paid_amount = $paid_amount;
                $planhistory->message_limit = $message_limit;
                $planhistory->job_limit = $job_limit;
                $planhistory->hiring_limit = $hiring_limit;
                $planhistory->plan_duration = $planData->plan_duration;
                $planhistory->plan_purchase_date = $plan_purchase_date;
                $result = $planhistory->save();    
            }
        }
    }
    
    public function getMyAllProfileDetails(Request $request)
    {
       
        Log::info('Dashboard Log'. $request);
        
        if ($request->has('Plan')) {
            $plan_id = $request->Plan;
            session()->put('Auth_Plan_AirtrJobs', $plan_id);     
        }

        $user_id = session()->get('Auth_Uid_AirtrJobs');
        $role = session()->get('Auth_Role_AirtrJobs');
        $userData = [];        
        $dataCount = [];        
        $userData['user_details'] =  User::select(
                                    'users.*',
                                    'plan_management.message_limit as remaining_message_limit',
                                    'plan_management.job_limit as remaining_job_limit'
                                    )
                                    ->where(['users.uid' => $user_id])
                                    ->leftjoin('plan_management', 'users.uid', '=', 'plan_management.uid')
                                    ->first();
        if($role == 1){
            $job_industry =  JobIndustry::all();

            $job_type =  JobTypeMaster::all();

            $job_experiance =  JobExperiance::all();

            $job_salary =  JobSalary::all();

            $states =  State::all();

            $categories =  categories::all();

            $startYear = 1980;
            $endYear = date('Y');
            $Years = [];
            for ($startYear=1980; $startYear <= $endYear; $startYear++) { 
                $Years[] = $startYear;
            }
            
            $userData['personal_details'] =  ApplicantPersonalDetails::where(['user_id' => $user_id])->first();

            $userData['educational_details'] =  ApplicantEducationalDetails::where(['user_id' => $user_id])->get();

            $userData['work_history'] =  ApplicantWorkHistory::where(['user_id' => $user_id])->first();

            $userData['other_details'] =  ApplicantSocialMedia::where(['user_id' => $user_id])->first();
            
            $userData['upload_resume'] =  ApplicantDocuments::where(['user_id' => $user_id])->first();
            $userData['upload_certificates'] =  ApplicantCertificates::where(['user_id' => $user_id])->get();
            $userData['upload_video_link'] =  ApplicantVideoDocuments::where(['user_id' => $user_id])->first();
            

            $userData_count =  ApplicantPersonalDetails::where(['user_id' => $user_id])->count();

            $education_count =  ApplicantEducationalDetails::where(['user_id' => $user_id])->count();

            $work_count =  ApplicantWorkHistory::where(['user_id' => $user_id])->count();

            $media_count =  ApplicantSocialMedia::where(['user_id' => $user_id])->count();
            
            $document_count =  ApplicantDocuments::where(['user_id' => $user_id])->count();
            $dataCount['personal_details'] = $userData_count;
            $dataCount['education_details'] = $education_count;
            $dataCount['work_details'] = $work_count;
            $dataCount['media_details'] = $media_count;
            $dataCount['document_details'] = $document_count;
            $userDataCount = 0;
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
                $userDataCount = 20;
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
        
            $profile_percent = $userDataCount + $education + $work + $media + $document;

            if($userData['personal_details'] == ''){

                return redirect('profile.html/1');    
            }

            return view('web.myprofile', compact('userData','job_industry','job_salary','Years' ,'profile_percent','dataCount'));        
            
        }else{

            $userData['personal_details'] =  PersonalDetails::select(
                                    'personal_details.*',
                                    'personal_details.profile_img as profile_image'
                                    )->where(['user_id' => $user_id])->first();

            $userData['social_media_links'] =  SocialMedia::where(['user_id' => $user_id])->first();

            $userData['company_details'] =  CompanyDetails::where(['user_id' => $user_id])->first();

            $userData['sector_details'] =  Sector::where(['user_id' => $user_id])->first();

            if($userData['company_details'] == ''){
                
                return redirect('profile.html/1');    
            }

            if($userData['personal_details'] == ''){
                
                return redirect('profile.html/2');    
            }

            return view('web.employer_details', compact('userData'));        
        }

    }
    

    public function getAllApplicantDetails($job_id,$id)
    {
        $user_id = $id;
        $userData = [];        
        $dataCount = [];        

        $userData['user_details'] =  User::select(
                                    'users.*',
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
        
        $Jobs =  JobManagement::select(
            '*'
        )
            ->where(['user_id' => $user_id])
            ->where(['job_id' => $job_id])
            ->first();
        
        $jobStatus = $Jobs->job_status;
        
        return view('web.applicant_profile', compact('userData','job_id','jobStatus','Jobs'));        
    }
    

    public function getAllJobFuncationAreas($id)
    {
        $functional_area = JobFunctionalArea::where(['job_industry_id' => $id])->orderBy('job_fun_area_name')->get();
        
        if (count($functional_area)>0) {
            return response()->json($functional_area);
        }
        else{
            return response()->json(['error' => true,'data' => 'No record found']);
        }
        
        return response()->json(["job_fun_area"=>$functional_area]);
    }

    public function getAllCities($state_id)
    {
        $Cities =  Cities::where(['state_id' => $state_id])->get();
        
        if (count($Cities)>0) {
            return response()->json($Cities);
        }
        else{
            return response()->json(['error' => true,'data' => 'No record found']);
        }
        
        return response()->json(["cities"=>$Cities]);
    }    

    public function addAppPersonalDetails(Request $request)
    {
        $id = session()->get('Auth_Uid_AirtrJobs');
        
        $applicant_count =  ApplicantPersonalDetails::where(['user_id' => $id])->count();

        if($applicant_count == 0){
            $applicant = new ApplicantPersonalDetails;
            $applicant->user_id = session()->get('Auth_Uid_AirtrJobs');
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
                $applicant->profile_image = $profile_image;
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
            \Session::flash('flash_message', 'Added Succesfully');
            return redirect()->back();            
        }else{
            
            if($request->profile_image){
                $profile_image = $request->profile_image->store('public/ProfileImages');
                // $applicant->profile_image = $profile_image;
                // $image = $request->file('profile_image');
                // $fileNameToStore = '';
                // if ($image) {
                //         //Get file name with extension
                //         $fileNameWithExt = $image->getClientOriginalName();
                        
                //         // Get only file name
                //         $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                        
                //         // Get only the extension
                //         $fileExt = $image->getClientOriginalExtension();
                        
                //         // file name to store
                //         $fileNameToStore = $image->hashName();
                     
                //         $image->store('toPath', ['disk' => 'my_files']);
                // }

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

            \Session::flash('flash_message', 'Updated Succesfully');
            return redirect()->back();            
        }
    }

    public function uploadProfileImage(Request $request)
    {
        $Role = session()->get('Auth_Role_AirtrJobs');
        $id = session()->get('Auth_Uid_AirtrJobs');
        if($Role == 1){
            $applicant_count =  ApplicantPersonalDetails::where(['user_id' => $id])->count();    
            $applicant = new ApplicantPersonalDetails;
        }
        
        if($Role == 2){
            $applicant_count =  PersonalDetails::where(['user_id' => $id])->count();    
            $applicant = new PersonalDetails;
        }
        
        if($applicant_count == 0){
            
            $applicant->user_id = session()->get('Auth_Uid_AirtrJobs');;
            
            $image = $request->file('profile_image');

            if ($image) {
                    $profile_image = $request->profile_image->store('public/ProfileImages');
                    if($Role == 1){
                        $applicant->profile_image = $profile_image;
                    }else{
                        $applicant->profile_img = $profile_image;
                    }
            }
            
            $result = $applicant->save();
            session()->put('Auth_Profile_AirtrJobs', $profile_image);
            return response()->json(['redirect' => '../myprofile.html']);
        }else{
            
            if($request->profile_image){
                $image = $request->file('profile_image');
                $fileNameToStore = '';
            
                if ($image) {
                    $profile_image = $request->profile_image->store('public/ProfileImages');
                }
                
                if($Role == 1){        
                    $result = ApplicantPersonalDetails::Where('user_id',$id)->update([
                        'profile_image' => $profile_image
                    ]);
                }
                if($Role == 1){        
                    $result = PersonalDetails::Where('user_id',$id)->update([
                        'profile_img' => $profile_image
                    ]);
                }
            }

            session()->put('Auth_Profile_AirtrJobs', $profile_image);
            return response()->json(['redirect' => '../myprofile.html']);
        }
    }

    public function addAppWorkDetails(Request $request)
    {
        $id = session()->get('Auth_Uid_AirtrJobs');
        
        $applicant_count =  ApplicantWorkHistory::where(['user_id' => $id])->count();
        if($applicant_count == 0){
            $applicant = new ApplicantWorkHistory;
            $applicant->user_id = session()->get('Auth_Uid_AirtrJobs');
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
            \Session::flash('flash_message', 'Added Succesfully');
            return response()->json(['redirect' => '../profile.html/2']);
        }else{
             
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

            \Session::flash('flash_message', 'Updated Succesfully');
            return response()->json(['redirect' => '../profile.html/2']);
        }
    }

    public function addAppEducationalDetails(Request $request)
    {
        $id = session()->get('Auth_Uid_AirtrJobs');
        
        $applicant = ApplicantEducationalDetails::where('user_id',$id);
        $result = $applicant->delete();

        foreach ($request->marks as $key => $data) {
            $applicant = new ApplicantEducationalDetails;
            $applicant->user_id = $id;
            
            $applicant->qualification = $request->qualification[$key];
            $applicant->passout_yr = $request->passout_yr[$key];
            $applicant->university = $request->university[$key];
            $applicant->marks = $request->marks[$key];
            
            $applicant->save();
        }
        
        
        \Session::flash('flash_message', 'Added Succesfully');
        return response()->json(['redirect' => '../profile.html/3']);
    }

    public function checkCouponcode(Request $request)
    {
        $role = session()->get('Auth_Role_AirtrJobs');
        if($role == 1){
            $plan = ApplicantPlans::where(['id' => $request->plan_id])->first();
        }else{
            $plan = EmployerPlans::where(['id' => $request->plan_id])->first();
        }
        
        if($plan->coupon_code == $request->coupon_code){

            $user_id = session()->get('Auth_Uid_AirtrJobs');
            
            $userData = [];        
            
            $userData['personal_details'] =  ApplicantPersonalDetails::where(['user_id' => $user_id])->first();

            $plan->makeHidden([
                'created_at', 'updated_at'
            ]);

            \Session::flash('flash_message', 'Added Succesfully');
            return response()->json(['message' => $request->plan_id]);    
        }else{
            \Session::flash('error_message', 'Added Succesfully');
            return response()->json(['error' => 'invalid']);    
        }
    }

    public function addAppSocialMediaDetails(Request $request)
    {
        $id = session()->get('Auth_Uid_AirtrJobs');
        
        $socialmedia_count =  ApplicantSocialMedia::where(['user_id' => $id, 'status' => 1])->count();
        if($socialmedia_count == 0){
            $socialmedia = new ApplicantSocialMedia;
            $socialmedia->user_id = $id;
            $socialmedia->facebook_url = $request->facebook_url;
            $socialmedia->youtube_url = $request->youtube_url;
            $socialmedia->twitter_url = $request->twitter_url;
            $socialmedia->linkedin_url = $request->linkedin_url;
            
            $result = $socialmedia->save();
            \Session::flash('flash_message', 'Added Succesfully');
            return redirect()->back();            
        }else{
            $result = ApplicantSocialMedia::Where('user_id',$id)->update([
                'facebook_url' => $request->facebook_url,
                'youtube_url' => $request->youtube_url,
                'twitter_url' => $request->twitter_url,
                'linkedin_url' => $request->linkedin_url
            ]);

            \Session::flash('flash_message', 'Updated Succesfully');
            return redirect()->back();            

        }
            
    }

    public function addEmpSocialMediaDetails(Request $request)
    {
        $id = session()->get('Auth_Uid_AirtrJobs');
        
        $socialmedia_count =  SocialMedia::where(['user_id' => $id, 'status' => 1])->count();
        if($socialmedia_count == 0){
            $socialmedia = new SocialMedia;
            $socialmedia->user_id = $id;
            $socialmedia->facebook_url = $request->facebook_url;
            $socialmedia->instagram_url = $request->instagram_url;
            $socialmedia->twitter_url = $request->twitter_url;
            $socialmedia->linkedin_url = $request->linkedin_url;
            
            $result = $socialmedia->save();
            \Session::flash('flash_message', 'Added Succesfully');
            return redirect()->back();            
        }else{
            $result = SocialMedia::Where('user_id',$id)->update([
                'facebook_url' => $request->facebook_url,
                'instagram_url' => $request->instagram_url,
                'twitter_url' => $request->twitter_url,
                'linkedin_url' => $request->linkedin_url
            ]);

            \Session::flash('flash_message', 'Updated Succesfully');
            return redirect()->back();            

        }
            
    }

    public function addEmpIndustryDetails(Request $request)
    {
        $id = session()->get('Auth_Uid_AirtrJobs');
        
        $sector_count =  Sector::where(['user_id' => $id, 'status' => 1])->count();
        if($sector_count == 0){
            $sector = new Sector;
            $sector->user_id = $id;
            $sector->industry_hire_for = $request->industry_type;
            $sector->functional_area = $request->functional_area;
            $sector->skills = $request->skills;
            $sector->interview_day = $request->interview_day;  

            $result = $sector->save();
        
            \Session::flash('flash_message', 'Added Succesfully');
            return response()->json(['redirect' => '../profile.html/4']);
        
        }else{
            $result = Sector::Where('user_id',$id)->update([
                'industry_hire_for' => $request->industry_type,
                'functional_area' => $request->functional_area,
                'skills' => $request->skills,
                'interview_day' => $request->interview_day
            ]);

            \Session::flash('flash_message', 'Updated Succesfully');
            return response()->json(['redirect' => '../profile.html/3']);

        }
            
    }


    public function addAppDocuments(Request $request)
    {
        $id = session()->get('Auth_Uid_AirtrJobs');
        
        $applicant_count =  ApplicantDocuments::where(['user_id' => $id])->count();
        if($applicant_count == 0){
            $applicant = new ApplicantDocuments;
            $applicant->user_id = $id;
            $applicant->link_of_resume = $request->link_of_resume;
            
            $image = $request->file('upload_resume');

            if ($image) {
                    $upload_resume = $request->upload_resume->store('public/Resume');
                    $applicant->upload_resume = $upload_resume;
            
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
            \Session::flash('flash_message', 'Added Succesfully');
            return redirect()->back();            
        }else{
            $result = ApplicantDocuments::Where('user_id',$id)->update([
                'link_of_resume' => $request->link_of_resume
            ]);

            if($request->upload_resume){
                $image = $request->file('upload_resume');

                if ($image) {
                    $upload_resume = $request->upload_resume->store('public/Resume');
                    // $applicant->upload_resume = $upload_resume;
            
                    //     //Get file name with extension
                    //     $fileNameWithExt = $image->getClientOriginalName();
                        
                    //     // Get only file name
                    //     $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                        
                    //     // Get only the extension
                    //     $fileExt = $image->getClientOriginalExtension();
                        
                    //     // file name to store
                    //     $fileNameToStore = $image->hashName();
                     
                    //     $image->store('Documents', ['disk' => 'documents']);
                }

                $result = ApplicantDocuments::Where('user_id',$id)->update([
                    'upload_resume' => $upload_resume
                ]);
            }

            \Session::flash('flash_message', 'Updated Succesfully');
            return redirect()->back();            

        }            
    }

    public function addAppVideo(Request $request)
    {
        $id = session()->get('Auth_Uid_AirtrJobs');
        
        $applicant_count =  ApplicantVideoDocuments::where(['user_id' => $id])->count();
    
        if($applicant_count == 0){
            $applicant = new ApplicantVideoDocuments;
            $applicant->user_id = $id;
            $applicant->link_of_video = $request->link_of_video;
            
            $image = $request->file('upload_video');

            if ($image) {
                    $upload_video = $request->upload_video->store('public/Videos');
                    $applicant->upload_video = $upload_video;
            }

            $result = $applicant->save();
            \Session::flash('flash_message', 'Added Succesfully');
            return redirect()->back();            
        }else{
            $result = ApplicantVideoDocuments::Where('user_id',$id)->update([
                'link_of_video' => $request->link_of_video
            ]);

            if($request->upload_video){
                $image = $request->file('upload_video');

                if ($image) {
                        $upload_video = $request->upload_video->store('public/Videos');
                 
                }

                $result = ApplicantVideoDocuments::Where('user_id',$id)->update([
                    'upload_video' => $upload_video
                ]);
            }

            \Session::flash('flash_message', 'Updated Succesfully');
            return redirect()->back();            

        }            
    }

    public function addAppCertificates(Request $request)
    {
        $id = session()->get('Auth_Uid_AirtrJobs');
        
        $applicant = new ApplicantCertificates;
        $applicant->user_id = $id;
        
        $image = $request->file('certificate1');

        if ($image) {
                $certificate1 = $request->certificate1->store('public/Documents');
                $applicant->certificate1 = $certificate1;
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
                
                // $applicant->certificate1 = $fileNameToStore;    
        }

        $result = $applicant->save();
        \Session::flash('flash_message', 'Added Succesfully');
        return redirect()->back();            
                    
    }




    public function getSubscribedPlan()
    {
        $user_id = session()->get('Auth_Uid_AirtrJobs');
        $role = session()->get('Auth_Role_AirtrJobs');        
        $user_plan =  User::select(
                                    'users.*',
                                    'plan_management.message_limit as remaining_message_limit',
                                    'plan_management.job_limit as remaining_job_limit',
                                    'plan_management.hiring_limit as remaining_hiring_limit'
                                    )
                                    ->where(['users.uid' => $user_id])
                                    ->leftjoin('plan_management', 'users.uid', '=', 'plan_management.uid')
                                    ->first();

        if($role == 1){
            $plan = ApplicantPlans::where(['id' => $user_plan->plan_id])->first();
        }else{
            $plan = EmployerPlans::where(['id' => $user_plan->plan_id])->first();
        }

        $user_plan->makeHidden([
            'created_at', 'updated_at'
        ]);

        if($role == 1){
            $plans = ApplicantPlans::all();
        }else{
            $plans = EmployerPlans::all();
        }

    
        $plans->makeHidden([
            'created_at', 'updated_at'
        ]);
     
        return view('web.subscribed_plan', compact('user_plan', 'plan', 'plans'));
    }

    public function getAllPlans()
    {
        $role = session()->get('Auth_Role_AirtrJobs');
        if($role == 1){
            $plans = ApplicantPlans::all();
        }else{
            $plans = EmployerPlans::all();
        }
        $user_id = session()->get('Auth_Uid_AirtrJobs');
        
        $userData = [];        
        
        $userData['personal_details'] =  ApplicantPersonalDetails::where(['user_id' => $user_id])->first();

        $plans->makeHidden([
            'created_at', 'updated_at'
        ]);

        return view('web.applicant_subscription_plan', compact('plans', 'userData'));
    }

    public function getPlanDetails($id)
    {
        $role = session()->get('Auth_Role_AirtrJobs');
        if($role == 1){
            $plan = ApplicantPlans::where(['id' => $id])->first();
        }else{
            $plan = EmployerPlans::where(['id' => $id])->first();
        }
        
        $plan->makeHidden([
            'created_at', 'updated_at'
        ]);

        return view('web.plan', compact('plan'));
        
    }

    public function updatePlan(Request $request)
    {
        Log::info('Dashboard Log'. $request);
        
        if($request->Status == 'Success'){
            $uid = session()->get('Auth_Uid_AirtrJobs');
            $Role = session()->get('Auth_Role_AirtrJobs');
            $user = User::Where('uid',$uid);
            
            if($Role == 1){
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
            
            $check =  PlanManagement::where(['uid' => $uid])->first();
            if($check == ''){
                $plan = new PlanManagement;
                $plan->uid = $uid;
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
                $plan = PlanManagement::Where('uid',$uid);
                
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

            $path = env('APP_URL');
            $url = $path.'myProfile';
            
            $curl = curl_init();
            
            curl_setopt_array($curl, array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 600,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET"
            ));
    
            $response = curl_exec($curl);
    
            curl_close($curl);

        }else{
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

        }
            
        return response(['sucess' => 'Plan Added Successfully.']);
    }

    public function getAppliedJobs()
    {
        $id = session()->get('Auth_Uid_AirtrJobs');

        $Jobs =  JobManagement::select(
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

        return view('web.applicant_applied_jobs', compact('Jobs'));
        
    }

    public function getAllHiredProfiles()
    {
        $job_id = $id;

        $Jobs =  JobManagement::select(
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
            ->get();

        return view('web.hired_profiles', compact('Jobs'));
        
    }
    
    public function getAllProfiles($id)
    {
        $job_id = $id;

        $JobMaster =  JobMaster::select('job_masters.*','job_masters.id as job_id','company_details.company_name','personal_details.full_name','personal_details.contact_number as employer_contact_number','personal_details.email as employer_email')
                ->leftjoin('company_details', 'company_details.user_id', '=', 'job_masters.user_id')
                ->leftjoin('personal_details', 'personal_details.user_id', '=', 'job_masters.user_id')
                ->where(['job_masters.id' => $job_id])
                ->first();               
        
        $Jobs =  JobManagement::select(
            'job_management.*',
            'job_management.created_at as job_apply_date',
            'applicant_personal_details.desired_location',
             'applicant_personal_details.full_name',
            'applicant_personal_details.profile_image',
             'applicant_personal_details.profile_image',
            'users.*'
        )
            ->leftjoin('users', 'users.uid', '=', 'job_management.user_id')
            ->leftjoin('applicant_personal_details', 'applicant_personal_details.user_id', '=', 'job_management.user_id')
            ->where(['job_management.job_id' => $job_id])
            ->get();

        return view('web.applicants_profiles', compact('Jobs','JobMaster'));
        
    }

    public function getMyFavouriteJobs()
    {       
        $id = session()->get('Auth_Uid_AirtrJobs');

        $jobs_fav = FavouriteJobs::select('job_id')->where(['user_id' => $id])->get();

        $jobIds = []; 

        foreach ($jobs_fav as $key => $job) {
            $jobIds[$key] = $job->job_id;
        }

        $Jobs =  JobMaster::select('job_masters.*','job_masters.id as job_id','company_details.company_name','personal_details.full_name','personal_details.contact_number as employer_contact_number','personal_details.email as employer_email')
                ->leftjoin('company_details', 'company_details.user_id', '=', 'job_masters.user_id')
                ->leftjoin('personal_details', 'personal_details.user_id', '=', 'job_masters.user_id')
                ->findMany($jobIds);               
        
        foreach ($Jobs as $key => $job) {
            if(in_array($job->id, $jobIds)){
                $Jobs[$key]['favourite_status'] = 1;   
            }else{
                $Jobs[$key]['favourite_status'] = 0;   
            }
        }
        
        return view('web.applicant_saved_jobs', compact('Jobs'));
    }
    
    public function getRecommendedJobs()
    {
        $uid = session()->get('Auth_Uid_AirtrJobs');
        $work =  ApplicantWorkHistory::where(['user_id' => $uid])->first();
        if($work != ''){
            $industry = $work->industry_type;
        }else{
            $industry = '';
        }
        
        $jobsFav = FavouriteJobs::where(['favourite_jobs.user_id' => $uid])->get();
        
        $jobs_array = [];
        
        foreach ($jobsFav as $key => $job) {
            $jobs_array[$key] = $job->job_id;
        }
        
        $JobsData = JobMaster::query();
        
        $JobsData->select('job_masters.*','company_details.company_name','personal_details.full_name','personal_details.contact_number as employer_contact_number','personal_details.email as employer_email')
                        ->leftjoin('company_details', 'company_details.user_id', '=', 'job_masters.user_id')
                        ->leftjoin('personal_details', 'personal_details.user_id', '=', 'job_masters.user_id')
                        ->where(['job_masters.job_status' => "Live", 'job_masters.status' => 1]);
        
        if ($industry != '') {
            $JobsData->where('job_masters.job_industry', $industry);
        }

        $Jobs = $JobsData->get()->take(10);
        
        foreach ($Jobs as $key => $job) {
            if(in_array($job->id, $jobs_array)){
                $Jobs[$key]['favourite_status'] = 1;   
            }else{
                $Jobs[$key]['favourite_status'] = 0;   
            }
        }
        return view('web.applicant_recommended_jobs', compact('Jobs'));        
    }
    
    public function addPersonalDetails(Request $request)
    {
        $id = session()->get('Auth_Uid_AirtrJobs');
        
        $applicant_count =  PersonalDetails::where(['user_id' => $id])->count();

        if($applicant_count == 0){
            $applicant = new PersonalDetails;
            $applicant->user_id = session()->get('Auth_Uid_AirtrJobs');
            $applicant->full_name = $request->full_name;
            $applicant->contact_number = $request->contact_number;
            $applicant->email = $request->email;
            
            $result = $applicant->save();
            \Session::flash('flash_message', 'Added Succesfully');
            return redirect()->back();            
        }else{

            $result = PersonalDetails::Where('user_id',$id)->update([
                'full_name' => $request->full_name,
                'contact_number' => $request->contact_number,
                'email' => $request->email
            ]);

            \Session::flash('flash_message', 'Updated Succesfully');
            return redirect()->back();            
        }
    }    

    public function addCompanyDetails(Request $request)
    {
        $id = session()->get('Auth_Uid_AirtrJobs');
        
        $applicant_count =  CompanyDetails::where(['user_id' => $id])->count();

        if($applicant_count == 0){
            $companyDetails = new CompanyDetails;
            $companyDetails->user_id = session()->get('Auth_Uid_AirtrJobs');
            $companyDetails->company_name = $request->company_name;
            $companyDetails->company_website = $request->company_website;
            $companyDetails->email_address = $request->email_address;
            $companyDetails->contact_no = $request->contact_no;
            $companyDetails->state = $request->state;
            $companyDetails->city = $request->city;
            $companyDetails->pincode = $request->pincode;
            $companyDetails->employee_desc = $request->employee_desc;
            $companyDetails->interview_address = $request->interview_address;
            $companyDetails->contact_person_name = $request->contact_person_name;
            $companyDetails->contact_person_designation = $request->contact_person_designation;
            
            
            $result = $companyDetails->save();
            \Session::flash('flash_message', 'Added Succesfully');
            return redirect()->back();            
        }else{

            $company = CompanyDetails::Where('user_id',$id);
            if ($request->has('company_name')) {
                $company->update(['company_name' => $request->company_name]);
            }
    
            if ($request->has('company_website')) {
                $company->update(['company_website' => $request->company_website]);
            }
            
            if ($request->has('email_address')) {
                $company->update(['email_address' => $request->email_address]);
            }
    
            if ($request->has('contact_no')) {
                $company->update(['contact_no' => $request->contact_no]);
            }
    
            if ($request->has('state')) {
                $company->update(['state' => $request->state]);
            }
    
            if ($request->has('city')) {
                $company->update(['city' => $request->city]);
            }
    
            if ($request->has('pincode')) {
                $company->update(['pincode' => $request->pincode]);
            }
    
            if ($request->has('employee_desc')) {
                $company->update(['employee_desc' => $request->employee_desc]);
            }
            if ($request->has('interview_address')) {
                $company->update(['interview_address' => $request->interview_address]);
            }
            if ($request->has('contact_person_name')) {
                $company->update(['contact_person_name' => $request->contact_person_name]);
            }
            if ($request->has('contact_person_designation')) {
                $company->update(['contact_person_designation' => $request->contact_person_designation]);
            }
            
            \Session::flash('flash_message', 'Updated Succesfully');
            return redirect()->back();            
        }
    }    

    public function addNewJobPost(Request $request)
    {
        $id = session()->get('Auth_Uid_AirtrJobs');
        
        $validateData = $request->validate([
            'job_title'=>'required',
            'job_desc'=>'required',
            'job_skill'=>'required',
            'category'=>'required',
            'work_experiance'=>'required',
            'state'=>'required',
            'city'=>'required',
            'current_vacancy'=>'required',
            'location_name'=>'required',
            'industry_type'=>'required',
            'company_hiring_for'=>'required',
            'functional_area'=>'required',
            // 'job_shift'=>'required',
            // 'job_type'=>'required',
            'education_required'=>'required',
            'candidate_pofile_desc'=>'required',
            // 'job_payment'=>'required',
            'job_live'=>'required',
            // 'job_link'=>'required'
        ]);

        $salary = $request->annual_salary;
        $salary_new = explode ("-", $salary); 
        $salary = array_map('trim', $salary_new);
        $min_salary = $salary[0];
        $max_salary = $salary[1];

        $emp = $request->work_experiance;
        $emp_new = explode ("-", $emp); 
        $emp = array_map('trim', $emp_new);
        $work_exp_from = $emp[0];
        $work_exp_to = $emp[1];

        $jobDetails = new JobMaster;
        $jobDetails->user_id = $id;
        $jobDetails->job_title = $request->job_title;
        $jobDetails->job_desc = $request->job_desc;
        $jobDetails->job_skill = $request->job_skill;
        $jobDetails->job_state = $request->state;
        $jobDetails->job_city = $request->city;
        $jobDetails->category = $request->category;
        $jobDetails->work_exp_from = $work_exp_from;
        $jobDetails->work_exp_to = $work_exp_to;
        $jobDetails->current_vacancy = $request->current_vacancy;
        $jobDetails->location_name = $request->location_name;
        $jobDetails->job_industry = $request->industry_type;
        $jobDetails->company_hiring_for = $request->company_hiring_for;
        $jobDetails->job_functional_area = $request->functional_area;
        $jobDetails->job_role = $request->job_role;
        $jobDetails->job_shift = $request->job_shift;
        $jobDetails->job_type = $request->job_type;
        $jobDetails->education_required = $request->education_required;
        $jobDetails->candidate_pofile_desc = $request->candidate_pofile_desc;
        $jobDetails->job_payment = $request->job_payment;
        $jobDetails->job_live = $request->job_live;
        $jobDetails->job_link = $request->job_link;
        $jobDetails->min_salary = $min_salary;
        $jobDetails->max_salary = $max_salary;
        $jobDetails->job_status = 'Live';
        
        $result = $jobDetails->save();
        
        $planData = PlanManagement::Where('uid',$id)->first();
        $add_job_limit = $planData->job_limit;
        
        $plan = PlanManagement::Where('uid',$id);
            
        $plan->update(['job_limit' => $add_job_limit - 1]);
        
        $jobUserIid = $id; 
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
        $min_salary = $min_salary;
        $max_salary = $max_salary;
        $jobindustry = $request->industry_type;
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

        \Session::flash('flash_message', 'Added Succesfully');
        return response()->json(['redirect' => '../post-new-job']);
    }    

    public function addNewJobPostForm(){
        
        $categories =  categories::all();

        $states =  State::all();

        $job_industry =  JobIndustry::all();

        $job_type =  JobTypeMaster::all();

        $job_experiance =  JobExperiance::all();

        $job_salary =  JobSalary::all();

        $job_education =  JobEducation::all();
        $job_pay =  JobPaymentMaster::all();
        return view('web.post_new_job', compact('categories', 'states', 'job_industry', 'job_type', 'job_experiance', 'job_salary', 'job_education', 'job_pay'));        
    }

    public function deleteJobPost($id)
    {
        $job = JobMaster::where('id', $id)
                    ->update(['status' => 0]);

        \Session::flash('flash_message', 'Applied for Job successfully');
        return redirect()->back();
    }
    
    public function deleteCertificate($id)
    {
        
        $job = ApplicantCertificates::where('id', $id)->delete();

        \Session::flash('flash_message', 'Deleted successfully');
        return redirect()->back();
    }

    public function updateJobStatus(Request $request)
    {

        $job = JobManagement::where('user_id', $request->user_id)
                    ->where('job_id', $request->job_id)
                    ->update(['job_status' => $request->applicantjobstatus]);
                    
                    
        $User = User::where('uid', $request->user_id)->first();
        
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
        $NotifyHandler->deliver_user_id = $request->user_id;
        $NotifyHandler->deliver_user_role = $User->role;
        $NotifyHandler->job_id = $request->job_id;
        $NotifyHandler->job_status = $request->applicantjobstatus;

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

    public function updateJobSchedule(Request $request){
        
        $uid = session()->get('Auth_Uid_AirtrJobs');
        $user = JobManagement::Where('user_id',$uid)->where('job_id', $request->job_id);
        
        
        if ($request->has('joining_date')) {
            $user->update(['joining_date' => $request->joining_date]);
        }
        
        if ($request->has('test_status') && $request->test_status == 'Online') {
            $user->update(['online_test' => 1]);
            $user->update(['offline_test' => 0]);
            $user->update(['schedule_for' => $request->schedule_date]);
        }
        
        if ($request->has('test_status') && $request->test_status == 'Offline') {
            $user->update(['offline_test' => 1]);
            $user->update(['online_test' => 0]);
            $user->update(['schedule_for' => $request->schedule_date]);
        }
        
        if ($request->has('interview_by')) {
            $user->update(['interview_by' => $request->interview_by]);
        }
        
        return redirect()->back();

    }

    public function mainSearch(Request $request)
    {
        $filterData = $request->all();

        $job_industry =  JobIndustry::all();

        $job_type =  JobTypeMaster::all();

        $job_experiance =  JobExperiance::all();

        $job_salary =  JobSalary::all();

        $states =  State::all();

        $categories =  categories::all();

        $uid = session()->get('Auth_Uid_AirtrJobs');

        $jobsFav = FavouriteJobs::where(['favourite_jobs.user_id' => $uid])->get();
        
        $jobs_array = [];
        
        foreach ($jobsFav as $key => $job) {
            $jobs_array[$key] = $job->job_id;
        }

        // $JobsData = JobMaster::query();

        // $JobsData->select(
        //     'job_masters.*',
        //     'job_masters.status as jobmasters_status',
        //     'company_details.status as company_status',
        //     'company_details.id as company_id',
        //     'company_details.company_name',
        //     'personal_details.contact_number as employer_contact_number'
        //     )
            
            
        //     ->leftjoin('company_details','company_details.user_id','=','job_masters.user_id')
        //     ->leftjoin('personal_details', 'personal_details.user_id', '=', 'job_masters.user_id')
        //     ->where(['job_masters.job_status' => "Live", 'job_masters.status' => 1]);

        // if ($request->company_name != '') {
        //     $JobsData->where('company_details.company_name', 'like', '%' . $request->company_name . '%');
        // }

        // if ($request->state != '') {
        //     $JobsData->where('company_details.company', 'like', '%' . $request->state . '%');
        // }
        
        $Jobs = JobMaster::select(
                'job_masters.*',
                'job_masters.status as jobmasters_status',
                'company_details.status as company_status',
                'company_details.id as company_id',
                'company_details.company_name',
                'personal_details.contact_number as employer_contact_number'
                )
                
                
                ->leftjoin('company_details','company_details.user_id','=','job_masters.user_id')
                ->leftjoin('personal_details', 'personal_details.user_id', '=', 'job_masters.user_id')
                ->where('job_masters.job_status', "Live")
                ->where('job_masters.status' , 1)
                ->get();
            
        
        // $Jobs = $JobsData->get();
        if ($request->company_name != '') {
            $Jobs = JobMaster::select(
                'job_masters.*',
                'job_masters.status as jobmasters_status',
                'company_details.status as company_status',
                'company_details.id as company_id',
                'company_details.company_name',
                'personal_details.contact_number as employer_contact_number'
                )
                
                
                ->leftjoin('company_details','company_details.user_id','=','job_masters.user_id')
                ->leftjoin('personal_details', 'personal_details.user_id', '=', 'job_masters.user_id')
                ->where('job_masters.job_status', "Live")
                ->where('job_masters.status' , 1)
                ->where('job_masters.job_title', 'like', '%' . $request->company_name . '%')
                ->get();
            
            if(count($Jobs) == 0){
                $Jobs = JobMaster::select(
                'job_masters.*',
                'job_masters.status as jobmasters_status',
                'company_details.status as company_status',
                'company_details.id as company_id',
                'company_details.company_name',
                'personal_details.contact_number as employer_contact_number'
                )
                
                
                ->leftjoin('company_details','company_details.user_id','=','job_masters.user_id')
                ->leftjoin('personal_details', 'personal_details.user_id', '=', 'job_masters.user_id')
                ->where('job_masters.job_status', "Live")
                ->where('job_masters.status' , 1)
                ->where('job_masters.min_salary' , $request->company_name)
                ->get();    
            }

            if(count($Jobs) == 0){
                $Jobs = JobMaster::select(
                'job_masters.*',
                'job_masters.status as jobmasters_status',
                'company_details.status as company_status',
                'company_details.id as company_id',
                'company_details.company_name',
                'personal_details.contact_number as employer_contact_number'
                )
                
                
                ->leftjoin('company_details','company_details.user_id','=','job_masters.user_id')
                ->leftjoin('personal_details', 'personal_details.user_id', '=', 'job_masters.user_id')
                ->where('job_masters.job_status', "Live")
                ->where('job_masters.status' , 1)
                ->where('job_masters.max_salary', $request->company_name)
                ->get();    
            }

            if(count($Jobs) == 0){
                $Jobs = JobMaster::select(
                'job_masters.*',
                'job_masters.status as jobmasters_status',
                'company_details.status as company_status',
                'company_details.id as company_id',
                'company_details.company_name',
                'personal_details.contact_number as employer_contact_number'
                )
                
                
                ->leftjoin('company_details','company_details.user_id','=','job_masters.user_id')
                ->leftjoin('personal_details', 'personal_details.user_id', '=', 'job_masters.user_id')
                ->where('job_masters.job_status', "Live")
                ->where('job_masters.status' , 1)
                ->where('job_masters.job_industry', 'like', '%' . $request->company_name . '%')
                ->get();    
            }

            if(count($Jobs) == 0){
                $Jobs = JobMaster::select(
                'job_masters.*',
                'job_masters.status as jobmasters_status',
                'company_details.status as company_status',
                'company_details.id as company_id',
                'company_details.company_name',
                'personal_details.contact_number as employer_contact_number'
                )
                
                
                ->leftjoin('company_details','company_details.user_id','=','job_masters.user_id')
                ->leftjoin('personal_details', 'personal_details.user_id', '=', 'job_masters.user_id')
                ->where('job_masters.job_status', "Live")
                ->where('job_masters.status' , 1)
                ->where('job_masters.category', 'like', '%' . $request->company_name . '%')
                ->get();    
            }

            
        }

        if ($request->state != '') {
            $Jobs = JobMaster::select(
                    'job_masters.*',
                    'job_masters.status as jobmasters_status',
                    'company_details.status as company_status',
                    'company_details.id as company_id',
                    'company_details.company_name',
                    'personal_details.contact_number as employer_contact_number'
                )
                
                ->leftjoin('company_details','company_details.user_id','=','job_masters.user_id')
                ->leftjoin('personal_details', 'personal_details.user_id', '=', 'job_masters.user_id')
                ->where('job_masters.job_status', "Live")
                ->where('job_masters.status' , 1)
                ->where('job_masters.job_state', 'like', '%' . $request->state . '%')
                ->get();
            
            if(count($Jobs) == 0){
            
                $Jobs = JobMaster::select(
                'job_masters.*',
                'job_masters.status as jobmasters_status',
                'company_details.status as company_status',
                'company_details.id as company_id',
                'company_details.company_name',
                'personal_details.contact_number as employer_contact_number'
                )
                
                
                ->leftjoin('company_details','company_details.user_id','=','job_masters.user_id')
                ->leftjoin('personal_details', 'personal_details.user_id', '=', 'job_masters.user_id')
                ->where('job_masters.job_status', "Live")
                ->where('job_masters.status' ,1)
                ->where('job_masters.job_city', 'like', '%' . $request->state . '%')
                ->get();    
            }

        }

        foreach ($Jobs as $key => $job) {
            if(in_array($job->id, $jobs_array)){
                $Jobs[$key]['favourite_status'] = 1;   
            }else{
                $Jobs[$key]['favourite_status'] = 0;   
            }
        }
        
        $HighlightJobs = JobMaster::where('highlight_job_status',1)->orderBy('id', 'DESC')->get();
        
        
        $company_id = $request->company_id;

        return view('web.search_jobs', compact('Jobs', 'job_industry', 'job_type', 'job_experiance', 'job_salary', 'job_salary', 'states', 'categories', 'company_id', 'filterData','HighlightJobs'));        
        
        
    }
        
    public function checkDetails($uid)
    {
        $user_id = $uid;

        $userData = [];        
        $dataCount = [];   
        $path = env('APP_URL');
        $Role = session()->get('Auth_Role_AirtrJobs');
        if($Role == 1){

            $userData_count =  ApplicantPersonalDetails::where(['user_id' => $user_id])->count();
            if($userData_count == 0){
                return response()->json(['redirect' => $path.'profile.html/1']);
            }

        }elseif($Role == 2){
            $userData_company =  CompanyDetails::where(['user_id' => $user_id])->count();
            if($userData_company == 0){
                return response()->json(['redirect' => $path.'profile.html/1']);
            }

            $userData_count =  PersonalDetails::select(
                                    'personal_details.*',
                                    'personal_details.profile_img as profile_image'
                                    )->where(['user_id' => $user_id])->count();
            
            if($userData_count == 0){
                return response()->json(['redirect' => $path.'profile.html/2']);
            }
        }
    }
    
    public function checkLogin($uid)
    {
        $user_id = $uid;

        $user =  User::where(['uid' => $user_id])->count();
        $path = env('APP_URL');
        
        if($user == 0){
            session()->forget('Auth_Uid_AirtrJobs');
            session()->forget('Auth_Role_AirtrJobs');
            session()->forget('Auth_Profile_AirtrJobs');
            
            return response()->json(['redirect' => $path]);
            
        }
    }
    
    
    public function addSubscriber(Request $request)
    {
        $data = \Request::except(array('_token'));

        $inputs = $request->all();

        $rule = array(
            'email' => 'required|email|max:75',
        );

        $validator = \Validator::make($data, $rule);

        if ($validator->fails()) {
            \Session::flash('error_flash_message', 'The email field is required.
        ');
            return redirect('/#top-footer');

        }

        $rule = array(
            'email' => 'unique:subscribers',
        );

        $validator = \Validator::make($data, $rule);

        if ($validator->fails()) {

            \Session::flash('error_flash_message', 'The email is already subscribed');
            return redirect('/#top-footer');
        }

        $subscriber = new Subscribers;

        $subscriber->email = $inputs['email'];

        $subscriber->save();

        \Session::flash('flash_message_subscribe', 'Successfully subscribe!');

        return redirect('/#top-footer');

    }
    
}
