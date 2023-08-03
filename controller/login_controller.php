<?php
// Inclua a classe do modelo de usuário
use Suporte;
use Clientes;

$request = $_REQUEST;
// Função para processar o login
function processarLogin($email, $senha)
{
    //vou incluir ainda
}

// Verifique se o formulário de login foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtém os dados do formulário
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Processa o login
    processarLogin($email, $senha);
}
