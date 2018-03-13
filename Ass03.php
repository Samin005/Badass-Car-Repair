<!DOCTYPE html>
<html>
<head>
  <script>
  function checkNo(){
    var x = document.getElementById("pno").value;
     if(isNaN(x))
      alert("Please enter a valid number");
  }
</script>
</head>

<body>
<link type="text/css" rel="stylesheet" href="stylesheet.css"/>
<center>
  <div id="header">
    <a href="#form">Form</a>
    <a href="#mechanic_info">Our Mechanics</a>
    <a href="#about_us">About Us</a>
  </div>
</center>
<br/>
<br/>

<br/>
<center><div id="mheader">Welcome to Badass-car-fix!<br/>Fix Your Car Today!</div></center>
<br/>
<br/>
<br/>
<div class="dropdown">
  <div id="Alogin">Administrator Login</div>
  <div class="dropdown-content">
    <form action="admin.php" style="width: 20%; text-align: center; display: inline-block; margin-bottom: -5%;" id="clientform">
      <span style="font-size: 1.5em;">Username:</span> <input type="text" name="uname" value=""><br/>
      <span style="font-size: 1.5em;">Password:</span> <input type="password" name="pass" value=""><br/>
      <input type="submit" value="Login">
    </form>
  </div>
</div>
<center><form action="functions.php" id="clientform">
  <div>
    <a name="form"><span>Please fill up the necessary info below!</span></a>
  </div>
  <br><br>
  <input type="text" placeholder="First Name" style=" width: 45%" name="fname" required>
  <input type="text" placeholder="Last Name" style=" width: 45%" name="lname" required>
  <input type="text" placeholder="Address" style=" width: 95%" name="address" required>
  <input type="text" placeholder="Car License No." style=" width: 45%" name="lno" required>
  <input type="text" placeholder="Car Engine No." style=" width: 45%" name="eno" required>
  <input type="text" placeholder="Phone No." style=" width: 45%" name="pno" id="pno" onchange="checkNo()" required>
  <input type="date" placeholder="Appointment Date" style=" width: 45%" name="adate" required>
  <br><br>
  <span style="font-size: 30px;">Select Your Mechanic!</span>
  <select name="mechanics">
    <?php 
      include 'mechanics_load.php';
      query();
    ?>
  </select>
  <br><br>
  <input type="submit" value="Submit!">
  <br><br>

</form></center>

<form action = "mechanics_availability.php" target="_blank"><input type="submit" value="Click here to check mechanics availability per day!" id="mAvail"></form>

<a name="mechanic_info"><div style="border: 1px solid red; border-top-left-radius: 2em; border-bottom-right-radius: 2em; background-color: white; opacity:0.8; display: inline-block; padding: 1%; margin: 1%; font-size: 2em; color: red; font-family: Arial;">Some Basic Info About Our Mechanics,</div></a>
<br/>
<?php
    include 'db_variables.php';
    //include 'd_array.php';
    //echo $color;
    @mysqli_connect($db_host,$db_username,$db_pass,$db_name) or die ("Could not connect to MySQL");
    //@mysqli_select_db($db_name) or die ("No database");
    $conn = mysqli_connect($db_host,$db_username,$db_pass,$db_name);

    //echo "Connection Successful!";
    //echo "ma niggs!";
    $query  = "SELECT * FROM mechanics";
    $result = mysqli_query($conn,$query);

    echo "<table style='color: red; font-size: 2em; margin: auto; text-align: center;'>";
    echo "<tr><th>ID&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><th>NAME&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><th>Email</th><th>Phone</th><th>Address</th></tr>";
    while($row = mysqli_fetch_array($result)){
      echo "<tr><td>".$row['id']."</td><td>".$row['Name']."</td><td>".$row['Email']."&nbsp;&nbsp;&nbsp;&nbsp;</td><td>".$row['Phone_No']."&nbsp;&nbsp;&nbsp;&nbsp;</td><td>".$row['Address']."</td></tr>";
    }
    echo "</table>";

    mysqli_close($conn);
    
?>

<a name="about_us"><div id="footer">Car problem? Say no more!<br/>Leave it to us!!!<br/><pre>Email: badass-car-fix@gmail.com                   tel: +8801xxxxxxxxx</pre></div></a>


</body>
</html>
