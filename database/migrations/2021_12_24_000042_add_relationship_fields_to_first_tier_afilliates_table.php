<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToFirstTierAfilliatesTable extends Migration
{
    public function up()
    {
        Schema::table('first_tier_afilliates', function (Blueprint $table) {
            $table->unsignedBigInteger('email_id')->nullable();
            $table->foreign('email_id', 'email_fk_5661105')->references('id')->on('users');
        });
    }
}
