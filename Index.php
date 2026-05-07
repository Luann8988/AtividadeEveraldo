<?php

require_once 'funções.php';

$produtos = [ /// lanchonete produtos varios 
    [
        'nome' => "Hambúrguer",
        'preco' => 25.00,
        'quantidade' => 2
    ],
    [
        'nome' => "Batata Frita",
        'preco' => 10.00,
        'quantidade' => 1

    ],
    [
        'nome' => "Refrigerante",
        'preco' => 5.00,
        'quantidade' => 3
    ],
    [
        'nome' => "Milk Shake",
        'preco' => 15.00,
        'quantidade' => 1
    ]
];

$subtotall = calcularSubtotal($produtos);
$dadosDesconto = aplicarseuDesconto($subtotall);
$desconto = $dadosDesconto['desconto'];
$valorfinaldacompra = $dadosDesconto['valorfinaldacompra'];

$classificacaoPedido = classificarseuPedido($valorfinaldacompra);

echo "<h1>Pedido da Lanchonete do Luann</h1>";

foreach ($produtos as $produto) {
    echo "Produto: " . $produto['nome'] . "<br>";
    echo "Preço Unitário: R$ " . number_format($produto['preco'], 2, ',', '.') . "<br>";
    echo "Quantidade: " . $produto['quantidade'] . "<br><br>";
}
exibirResultados($subtotall, $desconto, $valorfinaldacompra, $classificacaoPedido);

?>