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
        .i1 {
            width: 1300px;

        
        }

        #i2 {
            width: 300px;
            height: 295px;
        }
        
        #i3 {
            width: 790pvx;
            height: 295px;
 
        }
iframe{
    width:1000px;
    border: 2px solid #333;
    border-radius: 10px;
   
}


    </style>
</head>
<body>
    <iframe class="i1" src="cabecalho.php"></iframe> <br>
    <iframe id="i2" src="menu.php"></iframe>
    <iframe id="i3" name="conteudo" src="informacoes.html"></iframe> <br>
    <iframe class="i1" src="rodape.html"></iframe>
    
</body>
</html>