<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\PegawaiModel;
use App\Models\UserModel;

class PegawaiController extends Controller
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
        $pegawai = PegawaiModel::paginate(5);


        return view('pegawai.index', [
                'pegawai' => $pegawai
            ]);
    }



    /**
     * Menampilkan Form Create
     */
    public function create()
    {
        $nip = "";

        for ($i = 0; $i < 16; $i++) $nip .= random_int(0, 9);

        if (PegawaiModel::where(["nip" => $nip])->count() > 0) 
        {
            $this->create();
        } else {
            return view('pegawai.create',[
                    'nip' => $nip,
                ]);
        }
    }



    /**
     * Proses Menambahkan Data
     */
    public function store(Request $request)
    {
        DB::beginTransaction();

        $this->validate($request,[
                "username" => "required|alpha_num",
                "password" => "required",
                "nama_pegawai" => "required",
                "nip" => "required|numeric",
                "alamat" => "required",
            ]);

        $user = new UserModel([
                "username" => $request->username,
                "password" => Hash::make($request->password),
                "id_level" => DB::table('level')
                    ->select('id')
                    ->where(['nama_level' => 'peminjam'])
                    ->get()[0]->id,
            ]);

        if ($user->save()) 
        {
            $user = UserModel::where(['username' => $request->username])->get();
            foreach ($user as $row) 
            {
                $user = $row;
            }
            $pegawai = new PegawaiModel([
                    "nama_pegawai" => $request->nama_pegawai,
                    "nip" => $request->nip,
                    "alamat" => $request->alamat,
                    "id_user" => $user->id,
                    "status" => 0,
                ]);
            if ($pegawai->save()) 
            {
                DB::commit();
                return redirect()
                    ->route('pegawai.index')
                    ->with('success', 'Pegawai berhasil ditambah');
            } else 
            {
                DB::rollBack();
                return redirect()
                    ->route('pegawai.index')
                    ->with('error', 'Pegawai gagal ditambah');
            }
        } else 
        {
            DB::rollBack();
            return redirect()
                ->route('pegawai.index')
                ->with('error', 'Pegawai gagal ditambah');
        }
    }



    /**
     * Menampilkan Form Update
     */
    public function edit($id)
    {
        $pegawai = PegawaiModel::findorFail($id);
        return view('pegawai.update', ['pegawai' => $pegawai]);
    }



    /**
     * Proses Mengupdate Data
     */
    public function update(Request $request)
    {
        DB::beginTransaction();

        $pegawai = PegawaiModel::find($request->id);
        $user = UserModel::find($pegawai->id_user);

        $this->validate($request, [
                "username" => "required|alpha_num",
                "nama_pegawai" => "required",
                "alamat" => "required",
            ]);

        $user->username = $request->username;
        $user->password = ($request->password != "") ? Hash::make($request->password) : $pegawai->user->password;

        $pegawai->nama_pegawai = $request->nama_pegawai;
        $pegawai->alamat = $request->alamat;

        if ($user->save() && $pegawai->save()) 
        {
            DB::commit();
            return redirect()
                ->route('pegawai.index')
                ->with('success', 'Pegawai berhasil diubah');
        } else 
        {
            DB::rollback();
            return redirect()
                ->route('pegawai.index')
                ->with('error', 'Pegawai gagal dubah');
        }
    }



    /**
     * Proses Menghapus Data
     */
    public function delete($id)
    {
        $pegawai = PegawaiModel::find($id);
        $user = UserModel::find($pegawai->id_user);

        if ($pegawai->delete() && $user->delete()) 
        {
            return redirect()
                ->route('pegawai.index')
                ->with('success', 'Pegawai berhasil dihapus');
        } else 
        {
            return redirect()
                ->route('pegawai.index')
                ->with('error', 'Pegawai gagal dihapus');
        }
    }

    public function switchStatusAccount(Request $r,$id){
        $pegawai = PegawaiModel::findOrFail($id);
        $messages = "";

        if($pegawai->status){
            $pegawai->status = 0;
            $messages = "tidak aktif";
            $pegawai->update();
        }else{
            $pegawai->status = 1;
            $messages = "aktif";
            $pegawai->update();
        }
        return redirect()->route('pegawai.index')
                ->with('success','Status pegawai diubah menjadi "'.$messages.'"');
    }
}
