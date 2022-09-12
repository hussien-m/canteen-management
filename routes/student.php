<?php

use App\Http\Controllers\FrontendController;
use App\Http\Controllers\StuAuth\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\StudentNotification;
use App\Http\Middleware\SiteStatus;
use Illuminate\Support\Facades\Route;

Route::middleware([SiteStatus::class])->group(function () {

    Route::get('/',function(){
        return redirect()->url('/');
    })->name('home');

    Route::get('student/login'  ,  [LoginController::class,'showLoginForm'])->name('student.login');
    Route::post('student/login' ,  [LoginController::class,'login'])->name('student.login.submit');
    Route::get('student/logout' ,  [LoginController::class,'logout'])->name('student.logout');


    Route::get('/' , [FrontendController::class,'index']);

    Route::get('test/deal'   , [FrontendController::class,'testDeal']);

    Route::get('test/search' , [FrontendController::class,'index']);

    Route::get('show/meal/{id}' , [FrontendController::class,'show'])->name('show.meal');


    Route::post('send/order/{id}' , [OrderController::class,'sendOrder'])->name('send.order');

    Route::get('myOrder', [OrderController::class , 'myOrder'])->name('my.order');


    Route::get('stu/all/noti/' , [StudentNotification::class,'index'])->name('stu.all.noti');
    Route::get('stu/show/noti/{id}' , [StudentNotification::class,'show'])->name('stu.show.noti');

    Route::get('u/meals', [FrontendController::class,'meals'])->name('frontend.meals');


    Route::get('/cat/{id}', [FrontendController::class,'cat'])->name('u.cat');
    Route::get('/sub/{id}', [FrontendController::class,'subCat'])->name('u.subcat');




});
