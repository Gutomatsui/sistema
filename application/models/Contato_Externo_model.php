<?php

class Contato_Externo_model extends CI_Model
{
    public $nome;
    public $assunto;
    public $cnpj_cpf;
    public $nome_contato;
    public $email;
    public $mensagem;
    public $fl_migrar;
    public $newsletters;
    public $celular;
    public $telefone;
    public $dt_cadastro;

    public function Gravar($dados)
    {
        $this->nome = $dados["nome"];
        $this->assunto = $dados["assunto"];
        $this->cnpj_cpf = $dados["cnpj_cpf"];
        $this->nome_contato = $dados["nome_contato"];
        $this->email = $dados["email"];
        $this->mensagem = $dados["mensagem"];
        $this->fl_migrar = $dados["fl_migrar"];
        $this->newsletters = $dados["newsletters"];
        $this->celular = $dados["celular"];
        $this->telefone = $dados["telefone"];
        $this->dt_cadastro = date('Y-m-d H:i:s');

        $this->db->insert('contato_externo', $this);

        return $this->db->insert_id();
    }





}