<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InventarisModel;
use App\Models\RuangModel;
use App\Models\JenisModel;
use App\Models\PetugasModel;

class InventarisController extends Controller
{
    protected $kondisi = [
            "Baik",
            "Rusak",
            "Hilang"
        ];

    protected $messages = [
            "required" => ":attribute tidak boleh kosong.",
            "numeric" => ":attribute hanya boleh berisi angka",
            "min" => ":attribute tidak boleh kurang dari :min.",
            "max" => ":attribute tidak boleh lebih dari :max."
        ];



    public function index()
    {
        $inventaris = InventarisModel::paginate(5);

        return view('inventaris.index', ['inventaris' => $inventaris]);
    }


    /**
     * Menampilkan Form Create
     */
    public function create()
    {
        $jenis = JenisModel::All();
        $petugas = PetugasModel::All();
        $ruang = RuangModel::All();
        return view('inventaris.create',[
                'jenis'=>$jenis,
                'petugas'=>$petugas,
                'ruang' =>$ruang,
                'kondisi' => $this->kondisi,
            ]);
    }



    /**
     * Proses Menambahkan Data
     */
    public function store(Request $request)
    {
        $this->validate($request,[
                "nama" => "required",
                "kondisi" => "required|alpha",
                "keterangan" => "required",
                "jumlah" => "required|min:1|numeric",
                "tanggal_register" => "required",
                "id_jenis" => "required|numeric",
                "id_ruang" => "required|numeric",
            ],$this->messages);

        $jenis = JenisModel::findOrFail($request->id_jenis);
        $ruang = RuangModel::findOrFail($request->id_ruang);

        $inventaris = new InventarisModel([
            "nama" => $request->nama,
            "kondisi" => $request->kondisi,
            "keterangan" => $request->keterangan,
            "jumlah" => $request->jumlah,
            "tanggal_register" => $request->tanggal_register,
            "kode_inventaris" => Date('d',strtotime(now())).Date('m',strtotime(now())).Date('Y',strtotime(now()))."-J". $jenis->kode_jenis."-R". $ruang->kode_ruang."-P".\Auth::user()->petugas->id."-B".random_int(0,100),
            "id_jenis" => $request->id_jenis,
            "id_ruang" => $request->id_ruang,
            "id_petugas" => \Auth::user()->petugas->id,
            ]);


        if ($inventaris->save()) 
        {
            return redirect()
                ->route('inventaris.index')
                ->with('success', 'Jenis berhasil ditambah');
        } else 
        {
            return redirect()
                ->route('inventaris.index')
                ->with('error', 'Jenis gagal ditambah');
        }
    }




    /**
     * Menampilkan Form Update
     */
    public function edit($id)
    {
        $inventaris = InventarisModel::find($id);
        $jenis = JenisModel::All();
        $petugas = PetugasModel::All();
        $ruang = RuangModel::All();

        return view('inventaris.update', [
                'inventaris' => $inventaris,
                'jenis' => $jenis,
                'petugas' => $petugas,
                'ruang' => $ruang,
                'kondisi' => $this->kondisi
            ]);
    }



    /**
     * Proses Meng-update data
     */
    public function update(Request $request)
    {
        $inventaris = InventarisModel::findOrFail($request->id);

        // Validasi Input
        $this->validate($request, [
                "nama" => "required",
                "kondisi" => "required|alpha",
                "keterangan" => "required",
                "jumlah" => "required|min:1|numeric",
                "tanggal_register" => "required",
                "id_jenis" => "required|numeric",
                "id_ruang" => "required|numeric",
            ], $this->messages);


        $jenis = JenisModel::findOrFail($request->id_jenis);
        $ruang = RuangModel::findOrFail($request->id_ruang);

        $inventaris->nama = $request->nama;
        $inventaris->kondisi = $request->kondisi;
        $inventaris->keterangan = $request->keterangan;
        $inventaris->jumlah = $request->jumlah;
        $inventaris->tanggal_register = $request->tanggal_register;
        $inventaris->kode_inventaris = "J". $jenis->kode_jenis."-R". $ruang->kode_ruang;
        $inventaris->id_jenis = $request->id_jenis;
        $inventaris->id_ruang = $request->id_ruang;
        $inventaris->id_petugas = \Auth::user()->petugas->id;

        if ($inventaris->save()) 
        {
            return redirect()
                ->route('inventaris.index')
                ->with('success', 'Jenis berhasil diubah');
        } else 
        {
            return redirect()
                ->route('inventaris.index')
                ->with('error', 'Jenis gagal dubah');
        }
    }



    /**
     * Proses Menghapus data
     */
    public function delete($id)
    {
        $inventaris = InventarisModel::find($id);
        if ($inventaris->delete()) 
        {
            return redirect()
                ->route('inventaris.index')
                ->with('success', 'Jenis berhasil dihapus');
        } else 
        {
            return redirect()
                ->route('inventaris.index')
                ->with('error', 'Jenis gagal dihapus');
        }
    }
}
