<?php

class Tipo_Porte_Empresa_model extends CI_Model
{

    public function ListaTipoPorteEmpresa()
    {
        $this->db->select('*');
        $this->db->from(' tipo_porte_empresa ');
        $this->db->where(' fl_ativo ', true);
        

        $query = $this->db->get();

        return $query;
    }
}