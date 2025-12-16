<?php
header('Content-Type: application/json; charset=utf-8');

// ==========================================
// DESAFIO: O Processador de Carrinho de Compras
// ==========================================
//
// OBJETIVO: 
// Você recebeu uma lista bruta de produtos de uma loja.
// Sua missão é processar essa lista e gerar um Relatório Final em JSON.
//
// REGRAS:
// 1. Apenas produtos com "estoque" maior que 0 devem entrar no relatório.
// 2. Se o produto custar mais de 100 reais, aplique 10% de desconto no "preco_final".
// 3. Calcule o valor total do carrinho (soma dos preços finais).
// 4. A saída deve ser um JSON com: 
//    - "itens_comprados": (a lista filtrada com o novo preço)
//    - "total_bruto": (soma sem desconto)
//    - "total_com_desconto": (soma com desconto)
//    - "economia_total": (quanto foi economizado)
//
// DICA: Use foreach, if, e operadores matemáticos.

// --- DADOS DE ENTRADA (NÃO MEXER) ---
$produtos = [
    ["nome" => "Teclado Mecânico", "preco" => 250.00, "estoque" => 5],
    ["nome" => "Mouse Gamer", "preco" => 80.00, "estoque" => 10],
    ["nome" => "Monitor 144hz", "preco" => 1200.00, "estoque" => 0],
    ["nome" => "Mousepad", "preco" => 30.00, "estoque" => 50],
    ["nome" => "Cadeira Office", "preco" => 800.00, "estoque" => 2]
];

// --- SEU CÓDIGO COMEÇA AQUI ---

$itensComprados = [];
$totalBruto = 0;
$totalComDesconto = 0;

foreach ($produtos as $produto) {
    if ($produto["estoque"] > 0) {
        $itensComprados[] = $produto;
    } else {
        continue;
    }

    $totalBruto += $produto["preco"];

    if ($produto["preco"] > 100) {
        $totalComDesconto += $produto["preco"] * 0.9;
    } else {
        $totalComDesconto += $produto["preco"];
    }
}

// --- SAÍDA JSON ---
echo json_encode([
    "itens_comprados" => $itensComprados,
    "total_bruto" => $totalBruto,
    "total_com_desconto" => $totalComDesconto,
    "economia_total" => $totalBruto - $totalComDesconto
]);