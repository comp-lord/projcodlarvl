<?php


//Autor -> Sérgio Araújo

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;

use App\menu;
use App\submenu;
use App\perfil;

class retrato extends Controller {

    private $data;

    //
    public function index() {
        $disabled = 'enabled';
        $action = '/';

        $nome = Input::post('nome');
        $sessionusername = request()->session()->get('username');

        if (isset($nome)) {
            $perfil = perfil::viewUserPerfil($sessionusername);
            $perfilaltera = array('nome' => $nome, 'sobrenome' => Input::post('sobrenome'), 'datanascimento' => date('Y-m-d', strtotime(Input::post('datanascimento'))), 'sexo' => Input::post('sexo'), 'habilitacoes' => Input::post('habilitacoes'), 'altura' => Input::post('altura'), 'nib1' => Input::post('nib1'), 'nib2' => Input::post('nib2'));
            perfil::alterarPerfil($perfil, $sessionusername ? $sessionusername : 'Anonimo@gmail.com', $perfilaltera);
        }
        $perfil = perfil::viewUserPerfil($sessionusername ? $sessionusername : 'Anonimo@gmail.com');
        if (!$sessionusername){
            $disabled = 'disabled';
        }
        
        
        if ($sessionusername){
            if(!strcmp($sessionusername,'admin')){
                $sessionusername='admin@gmail.com';
            }
            $string_username = explode('@', $sessionusername);
        }else{
            $string_username = explode('@', 'Anonimo@mail.com');
        }

        $social = perfil::viewUserPerfil($sessionusername);
        $menu = menu::getMenu();
        $submenu = submenu::getSubMenu();
        if (isset($sessionusername)) {
            $submenu[6]->ligado = 0;
            $submenu[7]->ligado = 1;
            $submenu[8]->ligado = 0;
            $submenu[9]->ligado = 1;
        }


        $this->data = array('nome' => $nome,
            'perfil' => $perfil,
            'sessionusername' => $sessionusername,
            'string_username' => $string_username,
            'action' => $action,
            'disabled' => $disabled,
            'social' => $social,
            'menu' => $menu,
            'submenu' => $submenu
        );


        return view('perfil')->with($this->data);
    }

    
   
}
