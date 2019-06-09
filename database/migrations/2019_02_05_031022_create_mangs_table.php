<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mangs', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('category_id')->unsigned();
            $table->string('name');
            $table->string('fees');
            $table->string('fee');

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mangs');
    }
}
