<?php

session_start();

include_once("../connection/connection.php");


if(isset($_REQUEST['subject'])){
    $id=$_SESSION['id'];
    $subject=mysqli_real_escape_string($conn,$_REQUEST['subject']);
    $status=mysqli_real_escape_string($conn,$_REQUEST['status']);
    $p_id=mysqli_real_escape_string($conn,$_REQUEST['p_id']);
    $m_id=$_SESSION['id'];
    $t_id=$_REQUEST['t_id'];

  

   $query="insert into defect (c_id,p_id,t_id,description,status) values(".$m_id.",".$p_id.",".$t_id.",'".$subject."','".$status."')";

$last_id=NULL;

if(mysqli_query($conn,$query)){
    $last_id = mysqli_insert_id($conn);
    



    //history code
$query="insert into history (p_id,m_id,description) values(".$p_id.",".$m_id.",'add defect')";
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
$query="insert into notifications (p_id,c_id,u_id,name,u_category,description,link_page) values(".$p_id.",".$id.",".$m_id.",'".$subject."','admin','add defect in','defect.php?t_id=".$t_id."&&')";
mysqli_query($conn,$query);
if(mysqli_num_rows($notify_assign)>0){
while($fetch=mysqli_fetch_assoc($notify_assign))
{
$m_id=$fetch['m_id'];
$query="insert into notifications (p_id,c_id,u_id,name,u_category,description,link_page) values(".$p_id.",".$id.",".$m_id.",'".$subject."','member','add defect in','defect.php?t_id=".$t_id."&&')";
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