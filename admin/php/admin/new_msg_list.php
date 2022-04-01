
<?php

session_start();

include_once("../../connection/connection.php");

$s_id=$_SESSION['id'];

$s_id_array=array();
$user=null;
$adm=2;
$index=-1;
$query="select s_id,max(date),category from chat where r_id=".$s_id." and status='unseen' group by s_id order by msg_id desc";
// echo $query;
$priority=mysqli_query($conn,$query);

if(mysqli_num_rows($priority)>0){
  while($pr=mysqli_fetch_assoc($priority)){
    $id=$pr['s_id'];

    if($pr['category']==0){
      $adm++;
      $query="select * from admin where a_id=".$id;
      $admin=mysqli_query($conn,$query);
      $ad=mysqli_fetch_assoc($admin);
      $user.="<tr data-id=" .$ad['a_id']." data-category='1' class='bg-success profile' data-table='admin' style='cursor:pointer'>
      <td class='position-relative border-light'><img src='".$ad['img_path']."' class='rounded-circle' style='height:50px;width:50px'><span class='text-light fw-bold ps-2 text-capitalize'>". $ad['f_name']."</span>
     
<span class='position-absolute alert_on_chat translate-middle p-1 bg border border-light rounded-circle'>
<span class='visually-hidden'>New alerts</span>
</span>
     </td>
  
  </tr>";



    }//if end
    else{
      $s_id_array[++$index]=$id;
      $query="select * from members where m_id=".$id;
      $members=mysqli_query($conn,$query);
      $mbr=mysqli_fetch_assoc($members);
      $user.=" <tr data-id=". $mbr['m_id']." data-category='1' class='bg-success profile' data-table='members' style='cursor:pointer'> 
      <td class='position-relative border-light'><img src='".$mbr['img_path']."' class='rounded-circle' style='height:50px;width:50px'><span class='text-light fw-bold ps-2 text-capitalize'>". $mbr['f_name']." ".$mbr['l_name']."</span>
     
<span class='position-absolute alert_on_chat translate-middle p-1 bg border border-light rounded-circle'>
<span class='visually-hidden'>New alerts</span>
</span>
     </td>
  
  </tr>";

    }//else end


  }//while end


  if($adm==1){
 
    $query="select * from admin where a_id=14";
    $admin=mysqli_query($conn,$query);
    $ad=mysqli_fetch_assoc($admin);
    $user.="<tr data-id=" .$ad['a_id']." data-category='1' class='bg-success profile' data-table='admin' style='cursor:pointer'>
    <td class='position-relative border-light'><img src='".$ad['img_path']."' class='rounded-circle' style='height:50px;width:50px'><span class='text-light fw-bold ps-2 text-capitalize'>". $ad['f_name']."</span>
   

   </td>

</tr>";

  }// if end adm
  if($index==-1){
    $query="select * from members where m_id!=".$s_id;
  
    
  }
  else{

    $query="select * from members where m_id not in(" . implode(',', $s_id_array) .") and m_id!=".$s_id;
   
  }
//   echo $query;
//   exit(1);
  $member=mysqli_query($conn,$query);
  if(mysqli_num_rows($member)>0){
  while($mbr=mysqli_fetch_assoc($member)){
    $user.=" <tr data-id=". $mbr['m_id']." data-category='1' class='bg-success profile' data-table='members' style='cursor:pointer'> 
    <td class='position-relative border-light'><img src='".$mbr['img_path']."' class='rounded-circle' style='height:50px;width:50px'><span class='text-light fw-bold ps-2 text-capitalize'>". $mbr['f_name']." ".$mbr['l_name']."</span>
   
   </td>

</tr>";

  }//while end

}//if end

echo $user;
exit(1);

}//if end
else{



//   $query="select * from admin";
// $admin=mysqli_query($conn,$query);
// $ad=mysqli_fetch_assoc($admin);
//     $user.="<tr data-id=" .$ad['a_id']." data-category='1' class='bg-success profile' data-table='admin' style='cursor:pointer'>
//     <td class='position-relative border-light'><img src='admin/".$ad['img_path']."' class='rounded-circle' style='height:50px;width:50px'><span class='text-light fw-bold ps-2 text-capitalize'>". $ad['f_name']."</span>
   

//    </td>

// </tr>";

$query="select * from members where m_id!=".$s_id;

// echo $id;
// $query="select * from members ";
$members=mysqli_query($conn,$query);
// echo mysqli_num_rows($members);

if(mysqli_num_rows($members)>0){
  while($mbr=mysqli_fetch_assoc($members)){
    $user.=" <tr data-id=". $mbr['m_id']." data-category='1' class='bg-success profile' data-table='members' style='cursor:pointer'> 
    <td class='position-relative border-light'><img src='".$mbr['img_path']."' class='rounded-circle' style='height:50px;width:50px'><span class='text-light fw-bold ps-2 text-capitalize'>". $mbr['f_name']." ".$mbr['l_name']."</span>
   
   </td>

</tr>";

  }//while end

}//if end



echo $user;

}

?>
