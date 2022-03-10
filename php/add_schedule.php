<?php

session_start();

include_once("../connection/connection.php");

if(isset($_REQUEST['s_date'])&&isset($_REQUEST['e_date'])){


    $s_date=$_REQUEST['s_date'];
   
    $s_date = date("Y-m-d", strtotime ($s_date)); 
   
    $e_date=$_REQUEST['e_date'];
    $e_date = date("Y-m-d", strtotime ($e_date)); 
    // echo $e_date;
    // exit(1);
    $mod_id=$_REQUEST['mod_id'];
   // $query="insert into schedule (p_id,m_id,s_date,e_date) value(".$p_id.",".$mod_id.",'".$s_date."','".$e_date."')";
$query="update schedule set s_date='".$s_date."',e_date='".$e_date."' where m_id=".$mod_id;
    if(mysqli_query($conn,$query)){
        echo "success";
    }
    else{
        echo "fail";
    }
}



?>