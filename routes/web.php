<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group([
        // 'namespace' => 'Admin', 
        'prefix' => 'admin'
    ], function () {

    Route::get('/jobseek', function () {
        return view('jobseek');
    });

    Route::get('login', ['as' => 'login', 'uses' => 'App\Http\Controllers\IndexController@index']);

    Route::get('/', 'App\Http\Controllers\IndexController@index');
    Route::post('login', 'App\Http\Controllers\IndexController@postLogin');  
    Route::get('dashboard', 'App\Http\Controllers\IndexController@dashboard');
    Route::get('logout', 'App\Http\Controllers\IndexController@logout');

    Route::get('subscribers', 'App\Http\Controllers\IndexController@getAllSubscribers');   
    Route::get('jobseekers', 'App\Http\Controllers\IndexController@getApplicantsList');   
    Route::get('jobseekerstransactions', 'App\Http\Controllers\IndexController@getApplicantsTransactionsList');   
    Route::get('employersList', 'App\Http\Controllers\IndexController@getEmployeeList');   
    Route::get('employerstransactions', 'App\Http\Controllers\IndexController@getEmployeeTransactionsList');   
    Route::get('managePages', 'App\Http\Controllers\IndexController@managePages');   
    Route::get('viewApplicantProfile/{uid}', 'App\Http\Controllers\IndexController@getApplicantProfile');   
    Route::get('viewEmployerProfile/{uid}', 'App\Http\Controllers\IndexController@getEmployerProfile');   

    Route::GET(
        '/userStatus/{id}/{status}',
        [App\Http\Controllers\IndexController::class, 'updateUserStatus']
    );

    Route::GET(
        '/employerStatus/{id}/{status}',
        [App\Http\Controllers\IndexController::class, 'updateEmployerStatus']
    );

    Route::get('user/delete/{id}', 'App\Http\Controllers\IndexController@deleteUser');
    
    // Employer plan
    Route::get('employersPlansList', 'App\Http\Controllers\IndexController@getEmployeePlanList');   
    Route::get('addnewempplan', 'App\Http\Controllers\IndexController@addEmpPlanForm');   
    Route::post('addempplan', 'App\Http\Controllers\IndexController@addEmpPlan');
    Route::get('getallempplan', 'App\Http\Controllers\IndexController@getEmpPlan');   

    Route::get('empplan/delete/{id}', 'App\Http\Controllers\IndexController@deleteEmpPlan');
    Route::get('empplan/show/{id}', 'App\Http\Controllers\IndexController@showEmpPlan');
    Route::get('empplan/view/{id}', 'App\Http\Controllers\IndexController@viewEmpPlan');
    Route::post('empplan/update/{id}', 'App\Http\Controllers\IndexController@updateEmpPlan');


    // Applicant Plan
    Route::get('seekersPlansList', 'App\Http\Controllers\IndexController@getAppPlanList');   
    Route::get('addnewseekerplan', 'App\Http\Controllers\IndexController@addAppPlanForm');   
    Route::post('addseekerplan', 'App\Http\Controllers\IndexController@addAppPlan');
    Route::get('getallseekerplan', 'App\Http\Controllers\IndexController@getAppPlan');   

    Route::get('seekerplan/delete/{id}', 'App\Http\Controllers\IndexController@deleteAppPlan');
    Route::get('seekerplan/show/{id}', 'App\Http\Controllers\IndexController@showAppPlan');
    Route::get('seekerplan/view/{id}', 'App\Http\Controllers\IndexController@viewAppPlan');
    Route::post('seekerplan/update/{id}', 'App\Http\Controllers\IndexController@updateAppPlan');



    //State
    Route::get('addnewstate', 'App\Http\Controllers\IndexController@addStateForm');   
    Route::post('addstate', 'App\Http\Controllers\IndexController@addState');
    Route::get('getallstates', 'App\Http\Controllers\IndexController@getStatesList');   


    Route::get('state/delete/{id}', 'App\Http\Controllers\IndexController@deleteState');
    Route::get('state/show/{id}', 'App\Http\Controllers\IndexController@showState');
    Route::get('state/view/{id}', 'App\Http\Controllers\IndexController@viewState');
    Route::post('state/update/{id}', 'App\Http\Controllers\IndexController@updateState');

    //City
    Route::get('addnewcity', 'App\Http\Controllers\IndexController@addCityForm');   
    Route::post('addcity', 'App\Http\Controllers\IndexController@addCity');
    Route::get('getallcities', 'App\Http\Controllers\IndexController@getCitiesList');   

    Route::get('city/delete/{id}', 'App\Http\Controllers\IndexController@deleteCity');
    Route::get('city/show/{id}', 'App\Http\Controllers\IndexController@showCity');
    Route::get('city/view/{id}', 'App\Http\Controllers\IndexController@viewCity');
    Route::post('city/update/{id}', 'App\Http\Controllers\IndexController@updateCity');

    //Job Industry
    Route::get('addnewjobindustry', 'App\Http\Controllers\IndexController@addJobIndustryForm');   
    Route::post('addjobindustry', 'App\Http\Controllers\IndexController@addJobIndustry');
    Route::get('getalljobindustry', 'App\Http\Controllers\IndexController@getJobIndustryList');   


    Route::get('jobindustry/delete/{id}', 'App\Http\Controllers\IndexController@deleteJobIndustry');
    Route::get('jobindustry/show/{id}', 'App\Http\Controllers\IndexController@showJobIndustry');
    Route::get('jobindustry/view/{id}', 'App\Http\Controllers\IndexController@viewJobIndustry');
    Route::post('jobindustry/update/{id}', 'App\Http\Controllers\IndexController@updateJobIndustry');


    // Categories
    Route::get('addnewcategories', 'App\Http\Controllers\IndexController@addCategoryForm');   
    Route::post('addjobcategory', 'App\Http\Controllers\IndexController@addCategory');
    Route::get('getallcategory', 'App\Http\Controllers\IndexController@getCategoryList');   

    Route::get('category/delete/{id}', 'App\Http\Controllers\IndexController@deleteCategory');
    Route::get('category/show/{id}', 'App\Http\Controllers\IndexController@showCategory');
    Route::get('category/view/{id}', 'App\Http\Controllers\IndexController@viewCategory');
    Route::post('category/update/{id}', 'App\Http\Controllers\IndexController@updateCategory');


    // Job Functional Area
    Route::get('addnewjobfunctionalarea', 'App\Http\Controllers\IndexController@addJobFunctionalAreaForm');
    Route::post('addjobfunctionalarea', 'App\Http\Controllers\IndexController@addJobFunctionalArea');
    Route::get('getalljobfunctionalarea', 'App\Http\Controllers\IndexController@getJobFunctionalAreaList');  

    Route::get('jobfunctionalarea/delete/{id}', 'App\Http\Controllers\IndexController@deleteJobFunctionalArea');
    Route::get('jobfunctionalarea/show/{id}', 'App\Http\Controllers\IndexController@showJobFunctionalArea');
    Route::get('jobfunctionalarea/view/{id}', 'App\Http\Controllers\IndexController@viewJobFunctionalArea');
    Route::post('jobfunctionalarea/update/{id}', 'App\Http\Controllers\IndexController@updateJobFunctionalArea');

    // Job Type
    Route::get('addnewjobtypes', 'App\Http\Controllers\IndexController@addJobTypeForm');   
    Route::post('addjobtype', 'App\Http\Controllers\IndexController@addJobType');
    Route::get('getalljobtype', 'App\Http\Controllers\IndexController@getJobTypeList');   

    Route::get('jobtype/delete/{id}', 'App\Http\Controllers\IndexController@deleteJobType');
    Route::get('jobtype/show/{id}', 'App\Http\Controllers\IndexController@showJobType');
    Route::get('jobtype/view/{id}', 'App\Http\Controllers\IndexController@viewJobType');
    Route::post('jobtype/update/{id}', 'App\Http\Controllers\IndexController@updateJobType');

    // Job Sub Type
    Route::get('addnewjobsubtypes', 'App\Http\Controllers\IndexController@addJobSubTypeForm');   
    Route::post('addjobsubtype', 'App\Http\Controllers\IndexController@addJobSubType');
    Route::get('getalljobsubtype', 'App\Http\Controllers\IndexController@getJobsubTypeList');   

    Route::get('jobsubtype/delete/{id}', 'App\Http\Controllers\IndexController@deleteJobSubType');
    Route::get('jobsubtype/show/{id}', 'App\Http\Controllers\IndexController@showJobSubType');
    Route::get('jobsubtype/view/{id}', 'App\Http\Controllers\IndexController@viewJobSubType');
    Route::post('jobsubtype/update/{id}', 'App\Http\Controllers\IndexController@updateJobSubType');

    // Experiance
    Route::get('addnewexperiance', 'App\Http\Controllers\IndexController@addExperianceForm');   
    Route::post('addjobexperiance', 'App\Http\Controllers\IndexController@addExperiance');
    Route::get('getallexperiance', 'App\Http\Controllers\IndexController@getExperianceList');   

    Route::get('experiance/delete/{id}', 'App\Http\Controllers\IndexController@deleteExperiance');
    Route::get('experiance/show/{id}', 'App\Http\Controllers\IndexController@showExperiance');
    Route::get('experiance/view/{id}', 'App\Http\Controllers\IndexController@viewExperiance');
    Route::post('experiance/update/{id}', 'App\Http\Controllers\IndexController@updateExperiance');

    // Job Shift
    Route::get('addnewjobshift', 'App\Http\Controllers\IndexController@addJobShiftForm');   
    Route::post('addjobshift', 'App\Http\Controllers\IndexController@addJobShift');
    Route::get('getalljobshift', 'App\Http\Controllers\IndexController@getJobShiftList');   

    Route::get('jobshift/delete/{id}', 'App\Http\Controllers\IndexController@deleteJobShift');
    Route::get('jobshift/show/{id}', 'App\Http\Controllers\IndexController@showJobShift');
    Route::get('jobshift/view/{id}', 'App\Http\Controllers\IndexController@viewJobShift');
    Route::post('jobshift/update/{id}', 'App\Http\Controllers\IndexController@updateJobShift');

    // Job Education
    Route::get('addnewjobeducation', 'App\Http\Controllers\IndexController@addJobEducationForm');   
    Route::post('addjobeducation', 'App\Http\Controllers\IndexController@addJobEducation');
    Route::get('getalljobeducation', 'App\Http\Controllers\IndexController@getJobEducationList');   

    Route::get('jobeducation/delete/{id}', 'App\Http\Controllers\IndexController@deleteJobEducation');
    Route::get('jobeducation/show/{id}', 'App\Http\Controllers\IndexController@showJobEducation');
    Route::get('jobeducation/view/{id}', 'App\Http\Controllers\IndexController@viewJobEducation');
    Route::post('jobeducation/update/{id}', 'App\Http\Controllers\IndexController@updateJobEducation');

    // Job Salary
    Route::get('addnewjobsalary', 'App\Http\Controllers\IndexController@addJobSalaryForm');   
    Route::post('addjobsalary', 'App\Http\Controllers\IndexController@addJobSalary');
    Route::get('getalljobsalary', 'App\Http\Controllers\IndexController@getJobSalary');   

    Route::get('jobsalary/delete/{id}', 'App\Http\Controllers\IndexController@deleteJobSalary');
    Route::get('jobsalary/show/{id}', 'App\Http\Controllers\IndexController@showJobSalary');
    Route::get('jobsalary/view/{id}', 'App\Http\Controllers\IndexController@viewJobSalary');
    Route::post('jobsalary/update/{id}', 'App\Http\Controllers\IndexController@updateJobSalary');

    // Job Payment Method
    Route::get('addnewpaymentmethod', 'App\Http\Controllers\IndexController@addPaymentMethodForm');   
    Route::post('addpaymentmethod', 'App\Http\Controllers\IndexController@addPaymentMethod');
    Route::get('getallpaymentmethod', 'App\Http\Controllers\IndexController@getPaymentMethod');   

    Route::get('paymentmethod/delete/{id}', 'App\Http\Controllers\IndexController@deletePaymentMethod');
    Route::get('paymentmethod/show/{id}', 'App\Http\Controllers\IndexController@showPaymentMethod');
    Route::get('paymentmethod/view/{id}', 'App\Http\Controllers\IndexController@viewPaymentMethod');
    Route::post('paymentmethod/update/{id}', 'App\Http\Controllers\IndexController@updatePaymentMethod');

    // Blog Category
    Route::get('addnewblogcategory', 'App\Http\Controllers\IndexController@addBlogCategoryForm');   
    Route::post('addblogcategory', 'App\Http\Controllers\IndexController@addBlogCategory');
    Route::get('getallblogcategory', 'App\Http\Controllers\IndexController@getBlogCategory');   

    Route::get('blogcategory/delete/{id}', 'App\Http\Controllers\IndexController@deleteBlogCategory');
    Route::get('blogcategory/show/{id}', 'App\Http\Controllers\IndexController@showBlogCategory');
    Route::get('blogcategory/view/{id}', 'App\Http\Controllers\IndexController@viewBlogCategory');
    Route::post('blogcategory/update/{id}', 'App\Http\Controllers\IndexController@updateBlogCategory');



    // Blogs
    Route::get('addnewblog', 'App\Http\Controllers\IndexController@addBlogForm');   
    Route::post('addblog', 'App\Http\Controllers\IndexController@addBlog');
    Route::get('getallblog', 'App\Http\Controllers\IndexController@getBlog');   

    Route::get('blog/delete/{id}', 'App\Http\Controllers\IndexController@deleteBlog');
    Route::get('blog/show/{id}', 'App\Http\Controllers\IndexController@showBlog');
    Route::get('blog/view/{id}', 'App\Http\Controllers\IndexController@viewBlog');
    Route::post('blog/update/{id}', 'App\Http\Controllers\IndexController@updateBlog');

    // Route::get('addnewtestimonial', 'App\Http\Controllers\IndexController@getAllTestimonials');
    Route::get('addnewtestimonial', 'App\Http\Controllers\IndexController@addTestimonialsForm');   
    Route::post('addtestimonial', 'App\Http\Controllers\IndexController@addTestimonial');
    Route::get('getalltestimonials', 'App\Http\Controllers\IndexController@getTestimonials');   

    Route::get('testimonial/delete/{id}', 'App\Http\Controllers\IndexController@deleteTestimonial');
    Route::get('testimonial/show/{id}', 'App\Http\Controllers\IndexController@showTestimonial');
    Route::get('testimonial/view/{id}', 'App\Http\Controllers\IndexController@viewTestimonial');
    Route::post('testimonial/update/{id}', 'App\Http\Controllers\IndexController@updateTestimonial');


    Route::get('payter', 'App\Http\Controllers\IndexController@payter');

    Route::get(
        '/addSlider',
        [App\Http\Controllers\IndexController::class, 'addSlider']
    );


    Route::Post(
        '/addSlider',
        [App\Http\Controllers\IndexController::class, 'insertSlider']
    )->name('InsertSlider');

    Route::GET(
        '/deleteSlider/{id}',
        [App\Http\Controllers\IndexController::class, 'deleteSlider']
    );

    Route::get('getPageData/{id}', 'App\Http\Controllers\IndexController@getPageManageData');
    Route::get('viewEmployerJobs/{id}', 'App\Http\Controllers\IndexController@viewEmployerJobs');
    Route::post('updatePageData/{id}', 'App\Http\Controllers\IndexController@updateManagePage');

    Route::post('addnotification', 'App\Http\Controllers\IndexController@addNotification');
    Route::post('addemail', 'App\Http\Controllers\IndexController@addEmail');
    Route::post('sendsubscriberemail', 'App\Http\Controllers\IndexController@senEmailToSubscribers');

    Route::get('password/email', 'App\Http\Controllers\AuthController@getEmail');
    Route::post('password/email', 'App\Http\Controllers\AuthController@postEmail');
    Route::post('verify-email-otp', 'App\Http\Controllers\AuthController@verifyOtp');  
    Route::get('forgot-password', 'App\Http\Controllers\AuthController@resetpassword');  
    Route::get('highlighted-jobs', 'App\Http\Controllers\IndexController@viewHighlightedJobs');  
    Route::post('forgot-password', 'App\Http\Controllers\AuthController@ResetpasswordData');
    Route::post('job/mark-imp-job', 'App\Http\Controllers\IndexController@markHighlightJobs');
});


Route::get('/logintest', function () {
        return view('web.logintesting');
    });

Route::get('about-us', 'App\Http\Controllers\WebIndexController@getAboutUsPage');    

Route::get('privacy-policy', 'App\Http\Controllers\WebIndexController@getPrivacyPolicyPage');    
    
Route::get('terms-of-services', 'App\Http\Controllers\WebIndexController@getTermsOfServicesPage');    
    
Route::get('userwriting', 'App\Http\Controllers\WebIndexController@getUserWritingPage');    
    
Route::get('communications', 'App\Http\Controllers\WebIndexController@getCommunicationsPage');    
    
Route::get('leading-license', 'App\Http\Controllers\WebIndexController@getLeadingLicensePage');    
    
Route::get('how-it-works', 'App\Http\Controllers\WebIndexController@getHowItWorksPage');    
    
Route::get('for-employers', 'App\Http\Controllers\WebIndexController@getForEmployersPage');    
    

Route::get('/email-login', function () {
        return view('web.applicantemail_pw_login');
    });

Route::get('/emaillogin', function () {
        return view('web.empemail_pw_login');
    });
    
Route::get('/forget-password', function () {
    return view('web.forget_password');
});

Route::get('login', ['as' => 'login', 'uses' => 'App\Http\Controllers\WebIndexController@login']);
Route::post('login', 'App\Http\Controllers\WebIndexController@postLogin');  
Route::get('logout', 'App\Http\Controllers\WebIndexController@logout');

Route::post('register', 'App\Http\Controllers\WebIndexController@register');

Route::get('resend-otp', 'App\Http\Controllers\WebIndexController@resendOtp');  
Route::get('verify-otp', 'App\Http\Controllers\WebIndexController@verifyGetOtp');  
Route::post('verify-otp', 'App\Http\Controllers\WebIndexController@verifyOtp');  
Route::get('/', 'App\Http\Controllers\WebIndexController@index');
Route::get('posted-jobs', 'App\Http\Controllers\WebIndexController@getAllJobs');
Route::get('jobs/{company_id}', 'App\Http\Controllers\WebIndexController@getAllJobsForCompany');
Route::get('jobcategory/{category}', 'App\Http\Controllers\WebIndexController@getAllJobsForCategory');
Route::get('companies', 'App\Http\Controllers\WebIndexController@getAllCompanies');
Route::get('categories', 'App\Http\Controllers\WebIndexController@getAllCategories');
Route::get('emp_signup', 'App\Http\Controllers\WebIndexController@login');
Route::get('back', 'App\Http\Controllers\WebIndexController@getBack');
Route::get('signup', 'App\Http\Controllers\WebIndexController@applicantLogin');

Route::get('blogs', 'App\Http\Controllers\WebIndexController@getAllBlogs');
Route::get('blog-details/{id}', 'App\Http\Controllers\WebIndexController@getBlogDetails');
Route::get('job-details/{id}', 'App\Http\Controllers\WebIndexController@getJobDetails');
Route::get('filter', 'App\Http\Controllers\WebIndexController@getAllJobsFilter');
Route::POST('mainfilter', 'App\Http\Controllers\WebIndexController@mainSearch');

Route::get('applyForJob/{job_id}', 'App\Http\Controllers\WebIndexController@applyForJob');
Route::post('favouritejobs', 'App\Http\Controllers\WebIndexController@addToFavourite');
Route::post('uploadProfileImage', 'App\Http\Controllers\WebIndexController@uploadProfileImage');

Route::post('getPlanResponse', 'App\Http\Controllers\WebIndexController@getPlanResponse');

// Route::get('profile_details', 'App\Http\Controllers\WebIndexController@getProfileDetails');
Route::get('myProfile', 'App\Http\Controllers\WebIndexController@getMyAllProfileDetails');

Route::get('myplan', 'App\Http\Controllers\WebIndexController@getSubscribedPlan');
// Route::get('plan', 'App\Http\Controllers\WebIndexController@getAllPlans');
Route::get('plan/{id}', 'App\Http\Controllers\WebIndexController@getPlanDetails');
Route::get('profile.html/{id}', 'App\Http\Controllers\WebIndexController@getProfileDetails');
Route::get('post-new-job', 'App\Http\Controllers\WebIndexController@addNewJobPostForm');
Route::POST('addNewJobPost', 'App\Http\Controllers\WebIndexController@addNewJobPost');
Route::get('myprofile.html', 'App\Http\Controllers\WebIndexController@getAllProfileDetails');

Route::get('getEmployeerAllDetails/{id}', 'App\Http\Controllers\WebIndexController@getEmployeerAllDetails');

Route::get('getFunctionalArea/{id}', 'App\Http\Controllers\WebIndexController@getAllJobFuncationAreas');
Route::get('getAllCities/{state_id}', 'App\Http\Controllers\WebIndexController@getAllCities');

Route::post('payNow', 'App\Http\Controllers\WebIndexController@updatePlan');
Route::post('addPersonalDetails', 'App\Http\Controllers\WebIndexController@addAppPersonalDetails');
Route::post('addEmpPersonalDetails', 'App\Http\Controllers\WebIndexController@addPersonalDetails');
Route::post('addWorkDetails', 'App\Http\Controllers\WebIndexController@addAppWorkDetails');
Route::post('addEducationalDetails', 'App\Http\Controllers\WebIndexController@addAppEducationalDetails');
Route::post('checkCouponcode', 'App\Http\Controllers\WebIndexController@checkCouponcode');
Route::post('addSocialMediaDetails', 'App\Http\Controllers\WebIndexController@addAppSocialMediaDetails');
Route::post('addEmpSocialMediaDetails', 'App\Http\Controllers\WebIndexController@addEmpSocialMediaDetails');
Route::post('addEmpIndustryDetails', 'App\Http\Controllers\WebIndexController@addEmpIndustryDetails');
Route::post('addCompanyDetails', 'App\Http\Controllers\WebIndexController@addCompanyDetails');
Route::post('addAppDocumentsDetails', 'App\Http\Controllers\WebIndexController@addAppDocuments');
Route::post('addAppVideo', 'App\Http\Controllers\WebIndexController@addAppVideo');
Route::post('addAppCertificates', 'App\Http\Controllers\WebIndexController@addAppCertificates');


Route::get('applied-jobs', 'App\Http\Controllers\WebIndexController@getAppliedJobs');
Route::get('applicants-profiles/{id}', 'App\Http\Controllers\WebIndexController@getAllProfiles');
Route::get('applicant-profile/{job_id}/{id}', 'App\Http\Controllers\WebIndexController@getAllApplicantDetails');
Route::get('hired-profiles', 'App\Http\Controllers\WebIndexController@getAllHiredProfiles');
Route::get('pending-profiles/{id}', 'App\Http\Controllers\WebIndexController@getAllPendingProfiles');

Route::get('manage-jobs', 'App\Http\Controllers\WebIndexController@getAllEmployersJobs');

Route::get('saved-jobs', 'App\Http\Controllers\WebIndexController@getMyFavouriteJobs');
Route::get('checkDetails/{uid}', 'App\Http\Controllers\WebIndexController@checkDetails');

Route::get('checkLogin/{uid}', 'App\Http\Controllers\WebIndexController@checkLogin');

Route::get('recommended-jobs', 'App\Http\Controllers\WebIndexController@getRecommendedJobs');

Route::get(
    'deletejobpost/{id}',
    [App\Http\Controllers\WebIndexController::class, 'deleteJobPost']
);


Route::get(
    'deleteCertificate/{id}',
    [App\Http\Controllers\WebIndexController::class, 'deleteCertificate']
);


Route::POST(
    'updateApplicantJobStatus',
    [App\Http\Controllers\WebIndexController::class, 'updateJobStatus']
);

Route::post('updateJobSchedule', 'App\Http\Controllers\WebIndexController@updateJobSchedule');

Route::post('subscribe', 'App\Http\Controllers\WebIndexController@addSubscriber');