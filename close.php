<?php
require_once 'db.php';

$sql = "SELECT open FROM survey ";
$result = $db->query($sql);
$row = $result->fetch_assoc();
print_r($row);
echo $row[0][0];
if($row['open'] == 1 ){
    $sql = "UPDATE `survey` SET `open` = '2' WHERE `survey`.`id` = 1; ";
    $result = $db->query($sql);
}else{
    $sql = "UPDATE `survey` SET `open` = '1' WHERE `survey`.`id` = 1; ";
    $result = $db->query($sql);
}
header('Location: download.php');
?>