<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "nhlssdb";
//update_student
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

if(isset($_POST["submit"])){

$first_name = $_POST["first_name"];
$middle_name = $_POST["middle_name"];
$last_name = $_POST["last_name"];
$gender = $_POST["gender"];
$class = $_POST["class"];
$id="nkstsshlm/std/";
$rand=rand(100,999);
$curYear = date('Y');
$student_id=$id."/".$curYear."/".$rand;
$status=1;
/*
echo "<br>".$student_id;
echo "<br>".$first_name;
echo "<br>".$middle_name;
echo "<br>".$last_name;
echo "<br>".$gender;
echo "<br>".$class;
*/
$sql = "INSERT INTO student_biodata (`student_id`, `first_name`, `middle_name`, `last_name`, `gender`, `class`, `status`,`image`)
VALUES ('$student_id', '$first_name', '$middle_name', '$last_name', '$gender', '$class', '$status','$image')";
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
<title>Transportation</title>
</head>

<body>
<form  method="post">

<table width="276" border="1"  align="center">
    <tr><td colspan="2"><h3>TRANSPORTATION</h3></td></tr>
  <tr>
    <td>CROP UNIQUE ID</td> <td><input name="first_name" type="text" /></td>
  </tr>

        <tr>
        <td>DATE</td> <td>
        <input type="date"></td>
  </tr>
  </tr>

        <tr>
        <td>SOURCE </td> <td>
        <input type="text"></td>
  </tr>
  <tr>
        <td>DESTINATION</td> <td>
        <input type="text"></td>
  </tr>
  <tr>
        <tr>
        <td>MODE OF TRANSPORTATION</td> <td>
        <select name="gender">

     
   <option>Manual   
   </option> 
   <option>Mechanical  
   </option> 
        </select></td>
  </tr>
  <tr>
        <td>LOGISTIC COMPANY DETAILS</td> <td>
        <input type="text"></td>
  </tr>
  <tr>
        <td>TRANSPORTED BY</td> <td>
        <input type="text"></td>
  </tr>
  <tr><td></td><td><input name="submit" type="submit" value="Submit"/></td></tr>
</table>
</form>
<table border="0" align="center">
	<tr><td><a href="home.php">Home </a></td></tr>
</table>
</body>
</html>