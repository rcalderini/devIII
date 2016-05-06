<div class="content login-box">
    <div class="login-main">
        <div class="wrap">
            <h1>Cadastro</h1>
            <div class="register-grids">
                <form action="/cliente/salvar" method="post">
                    <div class="register-top-grid">
                            <h3>Informações Pessoais</h3>
                            <div>
                                <span>Nome<label>*</label></span>
                                <input type="text" id="nome" name="nome" maxlength="120">
                            </div>
                            <div>
                                <span>Sobrenome<label>*</label></span>
                                <input type="text" id="sobrenome" name="sobrenome" maxlength="120">
                            </div>
                            <div>
                                <span>Email<label>*</label></span>
                                <input type="text" id="email" name="email" maxlength="160">
                            </div>
                    </div>
                    <div class="clear"> </div>
                    <div class="register-bottom-grid">
                            <div>
                                <span>Password<label>*</label></span>
                                <input type="text" id="senha" name="senha" maxlength="20">
                            </div>
                            <div>
                                <span>Confirm Password<label>*</label></span>
                                <input type="text">
                            </div>
                            <div class="clear"> </div>
                    </div>
                    <div class="clear"> </div>
                    <a class="news-letter" href="#">
                        <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i> </i>Eu aceito receber ofertas e novidades da Virtual Shop por e-mail</label>
                    </a>
                    <div class="clear"> </div>
                    <input type="submit" value="submit" />
                </form>
            </div>
        </div>
    </div>
</div>