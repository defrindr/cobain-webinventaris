<?php
namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\PegawaiModel;
use App\Helpers\MyHelper;


Class LoginController extends BaseController{
    use AuthenticatesUsers;



    /**
     * Menampilkan Form Login
     */
    public function index(){
        return view('auth.login');
    }



    /**
     * Proses Login
     */
    public function login(Request $request){

        if (
            \Auth::attempt([
                'username' => $request->username,
                'password' => $request->password]))
        {
            MyHelper::logging($request);
            $auth = \Auth::user()
                ->level
                ->nama_level;
            switch($auth) 
            {
                case "Administrator":
                    return redirect()
                        ->route('inventaris.index');
                    break;
                case "Peminjam":
                        $pegawai = PegawaiModel::where(['id_user' => \Auth::user()->id])->get();
                        if(count($pegawai) < 0){
                            return redirect()
                                ->route('auth.formLogin')
                                ->with('error','Akun Peminjam Tidak ditemukan');
                        }else {
                            if($pegawai[0]->status){
                                return redirect()
                                    ->route('peminjaman.index');
                            }else {
                                \Auth::logout();
                                return redirect()
                                    ->route('auth.formLogin')
                                    ->with('error','Akun Peminjam belum aktif');
                            }
                        }
                    break;
                default:
                    return redirect()
                        ->route('peminjaman.index');
                    break;
            }
        } else 
        {
            MyHelper::logging($request);
            return redirect()
                ->route('auth.formLogin')
                ->with('error','Username / Password salah');
        }
    }




    /**
     * Proses Logout
     */
    public function logout(){
        \Auth::logout();
        return redirect()
            ->route('auth.formLogin')
            ->with('success','Berhasil Logout');
    }
}