<?php

session_start();

include_once("../../connection/connection.php");
$id=$_SESSION['id'];
$query="select * from emails where m_id=".$id." order by e_id desc" ;
//echo $query;
$user=NULL;
$emails=mysqli_query($conn,$query);
if(mysqli_num_rows($emails)>0){

  while($em=mysqli_fetch_assoc($emails)){

  if($em['crt_id']==14){
      
      $query="select * from admin ";
      $get_admin=mysqli_query($conn,$query);
      $admin_data=mysqli_fetch_assoc($get_admin);
      $name=$admin_data['f_name'];
      $file_path=$admin_data['img_path'];

  }
  else{
      $query="select * from members where m_id=".$em['crt_id'];
      $get_member=mysqli_query($conn,$query);
      $member_data=mysqli_fetch_assoc($get_member);
      $name=$member_data['f_name']." ".$member_data['l_name'];
      $file_path=$member_data['img_path'];
  }


    if($em['status']=='unseen'){
        $status='d-inline-block';
    }
    else{
        $status='d-none';
    }
  
    $user.="<tr class='bg-success border border-start-0 border-end-0 border-top-0 border-light get_mail' data-id='".$em['e_id']."' data-m_id='".$em['crt_id']."' style='cursor:pointer'><td><div class='text-light fw-bold'>".$name."<span class='badge ".$status." rounded-pill bg-light text-dark mx-2'>new</span></div>
    <p class=' e_desc'>".substr($em['description'],0,100)."</p>
    <div class='text-end e_date'>".date('d/m H:i A',strtotime($em['date']))."</div>
    </td></tr>";
  }


}
else{
  $user="<tr class='bg-success border border-0'><td class='text-light text-center ' colspan='5'>no mail</td></tr> ";

}

echo $user;

?>