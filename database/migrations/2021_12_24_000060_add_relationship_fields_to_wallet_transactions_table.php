<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToWalletTransactionsTable extends Migration
{
    public function up()
    {
        Schema::table('wallet_transactions', function (Blueprint $table) {
            $table->unsignedBigInteger('owner_id');
            $table->foreign('owner_id', 'owner_fk_5661259')->references('id')->on('users');
            $table->unsignedBigInteger('balance_id');
            $table->foreign('balance_id', 'balance_fk_5661265')->references('id')->on('wallets');
        });
    }
}
