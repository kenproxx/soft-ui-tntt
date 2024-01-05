<?php

use App\Http\Controllers\AddressController;
use App\Http\Livewire\advance_config\Address;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'address'], function () {
    Route::get('index', Address::class)->name('address.index');
    Route::post('store', [AddressController::class, 'store'])->name('address.store');

    Route::post('set-user', [AddressController::class, 'handSetUserAddress'])->name('address.set.user');
});


