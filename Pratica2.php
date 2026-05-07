<?php
$produtos = [
    [
        'nome' => 'Arroz 5kg',
        'preco' => 25.50,
        'quantidade' => 2
    ],
    [
        'nome' => 'Feijão 1kg',
        'preco' => 9.90,
        'quantidade' => 3
    ],
    [
        'nome' => 'Açúcar 1kg',
        'preco' => 4.50,
        'quantidade' => 1
    ],
    [
        'nome' => 'Óleo de Soja',
        'preco' => 6.80,
        'quantidade' => 5
    ]
];

function calcularTotal($produtos) {

    $total = 0;

    foreach ($produtos as $produto) {

        $subtotal = $produto["preco"] * $produto["quantidade"];
        $total += $subtotal;
    }

    return $total;
}

function aplicarDesconto($total) {

    if ($total >= 200) {
        return $total * 0.10;
    } elseif ($total >= 100) {
        return $total * 0.05;
    }

    return 0;
}

function classificarCompra($total) {

    if ($total >= 1000) {
        return "Compra Grande";
    } elseif ($total >= 500) {
        return "Compra Média";
    } else {
        return "Compra Pequena";
    }
}

$totalCompra = calcularTotal($produtos);
$desconto = aplicarDesconto($totalCompra);
$totalFinal = $totalCompra - $desconto;
$classificacao = classificarCompra($totalCompra);

$cor = "";

if ($classificacao == "Compra Grande") {
    $cor = "green";
} elseif ($classificacao == "Compra Média") {
    $cor = "orange";
} else {
    $cor = "red";
}

echo "<h2>Resumo da Compra</h2>";
echo "<p>Total: R$ " . number_format($totalCompra, 2, ',', '.') . "</p>";
echo "<p>Desconto: R$ " . number_format($desconto, 2, ',', '.') . "</p>";
echo "<p>Total Final: R$ " . number_format($totalFinal, 2, ',', '.') . "</p>";
echo "<p style='color:$cor'>Classificação: $classificacao</p>";

?>
