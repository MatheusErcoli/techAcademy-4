<?php
if (!empty($id)) {
    $id = isset($dados->id_item) ? $dados->id_item : $id;
}

$id_item = $dados->id_item ?? null;
$id_pedido = $dados->id_pedido ?? null;
$id_produto = $dados->id_produto ?? null;
$quantidade = $dados->quantidade ?? null;

// 🔥 number_format aplicado corretamente no preço unitário
$preco_unitario = isset($dados->preco_unitario)
    ? number_format($dados->preco_unitario, 2, ",", ".")
    : "";

?>
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <div class="float-start">
                <h2>Cadastro de itens do pedido</h2>
                <br>
                <a href="vendas" class="btn btn-formulario">
                    Pedido
                </a>
                <a href="vendas/item" class="btn btn-formulario">
                    Itens do pedido
                </a>
            </div>
            <div class="float-end">
                <a href="vendas/item" class="btn btn-formulario">
                    <i class="fas fa-file"></i> Adicionar Novo
                </a>
                <a href="vendas/listarItem" class="btn btn-formulario">
                    <i class="fas fa-search"></i> Listar
                </a>
            </div>
        </div>
        <div class="card-body">
            <form name="formItem" action="vendas/salvarItem" method="post" enctype="multipart/form-data" data-parsley-validate="">
                <div class="row">
                    <div class="col-12 col-md-1">
                        <label for="id_item">ID:</label>
                        <input type="text" readonly name="id_item" id="id_item" class="form-control" value="<?= $id_item ?>">
                    </div>

                    <div class="col-12 col-md-4">
                        <label for="id_pedido">ID Pedido:</label>
                        <select name="id_pedido" id="id_pedido" required class="form-control">
                            <option value="">Selecione</option>
                            <?php foreach ($dadosPedido as $dados) { ?>
                                <option value="<?= $dados->id_pedido ?>">
                                    <?= $dados->id_pedido ?>
                                </option>
                            <?php } ?>
                        </select>
                        <script>
                            $("#id_pedido").val(<?= $id_pedido ?? '' ?>)
                        </script>
                    </div>

                    <div class="col-12 col-md-4">
                        <label for="id_produto">Produto</label>
                        <select name="id_produto" id="id_produto" required class="form-control">
                            <option value="">Selecione</option>

                            <?php foreach ($dadosProdutos as $dados): ?>
                                <option value="<?= $dados->id_produto ?>"
                                    data-preco="<?= number_format($dados->valor, 2, ",", ".") ?>">
                                    <?= $dados->nome ?>
                                </option>
                            <?php endforeach; ?>
                        </select>

                        <script>
                            $("#id_produto").val(<?= $id_produto ?? '' ?>)
                        </script>
                    </div>

                    <div class="col-12 col-md-3">
                        <label for="quantidade">Quantidade:</label>
                        <input type="number" min="0" name="quantidade" id="quantidade"
                            class="form-control" required value="<?= $quantidade ?>">
                    </div>
                </div>

                <br>

                <div class="row">
                    <div class="col-12 col-md-4">
                        <label for="preco_unitario">Preço unitário:</label>
                        <input type="text" name="preco_unitario" id="preco_unitario"
                            class="form-control" required value="<?= $preco_unitario ?>" readonly>
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
    document.getElementById('id_produto').addEventListener('change', function() {

        let option = this.options[this.selectedIndex];
        let preco = option.getAttribute('data-preco');

        document.getElementById('preco_unitario').value = preco ? preco : "";
    });
</script>