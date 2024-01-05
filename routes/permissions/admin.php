<?php


use App\Http\Controllers\UserController;
use App\Http\Livewire\advance_config\UserManagement;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'user'], function () {
    Route::get('index', UserManagement::class)->name('user.index');
    Route::post('store', [UserController::class, 'store'])->name('user.store');
    Route::post('edit', [UserController::class, 'edit'])->name('user.edit');
});
