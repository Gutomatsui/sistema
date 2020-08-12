<?php

class Menu_model extends CI_Model
{
    public function login($email, $senha)
    {
        $this->db->select('*');
        $this->db->from(' usuario ');
        $this->db->where(' email ', $email );
        $this->db->where(' senha ', $senha );

        $query = $this->db->get();

        
        return $query;
    }


    
}
?>