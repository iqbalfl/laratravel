<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('places', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->string('image')->nullable();
            $table->integer('category_id')->unsigned();
            $table->char('province_id',2);
            $table->char('regency_id',4);
            $table->char('district_id',7);
            $table->char('village_id',10);
            $table->decimal('cost',12,2);
            $table->integer('admin_id')->unsigned();
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories')
            ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Revers->unsigned()e the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('places');
    }
}
