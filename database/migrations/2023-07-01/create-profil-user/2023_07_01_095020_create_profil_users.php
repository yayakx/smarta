<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profil_users', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->integer('nomor_induk')->nullable();
            $table->string('nama')->nullable();
            $table->string('slug')->nullable();
            $table->string('jk')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->string('tanggal_lahir')->nullable();
            $table->integer('nik')->nullable();
            $table->string('agama')->nullable();
            $table->string('email')->nullable();
            $table->string('alamat')->nullable();
            $table->string('no_telp')->nullable();
            $table->integer('prodi_id')->nullable();
            $table->integer('angkatan')->nullable();
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
        Schema::dropIfExists('profil_users');
    }
}
