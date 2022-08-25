<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubAdminController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\accountsController;
use App\Http\Controllers\adminController;

Route::get('/home',[UsersController::class,'home'])->name('home')->middleware('CustomerLoginCheckMiddleware');
Route::get('/search',[UsersController::class,'search'])->name('search')->middleware('CustomerLoginCheckMiddleware');
Route::get('/logout',[UsersController::class,'logout'])->name('logout')->middleware('CustomerLoginCheckMiddleware');
Route::get('DropdownSearch/{id}',[UsersController::class,'DropdownSearch'])->name('DropdownSearch')->middleware('CustomerLoginCheckMiddleware');
Route::get('addlist/{id}',[UsersController::class,'addlist'])->name('addlist')->middleware('CustomerLoginCheckMiddleware');
Route::get('RemoveMylistData/{id}',[UsersController::class,'RemoveMylistData'])->name('RemoveMylistData')->middleware('CustomerLoginCheckMiddleware');
Route::get('/movie/watch/{id}',[UsersController::class,'WatchMovie'])->name('User.watch')->middleware('CustomerLoginCheckMiddleware');

//Subadmin shuru
Route::get('/subadmin/Profile',[SubAdminController::class,'SubAdminProfile'])->name('SubAdmin.profile')->middleware('SubAdminLoginCheckMiddleware');
Route::get('/subadmin/Home',[SubAdminController::class,'ManageMovies'])->name('SubAdmin.movieManage')->middleware('SubAdminLoginCheckMiddleware');

Route::get('/subadmin/addmovies',[SubAdminController::class,'AddMovies'])->name('SubAdmin.AddMovies')->middleware('SubAdminLoginCheckMiddleware');
Route::post('/subadmin/addmovies',[SubAdminController::class,'UploadMovie'])->name('SubAdmin.AddMovies.Upload')->middleware('SubAdminLoginCheckMiddleware');

Route::get('/subadmin/Videolist',[SubAdminController::class,'MovieList'])->name('SubAdmin.VideoList')->middleware('SubAdminLoginCheckMiddleware');
Route::post('/subadmin/Videolist',[SubAdminController::class,'SearchMovieSubmit'])->name('SubAdmin.VideoList.Search.Submit')->middleware('SubAdminLoginCheckMiddleware');

Route::get('/subadmin/movie/details/{id}/info',[SubAdminController::class,'details'])->name('Movie.details')->middleware('SubAdminLoginCheckMiddleware');
Route::post('/subadmin/movie/details/{id}/info',[SubAdminController::class,'UpdateMovie'])->name('Movie.details.Edit')->middleware('SubAdminLoginCheckMiddleware');

Route::get('/subadmin/movie/delete/{id}',[SubAdminController::class,'DeleteMovie'])->name('Movie.delete')->middleware('SubAdminLoginCheckMiddleware');
Route::get('/subadmin/movie/watch/{id}',[SubAdminController::class,'WatchMovie'])->name('Movie.watch')->middleware('SubAdminLoginCheckMiddleware');

Route::get('/subadmin/bills',[SubAdminController::class,'BillingDetails'])->name('Movie.Bills')->middleware('SubAdminLoginCheckMiddleware');
Route::post('/subadmin/bills',[SubAdminController::class,'BillingDetailsSearch'])->name('Movie.Bills.Search')->middleware('SubAdminLoginCheckMiddleware');

Route::get('/subadmin/bills/change/{id}',[SubAdminController::class,'StatusChange'])->name('Subadmin.Customer.Change')->middleware('SubAdminLoginCheckMiddleware');
Route::post('/subadmin/bills/change/{id}',[SubAdminController::class,'UpdateStatus'])->name('Subadmin.Customer.Update')->middleware('SubAdminLoginCheckMiddleware');
//Route::get('/subadmin/movies/list/search',[SubAdminController::class,'SearchMovie'])->name('Subadmin.Movies.List.Search');

//Subadmin sesh


//anik

Route::get('/',[accountsController::class,'publicLogin'])->name('public.login');
Route::post('/',[accountsController::class,'publicLoginSubmit'])->name('public.login.submit');

Route::get('/Logout',[accountsController::class,'publicLogout'])->name('public.logout');

Route::get('/Registration',[accountsController::class,'publicRegistration'])->name('public.registration');
Route::post('/Registration',[accountsController::class,'publicRegistrationSubmit'])->name('public.registration.submit');

Route::get('/ForgotPassword',[accountsController::class,'publicForgotPassword'])->name('public.forgotPassword');
Route::post('/ForgotPassword',[accountsController::class,'publicOTP'])->name('public.forgotPassword.otp.sent');

Route::get('/OTP/submit',[accountsController::class,'viewFogretPass'])->name('public.viewFogretPass');
Route::post('/OTP/submit',[accountsController::class,'publicOTPcheck'])->name('public.OTPcheck.submit');

Route::get('/public/PassChange',[accountsController::class,'ViewChangePass'])->name('public.PassChange');
Route::post('/public/PassChange',[accountsController::class,'PassChange'])->name('public.PassChange.submit');

//Admin Shuru
Route::get('/Admin/Dashboard',[adminController::class,'adminDashboard'])->name('admin.dashboard')->middleware('adminLoginCheckMiddleware');

Route::get('/Admin/Profile',[adminController::class,'adminProfile'])->name('admin.profile')->middleware('adminLoginCheckMiddleware');
Route::post('/Admin/Profile',[adminController::class,'adminProfileUpload'])->name('admin.profile.upload')->middleware('adminLoginCheckMiddleware');

Route::get('/Admin/ChangePassword',[adminController::class,'adminChangePassword'])->name('admin.changePassword')->middleware('adminLoginCheckMiddleware');
Route::post('/Admin/ChangePassword',[adminController::class,'adminChangePasswordSubmit'])->name('admin.changePassword.submit')->middleware('adminLoginCheckMiddleware');

Route::get('/Admin/Dashboard',[adminController::class,'adminCheckCustomersMovies'])->name('admin.checkCustomersMovies')->middleware('adminLoginCheckMiddleware');

Route::get('/Admin/CustomerList',[adminController::class,'adminUserList'])->name('admin.userlist')->middleware('adminLoginCheckMiddleware');
Route::post('/Admin/CustomerList',[adminController::class,'adminSearchUsersSubmit'])->name('admin.searchUsers.submit')->middleware('adminLoginCheckMiddleware');;

Route::get('/Admin/CustomerList/{id}/details',[adminController::class,'adminChangeRole'])->name('admin.changeRole')->middleware('adminLoginCheckMiddleware');
Route::post('/Admin/CustomerList/{id}/details',[adminController::class,'adminChangeRoleSubmit'])->name('admin.changeRole.submit')->middleware('adminLoginCheckMiddleware');
//Admin Sesh