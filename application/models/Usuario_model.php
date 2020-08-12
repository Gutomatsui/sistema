<?php

class Usuario_model extends CI_Model
{
    public $nome;
    public $email; 
    public $dt_cadastro; 
    public $fl_ativo;
    public $id_empresa;
    public $id_perfil;
    public $senha;

    public function ListaUsuario()
    {
        $this->db->select(' * ');
        $this->db->from(' usuario ');
        //$this->db->where(' fl_ativo ', true);
        

        $query = $this->db->get();
        
        return $query;
    }

    public function pesquisar($id)
    {
        $this->db->select('*');
        $this->db->from(' usuario ');
        $this->db->where(' id ', $id);

        $query = $this->db->get();

        return $query;
    }

    public function pesquisar_email($id)
    {
        $this->db->select('*');
        $this->db->from(' usuario ');
        $this->db->where(" REPLACE(REPLACE(email,'.',''),'@','') ", $id);
        

        $query = $this->db->get();

        return $query;
    }

    public function gravar($dados)
    {
        
       // var_dump($dados);
        $retorno = false;

        $this->nome = $dados["nome"];
        $this->email = $dados["email"];
        $this->fl_ativo = $dados["fl_ativo"] == "0" ? 0 : 1;
        $this->id_perfil = $dados["id_perfil"];
        $this->id_empresa = $dados["id_empresa"];
        $this->dt_cadastro = date('Y-m-d H:i:s');

        if($dados["id"] == 0)
        {
            $str = "EeFf1234567890ghij";
            $codigo = str_shuffle($str);
            
            $this->senha = md5($codigo);

            $this->db->insert('usuario', $this);

            $from = "teste@renkobrasil.com";
			$to = $this->email;
			$subject = "Verificando o correio do PHP";
            $message = "Senha para acessar o sistema " . $codigo;
            $headers =  'MIME-Version: 1.0' . "\r\n"; 
            $headers .= 'From: Your name <renko brasil>' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 
			//$headers = "De:". $from;
			mail($to, $subject, $message, $headers);
        }
        else
        {
            $this->db->where('id', $dados["id"]);
            $this->db->update('usuario', $this);
        }

        if($this->db->affected_rows() > 0)
        {
            $retorno = true; // to the controller
        }

        return $retorno;
    }

    public function atualizar_senha($dados)
    {
        $this->db->where('id', $dados['id']);
        $this->db->set('senha', Md5($dados['senha']));
        $this->db->update('usuario');

        if($this->db->trans_status() === true){
            $this->db->trans_commit();
            return true;
        }else{
            $this->db->trans_rollback();
            return false;
        }


        
    }
}