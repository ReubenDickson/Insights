<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTradeSignalsTable extends Migration
{
    public function up()
    {
        Schema::create('trade_signals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('crypto_pair');
            $table->string('entry');
            $table->string('exit');
            $table->string('stop_loss');
            $table->longText('comment')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
