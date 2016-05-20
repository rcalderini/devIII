<div class="content login-box">
    <div class="login-main">
        <div class="wrap">
            <h1>Login ou Cadastre-se</h1>
            <div class="login-left">
                <h3>Quero me cadastrar</h3>
                <p>Ao criar uma conta na nossa loja, você será capaz de realizar compras através do processo de pagamento mais rápido, armazenar múltiplos endereços de envio, ver e rastrear suas encomendas em sua conta e muito mais.</p>
                <a class="acount-btn" href="/cliente/cadastrar">Cadastrar</a>
            </div>
            <div class="login-right">
                <h3>Já sou cadastrado</h3>
                <p>Se você tem uma conta na nossa loja, por favor entre.</p>
                <form action="/cliente/login" method="post" id="formLogin">
                    <div>
                        <span>Email<label>*</label></span>
                        <input type="text" id="email" name="email">
                    </div>
                    <div>
                        <span>Senha<label>*</label></span>
                        <input type="password" id="senha" name="senha">
                    </div>
                    <a class="forgot" href="#implementar">Esqueci minha senha</a>
                    <input type="submit" value="Login" id="btnLogin"/>
                </form>
            </div>
            <div class="clear"> </div>
        </div>
    </div>
</div>
<script type='text/javascript'>
    $("#btnLogin").on("click",function(e){
        e.preventDefault();
        var erros = [];
        var campoFocus = null;

        if($("#email").val() == ""){
            erros.push("O campo Email deve ser informado.");
            if(campoFocus == null){
                campoFocus = $("#email");
            }
        }
        if($("#senha").val() == ""){
            erros.push("O campo Senha deve ser informado.");
            if(campoFocus == null){
                campoFocus = $("#senha");
            }
        }

        if(erros.length > 0){
            montaMsgValidacao(erros, campoFocus);
            return false;
        }

        $("#formLogin").submit();
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