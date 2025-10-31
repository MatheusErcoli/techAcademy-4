<div class="container" style="margin-top: 40px;">
    <div class="card">
        <div class="card-header">
            <div class="float-start">
                <h2>Listagem de Clientes</h2>
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
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Telefone</th>
                        <th>Ativo</th>
                        <th>Opções</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $dadosClientes = $this->cliente->listar();
                        foreach($dadosClientes as $cliente){
                            ?>
                                <tr>
                                    <td><?=$cliente->id?></td>
                                    <td><?=htmlspecialchars($cliente->nome)?></td>
                                    <td><?=htmlspecialchars($cliente->telefone ?? '')?></td>
                                    <td><?= (isset($cliente->ativo) && $cliente->ativo) ? 'Sim' : 'Não' ?></td>
                                    <td>
                                        <a href="cliente/index/<?=$cliente->id?>" class="btn btn-success">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php
                        }
                    ?>
                </tbody>
            </table>

        </div>
    </div>
</div>
