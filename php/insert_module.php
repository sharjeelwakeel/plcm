<?php

session_start();

include_once("../connection/connection.php");


if(isset($_REQUEST['subject'])){
    $id=$_SESSION['id'];
    $subject=mysqli_real_escape_string($conn,$_REQUEST['subject']);
    $type=mysqli_real_escape_string($conn,$_REQUEST['type']);
    $priority=mysqli_real_escape_string($conn,$_REQUEST['priority']);
    $assigned=mysqli_real_escape_string($conn,$_REQUEST['assigned']);
    $status=mysqli_real_escape_string($conn,$_REQUEST['status']);
    $p_id=mysqli_real_escape_string($conn,$_REQUEST['p_id']);
    $m_id=$_SESSION['id'];

  

    if(isset($_FILES['file']['name']) && !empty($_FILES['file']['name'])){
        $file_path="files/".rand().$_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'],"../admin/".$file_path);
        
        $query="insert into module (create_id,assign_id,p_id,subject,status,priority,type,m_file_path) values(".$m_id." ,".$assigned.",".$p_id.",'".$subject."','".$status."','".$priority."','".$type."','".$file_path."')";


    }
    else{
    $query="insert into module (create_id,assign_id,p_id,subject,status,priority,type) values(".$m_id." ,".$assigned.",".$p_id.",'".$subject."','".$status."','".$priority."','".$type."')";

}





if(mysqli_query($conn,$query)){
    $last_id = mysqli_insert_id($conn);

    $query="insert into schedule (c_id,m_id,p_id) values(".$m_id.",".$last_id.",".$p_id.")";
    mysqli_query($conn,$query);


    //history code
$query="insert into history (p_id,m_id,description) values(".$p_id.",".$m_id.",'add module')";
mysqli_query($conn,$query);


//history code end

    

}
else{
    echo "fail";
}

//notification start
$query="select *  from assign_projects where p_id=".$p_id." and m_id!=".$m_id;
$notify_assign=mysqli_query($conn,$query);

$m_id=14;
$query="insert into notifications (p_id,c_id,u_id,name,u_category,description,link_page) values(".$p_id.",".$id.",".$m_id.",'".$subject."','admin','add module in','work_packages.php?')";
mysqli_query($conn,$query);
if(mysqli_num_rows($notify_assign)>0){
while($fetch=mysqli_fetch_assoc($notify_assign))
{
$m_id=$fetch['m_id'];
$query="insert into notifications (p_id,c_id,u_id,name,u_category,description,link_page) values(".$p_id.",".$id.",".$m_id.",'".$subject."','member','add module in','work_packages.php')";
mysqli_query($conn,$query);




}
echo "success";
}
else{
    echo"success";
}
    

//notification end

}


?>