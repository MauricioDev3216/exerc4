<?php
$ano_nasc = "";
$idade = $situacao = null;
$erros = [];
$ano_atual = (int)date('Y');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $val = filter_var(trim($_POST['ano_nasc'] ?? ''), FILTER_VALIDATE_INT,
           ["options"=>["min_range"=>1900,"max_range"=>$ano_atual]]);
    if ($val === false) $erros[] = "Ano de nascimento invalido.";
    else {
        $ano_nasc = $val;
        $idade = $ano_atual - $ano_nasc;
        if ($idade < 16)                       $situacao = ["label"=>"Nao pode votar",     "cor"=>"#b71c1c","bg"=>"#ffebee","borda"=>"#ef9a9a"];
        elseif ($idade < 18 || $idade >= 70)   $situacao = ["label"=>"Voto Facultativo",   "cor"=>"#e65100","bg"=>"#fff3e0","borda"=>"#ffb74d"];
        else                                   $situacao = ["label"=>"Voto Obrigatorio",   "cor"=>"#2e7d32","bg"=>"#e8f5e9","borda"=>"#66bb6a"];
    }
}
?>
<!DOCTYPE html><html lang="pt-br"><head><meta charset="UTF-8">
<title>Ex 05 - Verificador de Idade</title>
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
  .resultado{padding:14px 16px;border-radius:8px;margin-bottom:16px;}
</style></head><body>
<div class="card">
  <a class="back" href="index.php">&larr; Voltar ao inicio</a>
  <h2>Verificador de Idade (Votacao)</h2>
  <p style="color:#666;margin-bottom:20px;">Digite o ano de nascimento.</p>

  <?php if ($erros): ?>
    <div class="erro"><ul><?php foreach($erros as $e) echo "<li>$e</li>"; ?></ul></div>
  <?php endif; ?>

  <?php if ($situacao !== null): ?>
    <div class="resultado" style="background:<?= $situacao['bg'] ?>;border:1px solid <?= $situacao['borda'] ?>;color:<?= $situacao['cor'] ?>;">
      Idade: <strong><?= $idade ?> anos</strong><br>
      Situacao: <strong><?= $situacao['label'] ?></strong>
    </div>
  <?php endif; ?>

  <form method="post">
    <label>Ano de Nascimento:</label>
    <input type="text" name="ano_nasc" placeholder="Ex: 2000" value="<?= htmlspecialchars($ano_nasc) ?>">
    <input type="submit" value="Verificar">
  </form>
</div>
</body></html>