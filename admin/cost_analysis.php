
<?php
include("session/check_session.php");
include("connection/connection.php");
$id=$_GET['p_id'];


if(isset($_REQUEST['n_id'])){
  $n_id=$_REQUEST['n_id'];
$query="update notifications set status='seen' where p_id=".$_GET['p_id']." and n_id=".$n_id;

if(mysqli_query($conn,$query)){
 
}
}

$query="select * from projects where p_id=".$id;
$project=mysqli_query($conn,$query);
$pro=mysqli_fetch_assoc($project);

  //assign member
  $query="select members.m_id,f_name from assign_projects,members where p_id=".$id." and members.m_id=assign_projects.m_id";
//echo $query;
  $assign=mysqli_query($conn,$query);


  //module query
  $query="select mod_id,subject from module where p_id=".$id;

  //echo $query;

  $module=mysqli_query($conn,$query);
  //echo mysqli_num_rows($fetch);

  $query="select cost.create_id as crt_id,c_id,f_name,subject,cost.description,name,price,cost.date as date,cost.mod_id as mod_id from cost,module,members where cost.p_id=".$id." and cost.m_id=members.m_id and module.mod_id=cost.mod_id";


  $fetch=mysqli_query($conn,$query);

  $price=NULL;


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
            <li><a class="dropdown-item active" href="cost_analysis.php?p_id=<?php echo $id;?>">Cost analysis</a></li>
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
            <li><a class="dropdown-item " href="work_packages.php?p_id=<?php echo $id;?>">Work packages</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item active" href="cost_analysis.php?p_id=<?php echo $id;?>">Cost analysis</a></li>
            <li><hr class="dropdown-divider"></li>
            <!--<li><a class="dropdown-item" href="view_member.php">View Members</a></li> -->
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
          Cost Analysis
          </div>
          <div class='col-12 text-muted  fw-bold mt-2 '>
            <span class='text-dark'>Project Name:</span><span><?php echo $pro['p_title']; ?>        </div>
           
            <div class='col-12 text-muted  fw-bold mt-2 '>
            <span class='text-dark'>Total Cost:</span><span> <?php 
           if(mysqli_num_rows($fetch)>0){
             $price=0;
           while($fet=mysqli_fetch_assoc($fetch)){
            $integer = (int)$fet['price'];
            $price+=$integer;
             
           }} echo $price;?>  /-    </div>

            <div class='col-12 mt-2'>
         <div class=' text-end'>
  
  <button onclick="exportData()" class=' btn-outline-success border border-0'>
      <!-- <span class="glyphicon glyphicon-download"></span> -->
      Export  XLS
  </button>
            </div>

            <div class='col-12'>
        
         <div class="table-responsive mt-2">
<table id="userTable" class=' table table-hover '>
        <thead>
            <th>ID</th>
            <th>Name</th>
            <th>description</th>
            <th>price</th>
            <th>date</th>
           
        </thead>
        <tbody>
           <?php 
           
  $fetch=mysqli_query($conn,$query);
           if(mysqli_num_rows($fetch)>0){
           while($fet=mysqli_fetch_assoc($fetch)){?>
           <tr>
             <td><a href='c_detail.php?p_id=<?php echo $pro['p_id']?>&&mod_id=<?php echo $fet['mod_id'];?>' class='text-decoration-none text-dark'><?php echo $fet['c_id'];?></a></td>
             <td><?php echo $fet['name'];?></td>
             <td><?php echo substr($fet['description'],0,50);?></td>
             <td><?php echo $fet['price']."/-";?></td>
             <td><?php echo date("d-M-Y", strtotime( $fet['date']));?></td>

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
            
            $('#userTable').DataTable();
         });

            
function exportData(){
  
  /* Get the HTML data using Element by Id */
  var table = document.getElementById("userTable");

  /* Declaring array variable */
  var rows =[];

    // iterate through rows of table
  for(var i=0,row; row = table.rows[i];i++){
      //rows would be accessed using the "row" variable assigned in the for loop
      //Get each cell value/column from the row
      column1 = row.cells[0].innerText;
      column2 = row.cells[1].innerText;
      column3 = row.cells[2].innerText;
      column4 = row.cells[3].innerText;
      column5 = row.cells[4].innerText;

  /* add a new records in the array */
      rows.push(
          [
              column1,
              column2,
              column3,
              column4,
              column5
          ]
          
      );
      break;

      }
<?php   $fetch=mysqli_query($conn,$query); 
           if(mysqli_num_rows($fetch)>0){
               while($fet=mysqli_fetch_assoc($fetch))
               {
                   ?>
                column1 = '<?php echo $fet['c_id'];?>';
                column2 = '<?php echo $fet['name'];?>';
                column3 = '<?php echo $fet['description'];?>';
                column4 = '<?php echo $fet['price'];?>';
                column5 ='<?php echo date("d-M-Y", strtotime( $fet['date']));?>';

                rows.push(
          [
              column1,
              column2,
              column3,
              column4,
              column5
          ]
          
      );

             <?php  }?>
             column1=column2=column5='';

             column3 = "total cost";
                column4 ='<?php echo $price;?>';
                rows.push(
          [
              column1,
              column2,
              column3,
              column4,
              column5
          ]
          
      );

         <?php  }
           ?>
      csvContent = "data:text/csv;charset=utf-8,";
       /* add the column delimiter as comma(,) and each row splitted by new line character (\n) */
      rows.forEach(function(rowArray){
          row = rowArray.join(",");
          csvContent += row + "\r\n";
      });

      /* create a hidden <a> DOM node and set its download attribute */
      var encodedUri = encodeURI(csvContent);
      var link = document.createElement("a");
      link.setAttribute("href", encodedUri);
      link.setAttribute("download", "<?php echo $pro['p_title']."cost report.csv"; ?>");
      document.body.appendChild(link);
       /* download the data file named "Stock_Price_Report.csv" */
      link.click();
}
      
    </script>

</body>
</html>