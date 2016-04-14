<?php $ok = $this->session->flashdata('ok'); ?>
<?php $errors = $this->session->flashdata('erro'); ?>
<?php $warning = $this->session->flashdata('warning'); ?>
<?php $informacao = $this->session->flashdata('informacao'); ?>
<? if ($ok || $errors || $warning || $informacao) { ?>
    <div class="content-box" id="mensagem"  >
        <?php if ($errors) { ?>
            <div class="alert alert-danger fade in">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="glyphicon glyphicon-ban-circle alert-icon "></i>
                <strong>Erro! </strong> <?= $errors.' ' ?>
            </div>
        <?php } ?>

        <?php if ($warning) { ?>
            <div class="alert alert-warning fade in">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="glyphicon glyphicon-warning-sign alert-icon "></i>
                <strong>Atenção! </strong><?= $warning.' ' ?>
            </div>

        <?php } ?>

        <?php if ($ok) { ?>
            <div class="alert alert-success fade in">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="fa fa-check alert-icon "></i>
                <strong>Ok! </strong><?= $ok.' ' ?>
            </div>
        <?php } ?>

        <?php if ($informacao) { ?>
            <div class="alert alert-info fade in">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="glyphicon glyphicon-info-sign alert-icon "></i>
                <strong></strong><?= $informacao.' ' ?>
            </div>
        <?php } ?>
    </div>
    <script type="text/javascript">
        setTimeout(function(){ $("#mensagem").slideUp() }, 15000);
    </script>
<? } ?>