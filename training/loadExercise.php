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

$q = "SELECT MAX(day.dayId) FROM day JOIN users ON day.userId = users.id
    WHERE users.email = '".$email."'";

$lastDay = $conn -> query($q) -> fetch_array(MYSQLI_NUM)[0];

if ($lastDay == NULL){
    die("day was null");
}


$result = $conn -> query("SELECT DISTINCT day.dayId, day.dayNumber, program.dayName, program.Id as 'programId', exercise_dictionary.name AS 'exerciseName', day.exerciseId, day.exerciseWeight, exercise.tier AS 'exerciseTier', day.exerciseFailCount, day.exerciseSuccess, exercise.lastSetAmrap as 'exerciseLastSetAmrap', exercise.weightIncrement AS 'exerciseWeightIncrement', day.exerciseCompleted, users.email, users.id AS 'userId'
FROM day JOIN exercise_dictionary ON day.exerciseId = exercise_dictionary.id JOIN users ON day.userId = users.id JOIN program ON day.dayNumber = program.dayNumber JOIN exercise ON day.exerciseId = exercise.id
WHERE users.email = '".$email."' AND day.dayId =".$lastDay);

$dbdata = array();

while($row = $result->fetch_assoc()){
    $dbdata[]=$row;
}
echo json_encode($dbdata);


$conn->close();
?>