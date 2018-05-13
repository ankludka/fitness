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

        //Check if email is already taken
        $query = "SELECT id FROM users WHERE email ='".mysqli_real_espace_string($link, $_POST'[email'])."'";
        $result = mysqli_query($link, $query);

        if(mysqli_num_rows($result) > 0)
        {
            $error .= "This e-mail address is already registered."
        }
        //register user
        else
        {
            $email = mysqli_real_espace_string($link, $_POST['email']);
            $password = mysqli_real_espace_string($link, $_POST['password']);
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $query = "INSERT INTO users (email, password) VALUES ('".$email."', '".$hashedPassword."')";

            echo("You have been registered!");
        }
        


    }

    if( array_key_exists("login", $_POST))
    {
        echo("<br>");
        echo(php_version());
        echo("<br>");
        

        $email = mysqli_real_espace_string($link, $_POST['email']);
        $password = mysqli_real_espace_string($link, $_POST['password']);

        $query = "SELECT password FROM users WHERE email='".$email."'";
        $result = mysqli_query($link, $query);



        if(mysqli_num_rows($result) > 0)
        {
            $row = mysqli_fetch_assoc($result);
            $hash = $row['password'];

            if (password_verify($password, $hash))
            {
                echo 'Password is valid!';
            }
            else
            {
                echo 'Invalid password.';
            }

            //$error .= "Wrong e-mail or password. Try again."
        }
        else
        {
            echo("Wrong email or password!");
        }
        
       //print_r($_POST);
        
        //echo(htmlentities("Soon™ to be implemented"));

    }


?>