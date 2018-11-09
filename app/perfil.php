<?php

//Autor -> Sérgio Araújo

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class perfil extends Model
{
   public static function alterarFoto($email,$fotografia){
      
        $updated_data=array('fotografia'=>$fotografia);
        
        
        DB::table('users')
            ->where('username', $email)
            ->update($updated_data); 
    }
    
   public static function viewUserPerfil($email) {
        $user = DB::table('users')->where('username',$email)->first();
        isset($user->fotografia)?$user->fotografia= base64_encode($user->fotografia):null;
        
        return $user;
    }
   
    public static function alterarPerfil($perfil,$email,$perfilaltera){
        $updated_data=array('nome'=>$perfilaltera['nome'],'sobrenome'=>$perfilaltera['sobrenome'],'datanascimento'=>$perfilaltera['datanascimento'],'sexo'=>$perfilaltera['sexo'],'habilitacoes'=>$perfilaltera['habilitacoes'],'nib1'=>$perfilaltera['nib1'],'nib2'=>$perfilaltera['nib2']);
         DB::table('users')
            ->where('username', $email)
            ->update($updated_data);
        
    }
}
