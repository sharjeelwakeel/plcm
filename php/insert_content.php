<?php

session_start();

include_once("../connection/connection.php");

// print_r($_REQUEST);
// print_r($_FILES);


    $status='true';
    $desc='';
    $p_id=$_REQUEST['p_id'];
    $r_id=$_REQUEST['r_id'];
    $m_id=$_SESSION['id'];
    

$file_path=NULL;
    if(isset($_FILES['file']['name'])&&!empty($_FILES['file']['name']))
    {
        $file_path="admin/files/".rand().$_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'],"../".$file_path);

        $query="select * from requirement where r_id=".$r_id;
        $module=mysqli_query($conn,$query);
        $md=mysqli_fetch_assoc($module);
        $mod_id=$md['mod_id'];
        $query="update module set m_file_path='".$file_path."', file_status='true' where mod_id=".$mod_id;
        //$query="insert into content (p_id,r_id,m_id,status,description,file_path)values(".$p_id.",".$r_id.",".$m_id.",'".$status."','".$desc."','".$file_path."')";
    }
   
    if(mysqli_query($conn,$query)){
        echo "success";
    }
    else{
        echo "no";
    }
 
  




?>