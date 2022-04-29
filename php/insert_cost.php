<?php

session_start();

include_once("../connection/connection.php");


if(isset($_REQUEST['name'])){
    $id=$_SESSION['id'];
    $name=mysqli_real_escape_string($conn,$_REQUEST['name']);
    $price=mysqli_real_escape_string($conn,$_REQUEST['price']);
    $description=mysqli_real_escape_string($conn,$_REQUEST['description']);
    
    $p_id=mysqli_real_escape_string($conn,$_REQUEST['p_id']);
    $mod_id=mysqli_real_escape_string($conn,$_REQUEST['module']);
    $assign_id=mysqli_real_escape_string($conn,$_REQUEST['assigned']);
    $m_id=$_SESSION['id'];

  


    $query="insert into cost (p_id,create_id,m_id,mod_id,name,price,description) values(".$p_id." ,".$m_id.",".$assign_id.",".$mod_id.",'".$name."',".$price.",'".$description."')";

mysqli_query($conn,$query);






    //history code
$query="insert into history (p_id,m_id,description) values(".$p_id.",".$m_id.",'add cost of ".$name."')";
mysqli_query($conn,$query);


//history code end

    


//notification start
$query="select *  from assign_projects where p_id=".$p_id." and m_id!=".$m_id;
$notify_assign=mysqli_query($conn,$query);

$m_id=14;
$query="insert into notifications (p_id,c_id,u_id,name,u_category,description,link_page) values(".$p_id.",".$id.",".$m_id.",'"."','admin','add cost of ".$name." in','cost_analysis.php?')";
mysqli_query($conn,$query);
if(mysqli_num_rows($notify_assign)>0){
while($fetch=mysqli_fetch_assoc($notify_assign))
{
$m_id=$fetch['m_id'];
$query="insert into notifications (p_id,c_id,u_id,name,u_category,description,link_page) values(".$p_id.",".$id.",".$m_id.",'"."','member','add cost of ".$name." in','add_cost.php')";
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