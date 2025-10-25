<?php
if (empty($id)) {
    echo "<script>mensagem('Resgistro inválido', 'produto', 'error');</script>";
} else {
    // usar o $id recebido do roteador
    $result = $this->produto->excluir($id);
    if ($result) {
        echo "<script>mensagem('Registro excluído com sucesso!', 'produto/listar', 'success');</script>";
    } else {
        echo "<script>mensagem('Erro ao excluir o registro!', 'produto/listar', 'error');</script>";
    }
}