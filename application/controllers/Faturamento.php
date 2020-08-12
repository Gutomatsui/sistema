<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Faturamento extends  CI_Controller
{
    public function index ()
    {
        $query = $this->db->get('empresa');
        
     

        $data['view'] = 'faturamento/list';
        $data['dados'] = $query;

        $this->load->view('master', $data);



    }

    public function pesquisar($id)

    {
        $this->load->model('Pedido_model');
        $resultado =$this->pedido_model->pesquisar($id);

        echo json_encode($resultado->result());


    }


    public function listarTipoPlano($id)

    {
        $this->load->model('Tipo_plano_model');
        $resultado =$this->Tipo_plano_model->ListaTipoPlano($id);

        echo json_encode($resultado->result());


    }

    public function ListarValor($id)

    {
        $this->load->model('Tipo_plano_model');
        $resultado =$this->Tipo_plano_model->ListarValor($id);

        echo json_encode($resultado->result());

    }

    public function ListarJurosBanco ($id)
    {
        $this->load->model('Tipo_Plano_model');
        $resultado = $this->Tipo_Plano_model->ListarJurosBanco($id);

        echo json_encode($resultado->result()); 



    }



    public function create ($id)
        {
            $data['view'] = 'faturamento/create';
            $this->load->model(array('Faturamento_model' ,  'Tipo_Plano_model' ));
            $data['id'] = $id;

            $data['ListarCnae'] = $this->Tipo_Plano_model->ListarCnae();

            $data['listaNomePlano'] = $this->Tipo_Plano_model->ListaNomePlano();

            $data['ListarBanco'] = $this->Tipo_Plano_model->ListarBanco();
           

            $this->load->view('master', $data);


        }


        public function store()
        {
            $dados = array(
            
            "id_empresa"=> $this->input->post('id_empresa'),
            "fl_ativo"=> $this->input->post('fl_ativo'),
            "plano"=> $this->input->post('plano'),
            "tipo_plano"=> $this->input->post('tipo_plano'),
            "valor_plano"=> $this->input->post('valor_plano'),
            "juros"=> $this->input->post('juros'),
            "id_status"=> $this->input->post('id_status'),
            "numero_contrato"=> $this->input->post('numero_contrato'),
            "cnae"=> $this->input->post('cnae'),
            "descricao_servicos"=> $this->input->post('descricao_servicos'),
            "qtd_parcelas"=> $this->input->post('qtd_parcelas'),
            "vencimento_original"=> $this->input->post('vencimento_original'),
            "mora"=> $this->input->post('mora'),
            "valor_total_liquido"=> $this->input->post('valor_total_liquido'),
            "numero_nota_fiscal"=> $this->input->post('numero_nota_fiscal'),
            "data_competencia_nota_fiscal"=> $this->input->post('data_competencia_nota_fiscal'),
            "desconto_boleto"=> $this->input->post('desconto_boleto'),
            "forma_pagamento"=> $this->input->post('forma_pagamento')

           
    
            );
    
            //var_dump($dados);
            //exit;
    
            $this->load->model('Faturamento_model');
    
            if($this->Faturamento_model->gravar($dados))
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