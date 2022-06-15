<?php

session_start();

include_once("../connection/connection.php");

// print_r($_REQUEST);
// exit;

if(isset($_REQUEST['description'])){

$subject=($_REQUEST['subject']!='')?$_REQUEST['subject']:'PLCM';
$description=$_REQUEST['description'];
$id=$_SESSION['id'];


// $phpmailer->Subject = "PLCM";
// $phpmailer->Body = "<div style='width:100vw;height:100vh; background-color:#e9ecef!important;'><div style='background-color:#198754!important;color:white;font-weight:bold;padding:20px 20px;'>PLCM</div><div style='width:100%;height:100%; background-color:#e9ecef!important; display:flex;flex-direction:column; justify-content:center;align-items:center'> <div class='text-secondary'>zeeshan javed send you mail</div>
// <a class='btn btn-outline-success' href='http://localhost/plcm/admin/emails.php'>please review</a>
// </div></div>";
// $phpmailer->AltBody = "This is the plain text version of the email content";

if(($_REQUEST['mode']=='forward')){

    $e_id=$_REQUEST['e_id'];
    $query="select * from emails where e_id=".$e_id;
    $get_file=mysqli_query($conn,$query);
    $take=mysqli_fetch_assoc($get_file);
    $file_path=$take['file_path'];

 }
 else{
if(isset($_FILES['file']['name']) && !empty($_FILES['file']['name'])){
    $file_path="files/".rand().$_FILES['file']['name'];
    move_uploaded_file($_FILES['file']['tmp_name'],"../admin/".$file_path);
    
// $phpmailer->addAttachment("../../".$file_path,"file_text");
}//if end
else{
    $file_path='';
}//else end

 }


 
$arr=$_REQUEST['skills'];

$rand=rand();
$i=0;
$category=NULL;
while($i<count($arr)){

    $mail_id=$arr[$i++];
   $category=($mail_id==14)?1:0;

    $query="insert into emails (crt_id,m_id,rand_num,subject,description,file_path,category)values(".$id.",".$mail_id.",".$rand.",'".$subject."','".$description."','".$file_path."',".$category.")";
    
    mysqli_query($conn,$query);

        
}

echo "success";


}

?>