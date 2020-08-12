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
   <h2> <b> <?php echo $NomeEmpresa; ?>  </b></h2>
    </div>
    <div class="col-md-8">
        <div class="block">
            <div class="block-title">
            <input type="hidden" name="txt_id_empresa" id="txt_id_empresa" value="<?php echo $id_empresa ?>" />
            <input type="hidden" name="txt_id_diretorio" id="txt_id_diretorio" value="<?php echo $id_diretorio ?>" />
            <input type="hidden" name="txt_editar" id="txt_editar" value="<?php echo $editar ?>" />
            <input type="hidden" name="txt_caminho" id="txt_caminho" value="<?php echo $caminho ?>" />
            
                <h2><strong>Diretório(s):</strong>  <?php echo $caminho; ?> </h2>
          
                <?php 
                if($id_pai <> 0 )
                {
                    if($id_empresa == $id_pai)
                    {
                        echo '<a href="' . base_url() .'diretorio/index/' . $id_empresa . '"  data-toggle="tooltip" title="Editar" class="btn btn-xs btn-danger"><i class="fa fa-reply"></i> Voltar</a>' ;
                    }
                    else
                    {
                        echo '<a href="' . base_url() .'diretorio/index/' . $id_empresa . '/' . $id_pai .'"  data-toggle="tooltip" title="Editar" class="btn btn-xs  btn-danger"><i class="fa fa-reply"></i> Voltar</a>';
                    }
                }
                ?>

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
                            <h2><strong>Novo</strong> Diretório</h2>
                            
                        </div>
                        <div class="form-horizontal">
                            <div class="row">  
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Nome</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="txt_nome_diretorio" id="txt_nome_diretorio" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" >Descricao</label>
                                    <div class="col-md-9">
                                        <textarea class="form-control" name="txt_descricao_diretorio" id="txt_descricao_diretorio"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Privado</label>
                                    <div class="col-md-9">
                                        <div class="checkbox">
                                            <input type="checkbox" id="chkPrivado" name="chkPrivado" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Bloquear</label>
                                    <div class="col-md-9">
                                        <div class="checkbox">
                                            <input type="checkbox" id="chkBloquear" name="chkBloquear" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group" id="div_datas">
                                    <label class="col-md-3 control-label" >Data Bloqueio</label>
                                    <div class="col-md-4">
                                        <input type="text" id="txt_dt_bloqueio" name="example-datepicker2" class="form-control input-datepicker" data-date-format="dd/mm/yyyy" placeholder="dd/mm/yyyy">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label"></label>
                                    <div class="col-md-9">
                                        <button type="button" id="btnMkdir" class="btn btn-sm btn-primary"><i class="fa fa-folder"></i> Criar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        <?php
            }
        ?>

<div class="col-md-12">
            <div class="block">
                <div class="block-title">
                    <h2><strong>Novo</strong> Arquivo</h2>
                </div>
                <?php if($fl_bloqueado == false )
                {
                ?>
                   
                        <div class="form-horizontal">
                            <input type="hidden" name="IdDiretorio" value="@ViewBag.IdDiretorio" />
                            <div class="form-group">
                                <label class="col-md-3 control-label">Arquivo</label>
                                <div class="col-md-9">
                                    <input type="file" id="file" name="file" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Descricao</label>
                                <div class="col-md-9">
                                    <textarea class="form-control" name="txt_Descricao_file" id="txt_Descricao_file"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label"></label>
                                <div class="col-md-9">
                                    <button type="buttion" id="btnUpload" class="btn btn-sm btn-primary"><i class="fa fa-file-text"></i> Adicionar</button>
                                   
                                </div>
                            </div>
                        </div>
                <?php
                }
                else
                { ?>
                
                <div class="form-horizontal">
                    Diretório bloqueado para uploads de arquivos.
                </div>
                
                <?php } ?>
            </div>
        </div>
    </div>
</div>


<!-- Modal Start-->
<div class="modal" id="myEditar">
    <div class="modal-dialog">
      <div class="modal-content">
        
        <div class="col-md-12">
            <div class="block">
            <input type="hidden" name="IdDiretorio_edit" id="IdDiretorio_edit" value="" />
                <div class="block-title">
                    <h2><strong>Editar</strong> Diretório</h2>
                </div>
                <div class="form-horizontal">
                    <div class="row">  
                        <div class="form-group">
                            <label class="col-md-3 control-label">Nome</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="txt_nome_diretorio_edit" id="txt_nome_diretorio_edit" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" >Descricao</label>
                            <div class="col-md-9">
                                <textarea class="form-control" name="txt_descricao_diretorio_edit" id="txt_descricao_diretorio_edit"></textarea>
                            </div>
                        </div>
                        <div class="form-group" id="div_datas">
                            <label class="col-md-3 control-label" >Data Bloqueio</label>
                            <div class="col-md-4">
                                <input type="text" id="txt_dt_bloqueio_edit" name="example-datepicker2" class="form-control input-datepicker" data-date-format="dd/mm/yyyy" placeholder="dd/mm/yyyy">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-9">
                                <button type="button" id="btbtnMkdir_editnUpload" class="btn btn-sm btn-primary"><i class="fa fa-ufolder"></i> Atualizar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

           
        </div>
    </div>
    </div>
  </div>
<!-- Modal End-->

<script>

function formatted_string(pad, str, pos) {
  str = str.toString();
  if (pos === 'l') {
    return pad.slice(0, pad.length - str.length) + str;
  } else {
    return str + pad.slice(str.length);
  }
}

    function EditarData(id)
    {

        $.ajax({

        type : "get",
        url : "<?php echo base_url(); ?>/Diretorio/pesquisar/" + id,
        dataType: "json",
        
        error : function (errar){
            alert(errar);
        } ,
        success: function (data){
            
            data1 = new Date(data[0].dt_bloqueio);

            //alert(formatarDataUsaBr(data[0].dt_bloqueio) + "---->" + data[0].dt_bloqueio);
            
            $("#IdDiretorio_edit").val(id) ;
            $("#btnAddCertificado").text("Atualizar") ;
            $("#txt_nome_diretorio_edit").val(data[0].nome);
            $("#txt_descricao_diretorio_edit").val(data[0].descricao);
            if(data[0].dt_bloqueio != '0000-00-00' && data[0].dt_bloqueio != null)
            {
                //$("#txt_dt_bloqueio_edit").val( formatted_string ("00",data1.getDate(),"l") + '/' + formatted_string ("00",data1.getMonth(),"l") + '/' +  formatted_string ("0000",data1.getFullYear(),"l"));
                $("#txt_dt_bloqueio_edit").val(formatarDataUsaBr(data[0].dt_bloqueio) );
            }else{
                $("#txt_dt_bloqueio_edit").val("");
            }


           $('#myEditar').modal('show');
        }
        });
    }

    function NovoUpload()
    {
        if($("#txt_Descricao_file").val() == "" || $('#file')[0].files[0] == "")
        {
            ShowMensagem("Erro","Dados sspara o novo diretório incompletos.");
           
            return;
        }

        var fd = new FormData();
        var files = $('#file')[0].files[0];
        fd.append('file',files);
        fd.append('nome_diretorio',"arquivo teste");
        fd.append('descricao_diretorio',$("#txt_Descricao_file").val());
        fd.append('id_empresa',$("#txt_id_empresa").val());
        fd.append('id_diretorio',$("#txt_id_diretorio").val());

        $.ajax({
            url : "<?php echo base_url(); ?>/diretorio/upload",
            type: 'post',
            dataType: "json",
            data: fd,
            contentType: false,
            processData: false,
            success: function(response){
                if(response.status  == true){
                    CarregarDados();
                    ShowMensagem("Sucesso","Arquivo enviado com sucesso!");
                }else{
                    alert('file not uploaded');
                }
            },
        });
    }

    function AtualizarDir(id)
    {

        if($("#txt_nome_diretorio_edit").val() == "" || $("#txt_nome_diretorio_edit").val() == "")
        {
            ShowMensagem("Erro","Dados para o novo diretório incompletos.");
            return;
        }


        var dados = {
            id : id,
            nome : $("#txt_nome_diretorio_edit").val(), 
            descricao_diretorio : $("#txt_descricao_diretorio_edit").val(),
            dt_bloqueio: $("#txt_dt_bloqueio_edit").val()
            };

        $.ajax({

            type : "POST",
            url : "<?php echo base_url(); ?>/diretorio/atualizar",
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
                    $("#txt_nome_diretorio_edit").val("");
                    $("#txt_descricao_diretorio_edit").val("");
                    $("#txt_dt_bloqueio_edit").val("");

                    $('#myEditar').modal('hide');
                    ShowMensagem("Sucesso","Dados atualizados com sucesso!");
                }
               // alert(data_return);
            }
        });

    }

    function NovoDiretorio()
    {
        if($("#txt_nome_diretorio").val() == "" || $("#txt_descricao_diretorio").val() == "")
        {
            ShowMensagem("Erro","Dados para o novo diretório incompletos.");
            return;
        }


        var dados = {
            nome_diretorio : $("#txt_nome_diretorio").val(), 
            descricao_diretorio : $("#txt_descricao_diretorio").val(),
            id_empresa: $("#txt_id_empresa").val(),
            id_diretorio: $("#txt_id_diretorio").val(),
            dt_bloqueio: $("#txt_dt_bloqueio").val(),
            caminho: $("#txt_caminho").val(),
            fl_privado: $("#chkPrivado").is(':checked')
            };

        $.ajax({

            type : "POST",
            url : "<?php echo base_url(); ?>/diretorio/mkdir",
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
                    $("#txt_nome_diretorio").val("");
                    $("#txt_descricao_diretorio").val("");
                    $("#txt_dt_bloqueio").val("");
                    $('#chkPrivado'). prop("checked", false);
                    $('#chkBloquear'). prop("checked", false);
                    $("#div_datas").hide();

                    ShowMensagem("Sucesso","Dados gravados com sucesso!");
                }
               // alert(data_return);
            }
        });
    }

    function CarregarDados()
    {

        var var_editar = $("#txt_editar").val();
        var id_dir_empresa = $("#txt_id_diretorio").val();
        //alert(id_dir_empresa);
        //if(id_dir == 0)
       // {
         var   id_dir = $("#txt_id_empresa").val();

      //  }

        $.ajax({

        type : "get",
        url : "<?php echo base_url(); ?>/diretorio/listar/" + id_dir + "/" + id_dir_empresa,
        dataType: "json",
       
        error : function (errar){
            alert(errar);
        } ,
        success: function (data){
           
            var html = '<table class="table">'
                html = html + '<tr>';
                html = html + '     <th>';
                html = html + '     </th>';
                html = html + '     <th>';
                html = html + '         Nome ';   
                html = html + '     </th>';
                html = html + '     <th>';
                html = html + '         Dt. Criação';
                html = html + '     </th>';
           
                html = html + '     <th></th>';
                
                html = html + '     <th></th>';

                if(var_editar == 1)
                {
                    html = html + '     <th></th>';
                }
               
                html = html + '<th></th></tr>';
                txt_privado = "";
                

                $.each(data, function(index){
                    txt_privado = "";

                    if(data[index].fl_privado == 1)
                {
                    txt_privado = 'Privado <button type="button" class="btn btn-xs btn-success btnEditar" onclick="TornarPublico('+data[index].id+')" ><i class="fa fa-power-off"></i></button>';
                }
                
                    if(data[index].fl_diretorio == true)
                    {
                        html = html + '<tr><td><i class="fa fa-folder-open" data-toggle="tooltip" data-placement="top" title="' + data[index].descricao + '" ></i></td>';
                    }else{
                        html = html + '<tr><td><i class="fa fa-file-text" data-toggle="tooltip" data-placement="top" title="' + data[index].descricao + '"></i></td>';
                    }

                    html = html + '<td>' +  data[index].nome + '</td>';

                    data1 = new Date(data[index].dt_cadastro);
                    html = html + '<td>' +  data1.getDate() + '/' + data1.getMonth() + '/' + data1.getFullYear() + '</td>';
                 
                    if(var_editar == 1)
                    {
                        html = html + '<td><button type="button" class="btn btn-xs btn-danger btnEditar" onclick="EditarData('+data[index].id+')" ><i class="fa fa-pencil"></i></button></td>';
                    }

                    if(data[index].fl_diretorio == true)
                    {
                        html = html + '<td><a href="<?php echo base_url(); ?>diretorio/index/' + $("#txt_id_empresa").val() +'/' + data[index].id + '" data-toggle="tooltip" title="Acessar" class="btn btn-xs btn-default"><i class="fa fa-share"></i></a></td>';
                    }else{
                        html = html + '<td><a href="<?php echo base_url(); ?>uploads/'+  (id_dir_empresa != 0 ? id_dir_empresa : id_dir) + '/' + data[index].nome + '" download="' + data[index].nome +'" data-toggle="tooltip" title="Acessar" class="btn btn-xs btn-default"><i class="fa fa-cloud-download"></i></a><a href="<?php echo base_url(); ?>uploads/'+(id_dir_empresa != 0 ? id_dir_empresa : id_dir)+'/' + data[index].nome + '" target="_blank data-toggle="tooltip" title="Acessar" class="btn btn-xs btn-default"><i class="fa fa-eye"></i></a></td>';
                    }

                    html = html + '<td>'+txt_privado+' </td>';
                    

                    

                });  

                $('#divResults').empty().append(html);      
        }
        });
    }

    function TornarPublico(id)
    {

        var dados = {
            id : id, 
        };

        $.ajax({

            type : "POST",
            url : "<?php echo base_url(); ?>/diretorio/publico",
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
                   

                    ShowMensagem("Sucesso","Dados gravados com sucesso!");
                }
                //alert(data_return);
            }
            });

    }

    $(document).ready(function() {

        $("#div_datas").hide();
        CarregarDados();

        $("#btnMkdir").click(function(){

            NovoDiretorio();

        });

        $("#btnUpload").click(function(){

            NovoUpload();

        });

        $("#btbtnMkdir_editnUpload").click(function(){



            AtualizarDir($("#IdDiretorio_edit").val() );

        });

        
        

        $('#chkBloquear').change(function() {
        if(this.checked) {
            $("#div_datas").show();
        }else{
            $("#txt_dt_bloqueio").val("");
            $("#div_datas").hide();
        }
           
        });

    });

</script>