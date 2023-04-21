<?php

// Validação dos dados
$areaTotal = 0;
$areaPortasJanelas = 0;

// Validação das paredes
for ($i = 1; $i <= 4; $i++) {
    $altura = filter_var($_POST["altura{$i}"], FILTER_VALIDATE_FLOAT);
    $largura = filter_var($_POST["largura{$i}"], FILTER_VALIDATE_FLOAT);
    $numPortas = filter_var($_POST["portas{$i}"], FILTER_VALIDATE_INT);
    $numJanelas = filter_var($_POST["janelas{$i}"], FILTER_VALIDATE_INT);
    $areaParede = $altura * $largura;

    // Verifica se as medidas são válidas
    if ($altura <= 0 || $altura > 50 || $largura <= 0 || $largura > 50) {
        die("As medidas da parede {$i} não são válidas.");
    }

    // Verifica se o número de portas e janelas é válido
    if ($numPortas < 0 || $numPortas > 10 || $numJanelas < 0 || $numJanelas > 10) {
        die("O número de portas e janelas na parede {$i} não é válido.");
    }

    // Calcula a área das portas e janelas
    $areaPortasJanelasParede = ($numPortas * 0.8 * 1.9) + ($numJanelas * 2 * 1.2);
    $maxAreaPortasJanelasParede = $areaParede * 0.5;
    if ($areaPortasJanelasParede > $maxAreaPortasJanelasParede) {
        die("A área das portas e janelas na parede {$i} não pode ser maior que 50% da área da parede.");
    }

    // Verifica a altura da parede com porta
    if ($numPortas > 0 && $altura <= 1.9) {
        die("A altura da parede {$i} com porta deve ser, no mínimo, 30 cm maior que a altura da porta.");
    }

    $areaTotal += $areaParede;
    $areaPortasJanelas += $areaPortasJanelasParede;
}

// Cálculo da quantidade de tinta necessária
$areaTotal -= $areaPortasJanelas;
$quantidadeTinta = $areaTotal / 5;

// Seleção do tamanho das latas de tinta
$latas = array(18, 3.6, 2.5, 0.5);
$tamanhoLata = 0;
foreach ($latas as $lata) {
    if ($quantidadeTinta > $lata) {
        $tamanhoLata = $lata;
        break;
    }
}

// Redirecionamento para a página de resultados
header("Location: ../php/resultado.php?quantidadeTinta=" . number_format($quantidadeTinta, 1) . "&tamanhoLata=" . $tamanhoLata);
exit;
?>
