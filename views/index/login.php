<div class="login-container">
    <div class="login-header">
        <h1>Bem-vindo</h1>
        <p>Faça login para continuar</p>
    </div>

    <div class="login-body">

        <form method="post" name="formLogin" data-parsley-validate="">
            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Digite seu email" required data-parsley-required-message="Por favor, insira seu email." data-parsley-type-message="Digite um e-mail válido">
            </div>
            <label for="password" class="form-label">Senha</label>
            <div class="input-group mb-3">
                <input type="password" class="form-control" id="senha" name="senha" placeholder="Digite sua senha" required data-parsley-required-message="Por favor, insira sua senha." data-parsley-errors-container="#erro">
                <button class="btn btn-outline-secondary" type="button" onclick="mostrarSenha()"><i class="fas fa-eye"></i></button>
            </div>
            <div id="erro"></div>
            <br>
            <button type="submit" class="btn btn-login">Entrar</button>
        </form>
    </div>
</div>
