<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateSkalaBerkas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skala_berkas', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->nullable();
            $table->string('slug')->nullable();
            $table->timestamps();
        });

        DB::table('skala_berkas')->insert([
            [
                'nama' => 'Internasional',
                'slug' => 'internasional',                
            ],            
            [
                'nama' => 'Nasional',
                'slug' => 'nasional',                
            ],
            [
                'nama' => 'PT / Daerah',
                'slug' => 'daerah',                
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('skala_berkas');
    }
}
