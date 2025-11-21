<div class="container" style="margin-top: 40px;">
    <div class="card">
        <div class="card-header">
            <div class="float-start">
                <h2>Listagem de Funcionário</h2>
            </div>
            <div class="float-end">
                <a href="funcionario" title="Novo" class="btn btn-formulario">
                    <i class="fas fa-file"></i> Novo Registro
                </a>
                <a href="funcionario/listar" title="Listar" class="btn btn-formulario">
                    <i class="fas fa-search"></i> Listar
                </a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome do Funcionário</th>
                        <th>Cargo</th>
                        <th>Salário</th>
                        <th>E-mail</th>
                        <th>Telefone</th>
                        <th>Data de Admissão</th>
                        <th>Ativo</th>
                        <th>Opções</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $dadosFuncionario = $this->funcionario->listar();
                        foreach($dadosFuncionario as $dados){
                            $salario = number_format($dados->salario,2,",",".")
                            ?>
                                <tr>
                                    <td><?=$dados->id_funcionario?></td>
                                    <td><?=htmlspecialchars($dados->nome)?></td>
                                    <td><?=htmlspecialchars($dados->cargo)?></td>
                                    <td><?=htmlspecialchars($dados->salario)?></td>
                                    <td><?=htmlspecialchars($dados->email)?></td>
                                    <td><?=htmlspecialchars($dados->telefone)?></td>
                                    <td><?= ($dados->data_admissao ?? $dados->dataAdmissao) ? date('d/m/Y', strtotime($dados->data_admissao ?? $dados->dataAdmissao)) : '' ?></td>
                                    <td><?=($dados->ativo == 1) ? 'Sim' : 'Não'?></td>
                                    <td>
                                        <a href="funcionario/index/<?=$dados->id_funcionario?>" class="btn btn-success"><i class="fas fa-edit"></i></a>
                                        <a href="javascript:excluir(<?=$dados->id_funcionario?>,'funcionario')" class="btn btn-danger"><i class="fas fa-trash"></i></a>
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