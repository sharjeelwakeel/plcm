<?php

session_start();

include_once("../../connection/connection.php");

$date= $_SESSION['mail_date'];
$id=$_SESSION['id'];
$query="select * from emails where m_id=".$id." and status='unseen' and date>'".$date."' order by e_id desc limit 1";
//echo $query;
$res=mysqli_query($conn,$query);
$model=null;
$dd=null;

if(mysqli_num_rows($res)>0){
$date=mysqli_fetch_assoc($res);
$dd=$date['date'];
if($date['category']==0){
    $name="Zeeshan Javed";

}
else{
    $s_id=$date['crt_id'];
    $query="select * from members where  m_id= ".$s_id;
    $chat=mysqli_query($conn,$query);
    $ch=mysqli_fetch_assoc($chat);

    $name=$ch['f_name']." ".$ch['l_name'];

}
$model.="
<div id='liveToast'   role='alert' aria-live='assertive' aria-atomic='true'>
<div class='toast-header'>
 
  <strong class='me-auto'>PLCM</strong>
  <small>now</small>
  <button type='button' class='btn-close notify_close' data-bs-dismiss='toast' aria-label='Close'></button>
</div>
<div class='toast-body bg-light'>
<a href='inbox_mail.php' class='text-decoration-none d-block'>
<span class='text-success fw-bold'>".$name." </span><span class='text-secondary'> send you a mail</span>
</a>
</div>
</div>";
$_SESSION['mail_date']=$dd;


//echo $array;
echo json_encode(array("model"=>$model,"status"=>1));
}
else{
    echo json_encode(array("model"=>"no model","status"=>0));
}




?>