<div class="container" style="margin-top: 40px;">
    <div class="card">
        <div class="card-header">
            <div class="float-start">
                <h2>Listagem de produtos</h2>
            </div>
            <div class="float-end">
                <a href="produto" class="btn btn-formulario">
                    <i class="fas fa-file"></i> Adicionar Novo
                </a>
                <a href="produto/listar" class="btn btn-formulario">
                    <i class="fas fa-search"></i> Listar
                </a>
            </div>
        </div>
        <div class="card-body">
  <table class="table table-striped table-bordered">
    <thead>
      <tr>
        <th>ID</th>
        <th>Imagem</th>
        <th>Nome do produto</th>
        <th>Descrição</th>
        <th>Valor</th>
        <th>Destaque</th>
        <th>Ativo</th>
        <th>Opções</th>
      </tr>
    </thead>
    <tbody>
        <?php
        // buscar dados diretamente do model para evitar recursão com o controller
        $dadosProduto = $this->produto->listar();

        foreach($dadosProduto as $dados):
          ?>
          <tr>
            <td><?= isset($dados->id_produto) ? $dados->id_produto : (isset($dados->id) ? $dados->id : '') ?></td>
            <td>
                <?php if(!empty($dados->imagem)): ?>
                    <img src="<?= htmlspecialchars($dados->imagem) ?>" alt="Imagem do Produto" style="max-width: 100px; max-height: 100px;">
                <?php endif; ?>
            </td>
            <td><?= htmlspecialchars($dados->nome ?? '') ?></td>
            <td><?= htmlspecialchars($dados->descricao ?? '') ?></td>
            <?php
                // formatar valor para exibição (2 casas decimais, separador decimal vírgula)
                $valor = isset($dados->valor) && $dados->valor !== null && $dados->valor !== '' ? number_format($dados->valor, 2, ',', '.') : '';
            ?>
            <td><?= htmlspecialchars($valor) ?></td>
            <td><?= (isset($dados->destaque) && ($dados->destaque === 'S' || $dados->destaque == 1 || $dados->destaque)) ? 'Sim' : 'Não' ?></td>
            <td><?= (isset($dados->ativo) && ($dados->ativo === 'S' || $dados->ativo == 1 || $dados->ativo)) ? 'Sim' : 'Não' ?></td>
            <td>
                <a href="produto/index/<?= isset($dados->id_produto) ? $dados->id_produto : (isset($dados->id) ? $dados->id : '') ?>" class="btn btn-success">
                    <i class="fas fa-edit"></i>
                </a>
                <a href="javascript:excluir(<?=$dados->id?>,'produto')">
                    <button class="btn btn-danger">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </a>

            </td>
          </tr>
          <?php  
        endforeach;
        ?>
    </tbody>
  </table>
</div>

    </div>
</div>  