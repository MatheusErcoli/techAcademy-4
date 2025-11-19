<div class="container" style="margin-top:40px;">
    <div class="card">
        <div class="card-header text-center">
            <h3>Olá, Seja bem-vindo <?= $_SESSION["mcecelulares"]["nome"]; ?></h3>
        </div>
        <div class="card-body">
            <div class="text-center">
                <h4>Oque você gostaria de fazer?</h4>
            </div>
            <br>
            <div class="row">
                <div class="col-12 col-md-3 text-center">
                    <div class="borda" style="border: black 2px solid; border-radius: 10px; padding: 20px; margin: 0 10px 0 10px;">
                        <i class="fa-solid fa-mobile" style="font-size: 50px; margin-bottom: 10px; "></i>
                        <br>
                        <a href="produto" class="btn btn-formulario">Produto</a>
                    </div>
                </div>
                <div class="col-12 col-md-3 text-center">
                    <div class="borda" style="border: black 2px solid; border-radius: 10px; padding: 20px; margin: 0 10px 0 10px;">
                        <i class="fa-solid fa-list" style="font-size: 50px; margin-bottom: 10px; "></i>
                        <br>
                        <a href="categoria" class="btn btn-formulario">Categoria</a>
                    </div>
                </div>
                <div class="col-12 col-md-3 text-center">
                    <div class="borda" style="border: black 2px solid; border-radius: 10px; padding: 20px; margin: 0 10px 0 10px;">
                        <i class="fa-solid fa-users" style="font-size: 50px; margin-bottom: 10px; "></i>
                        <br>
                        <a href="cliente" class="btn btn-formulario">Cliente</a>
                    </div>
                </div>
                <div class="col-12 col-md-3 text-center">
                    <div class="borda" style="border: black 2px solid; border-radius: 10px; padding: 20px; margin: 0 10px 0 10px;">
                        <i class="fa-solid fa-user-tie" style="font-size: 50px; margin-bottom: 10px; "></i>
                        <br>
                        <a href="funcionario" class="btn btn-formulario">Funcionario</a>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-12 col-md-6 text-center">
                    <div class="borda" style="border: black 2px solid; border-radius: 10px; padding: 20px; margin: 0 10px 0 10px;">
                        <i class="fa-solid fa-cart-shopping" style="font-size: 50px; margin-bottom: 10px; "></i>
                        <br>
                        <a href="vendas" class="btn btn-formulario">Vendas</a>
                    </div>
                </div>
                <div class="col-12 col-md-6 text-center">
                    <div class="borda" style="border: black 2px solid; border-radius: 10px; padding: 20px; margin: 0 10px 0 10px;">
                        <i class="fa-solid fa-clipboard" style="font-size: 50px; margin-bottom: 10px; "></i>
                        <br>
                        <a href="dashboard" class="btn btn-formulario">Dashboard</a>
                    </div>
                </div>
            </div>
            </div>
    </div>
</div>