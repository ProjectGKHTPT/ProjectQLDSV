<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lops', function (Blueprint $table) {
            $table->increments('id');
            $table->string('malop',10)->unique();
            $table->string('tenlopvt');
            $table->string('tenlop');
            $table->integer('khoa_id')->unsigned();
            $table->foreign('khoa_id')->references('id')->on('khoas')->onDelete('cascade');
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
        Schema::dropIfExists('lops');
    }
}
