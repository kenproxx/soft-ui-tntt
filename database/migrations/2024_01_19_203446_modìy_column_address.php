<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('addresses', function (Blueprint $table) {
            $table->string('ten_doan')->nullable();
            $table->date('ngay_bon_mang_doan')->nullable();
            $table->mediumText('logo_doan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('addresses', function (Blueprint $table) {
            $table->dropColumn('ten_doan');
            $table->dropColumn('ngay_bon_mang_doan');
            $table->dropColumn('logo_doan');
        });
    }
};
