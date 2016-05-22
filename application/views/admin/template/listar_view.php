<!--Body content-->
<div id="content" class="page-content clearfix">
    <div class="contentwrapper">
        <!--Content wrapper-->
        <div class="heading">
            <!--  .heading-->
            <h3><?=$table_title?></h3>
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
                        &nbsp;
                        <button type="button" onclick="window.location.href='admin/<?=$controller?>/criar'" class="btn btn-info mr5 mb10">
                            <i class="minia-icon-plus-2 mr5"></i> Novo</button>
                    </div>
                    <div class="panel-body">
                        <!--Table-->
                        <?=get_list_table_from_html($header_table, $lista_itens, $controller)?>
                        <!--End Table-->
                    </div>
                </div><!-- End .panel -->
            </div><!-- End .span12 -->
        </div><!-- End .row -->
        <!-- Page end here -->
    </div><!-- End contentwrapper -->
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