<?php
$nums = ["","","","",""];
$maior = $menor = null;
$erros = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nums_post = $_POST['numeros'] ?? [];
    $validos = [];
    foreach ($nums_post as $i => $n) {
        $val = filter_var(str_replace(',','.',trim($n)), FILTER_VALIDATE_FLOAT);
        if ($val === false) $erros[] = "Numero " . ($i+1) . " invalido.";
        else { $validos[] = $val; $nums[$i] = $val; }
    }
    if (count($erros) == 0) {
        $maior = $validos[0]; $menor = $validos[0];
        foreach ($validos as $v) {
            if ($v > $maior) $maior = $v;
            if ($v < $menor) $menor = $v;
        }
    }
}
?>
<!DOCTYPE html><html lang="pt-br"><head><meta charset="UTF-8">
<title>Ex 15 - Menor e Maior</title>
<style>
  body{font-family:Arial,sans-serif;background:#f0f4f8;display:flex;justify-content:center;padding:40px 20px;}
  .card{background:#fff;border-radius:12px;box-shadow:0 4px 16px rgba(0,0,0,.08);padding:32px;width:100%;max-width:480px;}
  h2{margin:0 0 6px;color:#0056b3;}
  .back{display:inline-block;margin-bottom:20px;color:#007bff;text-decoration:none;font-size:.9em;}
  label{display:block;margin-top:16px;font-weight:600;color:#333;}
  input[type=text]{width:100%;padding:10px 12px;border:1px solid #ccc;border-radius:8px;margin-top:6px;font-size:1em;}
  input[type=submit]{margin-top:20px;width:100%;padding:12px;background:#e67e22;color:#fff;border:none;border-radius:8px;font-size:1em;cursor:pointer;}
  input[type=submit]:hover{background:#d35400;}
  .erro{background:#ffe8e8;border:1px solid red;color:red;padding:10px;border-radius:8px;margin-bottom:16px;}
  .resultado{background:#fff3e0;border:1px solid #ffb74d;color:#e65100;padding:14px 16px;border-radius:8px;margin-bottom:16px;font-size:1.05em;}
</style></head><body>
<div class="card">
  <a class="back" href="index.php">&larr; Voltar ao inicio</a>
  <h2>Menor e Maior Valor</h2>
  <p style="color:#666;margin-bottom:20px;">Digite 5 numeros quaisquer.</p>

  <?php if ($erros): ?>
    <div class="erro"><ul><?php foreach($erros as $e) echo "<li>$e</li>"; ?></ul></div>
  <?php endif; ?>

  <?php if ($maior !== null): ?>
    <div class="resultado">
      Maior numero: <strong><?= number_format($maior, 2, ',', '.') ?></strong><br>
      Menor numero: <strong><?= number_format($menor, 2, ',', '.') ?></strong>
    </div>
  <?php endif; ?>

  <form method="post">
    <?php for ($i = 0; $i < 5; $i++): ?>
      <label>Numero <?= $i+1 ?>:</label>
      <input type="text" name="numeros[]" placeholder="Ex: 42" value="<?= htmlspecialchars($nums[$i]) ?>">
    <?php endfor; ?>
    <input type="submit" value="Encontrar Menor e Maior">
  </form>
</div>
</body></html>