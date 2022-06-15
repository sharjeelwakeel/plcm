<?php

include("session/check_session.php");
include_once("connection/connection.php");



// date("Y-m-d H:i:s");;



$id=$_SESSION['id'];

$query="select * from members,speciality,designation where speciality=s_id and  designation=d_id order by m_id desc ";




$result=mysqli_query($conn,$query);
$arr_users = [];
if(mysqli_num_rows($result)>0){

  $arr_users=mysqli_fetch_all($result,MYSQLI_ASSOC);
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
          <li><hr class="dropdown-divider text-light"></li>
            <li><a class="dropdown-item text-light fw-bold active" href="members.php">Member</a></li>
            <li><hr class="dropdown-divider text-light"></li>
            <li><a class="dropdown-item text-light fw-bold" href="add_field.php">Add Field</a></li>
            <li><hr class="dropdown-divider text-light"></li>
          </ul>
        </li>
     
       </ul> 
      <!-- <form class="d-flex me-2">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form> -->


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
            <li><a class="dropdown-item text-light fw-bold active" href="members.php">Member</a></li>
            <li><hr class="dropdown-divider text-light"></li>
            <li><a class="dropdown-item text-light fw-bold" href="add_field.php">Add Field</a></li>
            <li><hr class="dropdown-divider text-light"></li>
         


</ul>
    


</div><!--col-md-3-->

<div class='col-md-9   bg-body  '>
  
    <div class='row h-auto p-3  justify-content-start'>
        <div class='col-12 text-muted h3 fw-bold align-self-start '>
                 Members
          </div>
          <div class="table-responsive">
<table id="userTable" class=' table table-hover '>
        <thead>
            <th>Name</th>
            <th>Registration No</th>
            <th>Designation</th>
            <th>Specilality</th>
            <th>action</th>
        </thead>
        <tbody>
            <?php if(!empty($arr_users)) { ?>
                <?php foreach($arr_users as $user) { ?>
                    <tr class="bg-lights position-relative">
                                  <td>
                                  <img src="<?php echo"../admin/".$user['img_path']; ?>" class='rounded-circle table-img' style="height:100px;width:100px">
      
                                  <a class="link-success " href="detail_member.php?p_id=<?php echo $user['m_id'];?>"><strong><?php echo $user['f_name']." ".$user['l_name'] ; ?></strong></a></td>
                                  <td><?php echo $user['reg_no']; ?></td>
                      <td><?php echo $user['d_name']; ?></td>
                         
                          <td><?php echo $user['s_name']; ?></td>
                         
                          <td><a class="btn btn-success btn-sm"  href="detail_member.php?p_id=<?php echo $user['m_id'];?>">view</a>
                        
                                  </td>
                   
                    </tr>
                <?php } ?>
            <?php } ?>
        </tbody>
    </table>
    

                </div><!--table_responsive-->



</div><!--row-->




         
    
</div><!--col-md-9-->

                           <!-------------------------ALERT START----------------->

                           <?php 
                           if(isset($status)){
                           if($status=='success'){
    ?>

                           <div class="alert alert-success " role="alert">
  <div class='text-center'>
    Project  Successfully Assigned   </div>
</div>

<?php }
} ?>

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
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
    <script type="text/javascript" src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
   
      <script>
        
        $(document).ready(function(){
          
          $('#userTable').DataTable();
          $(".link-success").hover(function(){
      $(this).prev().toggle();
    })

        });
      </script>

    <!-- <script>
        
        $(document).ready(function(){

          setInterval(function(){ 
           // console.log("notify");
            $.ajax({
                 url:"php/notify_alert.php",
                 method:"post",
                
                 success:function(data){
                  var str=JSON.parse(data);
                    console.log(str);
                   
                    if(str['status']==1){
                      $(".offcanvas-body").prepend(str['data']);
                      $(".notify_alert").append(str['model']);
                      $(".notify_alert").removeClass("d-none");
                      $(".notify_alert").addClass("d-block");
                      $(".dot_notify").removeClass("d-none");
                      $(".dot_notify").addClass("d-block");
                    //  $(".audio")[0].play();
                    var audio = new Audio("media/audio.mp3");
audio.play();
                      setTimeout(function() {
                        $(".notify_alert").removeClass("d-block");
                      $(".notify_alert").addClass("d-none");
                      $(".notify_alert").html("");
                      }, 10000);


                    }
                    else{
                    //  console.log("i run");
                    }

                 }

                });
                    


}, 3000);//run this thang every 2 seconds
        

             




                setInterval(function(){ 
	
  $.ajax({
       url:"php/chat_alert.php",
       method:"post",
      
       success:function(data){

        console.log("chat");
        var str=JSON.parse(data);
          console.log(str);
         
          if(str['status']==1){

            $(".notify_alert").append(str['model']);
            $(".notify_alert").removeClass("d-none");
            $(".notify_alert").addClass("d-block");
            $(".dot_chat_notify").removeClass("d-none");
            $(".dot_chat_notify").addClass("d-block");
          //  $(".audio")[0].play();
          var audio = new Audio("media/audio.mp3");
audio.play();
            setTimeout(function() {
              $(".notify_alert").removeClass("d-block");
            $(".notify_alert").addClass("d-none");
            $(".notify_alert").html("");
            }, 10000);


          }
          else{
          //  console.log("i run");
          }

       }

      });
          


}, 3000);//run this thang every 2 seconds


      



                $(".notify_close").click(function(){
                  $(".notify_alert").removeClass("d-block");
                      $(".notify_alert").addClass("d-none");
                      $(".notify_alert").html("");
                })
                    
  
              });
        </script> -->









</body>
</html>