<?php
function calcularMedia($notas) {
    $soma = 0;
    $quantidade = 0;
    foreach ($notas as $nota) {
        if (is_numeric($nota)) {
            $soma += $nota;
            $quantidade++;
        }
    }
    if ($quantidade == 0) return 0;
    return $soma / $quantidade;
}

function verificarSituacao($media) {
    if ($media > 7) {
        return "Aprovado(a) :3";
    } elseif ($media > 5) {
        return "Recuperaçãozinha >:)";
    } else {
        return "Reprovado(a) >:(";
    }
}

function exibirBoletim($nome, $notas) {
    $saida = "Nome: $nome<br>";
    foreach ($notas as $i => $nota) {
        $saida .= "Nota " . ($i + 1) . ": $nota<br>";
    }
    return $saida;
}

// Captura dos dados do formulário
$nome = $_POST['nome'] ?? '';
$notas = $_POST['notas'] ?? [];

if (empty($nome) || empty($notas)) {
    echo "Dados incompletos. <a href='index.html'>Voltar</a>";
    exit;
}

$media = calcularMedia($notas);
$situacao = verificarSituacao($media);
$boletim = exibirBoletim($nome, $notas);

// Exibição do resultado
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Resultado do Boletim</title>
</head>
<body>
    <h1>Resultado</h1>
    <p><?php echo $boletim; ?></p>
    <p>Média: <?php echo number_format($media, 2, ',', '.'); ?></p>
    <p>Situação: <?php echo $situacao; ?></p>
    <a href="index.html">Voltar</a>
</body>
</html>
