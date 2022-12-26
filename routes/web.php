<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VisitController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ProductController;

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

Route::get('/logout',[HomeController::class,'logout'])->name('logout');

Route::group(['middleware'=>'auth:web'],function (){
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::resource('/patients',PatientController::class);
    Route::resource('/prouduts',ProductController::class);
    Route::resource('/visits',VisitController::class);
    Route::resource('/ticket',TicketController::class);



   
});


// Route::get('/', function () {
//     return view('welcome');
// })->name('home');







Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
