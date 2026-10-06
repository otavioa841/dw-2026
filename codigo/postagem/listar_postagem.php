<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
<<<<<<< HEAD
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
=======
        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background: #f0f0f0;
            margin: 0;
            padding: 30px 0;
        }

        h2 {
            text-align: center;
            color: #333;
            font-weight: 600;
            margin-bottom: 25px;
        }

        div {
            border-style: solid;
            padding: 10px;
        }

        .postagens {
            border: none;
            max-width: 500px;
            margin: 0 auto;
            background: transparent;
            padding: 0;
        }

        .postagem {
            border: 1px solid #e0e0e0;
            margin: 0 0 15px 0;
            background: white;
            border-radius: 8px;
            padding: 16px;
        }

        .postagem img {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            vertical-align: middle;
            margin-right: 10px;
            border: 1px solid #ddd;
            object-fit: cover;
        }

        .nome-autor {
            font-weight: 600;
            color: #333;
        }

        .horario {
            border: none;
            padding: 0;
            font-size: 0.8em;
            color: #999;
            margin-top: 8px;
        }

        .comentarios {
            border: none;
            border-top: 1px solid #eee;
            margin-top: 12px;
            padding: 10px 0 0 0;
            background: transparent;
        }

        .comentarios img {
            width: 26px;
            height: 26px;
            border-radius: 50%;
            vertical-align: middle;
            margin-right: 8px;
            border: 1px solid #ddd;
            object-fit: cover;
        }

        .comentarios > div {
            border: none;
            background: #f5f5f5;
            border-radius: 16px;
            padding: 8px 12px;
            margin: 6px 0;
            display: block;
            color: #555;
            font-size: 0.9em;
        }

        .sem-comentarios {
            border: none;
            color: #aaa;
            background: transparent;
            font-style: italic;
            font-size: 0.85em;
            margin-top: 12px;
            padding: 0;
            border-top: 1px solid #eee;
            padding-top: 10px;
        }

        .comentarios form {
            border: none;
            padding: 0;
            margin-top: 10px;
            display: flex;
            gap: 8px;
        }

        .comentarios input[type="text"] {
            flex: 1;
            padding: 8px 12px;
            border: 1px solid #ddd;
            border-radius: 16px;
            outline: none;
            font-size: 0.85em;
            background: #fafafa;
        }

        .comentarios input[type="text"]:focus {
            border-color: #999;
        }

        .comentarios input[type="submit"] {
            padding: 8px 16px;
            background: #666;
            color: white;
            border: none;
            border-radius: 16px;
            cursor: pointer;
            font-size: 0.85em;
        }

        .comentarios input[type="submit"]:hover {
            background: #444;
        }
>>>>>>> 1c0d818df0c95e40b70aca26ee26f5d2d1ef3802
    </style>
</head>

<body>
    <h2> Postagens de hoje </h2>

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