<div class="block-title">
    <h2>Usuário - <strong><?php echo (isset($dados['id']) ? 'Editar' : 'Novo') ?> </strong></h2>
</div>

<div class="row">
    <div class="col-md-12">

        <form action="<?php echo base_url(); ?>usuario/update" method="post" enctype="multipart/form-data" class="form-horizontal">

            <input type="hidden" name="txt_id_empresa" value="<?php echo $id_empresa ?>" >
            <input type="hidden" name="txt_id" value="<?php echo (isset($dados['id']) ? $dados['id'] : '') ?>" >
            <div class="form-group">
                <label class="col-md-1 control-label" for="txt_Nome">Nome<span class="text-danger">*</span></label>
                <div class="col-md-5">
                    <input type="text" id="txt_Nome" name="txt_Nome" class="form-control" placeholder="Nome" value="<?php echo (isset($dados['nome']) ? $dados['nome'] : '') ?>">
                    <?php echo form_error('txt_Nome', '<div class="help-block">', '</div>'); ?>
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-md-1 control-label" for="txt_CPF">CPF<span class="text-danger">*</span></label>
                <div class="col-md-5">
                    <input type="text" id="txt_CPF" name="txt_CPF" class="form-control" placeholder="CPF" value="<?php echo (isset($dados['cpf']) ? $dados['cpf'] : '') ?>" >
                    <?php echo form_error('txt_CPF', '<div class="help-block">', '</div>'); ?>
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
                            if($dados['id_perfil'] == $row->id){
                                echo '<option selected  value="' . $row->id . '">' . $row->nome . '</option>'; 
                            }else{
                                echo '<option  value="' . $row->id . '">' . $row->nome . '</option>'; } 
                            }?>

                        </select>
                        <?php echo form_error('sel_tipo_perfil', '<div class="help-block">', '</div>'); ?>
                    </div>
                </div>

            <div class="form-group">
                <label class="col-md-1 control-label" for="sel_status">Status<span class="text-danger">*</span></label>
                <div class="col-md-2">
                    <select id="sel_status" name="sel_status" class="form-control" size="1">
                        <option value="" >Selecione</option>
                        <option value="0">Desativado</option>
                        <option value="1" selected>Ativo</option>
                    </select>
                    <?php echo form_error('sel_status', '<div class="help-block">', '</div>'); ?>
                </div>
            </div>

            <div class="form-group form-actions">
                <div class="col-md-9 col-md-offset-1">
                    <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-angle-right"></i> Gravar</button>

                </div>
            </div>
        </form>

    </div>

</div>