<?php
  include 'inc/quiz.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Math Quiz: Addition</title>
    <link href='https://fonts.googleapis.com/css?family=Playfair+Display:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<style>
.toast{
    position: absolute;
    top: 0;
    margin: auto;
    background: green;
    font-size: 21px;
    padding: 15px;
    color: #fff;
}
.toast_fail{
    position: absolute;
    top: 0;
    margin: auto;
    background: #fb0000;
    font-size: 21px;
    padding: 15px;
    color: #fff;
}
</style>
    <div class="container">
        <div id="quiz-box">
        <?php 
        $quiz = getQueustion();
        $count = getCurrentId() + 1;
        echo "
            <p class='breadcrumbs'>Question ". $count ." of ". $total_count ." </p>
            <p class='quiz'>What is <span class='addernum'>" . $quiz["leftAdder"] . "</span> + <span class='addernum'>". $quiz["rightAdder"] ."?</span></p>
            <form action='index.php' method='post'>
                <input type='hidden' name='id' value='". $count ."' />
                <input type='submit' class='btn' name='answer' value='". $quiz["answer"][0] ."' />
                <input type='submit' class='btn' name='answer' value='". $quiz["answer"][1] ."' />
                <input type='submit' class='btn' name='answer' value='". $quiz["answer"][2] ."' />
            </form>
        </div>
       ";
       ?>
    </div>
    <?php
            if($_SESSION["correct"] === TRUE){
                echo "<div id='toast' class='toast'>Answer Correct</div>";
            }elseif($_SESSION["correct"] === FALSE){
                echo  "<div id='toast' class='toast_fail'>Incorrect Answer</div>";
            }else{
                echo "";
            }
        ?>
    </div>
    <script>
        var quesitonleftad =  document.getElementById('leftAdder');
        setTimeout(() => {
            document.getElementById("toast").remove();
        }, 1000);
    </script>
</body>
</html>