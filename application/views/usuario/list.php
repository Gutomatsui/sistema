<div class="block-title">
    <h2>Usuário</h2>
</div>

<div class="block full">

    <a href="<?php echo base_url(); ?>usuario/create/<?php echo $id_empresa; ?>"  title="Nova Empresa" class="btn btn-success">Novo+</a><p>

    <div class="table-responsive">
        <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
            <thead>
                <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">Nome</th>
                    <th class="text-center">E-mail</th>
                    <th class="text-center">Perfil</th>
                    <th class="text-center">Empresa</th>
                    <th class="text-center">Dt. Cadastro</th>
                    <th class="text-center">Ativo</th>
                    <th class="text-center">Ações</th>
                </tr>
            </thead>
            <tbody>

                <?php
                foreach ($dados->result() as $row) {
                    echo ' <tr>';
                    echo '<td class="text-center">' . $row->id . '</td>';
                    echo '<td class="text-center">' . $row->nome . '</td>';
                    echo '<td class="text-center">' . $row->email . '</td>';  
                    echo '<td class="text-center">' . $row->perfil . '</td>';  
                    echo '<td class="text-center">' . $row->empresa . '</td>';  
                    echo '<td class="text-center">' . date('d/m/Y h:m:s', strtotime($row->dt_cadastro)) . '</td>';

                    if ($row->fl_ativo == 1) {
                        echo '<td class="text-center"><span class="label label-success">Sim</span></td>';
                    } else {
                        echo '<td class="text-center"><span class="label label-danger">Não</span></td>';
                    }




                    echo '<td class="text-center">
                        <div class="btn-group">
                            
                            <a href="' . base_url() . 'usuario/create/' . $id_empresa. '/' . $row->id . '" data-toggle="tooltip" title="Editar" class="btn btn-xs btn-default"><i class="fa fa-pencil"></i></a>
                            
                        </div>
                    </td>';
                    echo ' </tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
    <script src="js/pages/tablesDatatables.js"></script>
    <script>
        $(function() {
            TablesDatatables.init();
        });
    </script>