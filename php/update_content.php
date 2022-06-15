<?php

session_start();

include_once("../connection/connection.php");

print_r($_REQUEST);
print_r($_FILES);
if(isset($_REQUEST['status'])){
    $status=$_REQUEST['status'];
    $desc=$_REQUEST['desc'];
    
    $r_id=$_REQUEST['r_id'];
    

$file_path=NULL;
    if(isset($_FILES['upd_file']['name'])&&!empty($_FILES['upd_file']['name']))
    {
        $file_path="admin/images/".rand().$_FILES['upd_file']['name'];
        move_uploaded_file($_FILES['upd_file']['tmp_name'],"../".$file_path);

        $query="update content set status='".$status."',description='".$desc."',file_path='".$file_path."' where c_id=".$r_id;
    }
    else{
        $query="update content set status='".$status."',description='".$desc."' where c_id=".$r_id;
    }
    echo $query;
    if(mysqli_query($conn,$query)){
        echo "success";
    }
    else{
        echo "no";
    }
 
  
}

?>