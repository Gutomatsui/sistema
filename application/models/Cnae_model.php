<?php

class Cnae_model extends CI_Model
{
    // public id;

    
    public $numero_cnae;
    public $nome_cnae;
  

    public function pesquisar($id)
    {
        $this->db->select('*');
        $this->db->from('cnae');
        $this->db->where('id', $id);

        $query = $this->db->get();

        return $query;

    }


    public function gravar($dados)
    {
        $this->numero_cnae = $dados["numero_cnae"];
        $this->nome_cnae = $dados["nome_cnae"];
      

        if($dados["id"] == 0)
        {
            $this->db->insert('cnae', $this);
            $this->db->insert_id();

        }

            return true ;

    }

    




}







?>