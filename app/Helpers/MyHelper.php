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
}
?>