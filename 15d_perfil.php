<?php
// Inicia a sessão para acessar as variáveis salvas no login
session_start();

// 1. Verifica se o usuário está logado
if (!isset($_SESSION['usuario'])) {
    // Redireciona para o login caso a sessão não exista
    header('Location: 15d_login.php');
    exit();
}

// Resgata as informações salvas na sessão
$usuario = $_SESSION['usuario'];
$cor_fundo = $_SESSION['cor_fundo'] ?? '#ffffff';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Perfil do Usuário</title>
</head>
<!-- 3. Aplica a cor de fundo escolhida no style do body -->
<body style="background-color: <?php echo htmlspecialchars($cor_fundo); ?>;">

    <!-- 2. Mensagem de boas-vindas com o nome do usuário -->
    <h2>Bem-vindo(a), <?php echo htmlspecialchars($usuario); ?>!</h2>
    
    <p>Esta é a sua página de perfil.</p>
    <a href="15d_logout.php">Sair da pagina</a>
</body>
</html>