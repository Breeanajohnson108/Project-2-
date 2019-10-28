<?php

/**
* Use this function to generate a random number
**/
function genQuestion(){
    $min = 1;
    $max = 100;
    $maxAnswer = 1;
    $question['leftAdder'] = numGenerator($min,$max);
    $question['rightAdder'] = numGenerator($min,$max);
    if(isset($question['leftAdder']) && isset($question['rightAdder'])){
      $question['answer'] =  [];
      
      $realAnswer =  $question['leftAdder'] + $question['rightAdder'];
      array_push($question['answer'], $realAnswer);
      
      $fake_answer_1 = $realAnswer + numGenerator(1,10);
      array_push($question['answer'], $fake_answer_1);

      $fake_answer_2 = $realAnswer - numGenerator(1,10);
      array_push($question['answer'], $fake_answer_2);

/*
      for($x = 0; $x <= $maxAnswer; $x++){
        $fake_answer = numGenerator($min,$max);
        if($fake_answer === $question['answer'][$x]){
          $fake_answer = numGenerator($min,$max);
        }
        array_push($question['answer'], $fake_answer);
      }
*/      
      
      $question['correctAnswer'] =  $realAnswer;
    }
    return $question;
}

/**
 * This function generates a random number
 */
function numGenerator($min, $max){
    return rand($min,$max);
}

/**
 * This function generates a random question
 * using random number generated
 */
function getQuestions($questions){
    $qid = numGenerator(0,count(questionList())-1);
    return $questions[$qid];
}
