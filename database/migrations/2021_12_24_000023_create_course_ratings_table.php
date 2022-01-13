<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseRatingsTable extends Migration
{
    public function up()
    {
        Schema::create('course_ratings', function (Blueprint $table) {
            $table->increments('id');
            $table->float('average_ratings', 15, 2)->nullable();
            $table->integer('total_reviews')->nullable();
            $table->integer('total_stars')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
