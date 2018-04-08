<!--<?php include 'codes.php'; ?> -->


<!doctype html>
<html lang="en">
  <head>


    <title>Fitness</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

  </head>
  <body>
    <div id="content" class="container-fluid col-sm-3">

      <div id="dayChoice">
        <button class="btn btn-primary" id="dayChange" type="submit">Day A1</button>
      </div>

      <table id="day-a1" class="table table-dark table-hover">
        <thead>
          <tr>
            <th scope="col">Exercise</th>
            <th scope="col">Sets</th>
            <th scope="col">Reps</th>
            <th scope="col">Weight</th>
            <th scope="col">Success</th>
          </tr>
        </thead>
        <tbody>
          <tr data-tier="1">
            <th scope="row">Squats</th>
            <td>5</td>
            <td>3</td>
            <td>0kg</td>
            <td></td>
          </tr>
          <tr data-tier="1">
            <th scope="row">Bench Press</th>
            <td>3</td>
            <td>10</td>
            <td>0kg</td>
            <td></td>
          </tr>
          <tr data-tier="1">
            <th scope="row">Chin ups</th>
            <td>3</td>
            <td>10</td>
            <td>0kg</td>
            <td></td>
          </tr>
          <tr data-tier="2">
            <th scope="row">Lat Pulldown</th>
            <td>3</td>
            <td>15</td>
            <td>0kg</td>
            <td></td>
          </tr>
          <tr>
            <th scope="row">Tricep extensions</th>
            <td>3</td>
            <td>15</td>
            <td>0kg</td>
            <td></td>
          </tr>
          <tr>
            <th scope="row">Leg raises</th>
            <td>3</td>
            <td>15</td>
            <td>0kg</td>
            <td></td>
          </tr>
          <tr>
            <th scope="row">Hyperextensions</th>
            <td>3</td>
            <td>15</td>
            <td>0kg</td>
            <td></td>
          </tr>
          <tr>
            <th scope="row">Pinch hold</th>
            <td>3</td>
            <td>15</td>
            <td>0kg</td>
            <td></td>
          </tr>
          <tr>
            <th scope="row">Wrist curl</th>
            <td>3</td>
            <td>15</td>
            <td>0kg</td>
            <td></td>
          </tr>
          <tr>
            <th scope="row">Reverse wrist curl</th>
            <td>3</td>
            <td>15</td>
            <td>0kg</td>
            <td></td>
          </tr>
          <tr>
            <th scope="row">Finger curl</th>
            <td>3</td>
            <td>15</td>
            <td>0kg</td>
            <td></td>
          </tr>
        </tbody>
      </table>

      <table id="day-b1" class="table table-dark table-hover hide">
        <thead>
          <tr>
            <th scope="col">Exercise</th>
            <th scope="col">Sets</th>
            <th scope="col">Reps</th>
            <th scope="col">Weight</th>
            <th scope="col">Sets done</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">Overhead Press</th>
            <td>5</td>
            <td>5</td>
            <td>0kg</td>
            <td></td>
          </tr>
          <tr>
            <th scope="row">Deadlift</th>
            <td>5</td>
            <td>5</td>
            <td>0kg</td>
            <td></td>
          </tr>
          <tr>
            <th scope="row">Dumbbell Row</th>
            <td>5</td>
            <td>5</td>
            <td>0kg</td>
            <td></td>
          </tr>
        </tbody>
      </table>

      <table id="day-a2" class="table table-dark table-hover hide">
        <thead>
          <tr>
            <th scope="col">Exercise</th>
            <th scope="col">Sets</th>
            <th scope="col">Reps</th>
            <th scope="col">Weight</th>
            <th scope="col">Sets done</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">Bench Press</th>
            <td>5</td>
            <td>5</td>
            <td>0kg</td>
            <td></td>
          </tr>
          <tr>
            <th scope="row">Squats</th>
            <td>5</td>
            <td>5</td>
            <td>0kg</td>
            <td></td>
          </tr>
          <tr>
            <th scope="row">Lat Pulldown</th>
            <td>5</td>
            <td>5</td>
            <td>0kg</td>
            <td></td>
          </tr>
        </tbody>
      </table>

      <table id="day-b2" class="table table-dark table-hover hide">
        <thead>
          <tr>
            <th scope="col">Exercise</th>
            <th scope="col">Sets</th>
            <th scope="col">Reps</th>
            <th scope="col">Weight</th>
            <th scope="col">Sets done</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">Deadlift</th>
            <td>5</td>
            <td>5</td>
            <td>0kg</td>
            <td></td>
          </tr>
          <tr>
            <th scope="row">Overhead Press</th>
            <td>5</td>
            <td>5</td>
            <td>0kg</td>
            <td></td>
          </tr>
          <tr>
            <th scope="row">Dumbbell Row</th>
            <td>5</td>
            <td>5</td>
            <td>0kg</td>
            <td></td>
          </tr>
        </tbody>
      </table>

      <div id="buttons">

          <button class="btn btn-primary" id="removeWeight" type="submit">Remove weight</button>
          <button class="btn btn-primary" id="addWeight" type="submit">Add weight</button>
          <button class="btn btn-primary" id="success" type="submit">Success!</button>
          <br /><br />
          <button class="btn btn-primary" id="endDay" type="submit">End Day</button>
      </div>
    </div>



    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <!-- Optional JavaScript -->
    <script src="script.js"></script>
  </body>
</html>
