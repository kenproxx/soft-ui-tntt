<?php

use App\Http\Controllers\AddressController;
use App\Http\Livewire\advance_config\Address;
use App\Http\Livewire\advance_config\UserManagement;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'address'], function () {
    Route::get('index', Address::class)->name('address.index');
    Route::post('store', [AddressController::class, 'store'])->name('address.store');
});

Route::group(['prefix' => 'user'], function () {
    Route::get('index', UserManagement::class)->name('user.index');
    Route::post('store', [AddressController::class, 'store'])->name('user.store');
    Route::post('edit', [AddressController::class, 'edit'])->name('user.edit');
});
