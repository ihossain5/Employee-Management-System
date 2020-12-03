<?php

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth', 'has.permission']], function () {

    Route::get('/', function () {
        return view('welcome');
    });

    Route::resource('departments', DepartmentController::class);

    Route::resource('roles', RoleController::class);

    Route::resource('permissions', PermissionController::class);

    Route::resource('leaves', LeaveController::class);

    Route::post('leave/status/{id}', [LeaveController::class, 'acceptStatus'])->name('accept.status');

    Route::resource('notices', NoticeController::class);

    Route::get('/mail', [MailController::class, 'create'])->name('mails.create');

    Route::post('mail', [MailController::class, 'store'])->name('mails.store');
});
Route::resource('users', UserController::class);