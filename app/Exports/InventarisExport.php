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

class InventarisExport implements FromArray,WithHeadings
{

	public function headings(): array
    {
        return [
            '#',
            'Nama Barang',
            'Kondisi',
            'keterangan',
            'Jumlah Tersedia',
            'Jumlah Dipinjam',
            'Jumlah Total',
            'Tanggal Register',
            'Kode Inventaris',
            'Kode Ruang',
            'Kode Jenis'
        ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function array(): array
    {

		$Inventaris_data = InventarisModel::orderBy('updated_at','DESC')->get();
		$invent_arr= [];
		$no = 1;

		foreach ($Inventaris_data as $row) {
			$jml_dipinjam = 0;
			$jml_total = 0;
			$ruang = RuangModel::findOrFail($row->id_ruang)->nama_ruang;
			$jenis = JenisModel::findOrFail($row->id_jenis)->nama_jenis;
			$detPinjam = DetailPinjamModel::where(['id_inventaris' => $row->id])->get();


			foreach ($detPinjam as $rowPinjam) {
				$pinjamCheck = PeminjamanModel::findOrFail($rowPinjam->id_peminjaman);
				// jika barang belum dikembalikan
				if($pinjamCheck->status_peminjaman != 3) $jml_dipinjam += $rowPinjam->jumlah;
			}

			$jml_total = $row->jumlah + $jml_dipinjam;




			$invent_arr[] = [
				"Nomer" => $no,
	            'Nama Barang' => $row->nama ,
	            'Kondisi' => $row->kondisi ,
	            'keterangan' => $row->keterangan ,
	            'Jumlah Tersedia' => ($row->jumlah == 0) ? "0" : $row->jumlah ,
	            'Jumlah Dipinjam' => ($jml_dipinjam == 0) ? "0" : $jml_dipinjam,
	            'Jumlah Total' => ($jml_total==0) ? "0" : $jml_total ,
	            'Tanggal Register' => $row->tanggal_register ,
	            'Kode Inventaris' => $row->kode_inventaris ,
	            'Kode Ruang' => $ruang ,
	            'Kode Jenis' => $jenis 
			];
			$no++;
		}



        return $invent_arr;
    }
}
