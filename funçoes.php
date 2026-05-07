<?php //// oiiii e luannn
function calcularSubtotal($produto) {
  $subtotal = 0;

  foreach ($produto as $item) {
    $subtotal += $item['preco'] * $item['quantidade'];
  }
  return $subtotal;
}
/// aplica o seu desconto
function aplicarseuDesconto($subtotal) {
    $desconto = 0;
    if ($subtotal > 200) {
        $desconto = 15;
    } elseif ($subtotal > 100) {
        $desconto = 10;
    }

    $valorfinaldacompra = $subtotal - ($subtotal * ($desconto / 100));

    return [
        'desconto' => $desconto,
        'valorfinaldacompra' => $valorfinaldacompra
    ];
}

function classificarseuPedido($valorfinaldacompra) {
    if ($valorfinaldacompra <= 80) {
        return 'Pedido Simples';
    } elseif ($valorfinaldacompra <= 180) {
        return 'Pedido Intermediário';
    } else {
        return 'Pedido Premium';
    }
}

function exibirResultados($subtotal, $desconto, $valorfinaldacompra, $classificacao) {
    echo "Resultados da Compra:<br>";

    echo "Subtotal: R$ " . number_format($subtotal, 2, ',', '.') . "<br>";
    echo "Desconto Aplicado: " . $desconto . "%<br>";
    echo "Valor Final da Compra: R$ " . number_format($valorfinaldacompra, 2, ',', '.') . "<br>";
    echo "Classificação do Pedido: " . $classificacao . "<br>";
}
?>