# Desafio 4 — Formulários PHP

Projeto com 15 exercícios de lógica em PHP com formulários, validação de dados e exibição de resultados.

---

## Como executar

1. Instale o **XAMPP** (se ainda não tiver)
2. Copie a pasta `desafio4` inteira para dentro de `C:/xampp/htdocs/`
3. Inicie o **Apache** pelo painel do XAMPP
4. Acesse no navegador: `http://localhost/desafio4/index.php`

---

## Estrutura de arquivos

```
desafio4/
├── index.php           → Tela inicial com todos os botões
├── exerc1.php          → Conversor de Moedas
├── exerc2.php          → Calculadora de Área e Perímetro
├── exerc3.php          → Consumo de Combustível
├── exerc4.php          → Situação do Aluno (Média)
├── exerc5.php          → Verificador de Idade (Votação)
├── exerc6.php          → Par ou Ímpar
├── exerc7.php          → Dia da Semana (Switch)
├── exerc8.php          → Calculadora Simples (Switch)
├── exerc9.php          → Mês por Extenso (Switch)
├── exerc10.php         → Fatorial de um Número (For)
├── exerc11.php         → Somatório de 1 até N (For)
├── exerc12.php         → Sequência de Pares em Intervalo (For)
├── exerc13.php         → Média de 5 Valores (Array + Foreach)
├── exerc14.php         → Lista de Compras (Array + Checkboxes)
├── exerc15.php         → Menor e Maior Valor (Array + Foreach)
└── README.md           → Este arquivo
```

---

## Exercícios

### Bloco 1 — Sequenciais
| # | Arquivo | Descrição |
|---|---------|-----------|
| 1 | exerc1.php | Lê um valor em Reais e a cotação do Dólar, e converte o valor |
| 2 | exerc2.php | Lê base e altura de um retângulo e calcula área e perímetro |
| 3 | exerc3.php | Lê distância percorrida e litros gastos, calcula consumo em Km/L |

### Bloco 2 — Condicionais (If / Else / Switch)
| # | Arquivo | Descrição |
|---|---------|-----------|
| 4 | exerc4.php | Lê duas notas, calcula média e exibe: Aprovado / Recuperação / Reprovado |
| 5 | exerc5.php | Lê ano de nascimento e classifica: Voto Obrigatório / Facultativo / Não pode votar |
| 6 | exerc6.php | Lê um inteiro e informa se é PAR ou ÍMPAR |
| 7 | exerc7.php | Lê número de 1 a 7 e exibe o nome do dia da semana (Switch) |
| 8 | exerc8.php | Lê dois números e uma operação (+, -, ×, ÷) e calcula o resultado (Switch) |
| 9 | exerc9.php | Lê número de 1 a 12 e exibe o nome do mês por extenso (Switch) |

### Bloco 3 — Laços de Repetição
| # | Arquivo | Descrição |
|---|---------|-----------|
| 10 | exerc10.php | Lê um número N e calcula o fatorial N! usando laço For |
| 11 | exerc11.php | Lê um número N e soma todos os inteiros de 1 até N |
| 12 | exerc12.php | Lê intervalo (início e fim) e lista todos os números pares dentro dele |

### Bloco 4 — Arrays
| # | Arquivo | Descrição |
|---|---------|-----------|
| 13 | exerc13.php | Recebe 5 notas via array (`name="notas[]"`) e calcula a média |
| 14 | exerc14.php | Lista de compras com checkboxes (`name="itens[]"`), exibe itens marcados |
| 15 | exerc15.php | Recebe 5 números via array e encontra o menor e o maior valor |

---

## Conceitos praticados

- Leitura de dados com `$_POST` e verificação com `$_SERVER["REQUEST_METHOD"]`
- Validação com `filter_var`, `FILTER_VALIDATE_FLOAT`, `FILTER_VALIDATE_INT`
- Estruturas condicionais: `if`, `elseif`, `else`, `switch/case`
- Laços de repetição: `for`, `foreach`
- Arrays indexados e associativos
- Formatação de números com `number_format`
- Proteção contra XSS com `htmlspecialchars`

---

## Tecnologias

- PHP 7.4+
- HTML5 / CSS3
- Servidor local XAMPP (Apache)
