<?php

session_start();

include_once("../connection/connection.php");
$p_id=$_REQUEST['id'];
$query="select s_id as id,subject as text,s_date as start_date,e_date as end_date from module,schedule where module.mod_id=schedule.m_id and schedule.p_id=".$p_id." and e_date is not NULL and s_date is not NULL";
//echo $query;
// $query="select * from task";
$result=mysqli_query($conn,$query);

$row = mysqli_fetch_all($result,MYSQLI_ASSOC);
// $query="select * from link";
$link=mysqli_query($conn,$query);
$data=mysqli_fetch_array($link,MYSQLI_ASSOC);
echo json_encode(array("tasks"=>$row));



?>