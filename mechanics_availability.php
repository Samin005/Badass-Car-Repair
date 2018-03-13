<!DOCTYPE html>
<html>
<body>
<link type="text/css" rel="stylesheet" href="stylesheet.css"/>

<?php
    include 'db_variables.php';
    //include 'd_array.php';
    //echo $color;
    @mysqli_connect($db_host,$db_username,$db_pass,$db_name) or die ("Could not connect to MySQL");
    //@mysqli_select_db($db_name) or die ("No database");
    $conn = mysqli_connect($db_host,$db_username,$db_pass,$db_name);

    //echo "Connection Successful!";
    //echo "ma niggs!";
    
echo "<span style='margin-left: 15%; margin-top: 5%; border: 1px solid red; border-top-left-radius: 2em; border-bottom-right-radius: 2em; background-color: white; opacity:0.8; display: inline-block; padding: 1%; font-size: 2em; color: red; font-family: Arial;'>In the table,<br/> The number of clients <br/>a mechanic has per day is shown.</span><br/><br/>";
echo "<span style='margin-left: 25%; border: 1px solid red; border-top-left-radius: 2em; border-bottom-right-radius: 2em; background-color: white; opacity:0.8; display: inline-block; padding: 1%; font-size: 2em; color: red; font-family: Arial;'>One mechanic cannot have<br/>more than 4 clients per day!</span>";
  $result  = "SELECT * FROM mechanics";
  $mydata = mysqli_query($conn,$result);
  echo "<table style='float: right; margin-top: -10%; margin-left: -4%;'><tr>";
  echo "<th> Date </th>";
  while($record = mysqli_fetch_array($mydata)){
    echo '<th>' .$record['Name']. '</th>';
  }
    echo "</tr>";

    $query  = "SELECT * FROM appointments_per_day";
    $p = mysqli_query($conn,$query);
    while($row = mysqli_fetch_array($p)){

       echo "<tr><td>".$row['Date']."</td><td>&nbsp;&nbsp;".$row['Tom']."</td><td>&nbsp;&nbsp;&nbsp;&nbsp;".$row['Mitchel']."</td><td>&nbsp;&nbsp;&nbsp;".$row['Drake']."</td><td>&nbsp;&nbsp;&nbsp;".$row['Wade']."</td><td>&nbsp;&nbsp;&nbsp;".$row['Razor']."</td></tr>";
    }
     //$row = mysqli_fetch_array($p);
     
    echo "</table>";

    mysqli_close($conn);
    
?>

</body>
</html>