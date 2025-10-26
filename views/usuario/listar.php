<div class="container" style="margin-top: 40px;">
    <div class="card">
        <div class="card-header">
            <div class="float-start">
                <h2>Listagem de Usuários</h2>
            </div>
            <div class="float-end">
                <a href="usuario" title="Novo" class="btn btn-formulario">
                    <i class="fas fa-file"></i> Novo Registro
                </a>
                <a href="usuario/listar" title="Listar" class="btn btn-formulario">
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
                        <th>Opções</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $dadosUsuarios = $this->usuario->listar();
                        foreach($dadosUsuarios as $usuario){
                            ?>
                                <tr>
                                    <td><?=$usuario->id?></td>
                                    <td><?=$usuario->nome?></td>
                                    <td><?=$usuario->telefone?></td>
                                    <td>
                                        <a href="usuario/index/<?=$usuario->id?>" class="btn btn-success">
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