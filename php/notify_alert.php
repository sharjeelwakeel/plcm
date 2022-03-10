<?php

session_start();

include_once("../connection/connection.php");

$date=$_SESSION['date'];
$id=$_SESSION['id'];
$query="select p_title,notifications.p_id,notifications.date,status,f_name,l_name,name,notifications.description,notifications.u_category from notifications,projects,members where ((notifications.p_id=projects.p_id and u_category='admin' and members.m_id=".$id. " and u_id=".$id.") or (notifications.p_id=projects.p_id and u_category='member' and members.m_id=".$id." and u_id=".$id.")) and (notifications.date>'".$date ."' and status='unseen') order by n_id desc";
//echo $query;
$res=mysqli_query($conn,$query);
$model=null;
if(mysqli_num_rows($res)>0){
$date=mysqli_fetch_assoc($res);
$name=($date['u_category']=='admin')? $date['u_category']:$date['f_name'];
$model.="
<div id='liveToast'   role='alert' aria-live='assertive' aria-atomic='true'>
<div class='toast-header'>
 
  <strong class='me-auto'>PLCM</strong>
  <small>now</small>
  <button type='button' class='btn-close notify_close' data-bs-dismiss='toast' aria-label='Close'></button>
</div>
<div class='toast-body bg-light'>
<a href='detail_project.php?id=".$date['p_id']."' class='text-decoration-none d-block'>
<span class='text-success fw-bold'>".$name." </span><span class='text-secondary'>".$date['description']." ".$date['name']." ".$date['p_title']."</span>
</a>
</div>
</div>";
$_SESSION['date']=$date['date'];
$result=mysqli_query($conn,$query);
$array=null;
while($row=mysqli_fetch_assoc($result)){
    $date   = date('d/m H:i A',strtotime($row['date']));
    $name=($row['u_category']=='admin')? $row['description']:$row['f_name'];
    $class=($row['status']=='unseen')?'fw-bold':'';
$array.= "<a href='detail_project.php?id=".$row['p_id']."' class='text-decoration-none'>
<div class='bg-light d-flex flex-column  py-3 rounded-3 mt-2'>
<div class='msg px-2'>
<span class='text-success fw-bold' >". $name." </span><span class='text-dark ".  $class."'>".$row['description']." ". $row['name'] ." ".$row['p_title']. "</span>

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