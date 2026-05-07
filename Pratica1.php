<?php
/// array com notas dos alunos
$notas = [8.5, 7.2, 9.0, 6.8, 5.5];

function calcularMedia($notas) {
    $soma = 0;

    foreach ($notas as $nota) {
        $soma += $nota;
    }

    return $soma / count($notas);
}

function verificarSituacao($media) {
    if ($media >= 7) {
        return "Aprovado";
    } elseif ($media >= 5) {
        return "Recuperação";
    } else {
        return "Reprovado";
    }
}

$media = calcularMedia($notas);
$situacao = verificarSituacao($media);

$cor = '';

if ($situacao == 'Aprovado') {
    $cor = 'green';
} elseif ($situacao == 'Recuperação') {
    $cor = 'yellow';
} else {
    $cor = 'red';
}
?>

<h2>Resultado do Aluno</h2>

<p>Média: <?php echo number_format($media, 2, ',', '.'); ?></p>

<p style="color: <?php echo $cor; ?>;">
    Situação: <?php echo $situacao; ?>
</p>
