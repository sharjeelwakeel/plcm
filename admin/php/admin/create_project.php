<?php
session_start();
include_once("../../connection/connection.php");

if(isset($_REQUEST['create'])){
    $title=mysqli_real_escape_string($conn,$_REQUEST['title']);
    $category=mysqli_real_escape_string($conn,$_REQUEST['category']);
    $problem=mysqli_real_escape_string($conn,$_REQUEST['problem']);
    
    
    $description=  base64_encode( $_REQUEST['description'] );
    
    $query="insert into projects (p_title,p_category,p_problem,p_description,a_id)values('".$title."','".$category."','".$problem."','".$description."',".$_SESSION['id'].")";
    if(mysqli_query($conn,$query)){
        echo "success";
    }
    else{

        echo"fail";
    }

}


?>