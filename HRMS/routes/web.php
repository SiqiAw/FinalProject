<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\QualificationController;
use App\Http\Controllers\MaritalstatusController;
use App\Http\Controllers\JobtitleController;
use App\Http\Controllers\WorkingtimeController;
use App\Http\Controllers\EmploymentController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\NationalityController;
use App\Http\Controllers\BanknameController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\LeavetypeController;
use App\Http\Controllers\OnlineApplicantController;
use App\Http\Controllers\EmployeeController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/login/admin', [LoginController::class, 'showAdminLoginForm']);
Route::get('/login/employee', [LoginController::class,'showEmployeeLoginForm']);
Route::get('/register/admin', [RegisterController::class,'showAdminRegisterForm']);
Route::get('/register/employee', [RegisterController::class,'showEmployeeRegisterForm']);

Route::post('/login/admin', [LoginController::class,'adminLogin']);
Route::post('/login/employee', [LoginController::class,'employeeLogin']);
Route::post('/register/admin', [RegisterController::class,'createAdmin']);
Route::post('/register/employee', [RegisterController::class,'createEmployee']);

Route::group(['middleware' => 'auth:employee'], function () {
    Route::view('employee.employee', 'employee');
});

Route::group(['middleware' => 'auth:admin'], function () {
    
    Route::view('admin.admin', 'admin');
});

Route::get('logout', [LoginController::class,'logout']);

Route::get('/home', 'HomeController@index')->name('home');

// full calendar route
Route::get('/calendar', [EventController::class, 'index'])->name('showCalendar');
Route::get('/calendar/addevent', [EventController::class, 'display'])->name('showAddEvent');
Route::post('/addevent/store', [EventController::class, 'store'])->name('addEvent');
Route::get('/calendar/showeventdetail', [EventController::class, 'show'])->name('showEventList');
Route::get('/editevent/{id}', [EventController::class, 'edit'])->name('editEvent');
Route::post('/updateevent', [EventController::class, 'update'])->name('updateEvent');
Route::get('/deleteevent/{id}', [EventController::class, 'delete'])->name('deleteEvent'); 
Route::post('/searchbydate', [EventController::class, 'searchDate'])->name('searchByDate');
Route::post('/searchevent', [EventController::class, 'search'])->name('searchEvent');

// department setting route
Route::get('/department',[DepartmentController::class,'show'])->name('showDept');
Route::get('/department/adddepartment',[DepartmentController::class,'create'])->name('showAddDept');
Route::post('/department/store',[DepartmentController::class,'store'])->name('addDept');
Route::get('/editdepartment/{id}',[DepartmentController::class,'edit'])->name('editDept');
Route::post('/updateDepartment',[DepartmentController::class,'update'])->name('updateDept');
Route::get('/deletedepartment/{id}',[DepartmentController::class,'delete'])->name('deleteDept');
Route::post('/searchdepartment',[DepartmentController::class,'search'])->name('searchDept');

// qualification setting route
Route::get('/qualification',[QualificationController::class,'show'])->name('showQualif');
Route::get('/qualification/addqualif',[QualificationController::class,'create'])->name('showAddQualif');
Route::post('/qualification/store',[QualificationController::class,'store'])->name('addQualif');
Route::get('/editqualif/{id}',[QualificationController::class,'edit'])->name('editQualif');
Route::post('/updatequalif',[QualificationController::class,'update'])->name('updateQualif');
Route::get('/deletequalif/{id}',[QualificationController::class,'delete'])->name('deleteQualif');
Route::post('/searchqualif',[QualificationController::class,'search'])->name('searchQualif');

// marital status setting route
Route::get('/maritalstatus',[MaritalstatusController::class,'show'])->name('showMarital');
Route::get('/maritalstatus/addMarital',[MaritalstatusController::class,'create'])->name('showAddMarital');
Route::post('/maritalstatus/store',[MaritalstatusController::class,'store'])->name('addMarital');
Route::get('/editmarital/{id}',[MaritalstatusController::class,'edit'])->name('editMarital');
Route::post('/updatemarital',[MaritalstatusController::class,'update'])->name('updateMarital');
Route::get('/deletemarital/{id}',[MaritalstatusController::class,'delete'])->name('deleteMarital');
Route::post('/searchmarital',[MaritalstatusController::class,'search'])->name('searchMarital');

// job title setting route
Route::get('/jobtitle',[JobtitleController::class,'show'])->name('showJobtitle');
Route::get('/jobtitle/addjobtitle',[JobtitleController::class,'create'])->name('showAddJobtitle');
Route::post('/jobtitle/store',[JobtitleController::class,'store'])->name('addJobtitle');
Route::get('/editjobtitle/{id}',[JobtitleController::class,'edit'])->name('editJobtitle');
Route::post('/updatejobtitle',[JobtitleController::class,'update'])->name('updateJobtitle');
Route::get('/deletejobtitle/{id}',[JobtitleController::class,'delete'])->name('deleteJobtitle');
Route::post('/searchjobtitle',[JobtitleController::class,'search'])->name('searchJobtitle');

// working time setting route
Route::get('/workingtime',[WorkingtimeController::class,'show'])->name('showWRKtime');
Route::get('/workingtime/addworkingtime',[WorkingtimeController::class,'create'])->name('showAddWRKtime');
Route::post('/workingtime/store',[WorkingtimeController::class,'store'])->name('addWRKtime');
Route::get('/editworkingtime/{id}',[WorkingtimeController::class,'edit'])->name('editWRKtime');
Route::post('/updateworkingtime',[WorkingtimeController::class,'update'])->name('updateWRKtime');
Route::get('/deleteworkingtime/{id}',[WorkingtimeController::class,'delete'])->name('deleteWRKtime');
Route::post('/searchworkingtime',[WorkingtimeController::class,'search'])->name('searchWRKtime');

// employment type setting route
Route::get('/employment',[EmploymentController::class,'show'])->name('showEmployment');
Route::get('/employment/addemployment',[EmploymentController::class,'create'])->name('showAddEmployment');
Route::post('/employment/store',[EmploymentController::class,'store'])->name('addEmployment');
Route::get('/editemployment/{id}',[EmploymentController::class,'edit'])->name('editEmployment');
Route::post('/updateemployment',[EmploymentController::class,'update'])->name('updateEmployment');
Route::get('/deleteemployment/{id}',[EmploymentController::class,'delete'])->name('deleteEmployment');
Route::post('/searchemployment',[EmploymentController::class,'search'])->name('searchEmployment');

// country setting route
Route::get('/country',[CountryController::class,'show'])->name('showCountry');
Route::get('/country/addcountry',[CountryController::class,'create'])->name('showAddCountry');
Route::post('/country/store',[CountryController::class,'store'])->name('addCountry');
Route::get('/editcountry/{id}',[CountryController::class,'edit'])->name('editCountry');
Route::post('/updatecountry',[CountryController::class,'update'])->name('updateCountry');
Route::get('/deletecountry/{id}',[CountryController::class,'delete'])->name('deleteCountry');
Route::post('/searchcountry',[CountryController::class,'search'])->name('searchCountry');

// nationality setting route
Route::get('/nationality',[NationalityController::class,'show'])->name('showNationality');
Route::get('/nationality/addnationality',[NationalityController::class,'create'])->name('showAddNationality');
Route::post('/nationality/store',[NationalityController::class,'store'])->name('addNationality');
Route::get('/editnationality/{id}',[NationalityController::class,'edit'])->name('editNationality');
Route::post('/updatenationality',[NationalityController::class,'update'])->name('updateNationality');
Route::get('/deletenationality/{id}',[NationalityController::class,'delete'])->name('deleteNationality');
Route::post('/searchnationality',[NationalityController::class,'search'])->name('searchNationality');

// bankname setting route
Route::get('/bankname',[BanknameController::class,'show'])->name('showBankname');
Route::get('/bankname/addbankname',[BanknameController::class,'create'])->name('showAddBankname');
Route::post('/bankname/store',[BanknameController::class,'store'])->name('addBankname');
Route::get('/editbankname/{id}',[BanknameController::class,'edit'])->name('editBankname');
Route::post('/updatebankname',[BanknameController::class,'update'])->name('updateBankname');
Route::get('/deletebankname/{id}',[BanknameController::class,'delete'])->name('deleteBankname');
Route::post('/searchbankname',[BanknameController::class,'search'])->name('searchBankname');

// state setting route
Route::get('/state',[StateController::class,'show'])->name('showState');
Route::get('/state/addstate',[StateController::class,'create'])->name('showAddState');
Route::post('/state/store',[StateController::class,'store'])->name('addState');
Route::get('/editstate/{id}',[StateController::class,'edit'])->name('editState');
Route::post('/updatestate',[StateController::class,'update'])->name('updateState');
Route::get('/deletestate/{id}',[StateController::class,'delete'])->name('deleteState');
Route::post('/searchstate',[StateController::class,'search'])->name('searchState');

// city setting route
Route::get('/city',[CityController::class,'show'])->name('showCity');
Route::get('/city/addcity',[CityController::class,'create'])->name('showAddCity');
Route::post('/city/store',[CityController::class,'store'])->name('addCity');
Route::get('/editcity/{id}',[CityController::class,'edit'])->name('editCity');
Route::post('/updatecity',[CityController::class,'update'])->name('updateCity');
Route::get('/deletecity/{id}',[CityController::class,'delete'])->name('deleteCity');
Route::post('/searchcity',[CityController::class,'search'])->name('searchCity');

// leavetype setting route
Route::get('/leavetype',[LeavetypeController::class,'show'])->name('showLeavetype');
Route::get('/leavetype/addleavetype',[LeavetypeController::class,'create'])->name('showAddLeavetype');
Route::post('/leavetype/store',[LeavetypeController::class,'store'])->name('addLeavetype');
Route::get('/editleavetype/{id}',[LeavetypeController::class,'edit'])->name('editLeavetype');
Route::post('/updateleavetype',[LeavetypeController::class,'update'])->name('updateLeavetype');
Route::get('/deleteleavetype/{id}',[LeavetypeController::class,'delete'])->name('deleteLeavetype');
Route::post('/searchleavetype',[LeavetypeController::class,'search'])->name('searchLeavetype');


// online applicant system
Route::get('/onlinerecruitment',[OnlineApplicantController::class,'show'])->name('showOnlineRecruit');
Route::post('/onlinerecruitment/store',[OnlineApplicantController::class,'store'])->name('addApplicant');
Route::get('/recruitmentadmin',[OnlineApplicantController::class,'adminshow'])->name('admin.show');
Route::get('/adminview/{id}', [OnlineApplicantController::class,'view'])->name('admin.view');
Route::get('/adminview/{id}/download',[OnlineApplicantController::class,'download'])->name('resume.download');
Route::get('/employee/{id}',[OnlineApplicantController::class,'moverecord'])->name('move.record');
Route::post('onlinerecruitment/search',[OnlineApplicantController::class,'search'])->name('search.applicant');

// employee show
Route::get('/employee',[EmployeeController::class,'show'])->name('showEmployee');