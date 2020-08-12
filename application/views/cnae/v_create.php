<div class="block-title">
    <h2>Banco - <strong> <?php echo($id <>0 ? 'Editar' : 'Novo') ?> </strong></h2>
</div>

<div class="row">
    <div class="col-md-12">

        <form action="#" method="post" enctype="multipart/form-data" class="form-horizontal">
                <input type="hidden" id="hid_id" value="<?php echo $id; ?>" />

                <div class="form-group">
                    <label class="col-md-3 control-label" for="txt_Nome">Numero Cnae<span class="text-danger">*</span></label>
                    <div class="col-md-5">
                        <input type="text" id="numero_cnae" name="numero_cnae" class="form-control" placeholder="Numero Cnae" value="">
                    </div>
                   
                    
                </div>



                 
                <div class="form-group">
                    <label class="col-md-3 control-label" for="txt_Nome">Nome Cnae<span class="text-danger">*</span></label>
                    <div class="col-md-5">
                        <input type="text" id="nome_cnae" name="nome_cnae" class="form-control" placeholder="Nome Cnae" value="">
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
         numero_cnae :$("#numero_cnae").val(),
         nome_cnae :$("#nome_cnae").val()
      


      };

      $.ajax({

          type: "POST", 
          url : "<?php echo base_url(); ?>cnae/store",
          dataType: "json", 
          data : dados, 
          error : function (errar){
              alert (errar);
          },
        success : function (data){

            alert(data.status);

            if(!data.status){
            ShowMensagem("erro", "Problema para gravar os dados !");

            }else if (data.status){
                ShowMensagem("Sucesso", "Dados gravados com sucesso!");

                window.location.href = "<?php echo base_url(); ?>cnae";    

            }

              //alert(data_return);  
        }


      }); 

      }

    $(document).ready(function()
      
    {
        $("#btnGravar").click(function()
        {
            Gravar();

         
            
        });


    });





    function ValidarCampos()
    {
        if($("#numero_cnae").val() != "" && $("#nome_cnae").val() != "" )
        {
            return true;
        }  
    
        return false;
    }




  </script>



