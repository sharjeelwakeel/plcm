<?php

session_start();

include_once("../../connection/connection.php");
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;

// require_once "vendor/autoload.php";
//print_r($_REQUEST);

// $phpmailer = new PHPMailer();
//print_r($phpmailer);
//print_r($phpmailer);
// $phpmailer->isSMTP();
// $phpmailer->Host = 'smtp.mailtrap.io';
// $phpmailer->SMTPAuth = true;
// $phpmailer->Port = 2525;
// $phpmailer->Username = '3eeb064635375d';
// $phpmailer->Password = 'a2b440b9daf8d2';

// $phpmailer = new PHPMailer();
// $phpmailer->IsSMTP(); // enable SMTP
// $phpmailer->SMTPDebug = 2;  // debugging: 1 = errors and messages, 2 = messages only
// $phpmailer->SMTPAuth = true;  // authentication enabled
// $phpmailer->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for GMail
// $phpmailer->SMTPAutoTLS = false;
// $phpmailer->Host = 'smtp.gmail.com';
// $phpmailer->Port = 587;
// $phpmailer->Username   = "sharjeelwakeel837@gmail.com";
// $phpmailer->Password   = "W@keelsh@j1210";
// $phpmailer->SMTPAuth = true;
// // //From email address and name
//  $phpmailer->setFrom ( "malikrehan0022@gmail.com","Malik rehan");
//  //$phpmailer->FromName = "Sharjeel wakeel";
//  $phpmailer->addAddress('sharjeelwakeel837@gmail.com', 'sharjeel wakeel'); 
//  $phpmailer->addReplyTo('sharjeelwakeel837@gmail.com', 'sharjeel wakeel');

//  $phpmailer->ContentType = 'text/plain'; 
//  $phpmailer->CharSet = "utf-8";

//  $phpmailer->addCustomHeader('MIME-version', "1.0");


// $phpmailer->isHTML(true);

if(isset($_REQUEST['description'])){

$subject=($_REQUEST['subject']!='')?$_REQUEST['subject']:'PLCM';
$description=$_REQUEST['description'];
$id=$_SESSION['id'];


// $phpmailer->Subject = "PLCM";
// $phpmailer->Body = "<div style='width:100vw;height:100vh; background-color:#e9ecef!important;'><div style='background-color:#198754!important;color:white;font-weight:bold;padding:20px 20px;'>PLCM</div><div style='width:100%;height:100%; background-color:#e9ecef!important; display:flex;flex-direction:column; justify-content:center;align-items:center'> <div class='text-secondary'>zeeshan javed send you mail</div>
// <a class='btn btn-outline-success' href='http://localhost/plcm/admin/emails.php'>please review</a>
// </div></div>";
// $phpmailer->AltBody = "This is the plain text version of the email content";

if(isset($_FILES['file']['name']) && !empty($_FILES['file']['name'])){
    $file_path="files/".rand().$_FILES['file']['name'];
    move_uploaded_file($_FILES['file']['tmp_name'],"../../".$file_path);
    
// $phpmailer->addAttachment("../../".$file_path,"file_text");
}//if end
else{
    $file_path='';
}//else end

$arr=$_REQUEST['skills'];

$i=0;
$category=NULL;
while($i<count($arr)){

    $mail_id=$arr[$i++];
   $category=($mail_id==14)?1:0;

    $query="insert into emails (crt_id,m_id,subject,description,file_path,category)values(".$id.",".$mail_id.",'".$subject."','".$description."','".$file_path."',".$category.")";
    mysqli_query($conn,$query);
}

echo "success";
}

?>