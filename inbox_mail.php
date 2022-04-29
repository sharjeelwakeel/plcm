<?php

include("session/check_session.php");
include_once("connection/connection.php");



$s_id=$_SESSION['id'];

//for members
$query="select * from members";
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

    $user.="<tr class='bg-success border border-start-0 border-end-0 border-top-0 border-light get_mail' data-id='".$em['e_id']."' data-m_id='".$em['crt_id']."' style='cursor:pointer'><td><div class='text-light fw-bold'>".$name."<span class='badge ".$status." rounded-pill bg-light text-dark mx-2'>new</span></div>
    <p class=' e_desc'>".substr($em['description'],0,100)."</p>
    <div class='text-end e_date'>".date('d/m H:i A',strtotime($em['date']))."</div>
    </td></tr>";
  }


}
else{
  $user="<tr class='bg-success border border-0'><td class='text-light text-center ' colspan='5'>no mail</td></tr> ";

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
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css"/>
    <link rel='stylesheet' href='css/style.css'>
    <link rel='stylesheet' href='css/style2.css'>




    <!-- jQuery library -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
    
<link rel="stylesheet" href="css/jquery.multiselect.css"> 

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

  <div class='container-fluid p-0 responsive wrapper-message email' >

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

            
            <li><a class="dropdown-item text-light fw-bold active" href="detail_project.php?id=<?php echo $res['p_id']?>">Review Proposal</a></li>  
            <li><hr class="dropdown-divider text-light"></li>
            <li><a class="dropdown-item " href="road_map.php?id=<?php echo $res['p_id']?>">Road Map</a></li>         
              <li><hr class="dropdown-divider text-light"></li>
              <li><a class="dropdown-item " href="work_packages.php?id=<?php echo $res['p_id']?>">Work Package</a></li>         
              <li><hr class="dropdown-divider text-light"></li>
              <li><a class="dropdown-item " href="assign_me.php?id=<?php echo $res['p_id']?>">Assigned to me</a></li>         
              <li><hr class="dropdown-divider text-light"></li>
              <li><a class="dropdown-item " href="created_me.php?id=<?php echo $res['p_id']?>">Created by me</a></li>         
              <li><hr class="dropdown-divider text-light"></li>
              <li><a class="dropdown-item " href="add_schedule.php?id=<?php echo $res['p_id']?>">Add Schedule</a></li>         
              <li><hr class="dropdown-divider text-light"></li>
        


          </ul>
        </li>
     
       </ul> 
      <!-- <form class="d-flex me-2">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form> -->
      <div class=' d-flex align-items-center justify-md-content-start justify-content-around'>
           
      
      <!--send-->
           <a type="button" class="btn  btn-outline-success fw-bold  mx-2" href="send_mail.php">
  Sent
</a> 
                  <!--send end-->
      
      <!-- Button trigger modal -->
<button type="button" class="btn  btn-outline-success fw-bold mx-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Create Mail
</button>
               <!--Button trigger modal end-->

                      <!--send-->
               <a type="button" class="btn  btn-outline-success fw-bold mx-2 disabled" href="inbox_mail.php">
  Inbox
</a> 
                  <!--send end-->



              
      <!-- <div class='position-relative chat ms-2  d-inline-block d-md-block mt-md-0 mt-2 '>
<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
width="20" height="20"
viewBox="0 0 172 172"
style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#198754"><path d="M86,14.00188c-43.45687,0 -78.87812,30.44937 -78.87812,68.55812c0,22.11813 12.12062,41.37406 30.73156,53.965c-0.02687,0.73906 0.02688,1.935 -0.94062,5.53625c-1.20938,4.44781 -3.64156,10.72313 -8.57313,17.79125l-3.50719,5.02563h6.1275c21.23125,0 33.51313,-13.84063 35.42125,-16.05781c6.31563,1.47812 12.81938,2.29781 19.61875,2.29781c43.45688,0 78.87813,-30.44938 78.87813,-68.55813c0,-38.10875 -35.42125,-68.55812 -78.87813,-68.55812zM86,20.39813c40.48719,0 72.48188,28.03062 72.48188,62.16187c0,34.13125 -31.99469,62.16188 -72.48188,62.16188c-7.01437,0 -13.62562,-0.67188 -19.83375,-2.29781l-1.98875,-0.52406l-1.30344,1.59906c0,0 -9.93031,11.20687 -25.78656,13.90781c2.87563,-5.18688 4.99875,-10.02438 5.97969,-13.67938c1.38406,-5.09281 1.41094,-8.53281 1.41094,-8.53281v-1.76031l-1.47813,-0.94063c-18.1675,-11.55625 -29.48187,-29.44156 -29.48187,-49.93375c0,-34.13125 31.99469,-62.16187 72.48187,-62.16187zM51.6,75.68c-3.80281,0 -6.88,3.07719 -6.88,6.88c0,3.80281 3.07719,6.88 6.88,6.88c3.80281,0 6.88,-3.07719 6.88,-6.88c0,-3.80281 -3.07719,-6.88 -6.88,-6.88zM86,75.68c-3.80281,0 -6.88,3.07719 -6.88,6.88c0,3.80281 3.07719,6.88 6.88,6.88c3.80281,0 6.88,-3.07719 6.88,-6.88c0,-3.80281 -3.07719,-6.88 -6.88,-6.88zM120.4,75.68c-3.80281,0 -6.88,3.07719 -6.88,6.88c0,3.80281 3.07719,6.88 6.88,6.88c3.80281,0 6.88,-3.07719 6.88,-6.88c0,-3.80281 -3.07719,-6.88 -6.88,-6.88z"></path></g></g></svg>


<span class="position-absolute top-0 start-100 translate-middle p-1 bg-success border border-light rounded-circle">
    <span class="visually-hidden">New alerts</span>
  </span>


</div><!--chat-->



<!--
<div class=" position-relative ms-2   mt-md-0 mt-2 ">
<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"
width="20" height="20"
viewBox="0 0 172 172"
style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#198754"><path d="M86,3.44c-4.3,0 -7.96282,1.73636 -10.31328,4.38063c-2.35046,2.64427 -3.44672,6.03493 -3.44672,9.37938c0,1.70861 0.29357,3.42545 0.88687,5.0525c-19.10984,4.97581 -31.84687,20.93309 -31.84687,43.1075c0,25.51637 -4.99542,37.18202 -9.66156,43.59797c-2.33307,3.20797 -4.62259,5.14277 -6.665,7.05469c-1.0212,0.95596 -2.01009,1.90954 -2.84875,3.16453c-0.83866,1.25499 -1.46469,2.91415 -1.46469,4.66281c0,4.73 2.87975,8.70577 6.85312,11.35469c3.97338,2.64892 9.14905,4.42201 15.19109,5.76469c6.78742,1.50832 14.74178,2.38843 23.13265,2.90922c-0.27478,1.28154 -0.45687,2.6266 -0.45687,4.0514c0,11.43391 9.20609,20.64 20.64,20.64c11.43391,0 20.64,-9.20609 20.64,-20.64c0,-1.4248 -0.18209,-2.76986 -0.45687,-4.0514c8.39087,-0.52079 16.34523,-1.4009 23.13265,-2.90922c6.04204,-1.34267 11.21772,-3.11577 15.19109,-5.76469c3.97338,-2.64892 6.85313,-6.62469 6.85313,-11.35469c0,-1.74867 -0.62603,-3.40782 -1.46469,-4.66281c-0.83866,-1.25499 -1.82755,-2.20857 -2.84875,-3.16453c-2.04241,-1.91192 -4.33193,-3.84671 -6.665,-7.05469c-4.66614,-6.41594 -9.66156,-18.0816 -9.66156,-43.59797c0,-22.0469 -12.60401,-38.26139 -31.8536,-43.08734c0.5982,-1.63287 0.8936,-3.35713 0.8936,-5.07266c0,-3.34444 -1.09626,-6.73511 -3.44672,-9.37937c-2.35046,-2.64427 -6.01328,-4.38062 -10.31328,-4.38062zM86,10.32c2.58,0 4.07718,0.84364 5.16672,2.06937c1.08954,1.22573 1.71328,2.99507 1.71328,4.81063c0,1.81556 -0.62374,3.58489 -1.71328,4.81063c-1.08954,1.22573 -2.58672,2.06937 -5.16672,2.06937c-2.58,0 -4.07718,-0.84364 -5.16672,-2.06937c-1.08954,-1.22573 -1.71328,-2.99507 -1.71328,-4.81063c0,-1.81556 0.62374,-3.58489 1.71328,-4.81062c1.08954,-1.22573 2.58672,-2.06937 5.16672,-2.06937zM77.60156,28.31281c2.23525,1.64123 5.13149,2.64719 8.39844,2.64719c3.24018,0 6.11698,-0.9895 8.34469,-2.60688c18.28768,3.18011 29.49531,16.35049 29.49531,37.00688c0,26.42763 5.32458,39.87532 10.97844,47.64937c2.82693,3.88703 5.69741,6.31808 7.525,8.02891c0.9138,0.85541 1.53741,1.52777 1.8275,1.96187c0.2901,0.4341 0.30906,0.52451 0.30906,0.83985c0,2.15 -0.99025,3.76423 -3.78937,5.63031c-2.79912,1.86608 -7.29845,3.53299 -12.86641,4.77031c-11.13592,2.47465 -26.47163,3.35937 -41.82422,3.35937c-15.35259,0 -30.6883,-0.88473 -41.82422,-3.35937c-5.56796,-1.23733 -10.06729,-2.90423 -12.86641,-4.77031c-2.79912,-1.86608 -3.78937,-3.48031 -3.78937,-5.63031c0,-0.31534 0.01895,-0.40574 0.30906,-0.83985c0.29009,-0.4341 0.9137,-1.10646 1.8275,-1.96187c1.82759,-1.71083 4.69807,-4.14188 7.525,-8.02891c5.65386,-7.77405 10.97844,-21.22175 10.97844,-47.64937c0,-20.73869 11.30135,-33.63046 29.44156,-37.04719zM72.8514,144.2314c4.33992,0.15687 8.73071,0.2486 13.1486,0.2486c4.41789,0 8.80868,-0.09172 13.1486,-0.2486c0.35515,1.13471 0.6114,2.33125 0.6114,3.6886c0,7.83009 -5.92991,13.76 -13.76,13.76c-7.83009,0 -13.76,-5.92991 -13.76,-13.76c0,-1.35734 0.25625,-2.55389 0.6114,-3.6886z"></path></g></g>
</svg>
 
  <span class="position-absolute top-0  start-100 translate-middle p-1 bg-success border border-light rounded-circle">
    <span class="visually-hidden">New alerts</span>
  </span>
</div>  

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
</ul> -->
</div>
     

    </div><!--container-->
  </div><!--collapse-->


 

</nav>
                 <!---------------------navbar-------------------->


                 <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-secondary" id="exampleModalLabel">create mail</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form  method="POST" class='js-form module' enctype="multipart/form-data" id="fileUploadForm">
      <div class="mb-3">


  <label for="exampleFormControlInput1" class="form-label">subject*</label>
  <input type="text" class="form-control form-control-sm" name='subject' id="exampleFormControlInput1" placeholder="subject" data-validate-field='subject'>
</div>


<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Description*</label>
  <textarea class="form-control form-control-sm" name='description' id="exampleFormControlTextarea1" rows="3" style='resize:none' data-validate-field='description'></textarea>
</div>

<div class="form-group mb-3">
							<label for="message" class="form-label">projects</label>
							<div class="input-group">
								<select name="projects[]" multiple="multiple" id="skills">
		                             <option value="14">Zeeshan Javed</option>
		                           <!-- <option value="Java">Java</option>
		                            <option value="Objective-C">Objective-C</option>
		                            <option value="JavaScript">JavaScript</option>
		                            <option value="Perl">Perl</option>
		                            <option value="PHP">PHP</option>
		                            <option value="Ruby on Rails">Ruby on Rails</option>
		                            <option value="Android">Android</option>
		                            <option value="iOS">iOS</option>
		                            <option value="HTML">HTML</option>
		                            <option value="XML">XML</option> -->
                                    <?php if (mysqli_num_rows($s_projects)>0){
                                        while($pro=mysqli_fetch_assoc($s_projects)){ ?>

                                                 <option value="<?php echo $pro['m_id'];?>"><?php echo $pro['f_name']." ".$pro['l_name'];?></option>
                                        <?php }  }?>
		                        </select>
							</div>
						</div>


<div class='mb-3'>
         <label class='form-label w-100 d-flex border border-1 justify-content-center align-items-center text-success 'style='height:50px' for='file'><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentcolor" class="bi bi-upload text-success mx-2" viewBox="0 0 16 16">
  <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
  <path d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708l3-3z"/>
</svg><span class='text-dark '>uplaod file</span></label>
         <input type="file" id='file' name='file' class='d-none'>
       </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn bg" data-bs-dismiss="modal">Close</button>
        <button  class="btn btn-success">Create</button>
      </div>
    </div>

    </form>
  </div>
</div>

    
                 
                 <!----notification start---->
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
  <div class="offcanvas-header bg-success">
    <h5 id="offcanvasRightLabel " class=' text-light'>Notifications</h5>  
    <button type="button" class="btn-close notitify text-reset" data-bs-dismiss="offcanvas" aria-label="Close">
    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" class='mb-3'
width="15" height="15"
viewBox="0 0 172 172"
style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M18.87987,153.12013c2.23887,2.23819 5.86807,2.23819 8.10693,0l59.0132,-59.0132l59.0132,59.0132c2.24964,2.17277 5.82555,2.1417 8.03709,-0.06984c2.21154,-2.21154 2.24261,-5.78745 0.06984,-8.03709l-59.0132,-59.0132l59.0132,-59.0132c1.49042,-1.43949 2.08815,-3.57117 1.56346,-5.57571c-0.52469,-2.00454 -2.09015,-3.57 -4.09469,-4.09469c-2.00454,-0.52469 -4.13622,0.07305 -5.57571,1.56346l-59.0132,59.0132l-59.0132,-59.0132c-2.24964,-2.17277 -5.82555,-2.1417 -8.03709,0.06984c-2.21154,2.21154 -2.24261,5.78745 -0.06984,8.03709l59.0132,59.0132l-59.0132,59.0132c-2.23819,2.23887 -2.23819,5.86807 0,8.10693z"></path></g></g></svg>

    </button>

  </div>
  <div class="offcanvas-body ">
    
  
  <div class='bg-light d-flex flex-column  py-3 rounded '>
    <div class='msg px-2'>
  <span class='text-success fw-bold' >project admin</span><span class='text-dark'> send you proposal</span>

</div><!--msg-->
<div class='date text-end me-4'>
    12:30pm
</div>
   </div>

   
  </div>
</div>
              <!-------notification end----------->

                 <!--------------------content start--------------------->
<section class=' bg message-sec ' style="height:90vh">
  <div class='row m-0 align-items-stretch justify-content-start ' style="height:90vh;">

  <div class='col-3  p-0  bg-success rounded  ' style="height:89.5vh;overflow-y:hidden">

  
  
 
  
  <div class="table-responsive mt-2 pb-5 mt-5" style="height:84.5vh;overflow-y:scroll">
 
<table id="userTable" class=' table table-hover ' style="border-collapse: separate;">
        <thead>
            <th class='invisible border-0' >name</th>
                   </thead>
        <tbody id="list_profile">

   
       <?php echo $user;?>

         

           
         
             
        </tbody>
    </table>
    

                </div><!--table_responsive-->
</div><!--col-md-4-->

<div class='col-9 bg-body d-flex flex-column p-0' style="height:90vh">
    <div class='bg px-2 py-4 user_profile' style="height:15%">
  
</div>

        <div class='col-12 text-muted h3 fw-bold  d-flex flex-column  align-items-start px-2 py-4' id='message_show' style="height:85%; overflow-y:scroll" >
                <!-- <div class='d-flex  ms-auto mt-auto'> <div class='bg-success rounded-pill p-2 px-4 text-light fw-normal fs-5'>hello how are you</div><img src='admin/images/1052915969WhatsApp Image 2021-11-21 at 5.11.16 AM.jpeg' class='rounded-circle' style="height:50px;width:50px"></div>
               <div class='d-flex'><img src='admin/images/144877969798341558_279333590123740_5835491160776245248_n.jpg' class='rounded-circle' style="height:50px;width:50px"> <div class='bg rounded-pill p-2 px-4 text-dark fw-normal fs-5  '>hi my name is sharjeel</div></div>
                -->
         
          
            
                
          
          </div>
         
       
 


</div>



</div><!--col-md-9-->

                           <!-------------------------ALERT START----------------->

                           <div class="alert alert-success d-none" role="alert">
  <div class='text-center'>
    Mail send Successfully    </div>
</div>


                            <!------------------------ALERT END-------------------->


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
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- JS & CSS library of MultiSelect plugin -->

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
         
          alert("success");
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
      alert("check");
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

     

        

          
      
        });
        //end
        </script>



      






</body>
</html>