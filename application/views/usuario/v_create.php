<div class="block-title">
    <h2>Usuário - <strong><?php echo $id != 0 ? 'Editar' : 'Novo'; ?> </strong></h2>
</div>

<div class="row">
    <div class="col-md-12">

        <form action="#" method="post" enctype="multipart/form-data" class="form-horizontal">

            <input type="hidden" id="hid_id_empresa" name="hid_id_empresa" value="<?php echo $id_empresa ?>" >
            <input type="hidden" id="hid_id" name="hid_id" value="<?php echo $id; ?>" >
            <div class="form-group">
                <label class="col-md-1 control-label" for="txt_Nome">Nome<span class="text-danger">*</span></label>
                <div class="col-md-5">
                    <input type="text" id="txt_Nome" name="txt_Nome" class="form-control" placeholder="Nome" value="<?php echo (isset($dados['nome']) ? $dados['nome'] : '') ?>">
                    <?php echo form_error('txt_Nome', '<div class="help-block">', '</div>'); ?>
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-md-1 control-label" for="txt_Email">Email<span class="text-danger">*</span></label>
                <div class="col-md-5">
                    <input type="email" id="txt_Email" name="txt_Email" class="form-control" placeholder="E-mail" value="<?php echo (isset($dados['email']) ? $dados['email'] : '') ?>">
                    <?php echo form_error('txt_Email', '<div class="help-block">', '</div>'); ?>
                </div>
            </div>

            <div class="form-group">
                    <label class="col-md-1 control-label" for="sel_tipo_perfil">Tipo Perfil<span class="text-danger">*</span></label>
                    <div class="col-md-2">
                        <select id="sel_tipo_perfil" name="sel_tipo_perfil" class="form-control" size="1">
                            <option value="" selected>Selecione</option>
                            <?php
                             foreach ($perfil->result()  as $row) {
                          
                                echo '<option  value="' . $row->id . '">' . $row->nome . '</option>'; 
                            }?>

                        </select>
                        <?php echo form_error('sel_tipo_perfil', '<div class="help-block">', '</div>'); ?>
                    </div>
                </div>

            <div class="form-group">
                <label class="col-md-1 control-label" for="sel_status">Status<span class="text-danger">*</span></label>
                <div class="col-md-2">
                    <select id="sel_status" name="sel_status" class="form-control" size="1">
                        <option value="" selected>Selecione</option>
                        <option value="0">Desativado</option>
                        <option value="1">Ativo</option>
                    </select>
                    <?php echo form_error('sel_status', '<div class="help-block">', '</div>'); ?>
                </div>
            </div>

            <div class="form-group form-actions">
                <div class="col-md-9 col-md-offset-1">
                    <button type="button" id="btnGravar" class="btn btn-sm btn-success"><i class="fa fa-angle-right"></i> Gravar</button>

                    <a href="<?php echo base_url();?>usuario/index/<?php echo $id_empresa; ?>" data-toggle="tooltip" title="Editar" class="btn btn-sm btn-danger"><i class="fa fa-angle-right"></i> Voltar</a>
                </div>
            </div>
        </form>

    </div>

</div>

<script>

function ValidarCampos()
{

    if($("#txt_Nome").val() != "" && $("#txt_Email").val() != "" && $("#sel_tipo_perfil").val() != "" && $("#sel_status").val() != "" )
        {
            return true;
        }  
    
        return false;

}

function Gravar()
{

    if(!ValidarCampos())
    {
        ShowMensagem("Atenção","Todos os campos obrigatórios devem ser preenchidos!");
        
        return;            
    }

    var dados = {
                id : $("#hid_id").val(), 
                id_empresa : $("#hid_id_empresa").val(),
                nome: $("#txt_Nome").val(),
                email: $("#txt_Email").val(),
                id_perfil: $("#sel_tipo_perfil").val(),
                fl_ativo: $("#sel_status").val() == "0" ? 0 : 1
                };
    $.ajax({

        type : "POST",
        url : "<?php echo base_url(); ?>/usuario/store",
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

                window.location.href = "<?php echo base_url(); ?>usuario/index/" + $("#hid_id_empresa").val();
                }
            alert(data_return);
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
            url : "<?php echo base_url(); ?>/usuario/pesquisar/"+id,
            dataType: "json",
            error : function (errar){
                alert(errar);
            } ,
            success: function (data){

                $("#txt_Nome").val(data[0].nome);
                $("#sel_tipo_perfil").val(data[0].id_perfil);
                $("#txt_Email").val(data[0].email);
                if(data[0].fl_ativo == "1")
                {
                    $("#sel_status").val("1");
                }else
                {
                    $("#sel_status").val("0");
                }
            }
            });
        }
    }

    function ValidarEmail()
    {
        var id = $("#hid_id").val();
        var email = $("#txt_Email").val();

        if(id == 0)
        {
            $.ajax({

            type : "POST",
            url : "<?php echo base_url(); ?>/usuario/pesquisar_email/"+email.replace(".", "").replace(".", "").replace("@", "").replace("-", ""),
            dataType: "json",
            error : function (errar){
               // alert(errar);
            } ,
            success: function (data){

                if(data.length > 0)
                {
                    if(data[0].email == email)
                    {
                        $("#txt_Email").val("");
                        ShowMensagem("Atenção","E-mail ja existe na base.");
                    }
                }
            }
            });
        }

    }


$(document).ready(function() {

    CarregarDados();
    

    
    $("#btnGravar").click(function(){
        Gravar();
    });

    $('#txt_Email').focusout(function() {
        ValidarEmail();
        })
   
});                   

</script>