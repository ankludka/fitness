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

$userId = $_POST['userId'];
$dayId = $_POST['dayId'];
$date = $_POST['date'];

$dayExists = $conn -> query("SELECT COUNT(*) FROM historyOfDays WHERE dayId = ".$dayId." AND userId = ".$userId) -> fetch_array(MYSQLI_NUM)[0];

if ($dayExists){
    $conn -> query("UPDATE historyOfDays SET dateOfCompletion = '".$date."' WHERE dayId = ".$dayId." AND userId = ".$userId);
}
else{
    $conn -> query("INSERT INTO historyOfDays(dayId, userId, dateOfCompletion) VALUES ('".$dayId."', '".$userId."', '".$date."')");
}


$conn->close();
?>