<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class DataBerkas extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'data_berkas';    

    public function kategori() {
        return $this->hasOne(\App\Models\KategoriBerkas ::class, 'id', 'kategori_id');
    }

    public function skala() {
        return $this->hasOne(\App\Models\SkalaBerkas ::class, 'id', 'skala_id');
    }

    public function user() {
        return $this->hasOne(\App\Models\User ::class, 'id', 'user_id');
    }
}
