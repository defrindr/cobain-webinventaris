<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PeminjamanModel extends Model
{
    protected $table = "peminjaman";
    public $timestamps = false;
    protected $hidden = ["id_peminjaman"];
    protected $fillable = [
        "tanggal_pinjam",
        "tanggal_kembali",
        "status_peminjaman",
        "id_pegawai",
        "created_at",
        "updated_at"
    ];
    protected $casts = [
        "created_at" => "datetime",
        "updated_at" => "datetime"
    ];

    public function pegawai(){
        return $this->belongsTo('\App\Models\PegawaiModel','id_pegawai','id');
    }
    public function detailPinjam()
    {
        return $this->hasMany('\App\Models\DetailPinjamModel', 'id_peminjaman', 'id');
    }
}
