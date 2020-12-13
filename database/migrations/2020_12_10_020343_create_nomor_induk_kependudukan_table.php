<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNomorIndukKependudukanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nomor_induk_kependudukan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->nullable()->unsigned();
            $table->bigInteger('father_id')->nullable()->unsigned();
            $table->bigInteger('mother_id')->nullable()->unsigned();
            $table->string('code')->unique();
            $table->string('place_of_birth');
            $table->dateTime('date_of_birth');
            $table->string('gender');
            $table->string('blood_type')->nullable();
            $table->string('address');
            $table->bigInteger('dusun_id')->nullable()->unsigned();
            $table->bigInteger('rukun_warga_id')->nullable()->unsigned();
            $table->bigInteger('rukun_tetangga_id')->nullable()->unsigned();
            $table->string('religion')->nullable();
            $table->string('married_status')->nullable();
            $table->string('job_status')->nullable();
            $table->timestamps();
			
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
			$table->foreign('father_id')->references('id')->on('users')->onDelete('set null');
			$table->foreign('mother_id')->references('id')->on('users')->onDelete('set null');
			$table->foreign('dusun_id')->references('id')->on('data_dusun')->onDelete('set null');
			$table->foreign('rukun_warga_id')->references('id')->on('data_rukun_warga')->onDelete('set null');
			$table->foreign('rukun_tetangga_id')->references('id')->on('data_rukun_tetangga')->onDelete('set null');
        });
        
        Schema::table('users', function (Blueprint $table) {
            $table->string('email')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nomor_induk_kependudukan');
    }
}
