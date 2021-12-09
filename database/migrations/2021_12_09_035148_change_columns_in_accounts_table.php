<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeColumnsInAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('accounts', function (Blueprint $table) {
            $table->unsignedBigInteger('first_pay')->nullable()->change();
            $table->unsignedBigInteger('bank_account_number')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('accounts', function (Blueprint $table) {
            $table->unsignedInteger('first_pay')->nullable()->change();
            $table->unsignedInteger('bank_account_number')->nullable()->change();
        });
    }
}
