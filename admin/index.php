<?php
include("session/check_session.php");
include("connection/connection.php");
$query="select * from projects where a_id=".$_SESSION['id']." order by p_id desc limit 6 ";
$result=mysqli_query($conn,$query);

$query="select * from projects where a_id=".$_SESSION['id']." order by p_id desc ";
$limit=mysqli_query($conn,$query);

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
            
  <li><a class="dropdown-item active" href="#">View Projects</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="create_project.php">Create Project</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="add_member.php">Add Members</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="view_member.php">View Members</a></li>
            <li><hr class="dropdown-divider"></li>
            <!-- <li><a class="dropdown-item" href="#">Assign Role</a></li> -->
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
      <div class="d-flex">
        <input class="form-control me-2" type="search" placeholder="search with title" id='inp_search' aria-label="Search">
        <button class="btn btn-outline-success btn_search" type="button">Search</button>
</div>
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
      
  <li><a class="dropdown-item active" href="index.php">View Projects</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="create_project.php">Create Project</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="add_member.php">Add Members</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="view_member.php">View Members</a></li>
            
            <!-- <li><a class="dropdown-item" href="#">Assign Role</a></li> -->
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

<div class='col-md-9 align-self-start'>
    <div class='row append'>
<?php if(mysqli_num_rows($result)>0){ 
  while($row=mysqli_fetch_assoc($result)){
  ?>
    <div class='col-md-4 mt-2 mt-md-0 align-self-start '>
        
    <div class="card text-dark bg-light mb-3" >
               <div class="card-header d-flex">Project id:<?php echo $row['p_id']; ?>
               <div class="dropdown ms-auto">
  <button class="btn btn-body dropdown-toggle btn_option" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
    
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
    <li><a  href="edit_detail.php?id=<?php echo $row['p_id']; ?>" class="dropdown-item "  type="button">Edit</a></li>
    <li><button class="dropdown-item delete" data-id=<?php echo $row['p_id'];?> type="button">Delete</button></li>

  </ul>
</div>
                 
  </div>

               
          <div class="card-body">
  
          <h5 class="card-title"><?php echo$row['p_title']; ?></h5>
          <p class='text-body'>
  <?php 
  
    // $str= base64_decode($row['p_description']); 
    // echo $str;
echo substr($row['p_problem'],0,200)."....";
    
  
    ?> 
    </P>
    
    <a href='detail_project.php?p_id=<?php echo $row['p_id'];?>' class='btn btn-outline-success '>read more</a>
     </div><!--card-body-->
        </div><!--card-->

    </div><!--col-md-4-->
  
<?php }
} ?>

<?php if(mysqli_num_rows($limit)>6){?>
  <div class='col-12 '>
  <nav aria-label="...">
  <ul class="pagination pagination-sm justify-content-center">
    <?php $pag=ceil(mysqli_num_rows($limit)/6);
    for($i=0; $i<$pag;$i++){?>
 
 
  <li class="page-item"><button class="page-link text-success limit"  data-limit=<?php echo $i?>><?php  $inc=$i; echo ++$inc;?></button></li>
  

   <?php } ?>
    </ul>
    </nav>
<?php }?>



</div><!--row-->
    

</div><!--col-md-9-->


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

<script>
  $(document).ready(function(){
  
    $(".btn_search").click(function(){
                     var title=$("#inp_search").val();
                    
                     $.ajax({
        url:"php/admin/search_project.php",
        method:"post",
        data:{
          title:title,
        },
       
        success:function(data){
          $(".append").html(data);

        }
      })

    
                     
    });
    $(document).on("click",".search_index",function(e){
      

      var s=$(this).data("limit");
      var title=$("#inp_search").val();
      console.log(s);
      $.ajax({
        url:"php/admin/project_search_pagination.php",
        method:"post",
        data:{
          id:s,
          title:title,
        },
        success:function(data){
          $(".append").html(data);

        }
      })
    })



    $(document).on("click",".delete",function(){
      var s=$(this).data('id');
     var g= $(this).parent().parent().parent().parent().parent().parent();
      
$.ajax({
  method:"POST",
  url:"php/admin/delete.php",
  data:{
    id:s
  },
  success:function(data){
   if(data=='success'){
  
   g.slideUp();

    }

  },
})
      
    })


    $(document).on("click",".limit",function(e){
      

      var s=$(this).data("limit");
      console.log(s);
      $.ajax({
        url:"php/admin/pagination.php",
        method:"post",
        data:{
          id:s,
        },
        success:function(data){
          $(".append").html(data);

        }
      })
    })


    
    


  })
  
    </script>

</body>
</html>