<div class="block-title">
    <h2>Empresa - Certificado a vencer ou vencidos</h2>
</div>

<div class="block full">

  

    <div class="table-responsive">
        <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
            <thead>
                <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">Nome</th>
                    <th class="text-center">Empresa</th>
                    <th class="text-center">Certificado</th>
                    
                    <th class="text-center">Dias Vencimento</th>
                    <th class="text-center">Dt. Ativação</th>
                    <th class="text-center">Dt. Validade</th>
                    <th class="text-center">Vencido</th>
                    
                </tr>
            </thead>
            <tbody>

                <?php
                foreach ($dados->result() as $row) {
                    echo ' <tr>';
                    echo '<td class="text-center">' . $row->id . '</td>';
                    echo '<td class="text-center">' . $row->nome . '</td>';
                    echo '<td class="text-center">' . $row->nome_empresa . '</td>';
                    echo '<td class="text-center">' . $row->certificado . '</td>';
                    echo '<td class="text-center">' . $row->dias_vencimento . '</td>';
                    echo '<td class="text-center">' . date('d/m/Y', strtotime($row->dt_inicio))  . '</td>';
                    echo '<td class="text-center">' . date('d/m/Y', strtotime($row->dt_validade))  . '</td>';

                    if ($row->fl_vencido == 1) {
                        echo '<td class="text-center"><span class="label label-success">Sim</span></td>';
                    } else {
                        echo '<td class="text-center"><span class="label label-danger">Não</span></td>';
                    }




                   
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


            $(".clsDelete").click(function() {

                $.ajax({
                  url : "<?php echo base_url(); ?>Empresa/delete/",
                  type : 'POST',
                  data : { id : $(this).val() }
            }).done(function(msg){
                location.reload();
            $("#resultado").html(msg);
            }); 

  
            });


        });
    </script>