<link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.js"></script>

<?php
// O model agora fornece a variável $dados quando um $id é passado a Produto::index($id)
if (!empty($id)) {
    $id = isset($dados->id_produto) ? $dados->id_produto : $id;
}

$id = $dados->id_produto ?? null;
$nome = $dados->nome ?? null;
$ativo = $dados->ativo ?? null;
$descricao = $dados->descricao ?? null;
$destaque = $dados->destaque ?? null;
$id_categoria = $dados->id_categoria ?? null;
$valor = $dados->valor ?? null;
$estoque = $dados->estoque ?? 0;
$imagem = $dados->imagem ?? null;

$valor = number_format($valor, 2, ',', '.');

// Normalizar/compatibilizar valores para os selects (aceitar 'S'/'N' ou 1/0 vindo do DB)
if ($destaque === 'S' || $destaque === '1' || $destaque === 1) {
    $destaqueOption = 'S';
} else if ($destaque === 'N' || $destaque === '0' || $destaque === 0) {
    $destaqueOption = 'N';
} else {
    $destaqueOption = ($destaque === null) ? '' : (string)$destaque;
}

if ($ativo === 'S' || $ativo === '1' || $ativo === 1) {
    $ativoOption = 'S';
} else if ($ativo === 'N' || $ativo === '0' || $ativo === 0) {
    $ativoOption = 'N';
} else {
    $ativoOption = ($ativo === null) ? '' : (string)$ativo;
}
?>

<div class="container" style="margin-top: 40px;">
    <div class="card">
        <div class="card-header">
            <div class="float-start">
                <h2>Cadastro de produtos</h2>
            </div>
            <div class="float-end">
                <a href="produto" class="btn btn-formulario">
                    <i class="fas fa-file"></i> Adicionar Novo
                </a>
                <a href="produto/listar" class="btn btn-formulario">
                    <i class="fas fa-search"></i> Listar
                </a>
            </div>
        </div>
        <div class="card-body">
            <form name="formCadastro" method="post" action="produto/salvar" enctype="multipart/form-data" data-parsley-validate="">
                <div class="row">
                    <div class="col-12 col-md-1">
                        <label for="id_produto">ID:</label>
                        <input type="text" readonly name="id_produto" id="id_produto" class="form-control"
                            value="<?= $id ?>">
                    </div>
                    <div class="col-12 col-md-8">
                        <label for="nome">Nome do Produto:</label>
                        <input type="text" name="nome" id="nome" class="form-control" required data-parsley-required-message="Digite o nome"
                            value="<?= $nome ?>">
                    </div>
                    <div class="col-12 col-md-3">
                        <label for="id_categoria">Categoria</label>
                        <select name="id_categoria" id="id_categoria" required class="form-control" data-parsley-required-message="Selecione uma categoria">
                            <option value="">Selecione</option>
                            <?php
                            $dadosCategoria = $this->listarCategoria();
                            foreach ($dadosCategoria as $cat) {
                            ?>
                                <option value="<?= $cat->id_categoria ?>">
                                    <?= $cat->descricao ?>
                                </option>
                            <?php
                            }
                            ?>
                        </select>
                        <script>
                            $("#id_categoria").val("<?= $id_categoria ?? '' ?>");
                        </script>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-12 col-md-12">
                        <label for="descricao">Descrição do Produto:</label>
                        <textarea name="descricao" id="descricao" class="form-control" required data-parsley-required-message="Digite uma descrição"><?= $descricao ?></textarea>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-12 col-md-4">
                        <label for="imagem">Selecione uma foto JPG:</label>
                        <input type="file" name="imagem" id="imagem" class="form-control" accept=".jpg,.jpeg,.png">
                        <input type="hidden" name="imagem_atual" value="<?= $imagem ?>">
                    </div>
                    <div class="col-12 col-md-2">
                        <label for="valor">Valor:</label>
                        <input type="text" name="valor" id="valor" class="form-control" required data-parsley-required-message="Digite o Valor" value="<?= $valor ?>">
                    </div>
                    <div class="col-12 col-md-2">
                        <label for="quantidade">Estoque:</label>
                        <input type="number" min="0" name="quantidade" id="quantidade" class="form-control" value="<?= $estoque ?>">
                    </div>
                    <div class="col-12 col-md-2">
                        <label for="destaque">Destaque:</label>
                        <select name="destaque" id="destaque" required class="form-control" data-parsley-required-message="Selecione">
                            <option value=""></option>
                            <option value="S">Sim</option>
                            <option value="N">Não</option>
                        </select>
                        <script>
                            $("#destaque").val("<?= $destaqueOption ?>");
                        </script>
                    </div>
                    <div class="col-12 col-md-2">
                        <label for="ativo">Ativo:</label>
                        <select name="ativo" id="ativo" required class="form-control" data-parsley-required-message="Selecione">
                            <option value=""></option>
                            <option value="S">Sim</option>
                            <option value="N">Não</option>
                        </select>
                        <script>
                            $("#ativo").val("<?= $ativoOption ?>");
                        </script>
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
    $(document).ready(function() {
        $('#descricao').summernote({
            height: 200
        });
    });
</script>

<script>
    $(function() {
        $('#valor').maskMoney({
            thousands: '.',
            decimal: ','
        });
    })
</script>