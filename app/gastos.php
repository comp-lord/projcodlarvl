<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\users;

class gastos extends Model {

    public $email;
    

    public static function listargastos($mes, $email) {
        $total = 0;
        $id_user = users::getId_user($email);
        $gastosmensais[$mes] = array('id_pagamento' => array(), 'id_designacao' => array(), 'pagamento' => array(), 'id_gasto' => null, 'data'=>null, 'gasto' => 0, 'total' => 0);
        $query = DB::table('mes')->where('designacao', $mes)->get();

        foreach ($query as $row) {
            $id_mes = $row->id_mes;
            $designacao = $row->designacao;
        }

        $i = 0;
        $query = DB::table('mes_gasto')->where('id_mes', $id_mes)->get();
       
            foreach ($query as $row) {
                $query1 = DB::table('gastosmensais')->where('id_gasto', $row->id_gasto)
                                ->where('id_user', $id_user)->get();
                if ($query->num_rows() > 0) {
                    foreach ($query1 as $row1) {
                        $gastosmensais[$designacao]['id_gasto'][$i] = $row1->id_gasto;
                        $gastosmensais[$designacao]['gasto'][$i] = $row1->gasto;
                        $gastosmensais[$designacao]['pagamento'][$i] = $row1->pagamento;
                        $gastosmensais[$designacao]['data'][$i] = $row1->data;
                        $i++;
                        $total= $total + $row1->total;
                    }
                }
            }
            $gastosmensais[$designacao]['total'] = $total;
       
        return $gastosmensais;
    }

    public static function listardesignacao() {
        $designacao=array(array());
        $query = DB::table('designacao')->get();

        $i = 0;

        foreach ($query as $row) {
            $designacao['id_designacao'][$i] = $row->id_designacao;
            $designacao['designacao'][$i] = $row->designacao;
            $i++;
        }

        return $designacao;
    }

    public static function listarpagamentos() {
//Funcao de Listagem para a tabela principal

        $pagamentos = array('id_pagamento' => array(null), 'id_designacao' => array(null), 'pagamento' => array(null), 'total' => 0);
        $query = DB::table('pagamentos')->get();

        $i = 0;

        foreach ($query as $row) {
            $pagamentos['id_pagamento'][$i] = $row->id_pagamento;
            $pagamentos['id_designacao'][$i] = $row->id_designacao;
            $pagamentos['pagamento'][$i] = $row->pagamento;
            $i++;
        }
        return $pagamentos;
    }

    public static function updateGasto($id_gasto, $gasto, $selected, $date) {
        $query = DB::table('pagamentos')->where('pagamento', $selected)->get();
        $id_pagamento = '';
        $i = 0;
        foreach ($query as $row) {
            $id_pagamento = $row->id_pagamento;
        }

        $data = array(
            'gasto' => $gasto,
            'pagamento' => $id_pagamento,
            'data' => $date
        );
        $this->db->where('id_gasto', $id_gasto);
        $this->db->update('gastosmensais', $data);
    }

    public static function insertGasto($mes, $email) {
        $id_user = users::getId_user($email);
        $query = DB::table('mes')->where('designacao', $mes);

        foreach ($query->result() as $row) {
            $id_mes = $row->id_mes;
        }

        $data = array(
            'id_user' => $id_user,
            'gasto' => 0,
            'pagamento' => 0,
            'data' => date("Y-m-d"),
            'total' => 0
        );

        DB::insert('gastosmensais', $data);

        $query = db::table('gastosmensais')->where($gasto, '0')
                        ->where('pagamento', 0)
                        ->where('data', date("Y-m-d"))->get();

        foreach ($query->result() as $row) {
            $id_gasto = $row->id_gasto;
        }
        $data = array('id_mes' => $id_mes,
            'id_gasto' => $id_gasto);

        $this->db->insert('mes_gasto', $data);
    }

    public static function eliminarGasto($id_gasto) {
        $this->db->where('id_gasto', $id_gasto);
        $this->db->delete('mes_gasto');

        $this->db->where('id_gasto', $id_gasto);
        $this->db->delete('gastosmensais');
    }

    public static function insere_gasto_arquivo($mes, $username) {
        $total = 0;
        $id_user = users::getId_user($username);
        $query = $this->db->query("SELECT id_mes,designacao FROM mes WHERE designacao='" . $mes . "'");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $id_mes = $row->id_mes;
            }
        }

        $query = $this->db->query("SELECT id_gasto FROM mes_gasto WHERE id_mes='" . $id_mes . "'");

        $i = 0;
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $query1 = $this->db->query("SELECT gasto,data FROM gastosmensais WHERE id_gasto='" . $row->id_gasto . "'");
                if ($query1->num_rows() > 0) {
                    foreach ($query1->result() as $row1) {
                        $total += $row1->gasto;
                    }
                }
            }
        }
        $data = array('id_user' => $id_user, 'id_mes' => $id_mes);
        $this->db->insert('user_mes_fecho', $data);

        $query = DB::table('user_mes_fecho')->where('jlksdfjl',$mes)->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $id_user_mes_fecho = $row->id_user_mes_fecho;
            }
        }


        $data = array('id_user_mes_fecho' => $id_user_mes_fecho, 'gasto' => $total, 'data' => isset($row1->data) ? $row1->data : date('Y-m-d'),
        );
        $this->db->insert('arquivo_gasto', $data);
    }

    public static function verEstadoMes($mes, $username) {
        
        
        $id_user = users::getId_user($username);

        $query = DB::table('mes')->where('designacao',$mes)->get();

        foreach ($query as $row) {
            $id_mes = $row->id_mes;
        }


        $query = DB::table('user_mes_fecho')->where('id_mes',$id_mes)
                                           ->where('id_user',$id_user)->get();

        foreach ($query as $row) {
                return true;
            }
        
        return false;
    }
}
