<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseTopicsTable extends Migration
{
    public function up()
    {
        Schema::create('course_topics', function (Blueprint $table) {
            $table->increments('id');
            $table->string('topic')->nullable();
            $table->longText('transcript')->nullable();
            $table->string('video_link');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
