<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\PeminjamanModel;
use App\Models\PegawaiModel;
use App\Models\DetailPinjamModel;
use App\Models\InventarisModel;

class PeminjamanController extends Controller
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
        if(\Auth::user()
        ->level->nama_level == "Peminjam")
        {
            $peminjaman = PeminjamanModel::where(['status_peminjaman' => 0,"id_pegawai"=>\Auth::user()
            ->pegawai->id])
            ->orderBy('updated_at','DESC')
            ->paginate(5);
        } else
        {
            $peminjaman = PeminjamanModel::where(['status_peminjaman' => 0])
            ->orderBy('updated_at','DESC')
            ->paginate(5);
        }

        return view('peminjaman.index', [
            'peminjaman' => $peminjaman
        ]);
    }

    /**
     * Menamilkan Data yang telah di accept
     */
    public function IndexAcceptPinjam()
    {
        if (\Auth::user()
        ->level->nama_level == "Peminjam") 
        {
            $peminjaman = PeminjamanModel::where(['status_peminjaman' => 1, "id_pegawai" => \Auth::user()
            ->pegawai->id])
            ->orderBy('updated_at', 'DESC')
            ->paginate(5);
        } else 
        {
            $peminjaman = PeminjamanModel::where(['status_peminjaman' => 1])
            ->orderBy('updated_at', 'DESC')
            ->paginate(5);
        }

        return view('peminjaman.acc-pinjam', [
                'peminjaman' => $peminjaman,
            ]);
    }


    /**
     * Menamilkan History
     */
    public function IndexRequestKembali()
    {
        if (\Auth::user()
        ->level->nama_level == "Peminjam") 
        {
            $peminjaman = PeminjamanModel::where(['status_peminjaman' => 2, "id_pegawai" => \Auth::user()
            ->pegawai->id])
            ->orderBy('updated_at', 'DESC')
            ->paginate(5);
        } else 
        {
            $peminjaman = PeminjamanModel::where(['status_peminjaman' => 2])
            ->orderBy('updated_at', 'DESC')
            ->paginate(5);
        }

        return view('peminjaman.req-kembali', [
                'peminjaman' => $peminjaman,
            ]);
    }




    /**
     * Menamilkan History
     */
    public function IndexHistory()
    {
        if (\Auth::user()
        ->level->nama_level == "Peminjam") 
        {
            $peminjaman = PeminjamanModel::where(['status_peminjaman' => 3, "id_pegawai" => \Auth::user()
            ->pegawai->id])
            ->orderBy('updated_at', 'DESC')
            ->paginate(5);
        } else 
        {
            $peminjaman = PeminjamanModel::where(['status_peminjaman' => 3])
            ->orderBy('updated_at', 'DESC')
            ->paginate(5);
        }

        return view('peminjaman.history', [
                'peminjaman' => $peminjaman,
            ]);
    }



    /**
     * 
     */
    public function create()
    {
        $pegawai = PegawaiModel::all(); 

        return view('peminjaman.create',[
                'pegawai' => $pegawai
            ]);
    }



    /**
     * 
     */
    public function store(Request $request)
    {
        $peminjaman = new PeminjamanModel([
                "tanggal_pinjam" => $request->tanggal_pinjam,
                "tanggal_kembali" => $request->tanggal_kembali,
                "status_peminjaman" => 0, 
                "id_pegawai" => $request->id_pegawai,
                "created_at" => date('Y-m-d H:i:s',time()),
                "updated_at" => date('Y-m-d H:i:s',time())
            ]);

        if ($peminjaman->save()) 
        {
            return redirect()
                ->route('peminjaman.show',$peminjaman->id)
                ->with('success', 'Peminjaman berhasil ditambah');
        } else 
        {
            return redirect()
                ->route('peminjaman.index')
                ->with('error', 'Peminjaman gagal ditambah');
        }
    }

    public function edit($id)
    {
        $pegawai = PegawaiModel::all();
        $peminjaman = PeminjamanModel::findorFail($id);
        
        if($peminjaman->status_peminjaman == 0){
            return view('peminjaman.update', [
                    'peminjaman' => $peminjaman,
                    'pegawai' => $pegawai
                ]);
        }else {
            return abort(403,'Cant access dis aktion');
        }

    }

    public function update(Request $request)
    {
        $peminjaman = PeminjamanModel::find($request->id);
        $peminjaman->tanggal_pinjam = $request->tanggal_pinjam;
        $peminjaman->tanggal_kembali = $request->tanggal_kembali;
        $peminjaman->updated_at = date('Y-m-d H:i:s',time());
        if($peminjaman->status_peminjaman == 0){
            if ($peminjaman->save()) 
            {
                return redirect()
                    ->route('peminjaman.index')
                    ->with('success', 'Peminjaman berhasil diubah');
            } else 
            {
                return redirect()
                    ->route('peminjaman.index')
                    ->with('error', 'Peminjaman gagal dubah');
            }
        }else {
            return abort(403,"Cant access dis aktion");
        }

    }



    public function show($id)
    {
        $peminjaman = PeminjamanModel::find($id);
        $detailPinjam = DetailPinjamModel::where(["id_peminjaman" => $peminjaman->id])->get();

        return view('peminjaman.show',[
            'peminjaman' => $peminjaman,
            'detailPinjam' => $detailPinjam,
            ]);
    }


    public function showHistory($id)
    {
        $peminjaman = PeminjamanModel::find($id);
        $detailPinjam = DetailPinjamModel::where(["id_peminjaman" => $peminjaman->id])->get();

        return view('peminjaman.showHistory', [
            'peminjaman' => $peminjaman,
            'detailPinjam' => $detailPinjam,
        ]);
    }


    public function delete($id)
    {
        DB::beginTransaction();
        $peminjaman = PeminjamanModel::find($id);
        $detailPinjam = DetailPinjamModel::where(["id_peminjaman" => $peminjaman->id])->get();

        if($peminjaman->status == 0 or $peminjaman->status == 3){
            foreach($detailPinjam as $row)
            {
                $inventaris = InventarisModel::find($row->id_inventaris);

                if($peminjaman->status_pinjam == 0)
                {
                    $inventaris->jumlah += $row->jumlah;
                    $inventaris->save();
                }

                $row->delete();
            }

            if ($peminjaman->delete()) 
            {
                DB::commit();
                return redirect()
                    ->route('peminjaman.index')
                    ->with('success', 'Peminjaman berhasil dihapus');
            } else {
                DB::rollBack();
                return redirect()
                    ->route('peminjaman.index')
                    ->with('error', 'Peminjaman gagal dihapus');
            }
        }else {
            return redirect()
                ->route('peminjaman.index')
                ->with('error', 'Peminjaman gagal dihapus, Karena Proses Pengembalian masih belum berakhir');
        }
    }


    public function acceptPinjam($id)
    {
        DB::beginTransaction();
        $peminjaman = PeminjamanModel::find($id);

        $detailPinjam = DetailPinjamModel::where(['id_peminjaman'=>$peminjaman->id])->get();

        if($peminjaman->status_peminjaman == 0)
        {
            $peminjaman->status_peminjaman = 1;

            if($peminjaman->save())
            {
                DB::commit();
                return redirect()
                    ->route('peminjaman.index')
                    ->with('success', 'Status peminjaman berhasil diubah menjadi "Telah Di Accept Pinjam".');
            }
            else{
                DB::rollBack();
                return redirect()
                    ->route('peminjaman.index')
                    ->with('error', 'Status peminjaman gagal diubah.');
            }
        }
    }


    public function requestKembali($id)
    {
        DB::beginTransaction();
        $peminjaman = PeminjamanModel::find($id);

        $detailPinjam = DetailPinjamModel::where(['id_peminjaman'=>$peminjaman->id])->get();

        if($peminjaman->status_peminjaman == 1)
        {
            $peminjaman->status_peminjaman = 2;

            if($peminjaman->save())
            {
                DB::commit();
                return redirect()
                    ->route('peminjaman.index')
                    ->with('success', 'Status peminjaman berhasil diubah menjadi "Request Pengembalian".');
            }
            else{
                DB::rollBack();
                return redirect()
                    ->route('peminjaman.index')
                    ->with('error', 'Status peminjaman gagal diubah.');
            }
        }
    }

    public function kembali($id)
    {
        DB::beginTransaction();
        $peminjaman = PeminjamanModel::find($id);

        $detailPinjam = DetailPinjamModel::where(['id_peminjaman'=>$peminjaman->id])->get();

        if($peminjaman->status_peminjaman == 2)
        {
            $peminjaman->status_peminjaman = 3;
            $peminjaman->tanggal_kembali = date('Y-m-d',time());

            /**
             * Pengembalian Barang
             */
            foreach ($detailPinjam as $row) 
            {
                $inventaris = InventarisModel::find($row->id_inventaris);
                $inventaris->jumlah += $row->jumlah;
                if(!$inventaris->save())
                {
                    DB::rollBack();
                    return redirect()
                        ->route('peminjaman.index')
                        ->with('error', 'Status peminjaman gagal diubah.');
                }
            }

            if($peminjaman->save())
            {
                DB::commit();
                return redirect()
                    ->route('peminjaman.index')
                    ->with('success', 'Status peminjaman berhasil diubah menjadi "Dikembalikan".');
            }
            else{
                DB::rollBack();
                return redirect()
                    ->route('peminjaman.index')
                    ->with('error', 'Status peminjaman gagal diubah.');
            }
        }
    }
}
