<?php
session_start();

include ("generate_questions.php");
include ("kint.phar");
$total_count = 10;

/**
 * Use this function to accept and process the request.
 */

if(getCurrentId() >= $total_count - 1){
    completeQuiz();
}

if(isset($_POST["answer"]) && !empty($_POST["answer"])){
    $_SESSION["quiz"][getCurrentId()]["selectedAnswer"] = $_POST["answer"];
    verifyAnswer(getCurrentId());
    $_SESSION['count']++;
}else{
    if(count($_SESSION) ==  1){
        $_SESSION = [];
    }else{
       // array_pop($_SESSION);
    }
}

/**
 * Use this function to generate question
 * questions are generated from  generate questions php file
 */
function getQueustion(){
    $question = genQuestion();
    $question['answer'] = randomizeAnswer($question);
    $_SESSION['quiz'][] = $question;
    return $question;
}

/**
 * Use this function to generate CurrentID
 */
function getCurrentId(){
    return count($_SESSION['quiz']) - 1;
}

/**
 *  Use this function to randomize the Answer
 * to each question.
 */
function randomizeAnswer($question){
    $answer  =  $question['answer'];
    shuffle($answer);
    return $answer;
}

/**
 * This function calculates
 * and returns the correct number of answers
 */
function verifyAnswer($qid){

    $_SESSION["correct"] = FALSE;
    if(intval($_SESSION['quiz'][$qid]['selectedAnswer']) == intval($_SESSION['quiz'][$qid]['correctAnswer'])){
        $_SESSION["correct"] = TRUE;
    }
}


/**
 * Use this function to complete the Quiz
 */
function completeQuiz(){
    header('Location: /inc/completeQuiz.php');
}
