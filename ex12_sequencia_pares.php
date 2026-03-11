<?php
$inicio = $fim = "";
$pares = null;
$erros = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $vi = filter_var(trim($_POST['inicio'] ?? ''), FILTER_VALIDATE_INT);
    $vf = filter_var(trim($_POST['fim'] ?? ''), FILTER_VALIDATE_INT);

    if ($vi === false) $erros[] = "Numero inicial invalido.";
    else $inicio = $vi;
    if ($vf === false) $erros[] = "Numero final invalido.";
    else $fim = $vf;

    if (count($erros) == 0) {
        if ($inicio > $fim) $erros[] = "O numero inicial deve ser menor que o final.";
        else {
            $pares = [];
            for ($i = $inicio; $i <= $fim; $i++) {
                if ($i % 2 == 0) $pares[] = $i;
            }
        }
    }
}
?>
<!DOCTYPE html><html lang="pt-br"><head><meta charset="UTF-8">
<title>Ex 12 - Sequencia de Pares</title>
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
  .resultado{background:#e8f5e9;border:1px solid #66bb6a;color:#2e7d32;padding:14px 16px;border-radius:8px;margin-bottom:16px;word-break:break-all;}
</style></head><body>
<div class="card">
  <a class="back" href="index.php">&larr; Voltar ao inicio</a>
  <h2>Sequencia de Pares</h2>
  <p style="color:#666;margin-bottom:20px;">Exibe os numeros pares dentro do intervalo.</p>

  <?php if ($erros): ?>
    <div class="erro"><ul><?php foreach($erros as $e) echo "<li>$e</li>"; ?></ul></div>
  <?php endif; ?>

  <?php if ($pares !== null): ?>
    <div class="resultado">
      <?php if (empty($pares)): ?>
        Nenhum numero par encontrado no intervalo.
      <?php else: ?>
        Pares entre <strong><?= $inicio ?></strong> e <strong><?= $fim ?></strong>:<br>
        <strong><?= implode(", ", $pares) ?></strong>
      <?php endif; ?>
    </div>
  <?php endif; ?>

  <form method="post">
    <label>Numero Inicial:</label>
    <input type="text" name="inicio" placeholder="Ex: 5" value="<?= htmlspecialchars($inicio) ?>">
    <label>Numero Final:</label>
    <input type="text" name="fim" placeholder="Ex: 20" value="<?= htmlspecialchars($fim) ?>">
    <input type="submit" value="Listar Pares">
  </form>
</div>
</body></html>