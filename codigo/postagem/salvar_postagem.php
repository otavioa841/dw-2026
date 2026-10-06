<?php
    require_once "../verifica_sessao.php";
    require_once "../conexao.php";

    $texto = $_POST['texto'];
    $idusuario = $_SESSION['idusuario'];

    $sql = "INSERT INTO postagem (texto, data_hora, idusuario) VALUES ('$texto', NOW(), $idusuario)";

    mysqli_query($conexao, $sql);

    header("Location: listar_postagem.php");
?>