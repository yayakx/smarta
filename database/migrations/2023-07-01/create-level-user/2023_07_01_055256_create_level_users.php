<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateLevelUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('level_users', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('slug');
            $table->timestamps();
        });

        DB::table('level_users')->insert([
            [
                'nama' => 'Mahasiswa',
                'slug' => 'mahasiswa',                
            ],
            [
                'nama' => 'Dosen',
                'slug' => 'dosen',                
            ],
            [
                'nama' => 'Tendik',
                'slug' => 'tendik',                
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
        Schema::dropIfExists('level_users');
    }
}
