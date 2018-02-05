<?php

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


Route::get('/','LoginController@login_form');
// Route::get('/','LoginController@register_form');
Route::post('register','LoginController@register');
Route::get('tree-view','TreeViewController@tree_view');
Route::get('tree-structure','TreeViewController@tree_structure');
Route::post('add-tree','TreeViewController@add_tree');

Route::get('tree','TreeViewController@tree');
Route::get('company','TreeViewController@company');
Route::get('course-form','LoginController@course_form');
Route::post('course-submit','LoginController@course_submit');
Route::get('view-uploaded-docs','UploadController@uploaded_docs');
Route::get('uploaded','UploadController@uploaded');
Route::get('course-category','LoginController@course');
// Route::get('searchcategory',array('as'=>'searchcategory','uses'=>'AutoCompleteController@autoComplete'));
Route::get('course-details','LoginController@course_details');
Route::get('details-course','LoginController@details_course');
Route::post('get-course-status','LoginController@get_course_status');
Route::get('audience-details','UserController@audience_details');
Route::get('details','UserController@details');
Route::post('user_submission','UserController@user_submission');
Route::post('submission','UserController@submission');
Route::get('login-form','LoginController@login_form');
Route::post('login-submit','LoginController@login_submit');
Route::get('index','HomeController@index');
Route::get('get-course','HomeController@get_course');
Route::get('get-course-name','HomeController@get_course_name');
Route::get('get-recently-accessed-course','HomeController@get_recently_accessed_course');
// download
Route::get('download','DownloadController@download');
Route::get('tree-page','TreeViewController@tree_page');
Route::get('tree-topic','TreeViewController@tree_topic');
Route::get('AdminHome','AdminHomeController@index');
Route::get('ManagerView','ManagerController@manager_view');
Route::post('manager_submit','ManagerController@manager_submit');
Route::get('ModifyCourse','UploadController@modify_course');
Route::get('course-updation','UploadController@course_updation');



 // vikas
Route::get('test','TestController@test');
Route::get('demo','TestController@demo');
Route::post('demo_1','TestController@demo_1');
Route::get('audience','AudienceController@audience');

Route::post('test','TestController@testfn');
Route::get('delete/{id}','TestController@delete');
Route::get('edite/{id}','TestController@edite');
Route::post('update','TestController@update');
    //course
Route::get('course','TestController@course1');
Route::post('course','TestController@CourseInsert');
Route::get('course/delete/{id}','TestController@coursedelete');
Route::get('course/edit/{id}','TestController@courseedit');
Route::post('course/update/{id}','TestController@courseupdate');

//audience master

Route::get('audiencemaster','MasterController@master');
Route::post('audiencemaster','MasterController@master2');
Route::get('audiencemaster/delete/{id}','MasterController@audiencemasterdelete');
Route::get('audiencemaster/edit/{id}','MasterController@audiencemasteredit');
Route::post('masterupdate','MasterController@audiencemasterupdate');

 //Designation master

Route::get('Designationmaster','DesignationController@Desiganation1');
Route::post('Designationmaster','DesignationController@Desiganationinsert');
Route::get('Designationmaster/delete/{id}','DesignationController@Desiganationdelete');
Route::get('Designationmaster/edit/{id}','DesignationController@Desiganationedit');
Route::post('Designantionupdate','DesignationController@Desiganationupdate');

          //categorymaster

Route::get('categorymaster','DesignationController@category2');
Route::post('categorymaster','DesignationController@categoryinsert');
Route::get('categorymaster/delete/{id}','DesignationController@categorydelete');  
Route::get('categorymaster/edit/{id}','DesignationController@categoryeedit');
Route::post('categoryeupdate ','DesignationController@categoryeupdate'); 

       //Department Master 

Route::get('departmentmaster','DesignationController@Department1');
Route::post('departmentmaster','DesignationController@Departmentinsert'); 
Route::get('departmentmaster/delete/{id}','DesignationController@Departmentdelete');
Route::get('departmentmaster/edit/{id}','DesignationController@Departmentedit');
Route::post('departmentupdate','DesignationController@Departmentupdate');

           //audience_rule View

// Route::get('audiencerule','AudienceruleController@Audiencerule1');
 Route::get('audiencerule','AudienceruleController@Audienceruledepartment');
 Route::post('audiencerule-store','AudienceruleController@audiencerule_store');

 //course group view
 Route::get('coursegroup','DesignationController@coursegroup1');
 Route::post('coursegroup','DesignationController@coursegroupinsert');
 Route::get('coursegroup/delete/{id}','DesignationController@coursegroupdelete');
 Route::get('coursegroup/edit/{id}','DesignationController@coursegroupedit');
 Route::post('coursegroupupdate','DesignationController@coursegroupupdate');

       //Course to coursegroup mapping view
 Route::get('course-to-coursegroup-mapping','AudienceruleController@coursegroupmapping');
 Route::post('cmaping-store','AudienceruleController@coursegroupmapping_store');
 Route::get('AdminHome','AdminHomeController@index');
  Route::get('assessment','User\AssessmentController@index');
Route::get('assessment-detail','User\AssessmentController@assessment_detail');
Route::get('assessment-launch','User\AssessmentController@launch_assessment');
Route::post('getAssessmentData','User\AssessmentController@getAssessmentData');
Route::get('assessment-launch1','User\AssessmentController@launch_assessment1');
Route::get('assessment-question','User\AssessmentController@getAssessmentQuestion');
Route::post('assessment-submit','User\AssessmentController@submitAssessment');


Route::get('assessment-question-mapping','AssessmentController@index');
Route::get('GetAssessmentQuestionMapping','AssessmentController@GetAssessmentQuestionMapping');
Route::post('InsertAssessmentQuestionMapping','AssessmentController@InsertAssessmentQuestionMapping');
Route::post('DeleteAssessmentQuestionMapping','AssessmentController@DeleteAssessmentQuestionMapping');

Route::get('questionbank','AudienceruleController@Questionbank1');
 Route::post('questionbank','AudienceruleController@Questionbankinsert');
 Route::get('questionbank/delete/{id}','AudienceruleController@questionbankdelete');
 Route::get('questionbank/edit/{id}','AudienceruleController@questionbankedit');
 Route::post('questionbankupdate','AudienceruleController@questionbankupdate');

   //Company_master view

 Route::get('companymaster','CompanyController@Company1');
 Route::post('companymaster','CompanyController@Companyinsert');
 Route::get('companymaster/edit/{id}','CompanyController@companyedit');
 Route::post('companyupdate','CompanyController@companyupdate');

 Route::get('add-assessment','AssessmentController@AddAssessment');
Route::post('add-assessment-detail','AssessmentController@AddAssessmentinsert');
Route::get('edit-assessment-details','AssessmentController@EditAssessment');
Route::get('edit-assessment/{id}','AssessmentController@edit_assessment');
Route::post('updateassessment','AssessmentController@updateassessment');
Route::get('EditAssessment/{id}','AssessmentController@deleteAssessment');
Route::get('landing-message','Landmark\LandmarkLandingController@landingmessage');
Route::get('GetLandmarkLandingMessage','Landmark\LandmarkLandingController@GetLandmarkLandingMessage');
Route::post('SubmitLandingMessageLog','Landmark\LandmarkLandingController@SubmitLandingMessageLog');


Route::POST('insert','landmarkController@insert');
Route::get('landmark_msg','landmarkController@view');
Route::get('delete_landmark/{LandmarkLandingMessageID}','landmarkController@delete_landmark');
Route::get('edit/{LandmarkLandingMessageID}','landmarkController@edit_show');
Route::POST('update','landmarkController@update_val');

Route::get('import-userdata','Landmark\LandmarkLandingController@ImportUser');
Route::get('index','HomeController@super_admin');

Route::get('url_read_data','landmarkController@url_read_data');

Route::get('assessment-topic','User\AssessmentController@getAssessmentDetailByTopicID');
 

 //Nitin 25 jan 2018
Route::get('user-course-get-request','User\UserCourseController@user_course_get_request');
//Route::get('user-course-get-request','User\UserCourseController@NotAssing_Course');
Route::get('user-course-request','User\UserCourseController@insert_user_request_course');
Route::get('user-course-not-assing','User\UserCourseController@insert_not_assing_course');

?>





