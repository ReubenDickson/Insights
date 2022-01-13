<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseReviewsTable extends Migration
{
    public function up()
    {
        Schema::create('course_reviews', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('review');
            $table->integer('stars')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
