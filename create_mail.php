<?php
include("session/check_session.php");
include_once("connection/connection.php");


$s_id=$_SESSION['id'];

if(isset($_REQUEST['e_id'])){
    $e_id=$_REQUEST['e_id'];
    $query="select * from emails where e_id=".$e_id;
    $mail=mysqli_query($conn,$query);
   $get=mysqli_fetch_assoc($mail);

}

//for members
$query="select * from members where m_id!=".$s_id;
$s_projects=mysqli_query($conn,$query);




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
    <link rel="stylesheet" href="css/jquery.multiselect.css"> 
  <!-- <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script> -->
  <style>
   #skills_findInList, #skills_findInListDiv,.checklistContainer,#skills_checklist{
    width:100%!important;
}

#skills_checklist{
    height: 150px!important;
}

element.style {
    user-select: auto;
}
div.actionButtons span:hover {
    text-decoration: underline;
    cursor: pointer;
    color: #198754;
}
div.checklist li.checked {
    background: #198754;
    color: #FFFFFF;
}
div.checklist li.checked:hover, div.checklist li.checked:hover label {
    background: #198754;
}
</style>
  
  
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
        
        

         
         <div class='col-12 '>
        
         <form  method="POST" class='js-form module' enctype="multipart/form-data" id="fileUploadForm">
      <div class="mb-1">


  <label for="sub" class="form-label">subject*</label>
  <input type="text" class="form-control form-control-sm"value="<?php echo (isset($get['subject']))?$get['subject']:''?>" name='subject' id="sub" placeholder="subject" data-validate-field='subject'>
</div>


<div class="mb-1">
  <label for="desc" class="form-label">Description*</label>
  <textarea class="form-control form-control-sm" name='description'  id="desc" rows="3" style='resize:none' data-validate-field='description'><?php echo (isset($get['description']))?$get['description']:''?></textarea>
</div>

<div class="form-group mb-1">
							<label for="message" class="form-label">projects</label>
							<div class="input-group">
								<select name="projects[]" multiple="multiple" id="skills">
		                             <option value="14">Zeeshan Javed</option>
		                         
                                    <?php if (mysqli_num_rows($s_projects)>0){
                                        while($pro=mysqli_fetch_assoc($s_projects)){ ?>

                                                 <option value="<?php echo $pro['m_id'];?>"><?php echo $pro['f_name']." ".$pro['l_name'];?></option>
                                        <?php }  }?>
		                        </select>
							</div>
						</div>


<div class='mb-1'>
         <label class='form-label w-100 d-flex border border-1 justify-content-center align-items-center text-success 'style='height:50px' for='file'><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentcolor" class="bi bi-upload text-success mx-2" viewBox="0 0 16 16">
  <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
  <path d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708l3-3z"/>
</svg><span class='text-dark '>uplaod file</span></label>
         <input type="file" id='file' name='file' class='d-none'>
       </div>
        
      </div>
      <div id='img' class='text-center'></div>
      <div class="text-end">
       
        <button  class="btn btn-success">Create</button>
      </div>
    </div>

    </form>
           

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
        var type="<?php echo (isset($_REQUEST['type']))?$_REQUEST['type']:"null";?>";
        var e_id="<?php echo (isset($_REQUEST['e_id']))?$_REQUEST['e_id']:"null";?>";


        $(document).ready(function(){

            
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
$(document).on('click',".get_mail",function(){
  let e_id=$(this).data("id");
  let m_id=$(this).data("m_id");
  
  console.log(e_id);
  console.log(m_id);

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
})



});
//end




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


 $("#img").html("<img src='admin/web_material/pdf_img.png' style='width:50px;height:50px'>");
 
}
else{
  $("#img").html('');
}

   






},
})



});


$("#file").change(function(){
   $("#img").html("<img src='admin/web_material/pdf_img.png' style='width:50px;height:50px'>");

})  

  <?php      
if(isset($_REQUEST['e_id'])){
    if(strlen($get['file_path'])>0){
        ?>


$("#img").html("<img src='admin/web_material/pdf_img.png' style='width:50px;height:50px'>");

<?php }
else{ ?>
 $("#img").html('');

<?php } } ?>
          
      
        });
        //end
        </script>



      






</body>
</html>
   