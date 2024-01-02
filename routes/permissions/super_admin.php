<?php

use App\Http\Controllers\AddressController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'address'], function () {
    Route::get('index', \App\Http\Livewire\advance_config\Address::class)->name('address.index');
    Route::post('store', [AddressController::class,'store'])->name('address.store');
});

Route::group(['prefix' => 'user'], function () {
    Route::get('index', \App\Http\Livewire\advance_config\UserManagement::class)->name('user.index');
    Route::post('store', [AddressController::class,'store'])->name('user.store');
});
