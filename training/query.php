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


$email = 'Ariies10';






$day = "SELECT * FROM day JOIN users ON day.userId = users.id WHERE users.email = '".$email."'AND day.dayId =".$lastDay;

$result = $conn -> query("SELECT day.dayNumber, day.exerciseCompleted, day.exerciseFailCount, exercise_dictionary.name, day.exerciseSuccess, day.exerciseWeight, users.email 
FROM day JOIN exercise_dictionary ON day.exerciseId = exercise_dictionary.id JOIN users ON day.userId = users.id 
WHERE users.email = 'Ariies11' AND day.dayId = 2");
//print_r($result);

$r = array();
while(true){
    $row = mysqli_fetch_array($result);
    if(!$row)break;
    $r[] = json_encode((object)$row);
}
echo json_encode($r);
echo "<br>";
echo $r;



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