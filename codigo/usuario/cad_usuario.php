<?php
    if (isset($_GET['id'])) {
        //editar update (só quem está logado pode editar)
        require_once "../verifica_sessao.php";

        $id = $_GET['id'];
        
        require_once "../conexao.php";
        $sql = "SELECT * FROM usuario WHERE idusuario = $id";
        $resultado = mysqli_query($conexao, $sql);

        $linha = mysqli_fetch_array($resultado);
        
        $nome = $linha['nome'];
        $apelido = $linha['apelido'];
        $email = $linha['email'];
        $senha = $linha['senha'];
        $foto = $linha['foto'];
    }
    else {
        //novo insert
        $id = 0;
        $nome = '';
        $apelido = '';
        $email = '';
        $senha = '';
        $foto = '';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background: #f0f0f0;
            margin: 0;
            padding: 40px 0;
            min-height: 100vh;
        }

        h3 {
            max-width: 350px;
            margin: 0 auto 15px auto;
            color: #444;
            text-align: center;
        }

        form {
            max-width: 350px;
            margin: 0 auto;
            background: white;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            padding: 24px;
        }

        input[type="text"] {
            width: 100%;
            padding: 8px 12px;
            border: 1px solid #ddd;
            border-radius: 16px;
            outline: none;
            font-size: 0.9em;
            background: #fafafa;
            margin-top: 4px;
            margin-bottom: 12px;
        }

        input[type="text"]:focus {
            border-color: #999;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background: #666;
            color: white;
            border: none;
            border-radius: 16px;
            cursor: pointer;
            font-size: 0.9em;
            margin-top: 10px;
        }

        input[type="submit"]:hover {
            background: #444;
        }
    </style>
</head>
<body>
    <h3>Cadastro de usuario </h3>
    <form action="salvar_usuario.php?id=<?php echo $id; ?>" method="POST">
        Nome: <br>
        <input type="text" name="nome" value="<?php echo $nome; ?>"> <br>
        
        Apelido: <br>
        <input type="text" name="apelido" value="<?php echo $apelido; ?>"> <br>
        
        Email: <br>
        <input type="text" name="email" value="<?php echo $email; ?>"> <br>

        Senha: <br>
        <input type="text" name="senha" value="<?php echo $senha; ?>"> <br>
        
        Foto: <br>
        <input type="text" name="foto" value="<?php echo $foto; ?>"> <br>
        
        <input type="submit" value="Salvar">
    </form>
</body>
</html>