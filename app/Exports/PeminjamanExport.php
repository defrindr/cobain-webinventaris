<?php

namespace App\Exports;

use App\Models\JenisModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\PeminjamanModel;
use App\Models\PegawaiModel;

class PeminjamanExport implements FromArray,WithHeadings
{

	public function headings(): array
    {
        return [
            '#',
            'Tanggal Pinjam',
            'Tanggal Kembali',
            'Peminjam',
            'Status Pinjam'
        ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function array(): array
    {

		$peminjaman_data = PeminjamanModel::orderBy('created_at','DESC')->get();
		$peminjaman_arr= [];
		$no = 1;

		foreach ($peminjaman_data as $row) {
			$status = "";
			switch ($row->status_peminjaman) {
				case 0:
					$status = "Request Peminjaman";
					break;
				case 1:
					$status = "Peminjaman";
					break;
				case 2:
					$status = "Request Pengembalian";
					break;
				case 3:
					$status = "Telah Dikembalikan";
					break;
				default:
					break;
			}
			
			$peminjaman_arr[] = [
				"Nomer" => $no,
				"Tanggal Pinjam" => $row->tanggal_pinjam,
				"Tanggal Kembali" => ($row->tanggal_kembali != null) ? $row->tanggal_kembali : "Belum Dikembalikan",
				"Peminjam" => PegawaiModel::findOrFail($row->id_pegawai)->nama_pegawai,
				"Status Peminjaman" => $status,
			];
			$no++;
		}


        return $peminjaman_arr;
    }
}
