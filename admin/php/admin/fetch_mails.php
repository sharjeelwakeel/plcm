<?php

session_start();

include_once("../../connection/connection.php");

if(isset($_REQUEST['e_id'])&&isset($_REQUEST['m_id'])){
  $e_id=$_REQUEST['e_id'];
  $m_id=$_REQUEST['m_id'];

  $query="update emails set status='seen' where e_id=".$e_id;
  mysqli_query($conn,$query);


  $query="select * from members where m_id=".$m_id;
  $members=mysqli_query($conn,$query);
  $mbr=mysqli_fetch_assoc($members);

$chat=null;


  

$query="select * from emails where e_id=".$e_id;

$mail=mysqli_query($conn,$query);
$em=mysqli_fetch_assoc($mail);
$rand=$em['rand_num'];
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


  $profile="<div class='h5 px-2 fw-bold text-muted'>".$em['subject']."</div> ";


  $file=$em['file_path'];
  $downlaod=($em['file_path']!='')?"download":'';


  $chat="<div class='d-flex flex-column '><div class='d-flex '><img src='".$mbr['img_path']."' class='rounded-circle' style='height:50px;width:50px'>

 <div> <span class='text-muted fs-5 fw-normal ps-2'>".$mbr['f_name']."<span>&lt".$mbr['email']."&gt</span></span>
 <div class=' text-normal px-2'style='font-size:12px!important'>to:".$user."</div>
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