<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscussionAnswersTable extends Migration
{
    public function up()
    {
        Schema::create('discussion_answers', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('answer')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
