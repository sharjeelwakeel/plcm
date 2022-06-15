<?php
//chat code start
$query="select * from chat where r_id=".$id." and status='unseen' order by msg_id desc limit 1";

$chat=mysqli_query($conn,$query);

if(mysqli_num_rows($chat)>0){
  $res=mysqli_fetch_assoc($chat);
  $_SESSION['c_chat']=$res['date'];
}
else{

  $_SESSION['c_chat']=date("Y-m-d h:i:s");
  
}

//chat code end

//code to for chat and notification end


//code notification start

$query="select link_page,n_id,c_id, p_title,notifications.p_id,notifications.date,status,name,notifications.description,notifications.u_category from notifications,projects where u_id=".$id."  and notifications.p_id=projects.p_id and notifications.u_category='admin' order by n_id desc";

// "select notifications.p_id,notifications.date,f_name,l_name,name,notifications.description,notifications.u_category from notifications,projects,members where (notifications.p_id=projects.p_id and u_category='admin' and members.m_id="$id.") or (notifications.p_id=projects.p_id and u_category='member' and members.m_id=".$id.") order by n_id desc";

//echo $query;

$notify=mysqli_query($conn,$query);
if(mysqli_num_rows($notify)>0){
$date=mysqli_fetch_assoc($notify);
$_SESSION['date']=$date['date'];



}

$notify=mysqli_query($conn,$query);

$query="select * from notifications where u_id=".$id." and status='unseen' ";


$check=mysqli_query($conn,$query);



//query for checking last unseen


//select notifications.p_id,notifications.date,status,f_name,l_name,name,notifications.description,notifications.u_category from notifications,projects,members where (notifications.p_id=projects.p_id and u_category='admin' and members.m_id=33 and u_id=33) or (notifications.p_id=projects.p_id and u_category='member' and members.m_id=33 and u_id=33) order by n_id desc limit 1 offset 0;


//notification  query end



//email query start
$query="select * from emails where m_id=".$id." and status='unseen' order by e_id desc limit 1";

$get_mails=mysqli_query($conn,$query);

if(mysqli_num_rows($get_mails)>0){
  $mail_data=mysqli_fetch_assoc($get_mails);
  //echo"if".$res['date'];

  $_SESSION['mail_date']=$mail_data['date'];
}
else{
 // echo"else".date("Y-m-d H:i:s");
  

  $_SESSION['mail_date']=date("Y-m-d h:i:s");
  
}



//email query end

?>
