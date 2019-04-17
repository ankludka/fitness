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

$email = $_SESSION["email"];
$userId = $conn -> query("SELECT id FROM users WHERE email ='".$email."';")-> fetch_assoc()['id'];
$dayId = $_POST['dayId'];
$exerciseId = $_POST['exerciseId'];
$exerciseWeight = $_POST['exerciseWeight'];

$conn -> query('UPDATE exerciseCurrentStatus SET exerciseWeight = '.$exerciseWeight.' WHERE day.dayId = '.$dayId.' AND exerciseId = '.$exerciseId);
$conn -> query('UPDATE exerciseCurrentStatus SET exerciseWeight = '.$exerciseWeight.' WHERE exerciseId = '.$exerciseId.' AND userId = '.$userId);

$conn->close();
?>