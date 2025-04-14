<?php
session_start();
require_once "usuario.php";

/* validações + atribuições dos campos */
$nome = htmlspecialchars($_POST['nome']);
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$senha = $_POST['senha'];
$lembrar = isset($_POST['lembrar']);

/* verificação de credenciais em uma estrutura simulada */
$usuariosCadastrados = json_decode(file_get_contents('usuarios.json'), true);
    /* valida se o usuário está no array */
    if (isset($usuariosCadastrados[$email])) {
        $usuarioExiste = $usuariosCadastrados[$email];

        /* cria instancia da classe com dados salvos */
        $meuUsuario = new usuario($nome, $email, $usuarioExiste['senha']);
    
        /* valida se a senha do usuario é correta */
        if ($meuUsuario->Autenticar($email, $senha)) {
            $_SESSION['usuario'] = $nome;    
        } else {
            /* echo "Senha incorreta!"; */
            $_SESSION['erro'] = "Senha incorreta!";
            header("Location: index.php");       
            exit;
        }
    } else {
        $_SESSION['erro'] = "Usuário não encontrado!";    
        header("Location: index.php");           
        exit;    
    }

/* criar cookie quando "lembrar" */
if ($lembrar) {
    setcookie("email_usuario", $email, time() + 3600);
} else {
    setcookie("email_usuario", "", time() - 3600);
}
  
header("Location: sessao.php");
exit;

?>