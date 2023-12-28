<?php

use App\Http\Controllers\AddressController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'address'], function () {
    Route::get('index', \App\Http\Livewire\Address::class)->name('address.index');
    Route::post('store', [AddressController::class,'store'])->name('address.store');
});
