<?php
    if(empty($id)){
        echo"<script>mensagem('Registro inválido!','categoria','error');</script>";
    } else{
        $msg = $this->categoria->excluir($id);

        if($msg == 1){
            echo "<script>mensagem('Categoria excluída com sucesso!','categoria','ok');</script>";
        } else {
            echo "<script>mensagem('Erro ao excluir a categoria!','categoria','error');</script>";
        }
    }
?>