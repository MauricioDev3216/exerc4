<?php
$reais = $cotacao = "";
$resultado = null;
$erros = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $r = str_replace(',', '.', trim($_POST['reais'] ?? ''));
    $c = str_replace(',', '.', trim($_POST['cotacao'] ?? ''));

    $reais_val   = filter_var($r, FILTER_VALIDATE_FLOAT);
    $cotacao_val = filter_var($c, FILTER_VALIDATE_FLOAT);

    if ($reais_val === false || $reais_val < 0)   $erros[] = "Valor em Reais invalido.";
    else $reais = $reais_val;

    if ($cotacao_val === false || $cotacao_val <= 0) $erros[] = "Cotacao do Dolar invalida.";
    else $cotacao = $cotacao_val;

    if (count($erros) == 0) {
        $resultado = $reais / $cotacao;
    }
}
?>
<!DOCTYPE html><html lang="pt-br"><head><meta charset="UTF-8">
<title>Ex 01 - Conversor de Moedas</title>
<style>
  body{font-family:Arial,sans-serif;background:#f0f4f8;display:flex;justify-content:center;padding:40px 20px;}
  .card{background:#fff;border-radius:12px;box-shadow:0 4px 16px rgba(0,0,0,.08);padding:32px;width:100%;max-width:480px;}
  h2{margin:0 0 6px;color:#0056b3;}
  .back{display:inline-block;margin-bottom:20px;color:#007bff;text-decoration:none;font-size:.9em;}
  .back:hover{text-decoration:underline;}
  label{display:block;margin-top:16px;font-weight:600;color:#333;}
  input[type=text]{width:100%;padding:10px 12px;border:1px solid #ccc;border-radius:8px;margin-top:6px;font-size:1em;}
  input[type=submit]{margin-top:20px;width:100%;padding:12px;background:#007bff;color:#fff;border:none;border-radius:8px;font-size:1em;cursor:pointer;}
  input[type=submit]:hover{background:#0056b3;}
  .erro{background:#ffe8e8;border:1px solid red;color:red;padding:10px;border-radius:8px;margin-bottom:16px;}
  .resultado{background:#e8f5e9;border:1px solid #66bb6a;color:#2e7d32;padding:14px 16px;border-radius:8px;margin-bottom:16px;font-size:1.05em;}
</style></head><body>
<div class="card">
  <a class="back" href="index.php">&larr; Voltar ao inicio</a>
  <h2>Conversor de Moedas</h2>
  <p style="color:#666;margin-bottom:20px;">Informe o valor em Reais e a cotacao atual do Dolar.</p>

  <?php if ($erros): ?>
    <div class="erro"><ul><?php foreach($erros as $e) echo "<li>$e</li>"; ?></ul></div>
  <?php endif; ?>

  <?php if ($resultado !== null): ?>
    <div class="resultado">
      R$ <?= number_format($reais, 2, ',', '.') ?> &rarr;
      <strong>US$ <?= number_format($resultado, 2, ',', '.') ?></strong>
      <br><small>Cotacao usada: R$ <?= number_format($cotacao, 2, ',', '.') ?></small>
    </div>
  <?php endif; ?>

  <form method="post">
    <label>Valor em Reais (R$):</label>
    <input type="text" name="reais" placeholder="Ex: 100,00" value="<?= htmlspecialchars($reais) ?>">
    <label>Cotacao do Dolar (R$):</label>
    <input type="text" name="cotacao" placeholder="Ex: 5,12" value="<?= htmlspecialchars($cotacao) ?>">
    <input type="submit" value="Converter">
  </form>
</div>
</body></html>