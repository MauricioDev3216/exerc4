<?php
$mes = "";
$resultado = null;
$erros = [];
$meses = [1=>"Janeiro",2=>"Fevereiro",3=>"Marco",4=>"Abril",5=>"Maio",6=>"Junho",
          7=>"Julho",8=>"Agosto",9=>"Setembro",10=>"Outubro",11=>"Novembro",12=>"Dezembro"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $val = filter_var(trim($_POST['mes'] ?? ''), FILTER_VALIDATE_INT,
           ["options"=>["min_range"=>1,"max_range"=>12]]);
    if ($val === false) $erros[] = "Selecione um mes valido (1 a 12).";
    else { $mes = $val; $resultado = $meses[$mes]; }
}
?>
<!DOCTYPE html><html lang="pt-br"><head><meta charset="UTF-8">
<title>Ex 09 - Mes por Extenso</title>
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
  <h2>Mes por Extenso</h2>

  <?php if ($erros): ?>
    <div class="erro"><ul><?php foreach($erros as $e) echo "<li>$e</li>"; ?></ul></div>
  <?php endif; ?>

  <?php if ($resultado !== null): ?>
    <div class="resultado">
      Mes <strong><?= $mes ?></strong> &rarr; <strong><?= $resultado ?></strong>
    </div>
  <?php endif; ?>

  <form method="post">
    <label>Numero do Mes:</label>
    <select name="mes">
      <option value="">Selecione...</option>
      <?php foreach($meses as $num => $nome): ?>
        <option value="<?= $num ?>" <?= ($mes == $num)?'selected':'' ?>><?= $num ?> - <?= $nome ?></option>
      <?php endforeach; ?>
    </select>
    <input type="submit" value="Mostrar Mes">
  </form>
</div>
</body></html>