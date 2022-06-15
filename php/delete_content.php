<?php

session_start();

include_once("../connection/connection.php");
print_r($_REQUEST);

if(isset($_REQUEST['id'])){
    $id=$_REQUEST['id'];
    $query="update module set m_file_path='',file_status=''  where mod_id=".$id;
    echo $query;
    if(mysqli_query($conn,$query)){
        echo "success";
    }
    else{
        echo "fail";
    }
}



?>