<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccessLog extends Model {
	protected $table = 'access_log';

	protected $fillable = [
		"tanggal_access",
		"ip",
		"methods",
		"path",
		"id_user"
	];



}