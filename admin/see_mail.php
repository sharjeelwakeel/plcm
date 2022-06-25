<?php
include("session/check_session.php");
include_once("connection/connection.php");
$profile=$chat=NULL;

if(isset($_REQUEST['e_id'])&&isset($_REQUEST['m_id'])){
   
    $e_id=$_REQUEST['e_id'];
    $m_id=$_REQUEST['m_id'];
  
    $query="update emails set status='seen' where e_id=".$e_id;
    mysqli_query($conn,$query);
  
    $query="select * from emails where e_id=".$e_id;
    $mail=mysqli_query($conn,$query);
    $em=mysqli_fetch_assoc($mail);
    $rand=$em['rand_num'];
  
    
  $arr=NULL;
    if($m_id==14){
      $query="select * from admin ";
      $get_admin=mysqli_query($conn,$query);
      $admin_data=mysqli_fetch_assoc($get_admin);
      $name_user=$admin_data['f_name'];
      $file_path=$admin_data['img_path'];
      $email=$admin_data['email'];
      
  
  
  }
  else{
    
      $query="select * from members where m_id=".$m_id;
      $get_member=mysqli_query($conn,$query);
      $member_data=mysqli_fetch_assoc($get_member);
      $name_user=$member_data['f_name']." ".$member_data['l_name'];
      $file_path=$member_data['img_path'];
      $email=$member_data['email'];
  }
  
  $name=NULL;
  
  $query="select * from emails where m_id=14 and rand_num=".$rand;
  $admin=mysqli_query($conn,$query);
  if(mysqli_num_rows($admin)>0){
    $name="Zeeshan Javed,";
  }
  else{
    $name="";
  }
  
  
  $query="select f_name from members,emails where members.m_id=emails.m_id and rand_num=".$rand;
  //echo $query;
  $get=mysqli_query($conn,$query);
  $arr=mysqli_fetch_all($get,MYSQLI_ASSOC);
  $user=NULL;
  $i=-1;
  $g=0;
  foreach($arr as $val ){
    $user[++$i]= $val['f_name'];
    $g++;
  
  }
     
  
  
  
  if($g>0){
    $user=implode(",",$user);
}
  
    
  
  
  
  $chat=null;
  
    
  
  
  
  
  
    
    $profile="<div class='h5 px-2 fw-bold text-muted'>".$em['subject']."</div> ";


  
  
    $file=$em['file_path'];
    
    
    $downlaod=($em['file_path']!='')?"download":'';
  
  
    $chat="<div class='d-flex flex-column '><div class='d-flex '><img src='".$file_path."' class='rounded-circle' style='height:50px;width:50px'>
  
   <div> <span class='text-muted fs-5 fw-normal ps-2'>".$name_user."<span>&lt".$email."&gt</span></span>
   <div class=' text-normal px-2'style='font-size:12px!important'>to:".$name.$user."</div>
   <div class=' text-normal px-2 'style='font-size:12px!important'>".date(' H:i A',strtotime($em['date']))."</div>
   </div></div>
   
  
    </div>
    
    <div class'd-flex flex-column align-items-stretch'><div class='d-flex flex-column font_size_mail'></div>
                                      <div class='font_size_mail d-flex flex-column mt-2'><div class='text-dark fw-normal ' style='font-size:14px!important' >".$em['description']."</div></div>
                                      <div class='mt-2 fs-5 '><a class='text-decoration-none text-info' style='font-size:14px!important' href='".$file."'download>".$downlaod."</a></div>
                                      
                                       </div>
                                      
    </div>
    <div class='text-end align-self-end'>
    <a href='create_mail.php?e_id=".$em['e_id']."&&type=forward' class='btn  btn-outline-success fw-bold mx-2 ' data-id='".$em['e_id']."' >
  Forward
  </a>";
  
 
  
//   echo json_encode(array("profile"=>$profile,"chat"=>$chat));
  
  
  
  
  } //isset if end
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
 
  <a class="navbar-brand" href="index.php">PLCM</a>
 
 
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
        
         
       

         
         <div class='col-12 '>
        
         <div class='bg px-2 py-4 user_profile' style="height:15%">
         <?php echo $profile;?>
  
  </div>
  
          <div class='col-12 text-muted h3 fw-bold  d-flex flex-column  align-items-start px-2 py-4' id='message_show' style="height:85%; " >
                  <!-- <div class='d-flex  ms-auto mt-auto'> <div class='bg-success rounded-pill p-2 px-4 text-light fw-normal fs-5'>hello how are you</div><img src='admin/images/1052915969WhatsApp Image 2021-11-21 at 5.11.16 AM.jpeg' class='rounded-circle' style="height:50px;width:50px"></div>
                 <div class='d-flex'><img src='admin/images/144877969798341558_279333590123740_5835491160776245248_n.jpg' class='rounded-circle' style="height:50px;width:50px"> <div class='bg rounded-pill p-2 px-4 text-dark fw-normal fs-5  '>hi my name is sharjeel</div></div>
                  -->
           
                  <?php echo $chat;?>
              
                  
            
            </div>

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



// var filter=document.getElementById("userTable_filter").firstElementChild.firstChild;
// filter.textContent="";

// element.scrollTop = element.scrollHeight;
        var vali=0;
        var fetch_id;
        var fetch_table;
        var interval;
        var flag=true;
        var type='new';
        var e_id=null;
        $(document).ready(function(){





//start
            new JustValidate('.js-form', {
    rules: {
  
      subject: {
        required: true,
      
      },
      description: {
        required:true
       
        
      },

  },

    messages: {
      subject: {
        required: 'required*'
      },
      description: {
        required:"required*"
      },
     
   

    },

    submitHandler: function (form, values, ajax) {


 var form = $('#fileUploadForm')[0];

 var data = new FormData(form);
 data.append("mode",type);
 data.append("e_id",e_id);

     

      $.ajax({
        url: 'php/mail_sender.php',
        method: 'POST',
      data:data,
        enctype:"multipart/form-data",
        contentType: false, //this is requireded please see answers above
            processData: false,
      
        success: function(response)  {
            console.log(response);

         
    
        if(response=="success"){
          type="new";
         e_id=null;
         
          
                      $(".alert").removeClass("d-none");
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
 
    }
  

  })
//end




//start

            $('#skills').multiselect({
                columns: 2,
    placeholder: 'Select projects',
    search: true,
    selectAll: true,

		        cssEven: false,
		        cssOdd: false,
});
//end






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





//start
<?php if(isset($_REQUEST['id'])&&isset($_REQUEST['m_id'])){
    
    ?>
    //alert("hello");
  let e_id=<?php echo $_REQUEST['id'];?>


  let m_id=<?php echo $_REQUEST['m_id'];?>
  
  
  $.ajax({
  method:"POST",
  url:"php/fetch_mails.php",
  data:{
    e_id:e_id,m_id:m_id
  },
  success:function(data){
     console.log(data);
    var data=JSON.parse(data);
     console.log(data);
    
$(".user_profile").html("");
$(".user_profile").html(data['profile']);

$("#message_show").html("");
$("#message_show").html(data['chat']);


 


  },
});

<?php } ?>








$(document).on("click",".forward",function(){

let id=$(this).data("id");
  $.ajax({
method:"POST",
url:"php/forward_mail.php",
data:{
  e_id:id,
},
success:function(response){
   let dt=JSON.parse(response);

   console.log(dt['subject']);
let sub=$(".js-form").find("#sub");
let des=$(".js-form").find("#desc");
//console.log(dt['subject']);
 sub.val(dt['subject'])
 des.val(dt['description']);
 
type="forward";
e_id=dt['e_id'];

console.log(dt['file_path'].length);
if(dt['file_path'].length>0){


 $("#img").html("<img src='admin/web_material/pdf_img.png'>");
 
}
else{
  $("#img").html('');
}

   






},
})



});


$("#file").change(function(){
   $("#img").html("<img src='admin/web_material/pdf_img.png'>");

})  

        

          
      
        });
        //end
        </script>



      






</body>
</html>
   