<?php


session_start();

include_once("../connection/connection.php");
$name=$_REQUEST['name'];
$query="select * from module where subject='".$name."'";
$get_name=mysqli_query($conn,$query);
if(mysqli_num_rows($get_name)>0){
    echo "success";
}
else{
    echo"fail";
}





?>