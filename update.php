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
  
  $id = $_GET['update'];
  $adate = $_GET['adate'];
  $mechanics = $_GET['mechanics'];
echo $mechanics;
  echo "<form action='updateChange.php'>";
  echo "<span style='font-size: 30px; border: 1px solid red; background-color: white; color:red; border-radius: 2em; padding: 1%; margin: 5%;'>Change date:</span> <input type=date name='changedDate' style='font-size: 2em;'>";

  echo "<input type='hidden' value='$id' name='id'><input type='hidden' value='$mechanics' name='mechanics'><input type='hidden' value='$adate' name='oldDate'><input type='submit' value='Update!' style='margin:2%; border: 1px solid red; background-color: white; color: red; opacity: 0.8; padding: 1%; border-radius: 2em; text-decoration: none; font-family: Arial; cursor: pointer;'>";
  echo "</form>";


  echo "<br/><br/><br/><form action='updateMechanic.php'>";

  echo "<span style='font-size: 30px; border: 1px solid red; background-color: white; color:red; border-radius: 2em; padding: 1%; margin: 5%;'>Select Your Mechanic!</span>";
  echo "<select name='mechanics'>";
     
      include 'mechanics_load.php';
      query();
    
  echo "</select>";
  echo "<input type='hidden' value='$id' name='id'><input type='hidden' value='$adate' name='adate'><input type='hidden' value='$mechanics' name='oldM'><input type='submit' value='Update!' style='margin:2%; border: 1px solid red; background-color: white; color: red; opacity: 0.8; padding: 1%; border-radius: 2em; text-decoration: none; font-family: Arial; cursor: pointer;'>";
  echo "</form>";

  //$query = "";
  // function yolo(){
  // 	echo "<p style='text-align: center; font-size: 3em; margin-top: 2%; background-color: white; border: 1px solid red; border-radius: 2em; color: red; opacity: 0.9; padding: 2%; font-family: Arial;'>YOLO!</p>";
  // }
 
  mysqli_close($conn);
?>

</body>
</html>