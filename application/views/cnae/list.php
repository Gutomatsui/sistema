<div class="block-title">
    <h2>CNAE</h2>
</div>

<div class="block full">

    <a href="<?php echo base_url(); ?>cnae/create" title="Nova Banco" class="btn btn-success">Novo+</a><p>

    <div class="table-responsive">
        <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
            <thead>
                <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">Numero CNE</th>
                    <th class="text-center">Nome CNAE</th>
                  
                    
                    <th class="text-center">Ações</th>
                </tr>
            </thead>
            <tbody>

                <?php
                foreach ($dados->result() as $row) {
                    echo ' <tr>';
                    echo '<td class="text-center">' . $row->id . '</td>';
                    echo '<td class="text-center">' . $row->numero_cnae . '</td>';
                    echo '<td class="text-center">' . $row->nome_cnae . '</td>';
                   
                    




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