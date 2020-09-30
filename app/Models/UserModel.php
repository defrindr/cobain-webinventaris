<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class UserModel extends Authenticatable
{
    protected $table= "user";
    protected $hidden = ["id"];
    protected $fillable = [
        "username",
        "password",
        "id_level",
    ];

    protected $cast = [
        "created_at" => "datetime",
        "updated_at" => "datetime"
    ];

    public function level(){
        return $this->belongsTo('\App\Models\LevelModel','id_level','id');
    }

    public function petugas(){
        return $this->belongsTo('\App\Models\PetugasModel', 'id', 'id_user');
    }

    public function pegawai()
    {
        return $this->belongsTo('\App\Models\PegawaiModel', 'id', 'id_user');
    }
}
