<?php
$distancia = $litros = "";
$consumo = null;
$erros = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $d = str_replace(',', '.', trim($_POST['distancia'] ?? ''));
    $l = str_replace(',', '.', trim($_POST['litros'] ?? ''));

    $dist_val   = filter_var($d, FILTER_VALIDATE_FLOAT);
    $litros_val = filter_var($l, FILTER_VALIDATE_FLOAT);

    if ($dist_val === false || $dist_val <= 0)   $erros[] = "Distancia invalida.";
    else $distancia = $dist_val;

    if ($litros_val === false || $litros_val <= 0) $erros[] = "Litros invalidos.";
    else $litros = $litros_val;

    if (count($erros) == 0) {
        $consumo = $distancia / $litros;
    }
}
?>
<!DOCTYPE html><html lang="pt-br"><head><meta charset="UTF-8">
<title>Ex 03 - Consumo de Combustivel</title>
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
  <h2>Consumo de Combustivel</h2>
  <p style="color:#666;margin-bottom:20px;">Calcule quantos Km por litro o veiculo faz.</p>

  <?php if ($erros): ?>
    <div class="erro"><ul><?php foreach($erros as $e) echo "<li>$e</li>"; ?></ul></div>
  <?php endif; ?>

  <?php if ($consumo !== null): ?>
    <div class="resultado">
      Consumo medio: <strong><?= number_format($consumo, 2, ',', '.') ?> Km/L</strong>
    </div>
  <?php endif; ?>

  <form method="post">
    <label>Distancia percorrida (Km):</label>
    <input type="text" name="distancia" placeholder="Ex: 450" value="<?= htmlspecialchars($distancia) ?>">
    <label>Combustivel gasto (Litros):</label>
    <input type="text" name="litros" placeholder="Ex: 40" value="<?= htmlspecialchars($litros) ?>">
    <input type="submit" value="Calcular Consumo">
  </form>
</div>
</body></html>