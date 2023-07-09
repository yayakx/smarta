<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataBerkas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_berkas', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->string('judul')->nullable();
            $table->string('link')->nullable();
            $table->integer('kategori_id')->nullable();            
            $table->integer('skala_id')->nullable();      
            $table->integer('is_verified')->nullable();
            $table->timestamp('verified_at')->nullable();                  
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
        Schema::dropIfExists('data_berkas');
    }
}
