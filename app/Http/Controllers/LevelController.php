<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LevelModel;

class LevelController extends Controller
{
    protected $messages = [
            "required" => ":attribute tidak boleh kosong.",
            "numeric" => ":attribute hanya boleh berisi angka",
            "min" => ":attribute tidak boleh kurang dari :min.",
            "max" => ":attribute tidak boleh lebih dari :max."
        ];

    
    
    /**
     * Menampilkan Index
     */
    public function index()
    {
        $level = LevelModel::paginate(5);

        return view('level.index', ['level' => $level]);
    }



    /**
     * Menampilkan Form Create
     */
    public function create()
    {
        return view('level.create');
    }
    
    
    
    /**
     * Proses Menambahkan Data
     */
    public function store(Request $request)
    {
        $this->validate($request,[
                "nama_level" => "required|alpha"
            ]);

        $level = new LevelModel([
                "nama_level" => $request->nama_level,
            ]);

        if ($level->save()) 
        {
            return redirect()
                ->route('level.index')
                ->with('success', 'Level berhasil ditambah');
        } else 
        {
            return redirect()
                ->route('level.index')
                ->with('error', 'Level gagal ditambah');
        }
    }



    /**
     * Menampilkan Form Update
     */
    public function edit($id)
    {
        $level = LevelModel::findorFail($id);

        return view('level.update', [
                'level' => $level
            ]);
    }



    /**
     * Proses Mengubah Data
     */
    public function update(Request $request)
    {
        $this->validate($request, [
                "nama_level" => "required|alpha"
            ]);

        $level = LevelModel::find($request->id);
        $level->nama_level = $request->nama_level; 

        if ($level->save()) 
        {
            return redirect()
                ->route('level.index')
                ->with('success', 'Level berhasil diubah');
        } else 
        {
            return redirect()
                ->route('level.index')
                ->with('error', 'Level gagal dubah');
        }
    }



    /**
     * Proses Menghapus Data
     */
    public function delete($id)
    {
        $level = LevelModel::find($id);

        if ($level->delete()) 
        {
            return redirect()
                ->route('level.index')
                ->with('success', 'Level berhasil dihapus');
        } else 
        {
            return redirect()
                ->route('level.index')
                ->with('error', 'Level gagal dihapus');
        }
    }
}
