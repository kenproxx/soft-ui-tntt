<?php

use App\Http\Controllers\CloudinaryController;
use App\Http\Livewire\Auth\ForgotPassword;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\ResetPassword;
use App\Http\Livewire\Auth\SignUp;
use App\Http\Livewire\Billing;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Exception\Error403;
use App\Http\Livewire\Exception\Error404;
use App\Http\Livewire\Exception\Error500;
use App\Http\Livewire\LaravelExamples\UserManagement;
use App\Http\Livewire\LaravelExamples\UserProfile;
use App\Http\Livewire\Profile;
use App\Http\Livewire\Rtl;
use App\Http\Livewire\StaticSignIn;
use App\Http\Livewire\StaticSignUp;
use App\Http\Livewire\Tables;
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


Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dang-ky', SignUp::class)->name('sign-up');
Route::get('/dang-nhap', Login::class)->name('login');

Route::get('/login/forgot-password', ForgotPassword::class)->name('forgot-password');

Route::get('/reset-password/{id}', ResetPassword::class)->name('reset-password')->middleware('signed');

Route::group(['prefix' => 'file1'], function () {
    Route::post('send', [CloudinaryController::class, 'upload'])->name('file.upload');
});

Route::middleware('auth')->group(function () {
    Route::get('/trang-chu', Dashboard::class)->name('dashboard');
    Route::get('/billing', Billing::class)->name('billing');
    Route::get('/profile', Profile::class)->name('profile');
    Route::get('/tables', Tables::class)->name('tables');
    Route::get('/static-sign-in', StaticSignIn::class)->name('sign-in');
    Route::get('/static-sign-up', StaticSignUp::class)->name('static-sign-up');
    Route::get('/rtl', Rtl::class)->name('rtl');
    Route::get('/laravel-user-profile', UserProfile::class)->name('user-profile');
    Route::get('/laravel-user-management', UserManagement::class)->name('user-management');


    Route::middleware('isNormal')->group(function () {
        require_once __DIR__ . '/permissions/normal.php';
    });

    Route::middleware('isAdmin')->group(function () {
        require_once __DIR__ . '/permissions/admin.php';
    });

    Route::middleware('isSuperAdmin')->group(function () {
        require_once __DIR__ . '/permissions/super_admin.php';
    });
});

Route::group(['prefix' => 'exception'], function () {
    Route::get('403', Error403::class)->name('exception.403');
    Route::get('404', Error404::class)->name('exception.404');
    Route::get('500', Error500::class)->name('exception.500');
});
