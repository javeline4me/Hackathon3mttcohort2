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



// Example usage

if(isset($_POST["submit"])){

$first_name = $_POST["first_name"];
$middle_name = $_POST["middle_name"];
$last_name = $_POST["last_name"];

$gender = $_POST["gender"];
$state = $_POST["state"];
$lga=$_POST["lga"];
$ward=$_POST["ward"];

$beacon1 = $_POST["beacon1"];
$beacon2 = $_POST["beacon2"];
$beacon3 = $_POST["beacon3"];
$beacon4 = $_POST["beacon4"];

$latitude = $_POST["latitude"];
$longitude = $_POST["longitude"];

$landid =$beacon1."".$beacon2."".$beacon3."".$beacon4."".$latitude."".$longitude;

$statusflag="0";

function calculateSHAHash($input) {
    return hash('sha256', $input);
}
$shaHash = calculateSHAHash($landid);

echo "<br>".$landid;
echo "<br>".$first_name;
echo "<br>".$middle_name;
echo "<br>".$last_name;
echo "<br>".$gender;
echo "<br>".$state;
echo "<br>".$lga;
echo "<br>".$ward;
echo "<br>".$beacon1;
echo "<br>".$beacon2;
echo "<br>".$beacon3;
echo "<br>".$beacon4;
echo "<br>".$latitude;
echo "<br>".$longitude;
echo "<br>SHA256 hash of '$landid' is: $shaHash";


$sql = "INSERT INTO landregistration (`landid`, `first_name`, `middle_name`, `last_name`, `gender`, `state`, `lga`, `ward`, `beacon1`, `beacon2`, `beacon3`, `beacon4`, `longitude`, `latitude`)
VALUES ('$landid', '$first_name', '$middle_name', '$last_name', '$gender', '$state', '$lga', '$ward','$beacon1','$beacon2','$beacon3','$beacon4', '$longitude','$latitude')";
echo $sql;
if (mysqli_query($conn, $sql)) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

}
//mysqli_close($conn);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Register new Land</title>
</head>

<body>
<form  method="post">

<table width="276" border="1"  align="center">
    <tr><td colspan="2"><h3>ADD NEW LAND AND LAND OWNER</h3></td></tr>
  <tr>
    <td>FIRST NAME</td> <td><input name="first_name" type="text" /></td>
  </tr>
  <tr>
    <td>MIDDLE NAME</td> <td><input name="middle_name" type="text" /></td>
  </tr>
  <tr>
    <td>LAST NAME</td> <td><input name="last_name" type="text" /></td>
  </tr>

        <tr>
        <td>Gender</td> <td>
        <select name="gender">

       <option>Male       
   </option> 
   <option>Female       
   </option> 
        </select></td>
  </tr>
  <tr>
        <tr>
        <td>State</td> <td>
        <select name="state">

       <option>Benue       
   </option> 
   <option>Kogi      
   </option> 
        </select></td>
  </tr>
  <tr>
        <tr>
        <td>LGA</td> <td>
        <select name="lga">

       <option>Makurdi      
   </option> 
   <option>Gboko      
   </option> 
        </select></td>
  </tr>
  <tr>
        <tr>
        <td>Warld</td> <td>
        <select name="ward">

       <option>Wailomayo      
   </option> 
   <option>Bar     
   </option> 
        </select></td>
  </tr>
  <tr>
        <tr>
        <td>BEACON NUMBERS</td> 
        <td><input type="text"  name="beacon1" placeholder="Beacon1:"> 
        <input type="text"  name="beacon2" placeholder="Beacon2:">
        <input type="text"  name="beacon3" placeholder="Beacon3:">
        <input type="text"  name="beacon4" placeholder="Beacon4:"></td>
  </tr>
  <tr>
        <td>GEO LOCATION</td> <td><input type="text"  name="latitude" placeholder="Latitude:"> <input type="text"  name="longitude" placeholder="Longitude:"></td>
  </tr>
  
  <tr><td></td><td><input name="submit" type="submit" value="submit"/></td></tr>
</table>
</form>
<table border="0" align="center">
	<tr><td><a href="home.php">Home </a></td></tr>
</table>
</body>
</html>