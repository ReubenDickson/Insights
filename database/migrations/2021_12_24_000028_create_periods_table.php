<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeriodsTable extends Migration
{
    public function up()
    {
        Schema::create('periods', function (Blueprint $table) {
            $table->increments('id');
            $table->datetime('start_date');
            $table->datetime('end_date');
            $table->decimal('first_pool_balance', 15, 2)->nullable();
            $table->decimal('second_pool_balance', 15, 2)->nullable();
            $table->decimal('third_pool_balance', 15, 2)->nullable();
            $table->decimal('payout', 15, 2)->nullable();
            $table->string('status')->nullable();
            $table->longText('comment')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
