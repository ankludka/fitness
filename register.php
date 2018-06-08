<?php   
//TODO session does nothing
//TODO fix responses


session_start();

$link = mysqli_connect("localhost", "ariies_fitness", "fitness", "ariies_fitness");

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
        else
            echo "You have been registered!";
    }
}

?>