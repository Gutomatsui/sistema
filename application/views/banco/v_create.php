<div class="block-title">
    <h2>Banco - <strong> <?php echo($id <>0 ? 'Editar' : 'Novo') ?> </strong></h2>
</div>

<div class="row">
    <div class="col-md-12">

        <form action="#" method="post" enctype="multipart/form-data" class="form-horizontal">
                <input type="hidden" id="hid_id" value="<?php echo $id; ?>" />

                <div class="form-group">
                    <label class="col-md-3 control-label" for="txt_Nome">Nome Banco<span class="text-danger">*</span></label>
                    <div class="col-md-5">
                        <input type="text" id="nome_banco" name="nome_banco" class="form-control" placeholder="Nome do Banco" value="">
                    </div>
                   
                    
                </div>



                 
                <div class="form-group">
                    <label class="col-md-3 control-label" for="txt_Nome">Valor Boleto<span class="text-danger">*</span></label>
                    <div class="col-md-5">
                        <input type="text" id="valor_boleto" name="valor_boleto" class="form-control" placeholder="Valor do Boleto " value="">
                    </div>
                   
                    
                </div>


                 
                <div class="form-group">
                    <label class="col-md-3 control-label" for="txt_Nome">Mora<span class="text-danger">*</span></label>
                    <div class="col-md-5">
                        <input type="text" id="mora" name="mora" class="form-control" placeholder="Valor do Mora " value="">
                    </div>
                   
                    
                </div>

                

                <div class="form-group">
                    <label class="col-md-3 control-label" for="txt_Nome">Juros Ativo<span class="text-danger">*</span></label>
                    <div class="col-md-5">
                        <input type="text" id="juros_ativo" name="juros_ativo" class="form-control" placeholder="Valor do  Juros Ativos " value="">
                    </div>
                   
                    
                </div>

                






                <div class="form-group form-actions">
                    <div class="col-md-9 col-md-offset-3">
                        <button type="button" id="btnGravar" class="btn btn-sm btn-success"><i class="fa fa-angle-right"></i> Gravar</button>

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
              ShowMensagem("Atenção","Todos os campos obrigatorios devem ser preenchidos!");
              return;
          }
      

      var dados = 
      {
         id :$("#hid_id").val(),
         nome_banco :$("#nome_banco").val(),
         mora :$("#mora").val(),
         juros_ativo :$("#juros_ativo").val(),
         valor_boleto :$("#valor_boleto").val()


      };

      $.ajax({

          type: "POST", 
          url : "<?php echo base_url(); ?>banco/store",
          dataType: "json", 
          data : dados, 
          error : function (errar){
              alert (errar);
          },
        success : function (data){

          //  alert(data.status);

            if(!data.status){
            ShowMensagem("erro", "Problema para gravar os dados !");

            }else if (data.status){
                ShowMensagem("Sucesso", "Dados gravados com sucesso!");

                window.location.href = "<?php echo base_url(); ?>banco";    

            }

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
            url : "<?php echo base_url(); ?>/banco/pesquisar/"+id,
            dataType: "json",
            error : function (errar){
                alert(errar);
            } ,

            success: function (data){

               

                $("#nome_banco").val(data[0].nome_banco);
                $("#mora").val(data[0].mora);
                $("#juros_ativo").val(data[0].juros_ativo);
                $("#valor_boleto").val(data[0].valor_boleto);
                


            }
            });
        }
    }





    $(document).ready(function()
      
    {
        $("#btnGravar").click(function()
        {
            Gravar();

         
            
        });

            CarregarDados();

            
                
                





    });


   





    function ValidarCampos()
    {
        if($("#nome_banco").val() != "" && $("#mora").val() != "" && $("#juros_ativo").val() != "" && $("#valor_boleto").val() != "" )
        {
            return true;
        }  
    
        return false;
    }




  </script>



