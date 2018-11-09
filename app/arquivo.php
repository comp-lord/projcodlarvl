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
 * Description of arquvo
 *
 * @author engenheiro
 */
class arquivo extends Model {
    //put your code here
    
    public static function inserir_post_arquivo($data, $imagem, $id_categoria, $titulo, $mensagem, $username) {
//Selecciona o último post a ser inserido
        $query = DB::table('publicacao')->orderBy('id_publicacao')->take(1)->get();
        
        foreach ($query as $row) {
                $id_publicacao = $row->id_publicacao;
            }
        
        $data=array('created_at'=>$data,'fotografia'=>$imagem,'titulo'=> $titulo,'texto'=>$mensagem,'id_publicacao'=>$id_publicacao,'id_categoria'=> $id_categoria);
               
        DB::table('arquivo')->insert($data);
    }
}
