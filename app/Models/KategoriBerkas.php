<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class KategoriBerkas extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'kategori_berkas';    

    public function level_user() {
        return $this->hasOne(\App\Models\LevelUser ::class, 'id', 'level_user_id');
    }
}
