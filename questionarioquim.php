<?php
session_start();

// Defina suas perguntas e respostas
$question_bank = [
    [
        "Qual é o metal mais maleável e dúctil conhecido, utilizado em joias e circuitos eletrônicos?",
        "a) Ouro (Au)",
        "b) Urânio (U)",
        "c) Boro (B)",
        "d) Tungstênio (W)",
        "Resposta: a) Ouro (Au)"
    ],
    [
        "Qual é o primeiro elemento da tabela periódica?",
        "a) Postássio (K)",
        "b) Carbono (C)",
        "c) Oxigênio (O)",
        "d) Hidrogênio (H)",
        "Resposta: d) Hidrogênio (H)"
    ],
    [
        "Qual elemento é o mais abundante na crosta terrestre?",
        "a) Cromo (Cr)",
        "b) Tungstênio (W)",
        "c) Mercúrio (Hg)",
        "d) Ouro (Au)",
        "Resposta: c) Mercúrio (Hg)"
    ],
    [
        "Qual elemento é utilizado como catalisador em reações químicas e na produção de ácido nítrico?",
        "a) Magnésio (Mg)",
        "b) Platina (Pt)",
        "c) Prata (Ag)",
        "d) Ferro (Fe)",
        "Resposta: b) Platina (Pt)"
    ],
    [
        "Qual elemento é um importante componente dos ossos e dentes, além de desempenhar um papel crucial na comunicação entre as células nervosas?",
        "a) Sódio (Na)",
        "b) Prata (Ag)",
        "c) Cálcio (Ca)",
        "d) Iodo (I)",
        "Resposta: c) Cálcio (Ca)"
    ],
];

// Inicialize o contador de perguntas
if (!isset($_SESSION['current_questions'])) {
    $_SESSION['current_questions'] = [];
}

// Embaralhe as perguntas para que sejam diferentes a cada vez
shuffle($question_bank);

// Pegue as cinco primeiras perguntas do banco
$current_questions = array_slice($question_bank, 0, 5);

// Salve as perguntas atuais na sessão
$_SESSION['current_questions'] = $current_questions;

// Inicialize a contagem de respostas corretas
$score = 0;

// Verifique se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_answers = $_POST['answer'];

    foreach ($user_answers as $index => $user_answer) {
        $correct_answer = $current_questions[$index][5]; // Obtém a resposta correta da matriz de perguntas

        if (strpos($correct_answer, $user_answer) !== false) {
            $score++;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Questionário de Química</title>
</head>
<body>
    <h1>Questionário de Química</h1>
    <form method="POST" action="">
        <?php foreach ($current_questions as $index => $question) : ?>
            <p><?php echo $question[0]; ?></p>
            <label>
                <input type="radio" name="answer[<?php echo $index; ?>]" value="a"> <?php echo $question[1]; ?>
            </label><br>
            <label>
                <input type="radio" name="answer[<?php echo $index; ?>]" value="b"> <?php echo $question[2]; ?>
            </label><br>
            <label>
                <input type="radio" name="answer[<?php echo $index; ?>]" value="c"> <?php echo $question[3]; ?>
            </label><br>
            <label>
                <input type="radio" name="answer[<?php echo $index; ?>]" value="d"> <?php echo $question[4]; ?>
            </label><br><br>
        <?php endforeach; ?>
        <input type="submit" value="Enviar">
    </form>
    <?php
    // Exibe a contagem de acertos após o envio do formulário
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        echo "Você acertou " . $score . " de 5 perguntas.";
    }
    ?>
</body>
</html>