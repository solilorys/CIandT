<?php

/**
 * Crie uma API simples para manipular uma lista de usuários contendo os
 * campos (Nome, Sobrenome, Email & Telefone.). Essa API deverá conter
 * os requisitos abaixo:
 * 
 * a. Dados deverão ser salvos em um arquivo de texto
 * b. Usar Rest API
 * c. Criar Endpoint para listar todos os usuarios
 * d. Criar Endpoint para deletar usuarios por email
 * e. Criar Endpoint para adicionar um usuario novo
 * f. Criar Endpoint para atualizar os dados do usuario
 * g. Prover documentacao minima para usar a API
 */

// Verifica o método da requisição
$method = $_SERVER['REQUEST_METHOD'];

// Caminho para o arquivo de armazenamento dos usuários
$file = 'usuarios.txt';

// Função para carregar os usuários do arquivo
function carregarUsuarios()
{
    global $file;
    $usuarios = file_get_contents($file);
    return json_decode($usuarios, true);
}

// Função para salvar os usuários no arquivo
function salvarUsuarios($usuarios)
{
    global $file;
    file_put_contents($file, json_encode($usuarios));
}

// Função para retornar a lista de todos os usuários
function listarUsuarios()
{
    $usuarios = carregarUsuarios();
    header('Content-Type: application/json');
    if(!$usuarios) {
        echo "Não há usuário cadastrado.";
    } else {
        echo json_encode($usuarios);
    }   
}

// Função para adicionar um novo usuário
function adicionarUsuario($dadosUsuario)
{
    $usuarios = carregarUsuarios();
    $usuarios[] = $dadosUsuario;
    salvarUsuarios($usuarios);
    echo "Usuário adicionado com sucesso.";
}

// Função para deletar um usuário por e-mail
function deletarUsuario($email)
{
    $usuarios = carregarUsuarios();
    foreach ($usuarios as $chave => $usuario) {
        if ($usuario['email'] === $email) {
            unset($usuarios[$chave]);
            echo "Usuário deletado com sucesso.";
        } else {
            echo "Usuário não encontrado.";
        }
    }
    salvarUsuarios(array_values($usuarios));
}

// Função para atualizar os dados de um usuário
function atualizarUsuario($email, $novosDados)
{
    $usuarios = carregarUsuarios();
    foreach ($usuarios as &$usuario) {
        if ($usuario['email'] === $email) {
            $usuario = array_merge($usuario, $novosDados);
            echo "Dados do usuário atualizados com sucesso.";
        } else {
            echo "Usuário não encontrado.";
        }
    }
    salvarUsuarios($usuarios);
}

// Manipulação das requisições
switch ($method) {
    case 'GET':
        listarUsuarios();
        break;
    case 'POST':
        $data = json_decode(file_get_contents('php://input'), true);
        adicionarUsuario($data);
        break;
    case 'DELETE':
        $email = $_GET['email'] ?? '';
        deletarUsuario($email);
        break;
    case 'PUT':
        $email = $_GET['email'] ?? '';
        $data = json_decode(file_get_contents('php://input'), true);
        atualizarUsuario($email, $data);
        break;
    default:
        http_response_code(405);
        echo "Método não permitido.";
        break;
}
