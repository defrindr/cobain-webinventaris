<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PetugasModel extends Model
{
    protected $table = "petugas";
    protected $hidden = ["id_petugas"];
    protected $fillable = [
        "nama_petugas",
        "id_user",
    ];

    protected $casts = [
        "tanggal_pinjam" => "date",
        "tanggal_kembali" => "date"
    ];
    
    public function user(){
        return $this->BelongsTo('App\Models\UserModel','id_user','id');
    }
}
