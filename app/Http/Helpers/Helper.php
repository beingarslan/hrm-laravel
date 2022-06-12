<?php

namespace App\Http\Helpers;

use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class Helper{

    // get age with today date
    public static function getAge($dob){
        $now  = Carbon::now();
        $data=[];
        $data['Years']=$now->diffInYears($dob);
        $data['Months']=$now->diffInMonths($dob);
        $data['Days']=$now->diffInDays($dob);
        return $data;

    }

    // get random number
    public static function randomNumber(){
        $current_time = round(microtime(true) * 1000);
        return $current_time . rand(1111, 9999);
    }

    // decrypt
    public static function decrypt($string = null){

        try {
            return Crypt::decrypt($string);
        }catch (DecryptException $exception){
            return ['status' => false, 'message' => 'page not found'];
        }
    }

    // get file size in GB / MB / KB
    public static function getFileSize($bytes = null){

        if ($bytes >= 1073741824)
        {
            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
        }
        elseif ($bytes >= 1048576)
        {
            $bytes = number_format($bytes / 1048576, 2) . ' MB';
        }
        elseif ($bytes >= 1024)
        {
            $bytes = number_format($bytes / 1024, 2) . ' KB';
        }
        elseif ($bytes > 1)
        {
            $bytes = $bytes . ' bytes';
        }
        elseif ($bytes == 1)
        {
            $bytes = $bytes . ' byte';
        }
        else
        {
            $bytes = '0 bytes';
        }

        return $bytes;
    }

    public static function checkPermission($permission){
        if(!Auth::user()->hasPermissionTo($permission)){
            abort(404);
        }
    }

}
