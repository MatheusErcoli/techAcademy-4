<?php
if (!empty($id)) {
    $id = isset($dados->id_pedido) ? $dados->id_pedido : $id;
}
$id_pedido = $dados->id_pedido ?? null;
$id_cliente = $dados->id_cliente ?? null;
$id_funcionario = $dados->id_funcionario ?? null;
$dataPedido = $dados->data_pedido ?? null;
$ativo = $dados->ativo ?? null;

?>
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <div class="float-start">
                <h2>Cadastro de pedidos</h2>
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
            <form name="formPedido" method="post" action="vendas/salvar" enctype="multipart/form-data" data-parsley-validate="">
                <div class="row">
                    <div class="col-12 col-md-4">
                        <label for="idPedido">ID_Pedido:</label>
                        <input type="text" readonly name="id_pedido" id="id_pedido" class="form-control" value="<?= $id_pedido ?>">
                    </div>
                    <div class="col-12 col-md-8">
                        <label for="id_cliente">Cliente:</label>
                        <select name="id_cliente" id="id_cliente" required data-parsley-required-message="Selecione um cliente" class="form-control">
                            <option value="">Selecione</option>
                            <?php
                            $dadosClientes = $this->listarClientes();
                            foreach ($dadosClientes as $dados) {
                            ?>
                                <option value="<?= $dados->id_cliente ?>">
                                    <?= $dados->nome ?>
                                </option>
                            <?php
                            }
                            ?>
                        </select>
                        <script>
                            $("#id_cliente").val(<?= $id_cliente ?? '' ?>)
                        </script>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <label for="id_funcionario">Funcionário</label>
                        <select name="id_funcionario" id="id_funcionario" class="form-control" required data-parsley-required-message="Selecione um funcionário">
                            <option value="">Selecione</option>
                            <?php
                            $dadosFuncionarios = $this->listarFuncionario();
                            foreach ($dadosFuncionarios as $funcionario) {
                            ?>
                                <option value="<?= $funcionario->id_funcionario ?>">
                                    <?= $funcionario->nome ?>
                                </option>
                            <?php
                            }
                            ?>

                        </select>
                        <script>
                            $("#id_funcionario").val(<?= $id_funcionario ?? '' ?>)
                        </script>
                    </div>
                    <div class="col-12 col-md-4">
                        <label for="data_pedido">Data de Pedido:</label>
                        <input type="datetime-local" name="data_pedido" id="pedido" class="form-control" required data-parsley-required-message="Digite a data do pedido" value="<?= $dataPedido ?>">
                    </div>
                    <div class="col-12 col-md-2">
                        <label for="ativo">Ativo:</label>
                        <select name="ativo" id="ativo" required class="form-control" data-parsley-required-message="Selecione">
                            <option value=""></option>
                            <option value="1">Sim</option>
                            <option value="0">Não</option>
                        </select>
                        <script>
                            $("#ativo").val("<?= $ativo ?>");
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