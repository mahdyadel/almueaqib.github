<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('mandoob')->nullable();
            $table->enum('gender', array('male','female'));
            $table->enum('status', array('married','single'));
            $table->string('job');
            $table->string('Section');
            $table->date('birth_date');
            $table->string('address');
            $table->string('phone')->unique();
            $table->string('phone2')->unique()->nullable();
            $table->string('mobile')->unique();
            $table->string('mobile2')->unique()->nullable();
            $table->string('email')->unique();
            $table->string('salary');
            $table->integer('id_number')->unique();
            $table->date('start');
            $table->date('end');
            $table->string('image')->default('default.png');
            $table->string('image_scan')->default('scan.png');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
