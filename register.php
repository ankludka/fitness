<?php   
//TODO fix responses

session_start();

$servername = "localhost";
$username = "ariies1_fitness";
$password = "fitpass1234";
$dbname = "ariies1_fitness";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

    $email = $conn -> real_escape_string($_POST['email']);
    $password = $conn -> real_escape_string($_POST['password']);

    //Check if email is already taken
    $result = $conn -> query("SELECT id FROM users WHERE email ='".$email."';");

    if($result -> num_rows)
        echo "This e-mail address is already registered.";
    else
    {
        //TODO maybe some e-mail confirmation?
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        if(!$conn-> query("INSERT INTO `users` (`email`, `password`) VALUES ('".$email."', '".$hashedPassword."');"))
            echo "Registration failed - please try again later.";
        else {
            echo "You have been registered!";
        }
            
        
    }
?>