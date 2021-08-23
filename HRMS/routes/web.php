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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// full calendar route
Route::get('/calendar', [App\Http\Controllers\EventController::class, 'index'])->name('showCalendar');
Route::get('/calendar/addevent', [App\Http\Controllers\EventController::class, 'display'])->name('showAddEvent');
Route::post('/addevent/store', [App\Http\Controllers\EventController::class, 'store'])->name('addEvent');
Route::get('/calendar/showeventdetail', [App\Http\Controllers\EventController::class, 'show'])->name('showEventList');
Route::get('/editevent/{id}', [App\Http\Controllers\EventController::class, 'edit'])->name('editEvent');
Route::post('/updateevent', [App\Http\Controllers\EventController::class, 'update'])->name('updateEvent');
Route::get('/deleteevent/{id}', [App\Http\Controllers\EventController::class, 'delete'])->name('deleteEvent'); 
Route::post('/searchbydate', [App\Http\Controllers\EventController::class, 'searchDate'])->name('searchByDate');
Route::post('/searchevent', [App\Http\Controllers\EventController::class, 'search'])->name('searchEvent');

// department setting route
Route::get('/department',[App\Http\Controllers\DepartmentController::class,'show'])->name('showDept');
Route::get('/department/adddepartment',[App\Http\Controllers\DepartmentController::class,'create'])->name('showAddDept');
Route::post('/department/store',[App\Http\Controllers\DepartmentController::class,'store'])->name('addDept');
Route::get('/editdepartment/{id}',[App\Http\Controllers\DepartmentController::class,'edit'])->name('editDept');
Route::post('/updateDepartment',[App\Http\Controllers\DepartmentController::class,'update'])->name('updateDept');
Route::get('/deletedepartment/{id}',[App\Http\Controllers\DepartmentController::class,'delete'])->name('deleteDept');
Route::post('/searchdepartment',[App\Http\Controllers\DepartmentController::class,'search'])->name('searchDept');

// certificate setting route
Route::get('/certificate',[App\Http\Controllers\CertificateController::class,'show'])->name('showCert');
Route::get('/certificate/addcertificate',[App\Http\Controllers\CertificateController::class,'create'])->name('showAddCert');
Route::post('/certificate/store',[App\Http\Controllers\CertificateController::class,'store'])->name('addCert');
Route::get('/editcertificate/{id}',[App\Http\Controllers\CertificateController::class,'edit'])->name('editCert');
Route::post('/updatecertificate',[App\Http\Controllers\CertificateController::class,'update'])->name('updateCert');
Route::get('/deletecertificate/{id}',[App\Http\Controllers\CertificateController::class,'delete'])->name('deleteCert');
Route::post('/searchcertificate',[App\Http\Controllers\CertificateController::class,'search'])->name('searchCert');

// marital status setting route
Route::get('/maritalstatus',[App\Http\Controllers\MaritalstatusController::class,'show'])->name('showMarital');
Route::get('/maritalstatus/addMarital',[App\Http\Controllers\MaritalstatusController::class,'create'])->name('showAddMarital');
Route::post('/maritalstatus/store',[App\Http\Controllers\MaritalstatusController::class,'store'])->name('addMarital');
Route::get('/editmarital/{id}',[App\Http\Controllers\MaritalstatusController::class,'edit'])->name('editMarital');
Route::post('/updatemarital',[App\Http\Controllers\MaritalstatusController::class,'update'])->name('updateMarital');
Route::get('/deletemarital/{id}',[App\Http\Controllers\MaritalstatusController::class,'delete'])->name('deleteMarital');
Route::post('/searchmarital',[App\Http\Controllers\MaritalstatusController::class,'search'])->name('searchMarital');

// job title setting route
Route::get('/jobtitle',[App\Http\Controllers\JobtitleController::class,'show'])->name('showJobtitle');
Route::get('/jobtitle/addjobtitle',[App\Http\Controllers\JobtitleController::class,'create'])->name('showAddJobtitle');
Route::post('/jobtitle/store',[App\Http\Controllers\JobtitleController::class,'store'])->name('addJobtitle');
Route::get('/editjobtitle/{id}',[App\Http\Controllers\JobtitleController::class,'edit'])->name('editJobtitle');
Route::post('/updatejobtitle',[App\Http\Controllers\JobtitleController::class,'update'])->name('updateJobtitle');
Route::get('/deletejobtitle/{id}',[App\Http\Controllers\JobtitleController::class,'delete'])->name('deleteJobtitle');
Route::post('/searchjobtitle',[App\Http\Controllers\JobtitleController::class,'search'])->name('searchJobtitle');

// working time setting route
Route::get('/workingtime',[App\Http\Controllers\WorkingtimeController::class,'show'])->name('showWRKtime');
Route::get('/workingtime/addworkingtime',[App\Http\Controllers\WorkingtimeController::class,'create'])->name('showAddWRKtime');
Route::post('/workingtime/store',[App\Http\Controllers\WorkingtimeController::class,'store'])->name('addWRKtime');
Route::get('/editworkingtime/{id}',[App\Http\Controllers\WorkingtimeController::class,'edit'])->name('editWRKtime');
Route::post('/updateworkingtime',[App\Http\Controllers\WorkingtimeController::class,'update'])->name('updateWRKtime');
Route::get('/deleteworkingtime/{id}',[App\Http\Controllers\WorkingtimeController::class,'delete'])->name('deleteWRKtime');
Route::post('/searchworkingtime',[App\Http\Controllers\WorkingtimeController::class,'search'])->name('searchWRKtime');

// employment type setting route
Route::get('/employment',[App\Http\Controllers\EmploymentController::class,'show'])->name('showEmployment');
Route::get('/employment/addemployment',[App\Http\Controllers\EmploymentController::class,'create'])->name('showAddEmployment');
Route::post('/employment/store',[App\Http\Controllers\EmploymentController::class,'store'])->name('addEmployment');
Route::get('/editemployment/{id}',[App\Http\Controllers\EmploymentController::class,'edit'])->name('editEmployment');
Route::post('/updateemployment',[App\Http\Controllers\EmploymentController::class,'update'])->name('updateEmployment');
Route::get('/deleteemployment/{id}',[App\Http\Controllers\EmploymentController::class,'delete'])->name('deleteEmployment');
Route::post('/searchemployment',[App\Http\Controllers\EmploymentController::class,'search'])->name('searchEmployment');

// country setting route
Route::get('/country',[App\Http\Controllers\CountryController::class,'show'])->name('showCountry');
Route::get('/country/addcountry',[App\Http\Controllers\CountryController::class,'create'])->name('showAddCountry');
Route::post('/country/store',[App\Http\Controllers\CountryController::class,'store'])->name('addCountry');
Route::get('/editcountry/{id}',[App\Http\Controllers\CountryController::class,'edit'])->name('editCountry');
Route::post('/updatecountry',[App\Http\Controllers\CountryController::class,'update'])->name('updateCountry');
Route::get('/deletecountry/{id}',[App\Http\Controllers\CountryController::class,'delete'])->name('deleteCountry');
Route::post('/searchcountry',[App\Http\Controllers\CountryController::class,'search'])->name('searchCountry');

// nationality setting route
Route::get('/nationality',[App\Http\Controllers\NationalityController::class,'show'])->name('showNationality');
Route::get('/nationality/addnationality',[App\Http\Controllers\NationalityController::class,'create'])->name('showAddNationality');
Route::post('/nationality/store',[App\Http\Controllers\NationalityController::class,'store'])->name('addNationality');
Route::get('/editnationality/{id}',[App\Http\Controllers\NationalityController::class,'edit'])->name('editNationality');
Route::post('/updatenationality',[App\Http\Controllers\NationalityController::class,'update'])->name('updateNationality');
Route::get('/deletenationality/{id}',[App\Http\Controllers\NationalityController::class,'delete'])->name('deleteNationality');
Route::post('/searchnationality',[App\Http\Controllers\NationalityController::class,'search'])->name('searchNationality');

// bankname setting route
Route::get('/bankname',[App\Http\Controllers\BanknameController::class,'show'])->name('showBankname');
Route::get('/bankname/addbankname',[App\Http\Controllers\BanknameController::class,'create'])->name('showAddBankname');
Route::post('/bankname/store',[App\Http\Controllers\BanknameController::class,'store'])->name('addBankname');
Route::get('/editbankname/{id}',[App\Http\Controllers\BanknameController::class,'edit'])->name('editBankname');
Route::post('/updatebankname',[App\Http\Controllers\BanknameController::class,'update'])->name('updateBankname');
Route::get('/deletebankname/{id}',[App\Http\Controllers\BanknameController::class,'delete'])->name('deleteBankname');
Route::post('/searchbankname',[App\Http\Controllers\BanknameController::class,'search'])->name('searchBankname');