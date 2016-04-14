<div id="content" class="clearfix">
    <div class="contentwrapper"><!--Content wrapper-->

        <div class="heading">

            <h3>Menu </h3>

        </div><!-- End .heading-->

        <!-- Build page from here: Usual with <div class="row-fluid"></div> -->

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><span>Cadastro</span></h4>
                    </div>
                    <div class="panel-body">

                        <form class="form-horizontal" id="form-menu" action="menu/atualizar" method="post" role="form" >
                            <input type="hidden" value="<?=$menu->id_menu?>" name="id_menu">
                            <div class="form-group">
                                <label class="col-lg-2 control-label" for="required">Menu *:</label>

                                <div class="col-lg-10">
                                    <input type="text" class="form-control" id="menu" name="menu" value="<?=$menu->menu?>">
                                </div>
                            </div>
                            <!-- End .form-group  -->
                            <div class="form-group">
                                <label class="col-lg-2 control-label" for="required">Url *:</label>

                                <div class="col-lg-10">
                                    <input type="text" class="form-control" id="url" name="url" value="<?=$menu->url?>">
                                </div>
                            </div>
                            <!-- End .form-group  -->
                            <div class="form-group">
                                <label class="col-lg-2 control-label" for="required">Descrição *:</label>

                                <div class="col-lg-10">
                                    <input type="text" class="form-control" id="descricao" name="descricao" value="<?=$menu->descricao?>">
                                </div>
                            </div>
                            <!-- End .form-group  -->
                            <div class="form-group">
                                <label class="col-lg-2 control-label" for="required">Icone :</label>

                                <div class="col-lg-10">
                                    <input type="text" class="form-control" id="icone" name="icone" value="<?=$menu->icone?>">
                                </div>
                            </div>
                            <!-- End .form-group  -->
                            <div class="form-group">
                                <label class="col-lg-2 control-label" for="required">Menu pai *:</label>

                                <div class="col-lg-10">
                                    <select name="id_menu_pai" id="id_menu_pai" class="nostyle form-control">
                                        <option value="null">Raiz</option>
                                        <? foreach($menu_pai as $m) { ?>
                                            <option <?= ($m->id_menu == $menu->id_menu_pai) ? 'selected' : '' ?> value="<?=$m->id_menu?>"><?=$m->menu?></option>
                                        <? } ?>
                                    </select>
                                </div>
                            </div>
                            <!-- End .form-group  -->
                            <div class="form-group">
                                <div class="col-lg-offset-2">
                                    <button type="submit" class="btn btn-default marginR10">Salvar</button>
                                    <button type="button" onClick=top.window.location="menu" class="btn btn-danger">Cancelar</button>
                                </div>
                            </div>
                            <!-- End .form-group  -->
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

<!-- Plugin stylesheets -->
<link href="assets/plugins/misc/qtip/jquery.qtip.css" rel="stylesheet" type="text/css" />
<link href="assets/plugins/forms/uniform/uniform.default.css" type="text/css" rel="stylesheet" />
<link href="assets/plugins/forms/select/select2.css" type="text/css" rel="stylesheet" />
<link href="assets/plugins/forms/validate/validate.css" type="text/css" rel="stylesheet" />

