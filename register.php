<?php   
//TODO fix responses


session_start();

$link = mysqli_connect("localhost", "ariies1_fitness", "fitpass1234", "ariies1_fitness");

if (!$link) {
  echo "Error: Unable to connect to MySQL." . PHP_EOL;
  echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
  echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
  exit;
}



if( array_key_exists("register", $_POST))
{
    $email = mysqli_real_escape_string($link, $_POST['email']);
    $password = mysqli_real_escape_string($link, $_POST['password']);

    //Check if email is already taken
    $query = "SELECT id FROM users WHERE email ='".$email."';";
    $result = mysqli_query($link, $query);

    if(mysqli_num_rows($result) > 0)
        echo "This e-mail address is already registered.";
    else
    {
        //TODO maybe some e-mail confirmation?
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO `users` (`email`, `password`) VALUES ('".$email."', '".$hashedPassword."');";

        if(!mysqli_query($link, $query))
            echo "Registration failed - please try again later.";
        else {
            echo "You have been registered!";
            create_day_one($email);
        }
            
        
    }
}

function create_day_one($email){

    $servername = "localhost";
    $username = "ariies1_fitness";
    $password = "fitpass1234";
    $dbname = "ariies1_fitness";

    $conn = new mysqli($servername, $username, $password, $dbname);
    
    $userId = $conn -> query("SELECT id FROM users WHERE email ='".$email."';")-> fetch_assoc()['id'];
    $lastDay = $conn -> query("SELECT MAX(userId) FROM day");

    $conn -> query("INSERT INTO `day`(`dayId`, `userId`, `programId`, `dayNumber`, `exerciseId`, `exerciseSuccess`, `exerciseWeight`, `exerciseFailCount`, `exerciseCompleted`)
    VALUES (".($lastDay+1).",".$userId.",1,1,1,1,40,0,0)");
    $conn -> query("INSERT INTO `day`(`dayId`, `userId`, `programId`, `dayNumber`, `exerciseId`, `exerciseSuccess`, `exerciseWeight`, `exerciseFailCount`, `exerciseCompleted`) 
    VALUES (".($lastDay+1).",".$userId.",1,1,2,1,20,0,0)");
    $conn -> query("INSERT INTO `day`(`dayId`, `userId`, `programId`, `dayNumber`, `exerciseId`, `exerciseSuccess`, `exerciseWeight`, `exerciseFailCount`, `exerciseCompleted`) 
    VALUES (".($lastDay+1).",".$userId.",1,1,3,1,15,0,0)");
    $conn -> query("INSERT INTO `day`(`dayId`, `userId`, `programId`, `dayNumber`, `exerciseId`, `exerciseSuccess`, `exerciseWeight`, `exerciseFailCount`, `exerciseCompleted`) 
    VALUES (".($lastDay+1).",".$userId.",1,1,4,1,0,0,0)");
    $conn -> query("INSERT INTO `day`(`dayId`, `userId`, `programId`, `dayNumber`, `exerciseId`, `exerciseSuccess`, `exerciseWeight`, `exerciseFailCount`, `exerciseCompleted`) 
    VALUES (".($lastDay+1).",".$userId.",1,1,5,1,6,0,0)");
    $conn -> query("INSERT INTO `day`(`dayId`, `userId`, `programId`, `dayNumber`, `exerciseId`, `exerciseSuccess`, `exerciseWeight`, `exerciseFailCount`, `exerciseCompleted`) 
    VALUES (".($lastDay+1).",".$userId.",1,1,6,1,10,0,0)");
    $conn -> query("INSERT INTO `day`(`dayId`, `userId`, `programId`, `dayNumber`, `exerciseId`, `exerciseSuccess`, `exerciseWeight`, `exerciseFailCount`, `exerciseCompleted`) 
    VALUES (".($lastDay+1).",".$userId.",1,1,7,1,0,0,0)");
    $conn -> query("INSERT INTO `day`(`dayId`, `userId`, `programId`, `dayNumber`, `exerciseId`, `exerciseSuccess`, `exerciseWeight`, `exerciseFailCount`, `exerciseCompleted`) 
    VALUES (".($lastDay+1).",".$userId.",1,1,8,1,10,0,0)");
    
}


?>