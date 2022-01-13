<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToSignalUpdatesTable extends Migration
{
    public function up()
    {
        Schema::table('signal_updates', function (Blueprint $table) {
            $table->unsignedBigInteger('trade_signal_id');
            $table->foreign('trade_signal_id', 'trade_signal_fk_5661247')->references('id')->on('trade_signals');
        });
    }
}
