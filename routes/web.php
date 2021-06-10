<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\CourseCountroller;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\Dashboard\UesrMangeController;

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

Route::view('/', 'welcome');

Auth::routes(['register'=>false]);

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function() {
    Route::view('/','dashboard')->name('dashboard');
    Route::group(['middleware'=>'role:superadministrator'],function(){
        Route::get('/users',[UesrMangeController::class,'index'])->name('users.index');
        Route::post('/users',[UesrMangeController::class,'store'])->name('users.store');
        Route::delete('/users/{user}',[UesrMangeController::class,'delete'])->name('users.delete');

    });

});


Route::resource('/course', CourseCountroller::class)->middleware('auth');



Route::prefix('teacher')->middleware('auth')->name('teacher.')->group(function() {
    Route::get('/',                   [TeacherController::class,'index'])   ->name('index');
    Route::post('store',              [TeacherController::class, 'store'])   ->name('store');
    Route::get('show{teacher}',       [TeacherController::class, 'show'])    ->name('show');
    Route::get('edit/{teacher}',      [TeacherController::class, 'edit'])    ->name('edit');
    Route::put('update/{teacher}',    [TeacherController::class, 'update'])   ->name('update');
    Route::delete('destroy/{teacher}',[TeacherController::class, 'destroy'])  ->name('destroy');
       
});



Route::prefix('student')->middleware('auth')->name('student.')->group(function() {
    Route::get('/',                     [StudentController::class,'index'])    ->name('index');
    Route::post('store' ,               [StudentController::class,'store'])    ->name('store');
    Route::get('show/{student}',        [StudentController::class,'show'])     ->name('show');
    Route::get('edit/{student}',        [StudentController::class,'edit'])     ->name('edit');
    Route::put('update/{student}',      [StudentController::class,'update'])   ->name('update');
    Route::delete('destroy/{student}',  [StudentController::class,'destroy'])  ->name('destroy');
});