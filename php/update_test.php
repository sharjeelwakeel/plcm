<?php

session_start();

include_once("../connection/connection.php");
// print_r($_REQUEST);
// exit;

if(isset($_REQUEST['subject'])){
    $id=$_SESSION['id'];
    $subject=mysqli_real_escape_string($conn,$_REQUEST['subject']); 
    $description=mysqli_real_escape_string($conn,$_REQUEST['description']);
    $assigned=mysqli_real_escape_string($conn,$_REQUEST['assigned']);
    $status=mysqli_real_escape_string($conn,$_REQUEST['status']);
    $t_id=mysqli_real_escape_string($conn,$_REQUEST['t_id']);
    $m_id=$_SESSION['id'];
    $h_date= $_REQUEST['s_date'];
    $req=$_REQUEST['req'];

 $h_date = date("Y-m-d", strtotime ($h_date));     //query for module
    $query="select * from test_case where t_id= ".$t_id;

    $fetch_module=mysqli_query($conn,$query);
    $fm=mysqli_fetch_assoc($fetch_module);

     $query="update test_case set name='".$subject."',description='".$description."',status='".$status."',assigned=".$assigned.",due='".$h_date."',r_id=".$req." where t_id=".$t_id;

    
//     echo $query;
// exit;
    if(mysqli_query($conn,$query)){

      //  echo "done";
if(isset($_REQUEST['skills']))
{
    $query="delete from browser_cross where t_id=".$t_id;
    mysqli_query($conn,$query);
    // echo "come";
    $arr=$_REQUEST['skills'];

    for($i=0;$i<count($arr);$i++){
        $query="insert into browser_cross (t_id,b_id) values(".$t_id.",".$arr[$i].")";
        mysqli_query($conn,$query);
        // echo $query;
    }

}
else{
    $query="delete from browser_cross where t_id=".$t_id;
    mysqli_query($conn,$query);
}

if(isset($_REQUEST['cpu']))
{
    $query="delete from cpu_cross where t_id=".$t_id;
    mysqli_query($conn,$query);
    $arr=$_REQUEST['cpu'];

    for($i=0;$i<count($arr);$i++){
        $query="insert into cpu_cross (t_id,c_id) values(".$t_id.",".$arr[$i].")";
    
         mysqli_query($conn,$query);
    }

}
else{
    $query="delete from cpu_cross where t_id=".$t_id;
    mysqli_query($conn,$query);
}


if(isset($_REQUEST['os']))
{
    $query="delete from operating_system_cross where t_id=".$t_id;
    mysqli_query($conn,$query);
    $arr=$_REQUEST['os'];

    for($i=0;$i<count($arr);$i++){
        $query="insert into operating_system_cross (t_id,o_id) values(".$t_id.",".$arr[$i].")";
    
         mysqli_query($conn,$query);
    }

}
else{
    $query="delete from operating_system_cross where t_id=".$t_id;
    mysqli_query($conn,$query);
}

if(isset($_REQUEST['database']))
{
    $query="delete from storage_cross where t_id=".$t_id;
    mysqli_query($conn,$query);
    $arr=$_REQUEST['database'];

    for($i=0;$i<count($arr);$i++){
        $query="insert into storage_cross (t_id,s_id) values(".$t_id.",".$arr[$i].")";
    
         mysqli_query($conn,$query);
    }

}
else{
    $query="delete from storage_cross where t_id=".$t_id;
    mysqli_query($conn,$query);
}

        
    }
    else{
        echo"fail";
    }




//notification start
$query="select *  from assign_projects where p_id=".$fm['p_id']." and m_id!=".$m_id;
$notify_assign=mysqli_query($conn,$query);

$c_id=14;

if($fm['name']==$subject){
$des="made some changes in test case ".$subject;
}
else{
$des=$fm['name']." test case replaced name by ".$subject;
}

 //history code
 $query="insert into history (p_id,m_id,description) values(".$fm['p_id'].",".$m_id.",'".$des."')";
 //echo $query;
 mysqli_query($conn,$query);
 
 
 //history code end
$query="insert into notifications (p_id,c_id,u_id,name,u_category,description,link_page) values(".$fm['p_id'].",".$m_id.",".$c_id.",' ','admin','".$des."','quality.php?')";
mysqli_query($conn,$query);

if(mysqli_num_rows($notify_assign)>0){
while($fetch=mysqli_fetch_assoc($notify_assign))
{
$c_id=$fetch['m_id'];
$query="insert into notifications (p_id,c_id,u_id,name,u_category,description,link_page) values(".$fm['p_id'].",".$m_id.",".$c_id.",' ','member','".$des."','quality.php')";
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