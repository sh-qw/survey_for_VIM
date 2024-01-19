<?php
require_once 'db.php';
session_start();
function getStatus($questionType, $totalScore) {
    // Проверка типа вопросов
    
   

    $questionType = explode(',', $_SESSION['organization_type2']);
    $questionType = array_map('intval', $questionType);
    
    //print_r($questionType) ;
    if (in_array(1, $questionType)) {
        $type="Дошкольные образовательные организации";
        // Определение статуса в зависимости от количества баллов
        if ($totalScore >= 77 && $totalScore <= 81) {
            echo "Экологический лидер"; $status = "Экологический лидер";
        } elseif ($totalScore >= 49 && $totalScore <= 76) {
            echo "Экоцентр (Для присвоения статуса «Экологический лидер» не хватает " . (77 - $totalScore) . " баллов)"; $status = "Экоцентр";
        } elseif ($totalScore >= 0 && $totalScore <= 48) {//echo 'tiip';
            echo "Без статуса. Для присвоения статуса «Экоцентр» не хватает " . (49 - $totalScore) . pluralize(49 - $totalScore, ' балл', ' балла', ' баллов'). ". <br>Достигнуть статуса вам помогут материалы сайта «Экологический конструктор», ниже предлагаем перечень разделов, которые будут интересны.";
            $status = "Без статуса";
        } else {
            echo "Некорректное количество баллов";
        }
        
    } elseif (in_array(3, $questionType)) {
        $type="Организации дополнительного образования";
        if ($totalScore >= 84 && $totalScore <= 90) {
            echo "Экологический лидер";$status = "Экологический лидер";
        } elseif ($totalScore >= 46 && $totalScore <= 83) {
            echo "Экоцентр (Для присвоения статуса «Экологический лидер» не хватает " . (84 - $totalScore) . " баллов)";$status = "Экоцентр";
        } elseif ($totalScore >= 0 && $totalScore <= 45) {
            echo "Без статуса. Для присвоения статуса «Экоцентр» не хватает " . (46 - $totalScore) . pluralize(46 - $totalScore, ' балл', ' балла', ' баллов'). ". <br>Достигнуть статуса вам помогут материалы сайта «Экологический конструктор», ниже предлагаем перечень разделов, которые будут интересны.";
            $status = "Без статуса";
        } else {
            echo "Некорректное количество баллов";
        }
    } elseif (in_array(2, $questionType) && in_array(4, $questionType) && in_array(5, $questionType) && in_array(6, $questionType) && in_array(7, $questionType)) {
        // Если выбраны все опции (4+5+6+7)
        $type="Дошкольное образование + Начальное образование + Основное образование + Среднее образование";
        if ($totalScore >= 163 && $totalScore <= 174) {
            echo "Экологический лидер";$status = "Экологический лидер";
        } elseif ($totalScore >= 76 && $totalScore <= 162) {
            echo "Экоцентр (Для присвоения статуса «Экологический лидер» не хватает " . (163 - $totalScore) . " баллов)";$status = "Экоцентр";
        } elseif ($totalScore >= 0 && $totalScore <= 75) {
            $status = "Без статуса";
            echo "Без статуса. Для присвоения статуса «Экоцентр» не хватает " . (76 - $totalScore) . " баллов. Достигнуть статуса вам помогут материалы сайта «Экологический конструктор», предлагаем перечень разделов, которые будут интересны";
        } else {
            echo "Некорректное количество баллов";
        }
    } elseif (in_array(2, $questionType) && in_array(5, $questionType) && in_array(6, $questionType) && in_array(7, $questionType) && in_array(8, $questionType)) {
        $type="Начальное образование + Основное образование + Среднее образование";
        if ($totalScore >= 120 && $totalScore <= 129) {
            echo "Экологический лидер";$status = "Экологический лидер";
        } elseif ($totalScore >= 69 && $totalScore <= 119) {
            echo "Экоцентр (Для присвоения статуса «Экологический лидер» не хватает " . (120 - $totalScore) . " баллов)";$status = "Экоцентр";
        } elseif ($totalScore >= 0 && $totalScore <= 68) {
            $status = "Без статуса";
            echo "Без статуса. Для присвоения статуса «Экоцентр» не хватает " . (69 - $totalScore) . " баллов. Достигнуть статуса вам помогут материалы сайта «Экологический конструктор», предлагаем перечень разделов, которые будут интересны";
        } else {
            echo "Некорректное количество баллов";
        }
    } elseif (in_array(2, $questionType) && in_array(6, $questionType) && in_array(7, $questionType) && in_array(8, $questionType)) {
        $type="Основное образование + Среднее образование";
        if ($totalScore >= 111 && $totalScore <= 119) {
            echo "Экологический лидер";$status = "Экологический лидер";
        } elseif ($totalScore >= 62 && $totalScore <= 110) {
            echo "Экоцентр (Для присвоения статуса «Экологический лидер» не хватает " . (111 - $totalScore) . " баллов)";$status = "Экоцентр";
        } elseif ($totalScore >= 0 && $totalScore <= 61) {
            $status = "Без статуса";
            echo "Без статуса. Для присвоения статуса «Экоцентр» не хватает " . (62 - $totalScore) . " баллов. Достигнуть статуса вам помогут материалы сайта «Экологический конструктор», предлагаем перечень разделов, которые будут интересны";
        } else {
            echo "Некорректное количество баллов";
        }
    } elseif (in_array(2, $questionType) && in_array(5, $questionType) && in_array(7, $questionType) && in_array(8, $questionType)) {
        $type="Начальное образование + Основное образование";
        if ($totalScore >= 110 && $totalScore <= 118) {
            echo "Экологический лидер";$status = "Экоцентр";
        } elseif ($totalScore >= 60 && $totalScore <= 109) {
            echo "Экоцентр (Для присвоения статуса «Экологический лидер» не хватает " . (110 - $totalScore) . " баллов)";$status = "Экоцентр";
        } elseif ($totalScore >= 0 && $totalScore <= 59) {
            $status = "Без статуса";
            echo "Без статуса. Для присвоения статуса «Экоцентр» не хватает " . (60 - $totalScore) . " баллов. Достигнуть статуса вам помогут материалы сайта «Экологический конструктор», предлагаем перечень разделов, которые будут интересны";
        } else {
            echo "Некорректное количество баллов";
        }
    } elseif (in_array(2, $questionType) && in_array(5, $questionType) && in_array(8, $questionType)) {
        $type="Начальное образование";
        if ($totalScore >= 94 && $totalScore <= 107) {
            echo "Экологический лидер";$status = "Экологический лидер";
        } elseif ($totalScore >= 54 && $totalScore <= 93) {
            echo "Экоцентр (Для присвоения статуса «Экологический лидер» не хватает " . (94 - $totalScore) . " баллов)";$status = "Экоцентр";
        } elseif ($totalScore >= 0 && $totalScore <= 53) {
            $status = "Без статуса";
            echo "Без статуса. Для присвоения статуса «Экоцентр» не хватает " . (54 - $totalScore) . " баллов. Достигнуть статуса вам помогут материалы сайта «Экологический конструктор», предлагаем перечень разделов, которые будут интересны";
        } else {
            echo "Некорректное количество баллов";
        }
    } else {
        echo "Некорректные опции";
    }
    return [$status,$type];
    
}


function maxball( $db) {
    // Предположим, что вы получаете значение типа из POST
    $questionType = explode(',', $_SESSION['organization_type2']); // 2,4,5,6,7

    $questionTyper = array_map('intval', $questionType);

    // Создаем массив со значениями типов, которые могут быть выбраны
    $selected_types = array(1, 2, 3, 4, 5, 6, 7, 8);

    // Фильтруем массив значений типов, чтобы включить только допустимые значения
    $filtered_types = array_intersect($selected_types, $questionTyper);

    // Если выбраны какие-то допустимые типы, строим условие WHERE
    if (!empty($filtered_types)) {
        $where_condition = ' id_type IN (' . implode(',', $filtered_types) . ')';
    } else {
        $where_condition = '';
    }

    // Строим SQL-запрос для получения суммы баллов
    $sql = "SELECT SUM(max_ball) AS total_sum FROM type WHERE $where_condition";
    $result = $db->query($sql);

    // Проверяем успешность выполнения запроса
    if ($result) {
        // Извлекаем результат запроса
        $row = $result->fetch_assoc();

        // Выводим сумму баллов
        echo " из " . $row['total_sum'];
    } else {
        // Выводим сообщение об ошибке
        echo "Ошибка при выполнении запроса: " . $db->error;
    }
}

function pluralize($number, $singular, $plural1, $plural2)
{
    // Определение склонения в зависимости от значения
    $number = abs($number) % 100;
    $remainder = $number % 10;
    if ($number > 10 && $number < 20) {
        return $plural2;
    } elseif ($remainder > 1 && $remainder < 5) {
        return $plural1;
    } elseif ($remainder == 1) {
        return $singular;
    } else {
        return $plural2;
    }
}
?>