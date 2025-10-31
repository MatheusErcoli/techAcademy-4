<?php
    if(empty($id)){
        echo "<script>mensagem('Erro, funcionário não encontrado','funcionario','error');</script>";
        exit;
    } else {
        $msg = $this->funcionario->excluir($id);
        if($msg == 1){
            echo "<script>mensagem('Funcionário excluído com sucesso!','funcionario','ok');</script>";
        } else {
            echo "<script>mensagem('Erro ao excluir o funcionário!','funcionario','error');</script>";
        }
    }