<?php
session_start();
include_once("../../connection/connection.php");
$output=null;
if(isset($_REQUEST['id'])){
    
    $id=$_REQUEST['id'];
    $limit=6*$id;
    
    $query="select * from members  order by m_id desc limit ".$limit.",6";
    $result=mysqli_query($conn,$query);

    while($row=mysqli_fetch_assoc($result)){
    
    $output.="<div class='col-md-4 mt-2 mt-md-0 align-self-start '>
        
    <div class='card text-dark bg-light mb-3' >
               <div class='card-header d-flex'>member id:".$row['m_id']. 
             " <div class='dropdown ms-auto'>
  <button class='btn btn-body dropdown-toggle btn_option' type='button' id='dropdownMenu2' data-bs-toggle='dropdown' aria-expanded='false'>
    
  </button>
  <ul class='dropdown-menu' aria-labelledby='dropdownMenu2'>
  <li><a  href='assign.php?id=" .$row['m_id']."' class='dropdown-item '  type='button'>Assign</a></li>
    <li><a  href='edit_member.php?id= ".$row['m_id']."' class='dropdown-item'  type='button'>Edit</a></li>
    <li><button class='dropdown-item delete' data-id=".$row['m_id']." type='button'>Delete</button></li>

  </ul>
</div>
                 
  </div>

               
          <div class='card-body d-flex flex-column'>
          <img src=' ".$row['img_path']."' style='width:100px;height:100px' class='rounded-circle mx-auto img-thumbnail'>
  
          <h5 class='card-title'>Name:".$row['f_name']." ".$row['l_name']."</h5>
          <p class='text-body'>Specilaity:"

  .$row['speciality']."
    
  
  
    </P>".
    
    "<a href='view_member_detail.php?p_id=". $row['m_id']."'  class='btn btn-outline-success align-self-center'>view profile</a>
     </div><!--card-body-->
        </div><!--card-->

    </div><!--col-md-4-->";
    }

    $query="select * from members  order by m_id desc ";
    $limit=mysqli_query($conn,$query);

    $output.=" <div class='col-12 '>
    <nav aria-label='...'>
    <ul class='pagination pagination-sm justify-content-center'>";
 if(mysqli_num_rows($limit)>6){
  
       $pag=ceil(mysqli_num_rows($limit)/6);
      for($i=0; $i<$pag;$i++){
          $g=$i;
          $g++;
   
   
   $output.=" <li class='page-item'><button class='page-link text-success limit geek'   data-limit=". $i.">".$g."</button></li>";
    
  
      }
      $output.="
      </ul>
      </nav>";
   }
}

echo $output;


?>