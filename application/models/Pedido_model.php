<?php
    class Pedido_model extends CI_Model
    {

        public function pesquisar ($flpendente)
        {
            $this->db->select('E.nome, E.id as id_empresa , E.razao_social, PLE.valor_plano as valor , PLE.id_empresa, E.fl_pendente, TPL.nome as plano, TPL.tipo_planos as tipo_plano');
            $this->db->from('empresa as E');
            $this->db->join('planos_empresa as PLE' ,' E.id = PLE.id_empresa' );
            $this->db->join('tipo_planos as TPL' ,  'PLE.id_plano = TPL.id ');
            $this->db->where('E.fl_pendente', $flpendente);
            $this->db->order_by('PLE.valor_plano', 'DESC');
            
            $query = $this->db->get();

            return $query; 


        }

         public function AtualizarPedido($id)
        {
           
            $this->db->set('fl_pendente' , 0);
            $this->db->where('id' , $id);
            $this->db->update('empresa');


            if($this->db->affected_rows() > 0 )
            {
                echo "true" ;
                exit;
                return true ; 

            }
            echo "false" ;
                exit;
            return false ;

           

        }

        






    }






?>