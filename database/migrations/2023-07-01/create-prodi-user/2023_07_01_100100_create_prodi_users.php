<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateProdiUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prodi_users', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->nullable();
            $table->string('slug')->nullable();
            $table->timestamps();
        });

        DB::table('prodi_users')->insert([
            [
                'nama' => 'Pendidikan Bahasa dan Sastra Indonesia',
                'slug' => 'pendidikan-bahasa-dan-sastra-indonesia',                
            ],            
            [
                'nama' => 'Sastra Indonesia',
                'slug' => 'sastra-indonesia',                
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
        Schema::dropIfExists('prodi_users');
    }
}
