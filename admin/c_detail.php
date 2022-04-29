
<?php
include("session/check_session.php");
include("connection/connection.php");
$id=$_GET['p_id'];
$query="select * from projects where p_id=".$_GET['p_id'];
$result=mysqli_query($conn,$query);

if(isset($_REQUEST['n_id'])){
  $n_id=$_REQUEST['n_id'];
$query="update notifications set status='seen' where p_id=".$_GET['p_id']." and n_id=".$n_id;

if(mysqli_query($conn,$query)){
 
}
}

$query="select * from projects where p_id=".$id;
$project=mysqli_query($conn,$query);
$pro=mysqli_fetch_assoc($project);


$mod_id=$_REQUEST['mod_id'];

$query="select m_file_path,f_name,mod_id,subject,type,status,priority,module.date from module,members where p_id=".$id." and m_id=assign_id and mod_id=".$mod_id;

$mod_detail=mysqli_query($conn,$query);

$mod=mysqli_fetch_assoc($mod_detail);



$query="select * from schedule where m_id=".$mod_id;
$schedule_detail=mysqli_query($conn,$query);

$sch=mysqli_fetch_assoc($schedule_detail);

  
$query="select * from Cost where mod_id=".$mod_id;
$cost_detail=mysqli_query($conn,$query);

//$cost=NULL;

if(mysqli_num_rows($cost_detail)>0){
  $cost=mysqli_fetch_assoc($cost_detail);
    
}



function dateDifference($start_date, $end_date)
{
    // calulating the difference in timestamps 
    $diff = strtotime($start_date) - strtotime($end_date);
     
    // 1 day = 24 hours 
    // 24 * 60 * 60 = 86400 seconds
    return ceil(abs($diff / 86400));
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

    <title>ViewProjects-plcm</title>
    <link rel='stylesheet' href='css/style.css'>
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css"/>
  </head>
  <body>

  <div class='container-fluid p-0 responsive'>

  <!---------------------------navbar----------------------->
  <nav class="navbar navbar-expand-md navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="#">PLCM</a>
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
            <li><a class="dropdown-item " href="work_packages.php?p_id=<?php echo $id;?>">Work packages</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="cost_analysis.php?p_id=<?php echo $id;?>">Cost analysis</a></li>
            <li><hr class="dropdown-divider"></li>
            <!-- <li><a class="dropdown-item" href="add_member.php">Add Members</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="view_member.php">View Members</a></li> -->
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
      <form class="d-flex">
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
  <div class='row m-0  mt-4 ' >

  <div class='col-md-3 d-none d-md-block align-self-start'>

  <ul class='menu '>
      
  <li><a class="dropdown-item " href="detail_project.php?p_id=<?php echo $id;?>">Project detail</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item " href="work_packages.php?p_id=<?php echo $id;?>">Work packages</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="cost_analysis.php?p_id=<?php echo $id;?>">Cost analysis</a></li>
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

<div class='col-md-9 align-self-start bg-light pb-4  '>
    <div class='row'>
             
    <div class='col-12 text-muted h3 fw-bold'>
           <?php echo $pro['p_title'] ?>
          </div>
         
         
          <div class='col-12'> 
              <div class='row'>
          <div class='col-12 border border-start-0 border-end-0 border-top-0 border border-success p-0 mt-4'><span class="bg-success px-5 text-light fw-bold mt-1 d-inline-block">Module</span></div>

          <div class='col-12 mt-1'> <span class='text-dark fw-bold'>Name:</span><span class='text-secondary fw-bold'><?php echo $mod['subject']; ?></span></div>
         
          <div class='col-12 mt-1'> <span class='text-dark fw-bold'>Assigned:</span><span class='text-secondary fw-bold transform-capitilize'><?php echo $mod['f_name']; ?></span></div>
          <div class='col-12 mt-1'> <span class='text-dark fw-bold'>Priority:</span><span class='text-secondary fw-bold'><?php echo $mod['priority']; ?></span></div>
        
          <div class='col-12 mt-1'> <span class='text-dark fw-bold'>Status:</span><span class='text-secondary fw-bold'><?php echo $mod['status']; ?></span></div>
         <?php if($mod['m_file_path']!=NULL){?>
          <div class='col-12 mt-1'><a href='<?php echo$mod['m_file_path'];?>' download>download</a></div>  <?php } ?>
          </div><!--row-->
          </div>


          <div class='col-12 mt-2'> 
              <div class='row'>
          <div class='col-12 border border-start-0 border-end-0 border-top-0 border border-success p-0 mt-4'><span class="bg-success px-5 text-light fw-bold mt-1 d-inline-block">Schedule</span></div>

          <div class='col-12 mt-1'> <span class='text-dark fw-bold'>Start Date:</span><span class='text-secondary fw-bold'><?php echo ($sch['s_date']!=NULL)?  date("d-M-Y", strtotime( $sch['s_date'])):'-' ?></span></div>
         
          <div class='col-12 mt-1'> <span class='text-dark fw-bold'>End Date:</span><span class='text-secondary fw-bold transform-capitilize'><?php  echo ($sch['e_date']!=NULL)?  date("d-M-Y", strtotime( $sch['e_date'])):'-' ?></span></div>
          <!-- <div class='col-12 mt-1'> <span class='text-dark fw-bold'>Estimated time:</span><span class='text-secondary fw-bold'><?php if($sch['e_date']!=NULL) {
             
                                                                                                                        

                                                                                                                        echo dateDifference($sch['s_date'],$sch['e_date'])." Days ";                                                                                                    
                                                     
          }
 else{echo"-";} ?></span></div> -->


<div class='col-12 mt-1'> <span class='text-dark fw-bold'>Spend time:</span><span class='text-secondary fw-bold'><?php if($sch['e_date']!=NULL) {
             
                                                                                                                        

             echo dateDifference($sch['s_date'],date("Y-m-d H:i:s"))." Days ";                                                                                                    

}
else{echo"-";} ?></span></div>

<div class='col-12 mt-1'> <span class='text-dark fw-bold'>Remaining time:</span><span class='text-secondary fw-bold'><?php if($sch['e_date']!=NULL) {
             
                                                                                                                        

             echo dateDifference(date("Y-m-d H:i:s"),$sch['e_date'])." Days Left";                                                                                                    

}
else{echo"-";} ?></span></div>
        
           </div><!--row-->
          </div>



          <div class='col-12' id="cost"> 
              <div class='row'>
          <div class='col-12 border border-start-0 border-end-0 border-top-0 border border-success p-0 mt-4'><span class="bg-success px-5 text-light fw-bold mt-1 d-inline-block">Cost</span></div>

          <div class='col-12 mt-1'> <span class='text-dark fw-bold'>Name:</span><span class='text-secondary fw-bold'><?php echo (mysqli_num_rows($cost_detail)>0)?$cost['name']:'-'; ?></span></div>
         
          <div class='col-12 mt-1'> <span class='text-dark fw-bold'>Price:</span><span class='text-secondary fw-bold transform-capitilize'><?php echo (mysqli_num_rows($cost_detail)>0)? $cost['price']:"-"; ?></span></div>
          <div class='col-12 mt-1'> <span class='text-dark fw-bold'>description:</span><span class='text-secondary fw-bold'><?php echo (mysqli_num_rows($cost_detail)>0)? $cost['description']:"-"; ?></span></div>
        
           </div><!--row-->
          </div>

   
</div>
</div><!--col-md-9-->


</div><!--row-->

</section>


                 <!------------------content end------------------->


</div><!--container-fluid-->

  <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
    <script>
         $(document).ready(function(){
            
            $('#userTable').DataTable();
         });
      
    </script>

</body>
</html>