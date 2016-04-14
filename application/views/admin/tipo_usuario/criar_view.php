<div id="content" class="page-content clearfix">
    <div class="contentwrapper"><!--Content wrapper-->
        <div class="heading">
            <h3>Tipo Usuário</h3>
        </div>

        <div class="col-lg-offset-2" style="width:35%; float:right;">
            <? $this->load->view('layout/messages'); ?>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <!-- col-lg-12 start here -->
                <div class="panel panel-default toggle panelMove panelClose panelRefresh">
                    <!-- Start .panel -->
                    <div class="panel-heading">
                        <h4 class="panel-title">Cadastro</h4>
                    </div>
                    <div class="panel-body pt0 pb0">
                        <form class="form-horizontal group-border stripped" id="form-criar_tipo_usuario" action="tipo_usuario/salvar" method="post" role="form" >
                            <div class="form-group">
                                <label class="col-lg-2 col-md-3 control-label" for="">Tipo*</label>
                                <div class="col-lg-10 col-md-9">
                                    <input type="text" class="form-control" autofocus="autofocus"
                                           value="<?= isset($tipo_usuario) ? $tipo_usuario->tipo : ''; ?>" id="tipo" name="tipo">
                                </div>
                            </div>
                            <div class="form-group">
                                <!-- End .form-group  -->
                                <div class="col-lg-offset-2">
                                    <button class="btn btn-default ml15" type="submit">Salvar</button>
                                    <button type="button" onClick=top.window.location="tipo_usuario/cancelar" class="btn btn-danger">Cancelar
                                    </button>
                                </div>
                            </div>
                            <!-- End .form-group  -->
                            <div class="col-lg-10">
                                <label for="required" generated="true" class="error">(*) Campos Obrigatórios</label>
                            </div>
                        </form>
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
    <!-- End #content -->
</div>
<? $this->load->view("layout/footer") ?>
<!-- End #footer  -->
<!-- Other plugins ( load only nessesary plugins for every page) -->
<script src="assets/plugins/charts/sparklines/jquery.sparkline.js"></script>
<script src="assets/plugins/forms/bootstrap-filestyle/bootstrap-filestyle.js"></script>
<script src="assets/plugins/forms/select2/select2.js"></script>
<script src="assets/plugins/forms/validation/jquery.validate.js"></script>
<script src="assets/plugins/forms/validation/additional-methods.min.js"></script>
<script src="assets/js/jquery.supr.js"></script>
<script src="assets/js/main.js"></script>
<script src="assets/js/pages/forms-validation.js"></script>