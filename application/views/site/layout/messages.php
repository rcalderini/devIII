<? $ok = $this->session->flashdata('ok'); ?>
<? $errors = $this->session->flashdata('erro'); ?>
<? $warning = $this->session->flashdata('warning'); ?>
<? $informacao = $this->session->flashdata('informacao'); ?>
<? if ($ok || $errors || $warning || $informacao) { ?>
    <script type="text/javascript">
        $(function(){
            <?if ($errors) { ?>
                msg("<?= $errors.' ' ?>", "Erro!", "error");
            <?} ?>

            <?if ($warning) { ?>
                msg("<?= $warning.' ' ?>", "Alerta!", "");
            <?} ?>

            <?if ($ok) { ?>
                msg("<?= $ok.' ' ?>", "Sucesso!", "success");
            <?} ?>

            <?if ($informacao) { ?>
               msg("<?= $informacao.' ' ?>", "Informação!", "info");
            <?} ?>
        });
    </script>
<? } ?>