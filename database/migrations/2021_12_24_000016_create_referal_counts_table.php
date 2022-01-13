<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReferalCountsTable extends Migration
{
    public function up()
    {
        Schema::create('referal_counts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('count')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
