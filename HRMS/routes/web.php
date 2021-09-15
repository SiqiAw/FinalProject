<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\PositionController;
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
use App\Http\Controllers\AllowanceController;
use App\Http\Controllers\DeductionController;
use App\Http\Controllers\OvertimeController;
use App\Http\Controllers\PayrollController;
use App\Http\Controllers\TestController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home',[HomeController::class ,'index'])->name('home');
Route::get('admin/home',[HomeController::class ,'adminHome'])->name('admin.home')->middleware('is_admin');

// full calendar route -> admin
Route::get('/calendar', [EventController::class, 'index'])->name('showCalendar');
Route::get('/calendar/addevent', [EventController::class, 'display'])->name('showAddEvent');
Route::post('/addevent/store', [EventController::class, 'store'])->name('addEvent');
Route::get('/calendar/showeventdetail', [EventController::class, 'show'])->name('showEventList');
Route::get('/editevent/{id}', [EventController::class, 'edit'])->name('editEvent');
Route::post('/updateevent', [EventController::class, 'update'])->name('updateEvent');
Route::get('/deleteevent/{id}', [EventController::class, 'delete'])->name('deleteEvent'); 
Route::post('/searchbydate', [EventController::class, 'searchDate'])->name('searchByDate');
Route::post('/searchevent', [EventController::class, 'search'])->name('searchEvent');
// full calendar route -> employee
Route::get('/empcalendar', [EventController::class, 'emp_calendar_index'])->name('emp.showCalendar');
Route::get('/empcalendar/showeventdetail', [EventController::class, 'emp_calendar_show'])->name('emp.showEventList');
Route::post('/empsearchbydate', [EventController::class, 'emp_calendar_searchDate'])->name('emp.searchByDate');
Route::post('/empsearchevent', [EventController::class, 'emp_calendar_search'])->name('emp.searchEvent');

// department setting route
Route::get('/department',[DepartmentController::class,'show'])->name('showDept');
Route::get('/department/adddepartment',[DepartmentController::class,'create'])->name('showAddDept');
Route::post('/department/store',[DepartmentController::class,'store'])->name('addDept');
Route::get('/editdepartment/{id}',[DepartmentController::class,'edit'])->name('editDept');
Route::post('/updateDepartment',[DepartmentController::class,'update'])->name('updateDept');
Route::get('/deletedepartment/{id}',[DepartmentController::class,'delete'])->name('deleteDept');
Route::post('/searchdepartment',[DepartmentController::class,'search'])->name('searchDept');

// position setting route
Route::get('/position',[PositionController::class,'show'])->name('showPosition');
Route::get('/position/addposition',[PositionController::class,'create'])->name('showAddPosition');
Route::post('/position/store',[PositionController::class,'store'])->name('addPosition');
Route::get('/editposition/{id}',[PositionController::class,'edit'])->name('editPosition');
Route::post('/updateposition',[PositionController::class,'update'])->name('updatePosition');
Route::get('/deleteposition/{id}',[PositionController::class,'delete'])->name('deletePosition');
Route::post('/searchpositiont',[PositionController::class,'search'])->name('searchPosition');

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

// country setting route
Route::get('/national',[NationalityController::class,'show'])->name('showNational');
Route::get('/national/addnational',[NationalityController::class,'create'])->name('showAddCNational');
Route::post('/national/store',[NationalityController::class,'store'])->name('addNational');
Route::get('/editnational/{id}',[NationalityController::class,'edit'])->name('editNational');
Route::post('/updatenational',[NationalityController::class,'update'])->name('updateNational');
Route::get('/deletenational/{id}',[NationalityController::class,'delete'])->name('deleteNational');
Route::post('/searchnational',[NationalityController::class,'search'])->name('searchNational');

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
Route::get('/recruitmentadmin',[OnlineApplicantController::class,'adminshow'])->name('admin.recruitment');
Route::get('/adminview/{id}', [OnlineApplicantController::class,'view'])->name('admin.recruitment.view');
Route::get('/adminview/{id}/download',[OnlineApplicantController::class,'download'])->name('resume.download');
Route::get('/employee/{id}',[OnlineApplicantController::class,'moverecord'])->name('move.record');
Route::post('onlinerecruitment/search',[OnlineApplicantController::class,'search'])->name('search.applicant');
// send email
Route::get('/onlinerecruitment/{id}/success',[OnlineApplicantController::class,'sendSuccessful'])->name('send.success');
Route::get('/onlinerecruitment/{id}/fail',[OnlineApplicantController::class,'sendUnfortunately'])->name('send.fail');

//-------- payroll system ----------//
// allowance setting route
Route::get('/allowance',[AllowanceController::class,'show'])->name('showAllowance');
Route::get('/allowance/addallowance',[AllowanceController::class,'create'])->name('showAddAllowance');
Route::post('/allowance/store',[AllowanceController::class,'store'])->name('addAllowance');
Route::get('/editallowance/{id}',[AllowanceController::class,'edit'])->name('editAllowance');
Route::post('/updateallowance',[AllowanceController::class,'update'])->name('updateAllowance');
Route::get('/deleteallowance/{id}',[AllowanceController::class,'delete'])->name('deleteAllowance');
Route::post('/searchallowance',[AllowanceController::class,'search'])->name('searchAllowance');

// deduction setting route
Route::get('/deduction',[DeductionController::class,'show'])->name('showDeduction');
Route::get('/deduction/addallowance',[DeductionController::class,'create'])->name('showAddDeduction');
Route::post('/deduction/store',[DeductionController::class,'store'])->name('addDeduction');
Route::get('/editdeduction/{id}',[DeductionController::class,'edit'])->name('editDeduction');
Route::post('/updatededuction',[DeductionController::class,'update'])->name('updateDeduction');
Route::get('/deletededuction/{id}',[DeductionController::class,'delete'])->name('deleteDeduction');
Route::post('/searchdeduction',[DeductionController::class,'search'])->name('searchDeduction');

// payroll generate
Route::get('/payrollgenerate', [PayrollController::class,'showPayrollGenerate'])->name('showPayrollGenerate');
Route::get('/payrollgenerate/addpayroll/{id}', [PayrollController::class,'create'])->name('showAddPayroll');
Route::post('/payrollgenerate/addpayroll/store', [PayrollController::class,'store'])->name('addPayroll');
Route::get('/personalpayroll', [PayrollController::class, 'show'])->name('showPayroll');
Route::get('/personalpayrolldetail/{id}', [PayrollController::class, 'view'])->name('viewPayrollDetail');

// employee show
Route::get('/employee',[EmployeeController::class,'show'])->name('showEmployee');

// test/text
Route::get('/test',[TestController::class,'show'])->name('showTest');
Route::get('/test/addtest',[TestController::class,'create'])->name('showAddTest');
Route::post('/addtest/store',[TestController::class,'store'])->name('storeTest');