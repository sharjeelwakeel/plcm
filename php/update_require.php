<?php

session_start();

include_once("../connection/connection.php");


if(isset($_REQUEST['subject'])){
    $m_id=$_SESSION['id'];
    $subject=mysqli_real_escape_string($conn,$_REQUEST['subject']);
    $status=mysqli_real_escape_string($conn,$_REQUEST['status']);
    $mod_id=mysqli_real_escape_string($conn,$_REQUEST['mod_id']);
    $id=$_REQUEST['id'];
    //query for module
    $query="select * from requirement where r_id= ".$id;

    $fetch_module=mysqli_query($conn,$query);
    $fm=mysqli_fetch_assoc($fetch_module);

    $query="update requirement set mod_id=".$mod_id.", name='".$subject."', artifact='".$status."'"." where r_id=".$id;
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

if($fm['name']==$subject){
$des="made some changes in requirment ".$subject;
}
else{
$des=$fm['name']." requirement replaced name by ".$subject;
}

 //history code
 $query="insert into history (p_id,m_id,description) values(".$fm['p_id'].",".$m_id.",'".$des."')";
 //echo $query;
 mysqli_query($conn,$query);
 
 
 //history code end
$query="insert into notifications (p_id,c_id,u_id,name,u_category,description,link_page) values(".$fm['p_id'].",".$m_id.",".$c_id.",' ','admin','".$des."','require.php?')";
mysqli_query($conn,$query);

if(mysqli_num_rows($notify_assign)>0){
while($fetch=mysqli_fetch_assoc($notify_assign))
{
$c_id=$fetch['m_id'];
$query="insert into notifications (p_id,c_id,u_id,name,u_category,description,link_page) values(".$fm['p_id'].",".$m_id.",".$c_id.",' ','member','".$des."','require.php')";
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