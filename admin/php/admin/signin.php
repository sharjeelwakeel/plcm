<?php
session_start();

include_once("../../connection/connection.php");
if(isset($_REQUEST['signin'])){
    $email=$_REQUEST['email'];
    $password=$_REQUEST['password'];
$query="select * from admin";
$result=mysqli_query($conn,$query);
 while($row=mysqli_fetch_assoc($result) )
 {
     
  
    if($row['email']==$email && password_verify($password,$row['password']) ){
        $_SESSION['email']=$row['email'];
        $_SESSION['id']=$row['a_id'];
        echo json_encode(array("status"=>"success","id"=>$row['a_id']));

        exit(1);
        

    }//if end
 }//while end

 echo json_encode(array("status"=>"fail"));


}//if end



?>