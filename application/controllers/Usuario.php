<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Usuario extends CI_Controller
{
	public function index($id)
	{
		$this->db->select('usuario.id, usuario.nome,  usuario.email, usuario.dt_cadastro, usuario.fl_ativo, empresa.nome empresa, perfil.nome perfil');
		$this->db->from('usuario');
		$this->db->join('empresa', 'empresa.id = usuario.id_empresa');
		$this->db->join('perfil', 'perfil.id = usuario.id_perfil');
		$this->db->where(' empresa.id ', $id);
		$query = $this->db->get();

		$data['view'] = 'usuario/list';
		$data['dados']  = $query;

		$data['id_empresa'] = $id;

		$this->load->view('master', $data);
	}

	public function create($id_e = 0, $id = 0)
	{
		$data['view'] = 'usuario/v_create';

		$this->load->model(array('Perfil_model'));
		
		$data['perfil'] = $this->Perfil_model->ListaPerfis();
		$data['id_empresa'] = $id_e;
		$data['id'] = $id;


		$this->load->view('master', $data);
	}
	

	public function store()
	{


			//$id = $this->input->post('id') == null ? 0 : $this->input->post('id');
			

			$dados = array(
				"id" => $this->input->post('id'),
				"nome" => $this->input->post('nome'), 
				"email" => $this->input->post('email'),
				"id_perfil" => $this->input->post('id_perfil'),
				"fl_ativo" => $this->input->post('fl_ativo'),
				"id_empresa" => $this->input->post('id_empresa')
			);

			$this->load->model('Usuario_model');

			if ($this->Usuario_model->gravar($dados)) {
				$response = array(
					'status' => true,
					'message' => 'Success'
				);
				 echo json_encode($response);
				 return;
			} else {
				 echo json_encode("erro");
				 return;
		}
		redirect('usuario/index/' . $this->input->post('txt_id_empresa'), 'refresh');
	}

	public function pesquisar($id)
	{
		$this->load->model('Usuario_model');

		$resultado = $this->Usuario_model->pesquisar($id);

		echo json_encode($resultado->result());
	}

	public function pesquisar_email($id)
	{
		$this->load->model('Usuario_model');

		$resultado = $this->Usuario_model->pesquisar_email($id);

		echo json_encode($resultado->result());
	}

	public function atualizar_senha()
	{
		$dados = array(
			"id" => $this->input->post('id'),
			"senha" => $this->input->post('senha'), 
			"rep_senha" => $this->input->post('rep_senha')
		);

		$this->load->model('Usuario_model');

		$resultado = $this->Usuario_model->atualizar_senha($dados);

		echo json_encode($resultado);
	}
}
