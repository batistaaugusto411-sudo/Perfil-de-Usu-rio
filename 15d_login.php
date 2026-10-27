<?php
session_start();

$mensagem_erro = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'] ?? '';
    $senha = $_POST['senha'] ?? '';
    $cor_fundo = $_POST['cor_fundo'] ?? '#ffffff';

    $servername = 'localhost';
    $username = 'root';
    $password = 'Senai@118';
    $dbname = 'exercicio';

    // 1. Conecta com o servidor MySQL (sem o banco para não dar erro caso não exista)
    $conn = new mysqli($servername, $username, $password);

    if ($conn->connect_error) {
        die('Falha na conexão: ' . $conn->connect_error);
    }

    // 2. Cria o banco de dados se não existir
    $sql_db = "CREATE DATABASE IF NOT EXISTS $dbname";
    $conn->query($sql_db);

    // 3. Seleciona o banco de dados
    $conn->select_db($dbname);

    // 4. Cria a tabela de usuários se não existir
    $sql_table = "CREATE TABLE IF NOT EXISTS usuarios (
        id INT(11) AUTO_INCREMENT PRIMARY KEY,
        usuario VARCHAR(255) NOT NULL,
        senha VARCHAR(255) NOT NULL
    )";
    $conn->query($sql_table);

    // 5. Consulta para verificar se usuário e senha existem no MySQL
    $stmt = $conn->prepare("SELECT id FROM usuarios WHERE usuario = ? AND senha = ?");
    $stmt->bind_param("ss", $usuario, $senha);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        // Salva os dados na sessão
        $_SESSION['usuario'] = $usuario;
        $_SESSION['cor_fundo'] = $cor_fundo;
        
        $stmt->close();
        $conn->close();

        // Redireciona para o perfil
        header('Location: 15d_perfil.php');
        exit();
    } else {
        $mensagem_erro = "Usuário ou senha incorretos!";
    }

    $stmt->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login de Usuários</title>
</head>
<body>
    <h2>Login de Usuários</h2>

    <?php if (!empty($mensagem_erro)): ?>
        <p style="color: red;"><?php echo $mensagem_erro; ?></p>
    <?php endif; ?>

    <form action="" method="post">
        <label for="usuario">Usuário:</label>
        <input type="text" name="usuario" id="usuario" required><br><br>

        <label for="senha">Senha: </label>
        <input type="password" name="senha" id="senha" required><br><br>

        <label for="cor_fundo">Cor de Fundo:</label>
        <input type="color" name="cor_fundo" id="cor_fundo" value="#ffffff" required><br><br>

        <button type="submit">Entrar</button>

        
    </form>
</body>
</html>