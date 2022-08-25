<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\LoginApiController;
use App\Http\Controllers\APIAdminController;
use App\Http\Controllers\UserApiController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Nafiz Login


Route::post('/forgetpass',[LoginApiController::class,'forgetpass']);
Route::post('/otp',[LoginApiController::class,'OTP']);
Route::post('forget/changepass',[LoginApiController::class,'passChange']);



//Nafiz Subadmin
Route::get('/movie',[ApiController::class,'ManageMovies'])->middleware('AuthSubAdmin');
Route::post('/movie/upload',[ApiController::class,'uploads'])->middleware('AuthSubAdmin');
Route::get('/movie/list',[ApiController::class,'movieList'])->middleware('AuthSubAdmin');
Route::post('SubAdmin/movie/list/search',[ApiController::class,'MovieSearch'])->middleware('AuthSubAdmin');;
Route::get('/movie/details/{id}',[ApiController::class,'movieDetails'])->middleware('AuthSubAdmin');
Route::post('/movie/update/{id}',[ApiController::class,'UpdateMovie'])->middleware('AuthSubAdmin');
Route::get('/movie/delete/{id}',[ApiController::class,'DeleteMovie'])->middleware('AuthSubAdmin');
Route::get('/subadmin/bills',[ApiController::class,'BillingDetails'])->middleware('AuthSubAdmin');
Route::post('subadmin/bills/changestatus',[ApiController::class,'ChangeStatus'])->middleware('AuthSubAdmin');
Route::post('subadmin/sendtext',[ApiController::class,'sendText'])->middleware('AuthSubAdmin');

Route::get('subadmin/chat',[ApiController::class,'Chatting'])->middleware('AuthSubAdmin');
Route::post('subadmin/profilepic/upload',[ApiController::class,'ProfilePicUp'])->middleware('AuthSubAdmin');
Route::post('subadmin/profilepic/changepass',[ApiController::class,'ChangePassword'])->middleware('AuthSubAdmin');
Route::post('subadmin/userinfo',[LoginApiController::class,'UserInfo'])->middleware('AuthSubAdmin');

Route::post('customer/sendtext',[ApiController::class,'sendTextByCustomer'])->middleware('AuthSubAdmin'); //Ekhane Customer middleware kora lagbe



//-------------------------ANIK START-------------------------

// Login
Route::post('/login',[LoginApiController::class,'login']);

// Logout
Route::post('/logout',[LoginApiController::class,'Logout']);

// Registration
Route::post('/registration',[LoginApiController::class,'registration']);

// Homepage
Route::get('/Admin/Home',[APIAdminController::class,'adminHome'])->middleware('AuthAdmin');

// See which customer viewd which movie
Route::get('/Admin/CustomersMoviesList',[APIAdminController::class,'adminCheckCustomersMovies'])->middleware('AuthAdmin');

// See details of which customer viewd which movie
Route::get('/Admin/CustomersMoviesList/{id}/details',[APIAdminController::class,'adminUserMovieInfo'])->middleware('AuthAdmin');

// Search by movie/user name
Route::post('Admin/CustomerMovie/search',[APIAdminController::class,'adminCustomerMovieSubmit'])->middleware('AuthAdmin');

// See all users list
Route::get('/Admin/UsersList',[APIAdminController::class,'adminUsersList'])->middleware('AuthAdmin');;

// Get Customer, subAdmin count
Route::get('/Admin/UsersListCount',[APIAdminController::class,'adminUsersListCount'])->middleware('AuthAdmin');

// Change roles of users
Route::get('/Admin/UsersList/{id}/details',[APIAdminController::class,'adminChangeRole'])->middleware('AuthAdmin');

// See details of individual users
Route::get('/Admin/UserInfo/{id}/details',[APIAdminController::class,'adminUserInfo'])->middleware('AuthAdmin');

// Search users
Route::post('Admin/UsersList/search',[APIAdminController::class,'adminSearchUsersSubmit'])->middleware('AuthAdmin');

// Profile picture upload
Route::post('profilepic/upload',[APIAdminController::class,'ProfilePicUp'])->middleware('AuthAdmin');


// Change password
Route::post('profilepic/changepass',[APIAdminController::class,'ChangePassword'])->middleware('AuthAdmin');

// Self profile info view
Route::post('/userinfo',[LoginApiController::class,'UserInfo'])->middleware('AuthAdmin');

//-------------------------ANIK END-------------------------

//Nion
Route::get('home/movie/list',[UserApiController::class,'movieList']);

Route::post('home/movie/list/search',[UserApiController::class,'search']);

Route::post('banner/uplode',[UserApiController::class,'banneruplode']);

Route::get('watch/movie/{id}',[UserApiController::class,'WatchMovie']);

Route::post('customer/userinfo',[UserApiController::class,'UserProfile']);

Route::post('customer/profilepic/upload',[UserApiController::class,'ProfilePicUp']);