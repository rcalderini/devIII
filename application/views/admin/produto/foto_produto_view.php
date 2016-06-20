<?php foreach($output->css_files as $file): ?>
    <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>
<?php foreach($output->js_files as $file): ?>
    <script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>

<div id="content" class="page-content clearfix">
    <div class="contentwrapper"><!--Content wrapper-->
        <div class="heading">
            <h3>Produtos</h3>
        </div>

        <div class="col-lg-offset-2" style="width:35%; float:right;">
            <? $this->load->view('admin/layout/messages'); ?>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <!-- col-lg-12 start here -->
                <div class="panel panel-default toggle panelMove panelClose panelRefresh">
                    <!-- Start .panel -->
                    <div class="panel-heading">
                        <h4><span>Cadastro</span></h4>
                    </div>
                    <div class="panel-body pt0 pb0">
                        <br/>
                        <?php echo $output->output; ?>
                    </div>
                </div><!-- End .panel -->
            </div><!-- End .span12 -->
        </div><!-- End .row -->
        <!-- Page end here -->
    </div><!-- End contentwrapper -->
</div>
<? $this->load->view("admin/layout/footer")?>
<!-- Other plugins ( load only nessesary plugins for every page) -->
<script src="assets/plugins/charts/sparklines/jquery.sparkline.js"></script>
<script src="assets/plugins/forms/bootstrap-filestyle/bootstrap-filestyle.js"></script>
<script src="assets/plugins/forms/select2/select2.js"></script>
<script src="assets/plugins/forms/validation/jquery.validate.js"></script>
<script src="assets/plugins/forms/validation/additional-methods.min.js"></script>
<script src="assets/js/jquery.supr.js"></script>
<script src="assets/js/main.js"></script>
<script src="assets/js/pages/forms-validation.js"></script>