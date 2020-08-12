<?php

class Diretorio_model extends CI_Model
{
    public $id;
    public $id_pai;
    public $nome;
    public $fl_diretorio;
    public $nome_arquivo;
    public $fl_ativo;
    public $dt_cadastro;
    public $id_usuario;
    public $descricao;
    public $id_empresa;
    public $dt_bloqueio;
    public $fl_bloqueado;
    public $caminho;
    public $fl_privado;

    public function ListaEmpresa()
    {
        $this->db->select('*');
        $this->db->from(' empresa ');
        

        $query = $this->db->get();

        return $query;
    }

    public function ListaEmpresaDiretorio($id, $id_dir = null) 
    {
        $privato = 1;

        if($_SESSION['id_perfil'] == 6 || $_SESSION['id_perfil'] == 5)
		{
			
			$privato = 0;
        }

        $this->db->select('*');
        $this->db->from(' diretorio_arquivos ');
        //$this->db->join('empresa', 'empresa.id = diretorio_arquivos.id_empresa');

        if($id_dir == null)
        {
            $this->db->where(' id_empresa ', $id);
            $this->db->where(' id_pai ', null);
        }
        else
        {
            $this->db->where(' id_empresa ', $id);
            $this->db->where(' id_pai ', $id_dir);
        }

        if($privato == 0)
        {
            //$this->db->where(' fl_privado ', 0);
        }
        

        $query = $this->db->get();

        return $query;
    }

    public function ListaDiretorio($id)
    {
        $this->db->select('*');
        $this->db->from(' diretorio_arquivos ');
        $this->db->join('empresa', 'empresa.id = diretorio_arquivos.id_empresa');
        $this->db->where(' cnpj ', $id);

        $query = $this->db->get();

        return $query;
    }

    public function TornarPublico($id)
    {

        $this->db->where(' id ', $id);
        $this->db->set('fl_privado', 0);

        $this->db->update('diretorio_arquivos');
        
        if($this->db->trans_status() === true){
            $this->db->trans_commit();
            return true;
        }else{
            $this->db->trans_rollback();
            return false;
        }
      
    }

    public function NovoDiretorio($dados)
    {
        $this->id_pai = $dados["id_pai"];
        $this->nome = $dados["nome"] ;
        $this->fl_diretorio = true;
        $this->nome_arquivo = $dados["nome"] ;
        $this->fl_ativo = true;
        $this->dt_cadastro = date('Y-m-d H:i:s');
        $this->id_usuario = $dados["id_usuario"];
        $this->descricao = $dados["descricao"];
        $this->id_empresa =  $dados["id_empresa"];
        $this->caminho = $dados["caminho"];
        $this->dt_bloqueio =  $dados["dt_bloqueio"] == "" ? null : substr($dados["dt_bloqueio"], 6) . "/" . substr($dados["dt_bloqueio"], 3,-5) . "/" . substr($dados["dt_bloqueio"], 0,-8)    ;
        $this->fl_bloqueado = false;
        $this->fl_privado = $dados["fl_privado"];

        $this->db->insert('diretorio_arquivos', $this);

        if (!file_exists('uploads/' . $this->db->insert_id())) 
        {
            mkdir('uploads/' . $this->db->insert_id(), 0777, true);
        }
    }

    public function NovoArquivo($dados)
    {
        $this->id_pai = $dados["id_pai"];
        $this->nome = $dados["nome"] ;
        $this->fl_diretorio = false;
        $this->nome_arquivo = $dados["nome"] ;
        $this->fl_ativo = true;
        $this->dt_cadastro = date('Y-m-d H:i:s');
        $this->id_usuario = $dados["id_usuario"];
        $this->descricao = $dados["descricao"];
        $this->id_empresa =  $dados["id_empresa"];

        $this->dt_bloqueio =  null;
        $this->fl_bloqueado = false;
        
        
        $this->db->insert('diretorio_arquivos', $this);
    }

    public function DiretorioBloqueado($id)
    {


        $this->db->select('fl_bloqueado');
        $this->db->from(' diretorio_arquivos ');
        $this->db->where(' id ', $id);

        $query = $this->db->get();

        $valor = $query->result();

        //echo $valor[0]->fl_bloqueado;
       // exit;
        
        if($valor[0]->fl_bloqueado == "1")
        {
            return true;
        }else
        {
            return false;
        }

        //return $valor[0]->fl_diretorio;
    }

    public function PesquisaNomeDir($id)
    {
        $this->db->select(' nome, id_pai, caminho ');
        $this->db->from(' diretorio_arquivos ');
        $this->db->where(' id ', $id);


        $query = $this->db->get();

        return $query->result();
    }

    public function PesquisarDiretorio($id)
    {
        $this->db->select('*');
        $this->db->from(' diretorio_arquivos ');
        $this->db->where(' id ', $id);

        $query = $this->db->get();

        return $query;
    }

    public function AtualizarDiretorio($dados)
    {
        $this->db->where('id', $dados['id']);
        $this->db->set('nome', $dados['nome']);
        $this->db->set('descricao', $dados['descricao_diretorio']);

        $this->db->set('fl_bloqueado', 0);
        $this->db->set('dt_bloqueio', $dados["dt_bloqueio"] == "" ? null : substr($dados["dt_bloqueio"], 6) . "/" . substr($dados["dt_bloqueio"], 3,-5) . "/" . substr($dados["dt_bloqueio"], 0,-8));

    try {

        $this->db->update('diretorio_arquivos');

        if($this->db->trans_status() === true){
            $this->db->trans_commit();
            return true;
        }else{
            $this->db->trans_rollback();
            return false;
        }
    } catch (Exception $e) {
        echo 'Exceção capturada: ',  $e->getMessage(), "\n"; exit;
    }


        return $retorno;
    }

    public function ListaDiretorioBase($id)
    {
        $this->db->select('*');
        $this->db->from(' diretorio_arquivos ');
        $this->db->where(' id_empresa ', $id);
        $this->db->where(' id_pai is null');

        $query = $this->db->get();

        return $query;
    }
}