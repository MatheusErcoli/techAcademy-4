<?php
if (!empty($id)) {
    $id = isset($dados->id_item) ? $dados->id_item : $id;
}
$id_item = $dados->id_item ?? null;
$id_pedido = $dados->id_pedido ?? null;
$id_produto = $dados->id_produto ?? null;
$quantidade = $dados->quantidade ?? null;
$preco_unitario = $dados->preco_unitario ?? null;

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
                        <select name="id_pedido" id="id_pedido" required data-parsley-required-message="Selecione o N° do pedido" class="form-control">
                            <option value="">Selecione</option>
                            <?php
                            $dadosPedido = $this->listarPedidos();
                            foreach ($dadosPedido as $dados) {
                            ?>
                                <option value="<?= $dados->id_pedido ?>">
                                    <?= $dados->id_pedido ?>
                                </option>
                            <?php
                            }
                            ?>
                        </select>
                        <script>
                            $("#id_pedido").val(<?= $id_pedido ?? '' ?>)
                        </script>
                    </div>
                    <div class="col-12 col-md-4">
                        <label for="id_produto">Produto</label>
                        <select name="id_produto" id="id_produto" required data-parsley-required-message="Selecione o produto" class="form-control">
                            <option value="">Selecione</option>
                            <?php
                            $dadosProdutos = $this->listarProdutos();
                            foreach ($dadosProdutos as $dados) {
                            ?>
                                <option value="<?= $dados->id_produto ?>">
                                    <?= $dados->nome ?>
                                </option>
                            <?php
                            }
                            ?>
                        </select>
                        <script>
                            $("#id_produto").val(<?= $id_produto ?? '' ?>)
                        </script>
                    </div>
                    <div class="col-12 col-md-3">
                        
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>