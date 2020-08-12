<?php
            if($_SESSION['id_perfil'] == 2 || $_SESSION['id_perfil'] == 3)
            {
        ?>
    <div id="page-content" style="min-height: 991px;">
        <div class="row">
            <div class="col-sm-6 col-lg-3">
                <!-- Widget -->
                <a href="<?php echo base_url(); ?>certificado/vencendo" class="widget widget-hover-effect1">
                    <div class="widget-simple">
                        <div class="widget-icon pull-left themed-background-fire animation-fadeIn">
                            <i class="fa fa-unlock-alt"></i>
                        </div>
                        <h3 class="widget-content text-right animation-pullDown">
                                            <?php echo $total_cert_vencer[0]->total ?> <strong>Certificado(s)</strong><br>
                                            <small>30 dias para vencer</small>
                                        </h3>
                    </div>
                </a>
                <!-- END Widget -->
            </div>

            <div class="col-sm-6 col-lg-3">
                <!-- Widget -->
                <a href="page_ready_inbox.html" class="widget widget-hover-effect1">
                    <div class="widget-simple">
                        <div class="widget-icon pull-left themed-background-autumn animation-fadeIn">
                            <i class="gi gi-envelope"></i>
                        </div>
                        <h3 class="widget-content text-right animation-pullDown">
                                            0 <strong>Mensages</strong>
                                            <small>Responder</small>
                                        </h3>
                    </div>
                </a>
                <!-- END Widget -->
            </div>

            <div class="col-sm-6 col-lg-3">
                <!-- Widget -->
                <a href="<?php echo base_url(); ?>empresa/vencendo" class="widget widget-hover-effect1">
                    <div class="widget-simple">
                        <div class="widget-icon pull-left themed-background-amethyst animation-fadeIn">
                            <i class="fa fa-file-pdf-o"></i>
                        </div>
                        <h3 class="widget-content text-right animation-pullDown">
                        <?php echo $total_contrato_vencer[0]->total ?> <strong>Contrato(s)</strong>
                        <small>30 dias para vencer</small>
                                        </h3>
                    </div>
                </a>
                <!-- END Widget -->
            </div>

        </div>

        <?php 
            if ($idTipoEmpresa == 1) 
                {
        ?>
        <div class="row col-sm-7">
            <div class="panel panel-default ">
                <div class="panel-heading">Valores <?php echo $idTipoEmpresa;?></div>
                <div class="panel-body">
                    <form action="<?php echo base_url(); ?>/tabelas/simples" method="post"  >
                        <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">Mês</th>
                                    <th class="text-center">Receita</th>
                                    <th class="text-center">Despesas Social</th>
                                    <th class="text-center">Total</th>
                                    <th class="text-center">Status</th>

                                </tr>
                            </thead>
                            <tbody>

                                <?php
                foreach ($lista_Simples->result() as $row) {
                    echo ' <tr>';
                    echo '<td class="text-center"> <input type="hidden" name="hid_ano_'.$row->mes.'" value="'.$row->ano.'"><input type="hidden" name="hid_mes_'.$row->mes.'" value="'.$row->mes.'">   ' . $row->mes . '</td>';
                    echo '<td class="text-center"><input type="text" name="txt_receita_' . $row->mes . '" value="' . $row->receita . '" /></td>';
                    echo '<td class="text-center"><input type="text" name="txt_despesa_' . $row->mes . '"value="' . $row->despesa . '" /></td>';
                    echo '<td class="text-center"><input type="text" name="txt_total_' . $row->mes . '"value="' . $row->total . '" /></td>';

                   if($row->fl_status==0)
                   {
                    echo '<td class="text-center">Fechado</td>';
                   }
                   else
                   {
                    echo '<td class="text-center">Aberto</td>';
                   }

                    echo '<tr>';
                }

                ?>
                            </tbody>
                        </table>
                        <input type="submit" class="btn btn-success" value="Atualizar" />
                </div>
            </div>
        </div>
            <?php } ?>
    </div>

    <?php } ?>