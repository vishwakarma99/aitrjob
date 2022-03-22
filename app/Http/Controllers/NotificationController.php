<?php

namespace App\Http\Controllers;
use App\Models\Notification;
use App\Models\NotificationHandler;
use App\Models\ApplicantPersonalDetails;
use App\Models\PersonalDetails;
use App\Models\JobMaster;
use App\Models\CompanyDetails;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    
    public function checkStatus()
    {
        
        $notiHandler = NotificationHandler::where('status', NULL)->get();
        
        if(count($notiHandler) != 0){
            foreach($notiHandler as $notiHan){
                $noti_id = $notiHan->notification_id;
                $app_user_id = $notiHan->user_id;
                $emp_id = $notiHan->deliver_user_id;
                $job_id = $notiHan->job_id;
                $job_status = $notiHan->job_status;
                
                $notification = Notification::where('id', $noti_id)->first();
                $notify = $notification->notification;
                
                
                if($notification->id == 1){
                    $applicant =  ApplicantPersonalDetails::where(['user_id' => $app_user_id])->first();
                
                    $app_name = $applicant->full_name;
                
                    $notificationD = $app_name.' '.$notify;
                }
                
                if($notification->id == 2){
                    $jobData =  JobMaster::where(['id' => $job_id])->first();
                    $jobUserIid = $jobData->user_id; 
                    $companyDetails =  CompanyDetails::where(['user_id' => $jobUserIid])->first();
                    
                    $job_id = $jobData->job_id;
                    $job_title = $jobData->job_title;
                    $company_name = $companyDetails->company_name;
                    
                    $notificationD = $notify.' '.$job_status;
                    
                    $data = [ 
                        "Job Id" => $job_id,
                        "Company Name" => $company_name,
                        "Job" => $job_title,
                    ];
                }

                if($notification->id == 3){
                    $jobData =  JobMaster::where(['id' => $job_id])->first();
                    $jobUserIid = $jobData->user_id; 
                    $companyDetails =  CompanyDetails::where(['user_id' => $jobUserIid])->first();
                    
                    $job_id = $jobData->job_id;
                    $job_title = $jobData->job_title;
                    $company_name = $companyDetails->company_name;
                    
                    $notificationD = $notify.' '.$job_status;
                    
                    $data = [ 
                        "Job Id" => $job_id,
                        "Company Name" => $company_name,
                        "Job" => $job_title,
                    ];
                }
                
                $curl = curl_init();
                
                $msg = [ 
                        "title" => "Airtr Jobs",
                        "body" => $notificationD
                        ];
                        
                $postData = [ 
                    "to" => "/topics/".$emp_id,
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
                $message = $dataresponse['message_id'];
                
                if($message != ''){
                    $job = NotificationHandler::where('id', $notiHan->id)
                        ->update(['status' => 1]);
                }
                
            }
        }
    }

}
