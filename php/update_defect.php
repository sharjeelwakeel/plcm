<?php

session_start();

include_once("../connection/connection.php");

if(isset($_REQUEST['subject'])){
    $m_id=$_SESSION['id'];
    $subject=mysqli_real_escape_string($conn,$_REQUEST['subject']);
    $status=mysqli_real_escape_string($conn,$_REQUEST['status']);
    $id=$_REQUEST['id'];

    //query for module
    $query="select * from defect where d_id= ".$id;

    $fetch_module=mysqli_query($conn,$query);
    $fm=mysqli_fetch_assoc($fetch_module);
    $t_id=$fm['t_id'];

    $query="update defect set description='".$subject."', status='".$status."'"." where d_id=".$id;
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

if($fm['status']==$status){
$des="made some changes in defect ".$status;
}
else{
$des=$fm['status']." defect replaced name by ".$status;
}

 //history code
 $query="insert into history (p_id,m_id,description) values(".$fm['p_id'].",".$m_id.",'".$des."')";
 //echo $query;
 mysqli_query($conn,$query);
 
 
 //history code end
$query="insert into notifications (p_id,c_id,u_id,name,u_category,description,link_page) values(".$fm['p_id'].",".$m_id.",".$c_id.",' ','admin','".$des."','defect.php?t_id=".$t_id."&&')";
mysqli_query($conn,$query);

if(mysqli_num_rows($notify_assign)>0){
while($fetch=mysqli_fetch_assoc($notify_assign))
{
$c_id=$fetch['m_id'];
$query="insert into notifications (p_id,c_id,u_id,name,u_category,description,link_page) values(".$fm['p_id'].",".$m_id.",".$c_id.",' ','member','".$des."','defect.php?t_id=".$t_id."&&')";
mysqli_query($conn,$query);


}
echo "success";
}
else{
  //  echo"success";
}
    

//notification end

}






?>