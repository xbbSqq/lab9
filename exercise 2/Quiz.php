<?php

$numQs = 5;

function scrapeInputAnswers() {
  $answers = array(
    $_POST["q1"],
    $_POST["q2"],
    $_POST["q3"],
    $_POST["q4"],
    $_POST["q5"],
  );
  return $answers;
}


function correctAnswersCount($correctAnswers, $answers) {
  $cnt = 0;
  foreach(range(0,4) as $i) {
    if(strcmp($correctAnswers[$i], $answers[$i]) == 0) {
      $cnt++;
    }
  }
  return $cnt;
}

function percentage($correctNum, $totalNum) {
  return ($correctNum / $totalNum) * 100;
}

function displayQuestionFeedback($qs, $inputAnswers, $correctAnswers) {
  foreach(range(0, 4) as $i) {
    echo $qs[$i] . "<br>" . "You Answered: " . $inputAnswers[$i] . "<br>" . "Correct Answer: " . $correctAnswers[$i] . "<br><br>";
  }
}

function displayTotal($numCorrect) {
  echo "You answered " . $numCorrect . " of the questions correctly." . "<br>";
}

function displayPercentage($percentCorrect) {
  echo "You answered " . $percentCorrect . "% of the questions correctly." . "<br>";
}

$qs = array("Q1: What is my favorite game?",
            "Q2: What is my age?",
            "Q3: What is my favorite animals?",
            "Q4: How many games did i play?",
            "Q5: How many people do i want to play with together?");

$correctAnswers = array("computer game", "twenty-four", "dog", "30", "100");
$inputAnswers = scrapeInputAnswers();

$correctCount = correctAnswersCount($correctAnswers, $inputAnswers);

displayQuestionFeedback($qs, $inputAnswers, $correctAnswers);
echo "<br><br>";
displayTotal($correctCount);
echo "<br><br>";
displayPercentage(percentage($correctCount, $numQs));

 ?>
