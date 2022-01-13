<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToReviewRepliesTable extends Migration
{
    public function up()
    {
        Schema::table('review_replies', function (Blueprint $table) {
            $table->unsignedBigInteger('review_id');
            $table->foreign('review_id', 'review_fk_5661162')->references('id')->on('course_reviews');
            $table->unsignedBigInteger('reviewer_id');
            $table->foreign('reviewer_id', 'reviewer_fk_5661164')->references('id')->on('users');
        });
    }
}
