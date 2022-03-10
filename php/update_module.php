<?php

session_start();

include_once("../connection/connection.php");

if(isset($_REQUEST['module'])){
    $subject=mysqli_real_escape_string($conn,$_REQUEST['subject']);
    $type=mysqli_real_escape_string($conn,$_REQUEST['type']);
    $priority=mysqli_real_escape_string($conn,$_REQUEST['priority']);
    $assigned=mysqli_real_escape_string($conn,$_REQUEST['assigned']);
    $status=mysqli_real_escape_string($conn,$_REQUEST['status']);
    $id=$_REQUEST['mod_id'];

     $query="update module set subject='".$subject."',type='".$type."',priority='".$priority."',assign_id=".$assigned.",status='".$status."' where mod_id=".$id;
// // echo $query;
// exit;
    if(mysqli_query($conn,$query)){
        echo "success";
    }
    else{
        echo"fail";
    }


}


?>