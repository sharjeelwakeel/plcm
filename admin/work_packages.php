
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

$query="select members.m_id,f_name from assign_projects,members where p_id=".$id." and members.m_id=assign_projects.m_id";
//echo $query;
$assign=mysqli_query($conn,$query);


$query="select f_name,mod_id,subject,type,status,priority,module.date from module,members where p_id=".$pro['p_id']." and m_id=assign_id";

$fetch=mysqli_query($conn,$query);




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
            <li><a class="dropdown-item active" href="work_packages.php?p_id=<?php echo $id;?>">Work packages</a></li>
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
  <div class='row m-0  mt-md-4'>

  <div class='col-md-3 d-none d-md-block align-self-start'>

  <ul class='menu '>
      
  <li><a class="dropdown-item " href="detail_project.php?p_id=<?php echo $id;?>">Project detail</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item active" href="work_packages.php?p_id=<?php echo $id;?>">Work packages</a></li>
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
             <td><?php echo $fet['status'];?></td>
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
            
          $('#userTable').DataTable({
      "bSort" : false
    });
         });
      
    </script>

</body>
</html>