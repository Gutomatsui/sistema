<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Replicar extends CI_Controller
{
    public function index()
	{
		$data['view'] = 'replicar/index';

		$this->load->model(array('Tipo_Tributacao_model','Diretorio_model'));

		$query = $this->Diretorio_model->ListaEmpresaDiretorio(68); 
		
		$data['dados'] = $query;

		$data['listaTipoTributacao'] = $this->Tipo_Tributacao_model->ListaTipoTributacao();

		$this->load->view('master', $data);
    }
    
	public function replicar_dir($id_empresa,$id_diretorio) 
	{
		$this->load->model(array('Replicar_model'));

		$this->Replicar_model->ReplicarDiretorio($id_empresa, $id_diretorio);

		$response = array(
			'status' => true,
			'message' => 'Success'
		);
		
		echo json_encode($response);

	}
    


}

