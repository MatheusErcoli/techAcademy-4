<?php


?>
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <div class="float-start">
                <h2>Listagem de pedidos</h2>
                <br>
                <a href="vendas" class="btn btn-formulario">
                    Pedido
                </a>
                <a href="vendas/item" class="btn btn-formulario">
                    Itens do pedido
                </a>
            </div>
            <div class="float-end">
                <a href="vendas" class="btn btn-formulario">
                    <i class="fas fa-file"></i> Adicionar Novo
                </a>
                <a href="vendas/listar" class="btn btn-formulario">
                    <i class="fas fa-search"></i> Listar
                </a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Cliente</th>
                        <th>Funcionário</th>
                        <th>Data do pedido</th>
                        <th>Ativo</th>
                        <th>Opções</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $dadosPedido = $this->vendas->listar();
                foreach($dadosPedido as $dados){
                ?>
                <tr>
                    <td><?= $dados->id_pedido?></td>
                    <td><?= $dados->nome_cliente?></td>
                    <td><?= $dados->nome_funcionario?></td>
                    <td><?= date("d/m/Y H:i", strtotime($dados->data_pedido)) ?></td>
                    <td><?= $dados->ativo ?></td>
                    <td><a href="vendas/index/<?= $dados->id_pedido ?>" class="btn btn-success"><i class="fas fa-edit"></i><i></i></a></td>
                </tr>
                <?php
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>