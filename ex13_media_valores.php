<?php
$notas = ["","","","",""];
$media = null;
$erros = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $notas_post = $_POST['notas'] ?? [];
    $notas_validas = [];
    foreach ($notas_post as $i => $n) {
        $val = filter_var(str_replace(',','.',trim($n)), FILTER_VALIDATE_FLOAT,
               ["options"=>["min_range"=>0,"max_range"=>10]]);
        if ($val === false) $erros[] = "Nota " . ($i+1) . " invalida (0 a 10).";
        else { $notas_validas[] = $val; $notas[$i] = $val; }
    }
    if (count($erros) == 0) {
        $media = array_sum($notas_validas) / count($notas_validas);
    }
}
?>
<!DOCTYPE html><html lang="pt-br"><head><meta charset="UTF-8">
<title>Ex 13 - Media de Valores</title>
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
  .resultado{background:#fff3e0;border:1px solid #ffb74d;color:#e65100;padding:14px 16px;border-radius:8px;margin-bottom:16px;font-size:1.1em;}
</style></head><body>
<div class="card">
  <a class="back" href="index.php">&larr; Voltar ao inicio</a>
  <h2>Media de 5 Valores</h2>
  <p style="color:#666;margin-bottom:20px;">Digite 5 notas (de 0 a 10).</p>

  <?php if ($erros): ?>
    <div class="erro"><ul><?php foreach($erros as $e) echo "<li>$e</li>"; ?></ul></div>
  <?php endif; ?>

  <?php if ($media !== null): ?>
    <div class="resultado">
      Media das notas: <strong><?= number_format($media, 2, ',', '.') ?></strong>
    </div>
  <?php endif; ?>

  <form method="post">
    <?php for ($i = 0; $i < 5; $i++): ?>
      <label>Nota <?= $i+1 ?>:</label>
      <input type="text" name="notas[]" placeholder="0 a 10" value="<?= htmlspecialchars($notas[$i]) ?>">
    <?php endfor; ?>
    <input type="submit" value="Calcular Media">
  </form>
</div>
</body></html>