<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToSecondTierPointsTable extends Migration
{
    public function up()
    {
        Schema::table('second_tier_points', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_5661140')->references('id')->on('users');
        });
    }
}
