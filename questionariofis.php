<?php
session_start();

// Defina suas perguntas e respostas
$question_bank = [
    [
        "Qual é a primeira lei do movimento de Newton?",
        "a) A primeira lei de Newton afirma que para cada ação, há uma reação igual e oposta. 
        Em outras palavras, se um objeto exerce uma força sobre outro, o segundo objeto exerce uma força igual, mas oposta, sobre o primeiro.",
        "b) A primeira lei de Newton, afirma que a força aplicada a um objeto é igual à taxa de mudança de sua quantidade de 
        movimento. Ela é expressa pela fórmula F = m * a, onde F é a força, m é a massa do objeto e a é a aceleração.",
        "c) A primeira lei de Newton, afirma que a gravidade de Newton descreve a atração gravitacional entre duas massas. 
        Ela é expressa pela fórmula F = G * (m1 * m2) / r^2, onde F é a força gravitacional, G é a constante gravitacional, m1 e m2 são as massas dos objetos e r é a distância entre eles.",
        "d) A primeira lei de Newton, afirma que um objeto em repouso permanecerá em repouso, e um objeto em 
        movimento continuará em movimento a uma velocidade constante, a menos que uma força externa aja sobre ele.",
        "Resposta: d) A primeira lei de Newton, afirma que um objeto em repouso permanecerá em repouso, e um objeto em 
        movimento continuará em movimento a uma velocidade constante, a menos que uma força externa aja sobre ele."
    ],
    [
        " O que é a teoria da relatividade de Einstein?",
        "a) A teoria da relatividade de Einstein, afirma que a energia total em um sistema isolado permanece constante 
        ao longo do tempo. Ela não pode ser criada nem destruída, apenas transformada de uma forma para outra.",
        "b) A teoria da relatividade de Einstein, afirma que é impossível conhecer simultaneamente com precisão a posição e a velocidade de uma partícula subatômica.
         Quanto mais precisamente você conhece uma, menos precisamente você pode conhecer a outra.",
        "c) A teoria da relatividade de Einstein é uma teoria fundamental na física que descreve como a gravidade 
        funciona em grandes escalas e como o tempo e o espaço estão inter-relacionados. Ela inclui a relatividade especial e a relatividade geral.",
        "d) A teoria da relatividade de Einstein, afirma que condutor elétrico é um material que permite que a corrente elétrica flua facilmente através dele devido à 
        alta mobilidade de elétrons em sua estrutura. Exemplos de condutores incluem metais como cobre e alumínio.",
        "Resposta: c) A teoria da relatividade de Einstein, é uma teoria fundamental na física que descreve como a 
        gravidade funciona em grandes escalas e como o tempo e o espaço estão inter-relacionados. Ela inclui a relatividade especial e a relatividade geral."
    ],
    [
        "O que é a lei de Ohm?",
        "a) A lei de Ohm descreve a relação entre a tensão (V), a corrente (I) e a resistência 
        (R) em um circuito elétrico. Ela é expressa pela fórmula V = I * R.",
        "b) A lei de Ohm descreve a energia associada ao movimento de um objeto. Ela é calculada pela fórmula E = (1/2)
         * m * v^2, onde E é a energia cinética, m é a massa do objeto e v é a sua velocidade.",
        "c) A lei de Ohm descreve a região do espaço onde a força magnética atua sobre objetos magnéticos ou cargas 
        elétricas em movimento. Os campos magnéticos são gerados por ímãs ou correntes elétricas.",
        "d) A lei de Ohm descreve a radiação ionizante é uma forma de radiação capaz de remover elétrons de átomos e íons em sua trajetória. Exemplos incluem raios 
        X e raios gama, que têm aplicações na medicina e na indústria, mas também podem ser perigosos à saúde.",
        "Resposta: a) A lei de Ohm descreve a relação entre a tensão (V), a corrente (I) e a resistência 
        (R) em um circuito elétrico. Ela é expressa pela fórmula V = I * R."
    ],
    [
        " O que é um transistor?",
        "a)  Um transitor é um dispositivo eletrônico usado para amplificar e controlar o fluxo de corrente elétrica em circuitos. 
        Eles são fundamentais para a eletrônica moderna e são encontrados em uma variedade de dispositivos, como computadores e smartphones.",
        "b) Um transitor é um dispositivo que afirma que o quadrado do período de órbita de um 
        planeta é diretamente proporcional ao cubo do semieixo maior da sua órbita elíptica.",
        "c) Um transitor é um dispositivo que descreve a força elétrica entre duas cargas elétricas. Ela afirma que a força é diretamente 
        proporcional ao produto das cargas e inversamente proporcional ao quadrado da distância entre elas.",
        "d) Um transitor é um dispositivo material que permite que a corrente elétrica flua facilmente através dele devido à alta mobilidade de 
        elétrons em sua estrutura. Exemplos de condutores incluem metais como cobre e alumínio.",
        "Resposta: a) Um transitor é um dispositivo eletrônico usado para amplificar e controlar o fluxo de corrente elétrica em circuitos. 
        Eles são fundamentais para a eletrônica moderna e são encontrados em uma variedade de dispositivos, como computadores e smartphones. "
    ],
    [
        "  O que é um campo magnético?",
        "a) Um campo magnético é uma região do momento angular afirma que, em um sistema isolado, o momento angular total permanece constante, a menos que uma força externa atue sobre ele.
         O momento angular é o produto da massa, velocidade e raio de rotação de um objeto.",
        "b) Um campo magnético é uma região do espaço onde a força magnética atua sobre objetos magnéticos ou cargas elétricas em movimento. 
        Os campos magnéticos são gerados por ímãs ou correntes elétricas.",
        "c) Um campo magnético é uma região do espaço onde uma carga elétrica de teste experimentaria uma força elétrica. 
        Ele é criado por cargas elétricas e é medido em unidades de newtons por coulomb (N/C). ",
        "d) Um campo magnético é uma região da conservação da carga elétrica afirma que a quantidade total de carga elétrica em um sistema isolado permanece constante. 
        A carga não pode ser criada nem destruída, apenas transferida ou redistribuída.",
        "Resposta: b) Um campo magnético é uma região do espaço onde a força magnética atua sobre objetos magnéticos ou cargas elétricas em movimento. 
        Os campos magnéticos são gerados por ímãs ou correntes elétricas."
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
    <title>Questionário de Física</title>
</head>
<body>
    <h1>Questionário de Física</h1>
    <form method="POST" action="">
        <?php foreach ($current_questions as $index => $question) : ?>
            <p><?php echo $question[0]; ?></p>
            <label>
                <input type="radio" name="answer[<?php echo $index; ?>]" value=""> <?php echo $question[1]; ?>
            </label><br>
            <label>
                <input type="radio" name="answer[<?php echo $index; ?>]" value=""> <?php echo $question[2]; ?>
            </label><br>
            <label>
                <input type="radio" name="answer[<?php echo $index; ?>]" value=""> <?php echo $question[3]; ?>
            </label><br>
            <label>
                <input type="radio" name="answer[<?php echo $index; ?>]" value=""> <?php echo $question[4]; ?>
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