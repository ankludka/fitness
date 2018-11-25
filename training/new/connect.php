<?php

$servername = "localhost";
$username = "ariies1_fitness";
$password = "fitpass1234";
$dbname = "ariies1_fitness";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

class day {
    var $dayNumber;
    var $dayName;
    var $dayNameLong;
    var $exerciseList;
    function __construct($dayNumber, $dayName, $dayNameLong){
        $this->dayNumber = $dayNumber;
        $this->dayName = $dayName;
        $this->dayNameLong = $dayNameLong;
        $this->exerciseList = array();
    }
}

class exercise {
    var $name;
    var $weight;
    var $tier;
    var $failCount;
    var $id;
    var $lastSetAmrap;
    var $weightIncrement;
    var $completed;
    function __construct($name, $weight, $tier, $failCount, $id, 
                         $lastSetAmrap, $weightIncrement, $completed){
        $this->name = $name;
        $this->weight = $weight;
        $this->tier = $tier;
        $this->failCount = $failCount;
        $this->id = $id;
        $this->lastSetAmrap = $lastSetAmrap;
        $this->weightIncrement = $weightIncrement;
        $this->completed = $completed;
    }
}



$day1 = new day(1, "A1", "Squat day");
$day2 = new day(2, "B1", "OHP day");
$day3 = new day(3, "A2", "Bench Press day");
$day4 = new day(4, "B2", "Deadlift day");

array_push($day1->exerciseList, new exercise("Squats", 20, 1, 0, 1, TRUE, 5, FALSE));
array_push($day1->exerciseList, new exercise("Bench Press", 20, 2, 0, 2, FALSE, 5, FALSE));
array_push($day1->exerciseList, new exercise("Lat Pulldown", 10, 3, 0, 3, TRUE, 2.5, FALSE));
array_push($day1->exerciseList, new exercise("Chin Ups", 0, 3, 0, 4, TRUE, 0, FALSE));
array_push($day1->exerciseList, new exercise("Curls", 6, 3, 0, 5, TRUE, 1, FALSE));
array_push($day1->exerciseList, new exercise("Tricep Extensions", 10, 3, 0, 6, TRUE, 2.5, FALSE));
array_push($day1->exerciseList, new exercise("Leg Raises", 0, 3, 0, 7, TRUE, 0, FALSE));
array_push($day1->exerciseList, new exercise("Cable Crunches", 5, 3, 0, 8, TRUE, 1, FALSE));
array_push($day1->exerciseList, new exercise("Forearm Set", 15, 3, 0, 9, FALSE, 5, FALSE));

//TODO day2,3,4





/*
$sql = "SELECT id, firstname, lastname FROM MyGuests";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
    }
} else {
    echo "0 results";
}

*/

$conn->close();


?>