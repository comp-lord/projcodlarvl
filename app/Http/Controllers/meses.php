<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\menu;
use App\submenu;
use App\perfil;
use App\gastos;

class meses extends Controller {

    public function index($mes=null,$opcao=null) {
     
        $this->data=$this->iniciardata($mes,$opcao);
        return view('meses')->with($this->data); 
    }
    
    public function iniciardata($mes,$opcao){
        $sessionusername=request()->session()->get('username');
        $perfil = perfil::viewUserPerfil($sessionusername);
        $social= perfil::viewUserPerfil($sessionusername);
        $menu = menu::getMenu();
        $submenu= submenu::getSubMenu();
        
        $total = 0;
        $mes = ucfirst($mes);
        if (gastos::verEstadoMes($mes, $sessionusername)) {
            $inserir_gasto = true;
            $fechames = true;
        } else {
            $inserir_gasto = false;
            $fechames = false;
        }

        $flagravarTabela = false;
        if ($opcao === 'true') {
            gastos::insertGasto($mes, $sessionusername);
            $flagravarTabela = true;
        }

        $flag = 0;
        $delete=Input::post('delete');
        if (is_numeric($delete)) {
            $gastosmensais = gastos::listargastos($mes, $sessionusername);
            gastos::eliminarGasto($gastosmensais[$mes]['id_gasto'][$this->input->post('delete')]);
            $flag = 1;
        }

        $ival=Input::post('ival');
        $gastosmensais = gastos::listargastos($mes, $sessionusername);
        if ($ival && !$flag) {
            for ($i = 0; $i < $ival; $i++) {
                $gastos = Input::post('gastos' . $i);
                $selected = urldecode(Input::post('selected' . $i ));
                $data = date("Y-m-d", strtotime(urldecode(Input::post('datepicker' . $i))));
                gastos::updateGasto($gastosmensais[$mes]['id_gasto'][$i], $gastos, $selected, $data);
            }
        }
        
        $designacao = gastos::listardesignacao();
        $pagamentos = gastos::listarpagamentos();
        return $this->data=array('username' => $sessionusername, 
                            'perfil'=> $perfil,
                            'sessionusername' => $sessionusername,
                            'social'=> $social,
                            'menu' => $menu,
                            'mes' => $mes,
                            'total' =>   $total,
                            'flagravarTabela' => $flagravarTabela,
                            'inserir_gasto' => $inserir_gasto,
                            'gastosmensais' => $gastosmensais,
                            'designacao' => $designacao,
                            'pagamentos' => $pagamentos,
                            'elementosdesignacao' => $this->count_elm($designacao),
                            'elementosgastos' => $this->count_elm($gastosmensais),
                            'opcao' => $opcao,
                            'fechames' => $fechames,
                            'submenu' => $submenu,
                            );
    }
    
    function count_elm($array, &$count=0){
        foreach($array as $v) if(is_array($v)) $this->count_elm($v,$count); else ++$count;
    return $count;
    }
}
