<?php

session_start();

include_once("../connection/connection.php");

if(isset($_REQUEST['id'])&&isset($_REQUEST['category'])){
  $r_id=$_REQUEST['id'];
  $s_id=$_SESSION['id'];
  $category=$_REQUEST['category'];
  $msg=$_REQUEST['msg'];



  $query="insert into chat (s_id,r_id,msg,category) values( ".$s_id.", " .$r_id.",'".$msg."',".$category.")";

  if(mysqli_query($conn,$query)){
      echo "success";
  }
  else{
    echo "fail";
  }







} 



?>