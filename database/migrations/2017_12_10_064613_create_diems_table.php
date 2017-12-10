<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diems', function (Blueprint $table) {
            $table->increments('id');
            $table->string('madiem',10)->unique();
            $table->integer('diemcc');
            $table->integer('diemtx');
            $table->integer('diemgk');
            $table->integer('diemck');
            $table->integer('diemtong');
            $table->integer('diemrl')->comment('điểm trèn luyện');
            $table->integer('HeSodiemcc');
            $table->integer('HeSodiemtx');
            $table->integer('HeSodiemgk');
            $table->integer('HeSodiemck');
            $table->integer('sinhvien_id')->unsigned();
            $table->foreign('sinhvien_id')->references('id')->on('sinhviens')->onDelete('cascade');

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
        Schema::dropIfExists('diems');
    }
}
