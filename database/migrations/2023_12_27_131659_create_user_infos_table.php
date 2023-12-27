<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_infos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->unique();

            $table->boolean('sex')->nullable()->comment('0: nữ, 1: nam');
            $table->date('date_of_birth')->nullable()->comment('Ngày sinh');
            $table->integer('my_phone')->nullable()->comment('số điện thoại cá nhân');
            $table->string('my_email')->nullable()->comment('email cá nhân');

            $table->date('ngay_rua_toi')->nullable()->comment('ngày rửa tôội');
            $table->string('nguoi_rua_toi')->nullable()->comment('người rửa tội');
            $table->string('nguoi_do_dau_rua_toi')->nullable()->comment('người đỡ đầu rửa tội');

            $table->date('ngay_them_suc')->nullable()->comment('ngày thêm sức');
            $table->string('nguoi_them_suc')->nullable()->comment('người thêm sức');
            $table->string('nguoi_do_dau_them_suc')->nullable()->comment('người đỡ đầu thêm sức');

            $table->string('chuc_vu')->nullable()->comment('chức vụ cá nhân');
            $table->string('cap_hieu')->nullable()->comment('cấp hiệu cá nhân');
            $table->date('ngay_tuyen_hua_ht_1')->nullable()->comment('ngày tuyên hứa huynh trưởng cấp 1');

            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_infos');
    }
};
