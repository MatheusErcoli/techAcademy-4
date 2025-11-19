<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <div class="float-start">
                <h2>Listagem de Itens do pedido</h2>
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
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>N° Pedido</th>
                        <th>Produto</th>
                        <th>Quantidade</th>
                        <th>Preço Unitário</th>
                        <th>Opções</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $dadosItem = $this->vendas->listarItem();
                    foreach($dadosItem as $dados){
                    ?>
                    <tr>
                        <td><?= $dados->id_item ?></td>
                        <td><?= $dados->id_pedido ?></td>
                        <td><?= $dados->nome ?></td>
                        <td><?= $dados->quantidade ?></td>
                        <td><?= number_format($dados->preco_unitario, 2, ',', '.') ?></td>
                        <td><a href="vendas/item/<?= $dados->id_item ?>" class="btn btn-success"><i class="fas fa-edit"></i></a></td>
                    </tr>
                    <?php 
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>