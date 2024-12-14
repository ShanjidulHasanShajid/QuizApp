<?php


function evaluateQuiz(array $questions, array $answers): int {
    $score = 0;
    foreach ($questions as $index => $question) {
        if (strtolower(trim($answers[$index])) === strtolower(trim($question['correct']))) {
            $score++;
        }
    }
    return $score;
}


$questions = [
    ['question' => 'What is 2 + 2?', 'correct' => '4'],
    ['question' => 'What is the capital of France?', 'correct' => 'Paris'],
    ['question' => 'Who wrote "Hamlet"?', 'correct' => 'Shakespeare'],
    ['question' => 'What is the square root of 16?', 'correct' => '4'],
    ['question' => 'What is the chemical symbol for water?', 'correct' => 'H2O'],
];


$answers = [];
foreach ($questions as $index => $question) {
    echo "Question " . ($index + 1) . ": " . $question['question'] . "\n";
    $answers[] = readline("Your answer: ");
}


$score = evaluateQuiz($questions, $answers);
$totalQuestions = count($questions);


echo "\nYou scored $score out of $totalQuestions.\n";


if ($score === $totalQuestions) {
    echo "Excellent job!\n";
} elseif ($score > $totalQuestions / 2) {
    echo "Good effort!\n";
} else {
    echo "Better luck next time!\n";
}
