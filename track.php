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
$shaHash = calculateSHAHash($id);

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
$blockchain2 = "";
$amount = "";
$paidby = "";
$payercontact = "";

$clear = "";
$cultivation = "";
$fertilizer = "";
$harvest = "";
$certify = "";
$pdtdetails = "";
$transport = "";
$storage = "";
$market = "";
         
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Track Crops and product movement</title>
</head>

<body>
<form  method="post">
       <table  border="1" align="center">
        <tr><td colspan="2"><h3>Track Crops and product movement</h3></tr>
      
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
            }
        }  

        $sqlset= "SELECT * FROM landlease WHERE landid='$id'";
        if($terms = mysqli_query($conn, $sqlset)){
            //$sn=1;
              while($aw = mysqli_fetch_array($terms)){
             //   landid`, `blockchain`, `amount`, `paidby`, `payercontact`, `status`
                 
             $blockchain2 = $aw["blockchain"];
  $amount = $aw["amount"];
  $paidby = $aw["paidby"];
  $payercontact = $aw["payercontact"];
              }
            }



        $sqlsetup = "SELECT * FROM general WHERE landid='$id'";
        if($term = mysqli_query($conn, $sqlsetup)){
            //$sn=1;
              while($w = mysqli_fetch_array($term)){
             //   landid`, `blockchain`, `amount`, `paidby`, `payercontact`, `status`
                 
  $clear = $w["clear"];
  $cultivation = $w["cultivation"];
  $fertilizer = $w["fertilizer"];
  $harvest = $w["harvest"];
  $certify = $w["certify"];
  $pdtdetails = $w["pdtdetails"];
  $transport = $w["transport"];
  $storage = $w["storage"];
  $market = $w["market"];
              }
            }

            $input= $certify."".$pdtdetails;
            $block3 = calculateSHAHash($input);

         //   `landid`, `clear`, `cultivation`, `fertilizer`, `harvest`, `certify`, `pdtdetails`, `transport`, `storage`, `market`
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
    <td>Block 1</td><td><?php echo $shaHash; ?></td>      </tr>
   
    <td>Rent Amount</td><td><?php echo $amount; ?></td>      </tr>
    <td>Paid By</td><td><?php echo $paidby; ?></td>      </tr>
    <td>Payer Contact</td><td><?php echo $payercontact; ?></td>      </tr>    
    <td>Block 2</td><td><?php echo $blockchain2; ?></td>      </tr> 

    <td>LAND CLEARING</td><td><?php echo $clear;?></td></tr><tr>
    <td>CULTIVATION</td><td><?php echo $cultivation;?></td></tr><tr>
    <td>FERTILIZER APPLICATION</td><td><?php echo $fertilizer; ?></td>      </tr>   
    <td>HARVEST</td><td><?php echo $harvest; ?></td>      </tr>
    <td>PRODUCT DETAILS</td><td><?php echo $pdtdetails; ?></td>      </tr>
    <td>TRANSPORTATION</td><td><?php echo $transport; ?></td>      </tr>    
    <td>STORAGE</td><td><?php echo $storage; ?></td>      </tr>    
    <td>MARKET</td><td><?php echo $market; ?></td>      </tr> 
    <td>BLOCK 3</td><td><?php echo $block3; ?></td>      </tr>
      <tr><td></td><td></td></tr>
      <tr><td colspan="2">

<?php 

?>
 </td></tr>

</table>
</form>
<table border="0" align="center">
	<tr><td><a href="home.php">Home </a></td></tr>
</table>
</body>
</html>
