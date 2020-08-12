<?php
            
    if($_SESSION['id_perfil'] == 5 || $_SESSION['id_perfil'] == 6)
    {
        if($id_empresa != $_SESSION['id_empresa'])
        {
            $this->load->view('/errors/html/acesso_negado');
            return;
        }
    }

?>

<div class="row">
    <div class="col-md-8">
        <div class="block">
            <div class="block-title">
            <input type="hidden" name="txt_id_empresa" id="txt_id_empresa" value="<?php echo $id_empresa ?>" />
                <h2><strong>Certificado(s)</strong> Empresa: <?php echo $NomeEmpresa; ?>  </h2>
                <a href="<?php echo base_url();?>empresa/index/" data-toggle="tooltip" title="Editar" class="btn btn-sm btn-danger"><i class="fa fa-angle-right"></i> Voltar</a>
            </div>
            <div id="divResults">
            </div>
        </div>
    </div>
    <div class="col-md-4">
        
        <?php
            if($_SESSION['id_perfil'] == 2 || $_SESSION['id_perfil'] == 3)
            {
        ?>
                <div class="col-md-12">
                    <div class="block">
                        <div class="block-title">
                            <h2><strong>Novo</strong> Certificado</h2>

                            
                        </div>
                        <div class="form-horizontal">
                        <input type="hidden" class="form-control" name="txt_id" id="txt_id" value="0" />
                            <div class="row">  
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Nome</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="txt_nome" id="txt_nome" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" >Certificado</label>
                                    <div class="col-md-9">
                                        <textarea class="form-control" name="txt_certificado" id="txt_certificado"></textarea>
                                    </div>
                                </div>
                                <div class="form-group" id="div_datas">
                                    <label class="col-md-3 control-label" >Data Ativação</label>
                                    <div class="col-md-4">
                                        <input type="text" id="txt_dt_ativacao" name="txt_dt_ativacao" class="form-control input-datepicker" data-date-format="dd/mm/yyyy" placeholder="dd/mm/yyyy">
                                    </div>
                                </div>
                                <div class="form-group" id="div_datas">
                                    <label class="col-md-3 control-label" >Data Vencimento</label>
                                    <div class="col-md-4">
                                        <input type="text" id="txt_dt_validade" name="txt_dt_validade" class="form-control input-datepicker" data-date-format="dd/mm/yyyy" placeholder="dd/mm/yyyy">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label"></label>
                                    <div class="col-md-9">
                                        <button type="button" id="btnAddCertificado" class="btn btn-sm btn-primary"><i class="fa fa-user"></i> Adicionar</button>
                                        
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        <?php
            }
        ?>
        
    </div>
</div>

<script>

    function DeleteCertificado(id)
    {

        

        $.ajax({
            type : "GET",
            url : "<?php echo base_url(); ?>/certificado/delete/" + id,
            dataType: "json",
           
            error : function (errar){
                alert(errar);
            } ,
            success: function (data){

                if(!data.status) {
                    ShowMensagem("Erro","Problema para excluir o cerificado!");
                    
                } else if(data.status) {

                    CarregarDados();

                    ShowMensagem("Sucesso","Certificado excluido com sucesso!");
                }
               
            }
            });



    }

    function NovoCertificado()
    {
        if($("#txt_nome_diretorio").val() == "" || $("#txt_descricao_diretorio").val() == "")
        {
            ShowMensagem("Erro","Dados para o novo diretório incompletos.");
            return;
        }

        var dados = {
            id : $("#txt_id").val(),
            nome : $("#txt_nome").val(), 
            certificado : $("#txt_certificado").val(),
            id_empresa: $("#txt_id_empresa").val(),
            dt_validade: $("#txt_dt_validade").val(),
            dt_inicio: $("#txt_dt_ativacao").val()
            
            };

        $.ajax({

            type : "POST",
            url : "<?php echo base_url(); ?>/certificado/novo",
            dataType: "json",
            data : dados, // passando a array
            error : function (errar){
                alert(errar);
            } ,
            success: function (data){

                if(!data.status) {
                    ShowMensagem("Erro","Problema para gravar os dados!");
                    
                } else if(data.status) {

                    CarregarDados();
                    $("#txt_certificado").val("");
                    $("#txt_nome").val("");
                    $("#txt_dt_validade").val("");
                    $("#txt_dt_ativacao").val("");
                    $("#btnAddCertificado").text("Gravar") ;
                    $("#txt_id").val("0");

                    ShowMensagem("Sucesso","Dados gravados com sucesso!");
                }
                alert(data_return);
            }
        });
    }

    function CarregarCertificado(id)
    {

        $.ajax({

        type : "get",
        url : "<?php echo base_url(); ?>/certificado/pesquisar/" + id,
        dataType: "json",
       
        error : function (errar){
            alert(errar);
        } ,
        success: function (data){
           
            $("#btnAddCertificado").text("Atualizar") ;
            $("#txt_nome").val(data[0].nome);
            $("#txt_certificado").val(data[0].certificado);
            $("#txt_dt_validade").val(formatarDataUsaBr(data[0].dt_validade));
            $("#txt_dt_ativacao").val(formatarDataUsaBr(data[0].dt_inicio))
            $("#txt_id").val(data[0].id);
        }
        });
    }

    function convertDate(inputFormat) {
  function pad(s) { return (s < 10) ? '0' + s : s; }
  var d = new Date(inputFormat)
  return [pad(d.getDate()), pad(d.getMonth()+1), d.getFullYear()].join('/')
}


    function CarregarDados()
    {

        $.ajax({

        type : "get",
        url : "<?php echo base_url(); ?>/certificado/listar/" + $("#txt_id_empresa").val(),
        dataType: "json",
       
        error : function (errar){
            alert(errar);
        } ,
        success: function (data){
           
            var html = '<table class="table">'
                html = html + '<tr>';
                
                html = html + '     <th>';
                html = html + '         Nome ';   
                html = html + '     </th>';
                html = html + '     <th>';
                html = html + '         Certificado';
                html = html + '     </th>';
                html = html + '     <th>';
                html = html + '         Dt. Ativação';
                html = html + '     </th>';
                html = html + '     <th>';
                html = html + '         Dt. Validade';
                html = html + '     </th>';
                html = html + '     <th>';
                html = html + '         Dias';
                html = html + '     </th>';
                html = html + '     <th>';
                html = html + '         Status';
                html = html + '     </th>';
                html = html + '     <th></th>';
                html = html + '</tr>';

                $.each(data, function(index){

                    html = html + '<tr>'
                    html = html + '<td>' + data[index].nome + '</td>';
                    html = html + '<td>' + data[index].certificado + '</td>';
                    html = html + '<td>' + formatarDataUsaBr(data[0].dt_inicio) + '</td>';
                    html = html + '<td>' + formatarDataUsaBr(data[0].dt_validade) +'</td>';
                    html = html + '<td>' + data[index].dias_vencimento + '</td>';
                    if(data[index].fl_vencido == 1)
                    {
                        html = html + '<td><span class="label label-danger">Vencido</span></td>';
                    }else{
                        html = html + '<td><span class="label label-success">Valido</span></td>';
                    }
                    html = html + '<td><button type="button" id="btnDeletar2" onclick="CarregarCertificado(' + data[index].id  + ')" class="btn btn-xs btn-default btnDeletar2" ><i class="fa fa-pencil btnDeletar2"></i></button>';

                    html = html + '<button type="button" id="btnDeletar1" onclick="DeleteCertificado(' + data[index].id  + ')" class="btnDeletar1 btn btn-xs btn-danger " ><i class="fa fa-times"></i></button> </td>';
                     });  

                $('#divResults').empty().append(html);      
        }
        });
    }

    $(document).ready(function() {

        

      /*  $(".btnDeletar1").on("click", function()
           {
             alert('button clicked');
           }
      );*/


        $("#btnAddCertificado").click(function(){

            NovoCertificado();

        });

        CarregarDados();

    });

</script>