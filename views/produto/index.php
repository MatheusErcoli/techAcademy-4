<link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.js"></script>

<?php
 // O model agora fornece a variável $dados quando um $id é passado a Produto::index($id)
 if (!empty($id)) {
     $id = isset($dados->id_produto) ? $dados->id_produto : $id;
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
                        value="<?= isset($dados->id_produto) ? $dados->id_produto : $id ?>">
                    </div>
                    <div class="col-12 col-md-8">
                        <label for="nome">Nome do Produto:</label>
                        <input type="text" name="nome" id="nome" class="form-control" required data-parsley-required-message="Digite o nome"
                          value="<?= isset($dados->nome) ? $dados->nome : '' ?>">
                    </div>
                    <div class="col-12 col-md-3">
                        <label for="id_categoria">Categoria</label>
                        <select name="id_categoria" id="id_categoria" required class="form-control" data-parsley-required-message="Selecione uma categoria">
                            <option value="">Selecione</option>
                            <?php
                                $dadosCategoria = $this->listarCategoria();
                                foreach($dadosCategoria as $cat){
                                    $selected = (isset($dados->id_categoria) && $dados->id_categoria == $cat->id_categoria) ? 'selected' : '';
                                    ?>
                                        <option value="<?=$cat->id_categoria?>" <?=$selected?>>
                                            <?=htmlspecialchars($cat->descricao)?>
                                        </option>
                                    <?php
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-12 col-md-12">
                        <label for="descricao">Descrição do Produto:</label>
                        <textarea name="descricao" id="descricao" class="form-control" required data-parsley-required-message="Digite uma descrição"><?= isset($dados->descricao) ? htmlspecialchars($dados->descricao) : '' ?></textarea>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <label for="imagem">Selecione uma foto JPG:</label>
                        <?php if (!empty($dados->imagem)): ?>
                            <div class="mb-2">
                                <img src="../public/images/<?= htmlspecialchars($dados->imagem) ?>" alt="imagem" style="max-width:120px;">
                            </div>
                        <?php endif; ?>
                        <input type="file" name="imagem" id="imagem" class="form-control" accept=".jpg">
                        <input type="hidden" name="imagem" value="<?= isset($dados->imagem) ? htmlspecialchars($dados->imagem) : '' ?>">
                    </div>
                    <div class="col-12 col-md-2">
                        <label for="valor">Valor:</label>
                        <?php
                            // formatar valor para exibição no input (usar vírgula como decimal)
                            $valorExibicao = '';
                            if (isset($dados->valor) && $dados->valor !== null && $dados->valor !== '') {
                                // garantir que é numérico antes de formatar
                                $valorExibicao = number_format((float) str_replace(',', '.', $dados->valor), 2, ',', '.');
                            }
                        ?>
                        <input type="text" name="valor" id="valor" class="form-control" required data-parsley-required-message="Digite o Valor" value="<?= $valorExibicao ?>">
                    </div>
                    <div class="col-12 col-md-2">
                        <label for="destaque">Destaque:</label>
                        <select name="destaque" id="destaque" required class="form-control" data-parsley-required-message="Selecione">
                            <option value=""></option>
                            <option value="S" <?= (isset($dados->destaque) && $dados->destaque == 'S') ? 'selected' : '' ?>>Sim</option>
                            <option value="N" <?= (isset($dados->destaque) && $dados->destaque == 'N') ? 'selected' : '' ?>>Não</option>
                        </select>
                        <script>
                            $("#destaque").val("<?= isset($dados->destaque) ? $dados->destaque : '' ?>");
                        </script>
                    </div>
                    <div class="col-12 col-md-2">
                        <label for="ativo">Ativo:</label>
                        <select name="ativo" id="ativo" required class="form-control" data-parsley-required-message="Selecione">
                            <option value=""></option>
                            <option value="S" <?= (isset($dados->ativo) && $dados->ativo == 'S') ? 'selected' : '' ?>>Sim</option>
                            <option value="N" <?= (isset($dados->ativo) && $dados->ativo == 'N') ? 'selected' : '' ?>>Não</option>
                        </select>
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