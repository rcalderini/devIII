<div class="content login-box">
    <div class="login-main">
        <div class="wrap">
            <h1>Cadastro</h1>
            <div class="register-grids">
                <form action="<?=base_url()?>cliente/salvar/editar" method="post" id="formCadastrar">
                    <div class="register-top-grid">
                        <h3>Informações Pessoais</h3>
                        <div>
                            <span>Nome<label>*</label></span>
                            <input type="text" value="<?=$cliente->nome?>" id="nome" name="nome" maxlength="120">
                        </div>
                        <div class="clearLineForm">&nbsp;</div>
                    </div>
                    <div class="clear"> </div>
                    <div class="register-bottom-grid">
                        <h3>Informações de Acesso</h3>
                        <div>
                            <span>Email<label>*</label></span>
                            <input type="text" value="<?=$cliente->email?>" id="email" name="email" maxlength="160">
                        </div>
                        <div class="clearLineForm"></div>
                        <div>
                            <span>Senha<label>*</label></span>
                            <input type="password" id="senha" name="senha" maxlength="20">
                        </div>
                        <div>
                            <span>Confirmação de Senha<label>*</label></span>
                            <input type="password" id="confirmacaoSenha" name="confirmacaoSenha" maxlength="20">
                        </div>
                    </div>
                    <div class="clear"> </div>
                    <div class="clear"></div>
                    <input type="submit" value="Cadastrar" id="btnCadastrar" />
                </form>
            </div>
        </div>
    </div>
</div>
<script type='text/javascript'>
    $("#btnCadastrar").on("click",function(e){
        e.preventDefault();
        var erros = [];
        var campoFocus = null;
        if($("#nome").val() == ""){
            erros.push("O campo Nome deve ser informado.");
            campoFocus = $("#nome");
        }
        if($("#email").val() == ""){
            erros.push("O campo Email deve ser informado.");
            if(campoFocus == null){
                campoFocus = $("#email");
            }
        }

        if(erros.length > 0){
            montaMsgValidacao(erros, campoFocus);
            return false;
        }

        $("#formCadastrar").submit();
    });

    function montaMsgValidacao(erros, campo){
        var sHTML = "<ul class='msgValidacaoCampos'>";
        for (var i = 0; i < erros.length; i++) {
            sHTML += "<li> "+erros[i] +"</li>";
        };
        sHTML += "</ul>"
        msg(sHTML, "Erro!", "error");
        campo.focus();
    }
</script>