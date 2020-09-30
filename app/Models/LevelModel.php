<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LevelModel extends Model
{
    protected $table = "level";
    protected $hidden = ["id_level"];
    protected $fillable = [
        "nama_level",
    ];
}
