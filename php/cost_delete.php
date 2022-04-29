<?php

session_start();

include_once("../connection/connection.php");

if(isset($_REQUEST['id']))
{
$id=$_REQUEST['id'];
$m_id=$_SESSION['id'];
$query="select * from cost where c_id=".$id;
$module=mysqli_query($conn,$query);
$mod=mysqli_fetch_assoc($module);
$subject=$mod['name'];
$p_id=$mod['p_id'];

//history code
$query="insert into history (p_id,m_id,description) values(".$p_id.",".$m_id.",'delete cost ".$subject."')";
mysqli_query($conn,$query);


//history code end
//notification start
$query="select *  from assign_projects where p_id=".$p_id." and m_id!=".$m_id;
$notify_assign=mysqli_query($conn,$query);

$c_id=14;
$query="insert into notifications (p_id,c_id,u_id,name,u_category,description,link_page) values(".$p_id.",".$m_id.",".$c_id.",' '".",'admin','delete module ".$subject." in','cost_analysis.php?')";
mysqli_query($conn,$query);
if(mysqli_num_rows($notify_assign)>0){
while($fetch=mysqli_fetch_assoc($notify_assign))
{
$c_id=$fetch['m_id'];
$query="insert into notifications (p_id,c_id,u_id,name,u_category,description,link_page) values(".$p_id.",".$m_id.",".$c_id.",' '".",'member','delete module ".$subject." in','add_cost.php')";
mysqli_query($conn,$query);




}

}
else{
  
}
    

//notification end


$query="delete from cost where c_id=".$id;

if(mysqli_query($conn,$query)){
   
    echo "success";
}
else{
    echo "fail";
}

}



?>