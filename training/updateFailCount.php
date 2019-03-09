<?php 
session_start();

$servername = "localhost";
$username = "ariies1_fitness";
$password = "fitpass1234";
$dbname = "ariies1_fitness";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$exerciseFailCount = $_POST['exerciseFailCount'];
$dayId = $_POST['dayId'];
$exerciseId = $_POST['exerciseId'];

$conn -> query('UPDATE day SET exerciseFailCount = '.$exerciseFailCount.' WHERE day.dayId = '.$dayId.' AND exerciseId = '.$exerciseId);




$conn->close();
?>