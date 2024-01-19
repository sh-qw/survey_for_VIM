<?php
    require_once 'db.php';
    include 'functions.php';
session_start();
//echo $_SESSION['organization_type2'];;
if($_SESSION['survey'] != 2 ){header("Location: /index.php");}
 $questionType = $_SESSION['organization_type2'];





$totalScore = $_SESSION['score'];
$specialist_name = $_SESSION['specialist_name'];








//maxball($db);




// Пример использования функции

//$status = getStatus($questionType, $totalScore);
setcookie('survey_completed', '1', time() + (365 * 24 * 3600), '/');

$incorrectQuestionIds = explode(',', $_SESSION['incorr']);
//print_r($incorrectQuestionIds);

// Преобразуем массив обратно в строку
$incorrectQuestionIdsStr = implode(',',$incorrectQuestionIds);
if($incorrectQuestionIdsStr ==''){$incorrectQuestionIdsStr = 0;}

$sql = "SELECT DISTINCT text_recommendation FROM recommendation 
LEFT JOIN questions ON questions.recommendation_id = recommendation.id_recommendation WHERE id_question IN ($incorrectQuestionIdsStr)";
$result = $db->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // $questionId = $row['id_question'];
        $commentText = $row['text_recommendation'];

        // Выводите или обрабатывайте комментарии по вашему усмотрению
    }
} else {
    echo "Нет комментариев для выбранных вопросов.";
}
// Пример использования
// Замените на фактическое значение

//echo 'Вы набрали ' . $totalScore . ' ' . pluralize($totalScore, 'балл', 'балла', 'баллов');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Результаты</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }

        h1 {
            color: #333;
        }

        .result-info {
            margin-top: 20px;
        }

        .status {
            font-weight: bold;
        }

        .comment {
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Результат опроса</h1>
        <div class="result-info">
            <p>
                <span id="specialistName"><?php echo $specialist_name ?></span>, вы набрали <span id="totalScore"><?php echo $totalScore . ' ' . pluralize($totalScore, 'балл', 'балла', 'баллов') ; echo maxball($db)?></span>
            </p>
            <p class="status">Статус: <?php $mass = getStatus($questionType, $totalScore); ?></p>
            <p class="comment">Комментарий:
                <?php


                $sql = "SELECT DISTINCT text_recommendation FROM recommendation 
            LEFT JOIN questions ON questions.recommendation_id = recommendation.id_recommendation WHERE id_question IN ($incorrectQuestionIdsStr)";
                $result = $db->query($sql);
                $num = 1;
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        // $questionId = $row['id_question'];
                        $commentText = $row['text_recommendation'];

                        // Выводите или обрабатывайте комментарии по вашему усмотрению
                        echo "$num) $commentText <br>";
                        $num++;
                    }
                } else {
                    echo "Нет комментариев.";
                }
                ?>
            </p>
        </div>
    </div>
</body>
<?php

    

?>
</html>