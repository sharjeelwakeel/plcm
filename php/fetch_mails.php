<?php

session_start();

include_once("../connection/connection.php");

if(isset($_REQUEST['e_id'])&&isset($_REQUEST['m_id'])){
  $e_id=$_REQUEST['e_id'];
  $m_id=$_REQUEST['m_id'];

  $query="update emails set status='seen' where e_id=".$e_id;
  mysqli_query($conn,$query);

  $query="select * from emails where e_id=".$e_id;
  $mail=mysqli_query($conn,$query);
  $em=mysqli_fetch_assoc($mail);
  $rand=$em['rand_num'];

  
$arr=NULL;
  if($m_id==14){
    $query="select * from admin ";
    $get_admin=mysqli_query($conn,$query);
    $admin_data=mysqli_fetch_assoc($get_admin);
    $name_user=$admin_data['f_name'];
    $file_path=$admin_data['img_path'];
    $email=$admin_data['email'];
    


}
else{
  
    $query="select * from members where m_id=".$m_id;
    $get_member=mysqli_query($conn,$query);
    $member_data=mysqli_fetch_assoc($get_member);
    $name_user=$member_data['f_name']." ".$member_data['l_name'];
    $file_path=$member_data['img_path'];
    $email=$member_data['email'];
}

$name=NULL;

$query="select * from emails where m_id=14 and rand_num=".$rand;
$admin=mysqli_query($conn,$query);
if(mysqli_num_rows($admin)>0){
  $name="Zeeshan Javed,";
}
else{
  $name="";
}


$query="select f_name from members,emails where members.m_id=emails.m_id and rand_num=".$rand;
//echo $query;
$get=mysqli_query($conn,$query);
$arr=mysqli_fetch_all($get,MYSQLI_ASSOC);
$user=NULL;
$i=-1;

foreach($arr as $val ){
  $user[++$i]= $val['f_name'];

}
   




  $user=implode(",",$user);

  



$chat=null;

  




  // $profile=" <img src='admin/".$file_path."' class='rounded-circle' style='height:50px;width:50px'>

  // <span class='text-muted ps-2'>".$name."</span>";

  // $query="select * from emails where e_id=".$e_id;
  // $mail=mysqli_query($conn,$query);
  // $em=mysqli_fetch_assoc($mail);
  // $file=$em['file_path'];
  // $downlaod=($em['file_path']!='')?"download":'';


  // $chat="<div class'd-flex flex-column '><div class='d-flex flex-column font_size_mail'><div>subject:</div><div class='text-dark fw-normal fs-5'>".$em['subject']."</div></div>
  //                                   <div class='font_size_mail d-flex flex-column mt-2'><div>description:</div><div class='text-dark fw-normal fs-5'>".$em['description']."</div></div>
  //                                   <div class='mt-2 fs-5 '><a class='text-decoration-none' href='".$file."'download>".$downlaod."</a></div>
  // </div>";

  
  $profile="<div class='h5 px-2 fw-bold text-muted'>".$em['subject']."</div> ";


  $file=$em['file_path'];
  $downlaod=($em['file_path']!='')?"download":'';


  $chat="<div class='d-flex flex-column '><div class='d-flex '><img src='admin/".$file_path."' class='rounded-circle' style='height:50px;width:50px'>

 <div> <span class='text-muted fs-5 fw-normal ps-2'>".$name_user."<span>&lt".$email."&gt</span></span>
 <div class=' text-normal px-2'style='font-size:12px!important'>to:".$name.$user."</div>
 <div class=' text-normal px-2 'style='font-size:12px!important'>".date(' H:i A',strtotime($em['date']))."</div>
 </div></div>
 

  </div>
  
  <div class'd-flex flex-column align-items-stretch'><div class='d-flex flex-column font_size_mail'></div>
                                    <div class='font_size_mail d-flex flex-column mt-2'><div class='text-dark fw-normal ' style='font-size:14px!important' >".$em['description']."</div></div>
                                    <div class='mt-2 fs-5 '><a class='text-decoration-none text-info' style='font-size:14px!important' href='".$file."'download>".$downlaod."</a></div>
                                    
                                     </div>
                                    
  </div>
  <div class='text-end align-self-end'>
  <button type='button' class='btn  btn-outline-success fw-bold mx-2 forward' data-id='".$em['e_id']."' data-bs-toggle='modal' data-bs-target='#exampleModal'>
Forward
</button>";



echo json_encode(array("profile"=>$profile,"chat"=>$chat));




} //isset if end



?>