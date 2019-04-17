<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();


    $servername = "localhost";
    $username = "ariies1_fitness";
    $password = "fitpass1234";
    $dbname = "ariies1_fitness";

    $conn = new mysqli($servername, $username, $password, $dbname);
    
    $email = $_POST['email'];
    $programId = $_POST['programId'];
    $dayNumber = $_POST['dayNumber'];


    $userId = $conn -> query("SELECT id FROM users WHERE email ='".$email."';")-> fetch_assoc()['id'];

    $lastDay = ($conn -> query("SELECT MAX(dayId) FROM day")-> fetch_array(MYSQLI_NUM)[0]);
    $lastDay = $lastDay + 1;

    $exerciseStatusList = array();
     
     $exerciseList = $conn -> query("SELECT * FROM `program` WHERE id = ".$programId." AND dayNumber = ".$dayNumber);

      
     $exerciseStatus = $conn -> query("SELECT userId, exerciseId, exerciseWeight, exerciseFailCount, tier, lastSetAmrap, weightIncrement 
                                        FROM `exerciseCurrentStatus` JOIN exercise ON exerciseCurrentStatus.exerciseId = exercise.id WHERE userId = ".$userId);

     while ($statusRow = $exerciseStatus -> fetch_assoc()){
        $exerciseStatusList [$statusRow['exerciseId']] = $statusRow;
     }

     while($row = $exerciseList -> fetch_assoc()){
        if(array_key_exists($row['exerciseId'], $exerciseStatusList)){
            $weight = $exerciseStatusList[$row['exerciseId']]['exerciseWeight'] + $exerciseStatusList[$row['exerciseId']]['weightIncrement'];
            $conn -> query("UPDATE `exerciseCurrentStatus` SET `exerciseWeight`=".$weight." WHERE `userId` = ".$userId." AND `exerciseId` =".$row['exerciseId']);
            $failCount = $exerciseStatusList[$row['exerciseId']]['exerciseFailCount'];
        }
        else{
            $weight = $row['exerciseWeight'];
            $failCount = 0;
            $conn -> query("INSERT INTO `exerciseCurrentStatus`(`userId`, `exerciseId`, `exerciseWeight`, `exerciseFailCount`) VALUES (".$userId.",".$row['exerciseId'].",".$weight.",0)");
        }

        $conn -> query("INSERT INTO `day`(`dayId`, `userId`, `programId`, `dayNumber`, `exerciseId`, `exerciseSuccess`, `exerciseWeight`, `exerciseFailCount`, `exerciseCompleted`)
            VALUES (".$lastDay.",".$userId.",".$programId.",".$dayNumber.",".$row['exerciseId'].",1,".$weight.",".$failCount.",0)");
     }



?>