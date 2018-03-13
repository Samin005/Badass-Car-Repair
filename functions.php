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
  

  // echo "Connection Successful!";

  $fname = $_GET['fname'];
  $lname = $_GET['lname'];
  $address = $_GET['address'];
  $lno = $_GET['lno'];
  $eno = $_GET['eno'];
  $pno = $_GET['pno'];
  $adate = $_GET['adate'];
  $mechanics = $_GET['mechanics'];

  $q = "SELECT id FROM client WHERE Car_License_No = '$lno' AND Appointment_Date = '$adate'";
  $ra = mysqli_fetch_array(mysqli_query($conn, $q));
  //print_r($ra);
   if(!empty($ra)){
     echo "<p style='text-align: center; font-size: 3em; margin-top: 20%; background-color: white; border: 1px solid red; border-radius: 2em; color: red; opacity: 0.9; padding: 2%; font-family: Arial;'>Sorry $fname (Car lisence = $lno), It looks like you already have an appointment on that day! Please choose a different date or a different car! Thank you.</p>";
     mysqli_close($conn);
     die();
   }
  // echo $mechanics;die;
  // $sql = "INSERT INTO appointments (M_id) SELECT id FROM mechanics WHERE mechanics.Name='$mechanics'";
  $query1 ="SELECT id FROM mechanics WHERE mechanics.Name='$mechanics'";
  $result_array =mysqli_fetch_array(mysqli_query($conn,$query1));
  //print_r ($result_array);
  // var_dump($result_array);die;
  $mechanicid = $result_array['id'];
  //$sql = "INSERT INTO Appointments (M_id) VALUES ($mechanicid)";
  // var_dump($sql);die;
  //$sql = "INSERT INTO appointments (Date) VALUES ('$adate')";
//if (mysqli_query($conn, $sql)) {
    //echo "<br>New record created successfully";
  //} else {
    //echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  //}

  // $query  = "SELECT * FROM client";
  // $result = mysqli_query($conn,$query);

  // echo "<table>";

  // while($row = mysqli_fetch_array($result)){
  // 	echo "<tr><td>".$row['id']."</td><td>".$row['First_Name']."</td><td>".$row['Last_Name']."</td><td>".$row['Address']."</td><td>".$row['Car_License_No']."</td><td>".$row['Car_Engine_No']."</td><td>".$row['Phone_No']."</td><td>".$row['Appointment_Date']."</td><td>".$row['Mechanic']."</td></tr>";
  // }
  // echo "</table>";

  $sql2 = "INSERT INTO appointments_per_day (Date, Tom, Mitchel, Drake, Wade, Razor) VALUES ('$adate',0,0,0,0,0);";
  if (mysqli_query($conn, $sql2)) {
    $sql1 = "SELECT $mechanics FROM appointments_per_day WHERE Date = '$adate'";
    if(mysqli_query($conn, $sql1)){
      //echo "sql1 successful!";
      $result_array =mysqli_fetch_array(mysqli_query($conn,$sql1));
      $result_array[0] = $result_array[0]+1;
      if($result_array[0]>4){
        echo "<p style='text-align: center; font-size: 3em;'>It looks like $mechanics is too busy on $adate...<br/>Please pick a different mechanic or a different date, thank you!</p>";
        mysqli_close($conn);
        die();
      }
      //print_r ($result_array);
      $sql2 = "UPDATE appointments_per_day SET $mechanics = $result_array[0] WHERE Date = '$adate'";
      if(mysqli_query($conn, $sql2)){
        //echo "sql2 successful!";
      }
      else
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    //$sql3 = "UPDATE appointments_per_day SET $mechanics";
    //echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    //echo "<br>New record created successfully";
  } else {
    $sql1 = "SELECT $mechanics FROM appointments_per_day WHERE Date = '$adate'";
    if(mysqli_query($conn, $sql1)){
      //echo "sql1 successful!";
      $result_array =mysqli_fetch_array(mysqli_query($conn,$sql1));
      $result_array[0] = $result_array[0]+1;
      if($result_array[0]>4){
        echo "<p style='text-align: center; font-size: 3em; margin-top: 20%; background-color: white; border: 1px solid red; border-radius: 2em; color: red; opacity: 0.9; padding: 2%; font-family: Arial;'>It looks like $mechanics is too busy on $adate...<br/>Please pick a different mechanic or a different date, thank you!</p>";
        mysqli_close($conn);
        die();
      }
      //print_r ($result_array);
      $sql2 = "UPDATE appointments_per_day SET $mechanics = $result_array[0] WHERE Date = '$adate'";
      if(mysqli_query($conn, $sql2)){
        //echo "sql2 successful!";
      }
      else
        "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    //$sql3 = "UPDATE appointments_per_day SET $mechanics";
    //echo "Error: " . $sql . "<br>" . mysqli_error($conn);

  }

  

  //$_GET['adate'] = array($_GET['adate'],0,0,0,0,0);
  // $arr[4]++;
  // $dateapp = $_GET['adate'];
  // print_r($arr);
  // echo $dateapp;
//   include 'd_array.php';
//   $_GET['adate'][$mechanicid]++;
//   foreach($_GET['adate'] as $a){
//     echo "<p>$a</p>";
//   }
// echo $color;


  $sql = "INSERT INTO client (First_Name, Last_Name, Address, Car_License_No, Car_Engine_No, Phone_No, Appointment_Date, Mechanic) VALUES ('$fname','$lname','$address','$lno','$eno','$pno','$adate','$mechanics')";
  //$sql = "INSERT INTO Appoinments (M_id) VALUES ("SELECT id FROM mechanics WHERE Name='$mechanic'")";
  //echo("<br>id : ".$sql);
  //$sql = "SELECT id FROM mechanics WHERE Name='$mechanic'";
  //$sql = "INSERT INTO Appoinments (M_id) VALUES (SELECT id FROM mechanics WHERE Name='$mechanic')";
  //echo("<br>id : ".$sql);
  //mysqli_query($conn,"SELECT id FROM mechanics WHERE Name='$mechanic'");
  
  //$sql = "INSERT INTO appointments (date, C_id) VALUES ('$adate','$lno')";
  //echo("<br>id : ".$a);
  if (mysqli_query($conn, $sql)) {
    echo "<p style='text-align: center; font-size: 3em; margin-top: 10%; background-color: white; border: 1px solid red; border-radius: 2em; color: red; opacity: 0.9; padding: 2%; font-family: Arial;'>Congratulations $fname $lname, <br/>An appointment was successfully created with $mechanics on $adate<br/>Please come again, thank you!</p>";

    $query  = "SELECT * FROM mechanics WHERE Name = '$mechanics'";
    $result = mysqli_query($conn,$query);
    echo "<div style='border: 1px solid red; border-bottom-left-radius: 2em; border-bottom-right-radius: 2em; background-color: white; opacity:0.8; display: inline-block; padding: 1%; margin: 1%; font-size: 2em; color: red; font-family: Arial;'>Some Info About Your Mechanic,</div>";
    echo "<br/><center><img src='young-mechanic.jpg' style='border-radius: 2em;'></center><br/>";

    echo "<table style='color: red; font-size: 2em; margin: auto; text-align: center;'>";
    echo "<tr><th>ID&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><th>NAME&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><th>Email</th><th>Phone</th><th>Address</th></tr>";
    while($row = mysqli_fetch_array($result)){
      echo "<tr><td>".$row['id']."</td><td>".$row['Name']."</td><td>".$row['Email']."&nbsp;&nbsp;&nbsp;&nbsp;</td><td>".$row['Phone_No']."&nbsp;&nbsp;&nbsp;&nbsp;</td><td>".$row['Address']."</td></tr>";
    }
    echo "</table>";


  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
  echo "<div id='footer'>Car problem? Say no more!<br/>Leave it to us!!!<br/><pre>Email: badass-car-fix@gmail.com                   tel: +8801xxxxxxxxx</pre></div>";
  mysqli_close($conn);
?>

</body>
</html>