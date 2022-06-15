<?php
session_start();
 include_once("../../connection/connection.php");

 //print_r($_REQUEST);

 if(isset($_REQUEST['id'])){
     $status=$_REQUEST['status'];
     $id=$_REQUEST['id'];
     $pid=$_REQUEST['pid'];

  

$query="select * from module where mod_id=".$id;
$module=mysqli_query($conn,$query);
$md=mysqli_fetch_assoc($module);

     $query="update module set status='".$status."' where mod_id=".$id;
   //  echo $query;
     if(mysqli_query($conn,$query)){
   

         $query="select * from assign_projects where p_id=".$pid;
        //  echo $query;
        //  exit;
    
   $assign= mysqli_query($conn,$query);
   if(mysqli_num_rows($assign)>0){
       while($user=mysqli_fetch_assoc($assign)){
      
   
        $status="success";
        $name="reply";
        $category="admin";
        $c_id=14;
        $mid=$user['m_id'];

        $query="insert into notifications (p_id,c_id,u_id,name,u_category,description,link_page) values(".$pid.",".$c_id.",".$mid.",'"."','admin','reply on module ".$md['subject']." in   ','work_packages.php')";
      
      
        mysqli_query($conn,$query);
    }
    echo "success";

    }
}
    else{

        $status="fail";
  
    
     }
     
 }


 ?>