<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Input;
use Illuminate\Mail\Mailer;
use App\perfil;
use App\menu;
use App\submenu;

/**
 * Description of enviarcorreio
 *
 * @author engenheiro
 */
class enviarcorreio extends Controller{

    public function mail() {
        $perfil=null;
        $disabled = 'disabled';
        $action = '/enviarcorreio';

        $sessionusername= request()->session()->get('username');

        if(isset($sessionusername))
            $perfil = perfil::viewUserPerfil($sessionusername);
        
        $social = perfil::viewUserPerfil($sessionusername);
        $menu = menu::getMenu();
        $submenu = submenu::getSubMenu();
        if (isset($sessionusername)) {
            $submenu[6]->ligado = 0;
            $submenu[7]->ligado = 1;
            $submenu[8]->ligado = 0;
            $submenu[9]->ligado = 1;
        }
        $send=null;
        $account='smfaraujo@gmail.com';
        $username = Input::post('username');
        $data = array('username' => $username,'email'=> Input::post('email'),'menssagem'=> Input::post('menssagem'));
        \Mail::send('layout.email', $data, function($send) use ($account) {

            $send->to($account);

            $send->subject('E-mail de DigitalDate');
        });
        
        $this->data = array(
            'sessionusername' => $sessionusername,
            'perfil'=> $perfil,
            'disabled' => $disabled,
            'social' => $social,
            'menu' => $menu,
            'action'=> $action,
            'submenu' => $submenu,
            'success'=>"<script type='text/javascript'>$('#Successkeys').toggle();$('#Successkeys').delay(10000).slideUp(400, function() {
    $(this).alert('close');
});</script>");
        
        
        
        return view('contactos')->with($this->data);
        
    }
}
