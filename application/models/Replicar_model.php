<?php

class  Replicar_model extends CI_Model
{

    public function ReplicarDiretorio($id_empresa, $id_pai, $id_pai_novo = 0)
    {
        if($id_pai_novo == 0)
        {
            $link = mysqli_connect("localhost", "root", "", "arquivos");

            $sql = "SELECT id, id_pai, nome, fl_diretorio, nome_arquivo, fl_ativo, dt_cadastro, id_usuario
            , descricao, id_empresa, dt_bloqueio, fl_bloqueado, caminho, fl_privado FROM diretorio_arquivos
            where id = " . $id_pai;

            $results = mysqli_query($link,$sql);
            
            if(mysqli_num_rows($results) == 0)
            {
                return;
            }

            $cont = 0;

            while($row = $results->fetch_array(MYSQLI_ASSOC) )
            {   
                $arr[$cont] = $row;
                $cont++;
            }

            for ($i=0; $i < count($arr) ; $i++) 
            {
                $link = mysqli_connect("localhost", "root", "", "arquivos");

                $row = $arr[$i];

                $sql2 = "insert into diretorio_arquivos(id_pai, nome, fl_diretorio, nome_arquivo, fl_ativo, dt_cadastro, id_usuario
                , descricao, id_empresa, dt_bloqueio, fl_bloqueado, caminho, fl_privado) 
                values (null,'". $row["nome"] . "'," . $row["fl_diretorio"] . ",'" . $row["nome_arquivo"] . "'," . $row["fl_ativo"] . ",'" . $row["dt_cadastro"] . "','" . $row["id_usuario"] . "','" . $row["descricao"] . "','" . $id_empresa . "',null ," . $row["fl_bloqueado"] . ",'" . $row["caminho"] . "'," . $row["fl_privado"]. ")";

                $results = mysqli_query($link,$sql2);

                $id_pai_novo2 = mysqli_insert_id($link);

                mysqli_close( $link);

               $this->ReplicarDiretorio($id_empresa,  $id_pai , $id_pai_novo2);
               
            }

            return;
        }
        else
        {
            $link = mysqli_connect("localhost", "root", "", "arquivos");

            $sql = "SELECT id, id_pai, nome, fl_diretorio, nome_arquivo, fl_ativo, dt_cadastro, id_usuario
            , descricao, id_empresa, dt_bloqueio, fl_bloqueado, caminho, fl_privado FROM diretorio_arquivos
            where id_pai = " . $id_pai;

            $results = mysqli_query($link,$sql);

            if(mysqli_num_rows($results) == 0)
            {
                return;
            }

            $cont = 0;

            while($row = $results->fetch_array(MYSQLI_ASSOC) )
            {   
                $arr[$cont] = $row;
                $cont++;
            }

            for ($i=0; $i < count($arr) ; $i++) 
            { 
                $link = mysqli_connect("localhost", "root", "", "arquivos");
                $row = $arr[$i];
         
                $sql2 = "insert into diretorio_arquivos(id_pai, nome, fl_diretorio, nome_arquivo, fl_ativo, dt_cadastro, id_usuario
                , descricao, id_empresa, dt_bloqueio, fl_bloqueado, caminho, fl_privado) 
                values (".$id_pai_novo.",'". $row["nome"] . "'," . $row["fl_diretorio"] . ",'" . $row["nome_arquivo"] . "'," . $row["fl_ativo"] . ",'" . $row["dt_cadastro"] . "','" . $row["id_usuario"] . "','" . $row["descricao"] . "','" . $id_empresa . "',null ," . $row["fl_bloqueado"] . ",'" . $row["caminho"] . "'," . $row["fl_privado"]. ")";

                $results = mysqli_query($link,$sql2);

                $id_pai_novo1 = mysqli_insert_id($link);

                mysqli_close($link);

                $this->ReplicarDiretorio($id_empresa, $row["id"],  $id_pai_novo1);
                
            }
            return;
        }
    }
}