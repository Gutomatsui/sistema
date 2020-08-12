
<div class="row">
    <div class="col-md-6">
    <!-- Horizontal Form Block -->
        <div class="block">
        <!-- Horizontal Form Title -->
            <div class="block-title">
                <div class="block-options pull-right">
                    
                </div>
                <h2><strong>Diretórios </strong> Base</h2>
            </div>
            <div id="divResults">

            </div>
        </div>
    </div>

    <div class="col-md-6">
    <!-- Horizontal Form Block -->
        <div class="block">
        <!-- Horizontal Form Title -->
            <div class="block-title">
                <div class="block-options pull-right">
                    
                </div>

                <div class="col-md-2">
                    <h2><strong>Empresas</strong></h2>
                </div>
                <div class="col-md-4">
                        <select id="sel_tipo_tributacao" name="sel_tipo_tributacao" class="form-control" size="1">
                            <option value="" selected>Selecione</option>
                            <?php
                                foreach ($listaTipoTributacao->result()  as $row) 
                                {
                                    echo '<option value="' . $row->id . '">' . $row->nome . '</option>'; 
                                }
                            ?>
                        </select>
                    </div>

            </div>
            <!-- END Horizontal Form Title -->

            <div id="divResultsEmpresas">
            </div>
        <!-- END Horizontal Form Content -->

        <button type="button" class="btn btn-success" id="btnCopiar">Copiar</button>
        </div>
    </div>
</div>

<!-- Modal Start-->
<div class="modal" id="myprogresso">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title" id="h4TituloPro">Copiando Diretórios</h4>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body" id="divMsgPro">

        <i class="fa fa-spinner fa-4x fa-spin"></i>

        <label id="txt_msg_dir"></label>
        
        </div>
        
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-success" data-dismiss="modal">OK</button>
        </div>
        
      </div>
    </div>
  </div>
<!-- Modal End-->







<script>

    function CarregarDados()
    {

        var var_editar = $("#txt_editar").val();
        var id_dir = $("#txt_id_diretorio").val();

        if(id_dir == 0)
        {
            id_dir = $("#txt_id_empresa").val();

        }

        $.ajax({

        type : "get",
        url : "<?php echo base_url(); ?>/diretorio/listar/68",
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
                html = html + '     </th>'; 
                html = html + '     <th>';
                html = html + '         Nome ';   
                html = html + '     </th>';
                html = html + '     <th>';
                html = html + '         Dt. Criação';
                html = html + '     </th>';
           
                
                html = html + '</tr>';

                $.each(data, function(index){

                    if(data[index].fl_diretorio == true)
                    {
                        html = html + '<tr> ';

                        html = html + '<td><input type="radio" id="example-radio1" name="example-radios1" value="'+data[index].id+'"></td>';

                        html = html + '<td><i class="fa fa-folder-open" data-toggle="tooltip" data-placement="top" title="' + data[index].descricao + '" ></i></td>';
                        html = html + '<td>' +  data[index].nome + '</td>';

                        data1 = new Date(data[index].dt_cadastro);
                        html = html + '<td> ' +  formatarDataUsaBr(data[index].dt_cadastro)  + '</td>';
                 
                    }
                });  

                $('#divResults').empty().append(html);      
        }
        });
    }


    function CarregarEmpresa(id = 0)
    {
        url = "<?php echo base_url(); ?>/empresa/listar/";

        if(id != 0)
        {
            url = url + id;
        }

        var var_editar = $("#txt_editar").val();
        var id_dir = $("#txt_id_diretorio").val();

        if(id_dir == 0)
        {
            id_dir = $("#txt_id_empresa").val();

        }

        $.ajax({

        type : "get",
        url : url,
        dataType: "json",
       
        error : function (errar){
            alert(errar);
        } ,
        success: function (data){
           
            var html = '<table class="table">'
                html = html + '<tr>';
                html = html + '     <th>';
                html = html + '     </th>';
                html = html + '     <th>Nome';
                html = html + '     </th>';
                html = html + '     <th>';
                html = html + '         Razao Social ';   
                html = html + '     </th>';
                html = html + '     <th>';
                html = html + '         Cnpj/Cpf';
                html = html + '     </th>';
           
                
                html = html + '</tr>';

                $.each(data, function(index){

                   
                        html = html + '<tr>';

                        html = html + '<td><input class="clsVal1" type="checkbox" id="example-checkbox1" name="example-checkbox1" value="'+data[index].id+'"></td>';

                        html = html + '<td>' +  data[index].nome + '</td>';
                        html = html + '<td>' +  data[index].razao_social + '</td>';
                        html = html + '<td>' +  data[index].cnpj + '</td>';
                        

                 
                    
                    

                    

                });  

                $('#divResultsEmpresas').empty().append(html);      
        }
        });
    }

    $(document).ready(function() {
        CarregarDados();
        CarregarEmpresa();

        $("#sel_tipo_tributacao").change(function(){

            CarregarEmpresa($(this).val());

        });


        $("#btnCopiar").click(function(){

            $('#myprogresso').modal('show');
            $("#txt_msg_dir").empty().text("Executando...");
            //$('#divBarra').width('0%');

            var total = 0;
            var cont = 0;

            var diretorio_copia = $("input[name='example-radios1']:checked").val();

            if( diretorio_copia ==  undefined)
            {
                ShowMensagem("Erro","Selecione o diretorio a ser copiado.");
                $('#myprogresso').modal('hide');
                return ;
            }

            var arr = [];

            $('input.clsVal1:checkbox:checked').each(function () {
                total = total + 1;
            });

           if(total == 0)
           {
                ShowMensagem("Erro","Selecione as empresas de destino.");
                $('#myprogresso').modal('hide');
                return;
           }

            $('input.clsVal1:checkbox:checked').each(function () {

                cont = cont +1;



                $.ajax({

                    type : "POST",
                    url : "<?php echo base_url(); ?>Replicar/replicar_dir/"+$(this).attr("value") + "/" + diretorio_copia,
                    dataType: "json",
                    async:false,
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
                
               
                
                
            });
           
            $("#txt_msg_dir").empty().text("Sucesso... Finalizado...");
            

           
            

        });
    });
</script>