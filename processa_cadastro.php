<?php
session_start();

$nome = '';
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$senha = $_POST['senha'];

if (!$email) {
    $_SESSION['erro'] = "E-mail inválido!";
    header("Location: cadastro.php");
    exit;
}

if (!$senha) {
    $_SESSION['erro'] = "Senha inválida!";
    header("Location: cadastro.php");
    exit;
} 

/* leitura do arquivo usuarios.json */
$usuarios = json_decode(file_get_contents('usuarios.json'), true);

/* valida se o usuário já existe no arquivo */
if (isset($usuarios[$email])) {
    $_SESSION['erro'] = "E-mail já cadastrado!";
    header("Location: cadastro.php");
    exit;
}

/* insere o novo usuário */
$usuarios[$email] = [
    'senha' => $senha
];

/* salva o arquivo com o novo usuário */
file_put_contents('usuarios.json', json_encode($usuarios, JSON_PRETTY_PRINT));

header("Location: index.php");
exit;
?>
