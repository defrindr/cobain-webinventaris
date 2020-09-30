<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RuangModel extends Model
{
    protected $table = "ruang";
    protected $hidden = ["id_ruang"];
    protected $fillable = [
        "nama_ruang",
        "kode_ruang",
        "keterangan"
    ];

    protected $cast = [
        "created_at" => "datetime",
        "updated_at" => "datetime"
    ];
}
