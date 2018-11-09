<?php

//Autor -> Sérgio Araújo

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class menu extends Model
{
    //
    public static function getMenu() {
    $menu =  DB::table('menu')->get();
    
    return $menu;
    }
}
