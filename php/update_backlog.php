<?php

session_start();

include_once("../connection/connection.php");

if(isset($_REQUEST['e_date'])&&isset($_REQUEST['s_date'])){
 $e_date=$_REQUEST['e_date'];
 $e_date = date("Y-m-d", strtotime ($e_date)); 
 $s_date=$_REQUEST['s_date'];
 $s_date = date("Y-m-d", strtotime ($s_date)); 
 $subject=$_REQUEST['name'];
 $bid=$_REQUEST['id'];

 $query="update  backlog set name='".$subject."', s_date='".$s_date."', e_date='".$e_date."' where b_id=".$bid;

 if(mysqli_query($conn,$query)){
     echo "success";
 }
 else{
     echo "fail";
 }

}

?>