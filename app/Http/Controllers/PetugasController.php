<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PetugasModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\LevelModel;
use App\Models\UserModel;

class PetugasController extends Controller
{

    protected $messages = [
            "required" => ":attribute tidak boleh kosong.",
            "numeric" => ":attribute hanya boleh berisi angka",
            "min" => ":attribute tidak boleh kurang dari :min.",
            "max" => ":attribute tidak boleh lebih dari :max."
        ];
    
    
    
    
    public function index()
    {
        $petugas = PetugasModel::paginate(5);

        return view('petugas.index', [
            'petugas' => $petugas
            ]);
    }
    
    
    
    
    public function create()
    {
        $level = LevelModel::where('nama_level','not like','Peminjam')
        ->get();

        return view('petugas.create',[
            'level' => $level
            ]);
    }
    
    
    
    
    public function store(Request $request)
    {
        DB::beginTransaction();

        $this->validate($request,[
                "username" => "required|min:8|max:32",
                "password" => "required|min:8",
                "id_level" => "required",
                "nama_petugas" => "required"
            ],$this->messages);

        $user = new UserModel([
                "username" => $request->username,
                "password" => Hash::make($request->password),
                "id_level" => $request->id_level,
            ]);

        if($user->save()){
            $user = UserModel::where([
                'username' => $request->username
                ])->get()[0];

            $petugas = new PetugasModel([
                "nama_petugas" => $request->nama_petugas,
                "id_user" => $user->id,
            ]);

            if ($petugas->save()) {
                DB::commit();
                return redirect()
                ->route('petugas.index')
                ->with('success', 'Petugas berhasil ditambah');
            } else {
                DB::rollBack();
                return redirect()
                ->route('petugas.index')
                ->with('error', 'Petugas gagal ditambah');
            }
        }else
        {
            DB::rollBack();
            return redirect()
            ->route('petugas.index')
            ->with('error', 'Petugas gagal ditambah');
        }
    }
    
    
    
    
    public function edit($id)
    {
        $petugas = PetugasModel::findorFail($id);
        $level = LevelModel::All();
        
        return view('petugas.update', [
            'petugas' => $petugas,'level'=>$level
            ]);
    }
    
    
    
    
    public function update(Request $request)
    {
        DB::beginTransaction();
        $petugas = PetugasModel::find($request->id);
        $user = UserModel::find($petugas->id_user);

        $user->username = $request->username;
        $user->password = ($request->password != "") ? Hash::make($request->password): $petugas->user->password;
        $user->id_level = $request->id_level;
        $petugas->nama_petugas = $request->nama_petugas;

        if ($user->save() && $petugas->save()) {
            DB::commit();
            return redirect()
            ->route('petugas.index')
            ->with('success', 'petugas berhasil diubah');
        } else {
            DB::rollBack();
            return redirect()
            ->route('petugas.index')
            ->with('error', 'petugas gagal dubah');
        }
    }
    
    
    
    
    public function delete($id)
    {
        DB::beginTransaction();
        $petugas = PetugasModel::find($id);
        $user = UserModel::find($petugas->id_user);
        // ! Jangan Kebalik , nanti error
        if ($petugas->delete() && $user->delete()) {
            DB::commit();
            return redirect()
            ->route('petugas.index')
            ->with('success', 'petugas berhasil dihapus');
        } else {
            DB::rollBack();
            return redirect()
            ->route('petugas.index')
            ->with('error', 'petugas gagal dihapus');
        }
    }
}
