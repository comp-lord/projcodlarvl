<?php


//Autor -> Sérgio Araújo

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Input;
use App\menu;
use App\submenu;
use App\perfil;

class home extends Controller
{
    private $data;
    //
    public function index() {
        
        $this->data= $this->iniciardata(null);
        return view('home')->with($this->data);
        
    }
    public function logout() {
        $this->data= $this->iniciardata(true);
        return view('home')->with($this->data);
    }
 
    private function iniciardata($sessao) {
        $perfil=array();
        $username = Input::get('name');
        $password = Input::get('password');
        $url= public_path();
        
        
        
        if($sessao){
            
            request()->session()->put('username', null);
            request()->session()->put('fotoregisto', null);
        }
        $sessionusername=request()->session()->get('username');
        
        $perfil = perfil::viewUserPerfil($sessionusername);
        
        
        $social= perfil::viewUserPerfil($sessionusername);
        
        $menu = menu::getMenu();
        $submenu= submenu::getSubMenu();
        if(isset($sessionusername)){
            $submenu[6]->ligado = 0;
            $submenu[7]->ligado = 1;
            $submenu[8]->ligado = 0;
            $submenu[9]->ligado = 1;
        }
            
        
        $this->data=array('username' => $username, 
                            'password'=>$password,
                            'url'=>$url,
                            'perfil'=> $perfil,
                            'sessionusername' => $sessionusername,
                            'social'=> $social,
                            'menu' => $menu,
                            'submenu' => $submenu);

        return $this->data;
    }
    
}
