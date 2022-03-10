<?php
session_start();
include_once("../../connection/connection.php");
$output=null;
if(isset($_REQUEST['title'])){
    
    $title=$_REQUEST['title'];
   // $limit=6*$id;
    
    $query="select * from projects where p_title='".$title."' order by p_id desc limit 6";
    $result=mysqli_query($conn,$query);
if(mysqli_num_rows($result)>0){
    while($row=mysqli_fetch_assoc($result)){
    
    $output.="<div class='col-md-4 mt-2 mt-md-0 align-self-start '>
        
    <div class='card text-dark bg-light mb-3' >
               <div class='card-header d-flex'>Project id:".$row['p_id']. 
             " <div class='dropdown ms-auto'>
  <button class='btn btn-body dropdown-toggle btn_option' type='button' id='dropdownMenu2' data-bs-toggle='dropdown' aria-expanded='false'>
    
  </button>
  <ul class='dropdown-menu' aria-labelledby='dropdownMenu2'>
    <li><a  href='edit_detail.php?id= ".$row['p_id']."' class='dropdown-item'  type='button'>Edit</a></li>
    <li><button class='dropdown-item delete' data-id=".$row['p_id']." type='button'>Delete</button></li>

  </ul>
</div>
                 
  </div>

               
          <div class='card-body'>
  
          <h5 class='card-title'>".$row['p_title']."</h5>
          <p class='text-body'>"

  .substr($row['p_problem'],0,200)."...."."
    
  
  
    </P>".
    
    "<a href='detail_project.php?p_id=". $row['p_id']."'  class='btn btn-outline-success '>read more</a>
     </div><!--card-body-->
        </div><!--card-->

    </div><!--col-md-4-->";
    }

    $query="select * from projects where p_title='".$title."' order by p_id desc ";
    $limit=mysqli_query($conn,$query);

    $output.=" <div class='col-12 '>
    <nav aria-label='...'>
    <ul class='pagination pagination-sm justify-content-center'>";
 if(mysqli_num_rows($limit)>6){
  
       $pag=ceil(mysqli_num_rows($limit)/6);
      for($i=0; $i<$pag;$i++){
          $g=$i;
          $g++;
   
   
   $output.=" <li class='page-item'><button class='page-link text-success geek search_index'   data-limit=". $i.">".$g."</button></li>";
    
  
      }
      $output.="
      </ul>
      </nav>";
   }
}
else{
    $output="<div class='text-center text-dark '>empty search</div>";
}
}




echo $output;


?>