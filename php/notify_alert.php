<?php

session_start();

include_once("../connection/connection.php");

$modal_date=$date=$_SESSION['date'];
$id=$_SESSION['id'];
$query="select link_page,n_id,c_id, p_title,notifications.p_id,notifications.date,status,f_name,l_name,name,notifications.description,notifications.u_category as u_category from notifications,projects,members where ((notifications.p_id=projects.p_id and u_category='admin' and members.m_id=".$id. " and u_id=".$id.") or (notifications.p_id=projects.p_id and u_category='member' and members.m_id=".$id." and u_id=".$id.")) and (notifications.date>'".$date ."' and status='unseen') order by n_id desc";
//echo $query;
$res=mysqli_query($conn,$query);
$model=null;
if(mysqli_num_rows($res)>0){
$date=mysqli_fetch_assoc($res);
if($date['u_category']=='admin'){
  $name='Zeeshan javed';
}
else{
  $query="select * from members where m_id=".$date['c_id'];
  $fetch_member=mysqli_query($conn,$query);
  $ft=mysqli_fetch_assoc($fetch_member);
  $name=$ft['f_name']." ".$ft['l_name'];

}



$model.="
<div id='liveToast'   role='alert' aria-live='assertive' aria-atomic='true'>
<div class='toast-header'>
 
  <strong class='me-auto'>PLCM</strong>
  <small>now</small>
  <button type='button' class='btn-close notify_close' data-bs-dismiss='toast' aria-label='Close'></button>
</div>
<div class='toast-body bg-light'>
<a href='".$date['link_page']."?id=".$date['p_id']."&&n_id=".$date['n_id']."' class='text-decoration-none d-block'>
<span class='text-success fw-bold'>".$name." </span><span class='text-secondary'>".$date['name']." ".$date['description'] ." ".$date['p_title']."</span>
</a>
</div>
</div>";


$query="select link_page,n_id,c_id, p_title,notifications.p_id,notifications.date,status,f_name,l_name,name,notifications.description,notifications.u_category as u_category from notifications,projects,members where ((notifications.p_id=projects.p_id and u_category='admin' and members.m_id=".$id. " and u_id=".$id.") or (notifications.p_id=projects.p_id and u_category='member' and members.m_id=".$id." and u_id=".$id.")) and (notifications.date>'".$modal_date ."' and status='unseen') order by n_id desc";

$_SESSION['date']=$date['date'];
$result=mysqli_query($conn,$query);
$array=null;
while($row=mysqli_fetch_assoc($result)){
    $date   = date('d/m H:i A',strtotime($row['date']));
    if($row['u_category']=='admin'){
      $name='Zeeshan javed';
    }
    else{
      $query="select * from members where m_id=".$row['c_id'];
      $fetch_member=mysqli_query($conn,$query);
      $ft=mysqli_fetch_assoc($fetch_member);
      $name=$ft['f_name']." ".$ft['l_name'];
    
    }
    $class=($row['status']=='unseen')?'fw-bold':'';
$array.= "<a href='".$row['link_page']."?id=".$row['p_id']."&&n_id=".$row['n_id']."' class='text-decoration-none'>
<div class='bg-light d-flex flex-column  py-3 rounded-3 mt-2'>
<div class='msg px-2'>
<span class='text-success fw-bold' >". $name." </span><span class='text-dark ".  $class."'>". $row['name']." ".$row['description']  ." ".$row['p_title']. "</span>

</div>
<small class='date text-end d-block me-4 text-muted ' >"
 .$date.
"
</small>
</a>
";


}
//echo $array;
echo json_encode(array("data"=>$array,"model"=>$model,"status"=>1));
}
else{
    echo json_encode(array("data"=>"np data","model"=>"no model","status"=>0));
}



?>