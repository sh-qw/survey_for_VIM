<?php

session_start();
// // Проверка наличия сессии
// if ($_SESSION['check'] == 1 ) {
//     // Сессия не существует, начинаем опрос
//     $_SESSION['survey_started'] = true;

//     echo '111';
//echo$_SESSION['organization_type'];
//print_r($_SESSION['answerOptions']);
//     $_POST['check'] = 0;
//     // Остальной код страницы survey.php
//     // ...
if($_SESSION['survey'] != 1){header("Location: /index.php");}
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Опрос</title>
        <link rel="stylesheet" href="styles.css">
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script src="survey.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

        <style>
        /* Стили для выделения input при наведении */
        .highlight-on-hover:hover {
    background-color: #e0e0e0; /* Любой цвет подсветки, который вы предпочитаете */
    cursor: pointer; /* Добавление указателя при наведении для указания на интерактивность */
}
    </style>
    </head>

    <body>
        <div class="con">
            <h1 style="text-align: center" ;>Прохождение опроса</h1>

            <form id="surveyForm" action="resultphp.php" method="post">
                <!-- Вопрос 1 -->

                <?php //echo ($_SESSION['organization_type']);
                require_once 'db.php';
                if ($db->connect_error) {
                    die("Ошибка подключения: " . $db->connect_error);
                }
                $type_id = $_SESSION['organization_type']; // предположим, что вы получаете значение типа из SESSION

                // Создаем массив со значениями типов, которые могут быть выбраны
                $selected_types = array(4, 5, 6, 7,8);

                if (!empty($_SESSION['answerOptions']) && $type_id == 2) {
                    $selected_options = explode(',', $_SESSION['answerOptions'][0]);
                    // Фильтруем массив значений типов, чтобы включить только допустимые значения
                    $filtered_types = array_intersect($selected_types, $selected_options);

                    // Если выбраны какие-то допустимые типы, строим условие WHERE
                    if (!empty($filtered_types)) {
                        $where_condition = ' OR id_type IN (' . implode(',', $filtered_types) . ')';
                    } else {
                        $where_condition = '';
                    }
                } else {
                    $where_condition = '';
                }

                $type_id = $_SESSION['organization_type']; // Здесь укажите нужный id типа вопроса
                $sql = "SELECT * FROM questions 
            LEFT JOIN criterion ON criterion.id_criterion = questions.criterion_id 
            LEFT JOIN recommendation ON recommendation.id_recommendation = questions.recommendation_id
            WHERE id_type = $type_id " . $where_condition;
                $result = $db->query($sql);
                //echo $where_condition;
                $num = 1;
                // Проверка наличия вопросов данного типа
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $question_id = $row['id_question'];
                        $significative = $row['significative'];
                        $document = $row['document'];
                        $text_crit = $row['text_criterion'];
                        $sum = $row['sum']; // Добавлено поле sum
                
                        // Вывод вопроса
                        echo '<div class="question">';
                        echo '<h2>' . $num . '. ' . $text_crit . '</h2>';
                        echo '<p>' . $significative . ' (' . $document . ')' . '</p>';
                        $num++;
                
                        // Запрос для выбора вариантов ответов к данному вопросу
                        $sql_answers = "SELECT * FROM answer WHERE id_question = $question_id ORDER BY RAND();";
                        $result_answers = $db->query($sql_answers);
                if ($sum == 1) {echo '<h4>Можно выбрать несколько вариантов ответов</h4>';}
                        // Проверка наличия вариантов ответов
                        if ($result_answers->num_rows > 0) {
                            while ($row_answer = $result_answers->fetch_assoc()) {
                                $text_answer = $row_answer['text_answer'];
                                $value = $row_answer['value'];
                                $ans_id = $row_answer['id_option'];
                                
                                // Вывод варианта ответа
                                echo '<label for="question' . $ans_id . '" class="highlight-on-hover">';
                                if ($sum == 1) {
                                    // Если sum равно 1, создаем чекбокс для выбора нескольких вариантов
                                    echo '<input class="highlight-on-hover" type="checkbox" id="question' . $ans_id . '" name="question' . $question_id . '[]" value="' . $value . '"> ' . $text_answer;
                                } else {
                                    // Иначе создаем радиокнопку для выбора одного варианта
                                    echo '<input class="highlight-on-hover" type="radio" id="question' . $ans_id . '" name="question' . $question_id . '" value="' . $value . '"> ' . $text_answer;
                                }
                                echo '</label>';
                                echo '<br>';
                            }
                        }
                
                        echo '</div>';
                    }
                } else {
                    echo 'Нет вопросов данного типа.';
                }

                // Закрытие соединения с базой данных
                $db->close();
                //print_r($_SESSION['organization_type']);
                ?>
                   
                <?php if($type_id==2){
                    $_SESSION['organization_type2']= $type_id .','. implode(',', $filtered_types); ;
                 }else {
                    $_SESSION['organization_type2']= $type_id;
                  }?>
                    
                 <!-- <input type="hidden" id="specialist_name" value="<?php //echo $_SESSION['specialist_name']; ?>"> -->
                <!-- <input type="hidden" name="organization_name" value="<?php //echo $_SESSION['organization_name']; ?>">
                <input type="hidden" name="leader_name" value="<?php //echo $_SESSION['leader_name']; ?>">
                <input type="hidden" name="leader_phone" value="<?php //echo $_SESSION['leader_phone']; ?>">
                <input type="hidden" name="leader_email" value="<?php //echo $_SESSION['leader_email']; ?>"> --> 
                <script>
                    function submitSurvey() {
                        // Собираем ответы пользователя
                        var answers = document.querySelectorAll('input[type="radio"]:checked, input[type="checkbox"]:checked');
                        
                        // Проверяем, что на каждый вопрос выбран ответ
                        var questions = document.querySelectorAll('.question');

                        // Проходим по каждому вопросу и проверяем, выбран ли хотя бы один вариант ответа
                        for (var i = 0; i < questions.length; i++) {
                            var questionInputs = questions[i].querySelectorAll('input[type="radio"]:checked, input[type="checkbox"]:checked');

                            // Если ни один вариант ответа не выбран, выводим сообщение и прерываем отправку формы
                            if (questionInputs.length === 0) {
    Swal.fire({
        icon: 'error',
        title: 'Ошибка',
        text: 'Вы ответили не на все вопросы, выберите вариант ответа в каждом вопросе',
    });
    return;
}

                        }


                        // Инициализируем массив для хранения id вопросов с неверными ответами
                        var incorrectQuestionIds = [];

                        // Обходим все выбранные ответы
                        answers.forEach(function(answer) {
                            // Проверяем, является ли ответ неверным (value = 0)
                            if (parseInt(answer.value) === 0) {
                                // Получаем id вопроса из id ответа
                                var questionId = answer.name.replace('question', '');
                                // Добавляем id в массив
                                incorrectQuestionIds.push(questionId);
                            }
                        });

                        // Пример вывода в консоль для отладки
                        console.log('Id вопросов с неверными ответами:', incorrectQuestionIds);

                        // Подсчитываем сумму баллов
                        var totalScore = 0;
                        answers.forEach(function(answer) {
                            totalScore += parseInt(answer.value);
                        });

                        // Получаем имя специалиста из формы
                        //var specialistName = document.getElementById('specialist_name').value;

                        // Создаем скрытые инпуты
                        var scoreInput = document.createElement('input');
                        scoreInput.type = 'hidden';
                        scoreInput.name = 'score';
                        scoreInput.value = totalScore;

                        // var specialistNameInput = document.createElement('input');
                        // specialistNameInput.type = 'hidden';
                        // specialistNameInput.name = 'specialist_name';
                        // specialistNameInput.value = specialistName;

                        // Создаем инпут для неверных ответов
                        var incorrectInput = document.createElement('input');
                        incorrectInput.type = 'hidden';
                        incorrectInput.name = 'incorr';
                        incorrectInput.value = incorrectQuestionIds;

                        // Добавляем инпуты к форме
                        var form = document.getElementById('surveyForm');
                        form.appendChild(scoreInput);
                        // form.appendChild(specialistNameInput);
                        form.appendChild(incorrectInput);

                        // Отправляем форму
                        form.submit();
                    }
                </script>

                <script>
                    if (window.jQuery) {
                        // Действия для подключённого jQuery
                        console.log('lf');
                    } else {
                        // Действия для неподключённого jQuery
                        console.log('nets');
                    }
                </script>
                <input type="button" value="Завершить опрос" onclick="submitSurvey()">
            </form>
        </div>

        <!-- Добавьте следующий скрипт в ваш HTML-код -->

    </body>

    </html>
<!-- <?php 
// } else {
    // Сессия существует, опрос уже начат
    // if (isset($_SESSION['survey_completed']) && $_SESSION['survey_completed'] === true) {
    //     // Опрос завершен, перенаправляем пользователя на страницу с результатами
    //     header('Location: result.php');
    //     exit();
    // } -->

    // ... ваш код формы опроса ...
// } ?>