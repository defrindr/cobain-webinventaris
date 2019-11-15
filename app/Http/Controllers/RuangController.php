<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RuangModel;

class RuangController extends Controller
{
    protected $messages = [
            "required" => ":attribute tidak boleh kosong.",
            "numeric" => ":attribute hanya boleh berisi angka",
            "min" => ":attribute tidak boleh kurang dari :min.",
            "max" => ":attribute tidak boleh lebih dari :max."
        ];
    
    
    /**
     * 
     */
    public function index()
    {
        $ruang = RuangModel::orderBy('nama_ruang')
                    ->paginate(5);

        return view('ruang.index', [
                'ruang' => $ruang
            ]);
    }
    
    
    
    /**
     * 
     */
    public function create()
    {
        $kodeRuang = "";

        for ($i = 0; $i < 5; $i++) $kodeRuang .= random_int(0, 10);

        if (RuangModel::where(["kode_ruang" => $kodeRuang])->count() > 0) 
        {
            $this->create();
        } else 
        {
            return view('ruang.create', [
                'kodeRuang' => $kodeRuang
            ]);
        }
    }
    
    
    
    /**
     * 
     */
    public function store(Request $request)
    {
        $this->validate($request,[
                "nama_ruang" => "required|unique:ruang,nama_ruang",
                "kode_ruang" => "required|unique:ruang,kode_ruang",
                "keterangan" => "required",
            ],$this->messages);

        $ruang = new RuangModel([
                "nama_ruang" => $request->nama_ruang,
                "kode_ruang" => $request->kode_ruang,
                "keterangan" => $request->keterangan,
            ]);

        if ($ruang->save()) 
        {
            return redirect()
                ->route('ruang.index')
                ->with('success', 'Ruang berhasil ditambah');
        } else 
        {
            return redirect()
                ->route('ruang.index')
                ->with('error', 'Ruang gagal ditambah');
        }
    }
    
    
    
    /**
     * 
     */
    public function edit($id)
    {
        $ruang = RuangModel::findorFail($id);
        // var_dump($ruang);
        return view('ruang.update', [
                'ruang' => $ruang
            ]);
    }
    
    
    
    /**
     * 
     */
    public function update(Request $request)
    {
        $ruang = RuangModel::find($request->id);


        $this->validate($request, [
                "nama_ruang" => "required|unique:ruang,nama_ruang",
                "kode_ruang" => "required|unique:ruang,kode_ruang",
                "keterangan" => "required",
            ], $this->messages);

        $ruang->nama_ruang = $request->nama_ruang;
        $ruang->keterangan = $request->keterangan;

        if ($ruang->save()) 
        {
            return redirect()
                ->route('ruang.index')
                ->with('success', 'Ruang berhasil diubah');
        } else 
        {
            return redirect()
                ->route('ruang.index')
                ->with('error', 'Ruang gagal dubah');
        }
    }
    
    
    
    /**
     * 
     */
    public function delete($id)
    {
        $ruang = RuangModel::find($id);
        
        if ($ruang->delete()) 
        {
            return redirect()
                ->route('ruang.index')
                ->with('success', 'Ruang berhasil dihapus');
        } else 
        {
            return redirect()
                ->route('ruang.index')
                ->with('error', 'Ruang gagal dihapus');
        }
    }
}
