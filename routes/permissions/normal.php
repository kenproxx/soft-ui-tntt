<?php


use App\Http\Controllers\AddressController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'thong-tin-dia-chi'], function () {
    Route::get('giao-phan', [AddressController::class, 'getGiaoPhan'])->name('dia-chi.giao-phan');
    Route::get('giao-hat/{id}', [AddressController::class, 'getGiaoHatByGiaoPhan'])->name('dia-chi.giao-hat');
    Route::get('giao-xu/{id}', [AddressController::class, 'getGiaoXuByGiaoHat'])->name('dia-chi.giao-xu');
    Route::get('giao-ho/{id}', [AddressController::class, 'getGiaoHoByGiaoXu'])->name('dia-chi.giao-ho');
});
