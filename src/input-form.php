
<?php

 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "AntHelp";
 $con = new mysqli($servername, $username, $password, $dbname);

session_start();

date_default_timezone_set('Asia/Kuala_Lumpur');

$limit=10;

 $fullName=$_POST['fullname'];
 $myKadNo=$_POST['mykadno'];
 $address=$_POST['address'];
 $mobileNo=$_POST['phone'];
 $email=$_POST['email'];
 $password=$_POST['password'];
 $profileImg=$_POST['profileimg'];


 $sql = "INSERT INTO  user (FullName,MyKadNo,Address,MobileNo,Email,Password,ProfileImage)
         VALUES ('$fullName','$myKadNo','$address','$mobileNo','$email','$password','$profileImg',)";

 mysqli_query($con, $sql);
 mysqli_close($con);

?>
