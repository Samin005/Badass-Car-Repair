<?php 
  include 'db_variables.php';

  $conn = mysqli_connect($db_host,$db_username,$db_pass,$db_name) or die ("Could not connect to MySQL");

  //@mysqli_connect($db_host,$db_username,$db_pass,$db_name) or die ("Could not connect to MySQL");
  //@mysqli_select_db($db_name) or die ("No database");
  //echo "connected!";
  //query();
  
  function query(){
    include 'db_variables.php';

  $conn = mysqli_connect($db_host,$db_username,$db_pass,$db_name) or die ("Could not connect to MySQL");
  $result  = "SELECT * FROM mechanics";
  $mydata = mysqli_query($conn,$result);
  while($record = mysqli_fetch_array($mydata)){
  	echo '<option value="'.$record['Name'].'">'.$record['Name'].'</option>';
  }
  mysqli_close($conn);

}
//echo "end";
?>