<!DOCTYPE html>
<html>
<body>
<link type="text/css" rel="stylesheet" href="stylesheet.css"/>
<?php 
  include 'db_variables.php';
  //include 'Ass03.php';
  $conn = mysqli_connect($db_host,$db_username,$db_pass,$db_name) or die ("Could not connect to MySQL");

  //@mysqli_connect($db_host,$db_username,$db_pass,$db_name) or die ("Could not connect to MySQL");
  //@mysqli_select_db($db_name) or die ("No database");
  

  //echo "Connection Successful!";
  // function yolo(){
  // 	echo "<p style='text-align: center; font-size: 3em; margin-top: 2%; background-color: white; border: 1px solid red; border-radius: 2em; color: red; opacity: 0.9; padding: 2%; font-family: Arial;'>YOLO!</p>";
  // }
  $uname = $_GET['uname'];
  $pass = $_GET['pass'];

  if($uname == "admin" && $pass == "admin"){

  	echo "<form action = 'Ass03.php'><input type='submit' value='Home' id='mAvail'></form><br/><br/>";

  	echo "<p style='text-align: center; font-size: 3em; margin-top: 2%; background-color: white; border: 1px solid red; border-radius: 2em; color: red; opacity: 0.9; padding: 2%; font-family: Arial;'>Welcome admin!</p>";
  	

  	echo "<form action='search.php'>";
  	echo "<center><input type='text' name='search' id='search' placeholder='Search..''></center><br/><br/>";
  	echo "</form>";

  	$query = "SELECT * FROM client";
  	$result = mysqli_query($conn, $query);

  	echo "<table style='color: red; font-size: 1.5em; margin: auto; text-align: center;'>";
    echo "<tr><th>ID&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><th>FIRST NAME&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><th>LAST NAME</th><th>ADDRESS&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><th>CAR LICENSE NO.</th><th>CAR ENGINE NO.</th><th>Phone</th><th>APPOINTMENT DATE</th><th>MECHANIC&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th></tr>";
    while($row = mysqli_fetch_array($result)){
    	$id = $row['id'];
    	$mechanics = $row['Mechanic'];
    	$adate = $row['Appointment_Date'];
    	//echo $mechanics;
    	echo "<form action='update.php'>";

      echo "<tr><td>".$row['id']."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>".$row['First_Name']."</td><td>".$row['Last_Name']."&nbsp;&nbsp;&nbsp;&nbsp;</td><td>".$row['Address']."</td><td>".$row['Car_License_No']."</td><td>".$row['Car_Engine_No']."</td><td>".$row['Phone_No']."&nbsp;&nbsp;&nbsp;&nbsp;</td><td>".$row['Appointment_Date']."</td><td>".$row['Mechanic']."</td>";
      echo"<td><input type='hidden' value='$id' name='update'><input type='hidden' value='$mechanics' name='mechanics'><input type='hidden' value='$adate' name='adate'><input type='submit' value='Edit' style='border: 1px solid red; background-color: white; color: red; opacity: 0.8; padding: 1%; border-radius: 2em; text-decoration: none; font-family: Arial; font-size: 1em; cursor: pointer;'></td></form>";
      echo "<center><form action='delete.php'><td><input type='hidden' value='$id' name='id'><input type='hidden' value='$mechanics' name='mechanics'><input type='hidden' value='$adate' name='adate'><input type='submit' value='Delete' style='margin:2%; border: 1px solid red; background-color: white; color: red; opacity: 0.8; padding: 1%; border-radius: 2em; text-decoration: none; font-family: Arial; cursor: pointer; font-size: 1em;'></td></tr></form></center>";
  }

    echo "</table>";
  }
  else{
  	echo "<p style='text-align: center; font-size: 3em; margin-top: 20%; background-color: white; border: 1px solid red; border-radius: 2em; color: red; opacity: 0.9; padding: 2%; font-family: Arial;'>invalid username or password!</p>";
  }
  //echo "<button value='yolo?' onclick='php:yolo()'>YOLO</button>";

  //echo"<br/><br/><form action='update.php'><input type='submit' value='Edit' style='border: 1px solid red; background-color: white; color: red; opacity: 0.8; padding: 1%; border-radius: 2em; text-decoration: none; font-family: Arial;'><br/><br/>";

  mysqli_close($conn);
?>

</body>
</html>