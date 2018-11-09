<?php

namespace App;

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class regisip extends Model
{
    public static function regisip($sessiousername){
        
        $query=DB::table('users')->where('username',$sessiousername)->get();
        foreach ($query as $row) {
                $id_username = $row->id;
            }
        
        if (isset($_SERVER['REMOTE_ADDR'])) {
            $ip=$_SERVER['REMOTE_ADDR'];
        }
        $data=array('ip'=>$ip,'user'=>$id_username,'isinsession'=>1,'created_at'=>date("Y/m/d"));
        DB::Table('loggins')->insert($data);
    }
    
    public static function regisipout($sessiousername){
        if (isset($_SERVER['REMOTE_ADDR'])) {
            $ip=$_SERVER['REMOTE_ADDR'];
        }
        $data=array('ip'=>$ip,'isinsession'=>0,'created_at'=>date("Y/m/d"));
        B::table('users')
            ->where('i9', $email)
            ->where('username', $email)    
            ->update($updated_data); 
        DB::Table('loggins')->insert($data);
    }
    
    
}
