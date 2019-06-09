<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSadadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sadads', function (Blueprint $table) {
            $table->increments('id');
            $table->string('num_saned');
            $table->string('number');
            $table->integer('category_id')->unsigned();
            $table->integer('client_id')->unsigned();
            $table->integer('cashier_id')->unsigned();
            $table->string('type_of_transaction');
            $table->decimal('fees');
            $table->enum('status', ['yes','no'])->default('no');
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sadads');
    }
}
