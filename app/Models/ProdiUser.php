<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class ProdiUser extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'prodi_users';    

    public function profil() {
        return $this->hasMany(\App\Models\ProfilUser ::class, 'prodi_id', 'id');
    }

}
