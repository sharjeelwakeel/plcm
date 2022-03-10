<?php

include_once("../../connection/connection.php");

if(isset($_REQUEST['id']))
{
    $id=mysqli_real_escape_string($conn,$_REQUEST['id']);
    $query="select * from projects where p_id=".$id;
    $res=mysqli_query($conn,$query);
    if(mysqli_num_rows($res)>0){
        echo 'yes';
    }
    else{
        echo "no";
    }
}

?>