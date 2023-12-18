<?php

/**
 * Crie um formulário contendo os campos (Nome, Sobrenome, e-mail,
 * telefone, login & senha) e salve as submissões dentro de um arquivo
 * chamado registros.txt. Itens mandatórios para esse exercício:
 * 
 * a) Os registros devem ser salvos dentro de um array() incremental no arquivo
 * registros.txt
 * 
 * b) O formulário deverá validar os campos email e telefone aceitando somente os
 * formatos aceitáveis.
 * 
 * c) Se possivel não salvar email ou logins que já foram registrados anteriormente
 * 
 * d) O campo senha deverá ser salvo encriptado.
 */

// Recebendo os dados do formulário e verificando se há algo
if($_SERVER["REQUEST_METHOD"] == 'POST') {
    $nome = $_POST["nome"] ?? '';
    $sobrenome = $_POST["sobrenome"] ?? '';
    $email = $_POST["email"] ?? '';
    $telefone = $_POST["telefone"] ?? '';
    $login = $_POST["login"] ?? '';
    $senha = $_POST["senha"] ?? '';

    // Verificando a existência do arquivo .txt, caso não cria um arquivo .txt para armazenar todas as informações e verificando se há algum regristro de e-mail e telefone já criado.
    $arquivo = 'registros.txt';
    $registros = [];
    if (file_exists($arquivo)) {
        $registros = unserialize(file_get_contents($arquivo));
    }

    // Validação do e-mail e telefone
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Informe um e-mail válido." . '<br>';
        exit;
    }
    if (!preg_match("/^[0-9]{10,11}$/", $telefone)) {
        echo "Informe um telefone válido." . '<br>';
        exit;
    }

    // Estrutura de repetição para percorrer o arquivo e verificar se há algo dentro que possa ser repetido
    foreach($registros as $registro) {
        if ($registro['email'] == $email || $registro['login'] == $login) {
            echo "E-mail ou login já registrados anteriormente!" . '<br>';
            exit;
        }   
    }

    // Criptografando a senha
    $senhaCriptografada = password_hash($senha, PASSWORD_DEFAULT);

    // Criando um novo array para armazenar e adicionar no arquivo .txt
    $array = [
        'nome' => $nome,
        'sobrenome' => $sobrenome,
        'email' => $email,
        'telefone' => $telefone,
        'login' => $login,
        'senha' => $senhaCriptografada
    ];

    // Colocando todas as informações validadas e verificadas dentro do arquivo.txt
    $registros[] = $array;
    file_put_contents($arquivo, serialize($registros));

    echo "Dados enviados com sucesso!" . '<br>';
        
} else {
    echo "Error";
}
?>
