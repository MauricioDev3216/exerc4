<?php
$dia = "";
$resultado = null;
$erros = [];
$dias = [1=>"Domingo",2=>"Segunda-feira",3=>"Terca-feira",4=>"Quarta-feira",
         5=>"Quinta-feira",6=>"Sexta-feira",7=>"Sabado"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $val = filter_var(trim($_POST['dia'] ?? ''), FILTER_VALIDATE_INT,
           ["options"=>["min_range"=>1,"max_range"=>7]]);
    if ($val === false) $erros[] = "Selecione um numero de 1 a 7.";
    else {
        $dia = $val;
        $resultado = $dias[$dia];
    }
}
?>
<!DOCTYPE html><html lang="pt-br"><head><meta charset="UTF-8">
<title>Ex 07 - Dia da Semana</title>
<style>
  body{font-family:Arial,sans-serif;background:#f0f4f8;display:flex;justify-content:center;padding:40px 20px;}
  .card{background:#fff;border-radius:12px;box-shadow:0 4px 16px rgba(0,0,0,.08);padding:32px;width:100%;max-width:480px;}
  h2{margin:0 0 6px;color:#0056b3;}
  .back{display:inline-block;margin-bottom:20px;color:#007bff;text-decoration:none;font-size:.9em;}
  label{display:block;margin-top:16px;font-weight:600;color:#333;}
  select{width:100%;padding:10px 12px;border:1px solid #ccc;border-radius:8px;margin-top:6px;font-size:1em;}
  input[type=submit]{margin-top:20px;width:100%;padding:12px;background:#007bff;color:#fff;border:none;border-radius:8px;font-size:1em;cursor:pointer;}
  input[type=submit]:hover{background:#0056b3;}
  .erro{background:#ffe8e8;border:1px solid red;color:red;padding:10px;border-radius:8px;margin-bottom:16px;}
  .resultado{background:#e8f5e9;border:1px solid #66bb6a;color:#2e7d32;padding:14px 16px;border-radius:8px;margin-bottom:16px;font-size:1.1em;}
</style></head><body>
<div class="card">
  <a class="back" href="index.php">&larr; Voltar ao inicio</a>
  <h2>Dia da Semana</h2>
  <p style="color:#666;margin-bottom:20px;">Selecione o numero do dia.</p>

  <?php if ($erros): ?>
    <div class="erro"><ul><?php foreach($erros as $e) echo "<li>$e</li>"; ?></ul></div>
  <?php endif; ?>

  <?php if ($resultado !== null): ?>
    <div class="resultado">
      Dia <strong><?= $dia ?></strong> &rarr; <strong><?= $resultado ?></strong>
    </div>
  <?php endif; ?>

  <form method="post">
    <label>Numero do Dia:</label>
    <select name="dia">
      <option value="">Selecione...</option>
      <?php foreach($dias as $num => $nome): ?>
        <option value="<?= $num ?>" <?= ($dia == $num) ? 'selected' : '' ?>><?= $num ?> - <?= $nome ?></option>
      <?php endforeach; ?>
    </select>
    <input type="submit" value="Mostrar Dia">
  </form>
</div>
</body></html>