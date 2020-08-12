  
    
    <!-- Customer Content -->
    <div class="row">
                            <div class="col-lg-4">
                                <!-- Customer Info Block -->
                                <div class="block">
                                    <!-- Customer Info Title -->
                                    <div class="block-title">
                                        <h2><i class="fa fa-file-o"></i> <strong>Cliente | </strong> Informações</h2>
                                    </div>
                                    <!-- END Customer Info Title -->

                                 <!-- Customer Info -->
                                 <div class="block-section text-center">
                                       
                                 <div style="background-color: #eee;height: 104px; width: 137px; margin-left: 38%;" class="img-circle">  <span style="margin-top: 25px; z-index: 545; float: left;  margin-left: 40px; text-transform: uppercase; font-size: 38px; color: blue; " ><?php echo substr($dados->nome,0,2) ; ?></span>  </div>
                                           
                                           
                                        
                                        <h3>
                                            <strong style="font-size: 20px" ><?php echo $dados->nome; ?></strong><br><small></small>
                                        </h3>
                                    </div>
                                    <table class="table table-borderless table-striped table-vcenter">
                                        <tbody>
                                            <tr>
                                                <td class="text-right" style="width: 50%;"><strong>Razão Social</strong></td>
                                                <td><? echo $dados->razao_social ?></td>
                                            </tr>
                                            <tr>
                                                <td class="text-right"><strong> <?php echo (strlen($dados->cnpj) > 15 ? "CNPJ" : "CPF" );   ?></strong></td>
                                                <td><?php echo $dados->cnpj ; ?></td>
                                            </tr>
                                            <tr>
                                                <td class="text-right"><strong>Endereço </strong></td>
                                                <td> <?php echo $dados->endereco ; ?></td>
                                            </tr>
                                            <tr>
                                                <td class="text-right"><strong>Número</strong></td>
                                                <td><?php echo $dados->numero; ?></td>
                                            </tr>
                                            <tr>
                                                <td class="text-right"><strong>Complemento</strong></td>
                                                <td><?php echo $dados->complemento ?></td>
                                            
                                            </tr>

                                            <tr>
                                                <td class="text-right"><strong>Cidade</strong></td>
                                                <td><?php echo $dados->cidade ?></td>
                                            
                                            </tr>

                                            <tr>
                                                <td class="text-right"><strong>Bairro</strong></td>
                                                <td><?php echo $dados->bairro ?></td>
                                            
                                            </tr>

                                            <tr>
                                                <td class="text-right"><strong>UF</strong></td>
                                                <td><?php echo $dados->uf ?></td>
                                            
                                            </tr>


                                            


                                            <tr>

                                            <td class="text-right"><strong>Status</strong></td>

                                            <td>
                                            <?php
                                            

                                            if ($dados->fl_ativo == 1) {
                                                    echo ' <span class="label label-success"> <i class="fa fa-check"> </i> Ativo</span>';
                                                } else {
                                                    echo ' <span class="label label-danger"> <i class="fa fa-times"> </i> Desativado</span>';
                                                }

                                                    ?>

                                            </td>       
                                              
                                                



                                            </tr>
                                        </tbody>
                                    </table>
                                    <!-- END Customer Info -->
                                </div>
                                <!-- END Customer Info Block -->

                         
                                          <!--- bloco abaixo --->          

                                </div>                         


                            <div class="col-lg-8">
                                <!-- Orders Block -->
                                <div class="block">
                                    <!-- Orders Title -->
                                    <div class="block-title text-center ">
                                        <div class="block-options pull-right">
                                          
                                        </div>
                                        <h2><i class="fa fa-file"></i> <strong>Detalhes Contábeis</strong></h2>
                                    </div>
                                    <!-- END Orders Title -->

                                    <!-- Orders Content -->
                                    <table class="table table-bordered table-striped table-vcenter">
                                        <tbody>
                                            <tr>
                                                <td class="text-center" style="width: 50%;"><strong>Tipos de Atividades</strong></td>

                                                <td style="color: blue" class="text-center" style="width: 100%;">  <?php echo $dados->tipo_nome_empresa; ?>  </td>

                                                
                                            </tr>
                                            <tr>

                                            <td class="text-center" style="width: 50%;"><strong>Porte da Empresa</strong></td>

                                                <td style="color: blue;" class="text-center" style="width: 100%;">  <?php echo $dados->tipo_nome_porte_empresa; ?>  </td>
                                               
                                            </tr>
                                            <tr>

                                            <td class="text-center" style="width: 50%;"><strong>Regime de Apuração</strong></td>

                                            <td style="color: blue" class="text-center" style="width: 100%;">  <?php echo $dados->tipo_nome_regime; ?>  </td>
                                               
                                            </tr>
                                            <tr>

                                            </tr>
                                        </tbody>
                                    </table>
                                    <!-- END Orders Content -->
                                </div>
                                <!-- END Orders Block -->


                            

                                <div class="block">
                                    <!-- Orders Title -->
                                    <div class="block-title text-center">
                                        <div class="block-options pull-right">
                                          
                                        </div>
                                        <h2><i class="fa fa-bitcoin"></i> <strong>Forma de Tributação</strong></h2>
                                    </div>
                                    <!-- END Orders Title -->

                                    <!-- Orders Content -->
                                    <table class="table table-bordered table-striped table-vcenter">
                                        <tbody>
                                            <tr>
                                                <td class="text-center" style="width: 50%;"><strong>Tipos de Atividades</strong></td>

                                                <td style="color: blue;" class="text-center" style="width: 100%;">  <?php echo $dados->tipo_nome_tributacao; ?>  </td>

                                                
                                            </tr>
                                           
                                          
                                            
                                        </tbody>
                                    </table>
                                    <!-- END Orders Content -->
                                </div>
                                <!-- END Orders Block -->



                                <div class="block">
                                    <!-- Orders Title -->
                                    <div class="block-title text-center">
                                        <div class="block-options pull-right">
                                          
                                        </div>
                                        <h2><i class="fa fa-file-o"></i> <strong>Contrato </strong></h2>
                                    </div>
                                    <!-- END Orders Title -->

                                    <!-- Orders Content -->
                                    <table class="table table-bordered table-striped table-vcenter">
                                        <tbody>


                                        <tr>
                                                <td class="text-center" style="width: 50%;"><strong>Nome </strong></td>

                                              

                                                <td style="color: blue;" class="text-center" style="width: 100%;">  <?php echo $dados->contrato; ?>  </td>

                                                
                                            </tr>



                                        <tr>
                                                <td class="text-center" style="width: 50%;"><strong>Data do Ulpload </strong></td>

                                                <?php setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese'); ?> 

                                                <td style="color: blue;" class="text-center" style="width: 100%;">  <?php echo date_format(date_create($dados->dt_contrato), "d/m/Y" ); ?></td>

                                                
                                            </tr>



                                            <tr>
                                                <td class="text-center" style="width: 50%;"><strong>Data Inicio</strong></td>



                                                <td style="color: blue;" class="text-center" style="width: 100%;">  <?php echo date_format(date_create($dados->dt_inicio_contrato), "d/m/Y" ); ?>  </td>

                                                
                                            </tr>



                                            <tr>
                                                <td class="text-center" style="width: 50%;"><strong>Data Final</strong></td>



                                                <td style="color: blue;" class="text-center" style="width: 100%;">  <?php echo date_format(date_create($dados->dt_fim_cotrato), "d/m/Y" ); ?>  </td>

                                                
                                            </tr>





                                            <tr>
                                                <td class="text-center" style="width: 50%;"><strong>Baixar</strong></td>

                                               

                                                <td style="color: blue;" class="text-center" style="width: 100%;"> <a href='<?php echo base_url(); ?>uploads/<?php echo $dados->id ."/".$dados->contrato; ?>' download='<?php echo $dados->contrato;?>' data-toggle='tooltip' title='Acessar' class='btn btn-md btn-warning'><i class='fa fa-cloud-download'></i></a> </td>

                                                
                                            </tr>


                                            <tr>
                                               <div id="div_contrato">

                                               </div>

                                                
                                            </tr>

                                          
                                            
                                        </tbody>
                                    </table>
                                    <!-- END Orders Content -->
                                </div>
                                <!-- END Orders Block -->



                                
                                <div class="block">
                                    <!-- Orders Title -->
                                    <div class="block-title text-center">
                                        
                                        <h2><i class="fa fa-money"></i> <strong>Plano do Cliente </strong></h2>
                                    </div>
                                    <!-- END Orders Title -->

                                    <!-- Orders Content -->
                                    <table class="table table-bordered table-striped table-vcenter">
                                        <tbody>

                                        <tr>
                                                <td class="text-center" style="width: 50%;"><strong>Data Ativação do plano</strong></td>

                                                <td style="color: blue;" class="text-center" style="width: 100%;">  <?php echo date_format(date_create($dados->data_plano), 'd/m/Y'); ?>  </td>

                                                
                                            </tr>    




                                            <tr>
                                                <td class="text-center" style="width: 50%;"><strong>Nome do Plano</strong></td>

                                                <td style="color: blue;" class="text-center" style="width: 100%;">  <?php echo $dados->nome_plano; ?>  </td>

                                                
                                            </tr>

                                            <tr>
                                                <td class="text-center" style="width: 50%;"><strong>Categoria do  plano</strong></td>

                                                <td style="color: blue;" class="text-center" style="width: 100%;">  <?php echo $dados->nome_tipo_plano; ?>  </td>

                                                
                                            </tr>


                                          


                                            <tr>
                                                <td class="text-center" style="width: 50%;"><strong>Valor do Plano</strong></td>

                                                <td style="color: blue;" class="text-center" style="width: 100%;"> R$<?php echo number_format( $dados->valor_plano , 2,",","." ); ?>  </td>

                                                
                                            </tr>
                                           
                                          
                                            
                                        </tbody>
                                    </table>
                                    <!-- END Orders Content -->
                                </div>
                                <!-- END Orders Block -->

                          
                        </div>
                        <!-- END Customer Content -->
                    </div>
                    <!-- END Page Content -->

                </div>
                <!-- END Main Container -->
            </div>
            <!-- END Page Container -->
        </div>
        <!-- END Page Wrapper -->

   
               

                    <script>

$(document).ready(function() {

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

});



                    </script>
     