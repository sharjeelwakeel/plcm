<?php

session_start();

include_once("../connection/connection.php");



if(isset($_REQUEST['subject'])){
    $id=$_SESSION['id'];
    $subject=mysqli_real_escape_string($conn,$_REQUEST['subject']); 
    $description=mysqli_real_escape_string($conn,$_REQUEST['description']);
    $assigned=mysqli_real_escape_string($conn,$_REQUEST['assigned']);
    $status=mysqli_real_escape_string($conn,$_REQUEST['status']);
    $p_id=mysqli_real_escape_string($conn,$_REQUEST['p_id']);
    $m_id=$_SESSION['id'];
    $h_date= $_REQUEST['s_date'];
    $req=$_REQUEST['req'];

 $h_date = date("Y-m-d", strtotime ($h_date));  

  
$query="insert into test_case (name,description,status,assigned,c_id,p_id,r_id,due) values('".$subject."','".$description."','".$status."',".$assigned.",".$m_id.",".$p_id.",".$req.",'".$h_date."')";




if(mysqli_query($conn,$query)){
    $last_id = mysqli_insert_id($conn);

if(isset($_REQUEST['skills']))
{
    $arr=$_REQUEST['skills'];

    for($i=0;$i<count($arr);$i++){
        $query="insert into browser_cross (t_id,b_id) values(".$last_id.",".$arr[$i].")";
        mysqli_query($conn,$query);
    }

}

if(isset($_REQUEST['cpu']))
{
    $arr=$_REQUEST['cpu'];

    for($i=0;$i<count($arr);$i++){
        $query="insert into cpu_cross (t_id,c_id) values(".$last_id.",".$arr[$i].")";
        mysqli_query($conn,$query);
    }

}


if(isset($_REQUEST['os']))
{
    $arr=$_REQUEST['os'];

    for($i=0;$i<count($arr);$i++){
        $query="insert into operating_system_cross (t_id,o_id) values(".$last_id.",".$arr[$i].")";
        mysqli_query($conn,$query);
    }

}


if(isset($_REQUEST['database']))
{
    $arr=$_REQUEST['database'];

    for($i=0;$i<count($arr);$i++){
        $query="insert into storage_cross (t_id,s_id) values(".$last_id.",".$arr[$i].")";
        mysqli_query($conn,$query);
    }

}

    //history code
$query="insert into history (p_id,m_id,description) values(".$p_id.",".$m_id.",'add test case')";
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
$query="insert into notifications (p_id,c_id,u_id,name,u_category,description,link_page) values(".$p_id.",".$id.",".$m_id.",'".$subject."','admin','add test case in','quality.php?')";
mysqli_query($conn,$query);
if(mysqli_num_rows($notify_assign)>0){
while($fetch=mysqli_fetch_assoc($notify_assign))
{
$m_id=$fetch['m_id'];
$query="insert into notifications (p_id,c_id,u_id,name,u_category,description,link_page) values(".$p_id.",".$id.",".$m_id.",'".$subject."','member','add test case in','quality.php')";
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