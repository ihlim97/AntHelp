<?php

 include("config.php");
 session_start();

 $fullname = $_POST['fullname'];
 $nric = $_POST['nric'];
 $email = $_POST['email'];
 $password = $_POST['password'];
 $mobile = $_POST['mobile'];
 $address = $_POST['address'];
 $userType = "senior";

 $sql = "INSERT INTO  seniors (fullname,email,password,mobile,address,usertype)
         VALUES ('$fullname','$email','$password','$mobile','$address','$userType')";

 mysqli_query($con, $sql);
 mysqli_close($con);

 header("location:../src/login.php");

?>