<div class="block-title">
    <h2>Empresa</h2>
</div>

<div class="block full">

    <a href="<?php echo base_url(); ?>empresa/create" title="Nova Empresa" class="btn btn-success">Novo+</a><p>

    <div class="table-responsive">
        <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
            <thead>
                <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">Nome/Nome Fantasia</th>
                    <th class="text-center">Razão Social</th>
                    <th class="text-center">CNPJ</th>
                    <th class="text-center">Dt. Cadastro</th>
                    <th class="text-center">Ativo</th>
                    <th class="text-center">Ações</th>
                </tr>
            </thead>
            <tbody>

                <?php
                foreach ($dados->result() as $row) {
                    echo ' <tr>';
                    echo '<td class="text-center">' . $row->id . '</td>';
                    echo '<td class="text-center">' . $row->nome . '</td>';
                    echo '<td class="text-center">' . $row->razao_social . '</td>';
                    echo '<td class="text-center">' . $row->cnpj . '</td>';
                    echo '<td class="text-center">' . date('d/m/Y h:m:s', strtotime($row->dt_cadastro))  . '</td>';

                    if ($row->fl_ativo == 1) {
                        echo '<td class="text-center"><span class="label label-success">Sim</span></td>';
                    } else {
                        echo '<td class="text-center"><span class="label label-danger">Não</span></td>';
                    }


                    echo '<td class="text-center">
                        <div class="btn-group">


                            <a href="' . base_url() . 'empresa/detalhe/' . $row->id . '" data-toggle="tooltip" title="Visualizar Cliente" class="btn btn-xs btn-default"><i style=" color:blue; " class="fa fa-eye"></i></a>

                            <a href="' . base_url() . 'empresa/create/' . $row->id . '" data-toggle="tooltip" title="Editar Cadastro" class="btn btn-xs btn-default"><i class="fa fa-pencil"></i></a>';

                            

                            
                            if($row->contrato == "")
                            {
                                echo '<button type="button" id="btnContrato" onclick="AddContrato(' . $row->id . ', '  .  "'" . $row->contrato . "'" . ')" class="btn btn-xs btn-danger" data-toggle="tooltip" title="Upload Contrato de Serviço"><i class="fa fa-tags"></i></button>';
                            }
                            else
                            {
                                echo '<button type="button" id="btnContrato" onclick="AddContrato(' . $row->id . ', '  .  "'" . $row->contrato . "'" . ')" class="btn btn-xs btn-success" data-toggle="tooltip" title="Upload Contrato de Serviço"><i class="fa fa-tags"></i></button>';
                            }

                            echo '
                            <a href="' . base_url() . 'certificado/index/' . $row->id . '" data-toggle="tooltip" title="Upload Certificado Digital" class="btn btn-xs btn-default"><i class="fa fa-unlock-alt"></i></i></a>
                            <a href="' . base_url() . 'usuario/index/' . $row->id . '" data-toggle="tooltip" title="Cadastro de Usuário" class="btn btn-xs btn-default"><i class="gi gi-user"></i></a>
                            <a href="' . base_url() . 'diretorio/index/' . $row->id . '" data-toggle="tooltip" title="Criação de Diretórios" class="btn btn-xs btn-default"><i class="fa fa-folder"></i></a>
                            </div>
                    </td>';
                    echo ' </tr>';
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Modal Start-->
<div class="modal" id="myContrato">
    <div class="modal-dialog">
      <div class="modal-content">
      <form action="#" method="post" enctype="multipart/form-data">
 
            <div class="col-md-12">
                <div class="block">
                <input type="hidden" name="IdDiretorio" id="IdDiretorio" value="" />
                    <div class="block-title">
                        <h2><strong>Editar</strong> Diretório</h2>
                    </div>
                    <div class="form-horizontal">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Arquivo</label>
                            <div class="col-md-7">
                                <input type="file" id="file" name="file" />
                            </div>
                            <div class="col-md-2" id="div_down">
                                
                            </div>
                        </div>

                        <div class="form-group" id="div_datas">
                                    <label class="col-md-3 control-label" >Data Inicio</label>
                                    <div class="col-md-4">
                                        <input type="text" id="txt_dt_inicio" name="txt_dt_inicio" class="form-control input-datepicker" data-date-format="dd/mm/yyyy" placeholder="dd/mm/yyyy">
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
                                <button type="button" id="btn_adicionar" onclick="Adicionar()" class="btn btn-sm btn-primary">Adicionar</button>
                                <button type="button" id="" onclick="Fechar()" class="btn btn-sm btn-danger">Cancelar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </form>
    </div>
    </div>
  </div>
<!-- Modal End-->


    <script src="js/pages/tablesDatatables.js"></script>
    <script>
        $(function() {
            TablesDatatables.init();


            $(".clsDelete").click(function() {

                $.ajax({
                  url : "<?php echo base_url(); ?>Empresa/delete/",
                  type : 'POST',
                  data : { id : $(this).val() }
            }).done(function(msg){
                location.reload();
            $("#resultado").html(msg);
            }); 

  
            });


        });

        function Fechar(){
            $('#myContrato').modal('hide');
        }

        function AddContrato(id, contrato)
        {
            $("#div_down").empty();
            $("#IdDiretorio").val(id);
            if(contrato != "")
            {
                $("#div_down").empty().append('<a href="<?php echo base_url(); ?>uploads/'+id+'/' + contrato + '" download="' + contrato +'" data-toggle="tooltip" title="Acessar" class="btn btn-lg btn-warning"><i class="fa fa-cloud-download"></i></a>');
            }

            $('#myContrato').modal('show');
            
        }

        function Adicionar()
        {
            var id = $("#IdDiretorio").val();


            

            var fd = new FormData();
            var files = $('#file')[0].files[0];
                fd.append('file',files);
            
            fd.append('id',id);
            fd.append('dt_inicio_contrato',$("#txt_dt_inicio").val());
            fd.append('dt_fim_cotrato',$("#txt_dt_validade").val());

            $.ajax({
                url : "<?php echo base_url(); ?>/empresa/add_contrato",
                type: 'post',
                dataType: "json",
                data: fd,
                contentType: false,
                processData: false,
                success: function(response){
                   // alert(response);
                    if(response.status  == true){
                        $('#myContrato').modal('hide');
                        //CarregarDados();
                        ShowMensagem("Sucesso","Arquivo enviado com sucesso!");
                        location.reload();
                    }else{
                        ShowMensagem("Erro","Arquivo não enviado");
                        //alert('file not uploaded');
                    }
                },
            });


        }
    </script>