<?php

class Empresa_model extends CI_Model
{

    //public $id;
    public $nome;
    public $razao_social;
    public $cnpj;
    public $email;
    public $dt_cadastro;
    public $fl_ativo;
    public $logo;

    public $id_tipo_empresa;
    public $id_tipo_porte_empresa;
    public $id_tipo_regime;
    public $id_tipo_tributacao;


    //endereco
    public $cep;
    public $endereco;
    public $numero;
    public $bairro;
    public $cidade;
    public $uf;
    public $complemento;

    public $fone1;
    public $fone2;
    public $fl_pendente;

    public function pesquisar($id)
    {
        $this->db->select(' E.id, E.nome, E.razao_social, E.cnpj , E.dt_cadastro,  E.fl_ativo, E.email, E.id_tipo_empresa, E.id_tipo_cliente, E.id_tipo_porte_empresa, E.id_tipo_regime, E.id_tipo_tributacao,
        E.fone1, E.fone2, E.contrato , E.dt_cadastro , E.dt_contrato , E.dt_fim_cotrato , E.dt_inicio_contrato, E.fl_contrato_vencido, E.endereco, e.complemento, E.numero, E.bairro, E.cidade, E.uf, E.cep, E.fl_pendente, TE.nome as tipo_nome_empresa, TP.nome as tipo_nome_porte_empresa, TR.nome as tipo_nome_regime, TT.nome as tipo_nome_tributacao,
        PLE.valor_plano as valor_plano, PLE.dt_cadastro as data_plano, TPL.nome as nome_plano, TPL.tipo_planos as nome_tipo_plano ');
        $this->db->from(' empresa as E');
        $this->db->join(' tipo_empresa as TE ', 'E.id_tipo_empresa = TE.id' ,'left' );
        $this->db->join(' tipo_porte_empresa as TP ', 'E.id_tipo_porte_empresa = TP.id' , 'left');
        $this->db->join(' tipo_regime_apuracao as TR ', 'E.id_tipo_regime = TR.id' , 'left');
        $this->db->join(' tipo_tributacao as TT ', 'E.id_tipo_tributacao = TT.id' , 'left');
        $this->db->join(' planos_empresa as PLE' , 'E.id = PLE.id_empresa' , 'left');
        $this->db->join(' tipo_planos as TPL',  'PLE.id_plano = TPL.id' , 'left' );
        $this->db->where( 'E.id ', $id);
        


        $query = $this->db->get();

        return $query;
    }



    public function pesquisar_cnpj_cpf($id)
    {
      

        $this->db->select('*');
        $this->db->from(' empresa ');
        $this->db->where(" REPLACE(REPLACE(REPLACE(cnpj,'.',''),'-',''),'/','') ", $id);

        $query = $this->db->get();

        return $query;
    }

    public function nome_empresa($id)
    {
        $this->db->limit(1);
        $this->db->select(' nome ');
        $this->db->from(' empresa ');
        $this->db->where('id', $id);

        $query = $this->db->get();

        return $query->row();
    }
    

    public function gravar($dados)
    {
        $retorno['status'] = false;
        $retorno['protocolo'] = "";

        $dt = new DateTime();

        $this->nome = $dados["nome"];
        $this->razao_social = $dados["razao_social"];
        $this->cnpj = $dados["cnpj"];
        $this->fl_ativo = $dados["fl_ativo"];
        $this->logo = "";//$dados["logo"] == null ? "" : $dados["logo"]  ;
        $this->email = $dados["email"];
        $this->dt_cadastro = date('Y-m-d H:i:s');

        $this->id_tipo_empresa = $dados["id_tipo_empresa"];
        $this->id_tipo_porte_empresa = $dados["id_tipo_porte_empresa"];
        $this->id_tipo_regime = $dados["id_tipo_regime"];
        $this->id_tipo_tributacao = $dados["id_tipo_tributacao"];
        $this->id_tipo_cliente = $dados["id_tipo_cliente"];

        $this->cep = $dados["cep"];
        $this->endereco = $dados["endereco"];
        $this->numero = $dados["numero"];
        $this->bairro = $dados["bairro"];
        $this->cidade = $dados["cidade"];
        $this->uf = $dados["uf"];
        $this->complemento = $dados["complemento"];

        $this->fone1 = $dados["fone1"];
        $this->fone2 = $dados["fone2"];
        $this->fl_pendente = $dados["fl_pendente"];

        

        $protocolo = "";
        if($dados["id"] == 0)
        {
            $this->db->insert('empresa', $this);

            if (!file_exists('uploads/' . $this->db->insert_id())) {
                mkdir('uploads/' . $this->db->insert_id(), 0777, true);
            }

            if($dados["id_plano"]<>""){

            $id_empresa = $this->db->insert_id();   
            $this->InserirEmpresaPlano($id_empresa,$dados["id_plano"],$dados["valor_plano"] );
            $protocolo = $this->InserirProtocolo($id_empresa,1) ;
            $retorno['protocolo'] = $protocolo; 
            }
        }
        else
        {
            $this->db->where('id', $dados["id"]);
            $this->db->update('empresa', $this);
        }

        if($this->db->affected_rows() > 0)
        {
            // Code here after successful insert
            $retorno['status'] = true; // to the controller
        }

        return $retorno;
    }






    public function GravarContrato($id, $contrato, $dt_inicio_contrato, $dt_fim_cotrato )
    {

        $this->db->where('id', $id);
        $this->db->set('contrato', $contrato);
        $this->db->set('dt_contrato', date('Y-m-d H:i:s'));
        $this->db->set('dt_inicio_contrato', date('Y-m-d H:i:s'));
        $this->db->set('dt_fim_cotrato', date('Y-m-d H:i:s'));

        $this->db->set('dt_inicio_contrato', $dt_inicio_contrato == "" ? null : substr($dt_inicio_contrato, 6) . "/" . substr($dt_inicio_contrato, 3,-5) . "/" . substr($dt_inicio_contrato, 0,-8));
        $this->db->set('dt_fim_cotrato', $dt_fim_cotrato == "" ? null : substr($dt_fim_cotrato, 6) . "/" . substr($dt_fim_cotrato, 3,-5) . "/" . substr($dt_fim_cotrato, 0,-8));

        $this->db->update('empresa');

        if($this->db->trans_status() === true){
            $this->db->trans_commit();
            return true;
        }else{
            $this->db->trans_rollback();
            return false;
        }

    }

    public function Listar30DiasVencerContratoTotal()
    {
        $this->db->select('count(*) total');
        $this->db->from(' empresa ');
        $this->db->where(' dias_fim_contrato <= ', 30);


        $query = $this->db->get();

        return $query;
    }

    public function PesquisaTipoEmpresa($id)
    {
        $this->db->select('id_tipo_empresa');
        $this->db->from(' empresa ');
        $this->db->where(' id = ', $id);


        $query = $this->db->get();

        return $query->result();
    }


    public function InserirEmpresaPlano ($id_empresa,$id_plano,$valor_plano) 
    {

        $sql = "INSERT INTO planos_empresa (`id_empresa`,`id_plano`,`fl_ativo`,`dt_cadastro`,`dt_alteracao`,`nome_usuario` , `valor_plano`) ";
        $sql = $sql." Values ($id_empresa, $id_plano, 1 ,now(), NULL, 'Externo', $valor_plano  )";

        $this->db->query($sql); 
        

    }

    public function InserirProtocolo($id_empresa,$tipo_protocolo)
    {
        $protocolo = $this->GerarProtocolo("s");

        $sql  = "INSERT INTO protocolo(`data_cadastro`,`fl_ativo`,`protocolo`,`id_empresa`,`tipo_protocolo`,`titulo`,`descricao`) ";
        $sql = $sql."Values(now(), 1, '$protocolo',  $id_empresa, $tipo_protocolo, 'Protocolo Site', 'Protocolo gerado automaticamente pelo site.' )";
        
        $this->db->query($sql);
        return $protocolo; 
    }

    public function GerarProtocolo($sigla)

    {

        date_default_timezone_set('America/Sao_Paulo');
        $numProtocolo = ""; 


        $this->db->trans_begin();
        $this->db->select('id, sigla, indice'); 
        $this->db->from('tipo_protocolo');
        $this->db->where('sigla', strtoupper($sigla)); 

        $query = $this->db->get();

        $valor = $query->result();
       // $valor[0]->sigla == "1";

        $numProtocolo = $valor[0]->sigla .  date("Y") . str_pad(date("m"),2,"0", STR_PAD_LEFT) . str_pad(date("d"),2,"0", STR_PAD_LEFT) . str_pad(date("H"),2,"0", STR_PAD_LEFT) . date("i") . str_pad(($valor[0]->indice +1),6,"0", STR_PAD_LEFT);

       // var_dump($numProtocolo);
       // echo "<br> hora :".date("d/m/Y H:i:s");

       
       $this->db->where('id', $valor[0]->id);
       $this->db->set('indice', ($valor[0]->indice +1));
       $this->db->update('tipo_protocolo');

       $this->db->trans_commit();

       // var_dump($numProtocolo);
        //exit;
        


        return $numProtocolo;

    }


    public function ListarIndice()
    {   
        $this->db->select('*');
        $this->db->from('empresa');
        $this->db->where('fl_pendente', '0');

        $query = $this->db->get();

        return $query; 



    }



    
    
  
   
}