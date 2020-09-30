<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JenisModel extends Model
{
    protected $table= "jenis";
    protected $hidden = ["id_jenis"];
    protected $fillable = [
        "nama_jenis",
        "kode_jenis",
        "keterangan",
    ];
}
