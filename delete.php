<!DOCTYPE html>
<html>
<body>
<link type="text/css" rel="stylesheet" href="stylesheet.css"/>
<?php 
  include 'db_variables.php';
  //include 'Ass03.php';
  $conn = mysqli_connect($db_host,$db_username,$db_pass,$db_name) or die ("Could not connect to MySQL");

  echo "Success!";

  $id = $_GET['id'];
  $mechanics = $_GET['mechanics'];
  $adate = $_GET['adate'];
  echo $id;

  //echo $mechanics;

  $query = "DELETE FROM client WHERE id = '$id'";
  if(mysqli_query($conn, $query)){
    $d = "SELECT $mechanics FROM appointments_per_day WHERE Date = '$adate'"; 
    if(mysqli_query($conn, $d)){
      $result_array =mysqli_fetch_array(mysqli_query($conn,$d));
      if($result_array[0] > 0){
      $result_array[0] = $result_array[0]-1;
      }
      $d2 = "UPDATE appointments_per_day SET $mechanics = $result_array[0] WHERE Date = '$adate'";
      if(mysqli_query($conn,$d2)){

        echo "<p style='text-align: center; font-size: 3em; margin-top: 20%; background-color: white; border: 1px solid red; border-radius: 2em; color: red; opacity: 0.9; padding: 2%; font-family: Arial;'>Delete Successful!<br/><a href='http://localhost/Assignment%2003/admin.php?uname=admin&pass=admin'>Click Here</a> to go to the UPDATED table.</p>";
      
      }
    }
  }else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
  }
 
  mysqli_close($conn);
?>

</body>
</html>