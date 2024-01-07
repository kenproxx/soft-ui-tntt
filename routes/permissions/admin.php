<?php


use App\Http\Controllers\UserController;
use App\Http\Livewire\advance_config\UserEdit;
use App\Http\Livewire\advance_config\UserManagement;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'user'], function () {
    Route::get('index', UserManagement::class)->name('user.index');
    Route::post('store', [UserController::class, 'store'])->name('user.store');
    Route::get('edit/{id}', UserEdit::class)->name('user.edit');
    Route::post('update/{id}', [UserController::class, 'update'])->name('user.update');
});

Route::group(['prefix' => 'doan-sinh'], function () {
    Route::get('thieu-nhi', \App\Http\Livewire\DoanSinh\ThieuNhiIndex::class)->name('doan-sinh.thieu-nhi');
    Route::get('huynh-truong', \App\Http\Livewire\DoanSinh\HuynhTruongIndex::class)->name('doan-sinh.huynh-truong');
});
