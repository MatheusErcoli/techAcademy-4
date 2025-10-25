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
        //chama metódo listar do model Produto
        $dadosProduto = $this->produto->listar();
        //inicia o loop para exibir os produtos
        foreach($dadosProduto as $dados):
          ?>
          <tr>
            <!-- se existir id_produto usa ele, senao usa "id", caso nenhum dos dois exista retorna vazio -->
            <td><?= isset($dados->id_produto) ? $dados->id_produto : (isset($dados->id) ? $dados->id : '') ?></td>
            <td>
              <!-- verifica se existe imagem -->
                <?php if(!empty($dados->imagem)): ?>
                    <img src="<?= htmlspecialchars($dados->imagem) ?>" alt="Imagem do Produto" style="max-width: 100px; max-height: 100px;">
                <?php endif; ?>
            </td>
           <td><?= htmlspecialchars($dados->nome ?? '') ?></td>
            <td><?= htmlspecialchars(strip_tags($dados->descricao ?? '')) ?></td>

            <?php
                // formatar valor para exibição (2 casas decimais, separador decimal vírgula)
                $valor = isset($dados->valor) && $dados->valor !== null && $dados->valor !== '' ? number_format($dados->valor, 2, ',', '.') : '';
            ?>
            <td><?= htmlspecialchars($valor) ?></td>
            <td><?= (isset($dados->destaque) && ($dados->destaque === 'S' || $dados->destaque == 1 || $dados->destaque)) ? 'Sim' : 'Não' ?></td>
            <td><?= (isset($dados->ativo) && ($dados->ativo === 'S' || $dados->ativo == 1 || $dados->ativo)) ? 'Sim' : 'Não' ?></td>
            <td>
                <a href="produto/index/<?= isset($dados->id_produto) ? $dados->id_produto : (isset($dados->id) ? $dados->id : '') ?>" class="btn btn-formulario" title="Editar">
                    <i class="fas fa-edit"></i>
                </a>
                <a href="javascript:excluir(<?= isset($dados->id_produto) ? $dados->id_produto : (isset($dados->id) ? $dados->id : '') ?>,'produto')" class="btn btn-formulario" title="Excluir">
                    <i class="fas fa-trash-alt"></i>
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