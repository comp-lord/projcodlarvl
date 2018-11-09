<?php

//Autor -> Sérgio Araújo

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Hash;


class register extends Model
{
    public static function compareemail($email) {
        $user = DB::table('users')->where('username',$email)->first();
        
        return $user;
    }
    
    public static function inserirregisto($registo){
        
        
        $registo=Array('username'=> $registo['username'],'password'=>$registo['password'],'nome'=>$registo['nome'],'sobrenome'=>$registo['sobrenome'], 'datanascimento'=>$registo['datanascimento'],'sexo'=>$registo['sexo'],'fotografia'=>$registo['fotoregisto'], 'habilitacoes'=>$registo['habilitacoes'], 'nib1'=>$registo['nib1'], 'nib2'=>$registo['nib2'], 'fotografia'=>base64_decode($registo['fotoregisto']),'created_at'=>$registo['created_at']);
        
        
        DB::table('users')->insert($registo);
    }
}

