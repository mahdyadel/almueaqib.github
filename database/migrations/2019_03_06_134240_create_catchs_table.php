<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCatchsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catchs', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('salary');
            $table->decimal('ratio');
            $table->decimal('commission');
            $table->decimal('dareba');
            $table->text('about')->nullable();
            $table->string('num_saned');
            $table->integer('client_id')->unsigned();
            $table->enum('Payment_method', array('بطاقة مدى ','بطاقة فيزا','تحويل بنكى','نقدا'));



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('catchs');
    }
}
