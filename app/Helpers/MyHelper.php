<?php
namespace App\Helpers;


use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MyHelper {

    public static function isAdmin(){
        if(\Auth::user()->level->nama_level == "Administrator"){
            return true;
        }else{
            return false;
        }
    }

    public static function isOperator()
    {
        if (\Auth::user()->level->nama_level == "Operator") {
            return true;
        } else {
            return false;
        }
    }

    public static function isPeminjam()
    {
        if (\Auth::user()->level->nama_level == "Peminjam") {
            return true;
        } else {
            return false;
        }
    }

    public static function statusChange($var,$arg1,$arg2){
        if($var){
            return $arg1;
        }else {
            return $arg2;
        }
    }

    public static function logging(Request $request){
        $auth = 0;
        if(\Auth::check()){
            $auth = \Auth::user()->id;
        }

        DB::table('access_log')->insert([
            "tanggal_access" => Date('Y-m-d H:i:s',time()),
            "ip" => request()->getClientIp(),
            "path" => $request->path(),
            "methods" => $request->getMethod(),
            "id_user" => $auth
        ]);
    }

}
?>