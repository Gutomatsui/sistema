<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pedido extends CI_Controller
{

	public function index()
	{
		$this->load->model('Pedido_model');
		$query = $this->Pedido_model->pesquisar (1);
	 

		$data['view'] = 'pedido/list';
		$data['dados']  = $query;

		$this->load->view('master', $data); 

	}

	public function ConfirmarPedido($id)
	{
		
		$this->load->model('Pedido_model');
		$status = $this->Pedido_model->AtualizarPedido($id);
			
		 return  json_encode($status);

	}


   


	

	
	




    
}

    ?>