<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->integer('number_of_topics')->nullable();
            $table->longText('description')->nullable();
            $table->string('tags');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
