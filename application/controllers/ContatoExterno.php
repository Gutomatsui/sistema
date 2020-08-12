<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ContatoExterno extends CI_Controller
{
    public function __construct($config = 'rest')
{
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    parent::__construct();
}

    public function teste()
	{
		$response = array(
                'status' => false,
                'message' => 'teste de get'
            );
    
            echo json_encode($response);
           
    }
    
    public function msg_externa()
	{
        $this->load->model('Contato_Externo_model');

        if($this->input->post('nome') == "" || $this->input->post('assunto') == "" || $this->input->post('cnpj_cpf') == "" || $this->input->post('nome_contato') == "" || 
        $this->input->post('email') == "" || $this->input->post('mensagem') == "" || $this->input->post('fl_migrar') == "" || $this->input->post('newsletters') == "")
        {
            $response = array(
                'status' => false,
                'message' => 'Todos os campos devem ser enviados'
            );
    
            echo json_encode($response);
            return;
        }

        $dados = array(
			"nome" => $this->input->post('nome'),
			"assunto" => $this->input->post('assunto'),
			"cnpj_cpf" => $this->input->post('cnpj_cpf'),
			"nome_contato" =>  $this->input->post('nome_contato'),
            "email" => $this->input->post('email'),
            "mensagem" => $this->input->post('mensagem'),
            "fl_migrar" => $this->input->post('fl_migrar'),
            "newsletters" => $this->input->post('newsletters'),
            "celular" => $this->input->post('celular'),
            "telefone" => $this->input->post('telefone')
        );
        
        $id = 	$this->Contato_Externo_model->Gravar($dados);

        if($id > 0)
        {
            $response = array(
                'status' => true,
                'message' => 'Success'
            );

            echo json_encode($response);
		    return;
        }

        $response = array(
            'status' => false,
            'message' => 'Error'
        );

        echo json_encode($response);
        return;

    }

}