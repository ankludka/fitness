<?php   

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
    {
//TODO Redirect to front page and display error there
        echo "This e-mail address is already registered.";
    }
//register user
    else
    {
//TODO maybe some e-mail confirmation?
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO `users` (`email`, `password`) VALUES ('".$email."', '".$hashedPassword."');";

        if(!mysqli_query($link, $query))
        {
//TODO Redirect to front page and display error there
            echo "<br>Registration failed - please try again later.<br>";
        }
//TODO Redirect to front page and display message there
        echo("<br>You have been registered!");
    }
}

//login user
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
            echo 'Password is valid!';
        }
        else
        {   
//TODO Redirect to front page and display error there
            echo 'Invalid password.';
        }

    }
    else
    {
//TODO Redirect to front page and display error there
        echo "Wrong email or password!";
    }
}


?>