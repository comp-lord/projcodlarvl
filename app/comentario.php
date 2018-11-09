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
 * Description of comentarios
 *
 * @author engenheiro
 */
class comentario extends Model {
     public static function insereComentario($id_utilizador, $id_publicacao, $comentario) {
        $data = array('comentario' => $comentario);

        DB::Table('comentario')->insert($data);
        
        $query=DB::Table('comentario')->orderBy('id_comentario')->first();
        $data = array('id_comentario' =>$query->id_, 'id_publicacao' => $id_publicacao, 'id_utilizador' => $id_utilizador);
        DB::Table('comentario_publicacao_utilizador')->insert($data);
    }
}
