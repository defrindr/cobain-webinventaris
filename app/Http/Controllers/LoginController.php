<?php
namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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
            $auth = \Auth::user()
                ->level
                ->nama_level;

            switch($auth) 
            {
                case "Administrator":
                    return redirect()
                        ->route('inventaris.index');
                    break;
                default:
                    return redirect()
                        ->route('peminjaman.index');
                    break;
            }
        } else 
        {
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