<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCoursesTable extends Migration
{
    public function up()
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->unsignedBigInteger('tutor_id')->nullable();
            $table->foreign('tutor_id', 'tutor_fk_5661095')->references('id')->on('users');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id', 'category_fk_5661103')->references('id')->on('course_categories');
        });
    }
}
