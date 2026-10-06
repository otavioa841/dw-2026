<?php
    // puxa o arquivo de conexão com o banco de dados
    require_once "conexao.php";

    // pega os dados do formulário de login
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // cria a query para verificar se o usuário existe no banco de dados   
    $sql = "SELECT * FROM usuario WHERE email = '$email' AND senha = '$senha'";

    // executa a query e armazena o resultado
    $resultados = mysqli_query($conexao, $sql);

    // conta a quantidade de linhas retornadas pela query
    $quantidade = mysqli_num_rows($resultados);

    // se a quantidade de linhas for igual a 1, significa que o usuário existe e a senha está correta
    if ($quantidade == 1) {
    // pega os dados do usuário e armazena em variáveis de sessão
        $linha = mysqli_fetch_array($resultados);
        session_start();
        $_SESSION['email'] = $linha['email'];
        $_SESSION['nome'] = $linha['nome'];
        $_SESSION['idusuario'] = $linha['idusuario'];
    // redireciona o usuário para a página principal
        header("Location: principal.php");
    }
    // se a quantidade de linhas for diferente de 1, significa que o usuário não existe ou a senha está incorreta
    else {
    // redireciona o usuário de volta para a página de login com uma mensagem de erro
        header("Location: index.php?erro=login");
    }
?>