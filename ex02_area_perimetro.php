<?php
$base = $altura = "";
$area = $perimetro = null;
$erros = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $b = str_replace(',', '.', trim($_POST['base'] ?? ''));
    $h = str_replace(',', '.', trim($_POST['altura'] ?? ''));

    $base_val   = filter_var($b, FILTER_VALIDATE_FLOAT);
    $altura_val = filter_var($h, FILTER_VALIDATE_FLOAT);

    if ($base_val === false || $base_val <= 0)   $erros[] = "Base invalida. Use um numero positivo.";
    else $base = $base_val;

    if ($altura_val === false || $altura_val <= 0) $erros[] = "Altura invalida. Use um numero positivo.";
    else $altura = $altura_val;

    if (count($erros) == 0) {
        $area      = $base * $altura;
        $perimetro = 2 * ($base + $altura);
    }
}
?>
<!DOCTYPE html><html lang="pt-br"><head><meta charset="UTF-8">
<title>Ex 02 - Area e Perimetro</title>
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
  .resultado{background:#e8f5e9;border:1px solid #66bb6a;color:#2e7d32;padding:14px 16px;border-radius:8px;margin-bottom:16px;}
</style></head><body>
<div class="card">
  <a class="back" href="index.php">&larr; Voltar ao inicio</a>
  <h2>Calculadora de Area e Perimetro</h2>
  <p style="color:#666;margin-bottom:20px;">Informe as dimensoes do retangulo em metros.</p>

  <?php if ($erros): ?>
    <div class="erro"><ul><?php foreach($erros as $e) echo "<li>$e</li>"; ?></ul></div>
  <?php endif; ?>

  <?php if ($area !== null): ?>
    <div class="resultado">
      Area: <strong><?= number_format($area, 2, ',', '.') ?> m&sup2;</strong><br>
      Perimetro: <strong><?= number_format($perimetro, 2, ',', '.') ?> m</strong>
    </div>
  <?php endif; ?>

  <form method="post">
    <label>Base (m):</label>
    <input type="text" name="base" placeholder="Ex: 5,00" value="<?= htmlspecialchars($base) ?>">
    <label>Altura (m):</label>
    <input type="text" name="altura" placeholder="Ex: 3,00" value="<?= htmlspecialchars($altura) ?>">
    <input type="submit" value="Calcular">
  </form>
</div>
</body></html>