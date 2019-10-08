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
Route::get('/events', function () {
    return view('events');
});


Route::get('/', function () {
    return view('welcome_guest');
})->middleware('guest');


Route::get('/home', function () {
    return view('welcome_logged');
})->middleware('auth');


Route::get('about', function () {
    return view('about');
});


Route::get('references', function () {
    return view('references');
});

Route::get('terms', function () {
    return view('terms');
});

Route::get('contact', function () {
    return view('contact');
});

Route::get('legal', function () {
    return view('legal');
});

Route::get('press', function () {
    return view('press');
});

Route::get('socialmedia', function () {
    return view('socialmedia');
});

Route::get('dataprotection', function () {
    return view('dataprotection');
});

Route::get('newsletter', function () {
    return view('newsletter');
});
Route::resource('admin', 'AdminCrudUserController');
Route::resource('client', 'ClientUserController');
Route::resource('consultant', 'ConsultantUserController');
Route::resource('companies', 'PartnerCompanieController');
Route::resource('partners', 'PartnerController');
Route::resource('employee', 'PartnerEmployeeController');
Route::resource('newsletter', 'NewsletterController');
Route::resource('account', 'UserAccountController');
Route::resource('employer', 'EmployerController');
Route::resource('officeadmin', 'OfficeAdminController');
Route::resource('courses', 'CourseController');
Route::resource('languages', 'LanguageController');


Route::resource('consultings', 'ConsultingController');
Route::resource('documents', 'DocumentController');




Route::resource('calendar', 'CalendarController');
Route::resource('blog', 'BlogController');
Route::resource('postComments', 'BlogPstsCommentController');
Route::resource('job', 'JobController');
Route::resource('skills', 'SkillController');
Route::resource('comments', 'CommentController');

/*Routes for clientsToConsulting*/
Route::post('clientsToConsulting', 'ClientsToConsultingController@attach')
->name('ClientToConsulting.attach');
Route::get('confirm', 'ClientsToConsultingController@detach')
->name('ClientsToConsulting.detach');
Route::delete('delete/{id}', 'ClientsToConsultingController@delete')
->name('ClientsToConsulting.delete');
/*end*/

/*Routes for clientsToConsulting*/
Route::post('pts_attach', 'ProfilesToSkillController@attach')
        ->name('ProfilesToSkill.attach');
Route::post('pts_update', 'ProfilesToSkillController@update')
        ->name('ProfilesToSkill.update');
Route::get('pts_confirm', 'ProfilesToSkillController@detach')
        ->name('ProfilesToSkill.detach');
Route::delete('pts_delete/{id}', 'ProfilesToSkillController@delete')
        ->name('ProfilesToSkill.delete');
/*end*/



/*Routes for coursesToSkill*/
Route::get('attachSkills/{id}', 'CoursesToSkillController@display')
->name('attachSkills');
Route::post('coursesToSkill', 'CoursesToSkillController@attach')
->name('courseToSkill.attach');
Route::get('laica', 'CoursesToSkillController@detach')
->name('courseToSkill.detach');
/*end*/

/*routes for clientsToCourse*/
Route::post('clientsToCourse', 'ClientsToCourseController@attach')
->name('ClientToCourse.attach');
Route::get('confirm_unsub', 'ClientsToCourseController@detach')
->name('ClientsToCourse.detach');
Route::delete('del_tt/{id}', 'ClientsToCourseController@delete')
->name('ClientsToCourse.delete');
/*end*/


Auth::routes();

Route::get('/prova', function () {
    return view('prova');
})->middleware('auth','sys_admin');


