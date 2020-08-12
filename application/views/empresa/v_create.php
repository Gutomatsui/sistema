    <!-- Page content -->
    <div id="page-content">
                        <!-- Forms General Header -->
                        <div class="content-header">
                            <div class="header-section">
                                <h1>
                                    <i class="gi gi-notes_2"></i>Formulario<br><small>Preencha os campos  </small>
                                </h1>
                            </div>
                        </div>
                        <ul class="breadcrumb breadcrumb-top">
                        <li>Empresa - <strong><?php echo ($id <> 0 ? 'Editar' : 'Novo') ?> </strong></li>
                        </ul>
                        <!-- END Forms General Header -->

                        <div class="row">
                            <div class="col-md-6">
                                <!-- Basic Form Elements Block -->
                                <div class="block">
                                    <!-- Basic Form Elements Title -->
                                    <div class="block-title">
                                        <div class="block-options pull-right">
                                           
                                        </div>
                                        <h2><strong>Cadastro da </strong> Empresa</h2>
                                    </div>
                                    <!-- END Form Elements Title -->

                                    <!-- Basic Form Elements Content -->
                                    <form action="#" method="post" enctype="multipart/form-data" class="form-horizontal">
                                        <input type="hidden" id="hid_id" value="<?php echo $id; ?>" />



                                        <div class="form-group">
                                           <label class="col-md-3 control-label" for="sel_status"> <span class="text-danger">*</span> Tipo do Cliente</label>
                                            <div class="col-md-4">
                                          <select id="sel_tipo_cliente" name="sel_tipo_cliente" class="form-control" size="1">
                                                <option value="" selected>Selecione</option>
                                                <?php
                                                    foreach ($listaTipoCliente->result()  as $row) 
                                                    {
                                                        echo '<option  value="' . $row->id . '">' . $row->nome . '</option>'; 
                                                    } 
                                                ?>
                                            </select>
                                            </div>
                                        </div>


                                       
                                        <div class="form-group">
                                           <label class="col-md-3 control-label" for="txt_CNPJ"> <span class="text-danger">*</span> CNPJ/CPF</label>
                                            <div class="col-md-6">
                                            <input type="text" id="txt_CNPJ" name="txt_CNPJ" class="form-control" placeholder="CPF/CNPJ" value="">
                                            </div>
                                        </div>

                                      <div class="form-group">
                                            <label class="col-md-3 control-label" for="txt_Razao_Social"><span class="text-danger"> * </span> Razão Social</label>
                                            <div class="col-md-6">
                                            <input type="text" id="txt_RazaoSocial" name="txt_RazaoSocial" class="form-control" placeholder="Razão Social" value="">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="txt_Nome"><span class="text-danger"> * </span> Nome Fantasia</label>
                                            <div class="col-md-6">
                                            <input type="text" id="txt_Nome" name="txt_Nome" class="form-control" placeholder="Nome Fantasia" value="">
                                            </div>
                                        </div>

                                      


                                        
                                   
                                    <!-- END Basic Form Elements Content -->
                                </div>
                                <!-- END Basic Form Elements Block -->


                        <!------------ aqui termina a blodo de cima ------------->




                        <div class="block">
                                    <!-- Basic Form Elements Title -->
                                    <div class="block-title">
                                        <div class="block-options pull-right">
                                           
                                        </div>
                                        <h2><strong>Contatos da  </strong> Empresa</h2>
                                    </div>
                                    <!-- END Form Elements Title -->

                                    <!-- Basic Form Elements Content -->
                                    <div class="form-horizontal">
                                       

                                      <div class="form-group">
                                            <label class="col-md-3 control-label" for="txt_Email"><span class="text-danger"> * </span> Email</label>
                                            <div class="col-md-6">
                                            <input type="email" id="txt_Email" name="txt_Email" class="form-control" placeholder="E-mail" value="">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="txt_fone1"><span class="text-danger">  </span> Telefone </label>
                                            <div class="col-md-6">
                                            <input type="txt" id="txt_fone1" name="txt_fone1" class="form-control" placeholder="Telefone" value="">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="txt_fone2"><span class="text-danger"> </span> Celular </label>
                                            <div class="col-md-6">
                                            <input type="txt" id="txt_fone2" name="txt_fone2" class="form-control" placeholder="Celular" value="">
                                            </div>
                                        </div>


                                       
                                       




                                        


                                                </div>
                               
                                    <!-- END Basic Form Elements Content -->
                                </div>
                                <!-- END Basic Form Elements Block -->                                






                        <div class="block">
                                    <!-- Basic Form Elements Title -->
                                    <div class="block-title">
                                        <div class="block-options pull-right">
                                           
                                        </div>
                                        <h2><strong>Endereço da </strong> Empresa</h2>
                                    </div>
                                    <!-- END Form Elements Title -->

                                    <!-- Basic Form Elements Content -->
                                    <div class="form-horizontal">
                                       

                                      <div class="form-group">
                                            <label class="col-md-3 control-label" for="txt_cep"><span class="text-danger"> * </span> CEP</label>
                                            <div class="col-md-6">
                                            <input type="text" id="txt_cep" onfocusout="PesquisarCEP()" name="txt_cep" class="form-control" placeholder="CEP" value="">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="txt_endereco"><span class="text-danger"> * </span> Endereço </label>
                                            <div class="col-md-6">
                                            <input type="text" id="txt_endereco" name="txt_endereco" class="form-control" placeholder="Endereço" value="">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="txt_numero"><span class="text-danger"> * </span> Número  </label>
                                            <div class="col-md-6">
                                            <input type="text" id="txt_numero" name="txt_numero" class="form-control" placeholder="Numero" value="">
                                            </div>
                                        </div>


                                       
                                        <div class="form-group">
                                           <label class="col-md-3 control-label" for="txt_complemento"> <span class="text-danger"></span>Complemento</label>
                                            <div class="col-md-6">
                                            <input type="text" id="txt_complemento" name="txt_complemento" class="form-control" placeholder="Complemento" value="">
                                            </div>
                                        </div>


                                        <div class="form-group">
                                           <label class="col-md-3 control-label" for="txt_cidade"> <span class="text-danger"> * </span>Cidade</label>
                                            <div class="col-md-6">
                                            <input type="text" id="txt_cidade" name="txt_cidade" class="form-control" placeholder="Cidade" value="">
                                            </div>
                                        </div>


                                        <div class="form-group">
                                           <label class="col-md-3 control-label" for="txt_uf"> <span class="text-danger"> * </span>UF</label>
                                            <div class="col-md-6">
                                            <input type="email" id="txt_uf" name="txt_uf" maxlength="2" class="form-control" placeholder="UF" value="">
                                            </div>
                                        </div>


                                                </div>
                               
                                    <!-- END Basic Form Elements Content -->
                                </div>
                                <!-- END Basic Form Elements Block -->
                                






                            </div>


                            <!-- termina o bloco da esquerda --->
                            
                            
                            <div class="col-md-6">
                            <div class="block">
                                    <!-- Basic Form Elements Title -->
                                    <div class="block-title">
                                        <div class="block-options pull-right">
                                           
                                        </div>
                                        <h2><strong>Detalhes contabeis  </strong></h2>
                                    </div>
                                    <!-- END Form Elements Title -->

                                    <!-- Basic Form Elements Content -->
                                    <div class="form-horizontal">
                                       

                                    <div class="form-group">
                                           <label class="col-md-3 control-label" for="sel_tipo_empresa"> <span class="text-danger">*</span> Tipos Atividade</label>
                                            <div class="col-md-4">
                                            <select id="sel_tipo_empresa" name="sel_tipo_empresa" class="form-control" size="1">
                                                <option value="" selected>Selecione</option>
                                                <?php
                                                    foreach ($listaTipoEmpresa->result()  as $row) 
                                                    {
                                                        echo '<option  value="' . $row->id . '">' . $row->nome . '</option>'; 
                                                    } 
                                                ?>
                                            </select>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                           <label class="col-md-3 control-label" for="sel_tipo_porte_empresa"> <span class="text-danger"> * </span>Porte da Empresa</label>
                                            <div class="col-md-4">
                                            <select id="sel_tipo_porte_empresa" name="sel_tipo_porte_empresa" class="form-control" size="1">
                                                <option value="" selected>Selecione</option>
                                                <?php
                                                    foreach ($listaTipoPorteEmpresa->result()  as $row) 
                                                    {
                                                        echo '<option value="' . $row->id . '">' . $row->nome . '</option>';
                                                    }      
                                                ?>
                                            </select>
                                            </div>
                                        </div>



                                        <div class="form-group">
                                           <label class="col-md-3 control-label" for="sel_tipo_regime_apuracao"> <span class="text-danger"> * </span>Regime de Apuração</label>
                                            <div class="col-md-4">
                                            <select id="sel_tipo_regime_apuracao" name="sel_tipo_regime_apuracao" class="form-control" size="1">
                                                <option value="" selected>Selecione</option>
                                                <?php
                                                    foreach ($listaTipoRegimeApuracao->result()  as $row) 
                                                    {
                                                        echo '<option value="' . $row->id . '">' . $row->nome . '</option>'; 
                                                    }
                                                ?>
                                            </select>
                                            </div>
                                        </div>



                                                </div>
                               
                                    <!-- END Basic Form Elements Content -->
                                </div>
                                <!-- END Basic Form Elements Block -->

                              

                                <!-- Input Sizes Block -->
                                <div class="block">
                                    <!-- Basic Form Elements Title -->
                                    <div class="block-title">
                                        <div class="block-options pull-right">
                                           
                                        </div>
                                        <h2><strong>Forma de Tributação</strong></h2>
                                    </div>
                                    <!-- END Form Elements Title -->

                                    <!-- Basic Form Elements Content -->
                                    <div class="form-horizontal">
                                       

                                    <div class="form-group">
                                           <label class="col-md-3 control-label" for="sel_tipo_tributacao"> <span class="text-danger">*</span> Tipos de Tributação</label>
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


          

                                 </div>
                            </div>







                              
                                 
                                           <div id="div_contrato"></div>
                                        
                                       


          




                             <!-- Input Sizes Block -->
                             <div class="block">
                                    <!-- Basic Form Elements Title -->
                                    <div class="block-title">
                                        <div class="block-options pull-right">
                                           
                                        </div>
                                        <h2><strong>Status Empresa</strong></h2>
                                    </div>
                                    <!-- END Form Elements Title -->

                                    <!-- Basic Form Elements Content -->
                                    <div class="form-horizontal">
                                       

                                    <div class="form-group">
                                           <label class="col-md-3 control-label" for="sel_status"> <span class="text-danger">*</span>Status</label>
                                            <div class="col-md-4">
                                            <select id="sel_status" name="sel_status" class="form-control" size="1">
                                                <option value="" selected>Selecione</option>
                                                <option value="1">Ativo</option>
                                                <option value="0">Desativado</option>
                                            </select>
                                            </div>
                                        </div>


                                        <div class="form-group form-actions">
                                            <div class="col-sm-9 col-sm-offset-3">
                                            <div class="col-md-9 col-md-offset-1">
                                            <button type="button" id="btnGravar" class="btn btn-sm btn-success"><i class="fa fa-angle-right"></i> Gravar</button>

                                            </div>


          

                                 </div>
                            </div>

                                 </form>



         </div>
    </div>
  



<script>
    function Gravar()
    {

        if(!ValidarCampos())
        {
            ShowMensagem("Atenção","Todos os campos obrigatórios devem ser preenchidos!");
            return;            
        }

        var dados = {
                    id : $("#hid_id").val(), 
                    nome : $("#txt_Nome").val(),
                    razao_social: $("#txt_RazaoSocial").val(),
                    cnpj: $("#txt_CNPJ").val(),
                    email: $("#txt_Email").val(),
                    fl_status: $("#sel_status").val(),
                    id_tipo_empresa: $("#sel_tipo_empresa").val(),
                    id_tipo_regime_apuracao: $("#sel_tipo_regime_apuracao").val(),
                    id_tipo_porte_empresa: $("#sel_tipo_porte_empresa").val(),
                    id_tipo_tributacao: $("#sel_tipo_tributacao").val(),
                    id_tipo_cliente: $("#sel_tipo_cliente").val(),
                    fone1: $("#txt_fone1").val(),
                    fone2: $("#txt_fone2").val(),
                    endereco: $("#txt_endereco").val(),
                    cep: $("#txt_cep").val(),
                    numero: $("#txt_numero").val(),
                    complemento: $("#txt_complemento").val(),
                    bairro: $("#txt_bairro").val(),
                    cidade: $("#txt_cidade").val(),
                    uf: $("#txt_uf").val()
                    };
        $.ajax({

            type : "POST",
            url : "<?php echo base_url(); ?>/empresa/store",
            dataType: "json",
            data : dados, // passando a array
            error : function (errar){
                alert(errar);
            } ,
            success: function (data){

                if(!data.status) {
                    ShowMensagem("Erro","Problema para gravar os dados!");
                    
                 } else if(data.status) {
           
                    ShowMensagem("Sucesso","Dados gravados com sucesso!");
                   

                    window.location.href = "<?php echo base_url(); ?>empresa";
                 }
                //alert(data_return);
            }
        });
    }
    
    function CarregarDados()
    {
        var id = $("#hid_id").val();

        if(id>0)
        {
            $.ajax({

            type : "POST",
            url : "<?php echo base_url(); ?>/empresa/pesquisar/"+id,
            dataType: "json",
            error : function (errar){
                alert(errar);
            } ,
            success: function (data){

                $("#txt_Nome").val(data[0].nome);
                $("#txt_RazaoSocial").val(data[0].razao_social);
                $("#txt_CNPJ").val(data[0].cnpj);
                $("#txt_Email").val(data[0].email);
                if(data[0].fl_ativo == "1")
                {
                    $("#sel_status").val("1");
                }else
                {
                    $("#sel_status").val("0");
                }
               
                $("#sel_tipo_empresa").val(data[0].id_tipo_empresa);
                $("#sel_tipo_regime_apuracao").val(data[0].id_tipo_regime);
                $("#sel_tipo_porte_empresa").val(data[0].id_tipo_porte_empresa);
                $("#sel_tipo_tributacao").val(data[0].id_tipo_tributacao);
                $("#sel_tipo_cliente").val(data[0].id_tipo_cliente);

                $("#txt_fone1").val(data[0].fone1);
                $("#txt_fone2").val(data[0].fone2);

                $("#txt_cep").val(data[0].cep)
                $("#txt_endereco").val(data[0].endereco)
                $("#txt_numero").val(data[0].numero)
                $("#txt_complemento").val(data[0].complemento)
                $("#txt_bairro").val(data[0].bairro)
                $("#txt_cidade").val(data[0].cidade)
                $("#txt_uf").val(data[0].uf)
                
                if($('#sel_tipo_cliente').val() == "2")
                {
                    $('#txt_CNPJ').mask('000.000.000-00');
                }else
                {
                    $('#txt_CNPJ').mask('00.000.000/0000-00');
                }
                $("#txt_CNPJ").prop( "disabled", false );

                if(data[0].contrato != null)
                {
                    $('#div_contrato').show();

                    painelConteudo = '<div class="block">';
                    painelConteudo += '<div class="block-title">'
                    painelConteudo += '<h2><strong>Contrato</h2></div>'
                    painelConteudo += '<div class="form-group">'
                    painelConteudo += '<label class="col-md-3 control-label"> Nome Arquivo: </label> ' + data[0].contrato ;
                    painelConteudo += '</div>'
                    painelConteudo += '<div class="form-group">'
                    painelConteudo += '</br> <label class="col-md-3 control-label"> Data Upload: </label>'  + formatarDataHora(data[0].dt_contrato) +'</label>' ;
                    painelConteudo += '</div>'    
                    painelConteudo += '<div class="form-group">'     
                    painelConteudo += '</br> <label class="col-md-3 control-label"> Data Inicio: </label> ' +  (data[0].dt_inicio_contrato == null ? "-" : formatarDataHora(data[0].dt_inicio_contrato));
                    painelConteudo += '</div>' 
                    painelConteudo += '<div class="form-group">'
                    painelConteudo += '</br> <label class="col-md-3 control-label"> Data Vencimento: </label> ' + (data[0].dt_fim_cotrato == null ? "-" : formatarDataHora(data[0].dt_fim_cotrato));
                    painelConteudo += '</div>'
                    painelConteudo += '<div class="form-group">'
                    painelConteudo += '</br> <label class="col-md-3 control-label"> Baixar </label> '
                    painelConteudo += "<a href='<?php echo base_url(); ?>uploads/" + data[0].id + "/" + data[0].contrato + " ' download='" + data[0].contrato + "' data-toggle='tooltip' title='Acessar' class='btn btn-md btn-warning'><i class='fa fa-cloud-download'></i></a> "
                    painelConteudo += '</div>';
                    
                    $('#div_contrato').append(painelConteudo);
                }
            }
            });
        }
    }

    function ValidarCampos()
    {
        if($("#txt_Nome").val() != "" && $("#txt_RazaoSocial").val() != "" && $("#txt_CNPJ").val() != "" && $("#txt_Email").val() != "" && $("#sel_status").val() != "" && $("#fone1").val() != "" &&
        $("#sel_tipo_empresa").val() != "" && $("#sel_tipo_regime_apuracao").val() != "" && $("#sel_tipo_porte_empresa").val() != "" && $("#sel_tipo_tributacao").val() != "" && $("#sel_tipo_cliente").val() != "" )
        {
            return true;
        }  
    
        return false;
    }

    function ValidarCnpjCpf()
    {
        var id = $("#hid_id").val();
        var num = $("#txt_CNPJ").val();

        if(id == 0)
        {
            $.ajax({

            type : "POST",
            url : "<?php echo base_url(); ?>/empresa/pesquisar_cnpj_cpf/"+num.replace(".", "").replace(".", "").replace("/", "").replace("-", ""),
            dataType: "json",
            error : function (errar){
               // alert(errar);
            } ,
            success: function (data){

                if(data.length > 0)
                {
                    if(data[0].cnpj == num)
                    {
                        $("#txt_CNPJ").val("");
                        ShowMensagem("Atenção","Cnpj/Cpj ja existe na base.");
                        
                    }
                }
            }
            });
        }

    }

    function PesquisarCEP()
    {

        var cep = $("#txt_cep").val();

       


        $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

            if (!("erro" in dados)) {
                //Atualiza os campos com os valores da consulta.
                $("#txt_endereco").val(dados.logradouro);
                $("#txt_bairro").val(dados.bairro);
                $("#txt_cidade").val(dados.localidade);
                $("#txt_uf").val(dados.uf);
                
            } //end if.
            else {
                //CEP pesquisado não foi encontrado.
                
                alert("CEP não encontrado.");
            }
            });
       

    }

    $(document).ready(function() {

        CarregarDados();
        $('#txt_CNPJ').mask('00.000.000/0000-00');
        $('#txt_fone1').mask('(00)0000-0000');
        $('#txt_fone2').mask('(00)0000-0000');
        $('#txt_cep').mask('00000-000');
       
        
        $('#div_contrato').hide();
        $("#txt_CNPJ").prop( "disabled", true );

        $("#btnGravar").click(function(){
            Gravar();
        });

        $('#sel_tipo_cliente').change(function() {

            if($('#sel_tipo_cliente').val() != "")
            {
                if($('#sel_tipo_cliente').val() == "2")
                {
                    $('#txt_CNPJ').mask('000.000.000-00');
                }else
                {
                    $('#txt_CNPJ').mask('00.000.000/0000-00');
                }
                $("#txt_CNPJ").prop( "disabled", false );
            }else{
                $("#txt_CNPJ").val("");
                $("#txt_CNPJ").prop( "disabled", true );
            }
        });


        $('#txt_CNPJ').focusout(function() {
            ValidarCnpjCpf();
        })




        
    });



    $('label.data').each(function () {
    var data = new Date(this.value);
    this.value = [data.getDate(), data.getMonth() + 1, data.getFullYear()].join('/');
});
</script>