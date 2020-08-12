<div class="block-title">
    <h2>Banco</h2>
</div>

<div class="block full">

    <a href="<?php echo base_url(); ?>banco/create" title="Nova Banco" class="btn btn-success">Novo+</a><p>

    <div class="table-responsive">
        <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
            <thead>
                <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">Banco</th>
                    <th class="text-center">boleto</th>
                    <th class="text-center">Mora</th>
                    <th class="text-center">Juros</th>
                    
                    
                    <th class="text-center">Ações</th>
                </tr>
            </thead>
            <tbody>

                <?php
                foreach ($dados->result() as $row) {
                    echo ' <tr>';
                    echo '<td class="text-center">' . $row->id . '</td>';
                    echo '<td class="text-center">' . $row->nome_banco . '</td>';
                    echo '<td class="text-center">' . $row->valor_boleto . '</td>';
                    echo '<td class="text-center">' . $row->mora . '</td>';
                    echo '<td class="text-center">' . $row->juros_ativo . '</td>';

                       

                    echo '<td><a href="' . base_url() . 'banco/create/' . $row->id . '" data-toggle="tooltip" title="Editar" class="btn btn-xs btn-default"><i class="fa fa-pencil"></i></a>
                   
                     
                    
                    </td>';
                    echo ' </tr>';
            
                    




                }
                ?>
            </tbody>
        </table>
    </div>

  


    <script src="js/pages/tablesDatatables.js"></script>

   