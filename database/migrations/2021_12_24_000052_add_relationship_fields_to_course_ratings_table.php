<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCourseRatingsTable extends Migration
{
    public function up()
    {
        Schema::table('course_ratings', function (Blueprint $table) {
            $table->unsignedBigInteger('course_id');
            $table->foreign('course_id', 'course_fk_5661169')->references('id')->on('courses');
        });
    }
}
