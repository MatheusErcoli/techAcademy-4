<?php
    if(!empty($id)){
        $dados = $this->funcionario->editar($id);
    }
    $id_funcionario = $dados->id_funcionario ?? null;
    $nome = $dados->nome ?? null;
    $cargo = $dados->cargo ?? null;
    $email = $dados->email ?? null;
    $telefone = $dados->telefone ?? null;
    $ativo = $dados->ativo ?? null;
    $dataAdmissao = $dados->data_admissao ?? $dados->dataAdmissao ?? null;
    $salario = $dados->salario ?? null;

    // normalizar valores para exibição
    if ($ativo === 'S' || $ativo === '1' || $ativo === 1) {
        $ativoOption = '1';
    } else if ($ativo === 'N' || $ativo === '0' || $ativo === 0) {
        $ativoOption = '0';
    } else {
        $ativoOption = ($ativo === null) ? '' : (string)$ativo;
    }

    $dataAdmissaoValue = '';
    if (!empty($dataAdmissao)) {
        $ts = strtotime($dataAdmissao);
        if ($ts !== false) {
            $dataAdmissaoValue = date('Y-m-d', $ts);
        } else {
            $dataAdmissaoValue = $dataAdmissao;
        }
    }

    $salarioValue = '';
    if ($salario !== null && $salario !== '') {
        $salarioValue = number_format((float)$salario, 2, ',', '.');
    }

?>

<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <div class="float-start">
                <h2>Cadastro de Funcionário</h2>
            </div>
            <div class="float-end">
                <a href="funcionario" title="Novo" class="btn btn-formulario">
                    <i class="fas fa-file"></i> Novo Registro
                </a>
                <a href="funcionario/listar" title="Listar" class="btn btn-formulario">
                    <i class="fas fa-search"></i> Listar
                </a>
            </div>
        </div>
        <div class="card-body">
            <form name="formCadastro" method="post" action="funcionario/salvar" enctype="multipart/form-data" data-parsley-validate="">
                <div class="row">
                    <div class="col-12 col-md-1">
                        <label for="id_funcionario">ID:</label>
                        <input type="text" readonly name="id_funcionario" id="id_funcionario" class="form-control" value="<?=$id_funcionario?>">
                    </div>
                    <div class="col-12 col-md-7">
                        <label for="nome">Nome do Funcionário:</label>
                        <input type="text" name="nome" id="nome" class="form-control" required data-parsley-required-message="Digite o nome" value="<?=$nome?>">
                    </div>
                    <div class="col-12 col-md-4">
                        <label for="cargo">Cargo:</label>
                        <input type="text" name="cargo" id="cargo" class="form-control" required data-parsley-required-message="Digite o cargo" value="<?=$cargo?>">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <label for="email">E-mail:</label>
                        <input type="email" name="email" id="email" class="form-control" required data-parsley-required-message="Digite o e-mail" data-parsley-type-message="Digite um e-mail válido" value="<?=$email?>">
                    </div>
                    <div class="col-12 col-md-4">
                        <label for="telefone">Telefone</label>
                        <input type="text" name="telefone" id="telefone" class="form-control" 
                        required data-parsley-required-message="Digite um telefone" value="<?=$telefone?>">
                    </div>
                    <div class="col-12 col-md-2">
                        <label for="ativo">Ativo:</label>
                        <select name="ativo" id="ativo" required class="form-control" data-parsley-required-message="Selecione">
                            <option value=""></option>
                            <option value="1">Sim</option>
                            <option value="0">Não</option>
                        </select>
                        <script>
                            $("#ativo").val("<?=$ativoOption?>");
                        </script>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-12 col-md-4">
                        <label for="dataAdmissao">Data de Admissão:</label>
                        <input type="date" name="dataAdmissao" id="dataAdmissao" class="form-control" required data-parsley-required-message="Digite a data de admissão" value="<?=$dataAdmissaoValue?>">
                    </div>
                    <div class="col-12 col-md-2">
                        <label for="salario">Salário:</label>
                        <input type="text" name="salario" id="salario" class="form-control" required data-parsley-required-message="Digite o salario" value="<?=$salarioValue?>">
                    </div>
                </div>
                <br>
                <button type="submit" class="btn btn-formulario float-end">
                    <i class="fas fa-check"></i> Salvar/Alterar
                </button>
            </form>
        </div>
    </div>
</div>
<script>
    $(function() {
        $('#salario').maskMoney({
            thousands: '.',
            decimal: ','
        });
    })
</script>
<script>
    $(document).ready(function(){
        $('#telefone').inputmask("(99) 99999-9999");
    });
</script>