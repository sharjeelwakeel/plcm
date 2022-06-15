<?php
include("session/check_session.php");
include_once("connection/connection.php");



$s_id=$_SESSION['id'];

//for members
$query="select * from members where m_id!=".$s_id;
$s_projects=mysqli_query($conn,$query);


$query="select * from emails where m_id=".$s_id." order by e_id desc" ;
//echo $query;
$user=NULL;
$emails=mysqli_query($conn,$query);
if(mysqli_num_rows($emails)>0){

  while($em=mysqli_fetch_assoc($emails)){
    

  if($em['crt_id']==14){
      
      $query="select * from admin ";
      $get_admin=mysqli_query($conn,$query);
      $admin_data=mysqli_fetch_assoc($get_admin);
      $name=$admin_data['f_name'];
      $file_path=$admin_data['img_path'];

  }
  else{
      $query="select * from members where m_id=".$em['crt_id'];
      $get_member=mysqli_query($conn,$query);
      $member_data=mysqli_fetch_assoc($get_member);
      $name=$member_data['f_name']." ".$member_data['l_name'];
      $file_path=$member_data['img_path'];
  }


    if($em['status']=='unseen'){
        $status='d-inline-block';
        
    }
    else{
        $status='d-none';
       
    }

    $user.="<tr class=' fw-bold border border-start-0 border-end-0 border-top-0 border-dark get_mail' data-id='".$em['e_id']."' data-m_id='".$em['crt_id']."' style='cursor:pointer;background-color:white!important'><td><a href='see_mail.php?e_id=".$em['e_id']."&&m_id=".$em['crt_id']."' class='d-block text-decoration-none'><div class='text-dark fw-bold text-muted fw-bold '>".$name."<span class='badge ".$status." rounded-pill bg-light text-dark mx-2'>new</span></div></a></td>
   <td> <p class=' e_desc test-dark fw-normal  text-muted'>".substr($em['description'],0,100)."</p></td>
    <td><div class='text-end e_date text-dark fw-normal text-muted'>".date('d/m H:i A',strtotime($em['date']))."</div>
    </td></tr>";
  }


}
else{
  $user="<tr class=' border border-0'><td class='text-light text-center ' colspan='5'>no mail</td></tr> ";

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

            <li><a class="  btn btn-success  btn-outline-light " href="create_mail.php">Create</a></li>  
            <li><hr class="dropdown-divider text-light"></li>
            <li><a class="dropdown-item text-light fw-bold " href="inbox_mail.php">Inbox</a></li>         
              <li><hr class="dropdown-divider text-light"></li>
              <li><a class="dropdown-item text-light fw-bold " href="sent_mail.php">Sent</a></li>         
              <li><hr class="dropdown-divider text-light"></li>
          </ul>
        </li>
     
       </ul> 
      <!-- <form class="d-flex me-2">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form> -->
    
    </div><!--container-->
  </div><!--collapse-->


 

</nav>
                 <!---------------------navbar-------------------->



                 <!--------------------content start--------------------->
<section class=' bg h-100'>
  <div class='row m-0 align-items-stretch justify-content-start h-100 '>

  <div class='col-md-3 d-none d-md-block  bg-success rounded  '>

  <ul class='menu mt-5'>


         
  <li><a class="  btn btn-success  btn-outline-light " href="create_mail.php">Create</a></li>  
            <li><hr class="dropdown-divider text-light"></li>
            <li><a class="dropdown-item text-light fw-bold " href="inbox_mail.php">Inbox</a></li>         
              <li><hr class="dropdown-divider text-light"></li>
              <li><a class="dropdown-item text-light fw-bold " href="sent_mail.php">Sent</a></li>         
              <li><hr class="dropdown-divider text-light"></li>
           
             
 

</ul>
    


</div><!--col-md-4-->

<div class='col-md-9 bg-body'>
<div class='row bg-body h-auto '>
        
         
          <div class='col-12 text-muted h3 fw-bold'>
            Inbox
          </div>

         
         <div class='col-12 '>
        
         <div class="table-responsive mt-2">
<table id="userTable" class=' table table-hover  ' style="border-collapse: separate;">
        <thead>
        <th class='invisible border-0' >name</th>
        <th class='invisible border-0' >description</th>
        <th class='invisible border-0' >date</th>
            
           
        </thead>
        <tbody id='list_profile'>
        <?php echo $user;?>
        </tbody>
    </table>
    

                </div><!--table_responsive-->
           

  </div><!--col-12-->



   </div><!--bg-body-->
</div><!--col-md-9-->

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
    <script src="js/jquery.multiselect.js"></script>
    <script>
    $('#userTable').DataTable({
      "bSort" : false
    });



var filter=document.getElementById("userTable_filter").firstElementChild.firstChild;
filter.textContent="";

// element.scrollTop = element.scrollHeight;
        var vali=0;
        var fetch_id;
        var fetch_table;
        var interval;
        var flag=true;
        var type='new';
       // var e_id=null;
        $(document).ready(function(){








//start
          setInterval(function () { 
           
              
            $.ajax({
  method:"POST",
  url:"php/fetch_new_mails.php",
 
  success:function(data){
    
    $("#list_profile").html(data);
  }
  
  });
           }, 10000);
//end


          });




        </script>



      






</body>
</html>
   