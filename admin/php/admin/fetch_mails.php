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
  




  $profile=" <img src='".$mbr['img_path']."' class='rounded-circle' style='height:50px;width:50px'>

  <span class='text-muted ps-2'>".$mbr['f_name']."</span>";

  $query="select * from emails where e_id=".$e_id;
  $mail=mysqli_query($conn,$query);
  $em=mysqli_fetch_assoc($mail);
  $file=$em['file_path'];
  $downlaod=($em['file_path']!='')?"download":'';


  $chat="<div class'd-flex flex-column '><div class='d-flex flex-column font_size_mail'><div>subject:</div><div class='text-dark fw-normal fs-5'>".$em['subject']."</div></div>
                                    <div class='font_size_mail d-flex flex-column mt-2'><div>description:</div><div class='text-dark fw-normal fs-5'>".$em['description']."</div></div>
                                    <div class='mt-2 fs-5 '><a class='text-decoration-none' href='".$file."'download>".$downlaod."</a></div>
  </div>";



echo json_encode(array("profile"=>$profile,"chat"=>$chat));




} //isset if end



?>