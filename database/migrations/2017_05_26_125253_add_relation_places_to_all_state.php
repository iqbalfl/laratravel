<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelationPlacesToAllState extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('places', function (Blueprint $table) {
          $table->foreign('province_id')->references('id')->on('provinces')
          ->onUpdate('cascade')->onDelete('cascade');

          $table->foreign('regency_id')->references('id')->on('regencies')
          ->onUpdate('cascade')->onDelete('cascade');

          $table->foreign('district_id')->references('id')->on('districts')
          ->onUpdate('cascade')->onDelete('cascade');

          $table->foreign('village_id')->references('id')->on('villages')
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
        Schema::table('places', function (Blueprint $table) {
            //
        });
    }
}
