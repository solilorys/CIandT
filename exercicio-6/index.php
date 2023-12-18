<?php
require "form.php";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercicio 6</title>
</head>
<style>
    div{
        display: flex;
        flex-direction: column;
        padding: 0.75rem;
    }
    input, select {
        width: 9rem;
    }
</style>
<body>
    <form action="exercicio-6/form.php" method="post">
        <div>
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" required autofocus>
        </div>
        <div>
            <label for="email">E-mail:</label>
            <input type="text" name="email" id="email" required autofocus>
        </div>
        <div>
            <label for="opcoes">Selecione a profissão:</label>
        <?php
            // Executando a funcao da classe para carregar os campos
            echo $campoSelect->carrega();
        ?>
        </div>
        <input type="submit" value="Confirmar" style="margin-left: 12px;">
    </form>
</body>
</html>