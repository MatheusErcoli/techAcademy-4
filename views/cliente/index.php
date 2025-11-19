<?php
if  (!empty($id)) {
    $dados = $this->cliente->editar($id);
}
    $id = $dados->id_cliente ?? NULL;
    $nome = $dados->nome ?? NULL;
    $email = $dados->email ?? NULL;
    $telefone = $dados->telefone ?? NULL;
    $ativo = $dados->ativo ?? NULL;
?>

<div class="container" style="margin-top: 40px;">
    <div class="card">
        <div class="card-header">
            <div class="float-start">
                <h2>Cadastro de Cliente</h2>
            </div>
            <div class="float-end">
                <a href="cliente" title="Novo" class="btn btn-formulario">
                    <i class="fas fa-file"></i> Novo Registro
                </a>
                <a href="cliente/listar" title="Listar" class="btn btn-formulario">
                    <i class="fas fa-search"></i> Listar
                </a>
            </div>
        </div>
        <div class="card-body">
            <form name="formCliente" method="post" data-parsley-validate="" action="cliente/salvar">
                <div class="row">
                    <div class="col-12 col-md-1">
                        <label for="id_cliente">ID:</label>
                        <input type="text" name="id_cliente" id="id_cliente" class="form-control" readonly value="<?=$id?>">
                    </div>
                    <div class="col-12 col-md-11">
                        <label for="nome">Nome do Cliente</label>
                        <input type="text" name="nome" id="nome" class="form-control" value="<?=$nome?>"
                        required data-parsley-required-message="Preencha o nome do cliente">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <label for="email">Digite o email:</label>
                        <input type="email" name="email" id="email" class="form-control" value="<?=$email?>"
                        required data-parsley-required-message="Preencha o email"
                        data-parsley-type-message="Digite um email válido">
                    </div>
                    <div class="col-12 col-md-3">
                        <label for="senha">Digite a sua senha:</label>
                        <input type="password" name="senha" id="senha" class="form-control" required data-parsley-required-message="Digite uma senha">
                    </div>
                    <div class="col-12 col-md-3">
                        <label for="redigite">Redigite a senha</label>
                        <input type="password" name="redigite" id="redigite" class="form-control"
                        data-parsley-equalto="#senha"
                        data-parsley-equalto-message="As senhas não são iguais">

                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-12 col-md-4">
                        <label for="telefone">Telefone</label>
                        <input type="text" name="telefone" id="telefone" class="form-control" 
                        required data-parsley-required-message="Digite um telefone" value="<?=$telefone?>">
                    </div>
                    <div class="col-12 col-md-2">
                        <label for="ativo">Ativo:</label>
                        <select name="ativo" id="ativo" class="form-control" required 
                        data-parsley-required-message="Selecione ativo"  >
                            <option value=""></option>
                            <option value="1">Sim</option>
                            <option value="0">Não</option>
                    </select>

                        <script>
                            $("#ativo").val("<?=$ativo?>");
                        </script>
                    </div>
                </div>
                <br>
                <button type="submit" class="btn btn-formulario float-end">
                    <i class="fas fa-check"></i> Salvar/Atualizar Dados
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('#telefone').inputmask("(99) 99999-9999");
    });
</script>
