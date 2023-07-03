<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StopController;
use App\Http\Controllers\ComplainFeedbackController;
use App\Http\Controllers\FareController;
use App\Http\Controllers\VehicleRouteController;

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


Route::get('/login', function () {
    return view('login');
});

Route::get('/signUp', function () {
    return view('signUp');
});

//main index of the project
Route::get('/index', function () {
    return view('index');
});

//index file after admin login
Route::get('/adminIndex', function () {
    return view('admin.adminIndex');
})->name('adminIndex');

//first file after user login   
Route::get('/userIndex', function () {
    return view('user.userIndex');
})->name('userIndex');

//first file after driver login   
Route::get('/driverIndex', function () {
    return view('driver.driverIndex');
})->name('driverIndex');

Route::get('/aboutUs', function () {
    return view('aboutUs');
});

Route::get('/contactUs', function () {
    return view('contactUs');
});

Route::get('/main', function () {
    return view('necessary.main');
});

Route::get('/driverSignUp', function () {
    return view('driver.driverSignUp');
});

//to open signUp form
Route::get('/signUp', function () {
    return view('signUp');
});

//to store the signup form data
Route::post('/store', [UserController::class, 'store'])->name('store');

//to store the signup form data of driver
Route::post('/storeDriver', [DriverController::class, 'store'])->name('storeDriver');

//to check the login credentials
Route::post('/login', [LoginController::class, 'loginCheck'])->name('loginCheck');

//admin dashboard
Route::get('/adminDashboard', function () {
    return view('admin.adminDashboard');
});

//admin active public vechicles
Route::get('/adminActivePublicVechicle', function () {
    return view('admin.activePublicVechicle');
});

//get vehicle routes
Route::get('/adminActivePublicVechicle', [VehicleRouteController::class, 'index']);
//store vehicle routes
Route::post('/storeVehicleRoute', [VehicleRouteController::class, 'store'])->name('storeVehicleRoute');

//admin bus stops
Route::get('/adminBusStops', [StopController::class, 'stopMarkerAdmin'])->name('stopMarkerAdmin');
// Route::get('/adminBusStops', function () {
//     return view('admin.busStops');
// });


//admin fare price 
Route::get('/adminFarePrice', [FareController::class, 'index'])->name('fares.index');

Route::post('/adminFarePrice', [FareController::class, 'store'])->name('store');

Route::get('/fareEdit/{id}', [FareController::class, 'edit'])->name('edit');
Route::get('/fareDelete/{id}', [FareController::class, 'delete'])->name('delete');

Route::post('/fareUpdate/{id}', [FareController::class, 'update'])->name('update');


//admin view drivers report
Route::get('/adminViewDriversReports', function () {
    return view('admin.viewDriversReports');
});

//admin logout
Route::get('/adminLogout', function () {
    return view('index');
});

//admin to store the busStops data
Route::post('/storeStops', [StopController::class, 'store'])->name('storeStops');

//user dashboard
Route::get('/userDashboard', function () {
    return view('user.userDashboard');
});

//user profile
Route::get('/userProfile', function () {
    return view('user.Profile');
});

//user track public vehicle
Route::get('/userTrackPublicVehicle', function () {
    return view('user.trackPublicVehicle');
});

//user nearest bus stop
Route::get('/nearestBusStop', [StopController::class, 'stopMarkerUser'])->name('stopMarkerUser');
// Route::get('/nearestBusStop', function () {
//     return view('user.nearestBusStop');
// });


//user fare calculator
Route::get('/fareCalculator', [FareController::class, 'getFare']);

//user feedbackComplain
Route::get('/feedbackComplain', function () {
    return view('user.feedbackComplain');
});

//to store user feedbackComplain
Route::post('/storeComplainFeedback', [ComplainFeedbackController::class, 'store'])->name('storeComplainFeedback');

//user logout
Route::get('/userLogout', function () {
    return view('index');
});