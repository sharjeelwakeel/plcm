<?php

session_start();

include_once("../connection/connection.php");

if(isset($_REQUEST['e_date'])&&isset($_REQUEST['s_date'])){
 $e_date=$_REQUEST['e_date'];
 $e_date = date("Y-m-d", strtotime ($e_date)); 
 $s_date=$_REQUEST['s_date'];
 $s_date = date("Y-m-d", strtotime ($s_date)); 
 $subject=$_REQUEST['subject'];
 $pid=$_REQUEST['p_id'];

 $query="insert into backlog (p_id,name,e_date,s_date) values(".$pid.",'".$subject."','".$e_date."','".$s_date."')";

 if(mysqli_query($conn,$query)){
     echo "success";
 }
 else{
     echo "fail";
 }

}

?>