<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;

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

//first file after user login   
Route::get('/userIndex', function () {
    return view('userIndex');
});

Route::get('/aboutUs', function () {
    return view('aboutUs');
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
// Route::post('/signUp', [UserController::class, 'store'])->name('register.store');

//from singup form
 Route::post('/print', 'UserController@print')->name('print');