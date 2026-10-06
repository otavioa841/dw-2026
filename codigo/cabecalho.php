<?php
    require_once "verifica_sessao.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
  <style>
        img{

    width: 100px;
    height: auto;
    float: right;
     margin-top: -90px;
}

    
        </style>
</head>
<body>
    <h2> Projeto Rede Social </h2>

    <?php
    // puxa as variáveis de sessão do usuário logado
        $email = $_SESSION['email'];
        $nome = $_SESSION['nome'];
<<<<<<< HEAD

        echo "<p> Olá $nome ($email)</p>";
       ?>
      <img src="../imagens/goku.png" alt="goku imagem">
=======
    // exibe uma mensagem de boas vindas com o nome e email do usuário logado
        echo "<p> ๋ ࣭ ⭑ Olá, $nome ($email)</p>";
    ?>
>>>>>>> 1c0d818df0c95e40b70aca26ee26f5d2d1ef3802
</body>
</html>