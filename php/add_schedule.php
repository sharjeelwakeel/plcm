<?php

session_start();

include_once("../connection/connection.php");

if(isset($_REQUEST['s_date'])&&isset($_REQUEST['e_date'])){


    $s_date=$_REQUEST['s_date'];
   
    $s_date = date("Y-m-d", strtotime ($s_date)); 
   
    $e_date=$_REQUEST['e_date'];
    $e_date = date("Y-m-d", strtotime ($e_date)); 
    // echo $e_date;
    // exit(1);
    $mod_id=$_REQUEST['mod_id'];




   // $query="insert into schedule (p_id,m_id,s_date,e_date) value(".$p_id.",".$mod_id.",'".$s_date."','".$e_date."')";
$query="update schedule set s_date='".$s_date."',e_date='".$e_date."' where m_id=".$mod_id;
    if(mysqli_query($conn,$query)){
    
    }
    else{
        echo "fail";
    }




    $query="select * from module where mod_id=".$mod_id;
    $module=mysqli_query($conn,$query);
    $mod=mysqli_fetch_assoc($module);
    $subject=$mod['subject'];
    $p_id=$mod['p_id'];
    $m_id=$_SESSION['id'];
    
    //history code
    $query="insert into history (p_id,m_id,description) values(".$p_id.",".$m_id.",'add schedule of module ".$subject."')";
    mysqli_query($conn,$query);
    
    
    //history code end
    //notification start
    $query="select *  from assign_projects where p_id=".$p_id." and m_id!=".$m_id;
    $notify_assign=mysqli_query($conn,$query);
    
    $c_id=14;
    $query="insert into notifications (p_id,c_id,u_id,name,u_category,description) values(".$p_id.",".$m_id.",".$c_id.",' '".",'admin','add schedule of module ".$subject." in')";
    mysqli_query($conn,$query);
    if(mysqli_num_rows($notify_assign)>0){
    while($fetch=mysqli_fetch_assoc($notify_assign))
    {
    $c_id=$fetch['m_id'];
    $query="insert into notifications (p_id,c_id,u_id,name,u_category,description) values(".$p_id.",".$m_id.",".$c_id.",' '".",'member','add schedule of module ".$subject." in')";
    mysqli_query($conn,$query);
    
    
    
    
    }
    echo"success";
    }
    else{
        echo"success";
      
    }
        
    
    //notification end
    



}



?>