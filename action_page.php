<?php 

  $db_host = "localhost";
  $db_username = "root";
  $db_pass = "";
  $db_name = "car_fix";

  @mysqli_connect($db_host,$db_username,$db_pass,$db_name) or die ("Could not connect to MySQL");
  //@mysqli_select_db($db_name) or die ("No database");
  $conn = mysqli_connect($db_host,$db_username,$db_pass,$db_name);

  echo "Connection Successful!";

  $fname = $_REQUEST['fname'];
  $lname = $_REQUEST['lname'];
  $address = $_REQUEST['address'];
  $lno = $_REQUEST['lno'];
  $eno = $_REQUEST['eno'];
  $pno = $_REQUEST['pno'];
  $adate = $_REQUEST['adate'];
  echo("<br>date is: ".$adate);

  $sql = "INSERT INTO client (First_Name, Last_Name, Address, Car_License_No, Car_Engine_No, Phone_No, Appointment_Date) VALUES ('$fname','$lname','$address','$lno','$eno','$pno','$adate')";
  //$sql = "INSERT INTO client (Address, First_Name, Last_Name, Car_License_No) VALUES ('$address', '$fname', '$lname', '$lno')";
  if (mysqli_query($conn, $sql)) {
    echo "<br>New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

  $query  = "SELECT * FROM client";
  $result = mysqli_query($conn,$query);

  echo "<table>";

  while($row = mysqli_fetch_array($result)){
  	echo "<tr><td>".$row['id']."</td><td>".$row['First_Name']."</td><td>".$row['Last_Name']."</td><td>".$row['Address']."</td><td>".$row['Car_License_No']."</td><td>".$row['Car_Engine_No']."</td><td>".$row['Phone_No']."</td><td>".$row['Appointment_Date']."</td></tr>";
  }
  echo "</table>";
  mysqli_close($conn);
?>