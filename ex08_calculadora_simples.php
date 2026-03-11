<?php
$n1 = $n2 = $op = "";
$resultado = null;
$erros = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $v1 = filter_var(str_replace(',','.',trim($_POST['n1'] ?? '')), FILTER_VALIDATE_FLOAT);
    $v2 = filter_var(str_replace(',','.',trim($_POST['n2'] ?? '')), FILTER_VALIDATE_FLOAT);
    $op = trim($_POST['operacao'] ?? '');

    if ($v1 === false) $erros[] = "Numero 1 invalido.";
    else $n1 = $v1;

    if ($v2 === false) $erros[] = "Numero 2 invalido.";
    else $n2 = $v2;

    if (!in_array($op, ['somar','subtrair','multiplicar','dividir'])) $erros[] = "Selecione uma operacao.";

    if (count($erros) == 0) {
        switch ($op) {
            case 'somar':       $resultado = $n1 + $n2; $simbolo = "+"; break;
            case 'subtrair':    $resultado = $n1 - $n2; $simbolo = "-"; break;
            case 'multiplicar': $resultado = $n1 * $n2; $simbolo = "x"; break;
            case 'dividir':
                if ($n2 == 0) { $erros[] = "Divisao por zero nao e permitida."; }
                else { $resultado = $n1 / $n2; $simbolo = "/"; }
                break;
        }
    }
}
?>
<!DOCTYPE html><html lang="pt-br"><head><meta charset="UTF-8">
<title>Ex 08 - Calculadora Simples</title>
<style>
  body{font-family:Arial,sans-serif;background:#f0f4f8;display:flex;justify-content:center;padding:40px 20px;}
  .card{background:#fff;border-radius:12px;box-shadow:0 4px 16px rgba(0,0,0,.08);padding:32px;width:100%;max-width:480px;}
  h2{margin:0 0 6px;color:#0056b3;}
  .back{display:inline-block;margin-bottom:20px;color:#007bff;text-decoration:none;font-size:.9em;}
  label{display:block;margin-top:16px;font-weight:600;color:#333;}
  input[type=text],select{width:100%;padding:10px 12px;border:1px solid #ccc;border-radius:8px;margin-top:6px;font-size:1em;}
  input[type=submit]{margin-top:20px;width:100%;padding:12px;background:#007bff;color:#fff;border:none;border-radius:8px;font-size:1em;cursor:pointer;}
  input[type=submit]:hover{background:#0056b3;}
  .erro{background:#ffe8e8;border:1px solid red;color:red;padding:10px;border-radius:8px;margin-bottom:16px;}
  .resultado{background:#e8f5e9;border:1px solid #66bb6a;color:#2e7d32;padding:14px 16px;border-radius:8px;margin-bottom:16px;font-size:1.1em;}
</style></head><body>
<div class="card">
  <a class="back" href="index.php">&larr; Voltar ao inicio</a>
  <h2>Calculadora Simples</h2>

  <?php if ($erros): ?>
    <div class="erro"><ul><?php foreach($erros as $e) echo "<li>$e</li>"; ?></ul></div>
  <?php endif; ?>

  <?php if ($resultado !== null): ?>
    <div class="resultado">
      <?= number_format($n1,2,',','.') ?> <?= $simbolo ?> <?= number_format($n2,2,',','.') ?> =
      <strong><?= number_format($resultado,2,',','.') ?></strong>
    </div>
  <?php endif; ?>

  <form method="post">
    <label>Numero 1:</label>
    <input type="text" name="n1" placeholder="Ex: 10" value="<?= htmlspecialchars($n1) ?>">
    <label>Numero 2:</label>
    <input type="text" name="n2" placeholder="Ex: 5" value="<?= htmlspecialchars($n2) ?>">
    <label>Operacao:</label>
    <select name="operacao">
      <option value="">Selecione...</option>
      <option value="somar"       <?= $op=='somar'?'selected':'' ?>>Somar (+)</option>
      <option value="subtrair"    <?= $op=='subtrair'?'selected':'' ?>>Subtrair (-)</option>
      <option value="multiplicar" <?= $op=='multiplicar'?'selected':'' ?>>Multiplicar (x)</option>
      <option value="dividir"     <?= $op=='dividir'?'selected':'' ?>>Dividir (/)</option>
    </select>
    <input type="submit" value="Calcular">
  </form>
</div>
</body></html>