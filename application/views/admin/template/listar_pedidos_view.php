<!--Body content-->
<div id="content" class="page-content clearfix">
    <div class="contentwrapper">
        <!--Content wrapper-->
        <div class="heading">
            <!--  .heading-->
            <h3><?= $table_title ?></h3>
        </div>

        <div id="mensagem-ajax"></div>

        <div class="col-lg-offset-2" style="width:35%; float:right;">
            <? $this->load->view('admin/layout/messages'); ?>
        </div>

        <!-- End  / heading-->
        <div class="row">
            <!-- col-lg-12 end here -->
            <div class="col-lg-12">
                <!-- col-lg-12 start here -->
                <div class="panel panel-default toggle panelMove panelClose panelRefresh">
                    <!-- Start .panel -->
                    <div class="panel-heading">
                        <p></p>
                    </div>
                    <div class="panel-body">
                        <!--Table-->
                        <table id="responsive-datatables" class="table table-bordered table-striped table-hover dt-responsive non-responsive" cellspacing="0" width="100%"
                            <thead>
                            <tr role="row">
                                <th>Cliente</th>
                                <th>Itens</th>
                                <th>Total</th>
                                <th>Data</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?
                            $i = 0;
                            foreach ($pedidos as $pedido) {
                                if ($i % 2 == 0) {
                                    $str = "odd";
                                } else {
                                    $str = "even";
                                }
                                ?>
                            <tr class="<?=$str?>" role="row">
                                <td><?=$pedido->cliente?></td>
                                <td>roger_calderini@hotmail.com</td>
                                <td><?=$pedido->total?></td>
                                <td><?=$pedido->data_pedido?></td>
                            </tr>
                            <? } ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th rowspan="1" colspan="1">Nome</th>
                                <th rowspan="1" colspan="1">Email</th>
                                <th rowspan="1" colspan="1">Ações</th>
                            </tr>
                            </tfoot>
                        </table>
                        <!--End Table-->
                    </div>
                </div>
                <!-- End .panel -->
            </div>
            <!-- End .span12 -->
        </div>
        <!-- End .row -->
        <!-- Page end here -->
    </div>
    <!-- End contentwrapper -->
</div>
<!-- End #content -->
<? $this->load->view("admin/layout/footer") ?>
<!-- End #footer  -->

<!-- Other plugins ( load only nessesary plugins for every page) -->
<script src="assets/plugins/charts/sparklines/jquery.sparkline.js"></script>
<script src="assets/plugins/tables/datatables/jquery.dataTables.js"></script>
<script src="assets/plugins/tables/datatables/dataTables.tableTools.js"></script>
<script src="assets/plugins/tables/datatables/dataTables.bootstrap.js"></script>
<script src="assets/plugins/tables/datatables/dataTables.responsive.js"></script>
<script src="assets/js/jquery.supr.js"></script>
<script src="assets/js/main.js"></script>
<script src="assets/js/pages/tables-data.js"></script>
<script src="assets/js/pages/modals.js"></script>