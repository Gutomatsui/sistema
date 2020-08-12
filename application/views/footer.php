</div>
</div>


<!-- Modal Start-->
<div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title" id="h4Titulo">Modal Heading</h4>
          
        </div>
        
        <!-- Modal body -->
        <div class="modal-body" id="divMsg">
          
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-success" data-dismiss="modal">OK</button>
        </div>
        
      </div>
    </div>
  </div>
<!-- Modal End-->

<footer class="clearfix">
    <div class="pull-right">
        Made by <i class="fa fa-lock text-danger"></i>  <a href="http://sshsistemas.com.br" target="_blank">SSH Sistemas</a> | V. <?php echo version; ?>
    </div>
    <div class="pull-left">
         <span id=""><?php echo date('Y'); ?></span> &copy; <a href="http://renkobrasil.com" target="_blank">Renko</a>
    </div>
</footer>

</div>

</div>

</div>

<a href="#" id="to-top"><i class="fa fa-angle-double-up"></i></a>

<div id="modal-user-settings" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h2 class="modal-title"><i class="fa fa-user"></i> Dados</h2>
            </div>
            <div class="modal-body">
                <form action="index.html" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered" onsubmit="return false;">
                    <fieldset>
                        <legend>Dados Usuários</legend>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Usuário</label>
                            <div class="col-md-8">
                                <p class="form-control-static"><?php echo $_SESSION['nome'] . " " . $_SESSION['sobrenome']; ?></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="user-settings-email">Email</label>
                            <div class="col-md-8">
                                <p class="form-control-static"><?php echo $_SESSION['email']; ?></p>
                            </div>
                        </div>
                       
                    </fieldset>
                    <fieldset>
                        <legend>Trocar Senha</legend>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="user-settings-password">Nova Senha</label>
                            <div class="col-md-8">
                                <input type="password" id="txt_senha_1" name="user-settings-password" class="form-control" placeholder="Nova Senha">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="user-settings-repassword">Confirmar Nova Senha</label>
                            <div class="col-md-8">
                                <input type="password" id="txt_senha_2" name="user-settings-repassword" class="form-control" placeholder="Confirmar Nova Senha">
                            </div>
                        </div>
                        <div class="form-group">
                        <font color="red"><label id="lbl_error" class="col-md-4 control-label" for="user-settings-repassword"></label></font>
                           
                        </div>
                    </fieldset>
                    <div class="form-group form-actions">
                        <div class="col-xs-12 text-right">
                            <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Fechar</button>
                            <button type="button" onclick="TrocarSenha()" class="btn btn-sm btn-primary">Atualizar</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- END Modal Body -->
        </div>
    </div>
</div>
<!-- END User Settings -->

<!-- jQuery, Bootstrap.js, jQuery plugins and Custom JS code -->

</body>

</html>
<script>

    function TrocarSenha()
    {
        if($("#txt_senha_1").val() != $("#txt_senha_2").val())
        {
            $("#lbl_error").text("Senhas não são iguais!");
            return;
        }

        var dados = {
                id : "<?php echo $_SESSION['id']; ?>", 
                senha: $("#txt_senha_1").val(),
                rep_senha: $("#txt_senha_2").val()
                };

        $.ajax({

            type : "POST",
            url : "<?php echo base_url(); ?>/usuario/atualizar_senha",
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
                }
                
            }
        });

        $("#txt_senha_1").val("");
        $("#txt_senha_2").val("");
        $("#lbl_error").text("");
        $('#modal-user-settings').modal('hide'); 
    }

    function ShowMensagem(titulo,msg)
    {
        $('#h4Titulo').text(titulo);
        $('#divMsg').text(msg);
        $('#myModal').modal('show'); 
    }



</script>