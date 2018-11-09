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
 * Description of categoria
 *
 * @author engenheiro
 */
class categoria extends Model{
    public static function listarcategoria(){
        $tabela=[];
        $query=DB::Table('publicacaocategoria')->get();
        
        $i=0;
        foreach($query as $row){
                $tabela[$i] = $row;
                $i++;
            }
       
    return $tabela;
    }
}
