<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBaptistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('baptists', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name1');
            $table->string('name2');
            $table->string('phone1');
            $table->string('phone2');
            $table->string('num_saned');
            $table->string('mobile1');
            $table->string('mobile2');
            $table->string('account1');
            $table->string('account2');
            $table->string('bank1');
            $table->string('bank2');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('baptists');
    }
}
