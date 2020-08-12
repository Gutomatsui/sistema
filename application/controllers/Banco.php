<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Banco extends CI_Controller
{

	public function index()
	{

		$query = $this->db->get('banco');


		$data['view'] = 'banco/list';
		$data['dados']  = $query;

		$this->load->view('master', $data); 

	}


    public function pesquisar($id)
	{
		$this->load->model('Banco_model');
		$resultado = $this->Banco_model->pesquisar($id);

		echo json_encode($resultado->result());
	}

	public function create($id = 0)
	{
		$data['view'] = 'banco/v_create';
		$this->load->model('Banco_model');
		$data['id'] = $id;
		$this->load->view('master', $data);
	}


	public function store()
	{
		$dados = array(
		"id"=> $this->input->post('id'),
		"nome_banco" =>$this->input->post('nome_banco'),
		"mora"=> $this->input->post('mora'),
		"juros_ativo"=> $this->input->post('juros_ativo'),
		"valor_boleto"=> $this->input->post('valor_boleto')

		);

		//var_dump($dados);
		//exit;

		$this->load->model('Banco_model');

		if($this->Banco_model->gravar($dados))
		{
			$response = array(
				'status' => true,
				'message' => 'Success'
			);

			echo json_encode($response);
			return;
			
		}else{
			echo json_decode("error");
			return;
		}

	}


    
}

    ?>