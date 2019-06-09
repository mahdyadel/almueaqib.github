<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExternalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('externals', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('receipt_number');
            $table->string('name');
            $table->string('type_of_transaction');
            $table->integer('amount');
            $table->string('name_of_operator');
            $table->string('phone');
            $table->string('name_of_baptist');
            $table->date('duration_of_baptism');
            $table->enum('status', array('yes' , 'no'))->default('no');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('externals');
    }
}
