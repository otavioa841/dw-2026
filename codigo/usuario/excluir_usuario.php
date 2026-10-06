<?php
require_once "../verifica_sessao.php";
require_once "../conexao.php";

// pega o id do usuario que vai ser excluido
$id = $_GET['id'];

// "ordem" escrita esperando ser entregue
$sql = "delete from usuario where idusuario = $id";

// executa a query de exclusão
mysqli_query($conexao, $sql);

header("Location: lista_usuario.php");
?>