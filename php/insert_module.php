<?php

session_start();

include_once("../connection/connection.php");

if(isset($_REQUEST['module'])){
    $subject=mysqli_real_escape_string($conn,$_REQUEST['subject']);
    $type=mysqli_real_escape_string($conn,$_REQUEST['type']);
    $priority=mysqli_real_escape_string($conn,$_REQUEST['priority']);
    $assigned=mysqli_real_escape_string($conn,$_REQUEST['assigned']);
    $status=mysqli_real_escape_string($conn,$_REQUEST['status']);
    $p_id=mysqli_real_escape_string($conn,$_REQUEST['p_id']);
    $m_id=$_SESSION['id'];
    $query="insert into module (create_id,assign_id,p_id,subject,status,priority,type) values(".$m_id." ,".$assigned.",".$p_id.",'".$subject."','".$status."','".$priority."','".$type."')";

if(mysqli_query($conn,$query)){
    $last_id = mysqli_insert_id($conn);

    $query="insert into schedule (m_id,p_id) values(".$last_id.",".$p_id.")";
    mysqli_query($conn,$query);
    echo "success";

}
else{
    echo "fail";
}
    



}


?>