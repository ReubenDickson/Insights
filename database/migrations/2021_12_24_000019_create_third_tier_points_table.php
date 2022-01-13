<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThirdTierPointsTable extends Migration
{
    public function up()
    {
        Schema::create('third_tier_points', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('point_count');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
