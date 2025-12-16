<?php
header('Content-Type: application/json; charset=utf-8');

// ==========================================
// DESAFIO 2: O Organizador de Newsletter
// ==========================================
//
// O QUE ESTUDAR: Funções (function) e Manipulação de Texto (Strings).
//
// OBJETIVO: 
// Você recebeu uma lista de inscritos para uma newsletter, mas os dados estão uma bagunça.
// Nomes estão mal formatados e alguns emails são inválidos.
//
// MISSÕES:
// 1. Crie uma FUNÇÃO chamada `formatarNome($nome)`:
//    - Deve remover espaços extras no começo/fim (trim).
//    - Deve deixar a primeira letra maiúscula e o resto minúscula ("pEDrO" -> "Pedro").
//
// 2. Crie uma FUNÇÃO chamada `validarEmail($email)`:
//    - Deve retornar TRUE se o email tiver um "@".
//    - Deve retornar FALSE se não tiver.
//
// 3. Use essas funções no loop para separar os usuários em duas listas:
//    - $aprovados: (Com nome arrumado e email certo)
//    - $rejeitados: (Apenas o email original)

// --- DADOS DE ENTRADA ---
$inscritos = [
    ["nome" => "  pedro ", "email" => "pedro@gmail.com"],
    ["nome" => "MARIA", "email" => "maria_email_errado.com"],
    ["nome" => "JoãO", "email" => "joao@hotmail.com"],
    ["nome" => "   ana", "email" => "ana@teste"], // Vamos considerar válido se tiver @
    ["nome" => "carlos", "email" => "carlos#gmail.com"] // Inválido, não tem @
];

// --- SEU CÓDIGO COMEÇA AQUI ---

// Defina a função formatarNome aqui...
function formatarNome($nome)
{
    $nome = trim($nome);
    $nome = strtolower($nome);
    $nome = ucfirst($nome);
    return $nome;
}

// Defina a função validarEmail aqui...
function validarEmail($email)
{
    return str_contains($email, "@");
}

$aprovados = [];
$rejeitados = [];

// Faça o loop aqui...
foreach ($inscritos as $inscrito) {
    $email = $inscrito["email"];
    $nome = formatarNome($inscrito["nome"]);
    $novoInscrito = [
        "nome" => $nome,
        "email" => $email
    ];
    if ($nome == "" || $email == "" || !validarEmail($email)) {
        $rejeitados[] = $inscrito;
    } else {
        $aprovados[] = $novoInscrito;
    }
}

// --- SAÍDA JSON ---
echo json_encode([
    "aprovados" => $aprovados,
    "rejeitados" => $rejeitados
], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
?>