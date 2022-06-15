<?php

include("session/check_session.php");
include_once("connection/connection.php");

$m_id=$_SESSION['id'];
$r_id=$_REQUEST['r_id'];

if(isset($_REQUEST['id'])){

  $id=$_REQUEST['id'];

  if(isset($_REQUEST['n_id'])){
    $n_id=$_REQUEST['n_id'];
  $query="update notifications set status='seen' where p_id=".$id." and n_id=".$n_id;

 if(mysqli_query($conn,$query)){
   
 }
}


 $query="select * from projects where p_id=".$id;
  $project=mysqli_query($conn,$query);
  $pro=mysqli_fetch_assoc($project);

  $query="select members.m_id,f_name from assign_projects,members where p_id=".$id." and members.m_id=assign_projects.m_id";
//echo $query;
  $assign=mysqli_query($conn,$query);
  

  include("converter.php"); 
  $query="select * from requirement where r_id=".$r_id;
  $requirement=mysqli_query($conn,$query);
  $req=mysqli_fetch_assoc($requirement);
//$query="select * from content where r_id=".$r_id ." order by  c_id desc";
$mod_id=$req['mod_id'];
//echo $mod_id;
$query="select * from module where mod_id=".$mod_id;
//echo $query;
$file=mysqli_query($conn,$query);
$status=false;
if(mysqli_num_rows($file)>0){
  
$content=mysqli_fetch_assoc($file);
//echo $content['m_file_path'];

if($content['m_file_path']!=''){
 // echo $content['m_file_path'];
//exit;
  $g=new DocxConversion($content['m_file_path']);
$final_content=$g-> convertToText();
 //echo $final_content."good";
 $status=true;

}

}




  


  $id=$_SESSION['id']; 
 
include("php/chat_notify_query.php");

$id=$_REQUEST['id']; 
  
  


}


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
    <link rel='stylesheet' href='css/style.css'>
    <link rel='stylesheet' href='css/style2.css'>
    <!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css"> -->
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css"/>
    
  <!-- <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script> -->

  <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
      tinymce.init({
        selector: '.des',
        height : "540",
        
      });
    </script>
  
  </head>
  <body>

  <div class='container-fluid p-0 responsive'>
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

            
            <li><a class="dropdown-item  " href="detail_project.php?id=<?php echo $id;?>">Review Proposal</a></li>  
            <li><hr class="dropdown-divider text-light"></li>
            <li><a class="dropdown-item" href="road_map.php?id=<?php echo $id;?>">Road Map</a></li>         
              <li><hr class="dropdown-divider text-light"></li>
              <li><a class="dropdown-item  text-light fw-bold " href="work_packages.php?id=<?php echo $id;?>">Work Package</a></li>         
              <li><hr class="dropdown-divider text-light"></li>
              <li><a class="dropdown-item " href="assign_me.php?id=<?php echo $id;?>">Assigned to me</a></li>         
              <li><hr class="dropdown-divider text-light"></li>
              <li><a class="dropdown-item " href="created_me.php?id=<?php echo $id;?>">Created by me</a></li>         
              <li><hr class="dropdown-divider text-light"></li>
              <li><a class="dropdown-item " href="add_schedule.php?id=<?php echo $id;?>">Add Schedule</a></li>         
              <li><hr class="dropdown-divider text-light"></li>
              <li><a class="dropdown-item text-light fw-bold " href="add_cost.php?id=<?php echo $id;?>">Add Cost</a></li>         
              <li><hr class="dropdown-divider text-light"></li>
              <li><a class="dropdown-item text-light fw-bold " href="members.php?id=<?php echo $id;?>">Members</a></li>         
              <li><hr class="dropdown-divider text-light"></li>
              <li><a class="dropdown-item text-light fw-bold " href="board.php?id=<?php echo $id;?>">Board</a></li>         
              <li><hr class="dropdown-divider text-light"></li>
              <li><a class="dropdown-item text-light fw-bold " href="backlog.php?id=<?php echo $id;?>">Backlog</a></li>         
              <li><hr class="dropdown-divider text-light"></li>
              <li><a class="dropdown-item text-light fw-bold active" href="require.php?id=<?php echo $id;?>">Require</a></li>         
              <li><hr class="dropdown-divider text-light"></li>
              <li><a class="dropdown-item text-light fw-bold " href="quality.php?id=<?php echo $id;?>">Quality</a></li>         
              <li><hr class="dropdown-divider text-light"></li>
              
              <li><a class="dropdown-item text-light fw-bold " href="change.php?id=<?php echo $id;?>">Change</a></li>         
              <li><hr class="dropdown-divider text-light"></li>
           
        


          </ul>
        </li>
     
       </ul> 
      
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
<section class=' bg h-100'>
  <div class='row m-0 align-items-stretch justify-content-start h-100 '>

  <div class='col-md-3 d-none d-md-block  bg-success rounded  '>

  <ul class='menu mt-5'>


         

            <li><a class="dropdown-item text-light fw-bold " href="detail_project.php?id=<?php echo $id;?>">Review Proposal</a></li>  
            <li><hr class="dropdown-divider text-light"></li>
            <li><a class="dropdown-item text-light fw-bold " href="road_map.php?id=<?php echo $id;?>">Road Map</a></li>         
              <li><hr class="dropdown-divider text-light"></li>
              <li><a class="dropdown-item text-light fw-bold" href="work_packages.php?id=<?php echo $id;?>">Work Package</a></li>         
              <li><hr class="dropdown-divider text-light"></li>
              <li><a class="dropdown-item text-light fw-bold" href="assign_me.php?id=<?php echo $id;?>">Assigned to me</a></li>         
              <li><hr class="dropdown-divider text-light"></li>
              <li><a class="dropdown-item text-light fw-bold" href="created_me.php?id=<?php echo $id;?>">Created by me</a></li>         
              <li><hr class="dropdown-divider text-light"></li>
              <li><a class="dropdown-item text-light fw-bold" href="add_schedule.php?id=<?php echo $id;?>">Add Schedule</a></li>         
              <li><hr class="dropdown-divider text-light"></li>
              <li><a class="dropdown-item text-light fw-bold " href="add_cost.php?id=<?php echo $id;?>">Add Cost</a></li>         
              <li><hr class="dropdown-divider text-light"></li>
              <li><a class="dropdown-item text-light fw-bold " href="members.php?id=<?php echo $id;?>">Members</a></li>         
              <li><hr class="dropdown-divider text-light"></li>
              <li><a class="dropdown-item text-light fw-bold " href="board.php?id=<?php echo $id;?>">Board</a></li>         
              <li><hr class="dropdown-divider text-light"></li>
              <li><a class="dropdown-item text-light fw-bold " href="backlog.php?id=<?php echo $id;?>">Backlog</a></li>         
              <li><hr class="dropdown-divider text-light"></li>
              <li><a class="dropdown-item text-light fw-bold active" href="require.php?id=<?php echo $id;?>">Require</a></li>         
              <li><hr class="dropdown-divider text-light"></li>
              <li><a class="dropdown-item text-light fw-bold " href="quality.php?id=<?php echo $id;?>">Quality</a></li>         
              <li><hr class="dropdown-divider text-light"></li>
              
              <li><a class="dropdown-item text-light fw-bold " href="change.php?id=<?php echo $id;?>">Change</a></li>         
              <li><hr class="dropdown-divider text-light"></li>
           
         
 

</ul>
    


</div><!--col-md-4-->

<div class='col-md-9 bg-body'>
<div class='row bg-body p-3 h-auto '>
        
         

          <div class='col-12'>
          <p class='text-end'>
            <?php   if($status==false){ ?>
  <a class="btn btn-success " data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
</svg>
  </a>
<?php } ?>
 
</p>
<div class="collapse p-0" id="collapseExample">
  <div class="card card-body ">
  <form  method="POST" class='js-form module' enctype="multipart/form-data" id="fileUploadForm">
      <div class='row justify-content-start '>
  
    
       <input type="hidden" class='form-label' name="p_id"  value="<?php echo $pro['p_id']; ?>">
       <input type="hidden" class='form-label' name="r_id"  value="<?php echo $_REQUEST['r_id']; ?>">

       <div class='col-md-12 text-center img mt-2'>
           <label class='form-label ms-auto text-muted fw-bold lab1'>Upload Word File</label><br>
               <label class='form-label lab1' for='upload'>
                   <img src='admin/web_material/upload.png'>
                </label>
                <input type='file'  class='file d-none' name='file'  id='upload'>
                <div class='error text-danger'>please uplaod image</div>

    </div>
       
       
       <div class='col-md-12 mt-4 mt-md-0 text-end'>
       
        <button name='module' class='btn btn-outline-success mt-md-4'>add</button>

       </div>


      


</div><!--row-->
</form>
</div>
</div>
         </div>



         <div class='col-12 '>
             <?php if($status==true){?>
    <form  method="POST" class='js-form-save w-100'   enctype="multipart/form-data" id="fileUploadForm3"> 
        
         <textarea id="mytextarea"  class="des"    style='resize:none;height:300px;' placeholder='write a description here!!!' name='description' data-validate-field='description' style="width:100% ;height:700px;resize:vertical"> <pre> <?php echo($content['file_status']=='true')?  $final_content: base64_decode($content['description']);?></pre></textarea>
         <input type="hidden" class='form-label' id='upd_id' name="mod_id"  value="<?php echo $mod_id; ?>">
         
         
  </form>
       

         <?php   $query="select * from permission_status where m_id=".$m_id." and p_id=19";

$configure=mysqli_query($conn,$query);
$cfg=mysqli_fetch_assoc($configure);
// echo $cfg['p_id'];
// exit;
?>
  <div class='text-end'>

         <button  class="btn btn-success btn-sm mt-2  save <?php echo($cfg['p_id']==19 && $cfg['status']=="no")?"disabled":"" ?> ">save</button>
  
         <?php   $query="select * from permission_status where m_id=".$m_id." and p_id=20";

$configure=mysqli_query($conn,$query);
$cfg=mysqli_fetch_assoc($configure);
// echo $cfg['p_id'];
// exit;
?>
    

<button  class="btn btn-success btn-sm mt-2 delete <?php echo($cfg['p_id']==20 && $cfg['status']=="no")?"disabled":"" ?> " data-id="<?php echo $mod_id; ?>">delete</button>
  
  
             </div>
  

  <?php }?>
  </div><!--col-12-->



   </div><!--bg-body-->
</div><!--col-md-9-->





<!-- Update Modal -->
<div class="modal fade" id="updatemodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">

<div class="modal-dialog bg-light">
    <div class="modal-content">
  
    <form  method="POST" class='js-form-update'   enctype="multipart/form-data" id="fileUploadForm2"> 
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Update</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-start">
      <div class='row justify-content-start '>
   

     

       <div class='col-md-6'>
        <label class='form-label text-start text-muted fw-bold fs-5'>Artifact Type</label>
        <select class="form-select  text-muted" id="select" aria-label="Default select example" name='status' data-validate-field='status'>
  <option value=''>Select</option>
  <option value="Role">Role</option>
  <option value="Scenario Act">Scenario Act</option>
  <option value="Scenario Scene">Scenario Scene</option>
  <option value="Sketch">Sketch</option>
  <option value="Software Requirement">Software Requirement</option>
  <option value="Software Requirement Module">Software Requirement Module</option>
  <option value="Stakeholder Requirement">Stakeholder Requirement</option>
  <option value="Stakeholder Requirement Module">Stakeholder Requirement Module</option>
  <option value="Standard">Standard</option>
  <option value="Supporting Resoureces">Supporting Resoureces</option>
  <option value="System Requirement">System Requirement</option>
  <option value="System Requirement Module">System Requirement Module</option>
  <option value="Term">Term</option>
  <option value="Heading">Heading</option>
  

</select>

       </div>

       <div class='col-md-6'>
        <label class='form-label text-start text-muted fs-5 fw-bold'>Description</label>
        <input class='form-control'placeholder='Name' name='desc' data-validate-field='subject'>

       </div>
       <input type="hidden" class='form-label' id='upd_id' name="r_id"  value="<?php echo $_REQUEST['r_id']; ?>">
       
       <div class='col-md-12 text-center img mt-2'>
           <label class='form-label ms-auto text-muted fw-bold lab1'>Upload image</label><br>
               <label class='form-label lab1' for='upload2'>
                   <img src='admin/web_material/upload.png'>
                </label>
                <input type='file'  class='file d-none' name='upd_file'  id='upload2'>
                <div class='error2 text-danger'>please uplaod image</div>

    </div>
    



      


</div><!--row-->

        <button type="button" class="btn btn-secondary btn-sm mt-2" data-bs-dismiss="modal">Close</button>
        <button     class="btn btn-success btn-sm mt-2">update</button></button>
  
       </div>
      </div>
  
    </div>
    </form>
  </div>



                           <!-------------------------ALERT START----------------->



                           <div class="alert alert-success d-none validate" role="alert">
  <div class='text-center'>
    Work package Add Successfully    </div>
</div>



                            <!------------------------ALERT END-------------------->


</div><!--row-->

</section>


                 <!------------------content end------------------->

                          <!----------------------notify alert --------------->

                          <div class="position-fixed bottom-0 end-0 p-3 d-none notify_alert" style="z-index: 11;width:300px;">

</div>

 <!----------------------notify alert end------------>
   <!--------------------audio notification--------------->
   <audio controls muted preload="auto"  class='d-none audio'>
       <source src="media/audio.mp3" type="audio/mp3" />
</audio>

                 <!-------------------audio notifcation end------------->



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
    <!-- <script src='js/chat_notify.js'></script> -->
    <script>
      
        $(document).ready(function(){
            
          $('#userTable').DataTable({
      "bSort" : false
    });
  new JustValidate('.js-form', {
    rules: {
  
      status: {
        required:true
       
        
    },
    

  },

    messages: {
      
      status: {
        required:"required*"
      },
   

    },

    submitHandler: function (form, values, ajax) {

        var file=document.getElementById("upload");
         

        if(file.files.length>0){

   var s=  file.files[0].name;
  
   var h=s.split(".");
   

  //  console.log(h[1]);
console.log(file.files[0].name);
     console.log(file.files[0].type);

     if(h[h.length-1]=="doc"||h[h.length-1]=="docx"){
       
     }
else{
  $(".error").text("uplaod file must in doc docx format");
     $(".error").slideDown();

     return false;
    }

}
else{

$(".error").text("please uplaod file");
    $(".error").slideDown();

    return false;

}
    



 var form = $('#fileUploadForm')[0];

 var data = new FormData(form);

     

      $.ajax({
        url: 'php/insert_content.php',
        method: 'POST',
      data:data,
        enctype:"multipart/form-data",
        contentType: false, //this is requireded please see answers above
            processData: false,
      
        success: function(response)  {
      

        if(response=="success"){
         
            
                      $(".alert").removeClass("d-none");
                      $(".alert").addClass("d-block");
                      setTimeout(function() {
                        $(".alert").removeClass("d-block");
                      $(".alert").addClass("d-none");
                  
                      location.reload();
                      }, 3000);
        }

        
         
        }
      });
    },
    error:function(){
      alert("check");
    }
  

  })



  $(document).on("click",".delete",function(){

  
      
      var s=$(this).data('id');
      console.log(s);
     
      
$.ajax({
  method:"POST",
  url:"php/delete_content.php",
  data:{
    id:s
  },
  success:function(data){
    if(data=='success'){
    //location.reload();
  }

  },
})
      
    })




 


              
  new JustValidate('.js-form-update', {
    rules: {
  
  status: {
    required:true
   
    
},


},

messages: {
  
  status: {
    required:"required*"
  },


},

    submitHandler: function (form, values, ajax) {
      var file=document.getElementById("upload2");
      // console.log(file);
       alert(file.files.length);
         

         if(file.files.length>0){
 
    var s=  file.files[0].name;
   
    var h=s.split(".");
    
 
   //  console.log(h[1]);
 console.log(file.files[0].name);
      console.log(file.files[0].type);
 
      if(h[h.length-1]=="jpg"||h[h.length-1]=="png"||h[h.length-1]=="jpeg"){
        
      }
 else{
   $(".error2").text("uplaod file must in jpg,png or jpeg format");
      $(".error2").slideDown();
 
      return false;
     }
 
 }

 console.log(values);    


 var form = $('#fileUploadForm2')[0];

var data = new FormData(form);


      $.ajax({
        url: 'php/update_content.php',
        method: 'POST',
      data:data,
      contentType: false, //this is requireded please see answers above
            processData: false,
    
      
        success: function(response)  {
      console.log(response)
           console.log( String(response)=="success");

            // alert("yes")
        if(response=="success"){
         
                      $(".alert").removeClass("d-none");
                      $(".alert").html("Field Update successfully");
                      $(".alert").addClass("d-block");
                      setTimeout(function() {
                        $(".alert").removeClass("d-block");
                      $(".alert").addClass("d-none");
                  
                      location.reload();
                      }, 3000);
        }

        
         
        }
      });
    },
    error:function(){
    //   alert("check");
    }
  

  })



           

$(".save").click(function(){
  
 var form = $('#fileUploadForm3')[0];

var data = new FormData(form);
var myContent = tinymce.activeEditor.getContent();


data.append("des", myContent);


      $.ajax({
        url: 'php/save_content.php',
        method: 'POST',
      data:data,
      contentType: false, //this is requireded please see answers above
            processData: false,
    
      
        success: function(response)  {
      

            // alert("yes")
        if(response=="success"){
         
                      $(".alert").removeClass("d-none");
                      $(".alert").html("Field Update successfully");
                      $(".alert").addClass("d-block");
                      setTimeout(function() {
                        $(".alert").removeClass("d-block");
                      $(".alert").addClass("d-none");
                  
                      location.reload();
                      }, 3000);
        }

        
         
        }
      });
    

  

  })

});

var id;
  $(".update").click(function(){
            // alert("update");
            let index,status;
            let input=$(".js-form-update").find("input[name=desc]");
             status=$(".js-form-update").find("#select");
             let upd_id=$(".js-form-update").find("#upd_id");
     //console.log(status);
           id= index=$(this).data("id");
           upd_id.val($(this).data("id"));
            input.val($(this).data("description"));
            status.val($(this).data("status"));
          
            
              
        })


          
      


      $("#upload").on("change",function(){
    var img=document.getElementById("upload");
    // console.log(img.files[0].mozFullPath);
    var tmppath = URL.createObjectURL(event.target.files[0]);
    var s=  img.files[0].name;
  // console.log(s);
 // return false;
   var h=s.split(".");

   console.log(h[h.length-1]);


   if(h[h.length-1]=="doc"||h[h.length-1]=="docx"){   
    console.log(tmppath);
   // $(".img").fadeIn("fast").attr('src',URL.createObjectURL(event.target.files[0]));
    console.log("run");
    $(".lab1").addClass("d-none");
   $(".img").fadeIn("slow").append("<img src='"+"admin/web_material/pdf_img.png"+"' class='img-thumbnail' style='width:50px; height:50px'>");
   $(".error").slideUp(); 
  }
   else{

     $(".error").html("please uplaod word file");
     $(".error").slideDown();
   }

});//#upload end


$("#upload2").on("change",function(){
    var img=document.getElementById("upload2");
    // console.log(img.files[0].mozFullPath);
    var tmppath = URL.createObjectURL(event.target.files[0]);
    var s=  img.files[0].name;
  // console.log(s);
 // return false;
   var h=s.split(".");


   if(h[h.length-1]=="jpg"||h[h.length-1]=="png"||h[h.length-1]=="jpeg"){   
    console.log(tmppath);
   // $(".img").fadeIn("fast").attr('src',URL.createObjectURL(event.target.files[0]));
    console.log("run");
    $(".lab1").addClass("d-none");
   $(".img").fadeIn("slow").append("<img src='"+tmppath+"' class='img-thumbnail' style='width:auto; height:auto'>");
   }

});//#upload end
   
        </script>


 



   






</body>
</html>