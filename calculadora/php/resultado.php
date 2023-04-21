<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Resultado da Calculadora de Tinta</title>

  <link rel="stylesheet" href="../css/style.css">
</head>

<body>
  <h1>Resultado da Calculadora de Tinta</h1>
  
  <?php
    // Recupera os valores calculados
    if (isset($_GET['quantidadeTinta'])) {
      $quantidadeTinta = $_GET['quantidadeTinta'];
    }
    if (isset($_GET['tamanhoLata'])) {
      $tamanhoLata = $_GET['tamanhoLata'];
    }
  ?>

  <div class="container resultado">
    <p>Quantidade de tinta necessária:
    <?php echo isset($quantidadeTinta) ? number_format($quantidadeTinta, 1) : '0.0'; ?> litros.</p>

    <p>Tamanho da lata de tinta sugerida: <?php echo isset($tamanhoLata) ? $tamanhoLata : '0.0'; ?> litros.
    </p>
	</div>

</body>

</html>