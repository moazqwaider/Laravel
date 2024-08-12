<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RolePermissionController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

// use Spatie\Permission\Models\Role;

// Route::get('/', function () {
//     return view('layouts/index');
// });


Route::group([

    'prefix' => LaravelLocalization::setLocale(),
	'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
],function(){


Route::get('/', [FrontController::class,'index']);


// Route::view('/catagry', 'cms/catagory/index');

Route::prefix('/cms')->middleware('guest:admin,user')->group(function () {
    Route::get('{guard}/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});
Route::prefix('/cms/admin')->middleware('auth:admin,user')->group(function () {
    Route::resource('/admins', AdminController::class);
    Route::resource('/users', UserController::class);
    Route::resource('/home',HomeController::class);
    Route::resource('/home',HomeController::class);
    Route::resource('/about',AboutUsController::class);
    Route::get('/about-card/{id}',[AboutUsController::class,'createCard'])->name('create.card');
        // Card About
    Route::post('/about-card-store',[AboutUsController::class,'storeCard']);
    Route::get('/about-card-show/{id}',[AboutUsController::class,'showCard'])->name('showcards');
    Route::get('/about-card/edit/{id}',[AboutUsController::class,'editCard'])->name('editCard');
    Route::put('/about-card/update/{id}',[AboutUsController::class,'updateCard'])->name('updateCard');
    Route::delete('/about-card/{id}',[AboutUsController::class,'deleteCard'])->name('deleteCard');


    Route::resource('/services',ServicesController::class);
    Route::resource('/features',FeatureController::class);
    Route::resource('/teams',TeamController::class);



    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/change-password', [AuthController::class, 'editPassword'])->name('edit-password');
    Route::put('/update-password', [AuthController::class, 'updatePassword']);
    Route::get('/update-profile', [AuthController::class, 'updateProfile'])->name('update-profile');
});


// Roles and Permission route
Route::prefix('/cms/admin')->middleware('auth:admin')->group(function(){
Route::resource('/roles',RoleController::class);
Route::resource('/permissions',PermissionController::class);
Route::resource('/roles.permissions',RolePermissionController::class);
});

});
