<?php

session_start();
if (!isset($_SESSION['usuario'])) {
  header("Location: index.php");
  exit;
}

$usuario = $_SESSION['usuario'];
$email = $_COOKIE['email_usuario'] ?? 'Nao lembrado';
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">        
        <title>Bem-vindo</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">         
    </head>
    <body class="bg-light">
        
        <div class="d-flex justify-content-center align-items-center vh-100">
            <div class="text-center bg-white p-4 rounded shadow" style="min-width: 300px;">
                <h2 class="mb-3">Bem-vindo, <?= $usuario ?></h2>
                <p class="mb-4">E-mail lembrado: <strong><?= $email ?></strong></p>
                <a href="logout.php" class="btn btn-danger">Sair</a>
            </div>
        </div>        
    </body>
</html>