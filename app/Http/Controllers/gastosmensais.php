<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;



use App\menu;
use App\submenu;
use App\perfil;

class gastosmensais extends Controller
{
    //
    private $data;
    
    public function index() {
        
        $this->data= $this->iniciardata(null);
        return view('gastosmensais')->with($this->data);
    }
    
    public function iniciardata($sessao){
        $username= null;
        $sessionusername=request()->session()->get('username');
        $perfil = perfil::viewUserPerfil($sessionusername);
        $social= perfil::viewUserPerfil($sessionusername);
        $menu = menu::getMenu();
        $submenu= submenu::getSubMenu();
        
        return $this->data=array('username' => $username, 
                            'perfil'=> $perfil,
                            'sessionusername' => $sessionusername,
                            'social'=> $social,
                            'menu' => $menu,
                            'submenu' => $submenu,
                            );
    }
}
