<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table, tr, td {
            border-style: solid;
            padding: 20px;

        }
        h2 {
    text-align: center;
    margin-bottom: 20px;
}

table {
    width: 90%;
    margin: auto;
    border-collapse: collapse;
    font-family: Arial, sans-serif;
}

th, td {
    border: 1px solid #ccc;
    padding: 12px;
    text-align: center;
}

th {
    background-color: #333;
    color: white;
    text-transform: uppercase;
}

td {
    background-color: #f5f5f5;
}

tr:hover td {
    background-color: #e8e8e8;
}
    </style>
</head>
<body>
    <h2>Lista de usuários</h2>

    <table>
        <tr>
            <td>id</td>
            <td>nome</td>
            <td>apelido</td>
            <td>email</td>
            <td>senha</td>
            <td>foto</td>
            <td>ação</td>
            <td>ação</td>
            <td>ação</td>
        </tr>

        <?php
        require_once "../conexao.php";
        
        $sql = "SELECT * FROM usuario";
        
        $resultados = mysqli_query($conexao, $sql);
        
        //quebra a variável $resultados em linhas (vetores/array)
        while ($linha = mysqli_fetch_array($resultados)) {
            $id = $linha['idusuario'];
            $nome = $linha['nome'];
            $apelido = $linha['apelido'];
            $email = $linha['email'];
            $senha = $linha['senha'];
            $foto = $linha['foto'];

            echo "<tr>";
                echo "<td>$id</td>";
                echo "<td>$nome</td>";
                echo "<td>$apelido</td>";
                echo "<td>$email</td>";
                echo "<td>$senha</td>";
                echo "<td><img src= '../$foto' width='100' height='100'></td>";
                echo "<td><a href='excluir_usuario.php?id=$id'>excluir</a></td>";
                echo "<td><a href='excluir_usuario.php?id=$id'><img src='../imagens/lixeira.png'></a></td>";
                echo "<td><a href='cad_usuario.php?id=$id'>editar</a></td>";
            echo "</tr>";
        }
            
            ?>
    </table>
</body>
</html>