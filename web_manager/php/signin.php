<?php
session_start();

include_once("../connection/connection.php");
if(isset($_REQUEST['signin'])){
    $email=$_REQUEST['email'];
    $password=$_REQUEST['password'];
    if($email=="web_manger#12@gmail.com" && $password=="#web_#12#" ){
        $_SESSION['email']="web_manger#12@gmail.com";
        $_SESSION['id']=111;
        echo json_encode(array("status"=>"success","id"=>111));

        exit(1);
        

    }//if end


 echo json_encode(array("status"=>"fail"));


}//if end



?>