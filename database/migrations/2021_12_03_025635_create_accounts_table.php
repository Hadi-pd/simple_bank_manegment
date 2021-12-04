<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->string('name',50)->nullable();
            $table->string('last_name',50)->nullable();
            $table->string('email',50)->nullable();
            $table->string('phone',15)->nullable();
            $table->unsignedInteger('first_pay')->nullable();
            $table->string('address',200)->nullable();
            $table->unsignedInteger('bank_account_number')->nullable();
            $table->string('other_info',500)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accounts');
    }
}
