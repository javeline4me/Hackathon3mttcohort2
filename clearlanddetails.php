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
$id=$_GET["id"];
function calculateSHAHash($input) {
    return hash('sha256', $input);
}


$first_name ="";
$middle_name = "";
$last_name = "";

$gender = "";
$state = "";
$lga="";
$ward="";

$beacon1 ="";
$beacon2 = "";
$beacon3 = "";
$beacon4 = "";
$latitude = "";
$longitude = "";
$landid ="";
$amount="";

         
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Clear Land </title>
</head>

<body>
<form  method="post">
       <table  border="1" align="center">
        <tr><td colspan="2"  align="center"><h3>Clear Land</h3></tr>
      
      <?php 
      $sqlsetup = "SELECT * FROM landregistration WHERE landid='$id'";
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
$blockchain = "";

$sql = "SELECT * FROM landlease WHERE landid='$landid'";
// WHERE status='$status'
if($termlysetup = mysqli_query($conn, $sql)){
    //$sn=1;
      while($law = mysqli_fetch_array($termlysetup)){
          //`landid`, `blockchain`, `amount`, `paidby`, `status`
          $landid = $law["landid"];
          $blockchain = $law["blockchain"];
          $amount = $law["amount"];
          $paidby = $law["paidby"];
      }
    }
            }
        }      
       ?>
       
<tr>
    
    <td>LAND ID</td><td><?php echo $landid; ?></td></tr><tr>
    <td>FIRST NAME</td><td><?php echo $first_name; ?></td></tr><tr>
    <td>MIDDLE NAME</td>   <td><?php  echo $middle_name;?></td> </tr><tr>
    <td>LAST NAME</td><td><?php  echo $last_name;?></td></tr><tr>
    <td>GENDER</td><td><?php  echo $gender;?></td></tr><tr>
    <td>STATE</td> <td><?php  echo $state;?></td></tr><tr>
    <td>LGA</td>   <td><?php  echo $lga;?></td></tr><tr>
    <td>WARD</td><td><?php echo  $ward;?></td></tr><tr>
    <td>BEACON 1</td> <td><?php echo  $beacon1;?></td></tr><tr>
    <td>BEACON 2</td><td><?php  echo $beacon2;?></td></tr><tr>
    <td>BEACON 3</td> <td><?php  echo $beacon3;?></td></tr><tr>
    <td>BEACON 4</td><td><?php  echo $beacon4; ?></td></tr><tr>
    <td>LONGITUDE</td><td><?php echo $latitude;?></td></tr><tr>
    <td>LATITUDE</td><td><?php echo $longitude;?></td></tr><tr>
    <td>BlockChain</td><td><?php echo $blockchain; ?></td></tr><tr>
    <td>Amount (N)</td><td><?php echo $amount; ?></td></tr><tr>
    <td>CLEARED BY (FULL NAME)</td><td><input name="full_name" type="text" /></td></tr><tr>
    <td>METHOD OF CLEARING</td><td><input name="method" type="text" /></td>
      </tr><tr>
    <td>TOOL USED</td><td><input name="tools" type="text" /></td>
      </tr>
      <tr>
    <td>DATE</td><td><input name="date" type="date" /></td>
      </tr>
      <tr><td></td><td><input name="submit" type="submit" value="Pay Now"/></td></tr>
      <tr><td colspan="2" align="center">

<?php 

if(isset($_POST["submit"])){
   // $shaHash;
  // $amount = $_POST["amount"];
   $full_name = $_POST["full_name"];
   $method= $_POST["method"];
   $tools= $_POST["tools"];
   $date= $_POST["date"];
   //  echo $amount."<br>";
   //  echo $full_name."<br>";
   //  echo $contact."<br>";
   //$paidby="";
   $status="Paid";
  // echo $status."<br>";
   $curYear = date('Y:m:d:h:i:s');
//echo $curYear."<br>";

   $input =$blockchain."".$amount."".$full_name."".$contact."".$curYear;
   $shaHash2 = calculateSHAHash($input);
 //  echo $shaHash2."<br>";
 //    `landid`, `blockchain`, `amount`, `paidby`, `status`
 $sql = "UPDATE landlease SET `amount`='$amount',`paidby`='$full_name',`payercontact`='$contact',`blockchain`='$shaHash2' WHERE landid='$landid'";
 //$sql = "UPDATE landlease (`landid`, `blockchain`, `amount`, `paidby`, `payercontact`,`status`) VALUES ('$landid','$shaHash', '$amount','$paidby','$contact','$status')";
//echo $sql;
 //$sql = "UPDATE landregistration SET `amount`='$amount' WHERE landid='$id'";

 //echo $sql;
 if(mysqli_query($conn, $sql)){
    $sql1 = "UPDATE blockchainregister SET `leaseid`='$shaHash2' WHERE landid='$landid'";
    mysqli_query($conn, $sql1);
    echo "Land Lease payment made successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

}


?>
 </td></tr>

</table>
</form>
<table border="0" align="center">
	<tr><td><a href="home.php">Home </a></td></tr>
</table>
</body>
</html>
