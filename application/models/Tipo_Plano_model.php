<?php

class Tipo_Plano_model extends CI_Model
{

    public function ListaNomePlano()
    {
        $this->db->select('nome , id_grupo_plano');
        $this->db->from(' tipo_planos');
        $this->db->group_by('id_grupo_plano');
       
        $query = $this->db->get();

        return $query;
    }


    public function ListaTipoPlano($id_tipo_plano)
    {
        $this->db->select('tipo_planos , id');
        $this->db->from(' tipo_planos');
        $this->db->where('id_grupo_plano' , $id_tipo_plano);
         
       
        $query = $this->db->get();

        return $query;
    }


    public function ListarValor($id_tipo_plano)
    {   
        $this->db->select('valor');
        $this->db->from('tipo_planos');
        $this->db->where('id' , $id_tipo_plano);

        $query = $this->db->get();

        return $query;


    }

    public function ListarCnae()
    {
        $this->db->select('*');
        $this->db->from ('cnae');
        $this->db->order_by('nome_cnae');

        $query = $this->db->get(); 

        return $query; 
        

    }

    public function ListarBanco()

    {

    $this->db->select('*');
    $this->db->from('banco');
    $this->db->order_by('nome_banco');
    
    $query = $this->db->get(); 

    return $query; 


    }



    public function ListarJurosBanco ($id)

    {
        $this->db->select('juros_ativo, mora, valor_boleto');
        $this->db->from('banco');
        $this->db->where('id', $id);

        $query = $this->db->get() ;

         return $query; 



    }




}