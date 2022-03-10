<?php

include("session/check_session.php");
include_once("connection/connection.php");

function generateRandomString($length = 10) {
  $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $charactersLength = strlen($characters);
  $randomString = '';
  for ($i = 0; $i < $length; $i++) {
      $randomString .= $characters[rand(0, $charactersLength - 1)];
  }
  return $randomString;
}

if(isset($_REQUEST['add'])){
    $f_name=mysqli_real_escape_string($conn,$_REQUEST['f_name']);
    $l_name=mysqli_real_escape_string($conn,$_REQUEST['l_name']);
    $desig=mysqli_real_escape_string($conn,$_REQUEST['designation']);
    $spec=mysqli_real_escape_string($conn,$_REQUEST['specilality']);
    $reg_no=mysqli_real_escape_string($conn,$_REQUEST['reg']);
    // print_r($_FILES);
    // exit(1);

    $file_path="images/".rand().$_FILES['file']['name'];
    move_uploaded_file($_FILES['file']['tmp_name'],$file_path);
$email=generateRandomString(5).$f_name.$l_name."@plcm.com";
$email = str_replace(' ', '', $email);
$pass=generateRandomString(10);
    $status=NULL;
//$date= date("yy-m-d");

   
    $query="insert into members (f_name,l_name,reg_no,email,password,designation,speciality,img_path,date)values('".$f_name."','".$l_name."','".$reg_no."','".$email."','".$pass."','" .$desig."','".$spec."','".$file_path."',CURDATE())";
    //echo $query;
    if(mysqli_query($conn,$query)){
      
        $status="success";
        if(isset($_REQUEST['languages'])){
        $query="select max(m_id) from members";
        $result=mysqli_query($conn,$query);
        $row=mysqli_fetch_assoc($result);
        $id=$row['max(m_id)'];
        $length=count($_REQUEST['languages']);
        $arr=$_REQUEST['languages'];
     
        for($i=0;$i<$length;$i++){
          $query="insert into languages(m_id,l_name)values(".$id.",'".$arr[$i]."')";
          mysqli_query($conn,$query);


        }
      }
    }
    else{

        $status="fail";
    }

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

    <title>CreateProject-plcm</title>
    <link rel='stylesheet' href='css/style.css'>
  
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
          <a class="nav-link " aria-current="page" href="index.php">view projects</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="#">create project</a>
        </li> -->
        
        <li class="nav-item dropdown d-block d-md-none">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Project Modules
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
          <li><a class="dropdown-item " href="index.php">View Projects</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="create_project.php">Create Project</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item active" href="add_member.php">Add Members</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="view_member.php">View Members</a></li>

            <!-- <li><a class="dropdown-item" href="#">Feasiblity Study</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Projects Proposal And Reviews</a></li>
            <li><hr class="dropdown-divider"></li>
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
        </li>
     
      </ul>
      <form class="d-none">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
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
    </div><!--container-->
  </div><!--collapse-->
</nav>
                 <!---------------------navbar-------------------->



                 <!--------------------content start--------------------->
<section class='content bg'>
  <div class='row m-0 pt-md-4'>

  <div class='col-md-3 d-none d-md-block align-self-start'>

  <ul class='menu '>

  <li><a class="dropdown-item " href="index.php">View Projects</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="create_project.php">Create Project</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item active" href="add_member.php">Add Members</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="view_member.php">View Members</a></li>

      
  <!-- <li><a class="dropdown-item" href="#"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
width="20" height="20"
viewBox="0 0 172 172"
style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="#e9ecef"></path><g fill="#198754"><path d="M10.32,24.08c-5.65719,0 -10.32,4.66281 -10.32,10.32v103.2c0,5.65719 4.66281,10.32 10.32,10.32h68.0475c1.89469,2.09625 4.59563,3.44 7.6325,3.44c3.03688,0 5.73781,-1.34375 7.6325,-3.44h68.0475c5.65719,0 10.32,-4.66281 10.32,-10.32v-103.2c0,-5.65719 -4.66281,-10.32 -10.32,-10.32h-68.8c-2.63375,0 -5.0525,1.03469 -6.88,2.6875c-1.8275,-1.65281 -4.24625,-2.6875 -6.88,-2.6875zM10.32,30.96h68.8c1.94844,0 3.44,1.49156 3.44,3.44v106.64h-72.24c-1.94844,0 -3.44,-1.49156 -3.44,-3.44v-103.2c0,-1.94844 1.49156,-3.44 3.44,-3.44zM92.88,30.96h68.8c1.94844,0 3.44,1.49156 3.44,3.44v103.2c0,1.94844 -1.49156,3.44 -3.44,3.44h-72.24v-106.64c0,-1.94844 1.49156,-3.44 3.44,-3.44zM19.6725,48.16c-1.89469,0.26875 -3.225,2.02906 -2.95625,3.92375c0.26875,1.89469 2.02906,3.225 3.92375,2.95625h27.52c1.23625,0.01344 2.39188,-0.63156 3.02344,-1.70656c0.61813,-1.075 0.61813,-2.39187 0,-3.46687c-0.63156,-1.075 -1.78719,-1.72 -3.02344,-1.70656h-27.52c-0.1075,0 -0.215,0 -0.3225,0c-0.1075,0 -0.215,0 -0.3225,0c-0.1075,0 -0.215,0 -0.3225,0zM61.92,48.16c-1.89469,0 -3.44,1.54531 -3.44,3.44c0,1.89469 1.54531,3.44 3.44,3.44c1.89469,0 3.44,-1.54531 3.44,-3.44c0,-1.89469 -1.54531,-3.44 -3.44,-3.44zM72.24,48.16c-1.89469,0 -3.44,1.54531 -3.44,3.44c0,1.89469 1.54531,3.44 3.44,3.44c1.89469,0 3.44,-1.54531 3.44,-3.44c0,-1.89469 -1.54531,-3.44 -3.44,-3.44zM102.2325,48.16c-1.89469,0.26875 -3.225,2.02906 -2.95625,3.92375c0.26875,1.89469 2.02906,3.225 3.92375,2.95625h27.52c1.23625,0.01344 2.39188,-0.63156 3.02344,-1.70656c0.61813,-1.075 0.61813,-2.39187 0,-3.46687c-0.63156,-1.075 -1.78719,-1.72 -3.02344,-1.70656h-27.52c-0.1075,0 -0.215,0 -0.3225,0c-0.1075,0 -0.215,0 -0.3225,0c-0.1075,0 -0.215,0 -0.3225,0zM144.48,48.16c-1.89469,0 -3.44,1.54531 -3.44,3.44c0,1.89469 1.54531,3.44 3.44,3.44c1.89469,0 3.44,-1.54531 3.44,-3.44c0,-1.89469 -1.54531,-3.44 -3.44,-3.44zM154.8,48.16c-1.89469,0 -3.44,1.54531 -3.44,3.44c0,1.89469 1.54531,3.44 3.44,3.44c1.89469,0 3.44,-1.54531 3.44,-3.44c0,-1.89469 -1.54531,-3.44 -3.44,-3.44zM19.6725,65.36c-1.89469,0.26875 -3.225,2.02906 -2.95625,3.92375c0.26875,1.89469 2.02906,3.225 3.92375,2.95625h27.52c1.23625,0.01344 2.39188,-0.63156 3.02344,-1.70656c0.61813,-1.075 0.61813,-2.39187 0,-3.46687c-0.63156,-1.075 -1.78719,-1.72 -3.02344,-1.70656h-27.52c-0.1075,0 -0.215,0 -0.3225,0c-0.1075,0 -0.215,0 -0.3225,0c-0.1075,0 -0.215,0 -0.3225,0zM61.92,65.36c-1.89469,0 -3.44,1.54531 -3.44,3.44c0,1.89469 1.54531,3.44 3.44,3.44c1.89469,0 3.44,-1.54531 3.44,-3.44c0,-1.89469 -1.54531,-3.44 -3.44,-3.44zM72.24,65.36c-1.89469,0 -3.44,1.54531 -3.44,3.44c0,1.89469 1.54531,3.44 3.44,3.44c1.89469,0 3.44,-1.54531 3.44,-3.44c0,-1.89469 -1.54531,-3.44 -3.44,-3.44zM102.2325,65.36c-1.89469,0.26875 -3.225,2.02906 -2.95625,3.92375c0.26875,1.89469 2.02906,3.225 3.92375,2.95625h27.52c1.23625,0.01344 2.39188,-0.63156 3.02344,-1.70656c0.61813,-1.075 0.61813,-2.39187 0,-3.46687c-0.63156,-1.075 -1.78719,-1.72 -3.02344,-1.70656h-27.52c-0.1075,0 -0.215,0 -0.3225,0c-0.1075,0 -0.215,0 -0.3225,0c-0.1075,0 -0.215,0 -0.3225,0zM144.48,65.36c-1.89469,0 -3.44,1.54531 -3.44,3.44c0,1.89469 1.54531,3.44 3.44,3.44c1.89469,0 3.44,-1.54531 3.44,-3.44c0,-1.89469 -1.54531,-3.44 -3.44,-3.44zM154.8,65.36c-1.89469,0 -3.44,1.54531 -3.44,3.44c0,1.89469 1.54531,3.44 3.44,3.44c1.89469,0 3.44,-1.54531 3.44,-3.44c0,-1.89469 -1.54531,-3.44 -3.44,-3.44zM19.6725,82.56c-1.89469,0.26875 -3.225,2.02906 -2.95625,3.92375c0.26875,1.89469 2.02906,3.225 3.92375,2.95625h27.52c1.23625,0.01344 2.39188,-0.63156 3.02344,-1.70656c0.61813,-1.075 0.61813,-2.39187 0,-3.46687c-0.63156,-1.075 -1.78719,-1.72 -3.02344,-1.70656h-27.52c-0.1075,0 -0.215,0 -0.3225,0c-0.1075,0 -0.215,0 -0.3225,0c-0.1075,0 -0.215,0 -0.3225,0zM72.24,82.56c-1.89469,0 -3.44,1.54531 -3.44,3.44c0,1.89469 1.54531,3.44 3.44,3.44c1.89469,0 3.44,-1.54531 3.44,-3.44c0,-1.89469 -1.54531,-3.44 -3.44,-3.44zM102.2325,82.56c-1.89469,0.26875 -3.225,2.02906 -2.95625,3.92375c0.26875,1.89469 2.02906,3.225 3.92375,2.95625h27.52c1.23625,0.01344 2.39188,-0.63156 3.02344,-1.70656c0.61813,-1.075 0.61813,-2.39187 0,-3.46687c-0.63156,-1.075 -1.78719,-1.72 -3.02344,-1.70656h-27.52c-0.1075,0 -0.215,0 -0.3225,0c-0.1075,0 -0.215,0 -0.3225,0c-0.1075,0 -0.215,0 -0.3225,0zM154.8,82.56c-1.89469,0 -3.44,1.54531 -3.44,3.44c0,1.89469 1.54531,3.44 3.44,3.44c1.89469,0 3.44,-1.54531 3.44,-3.44c0,-1.89469 -1.54531,-3.44 -3.44,-3.44zM19.6725,99.76c-1.89469,0.26875 -3.225,2.02906 -2.95625,3.92375c0.26875,1.89469 2.02906,3.225 3.92375,2.95625h27.52c1.23625,0.01344 2.39188,-0.63156 3.02344,-1.70656c0.61813,-1.075 0.61813,-2.39187 0,-3.46687c-0.63156,-1.075 -1.78719,-1.72 -3.02344,-1.70656h-27.52c-0.1075,0 -0.215,0 -0.3225,0c-0.1075,0 -0.215,0 -0.3225,0c-0.1075,0 -0.215,0 -0.3225,0zM61.92,99.76c-1.89469,0 -3.44,1.54531 -3.44,3.44c0,1.89469 1.54531,3.44 3.44,3.44c1.89469,0 3.44,-1.54531 3.44,-3.44c0,-1.89469 -1.54531,-3.44 -3.44,-3.44zM72.24,99.76c-1.89469,0 -3.44,1.54531 -3.44,3.44c0,1.89469 1.54531,3.44 3.44,3.44c1.89469,0 3.44,-1.54531 3.44,-3.44c0,-1.89469 -1.54531,-3.44 -3.44,-3.44zM19.6725,116.96c-1.89469,0.26875 -3.225,2.02906 -2.95625,3.92375c0.26875,1.89469 2.02906,3.225 3.92375,2.95625h27.52c1.23625,0.01344 2.39188,-0.63156 3.02344,-1.70656c0.61813,-1.075 0.61813,-2.39187 0,-3.46687c-0.63156,-1.075 -1.78719,-1.72 -3.02344,-1.70656h-27.52c-0.1075,0 -0.215,0 -0.3225,0c-0.1075,0 -0.215,0 -0.3225,0c-0.1075,0 -0.215,0 -0.3225,0zM72.24,116.96c-1.89469,0 -3.44,1.54531 -3.44,3.44c0,1.89469 1.54531,3.44 3.44,3.44c1.89469,0 3.44,-1.54531 3.44,-3.44c0,-1.89469 -1.54531,-3.44 -3.44,-3.44z"></path></g></g></svg>Feasiblity Study</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
width="20" height="20"
viewBox="0 0 172 172"
style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="#e9ecef"></path><g fill="#198754"><path d="M20.64,6.88c-11.35469,0 -20.64,9.28531 -20.64,20.64v99.76c0,11.35469 9.28531,20.64 20.64,20.64h151.36v-123.84h-131.41875c-1.70656,-9.66156 -9.79594,-17.2 -19.94125,-17.2zM20.64,13.76c7.6325,0 13.76,6.1275 13.76,13.76v84.44125c-3.655,-3.29219 -8.47906,-5.32125 -13.76,-5.32125c-5.28094,0 -10.105,2.02906 -13.76,5.32125v-84.44125c0,-7.6325 6.1275,-13.76 13.76,-13.76zM41.28,30.96h123.84v110.08h-144.48c-7.6325,0 -13.76,-6.1275 -13.76,-13.76c0,-7.6325 6.1275,-13.76 13.76,-13.76c7.6325,0 13.76,6.1275 13.76,13.76h6.88zM120.4,51.6l9.60781,9.60781l-18.20781,18.20781l-18.75875,-18.77219l-29.93875,26.21656l4.515,5.16l25.10125,-21.94344l19.08125,19.06781l23.07219,-23.07219l9.60781,9.60781v-24.08zM58.48,110.08v6.88h86v-6.88z"></path></g></g></svg>Projects Proposal And Reviews</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
width="20" height="20"
viewBox="0 0 172 172"
style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="#e9ecef"></path><g fill="#198754"><path d="M85.355,6.88c-0.37625,0.08063 -0.73906,0.22844 -1.075,0.43l-27.52,15.265c-0.1075,0.06719 -0.215,0.13438 -0.3225,0.215c-0.04031,0.04031 -0.06719,0.06719 -0.1075,0.1075c-0.04031,0.04031 -0.06719,0.06719 -0.1075,0.1075c-0.08062,0.06719 -0.14781,0.13438 -0.215,0.215c-0.16125,0.16125 -0.30906,0.34938 -0.43,0.5375c-0.04031,0.06719 -0.08062,0.14781 -0.1075,0.215c-0.04031,0.06719 -0.08062,0.14781 -0.1075,0.215c-0.04031,0.04031 -0.06719,0.06719 -0.1075,0.1075c0,0.04031 0,0.06719 0,0.1075c-0.04031,0.06719 -0.08062,0.14781 -0.1075,0.215c0,0.04031 0,0.06719 0,0.1075c0,0.06719 0,0.14781 0,0.215c-0.04031,0.13438 -0.08062,0.28219 -0.1075,0.43c-0.02687,0.215 -0.02687,0.43 0,0.645v11.2875l-32.68,18.1675c-1.075,0.61813 -1.73344,1.77375 -1.72,3.01v29.67l-11.61,6.45l-0.43,0.215c-0.1075,0.06719 -0.215,0.13438 -0.3225,0.215c-0.04031,0.04031 -0.06719,0.06719 -0.1075,0.1075c-0.04031,0.04031 -0.06719,0.06719 -0.1075,0.1075c-0.08062,0.06719 -0.14781,0.13438 -0.215,0.215c-0.08062,0.06719 -0.14781,0.13438 -0.215,0.215c-0.08062,0.1075 -0.14781,0.215 -0.215,0.3225c-0.04031,0.06719 -0.08062,0.14781 -0.1075,0.215c-0.04031,0.06719 -0.08062,0.14781 -0.1075,0.215c-0.04031,0.04031 -0.06719,0.06719 -0.1075,0.1075c0,0.04031 0,0.06719 0,0.1075c-0.04031,0.06719 -0.08062,0.14781 -0.1075,0.215c0,0.04031 0,0.06719 0,0.1075c0,0.06719 0,0.14781 0,0.215c-0.04031,0.13438 -0.08062,0.28219 -0.1075,0.43c-0.02687,0.215 -0.02687,0.43 0,0.645v30.2075c-0.01344,1.23625 0.645,2.39188 1.72,3.01l27.305,15.1575l0.215,0.1075c0.04031,0.04031 0.06719,0.06719 0.1075,0.1075c0.06719,0 0.14781,0 0.215,0c0.04031,0.04031 0.06719,0.06719 0.1075,0.1075c0.06719,0.04031 0.14781,0.08063 0.215,0.1075c0.04031,0 0.06719,0 0.1075,0c0.06719,0 0.14781,0 0.215,0c0.04031,0.04031 0.06719,0.06719 0.1075,0.1075c0.06719,0 0.14781,0 0.215,0c0.04031,0 0.06719,0 0.1075,0c0.06719,0 0.14781,0 0.215,0c0.04031,0 0.06719,0 0.1075,0c0.06719,0 0.14781,0 0.215,0c0.06719,0 0.14781,0 0.215,0c0.29563,-0.04031 0.57781,-0.1075 0.86,-0.215c0.04031,0 0.06719,0 0.1075,0c0.04031,-0.04031 0.06719,-0.06719 0.1075,-0.1075c0.06719,-0.02687 0.14781,-0.06719 0.215,-0.1075l0.3225,-0.215c0.06719,-0.02687 0.14781,-0.06719 0.215,-0.1075l5.6975,-3.1175l38.485,21.3925c1.06156,0.61813 2.37844,0.61813 3.44,0l38.485,-21.3925l6.02,3.3325c0.1075,0.08063 0.215,0.14781 0.3225,0.215c0.06719,0 0.14781,0 0.215,0c0.04031,0.04031 0.06719,0.06719 0.1075,0.1075c0.06719,0.04031 0.14781,0.08063 0.215,0.1075c0.04031,0 0.06719,0 0.1075,0c0.06719,0 0.14781,0 0.215,0c0.04031,0.04031 0.06719,0.06719 0.1075,0.1075c0.06719,0 0.14781,0 0.215,0c0.04031,0 0.06719,0 0.1075,0c0.06719,0 0.14781,0 0.215,0c0.04031,0 0.06719,0 0.1075,0c0.06719,0 0.14781,0 0.215,0c0.06719,0 0.14781,0 0.215,0c0.29563,-0.04031 0.57781,-0.1075 0.86,-0.215c0.04031,0 0.06719,0 0.1075,0c0.04031,-0.04031 0.06719,-0.06719 0.1075,-0.1075c0.06719,-0.02687 0.14781,-0.06719 0.215,-0.1075l0.3225,-0.215c0.06719,-0.02687 0.14781,-0.06719 0.215,-0.1075l26.9825,-14.9425c1.075,-0.61812 1.73344,-1.77375 1.72,-3.01v-28.81c0.90031,-1.08844 1.03469,-2.62031 0.33594,-3.85656c-0.68531,-1.23625 -2.05594,-1.92156 -3.45344,-1.73344l-10.6425,-5.9125v-29.67c0.01344,-1.23625 -0.645,-2.39187 -1.72,-3.01l-32.68,-18.1675v-9.89c0.90031,-1.08844 1.03469,-2.62031 0.33594,-3.85656c-0.68531,-1.23625 -2.05594,-1.92156 -3.45344,-1.73344l-26.1225,-14.5125c-0.61812,-0.34937 -1.33031,-0.49719 -2.0425,-0.43c-0.1075,0 -0.215,0 -0.3225,0zM86,14.2975l20.425,11.2875l-20.425,11.0725l-20.425,-11.0725zM61.92,31.39l20.64,11.18v23.005l-20.64,-11.395v-13.8675c0.20156,-0.65844 0.20156,-1.38406 0,-2.0425zM110.08,31.39v6.88c-0.18812,0.63156 -0.18812,1.30344 0,1.935v13.975l-20.64,11.395v-23.005zM55.04,45.2575v10.965c-0.01344,1.23625 0.645,2.39188 1.72,3.01l27.52,15.265c0.04031,0.04031 0.06719,0.06719 0.1075,0.1075c0.06719,0 0.14781,0 0.215,0c0.04031,0.04031 0.06719,0.06719 0.1075,0.1075c0.06719,0.04031 0.14781,0.08063 0.215,0.1075c0.04031,0 0.06719,0 0.1075,0c0.06719,0 0.14781,0 0.215,0c0.04031,0.04031 0.06719,0.06719 0.1075,0.1075c0.06719,0 0.14781,0 0.215,0c0.04031,0 0.06719,0 0.1075,0c0.06719,0 0.14781,0 0.215,0c0.04031,0 0.06719,0 0.1075,0c0.06719,0 0.14781,0 0.215,0c0.06719,0 0.14781,0 0.215,0c0.29563,-0.04031 0.57781,-0.1075 0.86,-0.215c0.04031,0 0.06719,0 0.1075,0c0.04031,-0.04031 0.06719,-0.06719 0.1075,-0.1075c0.06719,-0.02687 0.14781,-0.06719 0.215,-0.1075l0.3225,-0.215c0.06719,-0.02687 0.14781,-0.06719 0.215,-0.1075l26.9825,-14.9425c1.075,-0.61812 1.73344,-1.77375 1.72,-3.01v-10.965l27.52,15.265v23.7575l-8.6,-4.73c-0.61812,-0.34937 -1.33031,-0.49719 -2.0425,-0.43c-0.1075,0 -0.215,0 -0.3225,0c-0.37625,0.08063 -0.73906,0.22844 -1.075,0.43l-27.52,15.265c-0.06719,0.02688 -0.14781,0.06719 -0.215,0.1075c-0.08062,0.06719 -0.14781,0.13438 -0.215,0.215c-0.04031,0.04031 -0.06719,0.06719 -0.1075,0.1075c-0.08062,0.06719 -0.14781,0.13438 -0.215,0.215c-0.26875,0.28219 -0.48375,0.60469 -0.645,0.9675c-0.04031,0.04031 -0.06719,0.06719 -0.1075,0.1075c0,0.04031 0,0.06719 0,0.1075c-0.04031,0.06719 -0.08062,0.14781 -0.1075,0.215c-0.06719,0.24188 -0.09406,0.49719 -0.1075,0.7525c0,0.06719 0,0.14781 0,0.215v30.6375c-0.01344,1.23625 0.645,2.39188 1.72,3.01l14.19,7.8475l-33.11,18.3825l-33.11,-18.3825l14.19,-7.8475c1.075,-0.61812 1.73344,-1.77375 1.72,-3.01v-28.81c0.90031,-1.08844 1.03469,-2.62031 0.33594,-3.85656c-0.68531,-1.23625 -2.05594,-1.92156 -3.45344,-1.73344l-26.1225,-14.5125c-0.61812,-0.34937 -1.33031,-0.49719 -2.0425,-0.43c-0.1075,0 -0.215,0 -0.3225,0c-0.37625,0.08063 -0.73906,0.22844 -1.075,0.43l-8.6,4.73v-23.7575zM37.84,86.5375l20.425,11.2875l-20.425,11.0725l-20.425,-11.0725l7.74,-4.3l0.645,-0.3225c0.06719,-0.02687 0.14781,-0.06719 0.215,-0.1075l0.1075,-0.1075c0.06719,-0.02687 0.14781,-0.06719 0.215,-0.1075zM134.16,86.5375l11.825,6.5575c0.20156,0.13438 0.41656,0.24188 0.645,0.3225l7.955,4.4075l-20.425,11.0725l-20.425,-11.0725zM13.76,103.63l20.64,11.18v23.005l-20.64,-11.395zM61.92,103.63v22.79l-17.415,9.675h-0.1075c-0.06719,0.02688 -0.14781,0.06719 -0.215,0.1075c-0.22844,0.08063 -0.44344,0.18813 -0.645,0.3225c-0.08062,0.06719 -0.14781,0.13438 -0.215,0.215l-2.0425,1.075v-23.005zM110.08,103.63l20.64,11.18v23.005l-2.365,-1.29c-0.04031,-0.04031 -0.06719,-0.06719 -0.1075,-0.1075l-0.215,-0.1075c-0.1075,-0.04031 -0.215,-0.08062 -0.3225,-0.1075l-17.63,-9.7825zM158.24,103.63v22.79l-20.64,11.395v-23.005z"></path></g></g></svg>Project Integration Management</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
width="20" height="20"
viewBox="0 0 172 172"
style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="#e9ecef"></path><g><path d="M86,154.08333c-37.44583,0 -68.08333,-30.6375 -68.08333,-68.08333c0,-37.44583 30.6375,-68.08333 68.08333,-68.08333c37.44583,0 68.08333,30.6375 68.08333,68.08333c0,37.44583 -30.6375,68.08333 -68.08333,68.08333zM86,28.66667c-31.53333,0 -57.33333,25.8 -57.33333,57.33333c0,31.53333 25.8,57.33333 57.33333,57.33333c31.53333,0 57.33333,-25.8 57.33333,-57.33333c0,-31.53333 -25.8,-57.33333 -57.33333,-57.33333z" fill="#198754"></path><path d="M86,129c-23.71092,0 -43,-19.28908 -43,-43c0,-23.71092 19.28908,-43 43,-43c23.71092,0 43,19.28908 43,43c0,23.71092 -19.28908,43 -43,43zM86,50.16667c-19.7585,0 -35.83333,16.07483 -35.83333,35.83333c0,19.7585 16.07483,35.83333 35.83333,35.83333c19.7585,0 35.83333,-16.07483 35.83333,-35.83333c0,-19.7585 -16.07483,-35.83333 -35.83333,-35.83333z" fill="#198754"></path><rect x="23" y="13" transform="scale(3.58333,3.58333)" width="2" height="22" fill="#198754"></rect><rect x="13" y="23" transform="scale(3.58333,3.58333)" width="22" height="2" fill="#198754"></rect><rect x="22" y="3" transform="scale(3.58333,3.58333)" width="4" height="13" fill="#37474f"></rect><rect x="22" y="32" transform="scale(3.58333,3.58333)" width="4" height="13" fill="#37474f"></rect><rect x="32" y="22" transform="scale(3.58333,3.58333)" width="13" height="4" fill="#37474f"></rect><rect x="3" y="22" transform="scale(3.58333,3.58333)" width="13" height="4" fill="#37474f"></rect></g></g></svg>Project Scope Management</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
width="20" height="20"
viewBox="0 0 172 172"
style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="#e9ecef"></path><g fill="#198754"><path d="M48.16,0c-6.57094,0 -12.92687,1.10188 -18.92,3.73563c-1.15562,0.45687 -1.97531,1.51844 -2.12312,2.76812c-0.16125,1.24969 0.37625,2.4725 1.3975,3.19813c1.00781,0.73906 2.35156,0.86 3.48031,0.3225c5.01219,-2.19031 10.36031,-3.14438 16.16531,-3.14438c22.92438,0 41.28,18.35563 41.28,41.28c0,22.92438 -18.35562,41.28 -41.28,41.28c-22.92437,0 -41.28,-18.35562 -41.28,-41.28c0,-10.45437 4.00438,-19.80687 10.32,-27.22437v8.98969c-0.01344,1.23625 0.63156,2.39187 1.70656,3.02344c1.075,0.61813 2.39187,0.61813 3.46687,0c1.075,-0.63156 1.72,-1.78719 1.70656,-3.02344v-19.60531h-19.60531c-1.23625,-0.01344 -2.39187,0.63156 -3.02344,1.70656c-0.61812,1.075 -0.61812,2.39187 0,3.46687c0.63156,1.075 1.78719,1.72 3.02344,1.70656h6.85313c-6.90688,8.42531 -11.32781,19.10813 -11.32781,30.96c0,26.61969 21.54031,48.16 48.16,48.16c26.61969,0 48.16,-21.54031 48.16,-48.16c0,-26.61969 -21.54031,-48.16 -48.16,-48.16zM130.72,0c-3.7625,0 -6.88,3.1175 -6.88,6.88v6.88h-32.7875c1.74688,2.16344 3.30563,4.47469 4.70313,6.88h28.08437v6.88c0,3.7625 3.1175,6.88 6.88,6.88h6.88c3.7625,0 6.88,-3.1175 6.88,-6.88v-6.88h17.2v24.08h-58.65469c0.06719,1.14219 0.17469,2.27094 0.17469,3.44c0,1.16906 -0.1075,2.29781 -0.17469,3.44h58.65469v106.64h-144.48v-64.6075c-2.45906,-1.67969 -4.73,-3.57437 -6.88,-5.60344v70.21094c0,3.99094 2.88906,6.88 6.88,6.88h144.48c3.99094,0 6.88,-2.88906 6.88,-6.88v-137.6c0,-3.99094 -2.88906,-6.88 -6.88,-6.88h-17.2v-6.88c0,-3.7625 -3.1175,-6.88 -6.88,-6.88zM130.72,6.88h6.88v20.64h-6.88zM48.10625,17.14625c-1.89469,0.04031 -3.41312,1.59906 -3.38625,3.49375v26.96906c-0.1075,0.73906 0.01344,1.49156 0.37625,2.15c0.30906,0.61812 0.80625,1.12875 1.41094,1.46469l13.35688,10.01094c1.51844,1.14219 3.66844,0.83313 4.81062,-0.69875c1.14219,-1.51844 0.83313,-3.66844 -0.69875,-4.81062l-12.37594,-9.28531v-25.8c0.01344,-0.92719 -0.34937,-1.8275 -1.00781,-2.48594c-0.65844,-0.65844 -1.55875,-1.02125 -2.48594,-1.00781zM100.405,65.36c-0.77937,2.37844 -1.74687,4.66281 -2.83531,6.88h12.51031v17.2h-24.08v24.08h-17.2v-14.36469c-2.21719,0.90031 -4.52844,1.62594 -6.88,2.23062v12.13406h-17.2v-10.49469c-2.33812,-0.14781 -4.63594,-0.40313 -6.88,-0.83313v42.28781h103.2v-79.12zM116.96,72.24h17.2v17.2h-17.2zM92.88,96.32h17.2v17.2h-17.2zM116.96,96.32h17.2v17.2h-17.2zM44.72,120.4h17.2v17.2h-17.2zM68.8,120.4h17.2v17.2h-17.2zM92.88,120.4h17.2v17.2h-17.2zM116.96,120.4h17.2v17.2h-17.2z"></path></g></g></svg>Project Schedule Management</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Project Cost Management</a></li>
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
            <li><a class="dropdown-item" href="#">Project Stakeholders Management</a></li>
      
 -->

</ul>
    


</div><!--col-md-4-->

<div class='col-md-9 align-self-start'>
    <form class='form mt-2 ' action='' method='post' enctype='multipart/form-data'  onsubmit='return validate_file()'>
    <div class='row shadow bg-body p-3 '>
        <div class='col-12 text-muted h3 fw-bold'>
                Add Members
          </div>

          <div class='col-md-6'>
   
              <label class='form-label text-muted fw-bold'>first name</label>
              <input type='text' class='form-control' required  name='f_name' data-validate-field='title' placeholder='enter your first name'> 

          </div>
          <div class='col-md-6'>
          <label class='form-label text-muted fw-bold'>last name</label>
              <input type='text' class='form-control' required  name='l_name' data-validate-field='title' placeholder='enter your last name'> 

                    </div>
                  
        
                
          <div class='col-md-6 mt-2'>
          <label class='form-label text-muted fw-bold'>Registration No</label>
              <input type='text' class='form-control' required  name='reg' data-validate-field='title' placeholder='enter your registration no'> 

          <label class='form-label text-muted fw-bold'>Designation</label>
             <select  class='form-select' required name='designation' data-validate-field='category'>
               <option value=''>select</option>
                 <option value='BS'>BS</option>
                 <option value='MS'>MS</option>
             </select>
           
             <label class='form-label text-muted fw-bold'>Specilality</label>
             <select  class='form-select' required name='specilality' >
               <option value=''>select</option>
                 <option value='Mobile app Development'>Mobile app Development</option>
                 <option value='Web Development'>Web development</option>
             </select>

           </div>
           <div class='col-md-6 text-center img mt-2'>
           <label class='form-label ms-auto text-muted fw-bold lab1'>Upload image</label><br>
               <label class='form-label lab1' for='upload'>
                   <img src='web_material/upload.png'>
                </label>
                <input type='file'  class='file d-none' name='file'  id='upload'>
                <div class='error text-danger'>please uplaod file</div>

    </div>
          <div class='col-12 mt-2'>
           <div class='row justify-content-start'>
             <div class='col-md-4 '>
       <label class='form-label text-muted fw-bold'>how many language you know?</label>

    </div>
    <div class='col-2'>
      <input type='text' class='form-control' id='keypress'>
    </div>
    </div>     
        </div>

           <div class='col-12 mt-2 '>
             <div class='row languages justify-content-start'>
</div>
          


           </div>
           

           <!-- <div class='col-12  mt-2'>
               <div class='row justify-content-start'>
                   <div class='col-4 d-inline-flex '>
                       <div class='form-label fw-bold text-muted'>Memebers</div>
                       <input class='form-control ms-1 ' id='keypress'>
                       

                     </div>

                     <div class='col-12'>
                         <div class='row members'>

                                </div>


                     </div>
                    
             </div>

           </div> -->
           <div class='col-12 mt-2 text-end'>
                         <button class='btn btn-outline-success ' name='add'>add</button>
                      </div>





    </div><!--row end-->
</form>

    
</div><!--col-md-9-->

                           <!-------------------------ALERT START----------------->

                           <?php 
                           if(isset($status)){
                           if($status=='success'){
    ?>

                           <div class="alert alert-success " role="alert">
  <div class='text-center'>
    Project  Successfully Created   </div>
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
    <script src='js/just-validate.js'></script>
    <script>
        $(document).ready(function(){
          
            $("#upload").on("change",function(){
    var img=document.getElementById("upload");
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
   $(".img").fadeIn("slow").append("<img src='"+tmppath+"' class='img-thumbnail' style='width:80%; height:400px'>");
   }

});//#upload end


$("#keypress").keyup(function(){
              console.log("helo");
                $(".languages").empty();
                var count=$(this).val();
                
                for(let i=1;i<=count;i++){
                    
                    $(".languages").append("<div class='col-md-4 mt-2 ' style='position:relative'><select name='languages[]' class='form-select' required>"+
                                             "<option value=''>select</option>"+
                                             "<option value='JAVA'>JAVA</option>"+
                                             "<option value='PHP'>PHP</option>"+
                                             "<option value='KOTLIN'>KOTLIN</option></select>"+
                                             "<div class='cross_btn'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-x-circle' viewBox='0 0 16 16'>"+
"  <path d='M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z'/>"+
  "<path d='M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z'/>"+
"</svg>"+
                                                 " </div></div>");
                }//for end

            });

        // });

       
        $(document).on("click",".cross_btn",function() {
        
          $(this).parent().slideUp();


});


          
         });
        </script>
        <script>
        function validate_file(){
          var file=document.getElementById("upload");
          if(file.files.length==0){
            $(".error").slideDown();

return false;

          }
console.log(file.files.length);
    
     console.log(file.files);
   var s=  file.files[0].name;
  // console.log(s);
 // return false;
   var h=s.split(".");
   

  //  console.log(h[1]);
console.log(file.files[0].name);
     console.log(file.files[0].type);

     if(h[h.length-1]=="jpg"||h[h.length-1]=="png"||h[h.length-1]=="jpeg"){
       return true;
     }
else{
  $(".error").text("uplaod file must in jpg,png or jpeg format");
     $(".error").slideDown();

     return false;
    }

          
        }


// var file=document.getElementById("file");
// console.log(file);
// file.addEventListener("change",upload);
// function upload(){
//     console.log("runing stage");
// }

</script> 

</body>
</html>