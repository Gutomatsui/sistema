<?php

class Tabela_Simples_model extends CI_Model
{
    public $ano; 
    public $id_empresa;
    public $mes;
    public $receita;
    public $despesa;
    public $total;
    public $fl_status;

    public function ListarAno($id_empresa, $ano)
    {
        $this->db->select('*');
        $this->db->from(' Tabela_Simples ');
        $this->db->where(' id_empresa ', $id_empresa);
        $this->db->where(' ano ', $ano);

        $query = $this->db->get();

        if($query->result() == null)
        {
            $this->ano  = date('Y');
            $this->id_empresa = $id_empresa;
            $this->receita = 0;
            $this->despesa = 0;
            $this->total = 0;
            $this->fl_status = 1;
        
            for ($i=1; $i < 13; $i++) { 
                
                $this->mes = $i;
                $this->db->insert('Tabela_Simples', $this);
            }
        }

        return $query;
    }

}