<?php
$n1 = $n2 = "";
$media = $situacao = null;
$erros = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    foreach (['n1','n2'] as $campo) {
        $val = filter_var(str_replace(',','.',trim($_POST[$campo] ?? '')), FILTER_VALIDATE_FLOAT, ["options"=>["min_range"=>0,"max_range"=>10]]);
        if ($val === false) $erros[] = "Nota ".strtoupper($campo)." invalida (0 a 10).";
        else $$campo = $val;
    }
    if (count($erros) == 0) {
        $media = ($n1 + $n2) / 2;
        if ($media >= 7)      $situacao = ["label"=>"Aprovado",        "cor"=>"#2e7d32","bg"=>"#e8f5e9","borda"=>"#66bb6a"];
        elseif ($media >= 4)  $situacao = ["label"=>"Em Recuperacao",  "cor"=>"#e65100","bg"=>"#fff3e0","borda"=>"#ffb74d"];
        else                  $situacao = ["label"=>"Reprovado",        "cor"=>"#b71c1c","bg"=>"#ffebee","borda"=>"#ef9a9a"];
    }
}
?>
<!DOCTYPE html><html lang="pt-br"><head><meta charset="UTF-8">
<title>Ex 04 - Situacao do Aluno</title>
<style>
  body{font-family:Arial,sans-serif;background:#f0f4f8;display:flex;justify-content:center;padding:40px 20px;}
  .card{background:#fff;border-radius:12px;box-shadow:0 4px 16px rgba(0,0,0,.08);padding:32px;width:100%;max-width:480px;}
  h2{margin:0 0 6px;color:#0056b3;}
  .back{display:inline-block;margin-bottom:20px;color:#007bff;text-decoration:none;font-size:.9em;}
  label{display:block;margin-top:16px;font-weight:600;color:#333;}
  input[type=text]{width:100%;padding:10px 12px;border:1px solid #ccc;border-radius:8px;margin-top:6px;font-size:1em;}
  input[type=submit]{margin-top:20px;width:100%;padding:12px;background:#007bff;color:#fff;border:none;border-radius:8px;font-size:1em;cursor:pointer;}
  input[type=submit]:hover{background:#0056b3;}
  .erro{background:#ffe8e8;border:1px solid red;color:red;padding:10px;border-radius:8px;margin-bottom:16px;}
  .resultado{padding:14px 16px;border-radius:8px;margin-bottom:16px;font-size:1.05em;}
</style></head><body>
<div class="card">
  <a class="back" href="index.php">&larr; Voltar ao inicio</a>
  <h2>Situacao do Aluno</h2>
  <p style="color:#666;margin-bottom:20px;">Digite as duas notas (de 0 a 10).</p>

  <?php if ($erros): ?>
    <div class="erro"><ul><?php foreach($erros as $e) echo "<li>$e</li>"; ?></ul></div>
  <?php endif; ?>

  <?php if ($situacao !== null): ?>
    <div class="resultado" style="background:<?= $situacao['bg'] ?>;border:1px solid <?= $situacao['borda'] ?>;color:<?= $situacao['cor'] ?>;">
      Media: <strong><?= number_format($media,2,',','.') ?></strong><br>
      Situacao: <strong><?= $situacao['label'] ?></strong>
    </div>
  <?php endif; ?>

  <form method="post">
    <label>Nota 1:</label>
    <input type="text" name="n1" placeholder="0 a 10" value="<?= htmlspecialchars($n1) ?>">
    <label>Nota 2:</label>
    <input type="text" name="n2" placeholder="0 a 10" value="<?= htmlspecialchars($n2) ?>">
    <input type="submit" value="Verificar Situacao">
  </form>
</div>
</body></html>