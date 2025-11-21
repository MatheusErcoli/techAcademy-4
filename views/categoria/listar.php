<div class="container mt-5" >
    <div class="card">
        <div class="card-header">
            <div class="float-start">
                <h2>Listagem de categorias</h2>
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
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Nome da Categoria</td>
                        <td>Descrição</td>
                        <td>Ativo</td>
                        <td>Opções</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $dadosCategoria = $this->categoria->listar();
                        foreach($dadosCategoria as $dados){
                            if($dados->ativo === 'S' || $dados->ativo == 1 || $dados->ativo){
                                $dados->ativo = 'Sim';
                            } else {
                                $dados->ativo = 'Não';
                            }
                            ?>
                                <tr>
                                    <td><?=$dados->id_categoria?></td>
                                    <td><?=$dados->nome?></td>
                                    <td><?=strip_tags($dados->descricao)?></td>
                                    <td><?=$dados->ativo?></td>
                                    <td>
                                        <a href="categoria/index/<?=$dados->id_categoria?>" class="btn btn-success"><i class="fas fa-edit"></i></a>
                                        <a href="javascript:excluir(<?=$dados->id_categoria?>,'categoria')" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php
                        }
                    ?>
                </tbody>
        </div>
    </div>
</div>