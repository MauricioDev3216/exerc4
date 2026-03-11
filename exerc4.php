<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados dos Exercícios de PHP</title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            line-height: 1.6;
            background-color: #f8f9fa;
            color: #212529;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
            overflow: hidden;
        }
        h1 {
            background-color: #007bff;
            color: white;
            padding: 20px;
            margin: 0;
            text-align: center;
        }
        .bloco-titulo {
            background-color: #343a40;
            color: #f8f9fa;
            padding: 12px 20px;
            margin: 0;
            font-size: 1.1em;
            letter-spacing: 1px;
        }
        .exercicio {
            padding: 20px;
            border-bottom: 1px solid #dee2e6;
        }
        .exercicio:last-child {
            border-bottom: none;
        }
        .exercicio h3 {
            margin-top: 0;
            color: #0056b3;
            border-bottom: 2px solid #007bff;
            padding-bottom: 5px;
        }
        .resultado {
            background-color: #e9f5ff;
            border: 1px solid #b3d7ff;
            padding: 10px 15px;
            border-radius: 4px;
            margin-top: 10px;
        }
        .resultado strong {
            color: #004a99;
        }
        code {
            background-color: #e8e8e8;
            padding: 2px 5px;
            border-radius: 3px;
        }
        ul, ol {
            padding-left: 20px;
        }
        li {
            margin-bottom: 3px;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Resultados dos Exercícios de PHP</h1>

    <?php

    // ====================================================
    // BLOCO 1 - SEQUENCIAIS (VARIAVEIS E OPERADORES)
    // ====================================================
    echo "<h2 class='bloco-titulo'>Bloco 1 - Sequenciais (Variaveis e Operadores)</h2>";

    // ----------------------------------------------------
    // Exercicio 1 - Soma
    echo "<div class='exercicio'>";
    echo "<h3>Exercicio 1 - Soma</h3>";
    $num_a = 38;
    $num_b = 57;
    $soma = $num_a + $num_b;
    echo "<p>Valores: <code>$num_a</code> e <code>$num_b</code></p>";
    echo "<div class='resultado'>A soma e: <strong>$soma</strong></div>";
    echo "</div>";

    // ----------------------------------------------------
    // Exercicio 2 - Media Aritmetica
    echo "<div class='exercicio'>";
    echo "<h3>Exercicio 2 - Media Aritmetica</h3>";
    $nota1 = 8.5;
    $nota2 = 7.0;
    $nota3 = 9.0;
    $media = ($nota1 + $nota2 + $nota3) / 3;
    $media_fmt = number_format($media, 2, ',', '.');
    echo "<p>Notas: <code>$nota1</code>, <code>$nota2</code>, <code>$nota3</code></p>";
    echo "<div class='resultado'>A media aritmetica e: <strong>$media_fmt</strong></div>";
    echo "</div>";

    // ----------------------------------------------------
    // Exercicio 3 - Metros para Centimetros
    echo "<div class='exercicio'>";
    echo "<h3>Exercicio 3 - Metros para Centimetros</h3>";
    $metros = 3.75;
    $centimetros = $metros * 100;
    echo "<p>Valor em metros: <code>$metros m</code></p>";
    echo "<div class='resultado'><strong>$metros m</strong> equivalem a <strong>$centimetros cm</strong></div>";
    echo "</div>";

    // ----------------------------------------------------
    // Exercicio 4 - Area do Retangulo
    echo "<div class='exercicio'>";
    echo "<h3>Exercicio 4 - Area do Retangulo</h3>";
    $base = 12;
    $altura = 5;
    $area = $base * $altura;
    echo "<p>Base: <code>$base</code> | Altura: <code>$altura</code></p>";
    echo "<div class='resultado'>A area do retangulo e: <strong>$area m2</strong></div>";
    echo "</div>";

    // ====================================================
    // BLOCO 2 - CONDICIONAIS (IF / ELSE)
    // ====================================================
    echo "<h2 class='bloco-titulo'>Bloco 2 - Condicionais (If / Else)</h2>";

    // ----------------------------------------------------
    // Exercicio 5 - Positivo ou Negativo
    echo "<div class='exercicio'>";
    echo "<h3>Exercicio 5 - Positivo, Negativo ou Zero</h3>";
    $numero5 = -8;
    echo "<p>Numero: <code>$numero5</code></p>";
    if ($numero5 > 0) {
        $resultado5 = "Positivo";
    } elseif ($numero5 < 0) {
        $resultado5 = "Negativo";
    } else {
        $resultado5 = "Zero";
    }
    echo "<div class='resultado'>O numero e: <strong>$resultado5</strong></div>";
    echo "</div>";

    // ----------------------------------------------------
    // Exercicio 6 - Maioridade
    echo "<div class='exercicio'>";
    echo "<h3>Exercicio 6 - Verificacao de Maioridade</h3>";
    $idade6 = 16;
    echo "<p>Idade: <code>$idade6 anos</code></p>";
    if ($idade6 >= 18) {
        $resultado6 = "Maior de idade";
    } else {
        $resultado6 = "Menor de idade";
    }
    echo "<div class='resultado'>Situacao: <strong>$resultado6</strong></div>";
    echo "</div>";

    // ----------------------------------------------------
    // Exercicio 7 - Aprovacao
    echo "<div class='exercicio'>";
    echo "<h3>Exercicio 7 - Situacao do Aluno</h3>";
    $media7 = 5.8;
    echo "<p>Media final: <code>$media7</code></p>";
    if ($media7 >= 6.0) {
        $resultado7 = "Aprovado";
    } else {
        $resultado7 = "Reprovado";
    }
    echo "<div class='resultado'>Situacao: <strong>$resultado7</strong></div>";
    echo "</div>";

    // ----------------------------------------------------
    // Exercicio 8 - Maior de Dois
    echo "<div class='exercicio'>";
    echo "<h3>Exercicio 8 - Maior de Dois Numeros</h3>";
    $x = 42;
    $y = 99;
    echo "<p>Numeros: <code>$x</code> e <code>$y</code></p>";
    if ($x > $y) {
        $resultado8 = $x;
    } else {
        $resultado8 = $y;
    }
    echo "<div class='resultado'>O maior numero e: <strong>$resultado8</strong></div>";
    echo "</div>";

    // ====================================================
    // BLOCO 3 - CONDICIONAIS (SWITCH CASE)
    // ====================================================
    echo "<h2 class='bloco-titulo'>Bloco 3 - Condicionais (Switch / Case)</h2>";

    // ----------------------------------------------------
    // Exercicio 9 - Dia da Semana
    echo "<div class='exercicio'>";
    echo "<h3>Exercicio 9 - Dia da Semana</h3>";
    $dia9 = 4;
    echo "<p>Numero do dia: <code>$dia9</code></p>";
    switch ($dia9) {
        case 1: $nomeDia = "Domingo";       break;
        case 2: $nomeDia = "Segunda-feira"; break;
        case 3: $nomeDia = "Terca-feira";   break;
        case 4: $nomeDia = "Quarta-feira";  break;
        case 5: $nomeDia = "Quinta-feira";  break;
        case 6: $nomeDia = "Sexta-feira";   break;
        case 7: $nomeDia = "Sabado";        break;
        default: $nomeDia = "Dia invalido";
    }
    echo "<div class='resultado'>Dia da semana: <strong>$nomeDia</strong></div>";
    echo "</div>";

    // ----------------------------------------------------
    // Exercicio 10 - Vogal ou Consoante
    echo "<div class='exercicio'>";
    echo "<h3>Exercicio 10 - Vogal ou Consoante</h3>";
    $letra10 = "E";
    $letra_lower = strtolower($letra10);
    echo "<p>Letra: <code>$letra10</code></p>";
    switch ($letra_lower) {
        case 'a':
        case 'e':
        case 'i':
        case 'o':
        case 'u':
            $resultado10 = "Vogal";
            break;
        default:
            $resultado10 = "Consoante";
    }
    echo "<div class='resultado'>A letra \"$letra10\" e uma: <strong>$resultado10</strong></div>";
    echo "</div>";

    // ----------------------------------------------------
    // Exercicio 11 - Status do Pedido
    echo "<div class='exercicio'>";
    echo "<h3>Exercicio 11 - Status do Pedido</h3>";
    $status11 = "em_preparacao";
    echo "<p>Status: <code>$status11</code></p>";
    switch ($status11) {
        case 'aguardando':
            $msg11 = "Seu pedido esta aguardando confirmacao.";
            break;
        case 'em_preparacao':
            $msg11 = "Seu pedido esta sendo preparado.";
            break;
        case 'enviado':
            $msg11 = "Seu pedido foi enviado e esta a caminho!";
            break;
        case 'concluido':
            $msg11 = "Seu pedido foi entregue com sucesso!";
            break;
        default:
            $msg11 = "Status desconhecido.";
    }
    echo "<div class='resultado'><strong>$msg11</strong></div>";
    echo "</div>";

    // ====================================================
    // BLOCO 4 - LACOS DE REPETICAO (FOR)
    // ====================================================
    echo "<h2 class='bloco-titulo'>Bloco 4 - Lacos de Repeticao (For)</h2>";

    // ----------------------------------------------------
    // Exercicio 12 - Contagem 1 a 10
    echo "<div class='exercicio'>";
    echo "<h3>Exercicio 12 - Contagem de 1 a 10</h3>";
    echo "<div class='resultado'>";
    for ($i = 1; $i <= 10; $i++) {
        echo "<strong>$i</strong> ";
    }
    echo "</div>";
    echo "</div>";

    // ----------------------------------------------------
    // Exercicio 13 - Pares de 1 a 20
    echo "<div class='exercicio'>";
    echo "<h3>Exercicio 13 - Numeros Pares de 1 a 20</h3>";
    echo "<div class='resultado'>";
    for ($i = 1; $i <= 20; $i++) {
        if ($i % 2 == 0) {
            echo "<strong>$i</strong> ";
        }
    }
    echo "</div>";
    echo "</div>";

    // ----------------------------------------------------
    // Exercicio 14 - Tabuada
    echo "<div class='exercicio'>";
    echo "<h3>Exercicio 14 - Tabuada</h3>";
    $num14 = 7;
    echo "<p>Tabuada do numero: <code>$num14</code></p>";
    echo "<div class='resultado'><ul>";
    for ($i = 1; $i <= 10; $i++) {
        $res14 = $num14 * $i;
        echo "<li>$num14 x $i = <strong>$res14</strong></li>";
    }
    echo "</ul></div>";
    echo "</div>";

    // ====================================================
    // BLOCO 5 - LACOS DE REPETICAO (WHILE)
    // ====================================================
    echo "<h2 class='bloco-titulo'>Bloco 5 - Lacos de Repeticao (While)</h2>";

    // ----------------------------------------------------
    // Exercicio 15 - Contagem Regressiva
    echo "<div class='exercicio'>";
    echo "<h3>Exercicio 15 - Contagem Regressiva</h3>";
    echo "<div class='resultado'>";
    $i15 = 10;
    while ($i15 >= 1) {
        echo "<strong>$i15</strong> ";
        $i15--;
    }
    echo "</div>";
    echo "</div>";

    // ----------------------------------------------------
    // Exercicio 16 - Soma ate 100
    echo "<div class='exercicio'>";
    echo "<h3>Exercicio 16 - Soma de 1 ate 100</h3>";
    $soma16 = 0;
    $i16 = 1;
    while ($i16 <= 100) {
        $soma16 += $i16;
        $i16++;
    }
    echo "<div class='resultado'>A soma de todos os numeros de 1 a 100 e: <strong>$soma16</strong></div>";
    echo "</div>";

    // ====================================================
    // BLOCO 6 - LACOS DE REPETICAO (DO WHILE)
    // ====================================================
    echo "<h2 class='bloco-titulo'>Bloco 6 - Lacos de Repeticao (Do While)</h2>";

    // ----------------------------------------------------
    // Exercicio 17 - Sorteio Simples
    echo "<div class='exercicio'>";
    echo "<h3>Exercicio 17 - Sorteio Simples (Do While)</h3>";
    $tentativas = 0;
    do {
        $sorteio = rand(1, 10);
        $tentativas++;
    } while ($sorteio != 5);
    echo "<div class='resultado'>";
    echo "O numero 5 foi sorteado apos <strong>$tentativas tentativa(s)</strong>!";
    echo "</div>";
    echo "</div>";

    // ====================================================
    // BLOCO 7 - ARRAYS (VETORES)
    // ====================================================
    echo "<h2 class='bloco-titulo'>Bloco 7 - Arrays (Vetores)</h2>";

    // ----------------------------------------------------
    // Exercicio 18 - Lista de Frutas
    echo "<div class='exercicio'>";
    echo "<h3>Exercicio 18 - Lista de Frutas</h3>";
    $frutas = ["Maca", "Banana", "Manga", "Uva", "Morango"];
    echo "<div class='resultado'><ul>";
    foreach ($frutas as $fruta) {
        echo "<li>$fruta</li>";
    }
    echo "</ul></div>";
    echo "</div>";

    // ----------------------------------------------------
    // Exercicio 19 - Soma de Array
    echo "<div class='exercicio'>";
    echo "<h3>Exercicio 19 - Soma de Array</h3>";
    $numeros19 = [10, 25, 7, 43, 15];
    $soma19 = 0;
    foreach ($numeros19 as $num) {
        $soma19 += $num;
    }
    $lista19 = implode(", ", $numeros19);
    echo "<p>Numeros: <code>[$lista19]</code></p>";
    echo "<div class='resultado'>A soma total dos numeros e: <strong>$soma19</strong></div>";
    echo "</div>";

    // ----------------------------------------------------
    // Exercicio 20 - Array Associativo
    echo "<div class='exercicio'>";
    echo "<h3>Exercicio 20 - Array Associativo (Aluno)</h3>";
    $aluno = [
        "nome"  => "Carlos Eduardo",
        "idade" => 22,
        "curso" => "Analise e Desenvolvimento de Sistemas"
    ];
    echo "<div class='resultado'>";
    echo "Nome: <strong>{$aluno['nome']}</strong><br>";
    echo "Idade: <strong>{$aluno['idade']} anos</strong><br>";
    echo "Curso: <strong>{$aluno['curso']}</strong>";
    echo "</div>";
    echo "</div>";

    ?>
</div>
</body>
</html>