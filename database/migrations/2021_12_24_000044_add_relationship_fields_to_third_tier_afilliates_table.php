<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToThirdTierAfilliatesTable extends Migration
{
    public function up()
    {
        Schema::table('third_tier_afilliates', function (Blueprint $table) {
            $table->unsignedBigInteger('email_id');
            $table->foreign('email_id', 'email_fk_5661117')->references('id')->on('users');
        });
    }
}
