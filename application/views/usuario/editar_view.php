<div id="content" class="page-content clearfix">
    <div class="contentwrapper"><!--Content wrapper-->
        <div class="heading">
            <h3>Usuário</h3>
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
                        <h4><span>Edição</span></h4>
                    </div>
                    <div class="panel-body pt0 pb0">
                        <form class="form-horizontal group-border stripped" id="form-criar_usuario" action="usuario/atualizar" method="post" role="form" >
                            <input type="hidden" value="<?=isset($usuario) ? $usuario->id_usuario : '';?>" name="id_usuario">
                            <div class="form-group">
                                <label class="col-lg-2 col-md-3 control-label" for="required">Nome*:</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" id="nome" autofocus="autofocus"
                                           value="<?=isset($usuario) ? $usuario->nome : '';?>" name="nome">
                                </div>
                            </div><!-- End .form-group  -->

                            <div class="form-group">
                                <label class="col-lg-2 col-md-3 control-label" for="required">Email*:</label>
                                <div class="col-lg-5">
                                    <input type="text" class="form-control"
                                           value="<?=isset($usuario) ? $usuario->email : '';?>" id="email" name="email">
                                </div>
                            </div><!-- End .form-group  -->

                            <div class="form-group">
                                <label class="col-lg-2 col-md-3 control-label" for="required">Senha*:</label>
                                <div class="col-lg-3">
                                    <input type="password" class="form-control"
                                           value="<?=isset($usuario) ? $this->user_model->encrypt->decode($usuario->senha) : '';?>" id="senha" name="senha">
                                </div>
                            </div><!-- End .form-group  -->

                            <div class="form-group">
                                <label class="col-lg-2 col-md-3 control-label" for="required">Confirma a Senha*:</label>
                                <div class="col-lg-3">
                                    <input type="password" class="form-control"
                                           value="<?=isset($usuario) ? $this->user_model->encrypt->decode($usuario->senha) : '';?>" id="confirma_senha" name="confirma_senha">
                                </div>
                            </div><!-- End .form-group  -->

                            <div class="form-group">
                                <label class="col-lg-2 col-md-3 control-label" for="id_tipo_usuario">Tipo Usuário</label>
                                <div class="col-lg-3">
                                    <select name="id_tipo_usuario" id="select1" class="nostyle form-control" placeholder="Selecione um Tipo de Usuário">
                                        <option></option>
                                        <?  foreach ($tipo_usuario as $tipo) { ?>
                                            <option value=<?= $tipo->id_tipo_usuario ?>><?= $tipo->tipo ?></option>
                                            <option <?=($tipo->id_tipo_usuario == $usuario->id_tipo_usuario)?'selected':''?> value=<?= $tipo->id_tipo_usuario ?>><?= $tipo->tipo ?></option>
                                        <?	} ?>
                                    </select>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-lg-offset-2">
                                    <button type="submit" class="btn btn-default ml15">Salvar</button>
                                    <button type="button" onClick=top.window.location="usuario/cancelar" class="btn btn-danger">Cancelar</button>
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
<? $this->load->view("layout/footer")?>
<!-- Other plugins ( load only nessesary plugins for every page) -->
<script src="assets/plugins/charts/sparklines/jquery.sparkline.js"></script>
<script src="assets/plugins/forms/bootstrap-filestyle/bootstrap-filestyle.js"></script>
<script src="assets/plugins/forms/select2/select2.js"></script>
<script src="assets/plugins/forms/validation/jquery.validate.js"></script>
<script src="assets/plugins/forms/validation/additional-methods.min.js"></script>
<script src="assets/js/jquery.supr.js"></script>
<script src="assets/js/main.js"></script>
<script src="assets/js/pages/forms-validation.js"></script>