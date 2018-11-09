<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\menu;
use App\submenu;
use App\register;
use App\users;
use App\perfil;

class removerutilizador extends Controller
{    
    public function removeutilizador($opcao=NULL,$opcao2=NULL){
        $menu = menu::getMenu();
        $submenu= submenu::getSubMenu();

        $sessionusername=$username = request()->session()->get('username');
        
        switch($opcao){
            case 'remover':
                        users::removerutilizador($opcao2);
                        break;
        }
            $perfil = perfil::viewUserPerfil($sessionusername);
            $users = users::getusersinfo();
         
        $this->data = array('username' => $username,
                    'menu' => $menu,
                    'submenu' => $submenu,
                    'sessionusername' => $sessionusername,
                    'perfil'=>$perfil,
                    'users'=> $users,
                    );
           
        return view('removerutilizadores')->with($this->data);
        }
    }

