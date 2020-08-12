<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Diretorio extends CI_Controller
{
	public function index($id = 0, $id_dir = 0)
	{
		$this->load->model(array('Empresa_model','Diretorio_model'));

		if($id_dir != "0" && ($_SESSION['id_perfil'] == 6 || $_SESSION['id_perfil'] == 5))
		{
			$fl_bloqueado = $this->Diretorio_model->DiretorioBloqueado($id_dir);
			$privato = 0;
		}
		else
		{
			$fl_bloqueado = false;
			$privato = 1;
		}

		$editar = 0;

		if($_SESSION['id_perfil'] == 2 || $_SESSION['id_perfil'] == 3)
		{
			$editar = 1;
		}
		
		$data['editar'] = $editar;

		$query = $this->Diretorio_model->ListaEmpresaDiretorio($id, null, $privato); 

		if($id_dir <> 0)
		{
			$nome_dir = $this->Diretorio_model->PesquisaNomeDir($id_dir);
			//var_dump($nome_dir); exit;

			$data['nome_dir'] = $nome_dir[0]->nome;
			$data['id_pai'] = $nome_dir[0]->id_pai;
			$data["caminho"] =$nome_dir[0]->caminho ;
		}
		else
		{
			$data['nome_dir'] = "";
			$data['id_pai'] = 0;
			$data["caminho"] = "" ;
		}
		


		$data['id_empresa'] = $id;
		$data['fl_bloqueado'] = $fl_bloqueado;
		$data['id_diretorio'] = $id_dir;
		$data['view'] = 'diretorio/index';
		$data['dados'] = $query;

		$var = $this->Empresa_model->nome_empresa($id);
		$data["NomeEmpresa"] =$var->nome ;
		

		$this->load->view('master', $data);
	}

	public function publico()
	{
		$this->load->model('Diretorio_model');

		//echo $this->input->post('id'); exit;

		$this->Diretorio_model->TornarPublico($this->input->post('id'));
		
		$response = array(
			'status' => true,
			'message' => 'Success'
		);
		 echo json_encode($response);
		 return;

	}

	public function mkdir()
	{

		$this->load->model('Diretorio_model');
		
		$id_pai = $this->input->post('id_diretorio');

		if($id_pai== "0")
		{
			$id_pai = null;
		}

		$dados = array(
			"id_pai" => $id_pai,
			"nome" => $this->input->post('nome_diretorio'),
			"descricao" => $this->input->post('descricao_diretorio'),
			"id_usuario" => $_SESSION['id'],
			"id_empresa" => $this->input->post('id_empresa'),
			"dt_bloqueio" => $this->input->post('dt_bloqueio'),
			"fl_privado" => $this->input->post('fl_privado'),
			"caminho" => $this->input->post('caminho') == "" ? $this->input->post('nome_diretorio') : $this->input->post('caminho')  . " / " . $this->input->post('nome_diretorio')
			
		);

		$this->Diretorio_model->NovoDiretorio($dados);
		
		$response = array(
			'status' => true,
			'message' => 'Success'
		);
		 echo json_encode($response);
		 return;
	}
	
	public function listar($id, $id2 = null)
	{
		$this->load->model('Diretorio_model');

			if($id2 == 0)
			{
				$id2 = null;
			}
		
			$query = $this->Diretorio_model->ListaEmpresaDiretorio($id,$id2);

		echo json_encode($query->result());
		return;
	}

	public function upload()
	{
		$this->load->model('Diretorio_model');
		
		$id_pai = $this->input->post('id_diretorio');

		if($id_pai== "0")
		{
			$id_pai = $this->input->post('id_empresa');
		}

		$filename = $_FILES['file']['name'];
			
		$location = "uploads/". $id_pai ."/".$filename;

		if (!file_exists('uploads/' . $id_pai )) 
        {
            mkdir('uploads/' . $id_pai , 0777, true);
        }

		if (file_exists($location)) {
			$response = array(
				'status' => true,
				'message' => 'Success'
			);

			if (move_uploaded_file($_FILES['file']["tmp_name"], $location)) {
				//echo "Arquivo válido e enviado com sucesso.\n";
			} else {
				//echo "Possível ataque de upload de arquivo!\n";
			}

			echo json_encode($response);
			return;
		} 

		$dados = array(
			"id_pai" => $id_pai,
			"nome" => $filename,
			"descricao" => $this->input->post('descricao_diretorio'),
			"id_usuario" => $_SESSION['id'],
			"id_empresa" => $this->input->post('id_empresa')
		);

		
		$this->Diretorio_model->NovoArquivo($dados);

		$filename = $_FILES['file']['name'];

		$location = "uploads/". $id_pai ."/".$filename;
		
		$uploadOk = 1;
	
		//($_FILES['file']['tmp_namemove_uploaded_file'],$location)
			
		if (move_uploaded_file($_FILES['file']["tmp_name"], $location)) {
			//echo "Arquivo válido e enviado com sucesso.\n";
		} else {
			//echo "Possível ataque de upload de arquivo!\n";
		}


			
			$response = array(
				'status' => true,
				'message' => 'Success'
			);

			echo json_encode($response);
			return;

	}

	public function pesquisar($id)
	{
		$this->load->model('Diretorio_model');

		$resultado = $this->Diretorio_model->PesquisarDiretorio($id);

		echo json_encode($resultado->result());

	}

	public function atualizar()
	{

		$dados = array(
			"id" => $this->input->post('id'),
			"nome" => $this->input->post('nome'), 
			"descricao_diretorio" => $this->input->post('descricao_diretorio'),
			"dt_bloqueio" => $this->input->post('dt_bloqueio')
		);

		$this->load->model('Diretorio_model');

		$resultado = $this->Diretorio_model->AtualizarDiretorio($dados);

		$response = array(
			'status' => $resultado,
			'message' => 'Success'
		);

		echo json_encode($response);


	}
	
	public function copiar($id_dir, $id_empresa)
	{




		
	}

}

?>