<?php

    class Faturamento_model extends CI_Model
    {
        public $id_empresa;
        public $fl_ativo;
        public $plano;
        public $tipo_plano;
        public $valor_plano;
        public $juros;
        public $id_status;
        public $numero_contrato;
        public $cnae;
        public $descricao_servicos; 
        public $qtd_parcelas; 
        public $vencimento_original;
        public $mora;
        public $valor_total_liquido;
        public $numero_nota_fiscal;
        public $data_competencia_nota_fiscal;
        public $desconto_boleto;
        public $forma_pagamento;  
       




        public function pesquisar($id)
        {   
            $this->db->select($id);
            $this->db->from('empresa');
            $this->db->where('id', $id);

            $query = $this->db->get();
            return $query;


        }


        public function gravar($dados)
        {
            $this->id_empresa =         $dados["id_empresa"];
            $this->plano =              $dados["plano"];
            $this->tipo_plano =         $dados["tipo_plano"];
            $this->valor_plano =        $dados["valor_plano"];
            $this->cnae =               $dados["cnae"];
            $this->descricao_servicos = $dados["descricao_servicos"];
            $this->juros =              $dados["juros"];
            $this->mora =               $dados["mora"];
            $this->qtd_parcelas =       $dados["qtd_parcelas"];
            



            if($dados["id"] == 0)
            {
                $this->db->insert('contas_receber', $this);
                $this->db->insert_id();
    
            }
                // Editar dados do banco
             else
             {
                $this->db->where('id', $dados ["id"]);
                $this->db->update('contas_receber' , $this);
             }
    
             if($this->db->affected_rows() > 0)
             {
                 $retorno = true ;
             }
    
             return $retorno;
    
        }




        }


        










    





?>