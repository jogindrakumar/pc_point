<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\AboutController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\HeroController;
use App\Models\Admin;
use App\Models\About;
use App\Models\Product;
use App\Models\Hero;

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
    return view('home');
});

Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


//About Route

Route::prefix('about')->middleware(['auth:admin'])->group(function(){
Route::get('/view',[AboutController::class,'AboutView'])->name('all.about');
Route::get('/add',[AboutController::class,'AboutAdd'])->name('add.about');
Route::post('/store',[AboutController::class,'AboutStore'])->name('about.store');
Route::get('/edit/{id}',[AboutController::class,'AboutEdit'])->name('about.edit');
Route::post('/update/{id}',[AboutController::class,'AboutUpdate'])->name('about.update');
Route::get('/delete/{id}',[AboutController::class,'AboutDelete'])->name('about.delete');


 });

 // product Route
 Route::prefix('product')->middleware(['auth:admin'])->group(function(){
Route::get('/view',[ProductController::class,'ProductView'])->name('all.product');
Route::get('/add',[ProductController::class,'ProductAdd'])->name('add.product');
Route::post('/store',[ProductController::class,'ProductStore'])->name('product.store');
Route::get('/edit/{id}',[ProductController::class,'ProductEdit'])->name('product.edit');
Route::post('/update/{id}',[ProductController::class,'ProductUpdate'])->name('product.update');
Route::get('/delete/{id}',[ProductController::class,'ProductDelete'])->name('product.delete');


 });
 
 // Hero Route
 Route::prefix('hero')->middleware(['auth:admin'])->group(function(){
Route::get('/view',[HeroController::class,'HeroView'])->name('all.hero');
Route::get('/add',[HeroController::class,'HeroAdd'])->name('add.hero');
Route::post('/store',[HeroController::class,'HeroStore'])->name('hero.store');
Route::get('/edit/{id}',[HeroController::class,'HeroEdit'])->name('hero.edit');
Route::post('/update/{id}',[HeroController::class,'HeroUpdate'])->name('hero.update');
Route::get('/delete/{id}',[HeroController::class,'HeroDelete'])->name('hero.delete');


 });


//admin route
Route::group(['prefix' => 'admin', 'middleware'=>['admin:admin']],function(){

    Route::get('/login',[AdminController::class,'loginForm']);
    Route::post('/login',[AdminController::class,'store'])->name('admin.login');

   

});

 //Admin All routes

 Route::get('/admin/logout',[AdminController::class,'destroy'])->name('admin.logout');
 Route::get('/admin/profile',[AdminProfileController::class,'AdminProfile'])->name('admin.profile');
 Route::get('/admin/profile/edit',[AdminProfileController::class,'AdminProfileEdit'])->name('admin.profile.edit');
 Route::post('/admin/profile/store',[AdminProfileController::class,'AdminProfileStore'])->name('admin.profile.store');
 Route::get('/admin/change/password',[AdminProfileController::class,'AdminChangePassword'])->name('admin.change.password');
 Route::post('/admin/update/password',[AdminProfileController::class,'AdminUpdatePassword'])->name('update.change.password');

 
Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    return view('admin.index');
})->name('dashboard');
