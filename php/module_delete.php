<?php

session_start();

include_once("../connection/connection.php");

if(isset($_REQUEST['id']))
{
$id=$_REQUEST['id'];
$query="delete from module where mod_id=".$id;

if(mysqli_query($conn,$query)){
    $query="delete from schedule where m_id=".$id;
    mysqli_query($conn,$query);
    echo "success";
}
else{
    echo "fail";
}

}



?>