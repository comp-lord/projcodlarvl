<?php

//Autor -> Sérgio Araújo

namespace App\Http\Controllers;

use File;
use Illuminate\Support\Facades\Input;
use App\perfil;
use App\menu;
use App\submenu;

class uploadfotoperfil extends Controller {

    private $data;

    public function index() {

        $this->data = $this->iniciardata(null);
        if (isset($this->data['sessionusername']))
            return view('uploadfotoperfil')->with($this->data);
        else
            return view('home')->with($this->data);
    }

    public function do_upload() {
        $this->data = $this->iniciardata(null);
        
        if (isset($this->data['sessionusername'])) {
            if (($file = Input::file('userfile')))
                $file->move('images/users', $file->getClientOriginalName());
            $filename = 'images/users/' . $file->getClientOriginalName();

            $contents = File::get($filename);


            $this->data = $this->iniciardata($contents);
            return view('uploadfotoperfil')->with($this->data);
        } else{
            
            return view('home')->with($this->data);
        }
    }

    private function iniciardata($upload) {
        $disabled = 'enabled';

        $sessionusername = request()->session()->get('username');


        if (isset($upload)) {

            perfil::alterarFoto($sessionusername, $upload);
        }

        $perfil = perfil::viewUserPerfil($sessionusername ? $sessionusername : 'Anonimo@gmail.com');



        if ($sessionusername){
            if(!strcmp($sessionusername,'admin')){
                $sessionusername='admin@gmail.com';
            }
            $string_username = explode('@', $sessionusername);
        }else
            $string_username = explode('@', 'Anonimo@mail.com');
        $action = '/home';

        $social = perfil::viewUserPerfil($sessionusername);
        $menu = menu::getMenu();
        $submenu = submenu::getSubMenu();
        if (isset($sessionusername)) {
            $submenu[6]->ligado = 0;
            $submenu[8]->ligado = 0;
        }
        $modalupload = "<script type='text/javascript'>$( document ).ready(function() { $('#modalupload').modal('show');});</script>";

        $this->data = array(
            'perfil' => $perfil,
            'sessionusername' => $sessionusername,
            'string_username' => $string_username,
            'action' => $action,
            'disabled' => $disabled,
            'social' => $social,
            'menu' => $menu,
            'submenu' => $submenu,
            'modalupload' => $modalupload
        );

        return $this->data;
    }

}
