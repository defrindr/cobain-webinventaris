<?php

namespace App\Http\Controllers\Apis;

use App\Models\InventarisModel;
use App\Models\RuangModel;
use App\Models\JenisModel;
use Illuminate\Http\Request;



class InventarisController extends Controller
{
    public function index($id)
    {
        $inventaris = InventarisModel::find($id);
        return response()->json($inventaris);
    }
    
    public function cat(Request $r)
    {
        $inventaris = InventarisModel::where([
        	"id_jenis" => $r->id_jenis,
        	"id_ruang" => $r->id_ruang])->get();

        if(count($inventaris) > 0){
        	$invent = [
        		[
        			"id" => 0,
        			"nama" => "-- Pilih Inventaris --"
        		]
        	];

        	foreach ($inventaris as $i) {
        		array_push($invent, [
        			"id" => $i->id,
        			"nama" => $i->nama]);
        	}
        	return response()->json($invent);
        }else {
        	return response()->json([
        		"id" => "0",
        		"nama" => "Data tidak ditemukan"]);
        }
    }

    public function jenis($id){
    	$jenis = JenisModel::orderBy('created_at','DESC')->get();
	    $jenisPush = [
	    	[
	    		"id" => 0,
	    		"nama" => "-- Pilih Jenis --",
	    		"item" => 0,
	    	]
	    ];

		if(count($jenis) > 0){
			foreach ($jenis as $jen) {
				// dd($jen);
	    		$inventaris = InventarisModel::where([
	    			"id_ruang" => $id,
	    			"id_jenis" => $jen->id])->get();
		        array_push($jenisPush, [
		        	"id" => $jen->id,
		        	"nama" => $jen->nama_jenis,
		        	"item" => count($inventaris)]);
			}
			return response()->json($jenisPush);
		}
    }
}
