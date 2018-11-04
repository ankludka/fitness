<?php
  session_start();

  if(array_key_exists("logout", $_GET)){
    unset($_COOKIE);
    setcookie("id", "", time()-60*60);
    unset($_SESSION["id"]);
    session_destroy();
    $_SESSION = array();
    $_COOKIE = array();
  }
  
  else if(array_key_exists("id", $_SESSION)){
    header("Location: training/index.php");
  }
  
  if(array_key_exists("id", $_COOKIE)){
    $_SESSION["id"] = $_COOKIE["id"];
  }

?>

<!doctype html>
<html lang="en">
  <head>


    <title>Fitness</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="style.css">
    
  </head>
  <body>

    <div id="container">
        <div id="alert" class="hidden"></div>
        <form method="POST" id="loginForm">
            <input class="inputField" type="email" id="email" name="email" placeholder="E-mail" />
            <input class="inputField" type="password" id="password" name="password" placeholder="Password" />
            <div id="checkbox">
                <input type="checkbox" name="stayLogged" id="stayLogged" value="0" checked />
                <label for="stayLogged">Stay logged in.</label>
            </div>
            <input id="loginButton" type="button" name="login" value="login" />
            <input id="registerButton" type="button" name="register" value="register" />


            
        </form>
    </div>

    
    <script src="script.js"></script>
  </body>
</html>
