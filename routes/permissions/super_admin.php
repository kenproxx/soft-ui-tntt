<?php

use App\Http\Controllers\AddressController;
use App\Http\Livewire\advance_config\Address;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'dia-chi'], function () {
    Route::get('', Address::class)->name('address.index');
    Route::post('luu', [AddressController::class, 'store'])->name('address.store');
    Route::get('xem/{id}', [AddressController::class, 'show'])->name('address.show');
    Route::post('cap-nhat', [AddressController::class, 'update'])->name('address.update');
    Route::post('xoa/{id}', [AddressController::class, 'destroy'])->name('address.destroy');

    Route::post('set-user', [AddressController::class, 'handSetUserAddress'])->name('address.set.user');
});


