<?php

$arquivo = "database.json";

if (file_exists($arquivo)) {
    $conteudo = file_get_contents($arquivo);
} else {
    $conteudo = "[]";
    file_put_contents($arquivo, $conteudo);
}

$dados = json_decode($conteudo, true);