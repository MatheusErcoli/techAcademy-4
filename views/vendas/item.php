<div class="card">
                <div class="card-header">
                    <div class="card-header">
                        <div class="float-start">
                            <h2>Cadastro de itens do pedido</h2>
                        </div>
                        <div class="float-end">
                            <a href="vendas" class="btn btn-formulario">
                                <i class="fas fa-file"></i> Adicionar Novo
                            </a>
                            <a href="vendas/listar" class="btn btn-formulario">
                                <i class="fas fa-search"></i> Listar
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form name="formItem" action="vendas/salvar" method="post" enctype="multipart/form-data" data-parsley-validate="">
                            <div class="row">
                                <div class="col-12 col-md-1">
                                    <label for="id_item">ID_Item:</label>
                                    <input type="text" readonly name="id_item" id="id_item" class="form-control" value="<?= $iditem ?>">
                                </div>
                                <div class="col-12 col-md-2">
                                    <label for=""></label>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>