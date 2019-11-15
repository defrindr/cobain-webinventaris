<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisModel;

class JenisController extends Controller
{
    protected $messages = [
            "required" => ":attribute tidak boleh kosong.",
            "numeric" => ":attribute hanya boleh berisi angka",
            "min" => ":attribute tidak boleh kurang dari :min.",
            "max" => ":attribute tidak boleh lebih dari :max.",
            "unique" => ":attribute telah digunakan."
        ];



    /**
     * Menampilkan Index
     */
    public function index()
    {
        $jenis = JenisModel::paginate(5);

        return view('jenis.index',[
                'jenis' => $jenis
            ]);
    }



    /**
     * Menampilkan Form Create
     */
    public function create()
    {
        $kodeJenis = "";
        
        for($i=0;$i<5;$i++) $kodeJenis .= random_int(0,10);
        
        if(JenisModel::where(["kode_jenis"=>$kodeJenis])->count() > 0){
            $this->create();
        }else {
            return view('jenis.create', [
                    'kodeJenis' => $kodeJenis
                ]);
        }
    }



    /**
     * Proses Menambahkan Data
     */
    public function store(Request $request)
    {
        $this->validate($request,[
                "nama_jenis" => "required|unique:jenis,nama_jenis",
                "kode_jenis" => "required|numeric",
                "keterangan" => "required",
            ]);

        $jenis = new JenisModel([
                "nama_jenis" => $request->nama_jenis,
                "kode_jenis" => $request->kode_jenis,
                "keterangan" => $request->keterangan,
            ]);

        if ($jenis->save())
        {
            return redirect()
                ->route('jenis.index')
                ->with('success','Jenis berhasil ditambah');
        } else 
        {
            return redirect()
                ->route('jenis.index')
                ->with('error', 'Jenis gagal ditambah');
        }
    }



    /**
     * Menampilkan Form Update
     */
    public function edit($id)
    {
        $jenis = JenisModel::findorFail($id);
        
        return view('jenis.update',[
                'jenis'=>$jenis
            ]);
    }



    /**
     * Proses Mengubah Data
     */
    public function update(Request $request)
    {
        $jenis = JenisModel::find($request->id);

        $this->validate($request, [
                "nama_jenis" => "required",
                "kode_jenis" => "required|numeric",
                "keterangan" => "required",
            ]);

        $jenis->nama_jenis = $request->nama_jenis;
        $jenis->kode_jenis = $request->kode_jenis;
        $jenis->keterangan = $request->keterangan;

        if($jenis->save())
        {
            return redirect()
                ->route('jenis.index')
                ->with('success', 'Jenis berhasil diubah');
        } else 
        {
            return redirect()
                ->route('jenis.index')
                ->with('error', 'Jenis gagal dubah');
        }
    }



    /**
     * Proses Hapus Data
     */
    public function delete($id)
    {
        $jenis = JenisModel::find($id);

        if ($jenis->delete()) {
            return redirect()
                ->route('jenis.index')
                ->with('success', 'Jenis berhasil dihapus');
        } else 
        {
            return redirect()
                ->route('jenis.index')
                ->with('error', 'Jenis gagal dihapus');
        }
    }
}
