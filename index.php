
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel='stylesheet' type='text/css' href='style.css'/>
    <link rel='stylesheet' type='text/css' href='buildings.css'/>
  </head>

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="index.php">Add Sighting</a>
  <a href="data.php">View Flowers</a>
</div>


    <div id = "main">
      <span onclick="openNav()">&#9776;</span>
    </div>
    <script>
    function openNav() {
          document.getElementById("mySidenav").style.width = "250px";
          document.getElementById("main").style.marginLeft = "250px";
      }

      function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
            document.getElementById("main").style.marginLeft = "0";
      }
      </script>
      <h1><center>Add Sightings</center></h1>



  <?php


  class MyDB extends SQLite3 {
     function __construct() {
        $this->open('flowers.db');
     }
  }

  $database = new MyDB();

$database->exec('CREATE TABLE IF NOT EXISTS SIGHTINGS(GENUS varchar(255), SPECIES varchar(255), COMNAME varchar (255))');


   ?>

<form method= "POST" class="form-group">
<br><br><br><br>
  Enter name of flower(Flower must exist):
  <input type = "text" class="form-control" name = "NAME"</input>
  <br>

  Your Name:
  <input type = "text" class="form-control" name = "PERSON"</input>
  <br>

  Location observed:
  <input type = "text" class="form-control" name = "LOCATION"</input>
  <br>

  Date (yyyy-mm-dd):
  <input type = "text" class="form-control" name = "SIGHTED"</input>
  <br>

  <input type = "submit" class="btn btn-primary btn-block" value = "Save Sighting" </input>

</form>

<?php
if (isset($_POST['NAME']) && isset($_POST['PERSON']) && isset($_POST['LOCATION']) && isset($_POST['SIGHTED'])){

$NAME= $_POST['NAME'];
$PERSON=$_POST['PERSON'];
$LOCATION=$_POST['LOCATION'];
$SIGHTED=$_POST['SIGHTED'];


$database->exec("INSERT INTO sightings (NAME, PERSON, LOCATION, SIGHTED) VALUES ('$NAME', '$PERSON', '$LOCATION', '$SIGHTED')");

}


?>
