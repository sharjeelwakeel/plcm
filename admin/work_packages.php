
<?php
include("session/check_session.php");
include("connection/connection.php");
$id=$_GET['p_id'];
$query="select * from projects where p_id=".$_GET['p_id'];
$result=mysqli_query($conn,$query);



$query="select * from projects where p_id=".$id;
$project=mysqli_query($conn,$query);
$pro=mysqli_fetch_assoc($project);

if(isset($_REQUEST['n_id'])){
  $n_id=$_REQUEST['n_id'];
$query="update notifications set status='seen' where p_id=".$_GET['p_id']." and n_id=".$n_id;

if(mysqli_query($conn,$query)){
 
}
}


$query="select f_name,mod_id,subject,type,status,priority,module.date from module,members where p_id=".$pro['p_id']." and m_id=assign_id";

$fetch=mysqli_query($conn,$query);


$id=$_SESSION['id'];
include("php/admin/chat_notify_query.php");
$id=$_REQUEST['p_id'];






?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Workpackage-plcm</title>
    <link rel='stylesheet' href='css/style.css'>
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css"/>
  </head>
  <body>

  <div class='container-fluid p-0 responsive'>

  <!---------------------------navbar----------------------->
  <nav class="navbar navbar-expand-md navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="index.php">PLCM</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <!-- <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">view projects</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="create_project.php">create project</a>
        </li> -->
        
        <li class="nav-item dropdown d-block d-md-none">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Project Modules
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            
  <li><a class="dropdown-item " href="#">View Projects</a></li>
  <li><a class="dropdown-item " href="detail_project.php?p_id=<?php echo $id;?>">project detail</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item active" href="work_packages.php?p_id=<?php echo $id;?>">Work packages</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="cost_analysis.php?p_id=<?php echo $id;?>">Cost analysis</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item " href="schedule.php?p_id=<?php echo $id;?>">Schedule</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item " href="board.php?p_id=<?php echo $id;?>">Board</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item " href="backlog.php?p_id=<?php echo $id;?>">Backlog</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item " href="project_members.php?p_id=<?php echo $id;?>">Members</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item " href="require.php?p_id=<?php echo $id;?>">Require</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item " href="quality.php?p_id=<?php echo $id;?>">quality</a></li>
            <li><hr class="dropdown-divider"></li>
            
          </ul>
        </li>
     
      </ul>
      <div class=' d-flex align-items-center justify-md-content-start justify-content-around'>

<div class='position-relative chat ms-2  d-inline-block d-md-block mt-md-0 mt-2 '>
        <a href='inbox_mail.php' class='nav-link top_color'>Mails
<!-- <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
width="20" height="20"
viewBox="0 0 172 172"
style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#198754"><path d="M86,14.00188c-43.45687,0 -78.87812,30.44937 -78.87812,68.55812c0,22.11813 12.12062,41.37406 30.73156,53.965c-0.02687,0.73906 0.02688,1.935 -0.94062,5.53625c-1.20938,4.44781 -3.64156,10.72313 -8.57313,17.79125l-3.50719,5.02563h6.1275c21.23125,0 33.51313,-13.84063 35.42125,-16.05781c6.31563,1.47812 12.81938,2.29781 19.61875,2.29781c43.45688,0 78.87813,-30.44938 78.87813,-68.55813c0,-38.10875 -35.42125,-68.55812 -78.87813,-68.55812zM86,20.39813c40.48719,0 72.48188,28.03062 72.48188,62.16187c0,34.13125 -31.99469,62.16188 -72.48188,62.16188c-7.01437,0 -13.62562,-0.67188 -19.83375,-2.29781l-1.98875,-0.52406l-1.30344,1.59906c0,0 -9.93031,11.20687 -25.78656,13.90781c2.87563,-5.18688 4.99875,-10.02438 5.97969,-13.67938c1.38406,-5.09281 1.41094,-8.53281 1.41094,-8.53281v-1.76031l-1.47813,-0.94063c-18.1675,-11.55625 -29.48187,-29.44156 -29.48187,-49.93375c0,-34.13125 31.99469,-62.16187 72.48187,-62.16187zM51.6,75.68c-3.80281,0 -6.88,3.07719 -6.88,6.88c0,3.80281 3.07719,6.88 6.88,6.88c3.80281,0 6.88,-3.07719 6.88,-6.88c0,-3.80281 -3.07719,-6.88 -6.88,-6.88zM86,75.68c-3.80281,0 -6.88,3.07719 -6.88,6.88c0,3.80281 3.07719,6.88 6.88,6.88c3.80281,0 6.88,-3.07719 6.88,-6.88c0,-3.80281 -3.07719,-6.88 -6.88,-6.88zM120.4,75.68c-3.80281,0 -6.88,3.07719 -6.88,6.88c0,3.80281 3.07719,6.88 6.88,6.88c3.80281,0 6.88,-3.07719 6.88,-6.88c0,-3.80281 -3.07719,-6.88 -6.88,-6.88z"></path></g></g></svg> -->

      </a>
<span class="position-absolute admin_chat_notify_top  translate-middle p-1 bg-success border border-light rounded-circle dot_mail_notify <?php echo(mysqli_num_rows($get_mails)>0)?"d-block":"d-none"; ?>">
    <span class="visually-hidden">New alerts</span>
  </span>


</div><!--chat-->


      <div class='position-relative chat ms-2  d-inline-block d-md-block mt-md-0 mt-2 '>
        <a href='chat.php' class='nav-link top_color'>Chat
<!-- <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
width="20" height="20"
viewBox="0 0 172 172"
style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#198754"><path d="M86,14.00188c-43.45687,0 -78.87812,30.44937 -78.87812,68.55812c0,22.11813 12.12062,41.37406 30.73156,53.965c-0.02687,0.73906 0.02688,1.935 -0.94062,5.53625c-1.20938,4.44781 -3.64156,10.72313 -8.57313,17.79125l-3.50719,5.02563h6.1275c21.23125,0 33.51313,-13.84063 35.42125,-16.05781c6.31563,1.47812 12.81938,2.29781 19.61875,2.29781c43.45688,0 78.87813,-30.44938 78.87813,-68.55813c0,-38.10875 -35.42125,-68.55812 -78.87813,-68.55812zM86,20.39813c40.48719,0 72.48188,28.03062 72.48188,62.16187c0,34.13125 -31.99469,62.16188 -72.48188,62.16188c-7.01437,0 -13.62562,-0.67188 -19.83375,-2.29781l-1.98875,-0.52406l-1.30344,1.59906c0,0 -9.93031,11.20687 -25.78656,13.90781c2.87563,-5.18688 4.99875,-10.02438 5.97969,-13.67938c1.38406,-5.09281 1.41094,-8.53281 1.41094,-8.53281v-1.76031l-1.47813,-0.94063c-18.1675,-11.55625 -29.48187,-29.44156 -29.48187,-49.93375c0,-34.13125 31.99469,-62.16187 72.48187,-62.16187zM51.6,75.68c-3.80281,0 -6.88,3.07719 -6.88,6.88c0,3.80281 3.07719,6.88 6.88,6.88c3.80281,0 6.88,-3.07719 6.88,-6.88c0,-3.80281 -3.07719,-6.88 -6.88,-6.88zM86,75.68c-3.80281,0 -6.88,3.07719 -6.88,6.88c0,3.80281 3.07719,6.88 6.88,6.88c3.80281,0 6.88,-3.07719 6.88,-6.88c0,-3.80281 -3.07719,-6.88 -6.88,-6.88zM120.4,75.68c-3.80281,0 -6.88,3.07719 -6.88,6.88c0,3.80281 3.07719,6.88 6.88,6.88c3.80281,0 6.88,-3.07719 6.88,-6.88c0,-3.80281 -3.07719,-6.88 -6.88,-6.88z"></path></g></g></svg> -->

      </a>
<span class="position-absolute admin_chat_notify_top  translate-middle p-1 bg-success border border-light rounded-circle dot_chat_notify <?php echo(mysqli_num_rows($chat)>0)?"d-block":"d-none"; ?>">
    <span class="visually-hidden">New alerts</span>
  </span>


</div><!--chat-->




<div class=" position-relative ms-2 top_color   mt-md-0 mt-2 nav-link " style="cursor:pointer"  data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
  Notify
<!-- <svg xmlns="http://www.w3.org/2000/svg"  x="0px" y="0px" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"
width="20" height="20"
viewBox="0 0 172 172"
style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#198754"><path d="M86,3.44c-4.3,0 -7.96282,1.73636 -10.31328,4.38063c-2.35046,2.64427 -3.44672,6.03493 -3.44672,9.37938c0,1.70861 0.29357,3.42545 0.88687,5.0525c-19.10984,4.97581 -31.84687,20.93309 -31.84687,43.1075c0,25.51637 -4.99542,37.18202 -9.66156,43.59797c-2.33307,3.20797 -4.62259,5.14277 -6.665,7.05469c-1.0212,0.95596 -2.01009,1.90954 -2.84875,3.16453c-0.83866,1.25499 -1.46469,2.91415 -1.46469,4.66281c0,4.73 2.87975,8.70577 6.85312,11.35469c3.97338,2.64892 9.14905,4.42201 15.19109,5.76469c6.78742,1.50832 14.74178,2.38843 23.13265,2.90922c-0.27478,1.28154 -0.45687,2.6266 -0.45687,4.0514c0,11.43391 9.20609,20.64 20.64,20.64c11.43391,0 20.64,-9.20609 20.64,-20.64c0,-1.4248 -0.18209,-2.76986 -0.45687,-4.0514c8.39087,-0.52079 16.34523,-1.4009 23.13265,-2.90922c6.04204,-1.34267 11.21772,-3.11577 15.19109,-5.76469c3.97338,-2.64892 6.85313,-6.62469 6.85313,-11.35469c0,-1.74867 -0.62603,-3.40782 -1.46469,-4.66281c-0.83866,-1.25499 -1.82755,-2.20857 -2.84875,-3.16453c-2.04241,-1.91192 -4.33193,-3.84671 -6.665,-7.05469c-4.66614,-6.41594 -9.66156,-18.0816 -9.66156,-43.59797c0,-22.0469 -12.60401,-38.26139 -31.8536,-43.08734c0.5982,-1.63287 0.8936,-3.35713 0.8936,-5.07266c0,-3.34444 -1.09626,-6.73511 -3.44672,-9.37937c-2.35046,-2.64427 -6.01328,-4.38062 -10.31328,-4.38062zM86,10.32c2.58,0 4.07718,0.84364 5.16672,2.06937c1.08954,1.22573 1.71328,2.99507 1.71328,4.81063c0,1.81556 -0.62374,3.58489 -1.71328,4.81063c-1.08954,1.22573 -2.58672,2.06937 -5.16672,2.06937c-2.58,0 -4.07718,-0.84364 -5.16672,-2.06937c-1.08954,-1.22573 -1.71328,-2.99507 -1.71328,-4.81063c0,-1.81556 0.62374,-3.58489 1.71328,-4.81062c1.08954,-1.22573 2.58672,-2.06937 5.16672,-2.06937zM77.60156,28.31281c2.23525,1.64123 5.13149,2.64719 8.39844,2.64719c3.24018,0 6.11698,-0.9895 8.34469,-2.60688c18.28768,3.18011 29.49531,16.35049 29.49531,37.00688c0,26.42763 5.32458,39.87532 10.97844,47.64937c2.82693,3.88703 5.69741,6.31808 7.525,8.02891c0.9138,0.85541 1.53741,1.52777 1.8275,1.96187c0.2901,0.4341 0.30906,0.52451 0.30906,0.83985c0,2.15 -0.99025,3.76423 -3.78937,5.63031c-2.79912,1.86608 -7.29845,3.53299 -12.86641,4.77031c-11.13592,2.47465 -26.47163,3.35937 -41.82422,3.35937c-15.35259,0 -30.6883,-0.88473 -41.82422,-3.35937c-5.56796,-1.23733 -10.06729,-2.90423 -12.86641,-4.77031c-2.79912,-1.86608 -3.78937,-3.48031 -3.78937,-5.63031c0,-0.31534 0.01895,-0.40574 0.30906,-0.83985c0.29009,-0.4341 0.9137,-1.10646 1.8275,-1.96187c1.82759,-1.71083 4.69807,-4.14188 7.525,-8.02891c5.65386,-7.77405 10.97844,-21.22175 10.97844,-47.64937c0,-20.73869 11.30135,-33.63046 29.44156,-37.04719zM72.8514,144.2314c4.33992,0.15687 8.73071,0.2486 13.1486,0.2486c4.41789,0 8.80868,-0.09172 13.1486,-0.2486c0.35515,1.13471 0.6114,2.33125 0.6114,3.6886c0,7.83009 -5.92991,13.76 -13.76,13.76c-7.83009,0 -13.76,-5.92991 -13.76,-13.76c0,-1.35734 0.25625,-2.55389 0.6114,-3.6886z"></path></g></g>
</svg> -->
 
  <span class="position-absolute  admin_notify_top translate-middle p-1 bg-success border border-light rounded-circle dot_notify <?php echo(mysqli_num_rows($check)>0)?"d-block":"d-none"; ?>">
    <span class="visually-hidden">New alerts</span>
  </span>

  
</div>  <!--notify end-->
      <ul class='navbar-nav'>
      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Logout
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
  
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="php/admin/logout.php">Logout</a></li>
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
    
  <?php if(mysqli_num_rows($notify)>0){
    while($row=mysqli_fetch_assoc($notify))
    { ?>
      <a href="<?php echo$row['link_page'];?>p_id=<?php echo $row['p_id']; ?>&&n_id=<?php echo $row['n_id']; ?>" class="text-decoration-none">
      <div class='bg-light d-flex flex-column  py-3 rounded-3 mt-2'>
    <div class='msg px-2'>
  <span class='text-success fw-bold' ><?php 
  $query="select * from members where m_id=".$row['c_id'];
  $fetch_member=mysqli_query($conn,$query);
  $ft=mysqli_fetch_assoc($fetch_member);
  $name=$ft['f_name']." ".$ft['l_name'];

 echo $name; ?> </span><span class="text-dark <?php echo ($row['status']=="unseen")?'fw-bold':'';?>"> <?php echo $row['description']." ".$row['name']." ".$row['p_title'] ?> </span>

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
<section class='content bg'>
  <div class='row m-0  mt-md-4'>

  <div class='col-md-3 d-none d-md-block align-self-start'>

  <ul class='menu '>
      
  <li><a class="dropdown-item " href="detail_project.php?p_id=<?php echo $id;?>">Project detail</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item active" href="work_packages.php?p_id=<?php echo $id;?>">Work packages</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="cost_analysis.php?p_id=<?php echo $id;?>">Cost analysis</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item " href="schedule.php?p_id=<?php echo $id;?>">Schedule</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item " href="board.php?p_id=<?php echo $id;?>">Board</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item " href="backlog.php?p_id=<?php echo $id;?>">Backlog</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item " href="project_members.php?p_id=<?php echo $id;?>">Members</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item " href="require.php?p_id=<?php echo $id;?>">Require</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item " href="quality.php?p_id=<?php echo $id;?>">quality</a></li>
            <li><hr class="dropdown-divider"></li>
            <!-- <li><a class="dropdown-item" href="add_member.php">Add Members</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="view_member.php">View Members</a></li> -->
            <!-- <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Project Integration Management</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Project Scope Management</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Project Schedule Management</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Project Cost Management</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Project Integration Management</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Project Qulaity Management</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Project Resource Management</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Project Communication Management</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Project Risk Management</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Project Procurement Management</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Project Stakeholders Management</a></li> -->
      


</ul>
    


</div><!--col-md-4-->

<div class='col-md-9 align-self-start bg-light'>
    <div class='row'>
    <div class='col-12 text-muted h3 fw-bold'>
            Work Packages
          </div>
          <div class='col-12 text-muted  fw-bold mt-2 '>
            <span class='text-dark'>Project Name:</span><span><?php echo $pro['p_title']; ?>        </div>
<div class='col-12'>
    <div class="table-responsive mt-2">
<table id="userTable" class=' table table-hover '>
        <thead>
            <th>ID</th>
            <th>Subject</th>
            <th>Type</th>
            <th>Status</th>
            <th>Assigned</th>
            <th>Priority</th>
        </thead>
        <tbody>
           <?php 
           if(mysqli_num_rows($fetch)>0){
           while($fet=mysqli_fetch_assoc($fetch)){?>
           <tr>
             <td ><a href='c_detail.php?p_id=<?php echo $pro['p_id']?>&&mod_id=<?php echo $fet['mod_id'];?>' class='text-decoration-none text-dark'><?php echo $fet['mod_id'];?></a></td>
             <td><?php echo $fet['subject'];?></td>
             <td><?php echo $fet['type'];?></td>
             <td><?php //echo $fet['status'];?>
             <select class="form-select text-muted sel_status" aria-label="Default select example" name='status' data-validate-field='status' data-id="<?php echo $fet['mod_id']; ?>" data-pid="<?php echo $pro['p_id']; ?>">
  <option selected value=''>Select</option>
  <option  <?php echo ($fet['status']=='Schedule')? "selected":''?> value="Schedule">Schedule</option>
  <option  <?php echo ($fet['status']=='To be schedule')? "selected":''?> value="To be schedule">To be schedule</option>
  <option <?php echo ($fet['status']=='In progress')? "selected":''?>  value="In progress">In progress</option>
  <option <?php echo ($fet['status']=='close')? "selected":''?> value="Closed">Closed</option>
  <option <?php echo ($fet['status']=='On hold')? "selected":''?> value="On hold">On hold</option>
  <option <?php echo ($fet['status']=='Rejected')? "selected":''?> value="Rejected">Rejected</option>
</select>
 

            
            </td>
             <td><?php echo $fet['f_name'];?></td>
             <td><?php echo $fet['priority'];?></td>
           </tr>

           <?php }} ?>
             
        </tbody>
    </table>
    

                </div><!--table_responsive-->
           
                </div>


</div><!--col-md-9-->


</div><!--row-->

</section>


                 <!------------------content end------------------->


                           <!-------------------------ALERT START----------------->



                           <div class="alert alert-success d-none validate" role="alert">
  <div class='text-center'>
    Work package Add Successfully    </div>
</div>



                            <!------------------------ALERT END-------------------->


                                               
  <!----------------------notify alert --------------->

  <div class="position-fixed bottom-0 end-0 p-3 d-none notify_alert" style="z-index: 11;width:300px;">

</div>

 <!----------------------notify alert end------------>








 <!--------------------audio notification--------------->
 <audio controls muted preload="auto"  class='d-none audio'>
<source src="../media/audio.mp3" type="audio/mp3" />
</audio>

 <!-------------------audio notifcation end------------->


</div><!--container-fluid-->

  <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src='js/chat_notify.js'></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
    <script>
         $(document).ready(function(){
            
          $('#userTable').DataTable({
      "bSort" : false
    });
         });

         $(document).on("change",".sel_status",function(){
           let id=$(this).data("id");
           let val=$(this).val();
           let p_id=$(this).data("pid");
          // console.log(val);
           if(val==""){
            $(".alert").removeClass("d-none");
                      $(".alert").addClass("d-block");
                      $(".validate").removeClass("text-success ");
             $(".validate").addClass("text-danger");
             $(".validate").html("please select one field");


                      setTimeout(function() {
                        $(".alert").removeClass("d-block");
                      $(".alert").addClass("d-none");
                  
                     
                      }, 1500);
           
           
             
           }
           else{


            $.ajax({
              url:"php/admin/edit_module.php",
              method:"POST",
              data:{id:id,status:val,pid:p_id},
              success:function(data){
console.log(data);
                if(data=="success"){
            $(".alert").removeClass("d-none");
                      $(".alert").addClass("d-block");
                      $(".validate").removeClass("text-danger ");
             $(".validate").addClass("text-success");
             $(".validate").html("Field Updated Successfully");


                      setTimeout(function() {
                        $(".alert").removeClass("d-block");
                      $(".alert").addClass("d-none");

                      location.reload();
                  
                     
                      }, 1500);
           
           
             
           }
              }


            })

           }
         })
      
    </script>

</body>
</html>