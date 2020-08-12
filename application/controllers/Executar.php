<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Executar extends CI_Controller
{
    public function BloquearDiretorios()
	{
        $this->db->select('id ');
        $this->db->from(' diretorio_arquivos ');
        //$this->db->join('empresa', 'empresa.id = diretorio_arquivos.id_empresa');
        $this->db->where(' dt_bloqueio is not null and fl_bloqueado = false and dt_bloqueio < now() ');


		$query = $this->db->get();

        foreach ($query->result() as $row) {

            $this->db->query("update diretorio_arquivos set fl_bloqueado = 1 where id = " . $row->id);

        }

        $response = array(
            'status' => true,
            'message' => 'BloquearDiretorios'
        );

        $ch = curl_init( "" );
        $msg = "Atualizado certificados e Contratos";

        $data = array("text" => $msg);                                                                    
        $data_string = json_encode($data);                                                                                   
                                                                                                                            
        $ch = curl_init('https://hooks.slack.com/services/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');                                                                      
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
            'Content-Type: application/json',                                                                                
            'Content-Length: ' . strlen($data_string))                                                                       
        );                                                                                                                   
                                                                                                                            
        $result = curl_exec($ch);
        
        echo json_encode($response);


    }

    public function CertificadosAtualizar()
	{
        $this->db->query("call AtualizarCertificados");
        $this->db->query("call AtualizarContrato");

     
        $ch = curl_init( "" );
        $msg = "Atualizado certificados e Contratos";

        $data = array("text" => $msg);                                                                    
        $data_string = json_encode($data);                                                                                   
                                                                                                                            
        $ch = curl_init('https://hooks.slack.com/services/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');                                                                      
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
            'Content-Type: application/json',                                                                                
            'Content-Length: ' . strlen($data_string))                                                                       
        );                                                                                                                   
                                                                                                                            
        $result = curl_exec($ch);




    }


    public function teste()
    {



       
       

        
    }
    





}

?>