<!doctype html>
<!--[if lt IE 8]>
<html class="no-js lt-ie8"> <![endif]-->
<html class="no-js">

<? $this->load->view("site/layout/header") ?>

<body>

<? $this->load->view("site/layout/topo") ?>

    <div id="wrapper">
        <!--Sidebar background-->
        <? //$this->load->view('layout/sidebar') ?>
        <!--Sidebar content-->
        <!--Body content-->
        <? $this->load->view($CONTENT) ?>

        <? $this->load->view("site/layout/footer") ?>
    </div>
</body>
</html>