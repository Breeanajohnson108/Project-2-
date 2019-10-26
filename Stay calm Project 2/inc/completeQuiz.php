<?php
  include 'inc/quiz.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Math Quiz: Addition</title>
    <link href='https://fonts.googleapis.com/css?family=Playfair+Display:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="/css/normalize.css">
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
<style>
.container{
    width:500px;
    margin:auto;
    text-align:center;
}

.container h2{
    text-align:center;
}

.list{
    padding:20px;
    font-size: 20px;
    text-align:center;
}
</style>
    <div class="container">
        <h2>Quiz complete</h2>
        <?php
        session_start();
        $passed = 0;
        $list_ar = array_slice($_SESSION['quiz'],0,$_SESSION['count']);
        foreach($list_ar as $quiz){
            $x = 0;
            if($quiz["correctAnswer"] == $quiz["selectedAnswer"]){
                $passed++;
            }
            echo "<div class='list'>". $quiz["leftAdder"] ." + ". $quiz["rightAdder"] . " = " . $quiz["correctAnswer"] . " | you picked " . $quiz["selectedAnswer"] ."</div>";
            }
            echo "<div class='list'>Scored " . $passed . " of " . $_SESSION['count'] ."</div>";
            $_SESSION["quiz"] = [];
            $_SESSION["count"] = 0;
            $_SESSION["correct"] = "";
        ?>
        <button class='btn'>
            <a href='/index.php' style='color:#fff'>Retry</a>
        </button>
    </div>
</body>
</html>
