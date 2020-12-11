<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataRukunWargaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_rukun_warga', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('number');
            $table->bigInteger('dusun_id')->nullable()->unsigned();
            $table->bigInteger('user_id')->nullable()->unsigned();
            $table->timestamps();
			
			$table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
			$table->foreign('dusun_id')->references('id')->on('data_dusun')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_rukun_warga');
    }
}
