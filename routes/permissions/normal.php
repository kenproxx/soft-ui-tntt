<?php


use App\Http\Controllers\AddressController;
use App\Http\Livewire\DoanSinh\ThongTinDoan;
use App\Http\Livewire\DoanSinh\ThongTinDoanEdit;
use App\Http\Livewire\DoanSinh\ThongTinLop;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'thong-tin-dia-chi'], function () {
    Route::get('giao-phan', [AddressController::class, 'getGiaoPhan'])->name('dia-chi.giao-phan');
    Route::get('giao-hat/{id}', [AddressController::class, 'getGiaoHatByGiaoPhan'])->name('dia-chi.giao-hat');
    Route::get('giao-xu/{id}', [AddressController::class, 'getGiaoXuByGiaoHat'])->name('dia-chi.giao-xu');
    Route::get('giao-ho/{id}', [AddressController::class, 'getGiaoHoByGiaoXu'])->name('dia-chi.giao-ho');
});


Route::group(['prefix' => 'doan-sinh'], function () {
    Route::get('thong-tin-lop/{idClass?}', ThongTinLop::class)->name('doan-sinh.thong-tin-lop');
    Route::get('thong-tin-doan', ThongTinDoan::class)->name('doan-sinh.thong-tin-doan');
    Route::get('thong-tin-doan/sua', ThongTinDoanEdit::class)->name('doan-sinh.thong-tin-doan.edit');
});

Route::group(['prefix' => 'mail'], function () {
    Route::get('send', [\App\Http\Controllers\SendMailController::class, 'sendMail'])->name('mail.send');
});
