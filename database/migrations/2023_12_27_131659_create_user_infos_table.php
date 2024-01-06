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

            $table->string('sex')->nullable()->comment('giới tính');
            $table->date('date_of_birth')->nullable()->comment('Ngày sinh');
            $table->string('my_phone', 11)->nullable()->comment('số điện thoại cá nhân');
            $table->string('my_email')->nullable()->comment('email cá nhân');

            $table->string('ten_bo')->nullable()->comment('Tên bố');
            $table->string('nghe_nghiep_bo')->nullable()->comment('nghề nghiệp bố');
            $table->string('sdt_bo', 11)->nullable()->comment('số điện thoại bố');

            $table->string('ten_me')->nullable()->comment('Tên mẹ');
            $table->string('nghe_nghiep_me')->nullable()->comment('nghề nghiệp mẹ');
            $table->string('sdt_me', 11)->nullable()->comment('số điện thoại mẹ');

            $table->string('giao_phan_id')->nullable()->comment('giáo phận');
            $table->string('giao_hat_id')->nullable()->comment('giáo hạt');
            $table->string('giao_xu_id')->nullable()->comment('giáo xứ');
            $table->string('giao_ho_id')->nullable()->comment('giáo họ');
            $table->string('dia_chi')->nullable()->comment('địa chỉ gia đình');

            $table->date('ngay_rua_toi')->nullable()->comment('ngày rửa tội');
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
