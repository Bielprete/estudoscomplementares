<?php
session_start();

// Defina suas perguntas e respostas
$question_bank = [
    [
        "Resolva a equação simples: 2x + 3=9",
        "a) x=18",
        "b) x=12",
        "c) x=3",
        "d) x=7",
        "Resposta: c) x=3"
    ],
    [
        "Se um retângulo tem um comprimento de 8 unidades e uma largura de 5 unidades, qual é a sua área?",
        "a) A área do retângulo é 28 unidades quadradas.",
        "b) A área do retângulo é 40 unidades quadradas.",
        "c) A área do retângulo é 35 unidades quadradas.",
        "d) A área do retângulo é 50 unidades quadradas.",
        "Resposta: b) A área do retângulo é 40 unidades quadradas."
    ],
    [
        "Qual é o valor de π (pi) arredondado para duas casas decimais?",
        "a) 3.14",
        "b) 2.8",
        "c) 4.31",
        "d) 5.12",
        "Resposta: a) 3.14"
    ],
    [
        " Quanto é 25% de 80?",
        "a) 10",
        "b) 25",
        "c) 20",
        "d) 30",
        "Resposta: c) 20"
    ],
    [
        " Qual é o perímetro de um quadrado com lados de comprimento 6 unidades?",
        "a) O perímetro do quadrado é 43 unidades.",
        "b) O perímetro do quadrado é 19 unidades.",
        "c) O perímetro do quadrado é 22 unidades.",
        "d) O perímetro do quadrado é 24 unidades.",
        "Resposta: d) O perímetro do quadrado é 24 unidades."
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
    <title>Questionário de Matemática</title>
</head>
<body>
    <h1>Questionário de Matemática</h1>
    <form method="POST" action="">
        <?php foreach ($current_questions as $index => $question) : ?>
            <p><?php echo $question[0]; ?></p>
            <label>
                <input type="radio" name="answer[<?php echo $index; ?>]" value="c"> <?php echo $question[1]; ?>
            </label><br>
            <label>
                <input type="radio" name="answer[<?php echo $index; ?>]" value="b"> <?php echo $question[2]; ?>
            </label><br>
            <label>
                <input type="radio" name="answer[<?php echo $index; ?>]" value="a"> <?php echo $question[3]; ?>
            </label><br>
            <label>
                <input type="radio" name="answer[<?php echo $index; ?>]" value="c"> <?php echo $question[4]; ?>
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