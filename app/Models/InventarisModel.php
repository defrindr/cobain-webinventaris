<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InventarisModel extends Model
{
    protected $table = "inventaris";
    protected $hidden = ["id_inventaris"];
    protected $fillable = [
        "nama",
        "kondisi",
        "keterangan",
        "jumlah",
        "tanggal_register",
        "kode_inventaris",
        "id_jenis",
        "id_ruang",
        "id_petugas"
    ];
    protected $casts = [
        "created_at" => "datetime",
        "updated_at" => "datetime",
    ];

    public function ruang()
    {
        return $this->belongsTo('\App\Models\RuangModel', 'id_ruang', 'id');
    }

    public function jenis()
    {
        return $this->belongsTo('\App\Models\JenisModel', 'id_jenis', 'id');
    }

    public function petugas()
    {
        return $this->belongsTo('\App\Models\PetugasModel', 'id_petugas', 'id');
    }
}
