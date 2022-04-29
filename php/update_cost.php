<?php

session_start();

include_once("../connection/connection.php");

if(isset($_REQUEST['name'])){
    $m_id=$_SESSION['id'];
    $name=mysqli_real_escape_string($conn,$_REQUEST['name']);
    $price=mysqli_real_escape_string($conn,$_REQUEST['price']);
    $description=mysqli_real_escape_string($conn,$_REQUEST['description']);
    $mod_id=mysqli_real_escape_string($conn,$_REQUEST['module']);
    $assign_id=mysqli_real_escape_string($conn,$_REQUEST['assigned']);

    $id=$_REQUEST['c_id'];
    //query for module
    $query="select * from cost where c_id= ".$id;
    // echo $query;
    // exit;

    $fetch_module=mysqli_query($conn,$query);
    $fm=mysqli_fetch_assoc($fetch_module);


     $query="update cost set name='".$name."',price=".$price.",description='".$description."',mod_id=".$mod_id.",m_id=".$assign_id." where c_id=".$id;

   
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

if($fm['name']==$name){
$des="made some changes in cost ".$name;
}
else{
$des=$fm['name']." cost replaced name by ".$name;
}

 //history code
 $query="insert into history (p_id,m_id,description) values(".$fm['p_id'].",".$m_id.",'".$des."')";
 mysqli_query($conn,$query);
 
 
 //history code end
$query="insert into notifications (p_id,c_id,u_id,name,u_category,description,link_page) values(".$fm['p_id'].",".$m_id.",".$c_id.",' ','admin','".$des."','cost_analysis.php?')";
mysqli_query($conn,$query);

if(mysqli_num_rows($notify_assign)>0){
while($fetch=mysqli_fetch_assoc($notify_assign))
{
$c_id=$fetch['m_id'];
$query="insert into notifications (p_id,c_id,u_id,name,u_category,description,link_page) values(".$fm['p_id'].",".$m_id.",".$c_id.",' ','member','".$des."','add_cost.php')";
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