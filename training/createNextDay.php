<?php

error_reporting(-1); // reports all errors
ini_set("display_errors", "1"); // shows all errors
ini_set("log_errors", 1);
ini_set("error_log", "/tmp/php-error.log");

session_start();



$servername = "localhost";
$username = "ariies1_fitness";
$password = "fitpass1234";
$dbname = "ariies1_fitness";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// get last day

$email = $_SESSION["email"];

$lastDayQuery = "SELECT dayId FROM historyOfDays JOIN users ON historyOfDays.userId = users.id WHERE users.email ='".$email."' ORDER BY dateOfCompletion LIMIT 1";

$lastDayNumber = $conn -> query($lastDayQuery) -> fetch_array(MYSQLI_NUM)[0];

if ($lastDayNumber == NULL){
    die("day was null");
}


$result = $conn -> query("SELECT day.dayId, day.dayNumber, program.dayName, program.id AS 'programId', exercise_dictionary.name AS 'exerciseName', day.exerciseId, day.exerciseWeight, exercise.tier AS 'exerciseTier', day.exerciseFailCount, day.exerciseSuccess, exercise.lastSetAmrap as 'exerciseLastSetAmrap', exercise.weightIncrement AS 'exerciseWeightIncrement', day.exerciseCompleted, users.email, users.id AS 'userId'
FROM day JOIN exercise_dictionary ON day.exerciseId = exercise_dictionary.id JOIN users ON day.userId = users.id JOIN program ON day.dayNumber = program.dayNumber JOIN exercise ON day.exerciseId = exercise.id
WHERE users.email = '".$email."' AND day.dayId =".$lastDayNumber);

$lastDay = array();

while($row = $result->fetch_assoc()){
    $lastDay[]=$row;
}

//print_r($lastDay);
//echo $lastDay[0]["exerciseName"];



//create next day


$userId = $conn -> query("SELECT id FROM users WHERE email ='".$email."';")-> fetch_assoc()['id'];

$dayNumber = ($conn -> query("SELECT MAX(dayId) FROM day")-> fetch_array(MYSQLI_NUM)[0]);
$dayNumber = $dayNumber + 1;



    for($i = 0; $i< count($lastDay)-1; $i++){

        $weight = $lastDay[$i]["exerciseWeight"] + $lastDay[$i]["exerciseWeightIncrement"];

        $conn -> query("INSERT INTO `day`(`dayId`, `userId`, `programId`, `dayNumber`,
                        `exerciseId`, `exerciseSuccess`, `exerciseWeight`, `exerciseFailCount`, `exerciseCompleted`)
            VALUES ('".$dayNumber."','".$userId."','".$lastDay[$i]["programId"]."','".$lastDay[$i]["dayNumber"]."','".$lastDay[$i]["exerciseId"]."','"
                     ."1"."','".$weight."','".$lastDay[$i]["exerciseFailCount"]."','0')");
    }



$conn->close();
?>