<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StopController;
use App\Http\Controllers\ComplainFeedbackController;
use App\Http\Controllers\DriverLocationController;
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


//to open signUp form
Route::get('/signUp', function () {
    return view('signUp');
});

//to store the signup form data
Route::post('/storeUser', [UserController::class, 'store'])->name('storeUser');

//to store the signup form data of driver
Route::post('/storeDriver', [DriverController::class, 'store'])->name('storeDriver');

//to check the login credentials
Route::post('/login', [LoginController::class, 'loginCheck'])->name('loginCheck');

//login from controller after being logged out
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');


//admin active public vehicle
Route::get('/adminDashboard', [AdminController::class, 'adminDashboard'])->name('adminDashboard');

// //admin active public vechicles
// Route::get('/adminVehicleRoute', function () {
//     return view('admin.adminVehicleRoute');
// });

//admin profile
Route::get('/adminProfile', [AdminController::class, 'adminProfile'])->name('adminProfile');

//admin profile update
Route::post('/updateAdminProfile', [AdminController::class, 'adminUpdate'])->name('updateAdminProfile');

//admin credentials update
Route::post('/updateAdminCredentials', [AdminController::class, 'updateAdminCredentials'])->name('updateAdminCredentials');

//admin active public vehicle working
Route::get('/adminActivePublicVehicle', [DriverLocationController::class, 'getDriverLocationAdmin'])->name('getDriverLocationAdmin');

//admin active public vehicle data fetch from controller to ajax
Route::get('/adminAjax', [DriverLocationController::class, 'getDriverLocationAjax'])->name('getDriverLocationAjax');


//get vehicle routes
Route::get('/adminVehicleRoute', [VehicleRouteController::class, 'index'])->name('vehicleRoute.index');

//store vehicle routes
Route::post('/storeVehicleRoute', [VehicleRouteController::class, 'store'])->name('storeVehicleRoute');

//edit vehicle routes
Route::get('/vehicleRouteEdit/{id}', [VehicleRouteController::class, 'edit'])->name('editVehicleRoute');

//delete vehicle routes
Route::get('/vehicleRouteDelete/{id}', [VehicleRouteController::class, 'delete'])->name('deleteVehicleRoute');

//update vehicle routes
Route::post('/vehicleRouteUpdate/{id}', [VehicleRouteController::class, 'update'])->name('updateVehicleRoute');

//admin bus stops
Route::get('/adminBusStops', [StopController::class, 'stopMarkerAdmin'])->name('stopMarkerAdmin');

Route::post('/storeStops', [StopController::class, 'store'])->name('storeStops');

Route::get('/stopEdit/{id}', [StopController::class, 'edit'])->name('edit');

Route::post('/stopUpdate/{id}', [StopController::class, 'update'])->name('stopUpdate');

Route::get('/stopDelete/{id}', [StopController::class, 'delete'])->name('stopDelete');

//admin fare price 
Route::get('/adminFarePrice', [FareController::class, 'index'])->name('fares.index');

Route::post('/adminFarePrice', [FareController::class, 'store'])->name('store');

Route::get('/fareEdit/{id}', [FareController::class, 'edit'])->name('edit');

Route::get('/fareDelete/{id}', [FareController::class, 'delete'])->name('delete');

Route::post('/fareUpdate/{id}', [FareController::class, 'update'])->name('update');

//admin get complain feedback
Route::get('/adminComplainFeedback', [ComplainFeedbackController::class, 'index'])->name('adminComplainFeedback');

//admin view drivers report
// Route::get('/adminViewDriversReports', function () {
//     return view('admin.viewDriversReports');
// });
Route::get('/adminViewDriversReports', [DriverController::class, 'adminViewDriver'])->name('adminViewDriver');

Route::get('/driverEdit/{id}', [DriverController::class, 'adminEditDriver'])->name('adminEditDriver');

Route::get('/driverDelete/{id}', [DriverController::class, 'adminDeleteDriver'])->name('adminDeleteDriver');

Route::post('/driverUpdate/{id}', [DriverController::class, 'adminUpdateDriver'])->name('adminUpdateDriver');

Route::get('/adminViewUsers', [UserController::class, 'adminViewUsers'])->name('adminViewUsers');

//admin logout
Route::get('/adminLogout',[AdminController::class, 'logout'])->name('logout');


//user dashboard
// Route::get('/userDashboard', function () {
//     return view('user.userDashboard');
// })->name('userDashboard');

Route::get('/userDashboard',[UserController::class, 'dashboard'])->name('userDashboard');

//user profile
Route::get('/userProfile', [UserController::class, 'profile'])->name('profile');

//user profile update
Route::post('/updateUserProfile', [UserController::class, 'update'])->name('updateUserProfile');

//user credentials update
Route::post('/updateUserCredentials', [UserController::class, 'updateUserCredentials'])->name('updateUserCredentials');

//user track public vehicle
// Route::get('/userTrackPublicVehicle', function () {
//     return view('user.trackPublicVehicle');
// });
Route::get('/userActivePublicVehicle', [DriverLocationController::class, 'getDriverLocationUser'])->name('getDriverLocationUser');

//admin active public vehicle data fetch from controller to ajax
Route::get('/userAjax', [DriverLocationController::class, 'getDriverLocationAjax'])->name('getDriverLocationAjax');

//user nearest bus stop
Route::get('/nearestBusStop', [StopController::class, 'stopMarkerUser'])->name('stopMarkerUser');

//admin active public vehicle data fetch from controller to ajax
// Route::get('/userStopAjax', [StopController::class, 'getStopLocationAjax'])->name('getStopLocationAjax');

//user vehicle Route 
Route::get('/vehicleRoutes', [VehicleRouteController::class, 'getVehicle'])->name('vehicleRoutes');


//user fare calculator page
Route::get('/fareCalculator', [FareController::class, 'getFare']);

//to calculate the fare for travel
Route::post('/calculateFare', [FareController::class, 'fareCalculator'])->name('calculateFare');

//user feedbackComplain
// Route::get('/feedbackComplain', function () {
//     return view('user.feedbackComplain');
// });
Route::get('/feedbackComplain', [ComplainFeedbackController::class, 'userComplainFeedbackIndex'])->name('userComplainFeedbackIndex');

//to store user feedbackComplain
Route::post('/storeComplainFeedback', [ComplainFeedbackController::class, 'store'])->name('storeComplainFeedback');

//user logout
Route::get('/userLogout',[UserController::class, 'logout'])->name('logout');

//driver dashboard
// Route::get('/driverDashboard', function () {
//     return view('driver.driverDashboard');
// })->name('driverDashboard');

Route::get('/driverDashboard',[DriverController::class, 'dashboard'])->name('driverDashboard');

//driver profile
// Route::get('/driverProfile', function () {
//     return view('driver.driverProfile');
// });

//driver profile
Route::get('/driverProfile', [DriverController::class, 'driverProfile'])->name('driverProfile');

//driver profile update
Route::post('/updateDriverProfile', [DriverController::class, 'driverUpdate'])->name('updateDriverProfile');

//driver credentials update
Route::post('/updateDriverCredentials', [DriverController::class, 'updateDriverCredentials'])->name('updateDriverCredentials');

//driver live location
Route::get('/driverLiveLocation', function () {
    return view('driver.driverLiveLocation');
});

//driver fare calculator
Route::get('/driverFareCalculator', [FareController::class, 'getDriverFare']);

//driver calculate fare
Route::post('/calculateDriverFare', [FareController::class, 'driverFareCalculator'])->name('calculateDriverFare');

//driver store live location
Route::post('/storeDriverLocation', [DriverLocationController::class, 'store'])->name('storeDriverLocation');

//get driver location into user
Route::get('/getDriverLocation', 'DriverLocationController@getDriverLocation');

//get driver feedbackcomplain
Route::get('/driverFeedbackComplain', [ComplainFeedbackController::class, 'driverComplainFeedbackIndex'])->name('driverComplainFeedbackIndex');

//driver logout
Route::get('/driverLogout', [DriverController::class, 'logout'])->name('logout');
