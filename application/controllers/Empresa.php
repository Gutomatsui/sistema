<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Empresa extends CI_Controller
{

	public function index()
	{

		$this->load->model("empresa_model");
		$query = $this->empresa_model->ListarIndice();
	


		$data['view'] = 'empresa/list';
		$data['dados']  = $query;

		$this->load->view('master', $data);
		 
	}

	public function create($id = 0)
	{
		$data['view'] = 'empresa/v_create';
		
		$this->load->model(array('Empresa_model','Tipo_Empresa_model','Tipo_Regime_Apuracao_model', 'Tipo_Porte_Empresa_model','Tipo_Tributacao_model','Tipo_Cliente_model'));

		$data['id'] = $id;

		$data['listaTipoEmpresa'] = $this->Tipo_Empresa_model->ListaTipoEmpresa();
		$data['listaTipoRegimeApuracao'] = $this->Tipo_Regime_Apuracao_model->ListaTipoRegimeApuracao();
		$data['listaTipoPorteEmpresa'] = $this->Tipo_Porte_Empresa_model->ListaTipoPorteEmpresa();
		$data['listaTipoTributacao'] = $this->Tipo_Tributacao_model->ListaTipoTributacao();
		$data['listaTipoCliente'] = $this->Tipo_Cliente_model->ListaTiposClientes();
		

		$this->load->view('master', $data);
	}

	public function store()
	{
		$dados = array(
			"id" => $this->input->post('id'),
			"nome" => $this->input->post('nome'),
			"razao_social" => $this->input->post('razao_social'),
			"cnpj" => $this->input->post('cnpj'),
			"email" => $this->input->post('email'),
			"fl_ativo" => $this->input->post('fl_status'),
			"id_tipo_empresa" => $this->input->post('id_tipo_empresa'),
			"id_tipo_regime" => $this->input->post('id_tipo_regime_apuracao'),
			"id_tipo_porte_empresa" => $this->input->post('id_tipo_porte_empresa'),
			"id_tipo_tributacao" => $this->input->post('id_tipo_tributacao'),
			"id_tipo_cliente" => $this->input->post('id_tipo_cliente'),
			"fone1" => $this->input->post('fone1'),
			"fone2" => $this->input->post('fone2'),
			"cep" => $this->input->post('cep'),
			"endereco" => $this->input->post('endereco'),
			"numero" => $this->input->post('numero'),
			"bairro" => $this->input->post('bairro'),
			"cidade" => $this->input->post('cidade'),
			"uf" => $this->input->post('uf'),
			"complemento" => $this->input->post('complemento'),
			"fl_pendente" => $this->input->post('fl_pendente'),
			"id_plano" => $this->input->post('id_plano'),
			"valor_plano" => $this->input->post('valor_plano'),
		
		
			
		);

		//var_dump($dados);exit;

			$this->load->model('Empresa_model');
			$retorno =$this->Empresa_model->gravar($dados);
			if ($retorno['status']== true) {
				$response = array(
					'status' => true,
					'message' => 'Success',
					'protocolo'=> $retorno['protocolo'],
				);
				 echo json_encode($response);
				 return;
			} else {
				 echo json_encode("erro");
				 return;
		}
	}

	public function pesquisar($id)
	{
		$this->load->model('Empresa_model');

		$resultado = $this->Empresa_model->pesquisar($id);

		echo json_encode($resultado->result());

	}

	public function pesquisar_cnpj_cpf($id)
	{
		$this->load->model('Empresa_model');

		$resultado = $this->Empresa_model->pesquisar_cnpj_cpf($id);

		echo json_encode($resultado->result());

	}

	public function add_contrato()
	{
		$filename = $_FILES['file']['name'];$filename1 = $_FILES['file']['name'];
		//var_dump($filename1);exit;

		$this->load->model('Planos_Empresa_model');

		$id = $this->input->post('id');
		$dt_inicio_contrato = $this->input->post('dt_inicio_contrato');
		$dt_fim_cotrato = $this->input->post('dt_fim_cotrato');

		$location = "uploads/". $id ."/".$filename;
		
		//if (!file_exists($location)) {
			

			if (move_uploaded_file($_FILES['file']["tmp_name"], $location)) {

				$resultado = $this->Empresa_model->GravarContrato($id,$filename,$dt_inicio_contrato,$dt_fim_cotrato  );

				$response = array(
					'status' => true,
					'message' => 'Success'
				);	
				//echo "Arquivo válido e enviado com sucesso.\n";
			} else {
				$response = array(
					'status' => false,
					'message' => 'Success'
				);//echo "Possível ataque de upload de arquivo!\n";
			}

			echo json_encode($response);
			return;
	//	} 


	}


	public function listar($id = 0)
	{

		
		if($id <> 0)
		{
			$this->db->where(' id_tipo_tributacao = '. $id);
		}

		$query = $this->db->get('empresa');


		echo json_encode($query->result());
			return;
	}
	
	public function vencendo()
	{

		$this->load->model('Empresa_Vencendo_model');

		$data['view'] = 'empresa/vencendo';
    
		

		$data["dados"] = $this->Empresa_Vencendo_model->Listar30DiasContratoVencer();

		$this->load->view('master', $data);

	}



	public function detalhe($id)
	{
		$this->load->model('Empresa_model');

		$data['view'] = 'empresa/detalhe';

		$data["dados"] = $this->Empresa_model->pesquisar($id)->row();

		//$data['row'] = $this->Tipo_Regime_Apuracao_model->ListaTipoRegimeApuracao($id)->row();

		
		//var_dump($data["dados"]);
		//exit;

		$this->load->view('master', $data);

	}

	public function teste()
	{
		$this->load->model('Empresa_model');

		$this->Empresa_model->GerarProtocolo("s");


	}


	



}
