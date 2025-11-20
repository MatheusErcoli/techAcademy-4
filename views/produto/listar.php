<div class="container-fluid mt-5">
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
            <th>Marca</th>
            <th>Valor</th>
            <th>Estoque</th>
            <th>Destaque</th>
            <th>Ativo</th>
            <th>Opções</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $dadosProduto = $this->produto->listar();
          foreach ($dadosProduto as $dados) {


            $valor = isset($dados->valor)
              ? number_format($dados->valor, 2, ",", ".")
              : "0,00";

            $id = $dados->id_produto ?? $dados->id ?? '';
          ?>
            <tr>
              <td><?= $id ?></td>

              <td>
                <?php if (!empty($dados->imagem)): ?>
                  <img src="arquivos/<?= htmlspecialchars($dados->imagem) ?>"
                    alt="<?= htmlspecialchars($dados->nome ?? '') ?>"
                    style="max-width:80px; max-height:60px;" />
                <?php endif; ?>
              </td>

              <td><?= htmlspecialchars($dados->nome ?? '') ?></td>
              <td><?= htmlspecialchars($dados->descricao ?? '') ?></td>
              <td><?= htmlspecialchars($dados->ds_marca ?? '') ?></td>

              <!-- 🔥 VALOR FORMATADO -->
              <td><?= $valor ?></td>

              <td><?= htmlspecialchars((string)(($dados->quantidade ?? $dados->estoque) ?? 0)) ?></td>
              <td><?= (!empty($dados->destaque)) ? 'Sim' : 'Não' ?></td>
              <td><?= (!empty($dados->ativo)) ? 'Sim' : 'Não' ?></td>

              <td>
                <a href="produto/index/<?= $id ?>" class="btn btn-success">
                  <i class="fas fa-edit"></i>
                </a>

                <a href="javascript:excluir(<?= $id ?>, 'produto')" class="btn btn-danger">
                  <i class="fas fa-trash"></i>
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