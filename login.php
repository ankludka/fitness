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



if( array_key_exists("login", $_POST))
{
    $email = mysqli_real_escape_string($link, $_POST['email']);
    $password = mysqli_real_escape_string($link, $_POST['password']);
    

    $query = "SELECT password FROM users WHERE email='".$email."'";
    $result = mysqli_query($link, $query);


    if(mysqli_num_rows($result) > 0)
    {
        $row = mysqli_fetch_assoc($result);
        $hash = $row['password'];

        if (password_verify($password, $hash))
        {
            //TODO redirect to training page, load users data, cookie stuff
            if (array_key_exists("stayLogged", $_POST))
                setcookie("email", $email, time()+60*60*24*31);
            else
                $_SESSION["email"] = $email;
            echo "success";
        }
        else
            echo "Invalid e-mail or password.";
    }
    else
        echo "Invalid e-mail or password.";
}

?>