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
  $search = $_GET['search'];

  echo "<div style='border: 1px solid red; border-radius: 2em; background-color: white; opacity:0.8; display: inline-block; padding: 1%; margin: 1%; font-size: 2em; color: red; font-family: Arial;'>Search results for '$search',</div><br/><br/>";

  $query = "SELECT * FROM client WHERE id LIKE '%$search%' OR First_Name LIKE '%$search%' OR Last_Name LIKE '%$search%' OR Address LIKE '%$search%' OR  Car_License_No LIKE '%$search%' OR  Car_Engine_No LIKE '%$search%' OR  Phone_No LIKE '%$search%' OR  Appointment_Date LIKE '%$search%' OR  Mechanic LIKE '%$search%'";
  // if(mysqli_query($conn, $query)){
  //       echo "<p>query successful!</p>";
  //     }
  //     else{
  //       echo "Error: " . $query . "<br>" . mysqli_error($conn);
  //     }
    
  //$query = "SELECT * FROM client";
   $result = mysqli_query($conn, $query);

    echo "<table style='color: red; font-size: 1.5em; margin: auto; text-align: center;'>";
    echo "<tr><th>ID&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><th>FIRST NAME&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><th>LAST NAME</th><th>ADDRESS&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><th>CAR LICENSE NO.</th><th>CAR ENGINE NO.</th><th>Phone</th><th>APPOINTMENT DATE</th><th>MECHANIC&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th></tr>";
     while($row = mysqli_fetch_array($result)){
      echo "<tr><td>".$row['id']."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>".$row['First_Name']."</td><td>".$row['Last_Name']."&nbsp;&nbsp;&nbsp;&nbsp;</td><td>".$row['Address']."</td><td>".$row['Car_License_No']."</td><td>".$row['Car_Engine_No']."</td><td>".$row['Phone_No']."&nbsp;&nbsp;&nbsp;&nbsp;</td><td>".$row['Appointment_Date']."</td><td>".$row['Mechanic']."</td></tr>";
     }
   // print_r($result);
    echo "</table>";

  //echo $search;
  mysqli_close($conn);
?>

</body>
</html>