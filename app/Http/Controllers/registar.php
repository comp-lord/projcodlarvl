<?php

//Autor -> Sérgio Araújo

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use App\menu;
use App\submenu;
use App\register;

class registar extends Controller {

    //
    private $data;

    public function index() {
        $this->data = $this->iniciardata();
        return view('registar')->with($this->data);
    }

    private function iniciardata() {
        $msguserexist = null;
        $disabled=false;
        $success = null;
        $erro = null;
        $perfil = array();

        $username = Input::post('username');
        $password = Input::post('password');
        $confirmacao = Input::post('confirmacao');
        $nome = Input::post('nome');
        $sobrenome = Input::post('sobrenome');
        $facebook = Input::post('facebook');
        $twitter = Input::post('twitter');
        $datanascimento = date('Y-m-d', strtotime(Input::post('datanascimento')));
        $sexo = Input::post('sexo');
        $habilitacoes=Input::post('habilitacoes');
        $nib1=Input::post('nib1');
        $nib2=Input::post('nib2');
        $created_at=date('Y-m-d');
        
     
        $sessionusername = request()->session()->get('username');
        $fotoregisto = request()->session()->get('fotoregisto') ? request()->session()->get('fotoregisto') : base64_encode(file_get_contents('images/blog/anonimo.png'));


        /* End Session Vars */

        $menu = menu::getMenu();
        $submenu = submenu::getSubMenu();


        $user = register::compareemail($username);
        if (isset($password) && isset($confirmacao)) {
            if (!strcmp($password, $confirmacao) && !isset($user)) {
                $success = "<script type='text/javascript'>$('#Successkeys').toggle();$('#Successkeys').delay(10000).slideUp(400, function() {
    $(this).alert('close');
});</script>";
                $registo = array('username' => $username,
                    'password' => bcrypt($password),
                    'confirmacao' => $confirmacao,
                    'nome' => $nome,
                    'sobrenome' => $sobrenome,
                    'facebook' => $facebook,
                    'twitter' => $twitter,
                    'menu' => $menu,
                    'submenu' => $submenu,
                    'datanascimento' => $datanascimento,
                    'sexo' => $sexo,
                    'altura' => $altura,
                    'habilitacoes' => $habilitacoes,
                    'nib1'=>$nib1,
                    'nib2'=>$nib2,
                    'fotoregisto' => $fotoregisto,
                    'created_at' => $created_at,
                    'success' => $success,
                    'erro' => null,
                    'sessionusername' => $sessionusername,
                    'msguserexists' => $msguserexist);    /* To menu print view */
                
                register::inserirregisto($registo);
                return $registo;
            } else {
                $erro = "<script type='text/javascript'>$('#Error').toggle();$('#Error').delay(4000).slideUp(400, function() {
    $(this).alert('close');
            });</script>";
            }
        }
        if ($user){
            $msguserexist = '<div class="alert alert-danger">
    <strong>O Utilizador já existe</a>.
  </div>';}
        
        $this->data = array('username' => $username,
                    'password' => $password,
                    'confirmacao' => $confirmacao,
                    'nome' => $nome,
                    'sobrenome' => $sobrenome,
                    'facebook' => $facebook,
                    'twitter' => $twitter,
                    'habilitacoes' => $habilitacoes,
                    'nib1'=>$nib1,
                    'nib2'=>$nib2,
                    'menu' => $menu,
                    'submenu' => $submenu,
                    'datanascimento' => $datanascimento,
                    'disabled' => false,
                    'sexo' => $sexo,
                    'fotoregisto' => $fotoregisto,
                    'success' => $success,
                    'erro' => $erro,
                    'sessionusername' => $sessionusername,
                    'msguserexists' => $msguserexist);
       return $this->data;
    }

}
