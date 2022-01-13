<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThirdTierAfilliatesTable extends Migration
{
    public function up()
    {
        Schema::create('third_tier_afilliates', function (Blueprint $table) {
            $table->increments('id');
            $table->datetime('date_became_third_tier');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
