<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PegawaiModel extends Model
{
    protected $table = "pegawai";
    protected $hidden = ["id_pegawai"];
    protected $fillable = [
        "nama_pegawai",
        "nip",
        "alamat",
        "status",
        'id_user'
    ];

    protected $casts = [
        "tanggal_pinjam" => "date",
        "tanggal_kembali" => "date"
    ];

    
    public function user()
    {
        return $this->BelongsTo('App\Models\UserModel', 'id_user', 'id');
    }
}
