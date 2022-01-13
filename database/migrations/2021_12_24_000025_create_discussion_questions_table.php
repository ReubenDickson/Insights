<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscussionQuestionsTable extends Migration
{
    public function up()
    {
        Schema::create('discussion_questions', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('question');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
