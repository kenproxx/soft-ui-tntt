<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('username')->unique();
            $table->string('email')->unique()->nullable();

            $table->string('name');
            $table->string('password');

            $table->string('holy_name')->nullable();
            $table->string('location_id')->nullable();
            $table->string('avatar')->nullable();
            $table->string('role_name')->nullable()->default(\App\Enums\RoleName::USER);
            $table->string('status')->nullable();
            $table->timestamp('email_verified_at')->nullable();

            $table->rememberToken();

            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
