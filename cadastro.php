<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Avaliação 01</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> 
    </head>
    <body class="bg-light">     
        <!-- / -->
        <?php
            session_start(); 
            /* validação de usuário não encontrado ou senha incorreta, para assim exibir a mensagem corretas */
            if (isset($_SESSION['erro'])) {
                echo '<div class="alert alert-danger text-center" role="alert">' . $_SESSION['erro'] . '</div>';
                /* remove a váriavel erro do array */
                unset($_SESSION['erro']);
            }
        ?>

        <div class="d-flex justify-content-center align-items-center vh-100">
            <div class="p-4 border rounded bg-white shadow" style="min-width: 300px; max-width: 400px; width: 100%;">
                <h2 class="text-center mb-4">Cadastrar</h2>
                <form method="post" action="processa_cadastro.php">
                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="senha" class="form-label">Senha</label>
                        <input type="password" name="senha" id="senha" class="form-control" required>
                    </div>

                    <div class="d-grid">
                        <input type="submit" class="btn btn-primary" value="Cadastrar">
                    </div>
                </form>       
            </div>      
        </div>    
    </body>
</html>