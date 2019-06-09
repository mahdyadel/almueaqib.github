<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReceiptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receipts', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->enum('Payment_method', array('بطاقة مدى ','بطاقة فيزا','تحويل بنكى','نقدا'));
            $table->string('salary');
            $table->string('bank_name');
            $table->text('about')->nullable();
            $table->integer('transfer_number');
            $table->string('num_saned');
            $table->integer('client_id')->unsigned();

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
