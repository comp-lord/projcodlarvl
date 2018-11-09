<?php

//Autor -> Sérgio Araújo

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Session;
use App\perfil;
use App\menu;
use App\submenu;
use App\users;
use App\regisip;

class login extends Controller
{
    private $data=array();
    //
    public function index(){
        $this->data= $this->iniciardata(null);
        return view('login')->with($this->data);
    }
    
    public function login(){
        $this->data= $this->iniciardata(true);
        
        if($this->data['erro'])
            return view('login')->with($this->data);
        
        
        regisip::regisip(request()->session()->get('username'));
        return view('home')->with($this->data);
    }
    
    private function iniciardata($login) {
        $erro= null;
        $perfil=array();
        $username= null;
        $password= null;
        if($login){
            if(users::getUsernamePassword(Input::post('username'),Input::post('password'))){
                request()->session()->put('username', Input::post('username'));
            }
            else{
            $erro="<script type='text/javascript'>$('#Error').toggle();$('#Error').delay(4000).slideUp(400, function() {
    $(this).alert('close');
            });</script>";}
            
        }
        
        
        $url= public_path();
        $sessionusername=request()->session()->get('username');
        if(isset($sessionusername))
            $perfil = perfil::viewUserPerfil($sessionusername);
        $social= perfil::viewUserPerfil($sessionusername);
        $menu = menu::getMenu();
        $submenu= submenu::getSubMenu();
        if(isset($sessionusername)){
           
            $submenu[6]->ligado=0;
            $submenu[7]->ligado=1;
            $submenu[8]->ligado=0;
            $submenu[9]->ligado=1;
            
            
        }
        else{
            $submenu[6]->ligado=1;
            $submenu[7]->ligado=0;
            $submenu[8]->ligado=1;
            $submenu[9]->ligado=0;
        }
        $modallogin="<script type='text/javascript'>$( document ).ready(function() { $('#modallogin').modal('show');});</script>";    
        
        $this->data=array('username' => $username, 
                            'password'=>$password,
                            'erro'=>$erro, 
                            'url'=>$url,
                            'perfil'=> $perfil,
                            'sessionusername' => $sessionusername,
                            'social'=> $social,
                            'menu' => $menu,
                            'submenu' => $submenu,
                            'modallogin'=>$modallogin);

        return $this->data;
    }
}
