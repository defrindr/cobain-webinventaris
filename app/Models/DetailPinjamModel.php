<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailPinjamModel extends Model
{
    protected $table = "detail_pinjam";
    protected $hidden = ["id_detail_pinjam"];
    protected $fillable = [
        "id_inventaris",
        "id_peminjaman",
        "jumlah",
    ];

    public function inventaris()
    {
        return $this->belongsTo('\App\Models\InventarisModel','id_inventaris','id');
    }
    public function peminjaman()
    {
        return $this->belongsTo('\App\Models\PeminjamanModel', 'id_peminjaman', 'id');
    }
}
