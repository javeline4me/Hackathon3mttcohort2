<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "traceability";
//update_student
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Track</title>
</head>

<body>
<table  border="1">
<tr><td colspan="15" align="center"> <h3>Track </h3></td></tr>

<tr>
    
    <td>LAND ID</td>
    <td>FIRST NAME</td>
    <td>MIDDLE NAME</td>    
    <td>LAST NAME</td>
    <td>GENDER</td>
    <td>STATE</td>
    <td>LGA</td>   
    <td>WARD</td>
    <td>BEACON 1</td>
    <td>BEACON 2</td>
    <td>BEACON 3</td>
    <td>BEACON 4</td>
    <td>LONGITUDE</td>
    <td>LATITUDE</td>
    <td>RELEASE</td>
      </tr>
      
      <?php 
      $sqlsetup = "SELECT * FROM landregistration";
      if($termlysetup = mysqli_query($conn, $sqlsetup)){
          //$sn=1;
            while($raw = mysqli_fetch_array($termlysetup)){
      //`setupid`, `school_name`, `school_address`, `session`, `term`, `noofdaysopen`, `promotion_mark`, `vacation_date`, `next_term_begins`, `school_feels`
          //$school_name=$setup['landid'];
               
$first_name = $raw["first_name"];
$middle_name = $raw["middle_name"];
$last_name = $raw["last_name"];

$gender = $raw["gender"];
$state = $raw["state"];
$lga=$raw["lga"];
$ward=$raw["ward"];

$beacon1 = $raw["beacon1"];
$beacon2 = $raw["beacon2"];
$beacon3 = $raw["beacon3"];
$beacon4 = $raw["beacon4"];
$latitude = $raw["latitude"];
$longitude = $raw["longitude"];
$landid =$raw["landid"];
         
       ?>
      <tr>
      <td><?php echo $landid; ?></td>
       <td><?php echo $first_name; ?></td>
    <td><?php  echo $middle_name;?></td>
    <td><?php  echo $last_name;?></td>
    <td><?php  echo $gender;?></td>
    <td><?php  echo $state;?></td>
    <td><?php  echo $lga;?></td>
    <td><?php echo  $ward;?></td>
    <td><?php echo  $beacon1;?></td>
    <td><?php  echo $beacon2;?></td>
    <td><?php  echo $beacon3;?></td>
    <td><?php  echo $beacon4; ?></td>
    <td><?php echo $latitude;?></td>
    <td><?php echo $longitude;?></td>
    <td>
<a href="track.php?id=<?php echo $landid; ?>">Track</a></td>
      </tr>
<?php 
}
}
?>
      </table>
  <table border="0" align="center">
	<tr><td><a href="home.php">Home </a></td></tr>
</table>
</body>
</html>
