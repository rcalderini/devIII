<!doctype html>
<!--[if lt IE 8]>
<html class="no-js lt-ie8"> <![endif]-->
<html class="no-js">

<? $this->load->view("admin/layout/header") ?>

<body>

<? $this->load->view("admin/layout/topo") ?>

<div id="wrapper">
    <!--Sidebar background-->
    <? $this->load->view('admin/layout/sidebar') ?>
    <!--Sidebar content-->
    <!--Body content-->
    <? $this->load->view($CONTENT) ?>
</div>
</body>
</html>