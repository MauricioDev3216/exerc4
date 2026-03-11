<?php
$numero = "";
$resultado = null;
$erros = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $val = filter_var(trim($_POST['numero'] ?? ''), FILTER_VALIDATE_INT,
           ["options"=>["min_range"=>1,"max_range"=>10000]]);
    if ($val === false) $erros[] = "Digite um inteiro positivo (1 a 10000).";
    else {
        $numero = $val;
        $soma = 0;
        for ($i = 1; $i <= $numero; $i++) { $soma += $i; }
        $resultado = $soma;
    }
}
?>
<!DOCTYPE html><html lang="pt-br"><head><meta charset="UTF-8">
<title>Ex 11 - Somatorio</title>
<style>
  body{font-family:Arial,sans-serif;background:#f0f4f8;display:flex;justify-content:center;padding:40px 20px;}
  .card{background:#fff;border-radius:12px;box-shadow:0 4px 16px rgba(0,0,0,.08);padding:32px;width:100%;max-width:480px;}
  h2{margin:0 0 6px;color:#0056b3;}
  .back{display:inline-block;margin-bottom:20px;color:#007bff;text-decoration:none;font-size:.9em;}
  label{display:block;margin-top:16px;font-weight:600;color:#333;}
  input[type=text]{width:100%;padding:10px 12px;border:1px solid #ccc;border-radius:8px;margin-top:6px;font-size:1em;}
  input[type=submit]{margin-top:20px;width:100%;padding:12px;background:#28a745;color:#fff;border:none;border-radius:8px;font-size:1em;cursor:pointer;}
  input[type=submit]:hover{background:#1e7e34;}
  .erro{background:#ffe8e8;border:1px solid red;color:red;padding:10px;border-radius:8px;margin-bottom:16px;}
  .resultado{background:#e8f5e9;border:1px solid #66bb6a;color:#2e7d32;padding:14px 16px;border-radius:8px;margin-bottom:16px;font-size:1.05em;}
</style></head><body>
<div class="card">
  <a class="back" href="index.php">&larr; Voltar ao inicio</a>
  <h2>Somatorio de 1 ate N</h2>

  <?php if ($erros): ?>
    <div class="erro"><ul><?php foreach($erros as $e) echo "<li>$e</li>"; ?></ul></div>
  <?php endif; ?>

  <?php if ($resultado !== null): ?>
    <div class="resultado">
      A soma dos numeros de 1 a <strong><?= $numero ?></strong> e: <strong><?= number_format($resultado,0,'','.') ?></strong>
    </div>
  <?php endif; ?>

  <form method="post">
    <label>Numero (N):</label>
    <input type="text" name="numero" placeholder="Ex: 100" value="<?= htmlspecialchars($numero) ?>">
    <input type="submit" value="Calcular Somatorio">
  </form>
</div>
</body></html>