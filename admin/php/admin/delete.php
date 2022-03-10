<?php
session_start();
 include_once("../../connection/connection.php");
 

    if(isset($_REQUEST['id'])){
$id=$_REQUEST['id'];
        $query="delete from projects where p_id=".$id;
        if(mysqli_query($conn,$query)){
            echo"success";
        }
        else{
            echo "fail";
        }
    }
    else{
        echo "fail";
    }
  
   


    ?>