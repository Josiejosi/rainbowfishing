<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            
            $table->bigIncrements('id');
            $table->string('bank');
            $table->string('account_holder');
            $table->string('account_number');
            $table->string('branch_code');
            $table->string('branch_number');

            $table->bigInteger('user_id')->unsigned();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade') ;

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
