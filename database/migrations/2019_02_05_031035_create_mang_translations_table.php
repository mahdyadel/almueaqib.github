<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMangTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mang_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('mang_id')->unsigned();
            $table->string('name');
            $table->string('locale')->index();

            $table->unique(['mang_id', 'locale']);
            $table->foreign('mang_id')->references('id')->on('mangs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mang_translations');
    }
}
