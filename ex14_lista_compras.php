<?php
$selecionados = [];
$submetido = false;

$itens_disponiveis = ["Arroz","Feijao","Leite","Ovos","Pao","Manteiga","Cafe","Acucar","Macarrao","Oleo"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $submetido = true;
    $selecionados = $_POST['itens'] ?? [];
    // sanitize
    $selecionados = array_filter($selecionados, fn($v) => in_array($v, $itens_disponiveis));
}
?>
<!DOCTYPE html><html lang="pt-br"><head><meta charset="UTF-8">
<title>Ex 14 - Lista de Compras</title>
<style>
  body{font-family:Arial,sans-serif;background:#f0f4f8;display:flex;justify-content:center;padding:40px 20px;}
  .card{background:#fff;border-radius:12px;box-shadow:0 4px 16px rgba(0,0,0,.08);padding:32px;width:100%;max-width:480px;}
  h2{margin:0 0 6px;color:#0056b3;}
  .back{display:inline-block;margin-bottom:20px;color:#007bff;text-decoration:none;font-size:.9em;}
  .grid-check{display:grid;grid-template-columns:1fr 1fr;gap:10px;margin-top:14px;}
  .check-item{display:flex;align-items:center;gap:8px;padding:10px 12px;border:1px solid #ddd;border-radius:8px;cursor:pointer;transition:.15s;}
  .check-item:hover{background:#f0f7ff;border-color:#007bff;}
  .check-item input{width:18px;height:18px;cursor:pointer;}
  input[type=submit]{margin-top:20px;width:100%;padding:12px;background:#e67e22;color:#fff;border:none;border-radius:8px;font-size:1em;cursor:pointer;}
  input[type=submit]:hover{background:#d35400;}
  .resultado{background:#fff3e0;border:1px solid #ffb74d;color:#e65100;padding:14px 16px;border-radius:8px;margin-bottom:16px;}
  .resultado ul{margin:8px 0 0;padding-left:20px;}
  .vazio{color:#999;font-style:italic;}
</style></head><body>
<div class="card">
  <a class="back" href="index.php">&larr; Voltar ao inicio</a>
  <h2>Lista de Compras</h2>
  <p style="color:#666;margin-bottom:6px;">Marque os itens que deseja comprar.</p>

  <?php if ($submetido): ?>
    <div class="resultado">
      <strong>Itens selecionados:</strong>
      <?php if (empty($selecionados)): ?>
        <p class="vazio">Nenhum item selecionado.</p>
      <?php else: ?>
        <ul>
          <?php foreach ($selecionados as $item): ?>
            <li><?= htmlspecialchars($item) ?></li>
          <?php endforeach; ?>
        </ul>
      <?php endif; ?>
    </div>
  <?php endif; ?>

  <form method="post">
    <div class="grid-check">
      <?php foreach ($itens_disponiveis as $item): ?>
        <label class="check-item">
          <input type="checkbox" name="itens[]" value="<?= $item ?>"
            <?= in_array($item, $selecionados) ? 'checked' : '' ?>>
          <?= $item ?>
        </label>
      <?php endforeach; ?>
    </div>
    <input type="submit" value="Ver Lista">
  </form>
</div>
</body></html>