<?php
    require_once "../verifica_sessao.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
     body{
         text-align: center;
    
     }
     body {
    background-color: lightblue;
}
    </style>
</head>
<body>
    <h2>Nova postagem</h2>
    <form action="salvar_postagem.php" method="POST">
<<<<<<< HEAD
         Escreva sua postagem: <br>
        <textarea name="texto" maxlength="140" rows="4" cols="40"></textarea> <br><br>
=======
       Texto: <br>
      <input type="text" name="texto" maxlength="140"> <br><br>
>>>>>>> 1c0d818df0c95e40b70aca26ee26f5d2d1ef3802

        <input type="submit" value="Publicar">
    </form>
</body>
</html>
