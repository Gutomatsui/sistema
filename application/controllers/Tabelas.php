<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tabelas extends CI_Controller
{

    public function simples()
	{
        
        for ($i=1; $i < 13; $i++) 
        { 
            $mes = $this->input->post('hid_mes_'.$i);
            $ano = $this->input->post('hid_ano_'.$i);
            $receita = $this->input->post('txt_receita_'.$i);
            $despesa = $this->input->post('txt_despesa_'.$i);
            $total = $this->input->post('txt_total_'.$i);

            //echo $ano; exit;


            $this->db->where('ano', $ano );
            $this->db->where('mes', $mes);

            $this->db->set('receita', $receita);
            $this->db->set('despesa', $despesa);
            $this->db->set('total', $total);

            $this->db->update('tabela_simples');
            

        }
        redirect('/home', 'refresh');

        
	}


}