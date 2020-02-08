<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\InventarisModel;
use App\Models\RuangModel;
use App\Models\DetailPinjamModel;
use App\Models\PeminjamanModel;

class RuangExport implements FromArray,WithHeadings
{

	public function headings(): array
    {
        return [
            '#',
            'Nama Ruang',
            'Kode Ruang',
            'Keterangan',
        ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function array(): array
    {

		$Ruang_data = RuangModel::orderBy('created_at','DESC')->get();
		$Ruang= [];
		$no = 1;

		foreach ($Ruang_data as $row) {



			$Ruang[] = [
				"Nomer" => $no,
            	'Nama Ruang' => $row->nama_ruang,
            	'Kode Ruang' => $row->kode_ruang,
            	'Keterangan' => $row->keterangan,
			];
			$no++;
		}



        return $Ruang;
    }
}
