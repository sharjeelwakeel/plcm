<?php

include("session/check_session.php");
include_once("connection/connection.php");



$s_id=$_SESSION['id'];

$s_id_array=array();
$user=null;
$adm=1;
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
      $user.="<tr data-id='" .$ad['a_id']."' data-category='1' class='bg-success profile' data-table='admin' style='cursor:pointer'>
      <td class='position-relative border-light'><img src='admin/".$ad['img_path']."' class='rounded-circle' style='height:50px;width:50px'><span class='text-light fw-bold ps-2 text-capitalize'>". $ad['f_name']."</span>
     
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
      $user.=" <tr data-id='". $mbr['m_id']."' data-category='1' class='bg-success profile' data-table='members' style='cursor:pointer'> 
      <td class='position-relative border-light'><img src='admin/".$mbr['img_path']."' class='rounded-circle' style='height:50px;width:50px'><span class='text-light fw-bold ps-2 text-capitalize'>". $mbr['f_name']." ".$mbr['l_name']."</span>
     
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
    $user.="<tr data-id='" .$ad['a_id']."' data-category='1' class='bg-success profile' data-table='admin' style='cursor:pointer'>
    <td class='position-relative border-light'><img src='admin/".$ad['img_path']."' class='rounded-circle' style='height:50px;width:50px'><span class='text-light fw-bold ps-2 text-capitalize'>". $ad['f_name']."</span>
   

   </td>

</tr>";

  }// if end adm
if($index==-1){
  $query="select * from members where m_id!=".$s_id;
 
  
}
else{
  $query="select * from members where m_id not in(" . implode(',', $s_id_array) .") and m_id!=".$s_id;

}
  // echo $query;
  // exit(1);
  $member=mysqli_query($conn,$query);
  if(mysqli_num_rows($member)>0){
  while($mbr=mysqli_fetch_assoc($member)){
    $user.=" <tr data-id='". $mbr['m_id']."' data-category='1' class='bg-success profile' data-table='members' style='cursor:pointer'> 
    <td class='position-relative border-light'><img src='admin/".$mbr['img_path']."' class='rounded-circle' style='height:50px;width:50px'><span class='text-light fw-bold ps-2 text-capitalize'>". $mbr['f_name']." ".$mbr['l_name']."</span>
   
   </td>

</tr>";

  }//while end

}//if end


}//if end
else{



  $query="select * from admin";
$admin=mysqli_query($conn,$query);
$ad=mysqli_fetch_assoc($admin);
    $user.="<tr data-id='" .$ad['a_id']."' data-category='1' class='bg-success profile' data-table='admin' style='cursor:pointer'>
    <td class='position-relative border-light'><img src='admin/".$ad['img_path']."' class='rounded-circle' style='height:50px;width:50px'><span class='text-light fw-bold ps-2 text-capitalize'>". $ad['f_name']."</span>
   

   </td>

</tr>";

$query="select * from members where m_id!=".$s_id;

// echo $id;
// $query="select * from members ";
$members=mysqli_query($conn,$query);
// echo mysqli_num_rows($members);

if(mysqli_num_rows($members)>0){
  while($mbr=mysqli_fetch_assoc($members)){
    $user.=" <tr data-id='". $mbr['m_id']."' data-category='1' class='bg-success profile' data-table='members' style='cursor:pointer'> 
    <td class='position-relative border-light'><img src='admin/".$mbr['img_path']."' class='rounded-circle' style='height:50px;width:50px'><span class='text-light fw-bold ps-2 text-capitalize'>". $mbr['f_name']." ".$mbr['l_name']."</span>
   
   </td>

</tr>";

  }//while end

}//if end


}


$id=$_SESSION['id']; 
 
include("php/chat_notify_query.php");






?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>PLCM</title>
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css"/>
    <link rel='stylesheet' href='css/style.css'>
    <link rel='stylesheet' href='css/style2.css'>
  

  
  </head>
  <body>

  <div class='container-fluid p-0 responsive wrapper-message' >

  <!---------------------------navbar----------------------->
  <nav class="navbar navbar-expand-md navbar-light bg-light">
  <div class="container">
 
  <a class="navbar-brand" href="home.php">PLCM</a>
 
 
  <button class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>


    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
    
        
        <li class="nav-item dropdown d-block d-md-none ">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Project Modules
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
          <!-- <li><a class="dropdown-item text-light fw-bold  " href="home.php">Assign projects</a></li>
            <li><hr class="dropdown-divider text-light"></li>
            <li><a class="dropdown-item text-light fw-bold active" href="history.php">History</a></li>
            <li><hr class="dropdown-divider text-light"></li> -->

            
            <li><a class="dropdown-item text-light fw-bold active" href="detail_project.php?id=<?php echo $res['p_id']?>">Review Proposal</a></li>  
            <li><hr class="dropdown-divider text-light"></li>
            <li><a class="dropdown-item " href="road_map.php?id=<?php echo $res['p_id']?>">Road Map</a></li>         
              <li><hr class="dropdown-divider text-light"></li>
              <li><a class="dropdown-item " href="work_packages.php?id=<?php echo $res['p_id']?>">Work Package</a></li>         
              <li><hr class="dropdown-divider text-light"></li>
              <li><a class="dropdown-item " href="assign_me.php?id=<?php echo $res['p_id']?>">Assigned to me</a></li>         
              <li><hr class="dropdown-divider text-light"></li>
              <li><a class="dropdown-item " href="created_me.php?id=<?php echo $res['p_id']?>">Created by me</a></li>         
              <li><hr class="dropdown-divider text-light"></li>
              <li><a class="dropdown-item " href="add_schedule.php?id=<?php echo $res['p_id']?>">Add Schedule</a></li>         
              <li><hr class="dropdown-divider text-light"></li>
        


          </ul>
        </li>
     
       </ul> 
      <!-- <form class="d-flex me-2">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form> -->
      <div class=' d-flex align-items-center justify-md-content-start justify-content-around'>
    
<div class='position-relative mail me-2  d-inline-block d-md-block mt-md-0 mt-2 '>
        <a href='inbox_mail.php'>
      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill=" #198754" class="bi bi-envelope" viewBox="0 0 16 16">
  <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
</svg>
</a>
<span class="position-absolute top-0 start-100 translate-middle p-1 bg-success border border-light rounded-circle dot_mail_notify <?php echo(mysqli_num_rows($get_mails)>0)?"d-block":"d-none"; ?>">
    <span class="visually-hidden">New alerts</span>
  </span>
      </div><!--email-->
      <div class='position-relative chat ms-2  d-inline-block d-md-block mt-md-0 mt-2 '>
        <a href='chat.php'>
<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
width="20" height="20"
viewBox="0 0 172 172"
style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#198754"><path d="M86,14.00188c-43.45687,0 -78.87812,30.44937 -78.87812,68.55812c0,22.11813 12.12062,41.37406 30.73156,53.965c-0.02687,0.73906 0.02688,1.935 -0.94062,5.53625c-1.20938,4.44781 -3.64156,10.72313 -8.57313,17.79125l-3.50719,5.02563h6.1275c21.23125,0 33.51313,-13.84063 35.42125,-16.05781c6.31563,1.47812 12.81938,2.29781 19.61875,2.29781c43.45688,0 78.87813,-30.44938 78.87813,-68.55813c0,-38.10875 -35.42125,-68.55812 -78.87813,-68.55812zM86,20.39813c40.48719,0 72.48188,28.03062 72.48188,62.16187c0,34.13125 -31.99469,62.16188 -72.48188,62.16188c-7.01437,0 -13.62562,-0.67188 -19.83375,-2.29781l-1.98875,-0.52406l-1.30344,1.59906c0,0 -9.93031,11.20687 -25.78656,13.90781c2.87563,-5.18688 4.99875,-10.02438 5.97969,-13.67938c1.38406,-5.09281 1.41094,-8.53281 1.41094,-8.53281v-1.76031l-1.47813,-0.94063c-18.1675,-11.55625 -29.48187,-29.44156 -29.48187,-49.93375c0,-34.13125 31.99469,-62.16187 72.48187,-62.16187zM51.6,75.68c-3.80281,0 -6.88,3.07719 -6.88,6.88c0,3.80281 3.07719,6.88 6.88,6.88c3.80281,0 6.88,-3.07719 6.88,-6.88c0,-3.80281 -3.07719,-6.88 -6.88,-6.88zM86,75.68c-3.80281,0 -6.88,3.07719 -6.88,6.88c0,3.80281 3.07719,6.88 6.88,6.88c3.80281,0 6.88,-3.07719 6.88,-6.88c0,-3.80281 -3.07719,-6.88 -6.88,-6.88zM120.4,75.68c-3.80281,0 -6.88,3.07719 -6.88,6.88c0,3.80281 3.07719,6.88 6.88,6.88c3.80281,0 6.88,-3.07719 6.88,-6.88c0,-3.80281 -3.07719,-6.88 -6.88,-6.88z"></path></g></g></svg>

      </a>
<span class="position-absolute top-0 start-100 translate-middle p-1 bg-success border border-light rounded-circle dot_chat_notify <?php echo(mysqli_num_rows($chat)>0)?"d-block":"d-none"; ?>">
    <span class="visually-hidden">New alerts</span>
  </span>


</div><!--chat-->




<div class=" position-relative ms-2   mt-md-0 mt-2 ">
<svg xmlns="http://www.w3.org/2000/svg"  x="0px" y="0px" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"
width="20" height="20"
viewBox="0 0 172 172"
style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#198754"><path d="M86,3.44c-4.3,0 -7.96282,1.73636 -10.31328,4.38063c-2.35046,2.64427 -3.44672,6.03493 -3.44672,9.37938c0,1.70861 0.29357,3.42545 0.88687,5.0525c-19.10984,4.97581 -31.84687,20.93309 -31.84687,43.1075c0,25.51637 -4.99542,37.18202 -9.66156,43.59797c-2.33307,3.20797 -4.62259,5.14277 -6.665,7.05469c-1.0212,0.95596 -2.01009,1.90954 -2.84875,3.16453c-0.83866,1.25499 -1.46469,2.91415 -1.46469,4.66281c0,4.73 2.87975,8.70577 6.85312,11.35469c3.97338,2.64892 9.14905,4.42201 15.19109,5.76469c6.78742,1.50832 14.74178,2.38843 23.13265,2.90922c-0.27478,1.28154 -0.45687,2.6266 -0.45687,4.0514c0,11.43391 9.20609,20.64 20.64,20.64c11.43391,0 20.64,-9.20609 20.64,-20.64c0,-1.4248 -0.18209,-2.76986 -0.45687,-4.0514c8.39087,-0.52079 16.34523,-1.4009 23.13265,-2.90922c6.04204,-1.34267 11.21772,-3.11577 15.19109,-5.76469c3.97338,-2.64892 6.85313,-6.62469 6.85313,-11.35469c0,-1.74867 -0.62603,-3.40782 -1.46469,-4.66281c-0.83866,-1.25499 -1.82755,-2.20857 -2.84875,-3.16453c-2.04241,-1.91192 -4.33193,-3.84671 -6.665,-7.05469c-4.66614,-6.41594 -9.66156,-18.0816 -9.66156,-43.59797c0,-22.0469 -12.60401,-38.26139 -31.8536,-43.08734c0.5982,-1.63287 0.8936,-3.35713 0.8936,-5.07266c0,-3.34444 -1.09626,-6.73511 -3.44672,-9.37937c-2.35046,-2.64427 -6.01328,-4.38062 -10.31328,-4.38062zM86,10.32c2.58,0 4.07718,0.84364 5.16672,2.06937c1.08954,1.22573 1.71328,2.99507 1.71328,4.81063c0,1.81556 -0.62374,3.58489 -1.71328,4.81063c-1.08954,1.22573 -2.58672,2.06937 -5.16672,2.06937c-2.58,0 -4.07718,-0.84364 -5.16672,-2.06937c-1.08954,-1.22573 -1.71328,-2.99507 -1.71328,-4.81063c0,-1.81556 0.62374,-3.58489 1.71328,-4.81062c1.08954,-1.22573 2.58672,-2.06937 5.16672,-2.06937zM77.60156,28.31281c2.23525,1.64123 5.13149,2.64719 8.39844,2.64719c3.24018,0 6.11698,-0.9895 8.34469,-2.60688c18.28768,3.18011 29.49531,16.35049 29.49531,37.00688c0,26.42763 5.32458,39.87532 10.97844,47.64937c2.82693,3.88703 5.69741,6.31808 7.525,8.02891c0.9138,0.85541 1.53741,1.52777 1.8275,1.96187c0.2901,0.4341 0.30906,0.52451 0.30906,0.83985c0,2.15 -0.99025,3.76423 -3.78937,5.63031c-2.79912,1.86608 -7.29845,3.53299 -12.86641,4.77031c-11.13592,2.47465 -26.47163,3.35937 -41.82422,3.35937c-15.35259,0 -30.6883,-0.88473 -41.82422,-3.35937c-5.56796,-1.23733 -10.06729,-2.90423 -12.86641,-4.77031c-2.79912,-1.86608 -3.78937,-3.48031 -3.78937,-5.63031c0,-0.31534 0.01895,-0.40574 0.30906,-0.83985c0.29009,-0.4341 0.9137,-1.10646 1.8275,-1.96187c1.82759,-1.71083 4.69807,-4.14188 7.525,-8.02891c5.65386,-7.77405 10.97844,-21.22175 10.97844,-47.64937c0,-20.73869 11.30135,-33.63046 29.44156,-37.04719zM72.8514,144.2314c4.33992,0.15687 8.73071,0.2486 13.1486,0.2486c4.41789,0 8.80868,-0.09172 13.1486,-0.2486c0.35515,1.13471 0.6114,2.33125 0.6114,3.6886c0,7.83009 -5.92991,13.76 -13.76,13.76c-7.83009,0 -13.76,-5.92991 -13.76,-13.76c0,-1.35734 0.25625,-2.55389 0.6114,-3.6886z"></path></g></g>
</svg>
 
  <span class="position-absolute top-0  start-100 translate-middle p-1 bg-success border border-light rounded-circle dot_notify <?php echo(mysqli_num_rows($check)>0)?"d-block":"d-none"; ?>">
    <span class="visually-hidden">New alerts</span>
  </span>

  
</div>  <!--notify-alert-->

  

      <ul class='navbar-nav me-5 ms-1 mt-md-0 mt-2  '>
      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle link_logout" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            

          <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
width="20" height="20"
viewBox="0 0 172 172"
style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#198754"><path d="M117.45579,164.64957h-113.04553c-2.43556,0 -4.41026,-1.97469 -4.41026,-4.41026v-148.47863c0,-2.43556 1.97469,-4.41026 4.41026,-4.41026h113.04553c2.43556,0 4.41026,1.97469 4.41026,4.41026v32.6381c0,2.43556 -1.97469,4.41026 -4.41026,4.41026c-2.43593,0 -4.41026,-1.97469 -4.41026,-4.41026v-28.22785h-104.22502v139.65812h104.22502v-28.22785c0,-2.43556 1.97432,-4.41026 4.41026,-4.41026c2.43556,0 4.41026,1.97469 4.41026,4.41026v32.6381c0,2.43556 -1.97469,4.41026 -4.41026,4.41026z"></path><path d="M172,86.0305l-35.72528,-35.52903v17.93578h-63.21551v35.12549h63.21551v17.93578z"></path></g></g></svg>

          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
  
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="php/logout.php">Logout</a></li>
            <li><hr class="dropdown-divider"></li>
          </ul>
        </li>
</ul>
</div>
     

    </div><!--container-->
  </div><!--collapse-->


 

</nav>
                 <!---------------------navbar-------------------->

    
                 
                <!----notification start---->
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel" >
  <div class="offcanvas-header bg-success">
    <h5 id="offcanvasRightLabel " class=' text-light'>Notifications</h5>
    <button type="button" class="btn-close notitify text-reset" data-bs-dismiss="offcanvas" aria-label="Close">
    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" class='mb-3'
width="15" height="15"
viewBox="0 0 172 172"
style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M18.87987,153.12013c2.23887,2.23819 5.86807,2.23819 8.10693,0l59.0132,-59.0132l59.0132,59.0132c2.24964,2.17277 5.82555,2.1417 8.03709,-0.06984c2.21154,-2.21154 2.24261,-5.78745 0.06984,-8.03709l-59.0132,-59.0132l59.0132,-59.0132c1.49042,-1.43949 2.08815,-3.57117 1.56346,-5.57571c-0.52469,-2.00454 -2.09015,-3.57 -4.09469,-4.09469c-2.00454,-0.52469 -4.13622,0.07305 -5.57571,1.56346l-59.0132,59.0132l-59.0132,-59.0132c-2.24964,-2.17277 -5.82555,-2.1417 -8.03709,0.06984c-2.21154,2.21154 -2.24261,5.78745 -0.06984,8.03709l59.0132,59.0132l-59.0132,59.0132c-2.23819,2.23887 -2.23819,5.86807 0,8.10693z"></path></g></g></svg>

    </button>
  </div>
  <div class="offcanvas-body " >
    
  <?php if(mysqli_num_rows($result)>0){
    while($row=mysqli_fetch_assoc($result))
    { ?>
      <a href="<?php echo $row['link_page'];?>?id=<?php echo $row['p_id']; ?>&&n_id=<?php echo $row['n_id']; ?>" class="text-decoration-none">
      <div class='bg-light d-flex flex-column  py-3 rounded-3 mt-2'>
    <div class='msg px-2'>
  <span class='text-success fw-bold' ><?php  if($row['u_category']=='admin'){
  $name='Zeeshan javed';
}
else{
  $query="select * from members where m_id=".$row['c_id'];
  $fetch_member=mysqli_query($conn,$query);
  $ft=mysqli_fetch_assoc($fetch_member);
  $name=$ft['f_name']." ".$ft['l_name'];

} echo $name; ?> </span><span class="text-dark <?php echo ($row['status']=="unseen")?'fw-bold':'';?>"> <?php echo $row['description']." ".$row['name']." ".$row['p_title'] ?> </span>

</div><!--msg-->
<small class='date text-end d-block me-4 text-muted ' >
    <?php // echo $row['date'] ;

$date   = date('d/m H:i A',strtotime($row['date']));

    echo $date;
    ?>
    
    </small>
</a>
   </div><!--flex-column end-->
      
  <?php  }
  } else{?>
       <div class='text-muted text-center'>no notification</div>
  <?php } ?>
  
   
  </div>
</div>
              <!-------notification end----------->




                 <!--------------------content start--------------------->
<section class=' bg message-sec ' style="height:90vh">
  <div class='row m-0 align-items-stretch justify-content-start ' style="height:90vh;">

  <div class='col-3    bg-success rounded  ' style="height:89.5vh;overflow-y:hidden">

  
  

  
  <div class="table-responsive mt-2 pb-5 mt-5" style="height:84.5vh;overflow-y:scroll">
<table id="userTable" class=' table table-hover ' style="border-collapse: separate;">
        <thead>
            <th class='invisible border-0' >name</th>
                   </thead>
        <tbody id="list_profile">

   
       <?php echo $user;?>

         

           
         
             
        </tbody>
    </table>
    

                </div><!--table_responsive-->
</div><!--col-md-4-->

<div class='col-9 bg-body d-flex flex-column p-0' style="height:90vh">
    <div class='bg px-2 py-4 user_profile' style="height:15%">
  
</div>

        <div class='col-12 text-muted h3 fw-bold  d-flex flex-column  align-items-start ' id='message_show' style="height:70%; overflow-y:scroll" >
                <!-- <div class='d-flex  ms-auto mt-auto'> <div class='bg-success rounded-pill p-2 px-4 text-light fw-normal fs-5'>hello how are you</div><img src='admin/images/1052915969WhatsApp Image 2021-11-21 at 5.11.16 AM.jpeg' class='rounded-circle' style="height:50px;width:50px"></div>
               <div class='d-flex'><img src='admin/images/144877969798341558_279333590123740_5835491160776245248_n.jpg' class='rounded-circle' style="height:50px;width:50px"> <div class='bg rounded-pill p-2 px-4 text-dark fw-normal fs-5  '>hi my name is sharjeel</div></div>
                -->
         
          
            
                
          
          </div>
         
       
 
<div  style="height:15%" >
    <form class='d-flex align-items-center h-100 bg send_message_form' >
        <textarea class='form-control flex-grow-1 rounded-pill me-2 py-3 input_message' placeholder='type a message' style='resize:none;height:75%' id='send_message'></textarea>
        <!-- <input type='text' class='form-control flex-grow-1 rounded-pill me-2 py-3 input_message' placeholder='type a message' style="resize:none;height:75%" id="send_message"> -->
        <button type='button' class='btn btn-outline-success rounded-pill me-4 btn-lg disabled send_message_button' ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cursor-fill" viewBox="0 0 16 16">
  <path d="M14.082 2.182a.5.5 0 0 1 .103.557L8.528 15.467a.5.5 0 0 1-.917-.007L5.57 10.694.803 8.652a.5.5 0 0 1-.006-.916l12.728-5.657a.5.5 0 0 1 .556.103z"/>
</svg></button>

</form>

</div>



</div><!--col-md-9-->

                           <!-------------------------ALERT START----------------->

                           <?php 
                           if(isset($status)){
                           if($status=='success'){
    ?>

                           <div class="alert alert-success " role="alert">
  <div class='text-center'>
    Project  Successfully Assigned   </div>
</div>

<?php }
} ?>

                            <!------------------------ALERT END-------------------->


</div><!--row-->

</section>


                 <!------------------content end------------------->


</div><!--container-fluid-->

  <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src='js/just-validate.js'></script>
    <script src='js/chat_notify.js'></script>
    <script>
    $('#userTable').DataTable({
      "bSort" : false
    });







var element = document.getElementById("message_show");
// var msg = document.getElementsByClassName("input_message")[0];
var msg = document.getElementById("send_message");
//console.log(msg);


var filter=document.getElementById("userTable_filter").firstElementChild.firstChild;
filter.textContent="";

element.scrollTop = element.scrollHeight;



        var vali=0;
        var fetch_id;
        var fetch_table;
        var interval;
        var interval2;
        var scrollHeight;
        var flag=true;
        // var id,category,table;
        $(document).ready(function(){



          setInterval(function () { 
            $.ajax({
  method:"POST",
  url:"php/new_msg_list.php",
 
  success:function(data){
    // alert("yes");
    $("#list_profile").html(data);
  }
  
  });
           }, 10000);

          $(document).on("click",".profile",function(){
          // alert($(this).data("table"));

            // console.log($(this).data("table"));
           

           let  table=$(this).data("table");
        let   category=$(this).data("category");
          let   id=$(this).data('id');
          fetch_id=id;
          fetch_table=table;
            // console.log("profile:"+id);

            $("#send_message").attr("data-id",id);
            $("#send_message").attr("data-category",category);
            $("#send_message").attr("data-table",table);

            
   
            fetch_chat_receiver_dp(id,table,category);

             
      interval=      setInterval(function () {
         if(flag==true){
         // console.log(" setinterval:"+id);
       //   console.log("interval_fetch_id:"+fetch_id);
              fetch_chat_receiver_dp(id,table,category);
            }
           }, 1000);
      

      
    })


        
function fetch_chat_receiver_dp(id,table,category){
  //console.log("fetch_id:"+fetch_id);

 // console.log("table:"+fetch_table);
  
  $.ajax({
  method:"POST",
  url:"php/fetch_receiver.php",
  data:{
    id:fetch_id,table:fetch_table
  },
  success:function(data){
   //  console.log(data);
    var data=JSON.parse(data);
   //  console.log(data);
    
$(".user_profile").html("");
$(".user_profile").html(data['profile']);

$("#message_show").html("");
$("#message_show").html(data['chat']);
 element.scrollTop = element.scrollHeight;
 scrollHeight=element.scrollTop;

// console.log("scrollHeight:"+scrollHeight);





if ($( ".send_message_button" ).hasClass('disabled')) {
	$( ".send_message_button" ).removeClass( 'disabled');
} 


  },
})

}
        

          
      
        
          
        $(document).on("click",".send_message_button",function(){
          send_message();
        
      
})


function send_message(){
  
  let table=$("#send_message").data("table");
         let  category=$("#send_message").data("category");
          let  id=$("#send_message").data('id');
            let msg=$(".input_message").val();
           

            $(".input_message").val("");

            msg.scrollTop = 0;
            msg.scrollHeight=0;
            //console.log("msg.scrollTop="+msg.scrollTop);
            //console.log("msg.scollHeight="+msg.scrollHeight);

           
           // console.log("message_check"+msg.length);

      if(msg.length!=''){
       // var s_id=$("#send_message").data('id');

      

        console.log("send_message:"+id);
       var attr= $("#send_message").data("id");
        console.log("attr send message value:"+attr);
        msg.length=0;

      
$.ajax({
  method:"POST",
  url:"php/send_message.php",
  data:{
    id:fetch_id,category:category,msg:msg
  },
  success:function(data){
    $(".send_message_form").find("#send_message").remove();
       $( ".send_message_form" ).prepend( " <textarea class='form-control flex-grow-1 rounded-pill me-2 py-3 input_message' placeholder='type a message' style='resize:none;height:75%' id='send_message'></textarea>" );
       $("#send_message").attr("data-id",id);
            $("#send_message").attr("data-category",category);
            $("#send_message").attr("data-table",table);
//    console.log(data);
flag=true;




  },
})

      }

}


$(document).on("keydown","#send_message",function(e){
  console.log("alert="+e.which);
  // if(e.which==13){
    if(e.keyCode==13){

    console.log("enter");
    send_message();
  }
});


$("#message_show").scroll(function(){
 // console.log("element.scrollTop:"+scrollHeight);
  if(element.scrollTop!= scrollHeight){

//    console.log(element.scrollTop);
    // console.log("scrollHeight"+element.offsetHeight)
  //   console.log("make changing")
    // clearInterval(interval);
    // clearInterval(interval2);
    flag=false;
    
    
    
  }
  else{

    //console.log("not");
    //alert("yes");

    //embedded their
    flag=true;

    // interval2=      setInterval(function () {
    //   let  table=$("#send_message").data("table");
    //     let   category=$("#send_message").data("category");
    //       let   id=$("#send_message").data('id');
    //       fetch_id=id;
    //       fetch_table=table;
    //      console.log(" setinterval:"+id);
    //      console.log("interval_fetch_id:"+fetch_id);
    //          fetch_chat_receiver_dp(id,table,category);
    //       }, 1000);



    //embedded end

  }

});

        

          
      
        });
        </script>



      






</body>
</html>