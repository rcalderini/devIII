<!doctype html>
<!--[if lt IE 8]>
<html class="no-js lt-ie8"> <![endif]-->
<html class="no-js">

<? $this->load->view("layout/header") ?>

<body class="error-page">
<div class="container error-container">
    <div class="error-panel panel panel-default plain animated bounceIn">
        <!-- Start .panel -->
        <div class="panel-body">
            <div class="page-header">
                <h1 class="text-center mb25">404
                    <small>error</small>
                </h1>
            </div>
            <h2 class="text-center mt30 mb30">Pagina não encontrada.</h2>
            <div class="text-center">
                <a href="javascript: history.go(-1)" class="btn btn-default mr10"><span class="icomoon-icon-arrow-left-10 s16"></span>Votar</a>
                <a href="home" class="btn btn-default"><span class="icomoon-icon-screen s16"></span>RDF</a>
            </div>
        </div>
    </div>
</div>
<? $this->load->view("layout/footer")?>
</body>
</html>