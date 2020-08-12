<?php

class Banco_model extends CI_Model
{
    // public id;

    
    public $nome_banco;
    public $mora;
    public $juros_ativo;
    public $valor_boleto;


    public function pesquisar($id)
    {
        $this->db->select('*');
        $this->db->from('banco');
        $this->db->where('id', $id);

        $query = $this->db->get();

        return $query;

    }


    public function gravar($dados)
    {
        $this->nome_banco = $dados["nome_banco"];
        $this->mora = $dados["mora"];
        $this->juros_ativo = $dados["juros_ativo"];
        $this->valor_boleto = $dados["valor_boleto"];

        if($dados["id"] == 0)
        {
            $this->db->insert('banco', $this);
            $this->db->insert_id();

        }
            // Editar dados do banco
         else
         {
            $this->db->where('id', $dados ["id"]);
            $this->db->update('banco' , $this);
         }

         if($this->db->affected_rows() > 0)
         {
             $retorno = true ;
         }

         return $retorno;

    }

    




}







?>