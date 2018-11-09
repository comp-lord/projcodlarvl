<?php


//Autor -> Sérgio Araújo
// Controlador para os Contactos

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;

use App\menu;
use App\perfil;
use App\submenu;

class contactos extends Controller {

    //Data que é enviada do Controlador para a View
    private $data;

    //
    public function index() {
        $perfil=null;
        $disabled = 'disabled';
        $action = '/enviarcorreio';

        //Variavel de Sessão getter
        $sessionusername= request()->session()->get('username');

        //Variável social e perfil recebem os dados de Perfil da Funcao
        $social = $perfil = perfil::viewUserPerfil($sessionusername);
        //Menu e Submenu recebem o Menu da Base de Dados
        $menu = menu::getMenu();
        $submenu = submenu::getSubMenu();
        if (isset($sessionusername)) {
            $submenu[6]->ligado = 0;
            $submenu[7]->ligado = 1;
            $submenu[8]->ligado = 0;
            $submenu[9]->ligado = 1;
        }

       $this->data = array(
            'sessionusername' => $sessionusername,
            'perfil'=> $perfil,
            'disabled' => $disabled,
            'social' => $social,
            'menu' => $menu,
            'action'=> $action,
            'submenu' => $submenu,
            'success'=>null
        );
 
                           

        return view('contactos')->with($this->data);
    }
}