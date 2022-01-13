<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('username')->nullable()->unique();
            $table->string('email')->nullable()->unique();
            $table->boolean('verified')->default(0)->nullable();
            $table->datetime('verified_at')->nullable();
            $table->string('verification_token')->nullable();
            $table->string('password')->nullable();
            $table->string('gender')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('state')->nullable();
            $table->longText('address_line_1')->nullable();
            $table->longText('address_line_2')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('nin_ssn_id_number')->nullable();
            $table->string('country_code')->nullable();
            $table->string('country')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('is_admin')->nullable();
            $table->string('is_tutor')->nullable();
            $table->string('level')->nullable()->default("1");
            $table->string('is_elite')->nullable();
            $table->string('is_pro')->nullable();
            $table->string('usdt_trc_20_address')->nullable();
            $table->datetime('start_date')->nullable();
            $table->string('eth_address')->nullable();
            $table->string('remember_token')->nullable();
            $table->string('email_is_verified')->nullable();
            $table->datetime('email_verified_at')->nullable();
            $table->string('user_is_verified')->nullable();
            $table->boolean('two_factor')->default(0)->nullable();
            $table->string('two_factor_code')->nullable();
            $table->datetime('two_factor_expires_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
