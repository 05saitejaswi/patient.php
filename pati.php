<?php
$Name = $_POST['Name'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$fathersname= $_POST['fathersname'];
$registration date = $_POST['registration date'];
$registration number = $_POST['registration number'];
$adress = $_POST['adress'];
$occupation = $_POST['occupation'];
$mobile no = $_POST['mobile no'];


if (!empty($Name) || !empty($age) || !empty($gender) || !empty($fathersname) || !empty($registration date) || !empty($registration number)) || !empty($ adress))||!empty($ occupation)) ||  !empty($ mobile no)){
 $host = "localhost";
    $dbName = "root";
    $dbage = "";
    $dbname = "account";
    //create connection
    $conn = new mysqli($host, $dbName, $dbage, $dbname);
    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {
     $SELECT = "SELECT  registration number  From register Where registration number = ? Limit 1";
     $INSERT = "INSERT Into register (Name , age , gender , fathersname , registration date , registration number , adress , occupation , mobile no) values(?, ?, ?, ?, ?, ? , ?, ? ,?)";
     //Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $registration number);
     $stmt->execute();
     $stmt->bind_result($registration number);
     $stmt->store_result();
     $rnum = $stmt->num_rows;
     if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("sissiissi", $Name, $age , $ gender , $fathersname ,        $registration date , $registration number , $adress , $occupation , $mobile no
      $stmt->execute();
      echo "thank you";
     } else {
      echo "Someone already register using this registration number";
     }
     $stmt->close();
     $conn->close();
    }
} else {
 echo "All field are required";
 die();
}
?>