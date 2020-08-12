<div class="row">
    <div class="col-md-8">
        <!-- Basic Form Elements Block -->
        <div class="block">
            <!-- Basic Form Elements Title -->
            <div class="block-title">

                <h2><strong>Diretório(s)</strong> </h2>
            </div>
            <!-- END Form Elements Title -->
            <!-- Basic Form Elements Content -->
            <table class="table">
                <tr>
                    <th>

                    </th>
                    <th>
                        Nome
                    </th>
                    <th>
                       Arquivo
                    </th>
                    <th>
                        Dt. Criação
                    </th>
                    <th>
                        Status
                    </th>
                    <th></th>
                </tr>

                <?php foreach ($dados->result() as $row) {

                    
                    if($row->fl_diretorio == true)
                    {
                        echo "<tr><td>" . "<i class='fa fa-folder-open'></i>" . "</td>";
                    }else{
                        echo "<tr><td>" . "<i class='fa fa-file-text'></i>" . "</td>";
                    }
                   

                    echo "<td>" . $row->nome . "</td>";
                    echo "<td>" . $row->nome_arquivo . "</td>";
                    echo "<td>" . $row->dt_cadastro . "</td>";
                    echo "<td>" . $row->id_usuario . "</td>";
                    echo '<td> <a href="' . base_url() . 'diretorio/diretorios/' . str_replace ( "/", "",str_replace ( "-", "",str_replace ( ".", "",$row->cnpj))) . '" data-toggle="tooltip" title="Usuário" class="btn btn-xs btn-default"><i class="gi gi-user"></i></a></td></tr>';
                } ?>

            </table>

        </div>
    </div>
    <div class="col-md-4">
        <div class="col-md-12">

            <!-- Basic Form Elements Block -->
            <div class="block">
                <!-- Basic Form Elements Title -->
                <div class="block-title">
                    <h2><strong>Novo</strong> Arquivo</h2>
                </div>
                <!-- END Form Elements Title -->
                <!-- Basic Form Elements Content -->
                <form action="<?php echo base_url(); ?>" method="POST" class="form-horizontal">
                    <input type="hidden" name="IdDiretorio" value="@ViewBag.IdDiretorio" />
                    <div class="form-group">
                        <label class="col-md-3 control-label">Arquivo</label>
                        <div class="col-md-9">
                            <input type="file" id="example-file-input" name="PostedFile">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Nome</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="Nome" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Descricao</label>
                        <div class="col-md-9">
                            <textarea class="form-control" name="Descricao"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-9">
                            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-user"></i> Adicionar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-12">

            <!-- Basic Form Elements Block -->
            <div class="block">
                <!-- Basic Form Elements Title -->
                <div class="block-title">
                    <h2><strong>Novo</strong> Diretório</h2>
                </div>
                <!-- END Form Elements Title -->
                <!-- Basic Form Elements Content -->
                <form action="page_forms_general.html" method="post" enctype="multipart/form-data" class="form-horizontal" onsubmit="return false;">
                    <div class="form-group">
                        <label class="col-md-3 control-label">Nome</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Descricao</label>
                        <div class="col-md-9">
                            <textarea class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-9">
                            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-user"></i> Adicionar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>