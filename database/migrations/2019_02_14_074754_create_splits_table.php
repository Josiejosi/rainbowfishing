<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSplitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('splits', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('status');
            $table->float('amount');
            $table->bigInteger('receiver_id')->unsigned();
            $table->bigInteger('sender_id')->unsigned();
            $table->bigInteger('order_id')->unsigned();

            $table->boolean('is_matured');
            $table->dateTime('matures_at');
            $table->dateTime('block_at')->nullable() ;

            $table->timestamps();

            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade') ;
            $table->foreign('receiver_id')->references('id')->on('users')->onDelete('cascade') ;
            $table->foreign('sender_id')->references('id')->on('users')->onDelete('cascade') ;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('splits');
    }
}
