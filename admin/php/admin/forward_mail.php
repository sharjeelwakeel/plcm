<?php

session_start();

include_once("../../connection/connection.php");

if(isset($_REQUEST['e_id'])){

    $e_id=$_REQUEST['e_id'];

    $query="select * from emails where e_id=".$e_id;
    //echo $query;
    $get=mysqli_query($conn,$query);
    $fetch=mysqli_fetch_assoc($get);
    echo json_encode(array("subject"=>$fetch['subject'],"description"=>$fetch['description'],"file_path"=>$fetch['file_path'],"e_id"=>$fetch['e_id']));



}



    ?>