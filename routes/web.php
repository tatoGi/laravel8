<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\support\facedes\SoftDelete;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;

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
    $brands = DB::table('brands')->get();
    return view('home', compact('brands'));
});

Route::get('/home', function () {
    echo "this is home page";
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

// category controller

Route::get('/category/all', [CategoryController ::class, 'ALLCat'])->name('all.category');

Route::post('/category/add', [CategoryController ::class, 'AddCat'])->name('store.category');

Route::get('/category/edit/{id}', [CategoryController ::class, 'Edit']);
Route::post('/category/update/{id}', [CategoryController ::class, 'Update']);
Route::get('/softdelete/category/{id}', [CategoryController ::class, 'SoftDelete']);
Route::get('/category/restore/{id}', [CategoryController ::class, 'Restore']);
Route::get('/pdelete/category/{id}', [CategoryController ::class, 'Pdelete']);
// for Brand Route //

Route::get('/brand/all', [BrandController::class, 'AllBrand'])->name('all.Brand');
Route::post('/brand/add', [BrandController::class, 'StoreBrand'])->name('store.brand');
Route::get('/brand/edit/{id}', [BrandController ::class, 'Edit']);
Route::post('/brand/update/{id}', [BrandController ::class, 'Update']);
Route::get('brand/delete/{id}', [BrandController ::class, 'Delete']);
//multi image route//
Route::get('/multi/image', [BrandController::class, 'Multpic'])->name('multi.Image');

Route::post('/multi/add', [BrandController::class, 'StoreImg'])->name('store.image');

// Admin all route //
Route::get('/home/slider', [HomeController::class, 'Homslider'])->name('home.slider');
Route::get('/add/slider', [HomeController::class, 'addslider'])->name('add.slider');
Route::post('/store/slider', [HomeController::class, 'storeslider'])->name('store.slider');

// Home About Page //
Route::get('/home/About', [AboutController::class, 'HomeAbout'])->name('home.about');








Route::get('/contact', [ContactController::class, 'index']);
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    // $users = User::all();
    // $users = DB::table('users')->get();

    return view('admin.index');
})->name('dashboard');
Route::get('/user/logout', [BrandController::class, 'Logout'])->name('user.logout');