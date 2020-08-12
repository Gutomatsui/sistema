<?php

class Tipo_Empresa_model extends CI_Model
{

    public function ListaTipoEmpresa()
    {
        $this->db->select(' * ');
        $this->db->from(' tipo_empresa ');
        //$this->db->where(' fl_ativo ', true);
        

        $query = $this->db->get();
        
        return $query;
    }
}