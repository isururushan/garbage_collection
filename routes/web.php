<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('auth/login');
// });

Route::get('/login', function () {
    return view('auth/login');
});

Route::get('/',[App\Http\Controllers\frontend\HomeController::class,'index']);
Route::get('/insident',[App\Http\Controllers\frontend\InsidentController::class,'insident']);


Auth::routes();
Route::post('/logout',[App\Http\Controllers\Admin\Auth\LoginController::class, 'logout'])->name('logout');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::prefix('/admin')->name('admin.')->group(function(){
    //All the admin routes will be defined here...

   
        Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
        Route::post('/create/admin', [App\Http\Controllers\Admin\AdminUserController::class, 'store']);
        Route::delete('/delete/admin/{id}', [App\Http\Controllers\Admin\AdminUserController::class, 'delete']);
        Route::put('/update/admin', [App\Http\Controllers\Admin\AdminUserController::class, 'update']);
        Route::post('/destroy/admin', [App\Http\Controllers\Admin\AdminUserController::class, 'destroy']);

        Route::get('/fetch/forgetpassworduser', [App\Http\Controllers\Admin\ForgetPasswordController::class, 'index']);
        Route::put('/update/forgetpassworduser', [App\Http\Controllers\Admin\ForgetPasswordController::class, 'update']);

        Route::get('/fetch/loggedusers', [App\Http\Controllers\Admin\LoggedUserController::class, 'index']);

        Route::get('/fetch/Articals', [App\Http\Controllers\Admin\ArticalController::class, 'fetchArticals']);
        Route::post('/create/Articals', [App\Http\Controllers\Admin\ArticalController::class, 'store']);
        Route::put('/update/Articals', [App\Http\Controllers\Admin\ArticalController::class, 'update']);
        Route::post('/destroy/Articals', [App\Http\Controllers\Admin\ArticalController::class, 'destroy']);

        Route::get('/fetch/Collection', [App\Http\Controllers\Admin\CollectionController::class, 'fetchCollection']);
        Route::post('/create/Collection', [App\Http\Controllers\Admin\CollectionController::class, 'store']);
       
        Route::get('/fetch/Insident', [App\Http\Controllers\Admin\InsidentController::class, 'fetchInsident']);
        Route::post('/create/Insident', [App\Http\Controllers\Admin\InsidentController::class, 'store']);
        Route::put('/update/Insident', [App\Http\Controllers\Admin\InsidentController::class, 'update']);
        Route::post('/destroy/Insident', [App\Http\Controllers\Admin\InsidentController::class, 'destroy']);
        Route::post('/done/Insident', [App\Http\Controllers\Admin\InsidentController::class, 'done']);
        Route::post('/reject/Insident', [App\Http\Controllers\Admin\InsidentController::class, 'reject']);
        Route::post('/pending/Insident', [App\Http\Controllers\Admin\InsidentController::class, 'pending']);
       
        Route::get('/{any?}', [App\Http\Controllers\HomeController::class, 'index'])->where('any', '.*');
 

  });
