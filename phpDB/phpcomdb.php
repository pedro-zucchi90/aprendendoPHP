<?php
$nome = "NOME QUALQUER";
$email = "EMAIL QUALQUER";

$arquivo = "database.json";
$conteudo = [];

if (file_exists($arquivo)) {
    $conteudo = file_get_contents($arquivo);
    $conteudo = json_decode($conteudo, true);
    if (!is_array($conteudo)) {
        $conteudo = [];
    }
} else {
    $conteudo = [];
}

if ($nome && $email) {
    $dados = ["nome" => $nome, "email" => $email];
    $conteudo[] = $dados;

    file_put_contents($arquivo, json_encode($conteudo, JSON_PRETTY_PRINT));
} else {
    echo "Nenhum dado foi inserido";
}

print_r($conteudo);