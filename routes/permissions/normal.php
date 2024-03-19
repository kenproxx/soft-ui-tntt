<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\CloudinaryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SendMailController;
use App\Http\Controllers\ThongTinDoanController;
use App\Http\Controllers\UserController;
use App\Http\Livewire\DoanSinh\ThongTinDoan;
use App\Http\Livewire\DoanSinh\ThongTinDoanEdit;
use App\Http\Livewire\DoanSinh\ThongTinLop;
use App\Http\Livewire\Profile;

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
    Route::post('thong-tin-doan/cap-nhat', [ThongTinDoanController::class, 'update'])->name('doan-sinh.thong-tin-doan.update');
});

Route::group(['prefix' => 'mail'], function () {
    Route::get('send', [SendMailController::class, 'sendMail'])->name('mail.send');
});

Route::group(['prefix' => 'file'], function () {
    Route::post('send', [CloudinaryController::class, 'upload'])->name('file.upload');
});

Route::group(['prefix' => 'trang-ca-nhan'], function () {
    Route::get('', Profile::class)->name('profile');

    Route::post('avatar', [UserController::class, 'uploadAvatar'])->name('profile.upload.avatar');
    Route::post('thong-tin-ca-nhan', [ProfileController::class, 'saveThongTinCaNhan'])->name('profile.save.thong-tin-ca-nhan');
    Route::post('thong-tin-phu-huynh', [ProfileController::class, 'saveThongTinPhuHuynh'])->name('profile.save.thong-tin-phu-huynh');
    Route::post('thong-tin-khac', [ProfileController::class, 'saveThongTinKhac'])->name('profile.save.thong-tin-khac');
});
