<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Catchs;

class CreateCatchTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catch_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('catch_id')->unsigned();
            $table->string('type_of_transaction');
            $table->string('locale')->index();
            $table->unique(['catch_id', 'locale']);
            $table->foreign('catch_id')->references('id')->on('catchs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('catch_translations');
    }
}
