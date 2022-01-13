<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCourseReviewsTable extends Migration
{
    public function up()
    {
        Schema::table('course_reviews', function (Blueprint $table) {
            $table->unsignedBigInteger('course_id');
            $table->foreign('course_id', 'course_fk_5661154')->references('id')->on('courses');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'user_fk_5661155')->references('id')->on('users');
        });
    }
}
