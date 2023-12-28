<?php

use App\Http\Controllers\AddressController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'address'], function () {
    Route::get('index', [AddressController::class, 'index'])->name('address.index');
});
