<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\PlanManagement;
use App\Models\ApplicantPlans;
use Carbon\Carbon;
use App\Models\EmployerPlans;
use App\Models\PlanHistory;
use App\Models\ApplicantPersonalDetails;
use App\Models\ApplicantEducationalDetails;
use App\Models\ApplicantDocuments;
use App\Models\ApplicantCertificates;
use App\Models\ApplicantVideoDocuments;
use App\Models\ApplicantWorkHistory;
use App\Models\ApplicantSocialMedia;
use App\Models\JobMaster;
use App\Models\JobManagement;
use App\Models\FavouriteJobs;
use App\Models\NotificationHandler;
use App\Models\ContactAdmin;
use Illuminate\Support\Facades\Password;
use App\Models\PersonalDetails;
use App\Models\SocialMedia;
use App\Models\CompanyDetails;
use App\Models\Sector;

use Session;

class AuthController extends Controller
{
    public function register(Request $request){
        
        $uid = $request->uid;
        $creation_date = $request->creation_date;
        
        if ($request->has('mobile_number') && $request->mobile_number != '') {
            $mobile_number = $request->mobile_number;
            $user_count =  User::where(['mobile_number' => $mobile_number,'role' => $request->role])->count();
            
            if($user_count != 0){
                $mobile_number = $request->mobile_number;
                $user =  User::where(['mobile_number' => $mobile_number,'role' => $request->role])->first();
                $UID = $user->uid;
                $Role = $user->role;
                if($UID != $request->uid){
                    if($Role == 1){
                        $result = ApplicantPersonalDetails::Where('user_id',$UID)->update(['user_id' => $request->uid]);
                        $result = ApplicantEducationalDetails::Where('user_id',$UID)->update(['user_id' => $request->uid]);
                        $result = ApplicantWorkHistory::Where('user_id',$UID)->update(['user_id' => $request->uid]);
                        $result = ApplicantSocialMedia::Where('user_id',$UID)->update(['user_id' => $request->uid]);
                        $result = ApplicantDocuments::Where('user_id',$UID)->update(['user_id' => $request->uid]);
                        $result = ApplicantCertificates::Where('user_id',$UID)->update(['user_id' => $request->uid]);
                        $result = ApplicantVideoDocuments::Where('user_id',$UID)->update(['user_id' => $request->uid]);
                        
                        $result = FavouriteJobs::Where('user_id',$UID)->update(['user_id' => $request->uid]);
                        $result = JobManagement::Where('user_id',$UID)->update(['user_id' => $request->uid]);
                        $result = ApplicantDocuments::Where('user_id',$UID)->update(['user_id' => $request->uid]);
                        
                    }
                    
                    if($Role == 2){
                        $result = PersonalDetails::Where('user_id',$UID)->update(['user_id' => $request->uid]);
                        $result = SocialMedia::Where('user_id',$UID)->update(['user_id' => $request->uid]);
                        $result = CompanyDetails::Where('user_id',$UID)->update(['user_id' => $request->uid]);
                        $result = Sector::Where('user_id',$UID)->update(['user_id' => $request->uid]);
                        
                        $result = JobMaster::Where('user_id',$UID)->update(['user_id' => $request->uid]);
                    }
                    $result = NotificationHandler::Where('user_id',$UID)->update(['user_id' => $request->uid]);
                    $result = NotificationHandler::Where('deliver_user_id',$UID)->update(['deliver_user_id' => $request->uid]);
                    $result = PlanHistory::Where('uid',$UID)->update(['uid' => $request->uid]);
                    $result = PlanManagement::Where('uid',$UID)->update(['uid' => $request->uid]);
                    $result = User::Where('uid',$UID)->update(['uid' => $request->uid]);
                    $result = ContactAdmin::Where('user_id',$UID)->update(['user_id' => $request->uid]);
                    
                }
            }
        }
       
        $user_count =  User::where(['uid' => $uid])->count();
        
        if($user_count == 0){
            $validateData = $request->validate([
                'uid'=>'required|unique:users',
                'auth_type'=>'required',
                // 'email'=>'unique:users',
                // 'mobile_number'=>'unique:users',
                'creation_date'=>'required'
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
            $user->creation_date = $request->creation_date;
            $user->current_signin = $request->current_signin;
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
                return response()->json(["result"=>"Users added successfully"]);
            }else{
                return response()->json(["result"=>"Error in added Users details"]);
            }
        }else{
            
            $user_count =  User::where(['uid' => $uid])->count();
            
            $user =  User::where(['uid' => $uid])->first();
            if($user_count != 0){
                if($request->role == 1 && $user->role != $request->role){
                    return response()->json(["result"=>"Email Already regitered as employeer"]);
                }
                
                if($request->role == 2 && $user->role != $request->role){
                    return response()->json(["result"=>"Email Already regitered as user"]);
                }

                if($user->status == 0){
                    return response()->json(["blocked"=>"User is Blocked"]);
                }
            
            }
            
            
            $update = User::where(['uid' => $uid, 'creation_date' => $creation_date]);
        
            if ($request->has('current_signin')) {
                $update->update(['current_signin' => $request->current_signin]);
            }
           
            return response()->json(['result' => 'User Already Registered']);
            // return response()->json(["error"=>"User Already Registered."]);
        }
    }

    public function updateLoginDate(Request $request)
    {
        $uid = $request->uid;
        $creation_date = $request->creation_date;

        $update = User::where(['uid' => $uid, 'creation_date' => $creation_date]);
        
        if ($request->has('current_signin')) {
            $update->update(['current_signin' => $request->current_signin]);
        }
       
        return response()->json(['successMsg' => 'Updated Successfully']);
    }

    public function registerAdmin(Request $request){
        $validateData = $request->validate([
            'name'=>'required|max:55',
            'email'=>'email|required|unique:users',
            'mobile_number'=>'required|unique:users',
            'password'=>'required|confirmed'
        ]);

        $validateData['mobile_number'] = $request->mobile_number;
        $validateData['role'] = $request->role;
        $validateData['password'] = bcrypt($request->password);
        $validateData['pw'] = $request->password;
        $validateData['fcm_token'] = $request->fcm_token;

        $user = User::create($validateData);

        $accessToken = $user->createToken('authToken')->accessToken;
        $data = [
            'grant_type' => 'password',
            'client_id' => '2',
            'client_secret' => 'bMg3ueJjAKqbI24WBxfgCszF5zVq5heXYcNLofW6',
            'username' => $request->email,
            'password' => $request->password,
        ];

        $request = Request::create('/oauth/token','POST',$data);
        $acc_token = app()->handle($request);

        $accessToken = json_decode($acc_token->getContent());


        return response()->json(['user'=> $user,'access_token'=>$accessToken]);

    }

    public function login(Request $request){
        $loginData = $request->validate([
            'email'=>'email|required',
            'password'=>'required'
        ]);

        if(!auth()->attempt($loginData)){
            return response(['message'=>'Invalid Credentials']);
        }

        $trial = User::where('email', $request->email)->update(['fcm_token' => $request->fcm_token]);
        
        $accessToken = auth()->user()->createToken('authToken')->accessToken;
        
        $data = [
            'grant_type' => 'password',
            'client_id' => '2',
            'client_secret' => 'bMg3ueJjAKqbI24WBxfgCszF5zVq5heXYcNLofW6',
            'username' => $request->email,
            'password' => $request->password,
        ];

        $request = Request::create('/oauth/token','POST',$data);
        $acc_token = app()->handle($request);

        $token = json_decode($acc_token->getContent());

        $success['token'] = $token;
        $success['fcm_token'] = $request->fcm_token;

        return response()->json(['user'=> auth()->user(), 'details' => $success]);
    }

    public function forgetPassword(Request $request)
    {
        $validateData = $request->validate([
            'email'=>'email|required',
            'password'=>'required|confirmed'
        ]);

        $password = bcrypt($request->password);

        $result = User::Where(['email' => $request->email])->update([
            'password' => $password
        ]);
        
        if($result){
            return response()->json(["result"=>"Password updated successfully"]);
        }else{
            return response()->json(["result"=>"Enter valid Email and Password"]);
        }   
    }

    public function logout()
    { 
        $request = auth('api')->user()->id;
        $accessToken = auth('api')->user()->token();
        $token= auth('api')->user()->tokens->find($accessToken);
        $token->revoke();
        $response=array();
        $response['successMsg']="Successfully logout";
        return response()->json($response)->header('Content-Type', 'application/json');
    }

    public function getUser($id)
    {
        $user = User::find($id);
        $user_details =  Personal::where(['user_id' => $id, 'status' => 1])->get();
        
        return response()->json(["user"=>$user, "user_details"=>$user_details]);
    }

    /**
     * Change the status to success the order.
     *
     * @return \Illuminate\Http\Response
     */
    public function verifyMobile(Request $request)
    {
        $mobile_number = $request->mobile_number; 
        
        $result =  User::where(['mobile_number' => $mobile_number])->count();

        if($result > 0){
            return response()->json(["result"=> true]);
        }else{
            return response()->json(["result"=> false]);
        }
    }

    /**
     * Change the status to success the order.
     *
     * @return \Illuminate\Http\Response
     */
    public function verifyEmail(Request $request)
    {
        $email = $request->email; 
        
        $result =  User::where(['email' => $email])->count();

        if($result > 0){
            return response()->json(["result"=> true]);
        }else{
            return response()->json(["result"=> false]);
        }
    }

    public function check(Request $request)
    {
        $check = User::where('mobile_number', $request->mobile_number)->first();
        
        if (!$check) {
            return response()->json([
                "new_user" => 0,
                "mobile_number" => $request->mobile_number,
                'role' => $request->role,
                'successMsg' => 'Please Register'
            ]);
        } else {
            $data = [
                'grant_type' => 'password',
                'client_id' => '2',
                'client_secret' => 'bMg3ueJjAKqbI24WBxfgCszF5zVq5heXYcNLofW6',
                'username' => $check->email,
                'password' => $check->pw,
            ];

            $request = Request::create('/oauth/token','POST',$data);
            $acc_token = app()->handle($request);

            $token = json_decode($acc_token->getContent());

            // $token = $check->createToken('authToken')->accessToken;
        

            // return $data;
            // $token = $check->createToken('authToken')->accessToken;
            return response()->json(["new_user" => 1, "successMsg" => "Successfully LoggedIn", "token" => $token, 'role' => $check->role,'user'=> $check]);
        }
    }

    public function storeOtp(Request $request)
    {
        $trial = User::where('email', $request->email)->update(['remember_token' => $request->otp]);
        return response()->json(["successMsg" => 'otp saved in db', 'email' => $request->email]);
    }

    public function checkotp(Request $request)
    {
        $check = User::where('remember_token', $request->otp)->where('email', $request->email)->get()->count();
        if ($check > 0) {
            return response()->json(["successMsg" => 'otp verified']);
        } else {
            return response()->json(["errorMsg" => 'Otp verification faild']);
        }
    }

    public function getEmail()
    {
        return view('forgot_password');
    }
    
    public function postEmail(Request $request)
   {
        $user_count =  User::where(['email' => $request->email,'role' => 'Admin'])->count();
        if($user_count == 0){
            \Session::flash('error_message', 'Invalid Email Addres');
            return redirect()->back();
        }
       $this->validate($request, ['email' => 'required|email']);
       $otp = substr(str_shuffle("0123456789"), 0, 6);

       session()->put('Auth_OTP_AirtrJobs', $otp);
       session()->put('Auth_Email_AirtrJobs', $request->email);
       $data_email = array(
            'email' => $request->email,
            'otp' => $otp
        );
            
        \Mail::send('emails.forgot_passsword', $data_email, function($message) use ($data_email){
            $message->to($data_email['email'])
            ->from('aitrjobsemail@9demos.com', 'AitrJobs')
            ->subject('Reset Password');
            
        });
        return view('web.verify_email_otp');        
   }

   public function verifyOtp(Request $request)
    {
        $verify_otp = $request->verify_otp;
        $otp = session()->get('Auth_OTP_AirtrJobs');
        $email = session()->get('Auth_Email_AirtrJobs');
        
        if($otp == $verify_otp){
            return redirect('admin/forgot-password');
        }else{
            \Session::flash('error_message', 'Invalid Otp');
            return view('web.verify_email_otp');        
        }
    }

    public function resetpassword()
    {
        return view('admin_forgot_password');
    }
    
    public function ResetpasswordData(Request $request)
    {
        $email = session()->get('Auth_Email_AirtrJobs');
        $data =  \Request::except(array('_token')) ;
        $rule  =  array(
                'password'       => 'required|confirmed',
                'password_confirmation'       => 'required'
            ) ;

        $validator = \Validator::make($data,$rule);

        if ($validator->fails())
        {
                return redirect()->back()->withErrors($validator->messages());
        }
    
         
        $credentials = $request->only('password', 'password_confirmation'
            );
            
        $user =  User::where(['email' => $email]);
        $newpassword = bcrypt($credentials['password']);
        $user->update(['password' => $newpassword]);

        Session::flash('flash_message', trans('Password Updated Successfully'));
        return redirect('admin/login');
        return redirect()->back();        
    }
    
}
