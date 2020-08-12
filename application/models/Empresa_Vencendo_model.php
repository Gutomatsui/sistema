<?php

class Empresa_Vencendo_model extends CI_Model
{

    public $id;
    public $nome;
    public $razao_social;
    public $dt_inicio_contrato;
    public $dt_fim_cotrato;
    public $dias_fim_contrato;
    public $fl_contrato_vencido;

    public function Listar30DiasContratoVencer()
    {
        $this->db->select(' id, nome, razao_social, dt_inicio_contrato, dt_fim_cotrato, dias_fim_contrato, fl_contrato_vencido ');
        $this->db->from(' empresa');
        
        $this->db->where(' dias_fim_contrato <= ', 30);

        $query = $this->db->get();

        
       // var_dump($query);
       // exit;

        return $query;


    }

}
