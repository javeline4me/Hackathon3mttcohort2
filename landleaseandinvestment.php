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
<title>Add new student</title>
</head>

<body>
<form  method="post">

<table width="276" border="1"  align="center">
    <tr><td colspan="2"><h3>LAND LEASE AND FARM INVESTMENT</h3></td></tr>
  <tr>
    <td>LAND OWNER</td> <td><input name="first_name" type="text" /></td>
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
        <select name="gender">

       <option>Benue       
   </option> 
   <option>Kogi      
   </option> 
        </select></td>
  </tr>
  <tr>
        <tr>
        <td>LGA</td> <td>
        <select name="gender">

       <option>Makurdi      
   </option> 
   <option>Gboko      
   </option> 
        </select></td>
  </tr>
  <tr>
        <tr>
        <td>Warld</td> <td>
        <select name="gender">

       <option>Wailomayo      
   </option> 
   <option>Bar     
   </option> 
        </select></td>
  </tr>
  <tr>
        <tr>
        <td>BEACON NUMBERS</td> <td><input type="text" value="Beacon1:"> <input type="text" value="Beacon2:"><input type="text" value="Beacon3:"><input type="text" value="Beacon4:"></td>
  </tr>
  <tr>
        <td>GEO LOCATION</td> <td><input type="text" value="Latitude:"> <input type="text" value="Logitude:"></td>
  </tr>
  <tr>
    <td>Proposed Farm</td> <td><input name="middle_name" type="text" /></td>
  </tr>
  <tr>
    <td>Amount required</td>  <td><input name="last_name" type="text" /></td>
</tr>
  <tr><td></td><td><input name="submit" type="submit" value="Pay now"/></td></tr>
</table>
</form>
<table border="0" align="center">
	<tr><td><a href="home.php">Home </a></td></tr>
</table>
</body>
</html>