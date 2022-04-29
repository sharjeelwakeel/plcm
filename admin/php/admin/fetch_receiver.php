<?php

session_start();

include_once("../../connection/connection.php");

if(isset($_REQUEST['id'])&&isset($_REQUEST['table'])){
  $s_id=$_REQUEST['id'];
  $r_id=$_SESSION['id'];
  $table=$_REQUEST['table'];

  $meta_id=null;
  if($table=="admin"){
      $meta_id="a_id";

  }
  else{
    $meta_id="m_id";

  }
  $chat=null;
  


//change unseen messsages into seen
$query="update chat set status='seen' where r_id=".$r_id. "  and s_id=".$s_id;
mysqli_query($conn,$query);


  $query="select * from ".$table." where " .$meta_id."=".$s_id;

  $fetch=mysqli_query($conn,$query);

  $fet=mysqli_fetch_assoc($fetch);

  $profile=" <img src='".$fet['img_path']."' class='rounded-circle' style='height:50px;width:50px'>

  <span class='text-muted ps-2'>".$fet['f_name']."</span>";
  
//   if($table=="members"){
      

//     $query="select s_id,r_id,img_path,msg,chat.date as date,chat.category as cat from members,chat where (s_id=".$s_id." and r_id=".$r_id." and m_id=".$s_id.") or (s_id=".$r_id." and r_id=".$s_id." and m_id=".$r_id.")";
//      echo $query;
//        exit(1);
//     $message=mysqli_query($conn,$query);
//     if(mysqli_num_rows($message)>0){
//         $i=1;
     
//         while($msg=mysqli_fetch_assoc($message)){
//         if($s_id==$msg['s_id']){
//             if($i==1){
//                 $i++;

//             $chat.= "<div class='d-flex mt-auto' ><img src='".$msg['img_path']."' class='rounded-circle' style='height:50px;width:50px'> <div class='bg rounded-pill p-2 px-4 text-dark fw-normal  d-flex flex-column ' style='font-size:16px;min-width:132px'>".$msg['msg']."<div class='text-end' style='font-size:10px!important'>".date(' H:i A',strtotime($msg['date']))."</div></div></div>";
              
//         }
//         else{
//             $chat.= "<div class='d-flex mt-2' style='min-width:40px'><img src='".$msg['img_path']."' class='rounded-circle' style='height:50px;width:50px'> <div class='bg rounded-pill p-2 px-4 text-dark fw-normal d-flex flex-column ' style='font-size:16px;min-width:132px'>".$msg['msg']."<div class='text-end' style='font-size:10px!important'>".date(' H:i A',strtotime($msg['date']))."</div></div></div>";
          
//         }
//         }//if end
//         else if($r_id==$msg['s_id']){
//             if($i==1){
//                 $i++;
//            $chat.=" <div class='d-flex  ms-auto mt-auto '> <div class='bg-success rounded-pill p-2 px-4 text-light fw-normal  d-flex flex-column' style='font-size:16px;min-width:132px'>".$msg['msg']."<div class='text-end' style='font-size:10px!important'>".date(' H:i A',strtotime($msg['date']))."</div></div><img src='".$msg['img_path']."' class='rounded-circle' style='height:50px;width:50px'></div>";
//         }
//         else{
//             $chat.=" <div class='d-flex  ms-auto mt-2 '> <div class='bg-success rounded-pill p-2 px-4 text-light fw-normal  d-flex flex-column' style='font-size:16px;min-width:132px'>".$msg['msg']."<div class='text-end' style='font-size:10px!important'>".date(' H:i A',strtotime($msg['date']))."</div></div><img src='".$msg['img_path']."' class='rounded-circle' style='height:50px;width:50px'></div>";
        
//         }

//         }//else if end

//     }//while end

//     }//if end
//   }//table if end

$table='admin';
  if($table=="admin"){
      $query="select * from admin where a_id=".$r_id;
      $admin=mysqli_query($conn,$query);
      $ad=mysqli_fetch_assoc($admin);

      $query="select * from members where m_id=".$s_id;
      $member=mysqli_query($conn,$query);
      $mbr=mysqli_fetch_assoc($member);

    $query="select s_id,r_id,msg,date ,category  from chat where (s_id=".$s_id." and r_id=".$r_id.") or (s_id=".$r_id." and r_id=".$s_id.")";
   
    $message=mysqli_query($conn,$query);
    if(mysqli_num_rows($message)>0){
        $i=1;
     
        while($msg=mysqli_fetch_assoc($message)){

        if($s_id==$msg['s_id'] && $msg['category']=='1'){

            if($i==1){
                $chat.= "<div class='d-flex ms-auto mt-auto'><img src='".$mbr['img_path']."' class='rounded-circle' style='height:50px;width:50px'> <div class='bg-success rounded-pill p-2 px-4 text-light fw-normal fs-5 d-flex flex-column  ' style='font-size:16px!important;min-width:132px'>".$msg['msg']."<div class='text-end 'style='font-size:10px'>".date(' H:i A',strtotime($msg['date']))."</div></div></div>";
           $i++;
            }
            else{
            $chat.= "<div class='d-flex  ms-auto mt-1' ><img src='".$mbr['img_path']."' class='rounded-circle' style='height:50px;width:50px' > <div class='bg-success rounded-pill p-2 px-4 text-light fw-normal fs-5 d-flex flex-column  'style='font-size:16px!important;min-width:132px'>".$msg['msg']."<div class='text-end ' style='font-size:10px'>".date(' H:i A',strtotime($msg['date']))."</div></div></div>";
        }  
        }
        else if($r_id==$msg['s_id']  && $msg['category']=='0'){
            if($i==1){
           $chat.=" <div class='d-flex   mt-auto' ><img src='".$ad['img_path']."' class='rounded-circle' style='height:50px;width:50px'> <div class='bg rounded-pill p-2 px-4 text-dark fw-normal fs-5 d-flex flex-column'  style='font-size:16px!important;min-width:132px' >".$msg['msg']."<div class='text-end'style='font-size:10px'>".date(' H:i A',strtotime($msg['date']))."</div></div></div>";
       $i++;
          }
        else{
            $chat.=" <div class='d-flex  mt-1'><img src='".$ad['img_path']."' class='rounded-circle' style='height:50px;width:50px'> <div class='bg rounded-pill p-2 px-4 text-dark fw-normal fs-5 d-flex flex-column'  style='font-size:16px!important;min-width:132px' >".$msg['msg']."<div class='text-end'style='font-size:10px'>".date(' H:i A',strtotime($msg['date']))."</div></div></div>";
        

        }


        }//else if end

    }//while end

    }//if end

  }

echo json_encode(array("profile"=>$profile,"chat"=>$chat));




} //isset if end



?>