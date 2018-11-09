<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\menu;
use App\submenu;
use App\perfil;
use App\users;

class videostream extends Controller
{
    
    public function index(){
        $this->data = $this->iniciardata();
        return view('videostream')->with($this->data);
        
    }
    
    public function iniciardata() {
        $perfil = array();
        
        
        
        $sessionusername=$username= request()->session()->get('username');
        
        
        
        $onlineusers= users::loggedusers($sessionusername);
        $perfil = perfil::viewUserPerfil($sessionusername);

        /* End Session Vars */

        $menu = menu::getMenu();
        $submenu = submenu::getSubMenu();
        
        
        $this->data = array('username' => $username,
                     'menu' => $menu,
                    'submenu' => $submenu,
                    'sessionusername' => $sessionusername,
                    'perfil'=> $perfil,
                    'onlineusers'=> $onlineusers,
                    );
       return $this->data;
    }
}
