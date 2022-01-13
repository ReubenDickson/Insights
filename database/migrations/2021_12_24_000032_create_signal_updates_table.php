<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSignalUpdatesTable extends Migration
{
    public function up()
    {
        Schema::create('signal_updates', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('update');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
