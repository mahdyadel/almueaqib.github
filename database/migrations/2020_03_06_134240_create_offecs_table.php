<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateoffecsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offecs', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('city');
            $table->string('phone1');
            $table->string('phone2');
            $table->string('mobile1');
            $table->string('mobile2');
            $table->integer('category_id')->unsigned();
            $table->string('branch');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');


            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offecs');
    }
}
