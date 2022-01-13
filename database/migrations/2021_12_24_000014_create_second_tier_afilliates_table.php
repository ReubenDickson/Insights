<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSecondTierAfilliatesTable extends Migration
{
    public function up()
    {
        Schema::create('second_tier_afilliates', function (Blueprint $table) {
            $table->increments('id');
            $table->datetime('date_became_second_tier');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
