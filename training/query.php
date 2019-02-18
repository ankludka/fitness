<?php 

$servername = "localhost";
$username = "ariies1_fitness";
$password = "fitpass1234";
$dbname = "ariies1_fitness";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$lastDay = $conn -> query("SELECT MAX(day.dayId) FROM day JOIN users ON day.userId = users.id WHERE users.email = 'Ariies10'") -> fetch_array(MYSQLI_NUM)[0];


$email = 'Ariies11';






$day = "SELECT * FROM day JOIN users ON day.userId = users.id WHERE users.email = '".$email."'AND day.dayId =".$lastDay;

$result = $conn -> query("SELECT day.dayNumber, program.dayName, exercise_dictionary.name AS 'exerciseName', day.exerciseId, day.exerciseWeight, exercise.tier AS 'exerciseTier', day.exerciseFailCount, day.exerciseSuccess, exercise.lastSetAmrap as 'exerciseLastSetAmrap', exercise.weightIncrement AS 'exerciseWeightIncrement', day.exerciseCompleted, users.email, users.id AS 'userId'
FROM day JOIN exercise_dictionary ON day.exerciseId = exercise_dictionary.id JOIN users ON day.userId = users.id JOIN program ON day.dayNumber = program.dayNumber JOIN exercise ON day.exerciseId = exercise.id
WHERE users.email = '".$email."' AND day.dayId =".$lastDay);
//print_r($result);

$dbdata = array();

while($row = $result->fetch_assoc()){
    $dbdata[]=$row;
}
echo json_encode($dbdata);




//printf ($conn -> query("SELECT id FROM users WHERE email ='".$email."';")-> fetch_assoc()['id']);
//printf($result->fetch_assoc()['id']);

/* 
if ($result = $conn->query("SELECT * FROM users WHERE email = 'Ariies'")) {
   // printf("Select returned %d rows.\n", $result->num_rows);

  while ($row = $result->fetch_assoc()) {
    printf($row['email']);
    printf('</br>'); 
}


    $result->close();
}
*/



$conn->close();
?>