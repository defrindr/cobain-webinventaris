<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\InventarisModel;
use App\Models\RuangModel;
use App\Models\DetailPinjamModel;
use App\Models\PeminjamanModel;
use App\Models\JenisModel;

class JenisExport implements FromArray,WithHeadings
{

	public function headings(): array
    {
        return [
            '#',
            'Nama Jenis',
            'Kode Jenis',
            'Keterangan',
        ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function array(): array
    {

		$jenis_data = JenisModel::orderBy('created_at','DESC')->get();
		$jenis= [];
		$no = 1;

		foreach ($jenis_data as $row) {



			$jenis[] = [
				"Nomer" => $no,
            	'Nama Jenis' => $row->nama_jenis,
            	'Kode Jenis' => $row->kode_jenis,
            	'Keterangan' => $row->keterangan,
			];
			$no++;
		}



        return $jenis;
    }
}
