<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPoolEarningsTable extends Migration
{
    public function up()
    {
        Schema::table('pool_earnings', function (Blueprint $table) {
            $table->unsignedBigInteger('period_id');
            $table->foreign('period_id', 'period_fk_5661228')->references('id')->on('periods');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'user_fk_5661229')->references('id')->on('users');
        });
    }
}
