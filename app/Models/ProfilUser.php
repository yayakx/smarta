<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class ProfilUser extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'profil_users';    

    public function prodi() {
        return $this->hasOne(\App\Models\ProdiUser ::class, 'id', 'prodi_id');
    }

    public function user() {
        return $this->hasOne(\App\Models\User ::class, 'id', 'user_id');
    }
}
