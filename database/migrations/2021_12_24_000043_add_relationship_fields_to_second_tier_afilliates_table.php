<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToSecondTierAfilliatesTable extends Migration
{
    public function up()
    {
        Schema::table('second_tier_afilliates', function (Blueprint $table) {
            $table->unsignedBigInteger('email_id');
            $table->foreign('email_id', 'email_fk_5661111')->references('id')->on('users');
        });
    }
}
