<?php

include("session/check_session.php");
include_once("connection/connection.php");



// date("Y-m-d H:i:s");;



$id=$_SESSION['id'];

$query="select * from projects,category where p_category=c_id ";



$result=mysqli_query($conn,$query);
$arr_users = [];
if(mysqli_num_rows($result)>0){

  $arr_users=mysqli_fetch_all($result,MYSQLI_ASSOC);
}



// include("php/chat_notify_query.php");

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
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
   <!-- <link rel="stylesheet" href="/resources/demos/style.css"> -->
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script> 
  <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css"/>
    
 <style>
  html{
            height: 100%;
        }
        body{
          height:100%;
        }
        </style>
  </head>
  <body>

  <div class='container-fluid p-0 responsivews h-100'>

  <!---------------------------navbar----------------------->
  <nav class="navbar navbar-expand-md navbar-light bg-light">
  <div class="container">
 
  <a class="navbar-brand" href="project.php">PLCM</a>
 
 
  <button class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>


    <div class="collapse navbar-collapse " id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
      
        
        <li class="nav-item dropdown d-block d-md-none ">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Project Modules
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
          <li><a class="dropdown-item text-light fw-bold  " href="project.php">Projects</a></li>
            <li><hr class="dropdown-divider text-light"></li>
            <li><a class="dropdown-item text-light fw-bold" href="members.php">Member</a></li>
            <li><hr class="dropdown-divider text-light"></li>
            <li><a class="dropdown-item text-light fw-bold active" href="add_field.php">Add Field</a></li>
            <li><hr class="dropdown-divider text-light"></li>  </ul>
        </li>
     
       </ul> 



      <div class=' d-flex align-items-center justify-md-content-start justify-content-around'>


      

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

    
           
                 
















                 <!--------------------content start--------------------->
<section class=' bg h-100'>
  <div class='row m-0  align-items-stretch justify-content-start h-100'>

  <div class='col-md-3 d-none d-md-block  bg-success rounded   ' >

  <ul class='menu mt-5'>

  <li><a class="dropdown-item text-light fw-bold  " href="project.php">Projects</a></li>
            <li><hr class="dropdown-divider text-light"></li>
            <li><a class="dropdown-item text-light fw-bold" href="members.php">Member</a></li>
            <li><hr class="dropdown-divider text-light"></li>
            <li><a class="dropdown-item text-light fw-bold active" href="add_field.php">Add Field</a></li>
            <li><hr class="dropdown-divider text-light"></li>
         


</ul>
    


</div><!--col-md-3-->

<div class='col-md-9   bg-body  '>
  
    <div class='row h-auto p-3  justify-content-start'>
    <div class='col-12 text-muted h3 fw-bold align-self-start '>
                 Add fields
          </div>
          <div class='col-12'>    <ul class="nav nav-tabs">
  <li class="nav-item">
  <a class="nav-link triger link-success active" type="button"  data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        Designation
      </a>
  </li>
  <li class="nav-item">
  <a class="nav-link triger link-success" type="button"  data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseOne">
        Speciality
      </a>

  </li>
  <li class="nav-item">
  <a class="nav-link triger link-success" type="button"  data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseOne">
        category
      </a>
</li>
  <li class="nav-item">
  <a class="nav-link triger link-success" type="button"  data-bs-toggle="collapse" data-bs-target="#collapseFourth" aria-expanded="true" aria-controls="collapseOne">
        Languages
      </a>

  </li>

  <li class="nav-item">
  <a class="nav-link triger link-success" type="button"  data-bs-toggle="collapse" data-bs-target="#collapseFifth" aria-expanded="true" aria-controls="collapseOne">
        Database
      </a>

  </li>

  <li class="nav-item">
  <a class="nav-link triger link-success" type="button"  data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="true" aria-controls="collapseOne">
        Browser/device
      </a>

  </li>

  <li class="nav-item">
  <a class="nav-link triger link-success" type="button"  data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="true" aria-controls="collapseOne">
        CPU
      </a>

  </li>

  <li class="nav-item">
  <a class="nav-link triger link-success" type="button"  data-bs-toggle="collapse" data-bs-target="#collapseEight" aria-expanded="true" aria-controls="collapseOne">
        Operating System
      </a>

  </li>
</ul>
<div class="accordion" id="accordionExample">



<div class="accordion-item">
    <h2 class="accordion-header" id="headingOne">

    
    </h2>
    <div id="collapseEight" class="accordion-collapse collapse " aria-labelledby="headingOne" data-bs-parent="#accordionExample">
      <div class="accordion-body">
      <div class="table-responsive">

      <button type="button" class="btn btn-success btn-sm model-button" data-table="operating_system" data-action="add" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Add Operating System
</button>
<table id="userTable8" class=' table table-hover '>
        <thead>
            <th>S.NO</th>
          
            <th>Operating System</th>
            <!-- <th>Specilality</th> -->
            <th>Action</th>
        </thead>
        <tbody>
     <?php $query="select * from operating_system";
     $desig=mysqli_query($conn,$query);
     if(mysqli_num_rows($desig)>0){
         while($dp=mysqli_fetch_assoc($desig)){ ?>
<tr>
<td><?php echo $dp['o_id']; ?></td>
<td><?php echo $dp['name']; ?></td>
<td>
    
<button type="button" class="btn btn-success btn-sm update" data-table="operating_system" data-name="<?php echo $dp['name']; ?>" data-id="<?php echo$dp['o_id'];?>" data-action="update" data-bs-toggle="modal" data-bs-target="#updatemodal">
  update
</button>
<button class="btn btn-sm btn-success delete" data-id="<?php echo$dp['o_id'];?>" data-table='operating_system' type='button'>delete</button>
</td>
</tr>

            <?php
         }
     }
     ?>
       </tbody>
    </table>
    

                </div><!--table_responsive-->


    </div>
    </div>
  </div>
 

  
<div class="accordion-item">
    <h2 class="accordion-header" id="headingOne">

    
    </h2>
    <div id="collapseSeven" class="accordion-collapse collapse " aria-labelledby="headingOne" data-bs-parent="#accordionExample">
      <div class="accordion-body">
      <div class="table-responsive">

      <button type="button" class="btn btn-success btn-sm model-button" data-table="cpu" data-action="add" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Add CPU
</button>
<table id="userTable7" class=' table table-hover '>
        <thead>
            <th>S.NO</th>
          
            <th>CPU</th>
            <!-- <th>Specilality</th> -->
            <th>Action</th>
        </thead>
        <tbody>
     <?php $query="select * from cpu";
     $desig=mysqli_query($conn,$query);
     if(mysqli_num_rows($desig)>0){
         while($dp=mysqli_fetch_assoc($desig)){ ?>
<tr>
<td><?php echo $dp['c_id']; ?></td>
<td><?php echo $dp['name']; ?></td>
<td>
    
<button type="button" class="btn btn-success btn-sm update" data-table="cpu" data-name="<?php echo $dp['name']; ?>" data-id="<?php echo$dp['c_id'];?>" data-action="update" data-bs-toggle="modal" data-bs-target="#updatemodal">
  update
</button>
<button class="btn btn-sm btn-success delete" data-id="<?php echo$dp['c_id'];?>" data-table='cpu' type='button'>delete</button>
</td>
</tr>

            <?php
         }
     }
     ?>
       </tbody>
    </table>
    

                </div><!--table_responsive-->


    </div>
    </div>
  </div>
 







<div class="accordion-item">
    <h2 class="accordion-header" id="headingOne">

    
    </h2>
    <div id="collapseSix" class="accordion-collapse collapse " aria-labelledby="headingOne" data-bs-parent="#accordionExample">
      <div class="accordion-body">
      <div class="table-responsive">

      <button type="button" class="btn btn-success btn-sm model-button" data-table="browser" data-action="add" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Add Browser/device
</button>
<table id="userTable6" class=' table table-hover '>
        <thead>
            <th>S.NO</th>
          
            <th>Browser/Device</th>
            <!-- <th>Specilality</th> -->
            <th>Action</th>
        </thead>
        <tbody>
     <?php $query="select * from browser";
     $desig=mysqli_query($conn,$query);
     if(mysqli_num_rows($desig)>0){
         while($dp=mysqli_fetch_assoc($desig)){ ?>
<tr>
<td><?php echo $dp['b_id']; ?></td>
<td><?php echo $dp['name']; ?></td>
<td>
    
<button type="button" class="btn btn-success btn-sm update" data-table="browser" data-name="<?php echo $dp['name']; ?>" data-id="<?php echo$dp['b_id'];?>" data-action="update" data-bs-toggle="modal" data-bs-target="#updatemodal">
  update
</button>
<button class="btn btn-sm btn-success delete" data-id="<?php echo$dp['b_id'];?>" data-table='browser' type='button'>delete</button>
</td>
</tr>

            <?php
         }
     }
     ?>
       </tbody>
    </table>
    

                </div><!--table_responsive-->


    </div>
    </div>
  </div>
 


<div class="accordion-item">
    <h2 class="accordion-header" id="headingOne">

    
    </h2>
    <div id="collapseFifth" class="accordion-collapse collapse " aria-labelledby="headingOne" data-bs-parent="#accordionExample">
      <div class="accordion-body">
      <div class="table-responsive">

      <button type="button" class="btn btn-success btn-sm model-button" data-table="storage" data-action="add" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Add Database
</button>
<table id="userTable5" class=' table table-hover '>
        <thead>
            <th>S.NO</th>
          
            <th>Database</th>
            <!-- <th>Specilality</th> -->
            <th>Action</th>
        </thead>
        <tbody>
     <?php $query="select * from storage";
     $desig=mysqli_query($conn,$query);
     if(mysqli_num_rows($desig)>0){
         while($dp=mysqli_fetch_assoc($desig)){ ?>
<tr>
<td><?php echo $dp['d_id']; ?></td>
<td><?php echo $dp['name']; ?></td>
<td>
    
<button type="button" class="btn btn-success btn-sm update" data-table="storage" data-name="<?php echo $dp['name']; ?>" data-id="<?php echo$dp['d_id'];?>" data-action="update" data-bs-toggle="modal" data-bs-target="#updatemodal">
  update
</button>
<button class="btn btn-sm btn-success delete" data-id="<?php echo$dp['d_id'];?>" data-table='storage' type='button'>delete</button>
</td>
</tr>

            <?php
         }
     }
     ?>
       </tbody>
    </table>
    

                </div><!--table_responsive-->


    </div>
    </div>
  </div>
 

  <div class="accordion-item">
    <h2 class="accordion-header" id="headingOne">

    
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
      <div class="accordion-body">
      <div class="table-responsive">

      <button type="button" class="btn btn-success btn-sm model-button" data-table="designation" data-action="add" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Add Designation
</button>
<table id="userTable" class=' table table-hover '>
        <thead>
            <th>S.NO</th>
          
            <th>Designation</th>
            <!-- <th>Specilality</th> -->
            <th>Action</th>
        </thead>
        <tbody>
     <?php $query="select * from designation";
     $desig=mysqli_query($conn,$query);
     if(mysqli_num_rows($desig)>0){
         while($dp=mysqli_fetch_assoc($desig)){ ?>
<tr>
<td><?php echo $dp['d_id']; ?></td>
<td><?php echo $dp['d_name']; ?></td>
<td>
    
<button type="button" class="btn btn-success btn-sm update" data-table="designation" data-name="<?php echo $dp['d_name']; ?>" data-id="<?php echo$dp['d_id'];?>" data-action="update" data-bs-toggle="modal" data-bs-target="#updatemodal">
  update
</button>
<button class="btn btn-sm btn-success delete" data-id="<?php echo$dp['d_id'];?>" data-table='designation' type='button'>delete</button>
</td>
</tr>

            <?php
         }
     }
     ?>
       </tbody>
    </table>
    

                </div><!--table_responsive-->


    </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingTwo">
 
    </h2>
    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
      <div class="accordion-body">
      <div class="table-responsive">
      <button type="button" class="btn btn-success btn-sm model-button" data-table="speciality" data-action="add" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Add Speciality
</button>
<table id="userTable2" class=' table table-hover '>
        <thead>
            <th>S.NO</th>
          
            <!-- <th>Designation</th> -->
            <th>Specilality</th>
            <th>Action</th>
        </thead>
        <tbody>
     <?php $query="select * from speciality";
     $desig=mysqli_query($conn,$query);
     if(mysqli_num_rows($desig)>0){
         while($dp=mysqli_fetch_assoc($desig)){ ?>
<tr>
<td><?php echo $dp['s_id']; ?></td>
<td><?php echo $dp['s_name']; ?></td>
<td>
    
<button type="button" class="btn btn-success btn-sm update" data-table="speciality" data-name="<?php echo $dp['s_name']; ?>" data-id="<?php echo$dp['s_id'];?>" data-action="update" data-bs-toggle="modal" data-bs-target="#updatemodal">
  update
</button>
<button class="btn btn-sm btn-success delete" type='button' data-id="<?php echo$dp['s_id'];?>" data-table='designation'>delete</button>
</td>
</tr>

            <?php
         }
     }
     ?>
       </tbody>
    </table>
    

                </div><!--table_responsive-->

    </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingThree">
      
    </h2>
    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
      <div class="accordion-body">
    
      <div class="table-responsive">
      <button type="button" class="btn btn-success btn-sm model-button" data-table="category" data-action="add" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Add Category
</button>
<table id="userTable3" class=' table table-hover '>
        <thead>
            <th>S.NO</th>
          
            <th>Category</th>
            <!-- <th>Specilality</th> -->
            <th>Action</th>
        </thead>
        <tbody>
     <?php $query="select * from category";
     $desig=mysqli_query($conn,$query);
     if(mysqli_num_rows($desig)>0){
         while($dp=mysqli_fetch_assoc($desig)){ ?>
<tr>
<td><?php echo $dp['c_id']; ?></td>
<td><?php echo $dp['c_name']; ?></td>
<td>
<button type="button" class="btn btn-success btn-sm update" data-table="category" data-name="<?php echo $dp['c_name']; ?>" data-id="<?php echo$dp['c_id'];?>" data-action="update" data-bs-toggle="modal" data-bs-target="#updatemodal">
  update
</button>
<button class="btn btn-sm btn-success delete" data-id="<?php echo$dp['c_id'];?>" data-table='category' type='button'>delete</button>
</td>
</tr>

            <?php
         }
     }
     ?>
       </tbody>
    </table>
    

                </div><!--table_responsive-->
    </div>
    </div>
  </div>

  <div class="accordion-item">
    <h2 class="accordion-header" id="headingThree">
      
    </h2>
    <div id="collapseFourth" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
      <div class="accordion-body">
   
      <div class="table-responsive">
      <button type="button" class="btn btn-success btn-sm model-button" data-table="technology" data-action="add" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Add Language
</button>
<table id="userTable4" class=' table table-hover '>
        <thead>
            <th>S.NO</th>
          
            <th>Language</th>
            <!-- <th>Specilality</th> -->
            <th>Action</th>
        </thead>
        <tbody>
     <?php $query="select * from technology";
     $desig=mysqli_query($conn,$query);
     if(mysqli_num_rows($desig)>0){
         while($dp=mysqli_fetch_assoc($desig)){ ?>
<tr>
<td><?php echo $dp['t_id']; ?></td>
<td><?php echo $dp['t_name']; ?></td>
<td>
    
<button type="button" class="btn btn-success btn-sm update" data-table="technology" data-name="<?php echo $dp['t_name']; ?>"  data-id="<?php echo$dp['t_id'];?>" data-action="update" data-bs-toggle="modal" data-bs-target="#updatemodal">
  update
</button>
<button class="btn btn-sm btn-success delete" data-id="<?php echo$dp['t_id'];?>" data-table='technology' type='button'>delete</button>
</td>
</tr>

            <?php
         }
     }
     ?>
       </tbody>
    </table>

                </div><!--table_responsive-->
    </div>
    </div>
  </div>
</div>



</div><!--col-12-->

      

</div><!--row-->






<!-- Add Modal -->
<div class="modal fade" id="exampleModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">

<div class="modal-dialog bg-light">
    <div class="modal-content">
  
    <form  method="POST" class='js-form' > 
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Insert</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-end">
        
 
       
        <input class='form-control'placeholder='type here' name='subject' data-validate-field='subject'>

        <button type="button" class="btn btn-secondary btn-sm mt-2" data-bs-dismiss="modal">Close</button>
        <button     class="btn btn-success btn-sm mt-2">Add</button></button>
  
       </div>
      </div>
  
    </div>
    </form>
  </div>

</div>



<!-- Update Modal -->
<div class="modal fade" id="updatemodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">

<div class="modal-dialog bg-light">
    <div class="modal-content">
  
    <form  method="POST" class='js-form-update' > 
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Update</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-end">
        
 
       
        <input class='form-control'placeholder='type here' name='subject' data-validate-field='subject'>

        <button type="button" class="btn btn-secondary btn-sm mt-2" data-bs-dismiss="modal">Close</button>
        <button     class="btn btn-success btn-sm mt-2">update</button></button>
  
       </div>
      </div>
  
    </div>
    </form>
  </div>

</div>


         
    
</div><!--col-md-9-->

                           <!-------------------------ALERT START----------------->

   

                           <div class="alert alert-success d-none" role="alert">
  <div class='text-center'>
    Field Successfully Added   </div>
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
                 <!-- <audio controls muted preload="auto"  class='d-none audio'>
       <source src="media/audio.mp3" type="audio/mp3" />
</audio> -->

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
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
    <script type="text/javascript" src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src='js/just-validate.js'></script>
      <script>
          let table,action,id;
        
        $(document).ready(function(){
          
          $('#userTable').DataTable();
          $('#userTable2').DataTable();
          $('#userTable3').DataTable();
          $('#userTable4').DataTable();
          $('#userTable5').DataTable();
          $('#userTable6').DataTable();
          $('#userTable7').DataTable();
          $('#userTable8').DataTable();


          $(".nav-item .nav-link").click(function(){
              let link=$(".nav-item .triger");
              length=$(".nav-item .triger").length;
              for(let i=0;i<length;i++){
                  $(link[i]).removeClass("active");
              }
              $(this).addClass("active");
              //for()
          })


          $(".model-button").click(function(){
              table=$(this).data("table");
              action=$(this).data("action");
            //  alert("table="+table+"action"+action);

          })

          
  new JustValidate('.js-form', {
    rules: {
  
      subject: {
        required: true,
      
      },
      

  },

    messages: {
      subject: {
        required: 'required*'
      },
      
      
    },

    submitHandler: function (form, values, ajax) {
       



 var formdata = new FormData();
 formdata.append("table", table);
formdata.append("active", action);
formdata.append("data",$("input[name=subject]").val());
     

      $.ajax({
        url: 'php/insert.php',
        method: 'POST',
      data:formdata,
      contentType: false, //this is requireded please see answers above
            processData: false,
    
      
        success: function(response)  {
      console.log(response)
           console.log( String(response)=="success");

            // alert("yes")
        if(response=="success"){
         
                      $(".alert").removeClass("d-none");
                      $(".alert").html("Field Add successfully");
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

        });

        $(".update").click(function(){
            // alert("update");
            let input=$(".js-form-update").find("input[name=subject]");
            console.log(input)
            id=$(this).data("id");
            input.val($(this).data("name"));
            table=$(this).data("table");
              action=$(this).data("action");
        })


              
  new JustValidate('.js-form-update', {
    rules: {
  
      subject: {
        required: true,
      
      },
      

  },

    messages: {
      subject: {
        required: 'required*'
      },
      
      
    },

    submitHandler: function (form, values, ajax) {
       



 var formdata = new FormData();
 formdata.append("table", table);
formdata.append("active", action);
formdata.append("data",$(".js-form-update input[name=subject]").val());
formdata.append("id",id);
     

      $.ajax({
        url: 'php/update.php',
        method: 'POST',
      data:formdata,
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

        


        $(".delete").click(function(){
            let tb=$(this).data('table');
            let id=$(this).data('id');
         

            $.ajax({
                url:"php/delete.php",
                method:"post",
                data:{table:tb,id:id},
                success:function(response){
         
         
         
console.log(String(response)=="success")
                    if(String(response)=="success"){
         
         $(".alert").removeClass("d-none");
         $(".alert").html("Field delete successfully");
         $(".alert").addClass("d-block");
         setTimeout(function() {
           $(".alert").removeClass("d-block");
         $(".alert").addClass("d-none");
     
         location.reload();
         }, 3000);
}

                }
            })
        })
      </script>






</body>
</html>