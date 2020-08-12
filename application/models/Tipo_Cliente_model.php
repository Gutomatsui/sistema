<?php

class Tipo_Cliente_model extends CI_Model
{

    public function ListaTiposClientes()
    {
        $this->db->select('*');
        $this->db->from(' tipo_cliente ');
       
        

        $query = $this->db->get();

        return $query;
    }
}