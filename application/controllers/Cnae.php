<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cnae extends CI_Controller
{

	public function index()
	{

		$query = $this->db->get('cnae');


		$data['view'] = 'cnae/list';
		$data['dados']  = $query;

		$this->load->view('master', $data); 

	}


    public function pesquisar($id)
	{
		$this->load->model('Cnae_model');
		$resultado = $this->Cnae_model->pesquisar($id);

		echo json_encode($resultado->result());
	}

	public function create($id = 0)
	{
		$data['view'] = 'cnae/v_create';
		$this->load->model('Cnae_model');
		$data['id'] = $id;
		$this->load->view('master', $data);
	}


	public function store()
	{
		$dados = array(
		"id"=> $this->input->post('id'),
		"numero_cnae" =>$this->input->post('numero_cnae'),
		"nome_cnae"=> $this->input->post('nome_cnae'),
	
		);

		//var_dump($dados);
		//exit;

		$this->load->model('Cnae_model');

		if($this->Cnae_model->gravar($dados))
		{
			$response = array(
				'status' => true,
				'message' => 'Success'
			);

			echo json_encode($response);
			return;
			
		}else{
			echo json_decode("erro");
			return;
		}

	}

	
	




    
}

    ?>