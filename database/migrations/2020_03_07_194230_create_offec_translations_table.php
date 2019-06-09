<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Offec;

class CreateOffecTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offec_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('offec_id')->unsigned();
            $table->string('name');
            $table->string('locale')->index();
            $table->unique(['offec_id', 'locale']);
            $table->foreign('offec_id')->references('id')->on('offecs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offec_translations');
    }
}
