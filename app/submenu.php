<?php

//Autor -> Sérgio Araújo

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class submenu extends Model
{
    public static function getSubMenu() {
    $submenu =  DB::table('submenu')->get();
    
    return $submenu;
    }
}
