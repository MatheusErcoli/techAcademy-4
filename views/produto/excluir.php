<?php
    if(empty($id)){
        echo "<script>mensagem('Erro, Produto não encontrado','produto','error');</script>";
        exit;
    } else {
        $msg = $this->produto->excluir($id);
        if($msg == 1){
            echo "<script>mensagem('Produto excluído com sucesso!','produto','ok');</script>";
        } else {
            echo "<script>mensagem('Erro ao excluir o produto!','produto','error');</script>";
        }
    }