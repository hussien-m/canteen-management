<?php
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;


Route::get('clear',function(){
    
 \Artisan::call('optimize:clear');
 
});


Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function () {




    Route::get('/contact',[ContactController::class,'homePage'])->name('contact');

    Route::get('/about',[AboutController::class,'about'])->name('about');
    Route::post('/contact/store',[ContactController::class,'store'])->name('contact.store');

    require __DIR__.'/admin.php';

    require __DIR__.'/student.php';

    require __DIR__.'/auth.php';
});
