
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

    <h1><center>Flowers</center></h1></br>

<?php

class MyDB extends SQLite3 {
   function __construct() {
      $this->open('flowers.db');
   }
}

$database = new MyDB();


$database->exec('CREATE TABLE IF NOT EXISTS flowers(genus varchar(255), species varchar(255), comname varchar (255))');

$results = $database->query('SELECT * FROM flowers');

echo "<table width=100%>
<tr>
<th>GENUS</th>
<th>SPECIES</th>
<th>Common Name (Click to view 10 recent sightings)</th>
<th>Modify</th>
</tr>";




while($row = $results->fetchArray()){


$COMNAME= $row['COMNAME'];



echo "<tr>";
echo "<td>" . $row['GENUS'] .  "</td> ";
echo "<td>" . $row['SPECIES'] .  "</td>";
echo "<td> <a href='sightings.php?id=" . $COMNAME . " '>" . $row['COMNAME'] . "</a> </td>";
echo "<td> <a href='update.php?edit=" . $COMNAME . " '>Update</a> </td>";


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
