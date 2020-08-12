<?php

class Tipo_Tributacao_model extends CI_Model
{

    public function ListaTipoTributacao()
    {
        $this->db->select('*');
        $this->db->from(' tipo_tributacao ');
        $this->db->where(' fl_ativo ', true);
        

        $query = $this->db->get();

        return $query;
    }
}