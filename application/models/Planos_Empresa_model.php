<?php

class Planos_Empresa_model extends CI_Model
{

    public function ListaPlanosEmpresa()
    {
        $this->db->select(' * ');
        $this->db->from(' planos_empresa');
        //$this->db->where(' fl_ativo ', true);
        
        $query = $this->db->get();
        
        return $query;
    }


    


    
}




