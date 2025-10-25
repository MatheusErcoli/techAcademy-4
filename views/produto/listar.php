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
                  <!-- concatena caminho para exibir a imagem e o htmlspecialchars para evitar ataques XSS, caso não ache a imagem ele mostra texto alternativo-->
                    <img src="/public/arquivos/<?= htmlspecialchars($dados->imagem) ?>" alt="<?= htmlspecialchars($dados->nome ?? '') ?>" style="max-width:80px; max-height:60px;" />
                <?php endif; ?>
            </td>
            <!-- mostra os outros dados do produto -->
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