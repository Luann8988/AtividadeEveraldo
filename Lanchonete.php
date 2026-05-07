<?php
/// array de produtos da lanchonete
$produtos = [
    [
        'nome' => 'X-Burguer',
        'preco' => 15.50,
        'quantidade' => 2
    ],
    [
        'nome' => 'X-Salada',
        'preco' => 18.00,
        'quantidade' => 1
    ],
    [
        'nome' => 'X-Tudo',
        'preco' => 25.00,
        'quantidade' => 3
    ],
    [
        'nome' => 'Batata Frita M',
        'preco' => 12.00,
        'quantidade' => 4
    ],
    [
        'nome' => 'Refrigerante Lata',
        'preco' => 6.00,
        'quantidade' => 5
    ],
    [
        'nome' => 'Suco de Laranja',
        'preco' => 8.50,
        'quantidade' => 2
    ],
    [
        'nome' => 'Cachorro Quente',
        'preco' => 10.00,
        'quantidade' => 1
    ],
    [
        'nome' => 'Misto Quente',
        'preco' => 9.00,
        'quantidade' => 2
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
    $desconto = 0;

    if ($total > 200) {
        $desconto = 15;
    } elseif ($total > 100) {
        $desconto = 10;
    }

    $valorFinal = $total - ($total * ($desconto / 100));

    return [
        "valorFinal" => $valorFinal,
        "desconto" => $desconto
    ];
}

function classificarPedido($valorFinal)
{
    if ($valorFinal <= 80) {
        return "Pedido Simples";
    } elseif ($valorFinal <= 180) {
        return "Pedido Intermediário";
    } else {
        return "Pedido Premium";
    }
}

function exibirResumo($total, $valorFinal, $desconto, $classificacao, $cor)
{
    echo "<h2 style='color:$cor'>Resumo do Pedido</h2>";
    echo "<hr>";
    echo "<p>Total Bruto: R$ " . number_format($total, 2, ',', '.') . "</p>";
    echo "<p>Desconto: $desconto%</p>";
    echo "<p>Valor a Pagar: <strong>R$ " . number_format($valorFinal, 2, ',', '.') . "</strong></p>";
    echo "<p style='color:$cor'>Classificação: <b>$classificacao</b></p>";
}

$subtotal = calcularTotal($produtos);

$dadosDesconto = aplicarDesconto($subtotal);

$valorFinal = $dadosDesconto['valorFinal'];
$desconto = $dadosDesconto['desconto'];

$classificacao = classificarPedido($valorFinal);

$cor = "";

if ($classificacao == "Pedido Simples") {
    $cor = "green";
} elseif ($classificacao == "Pedido Intermediário") {
    $cor = "orange";
} else {
    $cor = "red";
}

exibirResumo($subtotal, $valorFinal, $desconto, $classificacao, $cor);

?>
