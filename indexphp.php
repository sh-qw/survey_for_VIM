<?php 
session_start();
echo $_POST['organization_type'];
$_SESSION['organization_type'] = $_POST['organization_type'];
if (!empty($_POST['answerOptions']) && $_POST['organization_type'] == 2) {
$_SESSION['answerOptions'] = $_POST['answerOptions'];
}
$_SESSION['survey']= 1;
print_r($_SESSION['answerOptions']);
$_SESSION['specialist_name'] = $_POST['specialist_name'];
$_SESSION['leader_email'] = $_POST['leader_email'];
$_SESSION['leader_phone'] = $_POST['leader_phone'];
$_SESSION['leader_name'] = $_POST['leader_name'];
$_SESSION['organization_name'] = $_POST['organization_name'];
$_SESSION['organization_type'];
header("Location: /survey.php");
?>