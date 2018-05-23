<?php
session_start();
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
        <div id="error" class="hidden"></div>
        <form method="POST" id="loginForm">
            <input class="inputField" type="email" id="email" name="email" placeholder="e-mail" />
            <input class="inputField" type="password" id="password" name="password" placeholder="password" />
            <div id="checkbox">
                <input type="checkbox" name="stayLogged" id="stayLogged" value="0" checked />
                <label for="stay">Stay logged in.</label>
            </div>
            <input id="loginButton" type="button" name="login" value="login" />
            <input id="registerButton" type="button" name="register" value="register" />


            
        </form>
    </div>

    
    <script src="script.js"></script>
  </body>
</html>
