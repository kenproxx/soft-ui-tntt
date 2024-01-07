<?php


use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'thong-tin-dia-chi'], function () {
    Route::get('giao-phan', [\App\Http\Controllers\AddressController::class, 'getGiaoPhan'])->name('dia-chi.giao-phan');
    Route::get('giao-hat/{id}', [\App\Http\Controllers\AddressController::class, 'getGiaoHatByGiaoPhan'])->name('dia-chi.giao-hat');
    Route::get('giao-xu/{id}', [\App\Http\Controllers\AddressController::class, 'getGiaoXuByGiaoHat'])->name('dia-chi.giao-xu');
    Route::get('giao-ho/{id}', [\App\Http\Controllers\AddressController::class, 'getGiaoHoByGiaoXu'])->name('dia-chi.giao-ho');
});
