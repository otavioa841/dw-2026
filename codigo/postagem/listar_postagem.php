<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
    font-family: Arial;
    background-color: #f2f2f2;
}

h2 {
    text-align: center;
}

.postagens {
    width: 600px;
    margin: auto;
}

.postagem {
    background-color: white;
    padding: 15px;
    margin-bottom: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 5px #ccc;
}

.postagem img {
    width: 40px;
    height: 40px;
    border-radius: 50%;
}

.nome-autor {
    font-weight: bold;
    margin-left: 10px;
}

.horario {
    color: gray;
    font-size: 12px;
    margin-top: 10px;
}

.comentarios {
    margin-top: 15px;
    padding: 10px;
    background-color: #f5f5f5;
}

.sem-comentarios {
    color: gray;
    margin-top: 10px;
}
    </style>
</head>

<body>
    <h2>Lista de postagens</h2>

    <!-- tabela -->
    <div class="postagens">
        <?php
        require_once "../conexao.php";

        $sql = "SELECT * FROM postagem";

        $resultados = mysqli_query($conexao, $sql);

        while ($linha = mysqli_fetch_array($resultados)) {
            $idpostagem = $linha['idpostagem'];
            $texto = $linha['texto'];
            $data_hora = $linha['data_hora'];
            $idusuario = $linha['idusuario'];

            $sql2 = "SELECT * FROM usuario WHERE idusuario = $idusuario";
            $resultado = mysqli_query($conexao, $sql2);
            $usuario = mysqli_fetch_array($resultado);

            $foto = $usuario['foto'];
            $nome = $usuario['nome'];

            echo "<div class='postagem'>";

            echo "<div>";
            echo "<img src='$foto'>";
            echo "<span class='nome-autor'>$nome</span>";
            echo "</div>";

            echo $texto;

            echo "<div class='horario'>$data_hora</div>";

            //caixa dos comentarios
            $sql3 = "SELECT * FROM comentario WHERE idpostagem = $idpostagem";
            $comentarios = mysqli_query($conexao, $sql3);

            if (mysqli_num_rows($comentarios) == 0) {
            echo "<div class='sem-comentarios'>Essa postagem não possui comentários.</div>";
            } else {
                echo "<div class='comentarios'>";
                // listar comentários aqui

                while ($comentario = mysqli_fetch_array($comentarios)) {
                    $idusuario_comentario = $comentario['idusuario'];
                    $texto_comentario = $comentario['texto'];

                    $sql4 = "SELECT * FROM usuario WHERE idusuario = $idusuario_comentario";
                    $resultado = mysqli_query($conexao, $sql4);
                    $usuario = mysqli_fetch_array($resultado);

                    $foto_usuario_comentario = $usuario['foto'];

                    echo "<div>";
                    echo "<img src='imagem_usuario/$foto_usuario_comentario'>";
                    echo $texto_comentario;


                    echo "</div>";
                }
                ?>
                
                <form action="salvar_comentario.php">
                    <input type="text">
                    <input type="submit" value="Comentar">
                </form>

                <?php
                echo "</div>";
            }


            echo "</div>";
        }
        ?>
    </div>
</body>

</html>