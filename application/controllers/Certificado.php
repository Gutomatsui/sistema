<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Certificado extends CI_Controller
{
	public function index($id)
	{
		$this->load->model('Empresa_model');

        $data['id_empresa'] = $id;
        $data['view'] = 'certificado/index';
		
		$var = $this->Empresa_model->nome_empresa($id);

		

		$data["NomeEmpresa"] = $var->nome ;

		$this->load->view('master', $data);
    }

    public function listar($id)
	{
		$this->load->model('Certificado_model');

			$query = $this->Certificado_model->Listar($id);
	
		

		echo json_encode($query->result());
		return;
    }
    
    public function novo()
	{

		$this->load->model('Certificado_model');
        
		$dados = array(
			"id" => $this->input->post('id'),
			"nome" => $this->input->post('nome'),
			"certificado" => $this->input->post('certificado'),
			"id_usuario" => $_SESSION['id'],
			"id_empresa" => $this->input->post('id_empresa'),
			"dt_validade" => $this->input->post('dt_validade'),
			"dt_inicio" => $this->input->post('dt_inicio')
		);

		$this->Certificado_model->NovoCertificado($dados);
		
		$response = array(
			'status' => true,
			'message' => 'Success'
		);
		 echo json_encode($response);
		 return;
	}

	public function delete($id)
	{
		$this->load->model('Certificado_model');

		$this->Certificado_model->DeletarCertificado($id);
		
		$response = array(
			'status' => true,
			'message' => 'Success'
		);

		echo json_encode($response);
		return;
	}

	public function pesquisar($id)
	{
		$this->load->model('Certificado_model');

		$resultado = $this->Certificado_model->pesquisar($id);

		echo json_encode($resultado->result());

	}

	public function vencendo()
	{

		$this->load->model('Certificado_model');

        
        $data['view'] = 'certificado/vencendo';
		

		$data["dados"] = $this->Certificado_model->Listar30DiasVencer();

		$this->load->view('master', $data);

	}

}
