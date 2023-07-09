<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateKategoriBerkas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kategori_berkas', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->nullable();
            $table->string('slug')->nullable();
            $table->string('level_user_id')->nullable();
            $table->timestamps();
        });

        DB::table('kategori_berkas')->insert([
            [
                'nama' => 'Penelitian',
                'slug' => 'penelitian',     
                'level_user_id' => '2',           
            ],            
            [
                'nama' => 'PKM',
                'slug' => 'pkm',     
                'level_user_id' => '2',           
            ],   
            [
                'nama' => 'Artikel',
                'slug' => 'artikel ',     
                'level_user_id' => '2',           
            ],   
            [
                'nama' => 'Haki',
                'slug' => 'haki',     
                'level_user_id' => '2',           
            ],   
            [
                'nama' => 'Buku',
                'slug' => 'buku',     
                'level_user_id' => '2',           
            ],   
            [
                'nama' => 'Prestasi',
                'slug' => 'prestasi',     
                'level_user_id' => '2',           
            ],   
            [
                'nama' => 'Prestasi',
                'slug' => 'prestasi',     
                'level_user_id' => '1',           
            ],   
            [
                'nama' => 'Karya / Haki',
                'slug' => 'karya',     
                'level_user_id' => '1',           
            ],   
            [
                'nama' => 'Pelatihan',
                'slug' => 'pelatihan',     
                'level_user_id' => '3',           
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
        Schema::dropIfExists('kategori_berkas');
    }
}
