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
        $dadosProduto = $this->listar();

        foreach($dadosProduto as $dados):

        $valor = $dados->valor

          ?>
           endforeach;
          <tr>
            <td><?=$dados->id?></td>
            <td><?= $dados->imagem ?></td>
            <td><?= $dados->valor ?></td>
          </tr>
          <?php  
       
        ?>
    </tbody>
  </table>
</div>

    </div>
</div>  