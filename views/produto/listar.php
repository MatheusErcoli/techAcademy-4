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
                    <img src="/public/arquivos/<?= htmlspecialchars($dados->imagem) ?>" alt="<?= htmlspecialchars($dados->nome ?? '') ?>" style="max-width:80px; max-height:60px;" />
                <?php endif; ?>
            </td>
            <td><?= htmlspecialchars($dados->nome ?? '') ?></td>
            <td><?= htmlspecialchars($dados->descricao ?? '') ?></td>
            <td><?= htmlspecialchars($dados->valor ?? '') ?></td>
            <td><?= (isset($dados->destaque) && $dados->destaque) ? 'Sim' : 'Não' ?></td>
            <td><?= (isset($dados->ativo) && $dados->ativo) ? 'Sim' : 'Não' ?></td>
          </tr>
          <?php  
        endforeach;
        ?>
    </tbody>
  </table>
</div>

    </div>
</div>  