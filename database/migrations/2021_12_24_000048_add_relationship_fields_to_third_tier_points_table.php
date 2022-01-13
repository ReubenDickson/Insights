<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToThirdTierPointsTable extends Migration
{
    public function up()
    {
        Schema::table('third_tier_points', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_5661146')->references('id')->on('users');
        });
    }
}
