<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfirmationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::create('confirmations', function (Blueprint $table) {
             $table->increments('id');
             $table->integer('transaction_id')->unsigned();
             $table->string('payment_method');
             $table->string('info');
             $table->decimal('paid_total',12,2);
             $table->string('image')->nullable();
             $table->string('status')->default('pending');
             $table->timestamps();

             $table->foreign('transaction_id')->references('id')->on('transactions')
             ->onUpdate('cascade')->onDelete('cascade');
         });
     }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('confirmations');
    }
}
