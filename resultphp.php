<?php
require_once 'db.php';

include 'functions.php';
session_start();
    
if($_SESSION['survey'] == 2){header("Location: /index.php");}
// Обработка данных формы и расчет суммы баллов
$_SESSION['incorr'] = $_POST['incorr'];

$_SESSION['score'] = $_POST['score'];

$questionType = $_SESSION['organization_type2'];
$_SESSION['survey'] = 2;
$totalScore = $_SESSION['score'];
echo $totalScore;echo"sds";
$mass = getStatus($questionType, $totalScore); 
print_r($mass);
    // Вставка данных в таблицу user
    
    $userQuery = "INSERT INTO user (specialist_name, leader_email, leader_phone, leader_name, organization_name,type_organization)
                  VALUES (?, ?, ?, ?, ?,?)";
    
    $stmt = $db->prepare($userQuery);
    $stmt->bind_param('ssssss', $_SESSION['specialist_name'], $_SESSION['leader_email'], $_SESSION['leader_phone'], $_SESSION['leader_name'], $_SESSION['organization_name'],$mass[1]);
    $stmt->execute();

    // Получение id_user вставленной записи
    $userId = $stmt->insert_id;

    // Вставка данных в таблицу result
    $resultQuery = "INSERT INTO result (id_user, result,status,date)
                    VALUES (?, ?,?,NOW())";
    
    // Пример значения для result (замените его на вашу логику)
    $resultValue = $_POST['score'];

    $stmt = $db->prepare($resultQuery);
    $stmt->bind_param('iis', $userId, $resultValue,$mass[0]);
    $stmt->execute();

    // Подтверждение транзакции
    $db->commit();

    echo 'Данные успешно добавлены в базу данных.';

// Вернем результат в виде строки
echo $score;

header("Location: /result.php");
?>