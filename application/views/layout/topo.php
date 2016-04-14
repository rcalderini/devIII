<!-- .#header -->
<div id="header">
    <nav class="navbar navbar-default" role="navigation">
        <div class="navbar-header">
            <a class="navbar-brand" href="home"><img src="assets/img/logo_p.png" width="165" height="60"></a>
        </div>
        <div id="navbar-no-collapse" class="navbar-no-collapse">
            <ul class="nav navbar-right usernav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle avatar" data-toggle="dropdown">
                        <img src="assets/img/favicon.ico" alt="" class="image" />
                        <span class="txt"><?=$this->session->user->nome;?></span>
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu right">
                        <li class="menu">
                            <ul>

                                <?// var_dump($this->user_model->verifica_acesso_acao('usuario', 'criar')); die('---------');?>

                                <li><a href="usuario/editar/<?=$this->session->user->id_usuario?>"><i class="s16 icomoon-icon-user-plus"></i>Editar Usuário</a></li>
                                <? if ($this->user_model->verifica_acesso_acao('usuario', 'criar')) {?>
                                    <li><a href="usuario/criar"><i class="s16 icomoon-icon-plus"></i>Add Usuário</a></li>
                                <?}?>

                            </ul>
                        </li>
                    </ul>
                </li>

                <li><a href="login/logout"><i class="s16 icomoon-icon-exit"></i><span class="txt"> Sair</span></a></li>
            </ul>
        </div>
        <!-- /.nav-collapse -->
    </nav>
    <!-- /navbar -->
</div>
<!-- / #header -->