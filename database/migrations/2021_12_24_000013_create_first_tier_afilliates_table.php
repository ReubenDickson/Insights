<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFirstTierAfilliatesTable extends Migration
{
    public function up()
    {
        Schema::create('first_tier_afilliates', function (Blueprint $table) {
            $table->increments('id');
            $table->datetime('date_became_first_tier');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
