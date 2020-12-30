<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carousels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('image');
            $table->text('content');
            $table->timestamps();
        });
		
        Schema::create('set_visimisi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('content');
            $table->timestamps();
        });
		
        Schema::create('aparatur', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('image');
            $table->string('name');
            $table->string('position');
            $table->timestamps();
        });
		
        Schema::create('settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('A')->nullable();
            $table->text('B')->nullable();
            $table->text('C')->nullable();
            $table->text('D')->nullable();
            $table->text('E')->nullable();
            $table->text('F')->nullable();
            $table->text('G')->nullable();
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
        Schema::dropIfExists('carousels');
        Schema::dropIfExists('set_visimisi');
        Schema::dropIfExists('aparatur');
        Schema::dropIfExists('settings');
    }
}
