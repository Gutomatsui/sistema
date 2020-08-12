<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function index()
	{
		$data['view'] = 'home/index';

		$this->load->model(array('Empresa_model','Certificado_model','Tabela_Simples_model'));

		$resultado = $this->Certificado_model->Listar30DiasVencerTotal();

		$contrato = $this->Empresa_model->Listar30DiasVencerContratoTotal();

		$tipoEmpresa = $this->Empresa_model->PesquisaTipoEmpresa(  $_SESSION['id_empresa']);

		$data['idTipoEmpresa'] = $tipoEmpresa[0]->id_tipo_empresa;

		$data['lista_Simples']  = $this->Tabela_Simples_model->ListarAno(1,2020);

		$data['total_cert_vencer'] = $resultado->result();

		$data['total_contrato_vencer'] = $contrato->result();


		$this->load->view('master', $data);
	}

	public function login()
	{
		$_SESSION['nome'] = null;
		$this->load->view('home/login');
	}

	public function valida_login()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('txt_email', 'E-mail', 'required');
		$this->form_validation->set_rules('txt_password', 'Senha', 'required');

		if ($this->form_validation->run() == FALSE) {

			$this->load->view('home/login');
		}

		$email =  $this->input->post('txt_email');
		$senha =  $this->input->post('txt_password');

		$this->load->model('Login_model');

		$query = $this->Login_model->login($email, md5( $senha));

		if ($query->num_rows() > 0) {

			$row = $query->row_array();
			
			$_SESSION['nome'] = $row['nome'];
			$_SESSION['sobrenome'] = $row['sobrenome'];
			$_SESSION['email'] = $row['email'];
			$_SESSION['id'] = $row['id'];
			$_SESSION['id_perfil'] = $row['id_perfil'];
			$_SESSION['id_empresa'] = $row['id_empresa'];

			$_SESSION["Menu"] = $this->Login_model->menu($row['id_perfil']);

			redirect('/home', 'refresh');
		} else { 

			$data['msg'] = "E-mail ou senha incorretos.";
			$this->load->view('home/login', $data);

		}

	}

	public function logout()
	{
		session_unset();
    	session_destroy();

		redirect('/home/login', 'refresh');
	}

	public function esqueci_senha()
	{
		

		
	} 
}
