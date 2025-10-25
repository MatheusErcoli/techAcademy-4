<link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.js"></script>

<?php
    if(!empty($id)){
        $dados = $this->categoria->editar($id);
    }

    $id = $dados->id_categoria ?? null;
    $nome = $dados->nome ?? null;
    $ativo = $dados->ativo ?? null;
    // mapear valores antigos ('S'/'N') para 1/0 para o select
    if ($ativo === 'S') {
        $ativoOption = '1';
    } else if ($ativo === 'N') {
        $ativoOption = '0';
    } else {
        // pode ser já 1/0 ou null
        $ativoOption = ($ativo === null) ? '' : (string)$ativo;
    }
    $descricao = $dados->descricao ?? null;
?>
<div class="container" style="margin-top: 40px;">
    <div class="card">
        <div class="card-header">
            <div class="float-start">
                <h2>Cadastro de categoria</h2>
            </div>
            <div class="float-end">
                <a href="categoria" class="btn btn-formulario">
                    <i class="fas fa-file"></i> Adicionar Nova
                </a>
                <a href="categoria/listar" class="btn btn-formulario">
                    <i class="fas fa-search"></i> Listar
                </a>
            </div>
        </div>
        <div class="card-body">
            <form action="categoria/salvar" method="post" class="formCadastro" data-parsley-validate="" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-12 col-md-2">
                        <label for="id_categoria">ID:</label>
                        <input type="text" readonly name="id_categoria" id="id_categoria" class="form-control" value="<?=$id?>">
                    </div>
                    <div class="col-12 col-md-8">
                        <label for="nome">Nome da categoria</label>
                        <input type="text" name="nome" id="nome" required class="form-control" data-parsley-required-message="Digite o nome da categoria" value="<?=$nome?>">
                    </div>
                    <div class="col-12 col-md-2">
                        <label for="ativo">Ativo</label>
                        <select name="ativo" id="ativo" required class="form-control" data-parsley-required-message="Selecione">
                            <option value=""></option>
                            <option value="1">Sim</option>
                            <option value="0">Não</option>
                        </select>
                        <script>
                            $("#ativo").val("<?=$ativoOption?>");
                        </script>
                    </div>
                    <div class="col-12 col-md-12">
                        <label for="descricao">Descrição da categoria:</label>
                        <textarea name="descricao" id="descricao" class="form-control" required data-parsley-required-message="Digite uma descrição"><?=$descricao?></textarea>
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