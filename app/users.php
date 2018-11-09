<?php

//Autor -> Sérgio Araújo

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Hash;


class users extends Model
{
    
    public static function removerutilizador($opcao2) {
       DB::table('users')->where('username', $opcao2)->delete();
        
    }
    
    
   public static function getusersinfo(){
       $users=DB::table('users')->where('username','<>' ,'admin')
                               ->where('username','<>' ,'Anonimo@gmail.com')->get();
        foreach ($users as $user)
            $user->fotografia= base64_encode ($user->fotografia);
       return $users;
       
   }

      public static function getUsernamePassword($username,$password){
        $users=DB::table('users')->where('username', $username)->first();
        if($users)
            if(Hash::check($password, $users->password)){
                return true;
            }
        return false;            
    }
    
    public static function insereUtilizador($registoutilizador){
        //encriptar a password
        $password=$this->encodePassword($registoutilizador['password']);
              
        
        $sql = "INSERT INTO users (username,password,nome,sobrenome,facebook,twitter,datanascimento,sexo,fotografia) VALUES ('".$registoutilizador['username']."', '".$password."','".$registoutilizador['nome']."','".$registoutilizador['sobrenome']."','"
                .$registoutilizador['facebook']."','".$registoutilizador['twitter']."','".$registoutilizador['datanascimento']."','".$registoutilizador['sexo']."','".$registoutilizador['fotografia']."')";

        
        $this->db->query($sql);
    }
    
    public static function getId_user($username){
        $query=DB::table('users')->where('username', $username)->first();
        if(isset($query)){
            return $query->id;
        }
        return null;
    }
    
    public static function loggedusers($sessionusername){
        $query=DB::table('loggins')->where('isinsession','1')->get();
        
      
        $i=0;
        foreach($query as $id){
            $query[$i]=DB::table('users')->where('id',$id->user)->first();
            $i++;
        }
       
        return $query;
    }
}
