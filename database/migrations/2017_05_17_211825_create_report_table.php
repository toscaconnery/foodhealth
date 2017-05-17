<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Title')->unique();
            $table->string('Description')->nullable();
            $table->string('ImagePath')->nullable();
            $table->decimal('Longitude')->nullable();
            $table->decimal('Latitude')->nullable();
            $table->boolean('IsValidated')->nullable();
            $table->integer('Staff')->nullable();
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
        Schema::drop('report');    }
}
