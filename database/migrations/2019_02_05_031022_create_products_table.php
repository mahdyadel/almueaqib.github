<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('num_saned');
            $table->string('number');
            $table->integer('category_id')->unsigned();
            $table->integer('client_id')->unsigned();
            $table->integer('cashier_id')->unsigned();
            $table->string('type_of_transaction');
            $table->decimal('fees');
            $table->decimal('fee');
            $table->integer('other_fees');
            $table->integer('other_fee');
            $table->enum('status', ['yes','no'])->default('no');
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
        Schema::dropIfExists('products');
    }
}
