<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Planos extends CI_Controller
{

	public function index()
	{

		$query = $this->db->get('plano');


		$data['view'] = 'plano/list';
		$data['dados']  = $query;

		$this->load->view('master', $data); 

	}

    public function pesquisar($id)
	{
		$this->load->model('Planos_model');
		$resultado = $this->Planos_model->pesquisar($id);

		echo json_encode($resultado->result());
	}

	public function create($id = 0)
	{
		$data['view'] = 'planos/v_create';
		$this->load->model('Planos_model');
		$data['id'] = $id;
		$this->load->view('master', $data);
	}


	public function store()
	{
		$dados = array(
		"id"=> $this->input->post('id'),
		"id_empresa" =>$this->input->post('id_empresa'),
		"id_plano"=> $this->input->post('id_plano'),
		

		);

		//var_dump($dados);
		//exit;

		$this->load->model('Planos_model');

		if($this->Planos_model->gravar($dados))
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