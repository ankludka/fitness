<?php 

$servername = "localhost";
$username = "ariies1_fitness";
$password = "fitpass1234";
$dbname = "ariies1_fitness";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
    
$email = 'Ariies';
printf ($conn -> query("SELECT id FROM users WHERE email ='".$email."';")-> fetch_assoc()['id']);
//printf($result->fetch_assoc()['id']);


if ($result = $conn->query("SELECT * FROM users WHERE email = 'Ariies'")) {
   // printf("Select returned %d rows.\n", $result->num_rows);

  /* while ($row = $result->fetch_assoc()) {
    printf($row['email']);
    printf('</br>'); 
}
*/
    /* free result set */
    $result->close();
}





$conn->close();
?>