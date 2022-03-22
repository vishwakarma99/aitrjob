<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PlanMasterController;
use App\Http\Controllers\JobMasterController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\SectorController;
use App\Http\Controllers\SocialMediaController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ApplicantsController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------u
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('getPlanResponse', 'App\Http\Controllers\WebIndexController@getPlanResponse');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    // 'namespace' => 'Admin', 
    'prefix' => 'admin'
], function () {
    Route::apiResource('plans', PlanMasterController::class);
    Route::apiResource('order', OrdersController::class);
});

Route::get('dashboard/{id}', 'App\Http\Controllers\HomeController@getDashboardData');

Route::get('userdashboard/{id}', 'App\Http\Controllers\HomeController@getUserDashboardData');

Route::get('getAllCategories', 'App\Http\Controllers\HomeController@getAllCategories');
Route::get('getAllPlans/{status}', 'App\Http\Controllers\HomeController@getAllPlans');
Route::get('getLatestBlogs', 'App\Http\Controllers\HomeController@getLatestBlogs');
Route::get('getAllJobTypes', 'App\Http\Controllers\HomeController@getAllJobTypes');
Route::get('getAllJobSubTypes/{id}', 'App\Http\Controllers\HomeController@getAllJobSubTypes');
Route::get('JobExperiance', 'App\Http\Controllers\HomeController@JobExperiance');
Route::get('JobSalary', 'App\Http\Controllers\HomeController@JobSalary');
Route::get('getAllState', 'App\Http\Controllers\HomeController@getAllState');
Route::get('getAllCities/{id}', 'App\Http\Controllers\HomeController@getAllCities');
Route::get('getAllJobIndustries', 'App\Http\Controllers\HomeController@getAllJobIndustries');
Route::get('getAllJobFuncationAreas/{id}', 'App\Http\Controllers\HomeController@getAllJobFuncationAreas');
Route::get('getAllJobShifts', 'App\Http\Controllers\HomeController@getAllJobShifts');
Route::get('getAllEducations', 'App\Http\Controllers\HomeController@getAllEducations');
Route::get('getAllPayments', 'App\Http\Controllers\HomeController@getAllPayments');



Route::post('/register', 'App\Http\Controllers\AuthController@register');
Route::post('/registerAdmin', 'App\Http\Controllers\AuthController@registerAdmin');

Route::post('/login', 'App\Http\Controllers\AuthController@login');

Route::get('/user/{id}', 'App\Http\Controllers\AuthController@getUser');

Route::post('/verifyMobile', 'App\Http\Controllers\AuthController@verifyMobile');
Route::post('/verifyEmail', 'App\Http\Controllers\AuthController@verifyEmail');

Route::post('/resetPassword', 'App\Http\Controllers\AuthController@forgetPassword');

Route::post('logout', 'App\Http\Controllers\AuthController@logout');

Route::POST(
    'storeOtp',
    [App\Http\Controllers\Api\AuthController::class, 'storeOtp']
);
Route::POST(
    'checkotp',
    [App\Http\Controllers\Api\AuthController::class, 'checkotp']
);

Route::post('addFavourite', 'App\Http\Controllers\ApplicantJobsController@addFavouriteJobs');

Route::get('getMyFavouriteJobs/{id}', 'App\Http\Controllers\ApplicantJobsController@getMyFavouriteJobs');

Route::GET(
    'searchByCategory/{category}/{id}',
    [App\Http\Controllers\ApplicantJobsController::class, 'searchByCategory']
);

Route::POST('searchFunctionalArea', 'App\Http\Controllers\ApplicantJobsController@searchFunctionalArea');

Route::get('searchIndustry/{id}', 'App\Http\Controllers\ApplicantJobsController@searchIndustry');

Route::get('getAllJobsByFunctionalArea/{id}/{uid}', 'App\Http\Controllers\ApplicantsController@getAllJobsByFunctionalArea');

Route::get('getAllJobsByIndustry/{id}/{uid}', 'App\Http\Controllers\ApplicantsController@getAllJobsByIndustry');

Route::get(
    'recommendedJob/{id}',
    [App\Http\Controllers\ApplicantsController::class, 'recommendedJob']
);

Route::POST(
    'check',
    [App\Http\Controllers\Api\AuthController::class, 'check']
);

Route::POST('getApplicationStatus', 'App\Http\Controllers\ApplicantJobsController@getApplicationStatus');

Route::POST('getNotificationDetails', 'App\Http\Controllers\ApplicantJobsController@getNotificationDetails');
Route::POST('getNotifyDetails', 'App\Http\Controllers\ApplicantJobsController@getNotifyDetails');

Route::apiResource('job', JobMasterController::class);
Route::get('getAllApplicantsByJobId/{job_id}', 'App\Http\Controllers\JobMasterController@getAllApplicantsByJobId');
Route::get('getAllApplicantsByJob/{job_id}', 'App\Http\Controllers\JobMasterController@getAllApplicantsByJob');

Route::get('checkStatus', 'App\Http\Controllers\NotificationController@checkStatus');


Route::get('getApplicantsUnderReview/{job_id}', 'App\Http\Controllers\JobMasterController@getApplicantsUnderReview');
Route::get('getApplicantsHired/{job_id}', 'App\Http\Controllers\JobMasterController@getApplicantsHired');
Route::get('getApplicantsShortListed/{job_id}', 'App\Http\Controllers\JobMasterController@getApplicantsShortListed');
Route::get('getRejectedJobs/{id}', 'App\Http\Controllers\ApplicantsController@getRejectedJobs');
Route::get('getHiredJobs/{id}', 'App\Http\Controllers\ApplicantsController@getHiredJobs');

Route::get('getAppliedJobs/{id}', 'App\Http\Controllers\ApplicantsController@getAppliedJobs');

Route::post('apply', 'App\Http\Controllers\ApplicantJobsController@applyForJob');
Route::post('getnotifications/{id}', 'App\Http\Controllers\ApplicantJobsController@getNotifications');
Route::post('getmessages/{id}', 'App\Http\Controllers\ApplicantJobsController@getMessages');
Route::get('livejobs/{id}', 'App\Http\Controllers\JobMasterController@totalJobsLive');
Route::get('closedjobs/{id}', 'App\Http\Controllers\JobMasterController@totalJobsClosed');
Route::get('closejob/{id}', 'App\Http\Controllers\JobMasterController@CloseJob');
Route::get('livejob/{id}', 'App\Http\Controllers\JobMasterController@LiveJob');

Route::apiResource('personaldetails', PersonalController::class);
Route::post('/personaldetails/update', 'App\Http\Controllers\PersonalController@update');

Route::post('updateJobSchedule', 'App\Http\Controllers\ApplicantsController@updateJobSchedule');

Route::Resource('companies', CompanyController::class);

// Route::post('addCompanyDetails', 'App\Http\Controllers\CompanyController@addCompanyDetails');
Route::post('/companies/update', 'App\Http\Controllers\CompanyController@update');

Route::apiResource('sector', SectorController::class);
Route::post('/sector/update', 'App\Http\Controllers\SectorController@update');

Route::apiResource('social', SocialMediaController::class);
Route::post('/social/update', 'App\Http\Controllers\SocialMediaController@update');

Route::apiResource('payment', PaymentController::class);
Route::post('/payment/update', 'App\Http\Controllers\PaymentController@update');

Route::post('addContactAdmin', 'App\Http\Controllers\ApplicantsController@addContactAdmin');

//personal details
Route::apiResource('applicant', ApplicantsController::class);
Route::post('addpersonaldetails', 'App\Http\Controllers\ApplicantsController@addAppPersonalDetails');
Route::post('updatepersonaldetails', 'App\Http\Controllers\ApplicantsController@updateAppPersonalDetails');
Route::get('getpersonaldetails/{id}', 'App\Http\Controllers\ApplicantsController@getPersonalDetails');

//Work apis
Route::post('addworkdetails', 'App\Http\Controllers\ApplicantsController@addAppWorkDetails');
Route::post('updateworkdetails', 'App\Http\Controllers\ApplicantsController@updateAppWorkDetails');
Route::get('getworkdetails/{id}', 'App\Http\Controllers\ApplicantsController@getWorkDetails');


//Social media apis
Route::post('addsocialmediadetails', 'App\Http\Controllers\ApplicantsController@addAppSocialMediaDetails');
Route::post('updatesocialmediadetails', 'App\Http\Controllers\ApplicantsController@updateAppSocialMediaDetails');
Route::get('getsocialmediadetails/{id}', 'App\Http\Controllers\ApplicantsController@getSocialMediaDetails');

//Educatonal details
Route::post('addeducatonaldetails', 'App\Http\Controllers\ApplicantsController@addAppEducationalDetails');
Route::post('updateeducationaldetails', 'App\Http\Controllers\ApplicantsController@updateAppEducationalDetails');
Route::get('geteducationaldetails/{id}', 'App\Http\Controllers\ApplicantsController@getEducationalDetails');

Route::post('getNotification/{id}', 'App\Http\Controllers\ApplicantJobsController@getNotification');

//uplaoad details
Route::post('addresumedetails', 'App\Http\Controllers\ApplicantsController@addAppResumeDetails');
Route::post('updateresumedetails', 'App\Http\Controllers\ApplicantsController@updateAppResumeDetails');
Route::get('getresumedetails/{id}', 'App\Http\Controllers\ApplicantsController@getResumeDetails');

//uplaoad details
Route::post('addvideodetails', 'App\Http\Controllers\ApplicantsController@addAppVideoDetails');
Route::post('updatevideodetails', 'App\Http\Controllers\ApplicantsController@updateAppVideoDetails');
Route::get('getvideodetails/{id}', 'App\Http\Controllers\ApplicantsController@getVideoDetails');

//Upload Certificates
Route::post('addcertificate', 'App\Http\Controllers\ApplicantsController@addAppCertificateDetails');
Route::post('updatecertificatedetails', 'App\Http\Controllers\ApplicantsController@updateAppCertificateDetails');
Route::get('getcertificatedetails/{id}', 'App\Http\Controllers\ApplicantsController@getCertificateDetails');
Route::DELETE('deleteMyCertificates/{id}', [App\Http\Controllers\ApplicantsController::class, 'deleteMyCertificates']);


//filter jobs
Route::POST(
    'filter',
    [App\Http\Controllers\ApplicantsController::class, 'filter']
);

Route::POST(
    'searchbyindustry',
    [App\Http\Controllers\ApplicantsController::class, 'searchByIndustry']
);

Route::POST(
    'updateJobStatus',
    [App\Http\Controllers\JobMasterController::class, 'updateJobStatus']
);

Route::POST(
    'updateMessageCount',
    [App\Http\Controllers\HomeController::class, 'updateMessageCount']
);

Route::POST(
    'updateNotificationStatus',
    [App\Http\Controllers\JobMasterController::class, 'updateNotificationStatus']
);

Route::get('getAllJobs/{id}', 'App\Http\Controllers\JobMasterController@getAllJobs');

Route::POST(
    'deletejobpost/{id}',
    [App\Http\Controllers\JobMasterController::class, 'deleteJobPost']
);

Route::get('profilepercent/{id}', 'App\Http\Controllers\ApplicantsController@profilePercent');
Route::get('getUserAllDetails/{id}', 'App\Http\Controllers\ApplicantsController@getUserAllDetails');

Route::get('getEmployeerAllDetails/{id}', 'App\Http\Controllers\PersonalController@getEmployeerAllDetails');

Route::POST(
    'filterForJobs',
    [App\Http\Controllers\JobMasterController::class, 'filterForJobs']
);

Route::POST(
    'filterForApplicants',
    [App\Http\Controllers\JobMasterController::class, 'filterForApplicants']
);

Route::get('getAllJobs', 'App\Http\Controllers\ApplicantsController@getAllJobs');

Route::get('getAllJobs_addfav', 'App\Http\Controllers\ApplicantsController@getAllJobs_addfav');


Route::post('user_plans/{uid}', 'App\Http\Controllers\PersonalController@user_plans');
Route::post('updatePlanStatus', 'App\Http\Controllers\PersonalController@updatePlanStatus');
Route::post('updateEmailStatus', 'App\Http\Controllers\PersonalController@updateEmailStatus');

Route::get('getPageData/{id}', 'App\Http\Controllers\HomeController@getPageData');