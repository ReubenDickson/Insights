<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCourseTopicsTable extends Migration
{
    public function up()
    {
        Schema::table('course_topics', function (Blueprint $table) {
            $table->unsignedBigInteger('course_id');
            $table->foreign('course_id', 'course_fk_5661177')->references('id')->on('courses');
        });
    }
}
