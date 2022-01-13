<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePoolEarningsTable extends Migration
{
    public function up()
    {
        Schema::create('pool_earnings', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('direct_referal_earnings', 15, 2);
            $table->decimal('first_tier_earnings', 15, 2);
            $table->decimal('second_tier_earnings', 15, 2);
            $table->decimal('third_tier_earnings', 15, 2);
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
