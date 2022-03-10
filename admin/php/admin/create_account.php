<?php
session_start();
 include_once("../../connection/connection.php");
 
if(isset($_REQUEST['submit'])){
    // echo "yes";
  
    $email=mysqli_real_escape_string($conn,$_REQUEST['email']);
    $password=mysqli_real_escape_string($conn,$_REQUEST['pass']);
    $hash=password_hash($password,PASSWORD_DEFAULT);
    // echo $conn;
    // exit(1);
    // echo json_encode(array("status"=>"success","id"=>10));

    if(mysqli_query($conn,"insert into admin (email,password)values('".$email."','".$hash."')"))
    {
        
      
       $query="select * from admin where a_id=(select max(a_id) from admin)";
       $result=mysqli_query($conn,$query);
       while($row=mysqli_fetch_assoc($result)){
         $_SESSION['email']=$row['email'];
        $_SESSION['id']=$row['a_id'];
         $id=$row['a_id'];
         break;


       }
      
      echo json_encode(array("status"=>"success","id"=>$id));



        
    }
    else{
        
        echo json_encode(array("status"=>"fail"));
        
    }

}


?>