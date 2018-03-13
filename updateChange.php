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
  
  $id = $_GET['id'];
  $mechanics = $_GET['mechanics'];
  //echo $id;
  $changedDate = $_GET['changedDate'];
  $oldDate = $_GET['oldDate'];
  echo $oldDate;

  $sql2 = "INSERT INTO appointments_per_day (Date, Tom, Mitchel, Drake, Wade, Razor) VALUES ('$changedDate',0,0,0,0,0);";
    if (mysqli_query($conn, $sql2)) {
      $sql1 = "SELECT $mechanics FROM appointments_per_day WHERE Date = '$changedDate'";
      if(mysqli_query($conn, $sql1)){
        //echo "sql1 successful!";
        $result_array =mysqli_fetch_array(mysqli_query($conn,$sql1));
        $result_array[0] = $result_array[0]+1;
        if($result_array[0]>4){
          echo "<p style='text-align: center; font-size: 3em;'>It looks like $mechanics is too busy on $changedDate...<br/>Please pick a different mechanic or a different date, thank you!</p>";
          mysqli_close($conn);
          die();
        }
        //echo "<p style='text-align: center; font-size: 3em; margin-top: 20%; background-color: white; border: 1px solid red; border-radius: 2em; color: red; opacity: 0.9; padding: 2%; font-family: Arial;'>Update Successful!</p>";
        $sql2 = "UPDATE appointments_per_day SET $mechanics = $result_array[0] WHERE Date = '$changedDate'";
        if(mysqli_query($conn, $sql2)){

          $d = "SELECT $mechanics FROM appointments_per_day WHERE Date = '$oldDate'"; 
          if(mysqli_query($conn, $d)){
            $result_array =mysqli_fetch_array(mysqli_query($conn,$d));
            if($result_array[0] > 0){
                $result_array[0] = $result_array[0]-1;
              }
            $d2 = "UPDATE appointments_per_day SET $mechanics = $result_array[0] WHERE Date = '$oldDate'";
            if(mysqli_query($conn,$d2)){
              $query = "UPDATE client SET Appointment_Date = '$changedDate' WHERE id = '$id'";

              if(mysqli_query($conn, $query)){
              //echo "query successful!";
              echo "<p style='text-align: center; font-size: 3em; margin-top: 20%; background-color: white; border: 1px solid red; border-radius: 2em; color: red; opacity: 0.9; padding: 2%; font-family: Arial;'>Update Successful!<br/><a href='http://localhost/Assignment%2003/admin.php?uname=admin&pass=admin'>Click Here</a> to go to the UPDATED table.</p>";
              }
            }
          }
        }
        else
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        //$sql3 = "UPDATE appointments_per_day SET $mechanics";
        //echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        //echo "<br>New record created successfully";
      } 
    else {
      $sql1 = "SELECT $mechanics FROM appointments_per_day WHERE Date = '$changedDate'";
      if(mysqli_query($conn, $sql1)){
        //echo "sql1 successful!";
        $result_array =mysqli_fetch_array(mysqli_query($conn,$sql1));
        $result_array[0] = $result_array[0]+1;
        if($result_array[0]>4){
          echo "<p style='text-align: center; font-size: 3em; margin-top: 20%; background-color: white; border: 1px solid red; border-radius: 2em; color: red; opacity: 0.9; padding: 2%; font-family: Arial;'>It looks like $mechanics is too busy on $changedDate...<br/>Please pick a different mechanic or a different date, thank you!</p>";
          mysqli_close($conn);
          die();
        }
        //print_r ($result_array);
        $sql2 = "UPDATE appointments_per_day SET $mechanics = $result_array[0] WHERE Date = '$changedDate'";
        if(mysqli_query($conn, $sql2)){

            $d = "SELECT $mechanics FROM appointments_per_day WHERE Date = '$oldDate'"; 
            if(mysqli_query($conn, $d)){
              $result_array =mysqli_fetch_array(mysqli_query($conn,$d));
              if($result_array[0] > 0){
                $result_array[0] = $result_array[0]-1;
              }
              //echo $result_array[0];
              $d2 = "UPDATE appointments_per_day SET $mechanics = $result_array[0] WHERE Date = '$oldDate'";
              if(mysqli_query($conn,$d2)){
                $query = "UPDATE client SET Appointment_Date = '$changedDate' WHERE id = '$id'";

                if(mysqli_query($conn, $query)){
                //echo "query successful!";
                echo "<p style='text-align: center; font-size: 3em; margin-top: 20%; background-color: white; border: 1px solid red; border-radius: 2em; color: red; opacity: 0.9; padding: 2%; font-family: Arial;'>Update Successful!<br/><a href='http://localhost/Assignment%2003/admin.php?uname=admin&pass=admin'>Click Here</a> to go to the UPDATED table.</p>";
                }
              }
            }
          }
        }
      else
        "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
 echo "end";
  mysqli_close($conn);
?>

</body>
</html>