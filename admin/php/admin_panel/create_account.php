<?php
 include_once("../../connection/connection.php");
 
if(isset($_REQUEST['signup'])){
    // echo "yes";
  
    $email=mysqli_real_escape_string($conn,$_REQUEST['email']);
    $password=mysqli_real_escape_string($conn,$_REQUEST['pass']);
    // echo $conn;
    // exit(1);
    if(mysqli_query($conn,"insert into user (email,password)values('".$email."','".$password."')"))
    {
      
        // header("location:logout.php");
        echo"success";
    }
    else{
        echo"not done";
        
    }

}


?>