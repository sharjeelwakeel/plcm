<?php

session_start();

include_once("../connection/connection.php");

if(isset($_REQUEST['subject'])){
    $m_id=$_SESSION['id'];
    $subject=mysqli_real_escape_string($conn,$_REQUEST['subject']);
    $type=mysqli_real_escape_string($conn,$_REQUEST['type']);
    $priority=mysqli_real_escape_string($conn,$_REQUEST['priority']);
    $assigned=mysqli_real_escape_string($conn,$_REQUEST['assigned']);
    $status=mysqli_real_escape_string($conn,$_REQUEST['status']);
    $id=$_REQUEST['mod_id'];
    //query for module
    $query="select * from module where mod_id= ".$id;

    $fetch_module=mysqli_query($conn,$query);
    $fm=mysqli_fetch_assoc($fetch_module);

    if(isset($_FILES['file']['name']) && !empty($_FILES['file']['name'])){
        $file_path="files/".rand().$_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'],"../admin/".$file_path);
        $query="update module set subject='".$subject."',type='".$type."',priority='".$priority."',assign_id=".$assigned.",status='".$status."',m_file_path='".$file_path. "' where mod_id=".$id;

       

    }else{
     $query="update module set subject='".$subject."',type='".$type."',priority='".$priority."',assign_id=".$assigned.",status='".$status."' where mod_id=".$id;

    }
     // // echo $query;
// exit;
    if(mysqli_query($conn,$query)){
    }
    else{
        echo"fail";
    }




//notification start
$query="select *  from assign_projects where p_id=".$fm['p_id']." and m_id!=".$m_id;
$notify_assign=mysqli_query($conn,$query);

$c_id=14;

if($fm['subject']==$subject){
$des="made some changes in module ".$subject;
}
else{
$des=$fm['subject']." module replaced name by ".$subject;
}

 //history code
 $query="insert into history (p_id,m_id,description) values(".$fm['p_id'].",".$m_id.",'".$des."')";
 mysqli_query($conn,$query);
 
 
 //history code end
$query="insert into notifications (p_id,c_id,u_id,name,u_category,description) values(".$fm['p_id'].",".$m_id.",".$c_id.",' ','admin','".$des."')";
mysqli_query($conn,$query);

if(mysqli_num_rows($notify_assign)>0){
while($fetch=mysqli_fetch_assoc($notify_assign))
{
$c_id=$fetch['m_id'];
$query="insert into notifications (p_id,c_id,u_id,name,u_category,description) values(".$fm['p_id'].",".$m_id.",".$c_id.",' ','member','".$des."')";
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