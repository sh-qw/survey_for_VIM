<?php
session_start();
require_once 'db.php';
// echo $_POST['start_date'];
// echo $_POST['start_date'];
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Подключение к базе данных (замените данными вашей конфигурации)

// Проверка подключения
if ($db->connect_error) {
    die("Ошибка подключения: " . $db->connect_error);
}

$startDate = isset($_POST['start_date']) ? $_POST['start_date'] : null;
$endDate = isset($_POST['end_date']) ? $_POST['end_date'] : null;
// Получение данных из таблицы user
$sql = "SELECT 
    result.date AS 'Дата',
    user.specialist_name AS 'Имя специалиста',
    result.result AS 'Результат',
    result.status AS 'Статус',
    user.type_organization AS 'Тип образовательной организации',
    user.leader_email AS 'Email руководителя',
    user.leader_phone AS 'Телефон руководителя',
    user.leader_name AS 'ФИО руководителя',
    user.organization_name AS 'Название организации'
FROM user 
LEFT JOIN result ON result.id_user = user.id_user";

// Добавляем условие для периода, если он указан
if ($startDate && $endDate && isset($_POST['download_option'])){

    
    $sql .= " WHERE result.date BETWEEN STR_TO_DATE('$startDate', '%Y-%m-%d') AND STR_TO_DATE('$endDate', '%Y-%m-%d')";
}

// Добавляем сортировку
$sql .= " ORDER BY result.date DESC";


// Теперь у вас есть полный SQL запрос, который учитывает период при необходимости
$userQuery = $db->query($sql);
$userData = $userQuery->fetch_all(MYSQLI_ASSOC);
if($userData == null){echo 'asdasdas'; $_SESSION['notif'] = 1;  header('Location: download.php');}else{
// Создание нового документа Excel
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Заголовки для таблицы user
$sheet->fromArray(array_keys($userData[0]), null, 'A1');
// Данные для таблицы user

$sheet->fromArray($userData, null, 'A2');
foreach (range('A', $sheet->getHighestColumn()) as $col) {
    $sheet->getColumnDimension($col)->setAutoSize(true);
}
// Создание объекта для записи в файл Excel
$writer = new Xlsx($spreadsheet);

// Определение имени файла
$filename = 'exported_data.xlsx';

// Установка заголовков для скачивания файла
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="' . $filename . '"');
header('Cache-Control: max-age=0');

// Сохранение файла в буфер вывода
$writer->save('php://output');}
?>