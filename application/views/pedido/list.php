<div class="block-title">
    <h2>Empresa</h2>
</div>

<div class="block full">

    

    <div class="table-responsive">
        <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
            <thead>
                <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">Razão Social</th>
                    <th class="text-center">CNPJ</th>
                    <th class="text-center">Plano</th>
                    <th class="text-center">Tipo Plano </th>
                    <th class="text-center">Valor</th>
                    <th class="text-center">Ativo</th>
                    <th class="text-center">Ações</th>
                </tr>
            </thead>
            <tbody>

            <?php
                foreach ($dados->result() as $row) {
                    echo ' <tr>';
                    echo '<td class="text-center">' . $row->id_empresa . '</td>';
                    echo '<td class="text-center">' . $row->nome . '</td>';
                    echo '<td class="text-center">' . $row->razao_social . '</td>';
                    echo '<td class="text-center">' . $row->plano. '</td>';
                    echo '<td class="text-center">' . $row->tipo_plano. '</td>';
                    echo '<td class="text-center">' .'R$' . number_format($row->valor, 2,",","."). '</td>';
                   

                    if ($row->fl_pendente == 1) {
                        echo '<td class="text-center"><span class="label label-warning">Pendente</span></td>';
                    } else {
                        echo '<td class="text-center"><span class="label label-danger">Não</span></td>';
                    }

                    echo '<td class="text-center">
                    <div class="btn-group">

                    <button onclick="Atualizar('.$row->id_empresa.')" class="btn btn-success" > Atualizar </button>';

                    '</td>';
                    echo ' </tr>';


                }
                ?>

           
            </tbody>
        </table>
    </div>

   


    <script src="js/pages/tablesDatatables.js"></script>



    <script>

                function Atualizar(id) 

                {
                    if (confirm(" Deseja Atualizar o pedido ?")==false)
                    {
                        ShowMensagem("Erro","Status não Atualizado");
                        return ; 
                    }
                    
    
        $.ajax({
                url : "<?php echo base_url(); ?>pedido/ConfirmarPedido/"+id,
                type: 'get',
                dataType: "json",
                contentType: false,
                processData: false,
                success: function(response){
                   // alert(response);
                    if(response == true){
                    
                     location.reload();

                    }else{
                       alert("Não passou ");
                    }
                },
            });

                }
    
    
    
    </script>
   