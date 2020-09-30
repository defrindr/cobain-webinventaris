<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
use App\Exports\PeminjamanExport;
use App\Exports\InventarisExport;
use App\Exports\JenisExport;
use App\Exports\RuangExport;



class ReportController extends Controller
{

	public function index(){
		return view('report.index');
	}

	function generateRdn(){
		return ceil(time()/random_int(1, 100)-random_int(1, 100))+time();
	}

	public function downloadReportPeminjaman(){
		return Excel::download(new PeminjamanExport,
			$this->fileName('peminjaman'));


	}

	public function downloadReportInventaris(){
		return Excel::download(new InventarisExport,
			$this->fileName('inventaris'));
	}

	public function downloadReportJenis(){
		return Excel::download(new JenisExport,
			$this->fileName('jenis'));
	}

	public function downloadReportRuang(){
		return Excel::download(new RuangExport,
			$this->fileName('ruang'));
	}


	function fileName($name){
		return $name.'-' . Date('dmY',time()) . '-' . $this->generateRdn() . '.xlsx';
	}

}
