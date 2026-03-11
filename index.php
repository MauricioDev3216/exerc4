<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desafio 4 - Formularios PHP</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Arial, sans-serif;
            background: #f0f4f8;
            min-height: 100vh;
            padding: 40px 20px;
        }

        h1 {
            text-align: center;
            font-size: 2em;
            color: #1a1a2e;
            margin-bottom: 8px;
            letter-spacing: 1px;
        }

        .subtitle {
            text-align: center;
            color: #666;
            margin-bottom: 40px;
            font-size: 1em;
        }

        .bloco {
            max-width: 860px;
            margin: 0 auto 32px auto;
        }

        .bloco-titulo {
            font-size: 0.85em;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: #888;
            margin-bottom: 14px;
            padding-left: 4px;
            border-left: 4px solid #007bff;
            padding-left: 10px;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(230px, 1fr));
            gap: 14px;
        }

        .btn-exercicio {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            background: #ffffff;
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            padding: 18px 20px;
            text-decoration: none;
            color: #1a1a2e;
            transition: all 0.2s ease;
            cursor: pointer;
            box-shadow: 0 2px 6px rgba(0,0,0,0.05);
        }

        .btn-exercicio:hover {
            border-color: #007bff;
            background: #f0f7ff;
            transform: translateY(-3px);
            box-shadow: 0 6px 16px rgba(0, 123, 255, 0.15);
        }

        .btn-num {
            font-size: 0.75em;
            font-weight: 700;
            color: #007bff;
            background: #e8f0ff;
            padding: 2px 8px;
            border-radius: 20px;
            margin-bottom: 8px;
            letter-spacing: 1px;
        }

        .btn-titulo {
            font-size: 0.95em;
            font-weight: 600;
            line-height: 1.3;
        }

        /* cores por bloco */
        .seq   .btn-num { color: #0077cc; background: #dff0ff; }
        .seq   .btn-exercicio:hover { border-color: #0077cc; background: #eaf5ff; }

        .cond  .btn-num { color: #6f42c1; background: #ede8ff; }
        .cond  .btn-exercicio:hover { border-color: #6f42c1; background: #f5f0ff; }

        .loop  .btn-num { color: #28a745; background: #d4edda; }
        .loop  .btn-exercicio:hover { border-color: #28a745; background: #edfff2; }

        .arr   .btn-num { color: #e67e22; background: #fdebd0; }
        .arr   .btn-exercicio:hover { border-color: #e67e22; background: #fff6ec; }
    </style>
</head>
<body>

<h1>Desafio 4 &mdash; Formularios PHP</h1>
<p class="subtitle">Clique em um exercicio para abrir</p>

<!-- SEQUENCIAIS -->
<div class="bloco seq">
    <div class="bloco-titulo">Sequenciais</div>
    <div class="grid">
        <a class="btn-exercicio" href="ex01_conversor_moedas.php">
            <span class="btn-num">EX 01</span>
            <span class="btn-titulo">Conversor de Moedas</span>
        </a>
        <a class="btn-exercicio" href="ex02_area_perimetro.php">
            <span class="btn-num">EX 02</span>
            <span class="btn-titulo">Calculadora de Area e Perimetro</span>
        </a>
        <a class="btn-exercicio" href="ex03_consumo_combustivel.php">
            <span class="btn-num">EX 03</span>
            <span class="btn-titulo">Consumo de Combustivel</span>
        </a>
    </div>
</div>

<!-- CONDICIONAIS IF + SWITCH -->
<div class="bloco cond">
    <div class="bloco-titulo">Comandos If &amp; Switch</div>
    <div class="grid">
        <a class="btn-exercicio" href="ex04_situacao_aluno.php">
            <span class="btn-num">EX 04</span>
            <span class="btn-titulo">Situacao do Aluno</span>
        </a>
        <a class="btn-exercicio" href="ex05_verificador_idade.php">
            <span class="btn-num">EX 05</span>
            <span class="btn-titulo">Verificador de Idade</span>
        </a>
        <a class="btn-exercicio" href="ex06_par_impar.php">
            <span class="btn-num">EX 06</span>
            <span class="btn-titulo">Par ou Impar</span>
        </a>
        <a class="btn-exercicio" href="ex07_dia_semana.php">
            <span class="btn-num">EX 07</span>
            <span class="btn-titulo">Dias da Semana</span>
        </a>
        <a class="btn-exercicio" href="ex08_calculadora_simples.php">
            <span class="btn-num">EX 08</span>
            <span class="btn-titulo">Calculadora Simples</span>
        </a>
        <a class="btn-exercicio" href="ex09_mes_extenso.php">
            <span class="btn-num">EX 09</span>
            <span class="btn-titulo">Mes por Extenso</span>
        </a>
    </div>
</div>

<!-- LACOS DE REPETICAO -->
<div class="bloco loop">
    <div class="bloco-titulo">Lacos de Repeticao</div>
    <div class="grid">
        <a class="btn-exercicio" href="ex10_fatorial.php">
            <span class="btn-num">EX 10</span>
            <span class="btn-titulo">Fatorial</span>
        </a>
        <a class="btn-exercicio" href="ex11_somatorio.php">
            <span class="btn-num">EX 11</span>
            <span class="btn-titulo">Somatorio</span>
        </a>
        <a class="btn-exercicio" href="ex12_sequencia_pares.php">
            <span class="btn-num">EX 12</span>
            <span class="btn-titulo">Sequencia de Pares</span>
        </a>
    </div>
</div>

<!-- ARRAYS -->
<div class="bloco arr">
    <div class="bloco-titulo">Arrays</div>
    <div class="grid">
        <a class="btn-exercicio" href="ex13_media_valores.php">
            <span class="btn-num">EX 13</span>
            <span class="btn-titulo">Media de Valores</span>
        </a>
        <a class="btn-exercicio" href="ex14_lista_compras.php">
            <span class="btn-num">EX 14</span>
            <span class="btn-titulo">Lista de Compras</span>
        </a>
        <a class="btn-exercicio" href="ex15_menor_maior.php">
            <span class="btn-num">EX 15</span>
            <span class="btn-titulo">Menor e Maior Valor</span>
        </a>
    </div>
</div>

</body>
</html>