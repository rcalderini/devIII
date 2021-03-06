<div id="content" class="page-content clearfix">
    <div class="contentwrapper"><!--Content wrapper-->
        <div class="heading">
            <h3>Usuário</h3>
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
                        <h4><span>Edição</span></h4>
                    </div>
                    <div class="panel-body pt0 pb0">
                        <form class="form-horizontal group-border stripped" id="form-criar_usuario" action="admin/produto/atualizar" method="post" role="form" >
                            <input type="hidden" value="<?=isset($produto) ? $produto->id_produto : '';?>" name="id_usuario">
                            <div class="form-group">
                                <label class="col-lg-2 col-md-3 control-label" for="required">Nome*:</label>
                                <div class="col-lg-5 col-md-9">
                                    <input type="text" class="form-control" autofocus="autofocus"
                                           value="<?=isset($produto) ? $produto->produto : '';?>" id="produto" name="produto">
                                </div>
                            </div><!-- End .form-group  -->
                            <div class="form-group">
                                <label class="col-lg-2 col-md-3 control-label" for="required">Valor*:</label>
                                <div class="col-lg-5">
                                    <input type="text" class="form-control"
                                           value="<?=isset($produto) ? $produto->valor : '';?>" id="valor" name="valor">
                                </div>
                            </div><!-- End .form-group  -->
                            <div class="form-group">
                                <label class="col-lg-2 col-md-3 control-label" for="required">Quantidade em Estoque*:</label>
                                <div class="col-lg-3">
                                    <input type="text" class="form-control"
                                           value="<?=isset($produto) ? $produto->estoque : '';?>" id="estoque" name="estoque">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 col-md-3 control-label" for="required">Imagem:</label>
                                <div class="col-lg-3">
                                    <img src="<?=base_url()?>/uploads/produtos_fotos/thumb_<?=$produto->imagem?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-offset-2">
                                    <button type="submit" class="btn btn-default ml15">Salvar</button>
                                    <button type="button" onClick=top.window.location="admin/produto" class="btn btn-danger">Cancelar</button>
                                </div>
                            </div><!-- End .form-group  -->
                            <div class="col-lg-10">
                                <label for="required" generated="true" class="error">(*) Campos Obrigatórios</label>
                            </div>
                        </form>
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