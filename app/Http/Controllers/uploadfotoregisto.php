<?php

//Autor -> Sérgio Araújo

namespace App\Http\Controllers;

use File;
use Illuminate\Support\Facades\Input;
use App\menu;
use App\submenu;

class uploadfotoregisto extends Controller
{
    //
    private $data;

    public function index() {

        $this->data = $this->iniciardata(null);
        return view('uploadfotoregisto')->with($this->data);
        
    }

    public function do_upload() {
        if (($file = Input::file('userfile')))
            $file->move('images/users', $file->getClientOriginalName());
        $filename='images/users/'.$file->getClientOriginalName();
        
        $contents=base64_encode(file_get_contents($filename));
        unlink($filename);
        $this->data = $this->iniciardata($contents);
        return view('uploadfotoregisto')->with($this->data);
    }

    private function iniciardata($upload) {
        $sessionusername=request()->session()->get('username');
        $disabled = 'enabled';

        if (isset($upload)) {
           request()->session()->put('fotoregisto', $upload);
        }

        $fotoregisto=request()->session()->get('fotoregisto')?request()->session()->get('fotoregisto'):base64_encode(file_get_contents('images/blog/anonimo.png'));
        
        $menu = menu::getMenu();
        $submenu = submenu::getSubMenu();
        $modalupload = "<script type='text/javascript'>$( document ).ready(function() { $('#modalupload').modal('show');});</script>";

        $this->data = array(
            'sessionusername' => $sessionusername,
            'fotoregisto'=>$fotoregisto,
            'disabled' => $disabled,
            'menu' => $menu,
            'submenu' => $submenu,
            'modalupload' => $modalupload
        );

        return $this->data;
    }

}

