<?php


use App\Http\Controllers\AdminNotifaction;
use App\Http\Controllers\MealController;
use App\Http\Controllers\MyController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MainCategoryController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\AdminReport;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UserController;
use App\Models\School;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AboutController;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>'dash' , 'middleware' =>['auth'] ],function(){

    Route::resource('roles',RolesController::class);
    Route::resource('users' , UserController::class);

    Route::get('/dashboard',[MyController::class,'dashboard'])->name('dashboard');

    Route::get('schools',[SchoolController::class,'index'])->name('school.index');


    Route::post('add/achool/',[SchoolController::class,'addSchool'])->name('add-school');

    Route::get('school/edit/{id}',[SchoolController::class,'editSchool'])->name('admin.edit.school');
    Route::post('school/update/{id}',[SchoolController::class,'updateSchool'])->name('admin.update.school');
    Route::post('school/delete/{id}',[SchoolController::class,'deleteSchool'])->name('admin.delete.school');

    Route::get('add/student/{id}',[SchoolController::class,'addStudent'])->name('add-student');

    Route::post('add/canteen/',[SchoolController::class,'addCanteen'])->name('add-canteen');

    Route::get('show/student/school/{id}',[StudentController::class,'showStudents'])->name('show-student');

    Route::get('show/all/student/',[StudentController::class,'allStudents'])->name('all-student');
    Route::post('admin/store/student/',[StudentController::class,'storeStuend'])->name('admin.store.student');
    Route::get('edit/student/{id}',[StudentController::class,'editStudent'])->name('admin.edit.student');
    Route::post('update/student/{id}',[StudentController::class,'updateStudent'])->name('admin.update.student');
    Route::post('delete/student/{id}',[StudentController::class,'deleteStudent'])->name('admin.delete.student');

    Route::get('importExportView', [MyController::class, 'importExportView']);

    Route::get('export', [MyController::class, 'export'])->name('export');

    Route::get('export/student/{id}', [MyController::class, 'exportStudentQuery'])->name('export.stu');

    Route::get('export/order/{status}', [MyController::class, 'exportOrderQuery'])->name('export.order');



    Route::post('import', [MyController::class, 'import'])->name('import');

    Route::post('import/school', [MyController::class, 'importSchool'])->name('import-school');
    Route::get('meals', [MealController::class , 'index'])->name('meal.index');
    Route::get('meals/create', [MealController::class , 'create'])->name('meal.cretate');

    Route::post('meals/store', [MealController::class , 'store'])->name('meal.store');
    Route::get('meals/edit/{id}', [MealController::class , 'edit'])->name('admin.meal.edit');
    Route::post('meals/update/{id}', [MealController::class , 'update'])->name('admin.meal.update');
    Route::post('meals/delete/{id}', [MealController::class , 'delete'])->name('admin.meal.delete');


    Route::get('category', [CategoryController::class , 'index'])->name('category.index');
    Route::get('category/create', [CategoryController::class , 'create'])->name('category.create');
    Route::post('category/store', [CategoryController::class , 'store'])->name('category.store');
    Route::get('category/edit/{id}', [CategoryController::class , 'edit'])->name('category.edit');
    Route::post('category/update/{id}', [CategoryController::class , 'update'])->name('category.update');
    Route::post('category/destroy/{id}', [CategoryController::class , 'destroy'])->name('category.destroy');



    Route::get('maincategory', [MainCategoryController::class , 'index'])->name('maincategory.index');
    Route::get('maincategory/create', [MainCategoryController::class , 'create'])->name('maincategory.create');
    Route::post('maincategory/store', [MainCategoryController::class , 'store'])->name('maincategory.store');
    Route::get('maincategory/edit/{id}', [MainCategoryController::class , 'edit'])->name('maincategory.edit');
    Route::post('maincategory/update/{id}', [MainCategoryController::class , 'update'])->name('maincategory.update');
    Route::post('maincategory/destroy/{id}', [MainCategoryController::class , 'destroy'])->name('maincategory.destroy');

    Route::get('meals/scools', [MealController::class , 'schools'])->name('meal.schools');
    Route::get('find/cat', [MealController::class , 'findCat'])->name('find.cat');



    Route::get('settings' , [SettingController::class,'index'])->name('settings');
    Route::post('settings/save' , [SettingController::class,'store'])->name('settings.save');

    Route::get('all/orders' , [AdminOrderController::class , 'index'])->name('admin.orders');
    Route::get('displayReport/' , [AdminOrderController::class , 'displayReport']);

    Route::post('change/order/{id}' , [AdminOrderController::class , 'changeOrder'])->name('admin.order.change');

    Route::get('order/create' , [AdminOrderController::class , 'changeOrder'])->name('admin.create.order');
    Route::get('order/delete/{id}' , [AdminOrderController::class , 'delete'])->name('admin.order.delete');
    Route::get('order/edit/{id}' , [AdminOrderController::class , 'edit'])->name('admin.order.edit');
    Route::post('order/update/{id}' , [AdminOrderController::class , 'update'])->name('admin.order.update');

    Route::get('all/noti' , [AdminNotifaction::class,'index']);
    Route::get('show/admin/order/{order_id}/' , [AdminNotifaction::class,'showOrderWtihoutNoti'])->name('read.admin.notis');
    Route::get('show/admin/order/{order_id}/{not_id}' , [AdminNotifaction::class,'showOrder'])->name('read.admin.noti');



    Route::get('order/repot/daly' , [AdminReport::class,'orderDaily'])->name('report.order');
    Route::get('order/repot/student' , [AdminReport::class,'orderStudent'])->name('report.student');
    Route::get('order/repot/canteen' , [AdminReport::class,'orderCanteen'])->name('report.canteen');



    Route::get('/about/index',[AboutController::class,'index'])->name('about.index');
    Route::post('/about/store',[AboutController::class,'store'])->name('about.store');


    Route::get('/contact/index',[ContactController::class,'index'])->name('contact.index');
    Route::get('/contact/{id}',[ContactController::class,'show'])->name('contact.show');
    Route::post('/contact/delete/{id}',[ContactController::class,'delete'])->name('contact.delete');


});
