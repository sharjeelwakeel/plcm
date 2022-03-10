<?php
 include_once("../../connection/connection.php");
 
if(isset($_REQUEST['signin'])){
    // echo "yes";
  
    $email=mysqli_real_escape_string($conn,$_REQUEST['email']);
    $password=mysqli_real_escape_string($conn,$_REQUEST['pass']);
    // echo $conn;
    // exit(1);
    $row=mysqli_query($conn,"select * from user where email='".$email."'and password='".$password."'");

    if(mysqli_num_rows($row)>0)
    {
        
      
        // header("location:logout.php");
        echo"success";
    }
    else{
        echo"not done";
        
    }

}


?>