<?php
session_start();


function create_day_one($email){

    $servername = "localhost";
    $username = "ariies1_fitness";
    $password = "fitpass1234";
    $dbname = "ariies1_fitness";

    $conn = new mysqli($servername, $username, $password, $dbname);
    
    $userId = $conn -> query("SELECT id FROM users WHERE email ='".$email."';")-> fetch_assoc()['id'];

    $lastDay = ($conn -> query("SELECT MAX(dayId) FROM day")-> fetch_array(MYSQLI_NUM)[0]);
    $lastDay = $lastDay + 1;


    $conn -> query("INSERT INTO `day`(`dayId`, `userId`, `programId`, `dayNumber`, `exerciseId`, `exerciseSuccess`, `exerciseWeight`, `exerciseFailCount`, `exerciseCompleted`)
    VALUES (".$lastDay.",".$userId.",1,1,1,1,50,0,0)");
    $conn -> query("INSERT INTO `day`(`dayId`, `userId`, `programId`, `dayNumber`, `exerciseId`, `exerciseSuccess`, `exerciseWeight`, `exerciseFailCount`, `exerciseCompleted`) 
    VALUES (".$lastDay.",".$userId.",1,1,2,1,20,0,0)");
    $conn -> query("INSERT INTO `day`(`dayId`, `userId`, `programId`, `dayNumber`, `exerciseId`, `exerciseSuccess`, `exerciseWeight`, `exerciseFailCount`, `exerciseCompleted`) 
    VALUES (".$lastDay.",".$userId.",1,1,3,1,15,0,0)");
    $conn -> query("INSERT INTO `day`(`dayId`, `userId`, `programId`, `dayNumber`, `exerciseId`, `exerciseSuccess`, `exerciseWeight`, `exerciseFailCount`, `exerciseCompleted`) 
    VALUES (".$lastDay.",".$userId.",1,1,4,1,0,0,0)");
    $conn -> query("INSERT INTO `day`(`dayId`, `userId`, `programId`, `dayNumber`, `exerciseId`, `exerciseSuccess`, `exerciseWeight`, `exerciseFailCount`, `exerciseCompleted`) 
    VALUES (".$lastDay.",".$userId.",1,1,5,1,6,0,0)");
    $conn -> query("INSERT INTO `day`(`dayId`, `userId`, `programId`, `dayNumber`, `exerciseId`, `exerciseSuccess`, `exerciseWeight`, `exerciseFailCount`, `exerciseCompleted`) 
    VALUES (".$lastDay.",".$userId.",1,1,6,1,10,0,0)");
    $conn -> query("INSERT INTO `day`(`dayId`, `userId`, `programId`, `dayNumber`, `exerciseId`, `exerciseSuccess`, `exerciseWeight`, `exerciseFailCount`, `exerciseCompleted`) 
    VALUES (".$lastDay.",".$userId.",1,1,7,1,0,0,0)");
    $conn -> query("INSERT INTO `day`(`dayId`, `userId`, `programId`, `dayNumber`, `exerciseId`, `exerciseSuccess`, `exerciseWeight`, `exerciseFailCount`, `exerciseCompleted`) 
    VALUES (".$lastDay.",".$userId.",1,1,8,1,10,0,0)");
    
}

function create_day_two($email){

    $servername = "localhost";
    $username = "ariies1_fitness";
    $password = "fitpass1234";
    $dbname = "ariies1_fitness";

    $conn = new mysqli($servername, $username, $password, $dbname);

    $userId = $conn -> query("SELECT id FROM users WHERE email ='".$email."';")-> fetch_assoc()['id'];
    $lastDay = ($conn -> query("SELECT MAX(dayId) FROM day")-> fetch_array(MYSQLI_NUM)[0]);
    $lastDay = $lastDay + 1;

    $conn -> query("INSERT INTO `day`(`dayId`, `userId`, `programId`, `dayNumber`, `exerciseId`, `exerciseSuccess`, `exerciseWeight`, `exerciseFailCount`, `exerciseCompleted`)
    VALUES (".($lastDay).",".$userId.",1,2,9,1,30,0,0)");
    $conn -> query("INSERT INTO `day`(`dayId`, `userId`, `programId`, `dayNumber`, `exerciseId`, `exerciseSuccess`, `exerciseWeight`, `exerciseFailCount`, `exerciseCompleted`) 
    VALUES (".($lastDay).",".$userId.",1,2,10,1,40,0,0)");
    $conn -> query("INSERT INTO `day`(`dayId`, `userId`, `programId`, `dayNumber`, `exerciseId`, `exerciseSuccess`, `exerciseWeight`, `exerciseFailCount`, `exerciseCompleted`) 
    VALUES (".($lastDay).",".$userId.",1,2,11,1,8,0,0)");
    $conn -> query("INSERT INTO `day`(`dayId`, `userId`, `programId`, `dayNumber`, `exerciseId`, `exerciseSuccess`, `exerciseWeight`, `exerciseFailCount`, `exerciseCompleted`) 
    VALUES (".($lastDay).",".$userId.",1,2,4,1,0,0,0)");
    $conn -> query("INSERT INTO `day`(`dayId`, `userId`, `programId`, `dayNumber`, `exerciseId`, `exerciseSuccess`, `exerciseWeight`, `exerciseFailCount`, `exerciseCompleted`) 
    VALUES (".($lastDay).",".$userId.",1,2,5,1,6,0,0)");
    $conn -> query("INSERT INTO `day`(`dayId`, `userId`, `programId`, `dayNumber`, `exerciseId`, `exerciseSuccess`, `exerciseWeight`, `exerciseFailCount`, `exerciseCompleted`) 
    VALUES (".($lastDay).",".$userId.",1,2,12,1,20,0,0)");
    $conn -> query("INSERT INTO `day`(`dayId`, `userId`, `programId`, `dayNumber`, `exerciseId`, `exerciseSuccess`, `exerciseWeight`, `exerciseFailCount`, `exerciseCompleted`) 
    VALUES (".($lastDay).",".$userId.",1,2,13,1,10,0,0)");
    $conn -> query("INSERT INTO `day`(`dayId`, `userId`, `programId`, `dayNumber`, `exerciseId`, `exerciseSuccess`, `exerciseWeight`, `exerciseFailCount`, `exerciseCompleted`) 
    VALUES (".($lastDay).",".$userId.",1,2,8,1,10,0,0)");
}

function create_day_three($email){

    $servername = "localhost";
    $username = "ariies1_fitness";
    $password = "fitpass1234";
    $dbname = "ariies1_fitness";
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    $userId = $conn -> query("SELECT id FROM users WHERE email ='".$email."';")-> fetch_assoc()['id'];
    $lastDay = ($conn -> query("SELECT MAX(dayId) FROM day")-> fetch_array(MYSQLI_NUM)[0]);
    $lastDay = $lastDay + 1;
    
    $conn -> query("INSERT INTO `day`(`dayId`, `userId`, `programId`, `dayNumber`, `exerciseId`, `exerciseSuccess`, `exerciseWeight`, `exerciseFailCount`, `exerciseCompleted`)
    VALUES (".($lastDay).",".$userId.",1,3,14,1,30,0,0)");
    $conn -> query("INSERT INTO `day`(`dayId`, `userId`, `programId`, `dayNumber`, `exerciseId`, `exerciseSuccess`, `exerciseWeight`, `exerciseFailCount`, `exerciseCompleted`) 
    VALUES (".($lastDay).",".$userId.",1,3,15,1,40,0,0)");
    $conn -> query("INSERT INTO `day`(`dayId`, `userId`, `programId`, `dayNumber`, `exerciseId`, `exerciseSuccess`, `exerciseWeight`, `exerciseFailCount`, `exerciseCompleted`) 
    VALUES (".($lastDay).",".$userId.",1,3,3,1,15,0,0)");
    $conn -> query("INSERT INTO `day`(`dayId`, `userId`, `programId`, `dayNumber`, `exerciseId`, `exerciseSuccess`, `exerciseWeight`, `exerciseFailCount`, `exerciseCompleted`) 
    VALUES (".($lastDay).",".$userId.",1,3,4,1,0,0,0)");
    $conn -> query("INSERT INTO `day`(`dayId`, `userId`, `programId`, `dayNumber`, `exerciseId`, `exerciseSuccess`, `exerciseWeight`, `exerciseFailCount`, `exerciseCompleted`) 
    VALUES (".($lastDay).",".$userId.",1,3,5,1,6,0,0)");
    $conn -> query("INSERT INTO `day`(`dayId`, `userId`, `programId`, `dayNumber`, `exerciseId`, `exerciseSuccess`, `exerciseWeight`, `exerciseFailCount`, `exerciseCompleted`) 
    VALUES (".($lastDay).",".$userId.",1,3,6,1,10,0,0)");
    $conn -> query("INSERT INTO `day`(`dayId`, `userId`, `programId`, `dayNumber`, `exerciseId`, `exerciseSuccess`, `exerciseWeight`, `exerciseFailCount`, `exerciseCompleted`) 
    VALUES (".($lastDay).",".$userId.",1,3,7,1,10,0,0)");
    $conn -> query("INSERT INTO `day`(`dayId`, `userId`, `programId`, `dayNumber`, `exerciseId`, `exerciseSuccess`, `exerciseWeight`, `exerciseFailCount`, `exerciseCompleted`) 
    VALUES (".($lastDay).",".$userId.",1,3,8,1,10,0,0)");
}

function create_day_four($email){

    $servername = "localhost";
    $username = "ariies1_fitness";
    $password = "fitpass1234";
    $dbname = "ariies1_fitness";

    $conn = new mysqli($servername, $username, $password, $dbname);

    $userId = $conn -> query("SELECT id FROM users WHERE email ='".$email."';")-> fetch_assoc()['id'];
    $lastDay = ($conn -> query("SELECT MAX(dayId) FROM day")-> fetch_array(MYSQLI_NUM)[0]);
    $lastDay = $lastDay + 1;

    $conn -> query("INSERT INTO `day`(`dayId`, `userId`, `programId`, `dayNumber`, `exerciseId`, `exerciseSuccess`, `exerciseWeight`, `exerciseFailCount`, `exerciseCompleted`)
    VALUES (".($lastDay).",".$userId.",1,2,16,1,50,0,0)");
    $conn -> query("INSERT INTO `day`(`dayId`, `userId`, `programId`, `dayNumber`, `exerciseId`, `exerciseSuccess`, `exerciseWeight`, `exerciseFailCount`, `exerciseCompleted`) 
    VALUES (".($lastDay).",".$userId.",1,2,17,1,20,0,0)");
    $conn -> query("INSERT INTO `day`(`dayId`, `userId`, `programId`, `dayNumber`, `exerciseId`, `exerciseSuccess`, `exerciseWeight`, `exerciseFailCount`, `exerciseCompleted`) 
    VALUES (".($lastDay).",".$userId.",1,2,11,1,8,0,0)");
    $conn -> query("INSERT INTO `day`(`dayId`, `userId`, `programId`, `dayNumber`, `exerciseId`, `exerciseSuccess`, `exerciseWeight`, `exerciseFailCount`, `exerciseCompleted`) 
    VALUES (".($lastDay).",".$userId.",1,2,4,1,0,0,0)");
    $conn -> query("INSERT INTO `day`(`dayId`, `userId`, `programId`, `dayNumber`, `exerciseId`, `exerciseSuccess`, `exerciseWeight`, `exerciseFailCount`, `exerciseCompleted`) 
    VALUES (".($lastDay).",".$userId.",1,2,5,1,6,0,0)");
    $conn -> query("INSERT INTO `day`(`dayId`, `userId`, `programId`, `dayNumber`, `exerciseId`, `exerciseSuccess`, `exerciseWeight`, `exerciseFailCount`, `exerciseCompleted`) 
    VALUES (".($lastDay).",".$userId.",1,2,12,1,20,0,0)");
    $conn -> query("INSERT INTO `day`(`dayId`, `userId`, `programId`, `dayNumber`, `exerciseId`, `exerciseSuccess`, `exerciseWeight`, `exerciseFailCount`, `exerciseCompleted`) 
    VALUES (".($lastDay).",".$userId.",1,2,13,1,10,0,0)");
    $conn -> query("INSERT INTO `day`(`dayId`, `userId`, `programId`, `dayNumber`, `exerciseId`, `exerciseSuccess`, `exerciseWeight`, `exerciseFailCount`, `exerciseCompleted`) 
    VALUES (".($lastDay).",".$userId.",1,2,8,1,10,0,0)");
}

?>