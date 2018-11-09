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
 * Description of publicacaocategoria
 *
 * @author engenheiro
 */
class publicacaocategoria extends Model {
    
    public static function getdescricao($opcao) {
        $data=null;
        $query=DB::table('publicacaocategoria')->get();
        
        $i = 0;
        if(isset($query)){
            foreach ($query as $row) {
                $publicacaocategorias[$i] = str_replace(" ", "_", preg_replace("/&([a-z])[a-z]+;/i", "$1", htmlentities(trim($row->descricao))));
                $i++;
            }
        }
        
        $i = 0;
        foreach ($publicacaocategorias as $categoriadescricao) {
            if (!strcmp($categoriadescricao, str_replace(" ", "_", preg_replace("/&([a-z])[a-z]+;/i", "$1", htmlentities(trim($opcao)))))) {
                $data['modalspublicacaocategoria'] = $publicacaocategorias;
                $data['modalbox'] = '<script type="text/javascript">$("#' . $categoriadescricao . '").modal("show");</script>';
            }
        }
    return $data;    
    }
    //put your code here
}
