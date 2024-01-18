<?php

use App\Http\Controllers\DanhSachLopController;
use App\Http\Controllers\UserController;
use App\Http\Livewire\advance_config\UserEdit;
use App\Http\Livewire\advance_config\UserManagement;
use App\Http\Livewire\DoanSinh\DanhSachLopIndex;
use App\Http\Livewire\DoanSinh\HuynhTruongIndex;
use App\Http\Livewire\DoanSinh\ThieuNhiIndex;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'tai-khoan'], function () {
    Route::get('index', UserManagement::class)->name('user.index');
    Route::post('store', [UserController::class, 'store'])->name('user.store');
    Route::get('sua/{id}', UserEdit::class)->name('user.edit');
    Route::post('update/{id}', [UserController::class, 'update'])->name('user.update');
});

Route::group(['prefix' => 'doan-sinh'], function () {
    Route::get('thieu-nhi', ThieuNhiIndex::class)->name('doan-sinh.thieu-nhi');
    Route::get('huynh-truong', HuynhTruongIndex::class)->name('doan-sinh.huynh-truong');
    Route::get('danh-sach-lop', DanhSachLopIndex::class)->name('doan-sinh.danh-sach-lop');
    Route::post('danh-sach-lop/store', [DanhSachLopController::class, 'store'])->name('doan-sinh.danh-sach-lop.store');
    Route::post('danh-sach-lop/add-member', [DanhSachLopController::class, 'addMemberToClass'])->name('doan-sinh.danh-sach-lop.add-member');
});
