<?php
namespace App\Helpers;

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
}
?>