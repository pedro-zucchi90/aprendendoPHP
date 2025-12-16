<?php
header('Content-Type: application/json; charset=utf-8');

$message = "Hello World";
$nome = "Pedro Luiz Chaves Zucch";
$ano = date("Y");

echo json_encode([
    "message" => $message,
    "nome" => $nome,
    "ano" => $ano
]);