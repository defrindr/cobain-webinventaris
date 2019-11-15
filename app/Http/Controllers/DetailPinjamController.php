<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\DetailPinjamModel;
use App\Models\PeminjamanModel;
use App\Models\InventarisModel;

class DetailPinjamController extends Controller
{
    protected $messages = [
            "required" => ":attribute tidak boleh kosong.",
            "numeric" => ":attribute hanya boleh berisi angka",
            "min" => ":attribute tidak boleh kurang dari :min.",
            "max" => ":attribute tidak boleh lebih dari :max."
        ];



    /**
     * Menampilkan Form Create
     */
    public function create($id)
    {
        $inventaris = InventarisModel::all();
        $peminjaman = PeminjamanModel::find($id);

        return view('detail.create',[
                'inventaris' => $inventaris,
                'peminjaman'=>$peminjaman
            ]);
    }



    /**
     * Proses Menambahkan Data
     */
    public function store(Request $request)
    {
        DB::beginTransaction();

        $peminjaman = PeminjamanModel::find($request->id_peminjaman);
        $inventaris = InventarisModel::find($request->id_inventaris);

        $this->validate($request,[
                "id_peminjaman" => "required|numeric",
                "id_inventaris" => "required|numeric",
                "jumlah" => "required|numeric",
            ],$this->messages);

        $detailPinjam = new DetailPinjamModel([
                "id_peminjaman" => $request->id_peminjaman,
                "id_inventaris" => $request->id_inventaris,
                "jumlah" => $request->jumlah,
            ]);

        // jika belum dikembalikan
        if($peminjaman->status_peminjaman == 0) $inventaris->jumlah = $inventaris->jumlah - $request->jumlah;
        
        if ($inventaris->save() && $detailPinjam->save()) 
        {
            DB::commit();
            return redirect()
                ->route('peminjaman.show',$request
                ->id_peminjaman)->with('success', 'Detail Pinjam berhasil ditambah');
        } else 
        {
            DB::rollBack();
            return redirect()
                ->route('peminjaman.show',$request
                ->id_peminjaman)->with('error', 'Detail Pinjam gagal ditambah');
        }
    }



    /**
    * Menmpilkan Form Update
    */
    public function edit($id)
    {
        $detailPinjam = DetailPinjamModel::findorFail($id);
        $inventaris = InventarisModel::all();
        $peminjaman = PeminjamanModel::find($detailPinjam->id_peminjaman);
        $jumlahInventaris = InventarisModel::find($detailPinjam->id_inventaris)->jumlah;
        
        return view('detail.update', [
            'detailPinjam' => $detailPinjam,
            'inventaris' => $inventaris,
            'peminjaman' => $peminjaman,
            'jumlahInventaris' => $jumlahInventaris,
            ]);
    }

    /**
    * Proses Update Data
    */
    public function update(Request $request)
    {
        DB::beginTransaction();

        $detailPinjam = DetailPinjamModel::find($request->id);
        $inventaris = InventarisModel::find($detailPinjam->id_inventaris);
        
        $this->validate($request,[
                "jumlah" => "required|numeric",
            ],$this->messages);

        $inventaris->jumlah += $detailPinjam->jumlah;
        $inventaris->jumlah -= $request->jumlah;
        $detailPinjam->jumlah = $request->jumlah;

        if ($inventaris->save() && $detailPinjam->save()) 
        {
            DB::commit();
            return redirect()
                ->route('peminjaman.show',$detailPinjam->id_peminjaman)
                ->with('success', 'Detail Pinjam berhasil diubah');
        } else 
        {
            DB::rollback();
            return redirect()
                ->route('peminjaman.show',$detailPinjam->id_peminjaman)
                ->with('error', 'Detail Pinjam gagal dubah');
        }
    }



    /**
    *  Proses Delete Data
    */
    public function delete($id)
    {
        DB::beginTransaction();

        $detailPinjam = DetailPinjamModel::find($id);
        $peminjaman = PeminjamanModel::find($detailPinjam->id_peminjaman);
        $inventaris = InventarisModel::find($detailPinjam->id_inventaris);

        $id_peminjaman = $detailPinjam->id_peminjaman;

        /*
         * Jika Sudah dikembalikan
         */
        if($peminjaman->status_peminjaman == 1)
        {
            if ($detailPinjam->delete()) 
            {
                DB::commit();
                return redirect()
                    ->route('peminjaman.show', $id_peminjaman)
                    ->with('success', 'Detail Pinjam berhasil dihapus');
            } else 
            {
                DB::rollBack()();
                return redirect()
                    ->route('peminjaman.show', $id_peminjaman)
                    ->with('error', 'Detail Pinjam gagal dihapus');
            }
        }
        /*
         * Jika Belum dikembalikan
         */
        else{
            $inventaris->jumlah = $inventaris->jumlah + $detailPinjam->jumlah;
            if ($inventaris->save() && $detailPinjam->delete()) 
            {
                DB::commit();
                return redirect()
                    ->route('peminjaman.show',$id_peminjaman)
                    ->with('success', 'Detail Pinjam berhasil dihapus');
            } else 
            {
                DB::rollBack();
                return redirect()
                    ->route('peminjaman.show',$id_peminjaman)
                    ->with('error', 'Detail Pinjam gagal dihapus');
            }
        }
    }
}
