<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * Description of publicacao
 *
 * @author engenheiro
 */
class publicacao extends Model {
    //put your code here
    
     public static function Todos() {
        $publicacao = DB::table('publicacao')->paginate(100);
        
        return $publicacao;
    }
    
    public static function inserirpublicacao($created_at, $imagem, $id_publicacaocategoria, $titulo, $mensagem, $username) {

        $query =  DB::table('publicacaocategoria')->where('id_publicacaocategoria',$id_publicacaocategoria)->get();
        
        foreach ($query as $row) {
                $id_publicacaocategoria = $row->id_publicacaocategoria;
            }
        
        
        $publicacao=['id_publicacaocategoria'=> $id_publicacaocategoria ,'imagem'=>$imagem,'titulo'=>$titulo,'mensagem'=>$mensagem,'created_at'=>$created_at];
             
        DB::table('publicacao')->insert($publicacao);
        

//Selecciona o último publicacao a ser inserido
        $query = DB::table('publicacao')->orderBy('id_publicacao','desc')->first();
        $id_publicacao = $query->id_publicacao;
        
        

//Id do utilizador a fazer o publicacao anonimo ==0 ou não !==0


        if ($username !== '0') {
            $query =  DB::table('users')->where('username',$username)->get();
            foreach ($query as $row) {
                    $id_user = $row->id;
                }
        } else
            $id_user = '0';

        
        $utilizador_publicacao=['id_user'=>$id_user,'id_publicacao'=>$id_publicacao];
        
        
        DB::table('user_publicacao')->insert($utilizador_publicacao);
        
        $idpublicacao_idcategoria=['id_publicacao'=>$id_publicacao,'id_publicacaocategoria'=>$id_publicacaocategoria];
        DB::table('idpublicacao_idcategoria')->insert($idpublicacao_idcategoria);
        
    }

    public static function users_like_publicacao($id_publicacao) {
        $users=array();
        $sql = DB::table('publicacao_qualidus_user')->where('id_publicacao',$id_publicacao)->get();
         
        $i=0;
        foreach ($sql as $row) {
                $users[$i]=$row->id_user;
                $i++;
            }
        
        
        return $users; 
    }
    
    
    public static function fetch_publicacao($limit, $start) {
        $this->db->limit($limit, $start);
        $query=DB::table('publicacao')
                ->offset($start)
                ->limit($limit)
                ->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
    
   public static function datapublicacao($idpublicacao) {
       $query=DB::table('publicacao')->where('id_publicacao',$idpublicacao)->first();
        
       
       if(isset($query))
            return $query->created_at;
       
       return 0;
    }
    
    public static function getiduseridpublicacao($idpublicacao) {
        $query=DB::table('user_publicacao')->where('id_publicacao',$idpublicacao)->first();
         $id_user = null;

         if(isset($query)){
                $id_user = $query->id_user;
            }
        

        return $id_user;
    }
    
    public static function get_username4db($idpublicacao,$flag){
        if (!$flag)
            $id_user = publicacao::getiduseridpublicacao($idpublicacao);
        else
            $id_user = $idpublicacao;

        
        $query=DB::table('users')->where('id',$id_user)->first();
              
        $nomeuser = null;
        $sobrenome = null;

        if(isset($query)){
                $nomeuser = $query->nome;
                $sobrenome = $query->sobrenome;
            }
        
        $nomecompleto = $nomeuser . " " . $sobrenome;

        return $nomecompleto;
}

public static function countgosto($idpublicacao,$user,$gosto){        
        $qualidus = 0;
        if($user)
           $query=DB::table('publicacao_qualidus_user')->where('id_publicacao',$idpublicacao)->where('id_user',$user)->get();
        else
           $query=DB::table('publicacao_qualidus_user')->where('id_publicacao',$idpublicacao)->get();

        $i = 0;
       foreach ($query as $row) {
                $qualidus=$qualidus+$row->qualidus;
                $i++;
            }
               
        if ($gosto)
            return (!$user) ?  (!$i) ? 0 : $qualidus/$i :  $qualidus;
        else
            return (!$user) ?  (!$i) ? 100 : 100-($qualidus/$i) :  100-$qualidus;
}


public static function lervalorprogress($id_publicacao,$id_user) {
    $qualidus=0;
        if($id_user)
           $query = DB::table('publicacao_qualidus_user')->where('id_publicacao', $id_publicacao)->where('id_user',$id_user)->get();
        else
           $query = DB::table('publicacao_qualidus_user')->where('id_publicacao',$id_publicacao)->get();     
        
        $i=0;
        foreach ($query as $row) {
                $qualidus=$qualidus+$row->qualidus;
                $i++;
            }
        
        return (!$id_user) ?  (!$i) ? 0 : $qualidus/$i :  $qualidus;
    }

public static function Eliminarpublicacao($id_publicacao) {
        DB::table('user_publicacao')->where('id_publicacao', $id_publicacao)->delete();
        DB::table('idpublicacao_idcategoria')->where('id_publicacao', $id_publicacao)->delete();
        DB::table('publicacao_qualidus_user')->where('id_publicacao', $id_publicacao)->delete();
        DB::table('publicacao')->where('id_publicacao', $id_publicacao)->delete();       
    }
    
public static function insere_publicacao_qualidus($id_publicacao, $id_user, $qualidus) {
        
       $query = DB::table('publicacao_qualidus_user')->where('id_publicacao', $id_publicacao)->where('id_user',$id_user)->first();
        
       
        $parametros = ['id_publicacao' => $id_publicacao, 'id_user' => $id_user, 'qualidus' => $qualidus];
        
       if ($query) {
           DB::table('publicacao_qualidus_user')
            ->where('id_publicacao', $id_publicacao)
            ->where('id_user', $id_user)
            ->update($parametros);
        } else {
            DB::table('publicacao_qualidus_user')->insert($parametros);               
        }
    
 
}      
}