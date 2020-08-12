<?php

class Certificado_model extends CI_Model
{
    public $nome;
    public $certificado;
    public $dt_inicio;
    public $dt_validade;
    public $fl_vencido;
    public $dias_vencimento; 
    public $id_empresa;
    public $id_usuario;


    public function Listar($id, $filtro = "")
    {
        $this->db->select('*');
        $this->db->from(' empresa_certificado ');
        $this->db->where(' id_empresa ', $id);

        $query = $this->db->get();

        return $query;
    }

    public function NovoCertificado($dados)
    {



        $hj = new DateTime(substr($dados["dt_validade"], 6) . "-" . substr($dados["dt_validade"], 3,-5) . "-" . substr($dados["dt_validade"], 0,-8));  
        $now = new DateTime(date('Y-m-d'));  // or your date as well

        $data_inicio = $now;
        $data_fim = $hj;
    
        $dateInterval = $data_inicio->diff($data_fim);

        $this->nome = $dados["nome"] ;
        $this->certificado = $dados["certificado"] ;
        $this->fl_vencido = false;
        $this->id_usuario = $dados["id_usuario"];
        $this->dias_vencimento = $dateInterval->days;
        $this->id_empresa =  $dados["id_empresa"];

        $this->dt_inicio =  $dados["dt_inicio"] == "" ? null : substr($dados["dt_inicio"], 6) . "/" . substr($dados["dt_inicio"], 3,-5) . "/" . substr($dados["dt_validade"], 0,-8)    ;
        $this->dt_validade =  $dados["dt_validade"] == "" ? null : substr($dados["dt_validade"], 6) . "/" . substr($dados["dt_validade"], 3,-5) . "/" . substr($dados["dt_validade"], 0,-8)    ;

        if($dados["id"] == 0)
        {
            $this->db->insert('empresa_certificado', $this);
        }else
        {
            $this->db->where('id', $dados["id"]);
            $this->db->update('empresa_certificado', $this);
        }
        
    }

    public function DeletarCertificado($id)
    {

        $this->db->where('id', $id);
        $this->db->delete('empresa_certificado');

    }

    public function pesquisar($id)
    {
        $this->db->select('*');
        $this->db->from(' empresa_certificado ');
        $this->db->where(' id ', $id);

        $query = $this->db->get();

        return $query;
    }

    public function Listar30DiasVencer()
    {
        $this->db->select(' empresa_certificado.id, empresa_certificado.nome, empresa_certificado.certificado, empresa_certificado.dt_validade, empresa_certificado.dt_inicio ,empresa_certificado.dias_vencimento, empresa_certificado.fl_vencido, empresa.nome nome_empresa ');
        $this->db->from(' empresa_certificado');
        $this->db->join(' empresa ', 'empresa_certificado.id_empresa = empresa.id' );
        $this->db->where(' empresa_certificado.dias_vencimento <= ', 30);

        $query = $this->db->get();

        return $query;


    }

    public function Listar30DiasVencerTotal()
    {
        $this->db->select('count(*) total');
        $this->db->from(' empresa_certificado ');
        $this->db->where(' dias_vencimento <= ', 30);


        $query = $this->db->get();

        return $query;
    }

}
