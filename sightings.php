

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

    <h1><center>Sightings</center></h1>




<?php
$id = $_GET['id'];

class MyDB extends SQLite3 {
   function __construct() {
      $this->open('flowers.db');
   }
}

$database = new MyDB();


$database->exec('CREATE TABLE IF NOT EXISTS flowers(genus varchar(255), species varchar(255), comname varchar (255))');

$results = $database->query("SELECT PERSON, SIGHTED, LOCATION FROM SIGHTINGS WHERE NAME= '$id' ORDER BY SIGHTED DESC limit 10");
// $results = $database->query('SELECT * FROM SIGHTINGS WHERE NAME="Lovage"');
// $result = $database($con,"SELECT * FROM SIGHTINGS  WHERE NAME='$id'");
// $database=$con->prepare($query);
echo "<table width=100%>
<tr>
<th>Viewer</th>
<th>Date</th>
<th>Location</th>
</tr>";




while($row = $results->fetchArray()){


echo "<tr>";
echo "<td>" . $row['PERSON'] .  "</td>";
echo "<td>" . $row['SIGHTED'] .  "</td>";
echo "<td>" . $row['LOCATION'] . "</td>";
echo "</tr>";

// $row = (object) $row;
// echo "Genus: ";
// echo $row->GENUS. "</br>";
// echo "Species: ";
// echo $row->SPECIES. "</br>";
// echo "Common name: ";
// echo $row->COMNAME. "</br>";
//
// echo '<p>---------</p>';


}
echo "</table>";





 ?>
