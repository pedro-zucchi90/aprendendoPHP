<?php
header("Content-Type: application/json; charset=utf-8");

$arquivo = "database.json";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $conteudoAtual = file_exists($arquivo) ? file_get_contents($arquivo) : "[]";
    $arrayDados = json_decode($conteudoAtual, true);
    if (!is_array($arrayDados))
        $arrayDados = [];

    $nome = $_POST['nome'] ?? null;
    $email = $_POST['email'] ?? null;

    if ($nome && $email) {
        $novoDado = ["nome" => $nome, "email" => $email];
        $arrayDados[] = $novoDado;

        file_put_contents($arquivo, json_encode($arrayDados, JSON_PRETTY_PRINT));
        echo json_encode(["mensagem" => "salvo com sucesso"]);
    } else {
        echo json_encode(["erro" => "faltou nome ou email"]);
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (file_exists($arquivo)) {
        echo file_get_contents($arquivo);
    } else {
        echo "[]";
    }
}