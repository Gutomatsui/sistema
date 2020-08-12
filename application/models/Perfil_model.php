<?php

class Perfil_model extends CI_Model
{

    public function ListaPerfis()
    {
        $this->db->select('*');
        $this->db->from(' perfil ');
        $this->db->where(' fl_ativo ', true);
        

        $query = $this->db->get();

        return $query;
    }
}