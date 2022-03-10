<?php
include("session/check_session.php");
include_once("connection/connection.php");
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
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
  
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
          <li><a class="dropdown-item text-light fw-bold  " href="home.php">Assign projects</a></li>
            <li><hr class="dropdown-divider text-light"></li>
            <li><a class="dropdown-item text-light fw-bold active" href="history.php">History</a></li>
            <li><hr class="dropdown-divider text-light"></li>
        


          </ul>
        </li>
     
       </ul> 
      <form class="d-flex me-2">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
      <div class=' d-flex align-items-center justify-md-content-start justify-content-around'>
      <div class='position-relative chat ms-2  d-inline-block d-md-block mt-md-0 mt-2 '>
<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
width="20" height="20"
viewBox="0 0 172 172"
style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#198754"><path d="M86,14.00188c-43.45687,0 -78.87812,30.44937 -78.87812,68.55812c0,22.11813 12.12062,41.37406 30.73156,53.965c-0.02687,0.73906 0.02688,1.935 -0.94062,5.53625c-1.20938,4.44781 -3.64156,10.72313 -8.57313,17.79125l-3.50719,5.02563h6.1275c21.23125,0 33.51313,-13.84063 35.42125,-16.05781c6.31563,1.47812 12.81938,2.29781 19.61875,2.29781c43.45688,0 78.87813,-30.44938 78.87813,-68.55813c0,-38.10875 -35.42125,-68.55812 -78.87813,-68.55812zM86,20.39813c40.48719,0 72.48188,28.03062 72.48188,62.16187c0,34.13125 -31.99469,62.16188 -72.48188,62.16188c-7.01437,0 -13.62562,-0.67188 -19.83375,-2.29781l-1.98875,-0.52406l-1.30344,1.59906c0,0 -9.93031,11.20687 -25.78656,13.90781c2.87563,-5.18688 4.99875,-10.02438 5.97969,-13.67938c1.38406,-5.09281 1.41094,-8.53281 1.41094,-8.53281v-1.76031l-1.47813,-0.94063c-18.1675,-11.55625 -29.48187,-29.44156 -29.48187,-49.93375c0,-34.13125 31.99469,-62.16187 72.48187,-62.16187zM51.6,75.68c-3.80281,0 -6.88,3.07719 -6.88,6.88c0,3.80281 3.07719,6.88 6.88,6.88c3.80281,0 6.88,-3.07719 6.88,-6.88c0,-3.80281 -3.07719,-6.88 -6.88,-6.88zM86,75.68c-3.80281,0 -6.88,3.07719 -6.88,6.88c0,3.80281 3.07719,6.88 6.88,6.88c3.80281,0 6.88,-3.07719 6.88,-6.88c0,-3.80281 -3.07719,-6.88 -6.88,-6.88zM120.4,75.68c-3.80281,0 -6.88,3.07719 -6.88,6.88c0,3.80281 3.07719,6.88 6.88,6.88c3.80281,0 6.88,-3.07719 6.88,-6.88c0,-3.80281 -3.07719,-6.88 -6.88,-6.88z"></path></g></g></svg>


<span class="position-absolute top-0 start-100 translate-middle p-1 bg-success border border-light rounded-circle">
    <span class="visually-hidden">New alerts</span>
  </span>


</div><!--chat-->




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
</ul>
</div>
     

    </div><!--container-->
  </div><!--collapse-->


 

</nav>
                 <!---------------------navbar-------------------->

    
                 
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
<section class=' bg h-100'>
  <div class='row m-0 align-items-stretch justify-content-start h-100'>

  <div class='col-md-3 d-none d-md-block  bg-success rounded  '>

  <ul class='menu mt-5'>

  <li><a class="dropdown-item text-light fw-bold  " href="home.php">Assign projects</a></li>
            <li><hr class="dropdown-divider text-light"></li>
            <li><a class="dropdown-item text-light fw-bold active" href="history.php">History</a></li>
            <li><hr class="dropdown-divider text-light"></li>
         
<!-- 
      
  <li><a class="dropdown-item" href="#"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
width="20" height="20"
viewBox="0 0 172 172"
style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="#e9ecef"></path><g fill="#198754"><path d="M10.32,24.08c-5.65719,0 -10.32,4.66281 -10.32,10.32v103.2c0,5.65719 4.66281,10.32 10.32,10.32h68.0475c1.89469,2.09625 4.59563,3.44 7.6325,3.44c3.03688,0 5.73781,-1.34375 7.6325,-3.44h68.0475c5.65719,0 10.32,-4.66281 10.32,-10.32v-103.2c0,-5.65719 -4.66281,-10.32 -10.32,-10.32h-68.8c-2.63375,0 -5.0525,1.03469 -6.88,2.6875c-1.8275,-1.65281 -4.24625,-2.6875 -6.88,-2.6875zM10.32,30.96h68.8c1.94844,0 3.44,1.49156 3.44,3.44v106.64h-72.24c-1.94844,0 -3.44,-1.49156 -3.44,-3.44v-103.2c0,-1.94844 1.49156,-3.44 3.44,-3.44zM92.88,30.96h68.8c1.94844,0 3.44,1.49156 3.44,3.44v103.2c0,1.94844 -1.49156,3.44 -3.44,3.44h-72.24v-106.64c0,-1.94844 1.49156,-3.44 3.44,-3.44zM19.6725,48.16c-1.89469,0.26875 -3.225,2.02906 -2.95625,3.92375c0.26875,1.89469 2.02906,3.225 3.92375,2.95625h27.52c1.23625,0.01344 2.39188,-0.63156 3.02344,-1.70656c0.61813,-1.075 0.61813,-2.39187 0,-3.46687c-0.63156,-1.075 -1.78719,-1.72 -3.02344,-1.70656h-27.52c-0.1075,0 -0.215,0 -0.3225,0c-0.1075,0 -0.215,0 -0.3225,0c-0.1075,0 -0.215,0 -0.3225,0zM61.92,48.16c-1.89469,0 -3.44,1.54531 -3.44,3.44c0,1.89469 1.54531,3.44 3.44,3.44c1.89469,0 3.44,-1.54531 3.44,-3.44c0,-1.89469 -1.54531,-3.44 -3.44,-3.44zM72.24,48.16c-1.89469,0 -3.44,1.54531 -3.44,3.44c0,1.89469 1.54531,3.44 3.44,3.44c1.89469,0 3.44,-1.54531 3.44,-3.44c0,-1.89469 -1.54531,-3.44 -3.44,-3.44zM102.2325,48.16c-1.89469,0.26875 -3.225,2.02906 -2.95625,3.92375c0.26875,1.89469 2.02906,3.225 3.92375,2.95625h27.52c1.23625,0.01344 2.39188,-0.63156 3.02344,-1.70656c0.61813,-1.075 0.61813,-2.39187 0,-3.46687c-0.63156,-1.075 -1.78719,-1.72 -3.02344,-1.70656h-27.52c-0.1075,0 -0.215,0 -0.3225,0c-0.1075,0 -0.215,0 -0.3225,0c-0.1075,0 -0.215,0 -0.3225,0zM144.48,48.16c-1.89469,0 -3.44,1.54531 -3.44,3.44c0,1.89469 1.54531,3.44 3.44,3.44c1.89469,0 3.44,-1.54531 3.44,-3.44c0,-1.89469 -1.54531,-3.44 -3.44,-3.44zM154.8,48.16c-1.89469,0 -3.44,1.54531 -3.44,3.44c0,1.89469 1.54531,3.44 3.44,3.44c1.89469,0 3.44,-1.54531 3.44,-3.44c0,-1.89469 -1.54531,-3.44 -3.44,-3.44zM19.6725,65.36c-1.89469,0.26875 -3.225,2.02906 -2.95625,3.92375c0.26875,1.89469 2.02906,3.225 3.92375,2.95625h27.52c1.23625,0.01344 2.39188,-0.63156 3.02344,-1.70656c0.61813,-1.075 0.61813,-2.39187 0,-3.46687c-0.63156,-1.075 -1.78719,-1.72 -3.02344,-1.70656h-27.52c-0.1075,0 -0.215,0 -0.3225,0c-0.1075,0 -0.215,0 -0.3225,0c-0.1075,0 -0.215,0 -0.3225,0zM61.92,65.36c-1.89469,0 -3.44,1.54531 -3.44,3.44c0,1.89469 1.54531,3.44 3.44,3.44c1.89469,0 3.44,-1.54531 3.44,-3.44c0,-1.89469 -1.54531,-3.44 -3.44,-3.44zM72.24,65.36c-1.89469,0 -3.44,1.54531 -3.44,3.44c0,1.89469 1.54531,3.44 3.44,3.44c1.89469,0 3.44,-1.54531 3.44,-3.44c0,-1.89469 -1.54531,-3.44 -3.44,-3.44zM102.2325,65.36c-1.89469,0.26875 -3.225,2.02906 -2.95625,3.92375c0.26875,1.89469 2.02906,3.225 3.92375,2.95625h27.52c1.23625,0.01344 2.39188,-0.63156 3.02344,-1.70656c0.61813,-1.075 0.61813,-2.39187 0,-3.46687c-0.63156,-1.075 -1.78719,-1.72 -3.02344,-1.70656h-27.52c-0.1075,0 -0.215,0 -0.3225,0c-0.1075,0 -0.215,0 -0.3225,0c-0.1075,0 -0.215,0 -0.3225,0zM144.48,65.36c-1.89469,0 -3.44,1.54531 -3.44,3.44c0,1.89469 1.54531,3.44 3.44,3.44c1.89469,0 3.44,-1.54531 3.44,-3.44c0,-1.89469 -1.54531,-3.44 -3.44,-3.44zM154.8,65.36c-1.89469,0 -3.44,1.54531 -3.44,3.44c0,1.89469 1.54531,3.44 3.44,3.44c1.89469,0 3.44,-1.54531 3.44,-3.44c0,-1.89469 -1.54531,-3.44 -3.44,-3.44zM19.6725,82.56c-1.89469,0.26875 -3.225,2.02906 -2.95625,3.92375c0.26875,1.89469 2.02906,3.225 3.92375,2.95625h27.52c1.23625,0.01344 2.39188,-0.63156 3.02344,-1.70656c0.61813,-1.075 0.61813,-2.39187 0,-3.46687c-0.63156,-1.075 -1.78719,-1.72 -3.02344,-1.70656h-27.52c-0.1075,0 -0.215,0 -0.3225,0c-0.1075,0 -0.215,0 -0.3225,0c-0.1075,0 -0.215,0 -0.3225,0zM72.24,82.56c-1.89469,0 -3.44,1.54531 -3.44,3.44c0,1.89469 1.54531,3.44 3.44,3.44c1.89469,0 3.44,-1.54531 3.44,-3.44c0,-1.89469 -1.54531,-3.44 -3.44,-3.44zM102.2325,82.56c-1.89469,0.26875 -3.225,2.02906 -2.95625,3.92375c0.26875,1.89469 2.02906,3.225 3.92375,2.95625h27.52c1.23625,0.01344 2.39188,-0.63156 3.02344,-1.70656c0.61813,-1.075 0.61813,-2.39187 0,-3.46687c-0.63156,-1.075 -1.78719,-1.72 -3.02344,-1.70656h-27.52c-0.1075,0 -0.215,0 -0.3225,0c-0.1075,0 -0.215,0 -0.3225,0c-0.1075,0 -0.215,0 -0.3225,0zM154.8,82.56c-1.89469,0 -3.44,1.54531 -3.44,3.44c0,1.89469 1.54531,3.44 3.44,3.44c1.89469,0 3.44,-1.54531 3.44,-3.44c0,-1.89469 -1.54531,-3.44 -3.44,-3.44zM19.6725,99.76c-1.89469,0.26875 -3.225,2.02906 -2.95625,3.92375c0.26875,1.89469 2.02906,3.225 3.92375,2.95625h27.52c1.23625,0.01344 2.39188,-0.63156 3.02344,-1.70656c0.61813,-1.075 0.61813,-2.39187 0,-3.46687c-0.63156,-1.075 -1.78719,-1.72 -3.02344,-1.70656h-27.52c-0.1075,0 -0.215,0 -0.3225,0c-0.1075,0 -0.215,0 -0.3225,0c-0.1075,0 -0.215,0 -0.3225,0zM61.92,99.76c-1.89469,0 -3.44,1.54531 -3.44,3.44c0,1.89469 1.54531,3.44 3.44,3.44c1.89469,0 3.44,-1.54531 3.44,-3.44c0,-1.89469 -1.54531,-3.44 -3.44,-3.44zM72.24,99.76c-1.89469,0 -3.44,1.54531 -3.44,3.44c0,1.89469 1.54531,3.44 3.44,3.44c1.89469,0 3.44,-1.54531 3.44,-3.44c0,-1.89469 -1.54531,-3.44 -3.44,-3.44zM19.6725,116.96c-1.89469,0.26875 -3.225,2.02906 -2.95625,3.92375c0.26875,1.89469 2.02906,3.225 3.92375,2.95625h27.52c1.23625,0.01344 2.39188,-0.63156 3.02344,-1.70656c0.61813,-1.075 0.61813,-2.39187 0,-3.46687c-0.63156,-1.075 -1.78719,-1.72 -3.02344,-1.70656h-27.52c-0.1075,0 -0.215,0 -0.3225,0c-0.1075,0 -0.215,0 -0.3225,0c-0.1075,0 -0.215,0 -0.3225,0zM72.24,116.96c-1.89469,0 -3.44,1.54531 -3.44,3.44c0,1.89469 1.54531,3.44 3.44,3.44c1.89469,0 3.44,-1.54531 3.44,-3.44c0,-1.89469 -1.54531,-3.44 -3.44,-3.44z"></path></g></g></svg>Feasiblity Study</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
width="20" height="20"
viewBox="0 0 172 172"
style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="#e9ecef"></path><g fill="#198754"><path d="M20.64,6.88c-11.35469,0 -20.64,9.28531 -20.64,20.64v99.76c0,11.35469 9.28531,20.64 20.64,20.64h151.36v-123.84h-131.41875c-1.70656,-9.66156 -9.79594,-17.2 -19.94125,-17.2zM20.64,13.76c7.6325,0 13.76,6.1275 13.76,13.76v84.44125c-3.655,-3.29219 -8.47906,-5.32125 -13.76,-5.32125c-5.28094,0 -10.105,2.02906 -13.76,5.32125v-84.44125c0,-7.6325 6.1275,-13.76 13.76,-13.76zM41.28,30.96h123.84v110.08h-144.48c-7.6325,0 -13.76,-6.1275 -13.76,-13.76c0,-7.6325 6.1275,-13.76 13.76,-13.76c7.6325,0 13.76,6.1275 13.76,13.76h6.88zM120.4,51.6l9.60781,9.60781l-18.20781,18.20781l-18.75875,-18.77219l-29.93875,26.21656l4.515,5.16l25.10125,-21.94344l19.08125,19.06781l23.07219,-23.07219l9.60781,9.60781v-24.08zM58.48,110.08v6.88h86v-6.88z"></path></g></g></svg>Projects Proposal And Reviews</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
width="20" height="20"
viewBox="0 0 172 172"
style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="#e9ecef"></path><g fill="#198754"><path d="M85.355,6.88c-0.37625,0.08063 -0.73906,0.22844 -1.075,0.43l-27.52,15.265c-0.1075,0.06719 -0.215,0.13438 -0.3225,0.215c-0.04031,0.04031 -0.06719,0.06719 -0.1075,0.1075c-0.04031,0.04031 -0.06719,0.06719 -0.1075,0.1075c-0.08062,0.06719 -0.14781,0.13438 -0.215,0.215c-0.16125,0.16125 -0.30906,0.34938 -0.43,0.5375c-0.04031,0.06719 -0.08062,0.14781 -0.1075,0.215c-0.04031,0.06719 -0.08062,0.14781 -0.1075,0.215c-0.04031,0.04031 -0.06719,0.06719 -0.1075,0.1075c0,0.04031 0,0.06719 0,0.1075c-0.04031,0.06719 -0.08062,0.14781 -0.1075,0.215c0,0.04031 0,0.06719 0,0.1075c0,0.06719 0,0.14781 0,0.215c-0.04031,0.13438 -0.08062,0.28219 -0.1075,0.43c-0.02687,0.215 -0.02687,0.43 0,0.645v11.2875l-32.68,18.1675c-1.075,0.61813 -1.73344,1.77375 -1.72,3.01v29.67l-11.61,6.45l-0.43,0.215c-0.1075,0.06719 -0.215,0.13438 -0.3225,0.215c-0.04031,0.04031 -0.06719,0.06719 -0.1075,0.1075c-0.04031,0.04031 -0.06719,0.06719 -0.1075,0.1075c-0.08062,0.06719 -0.14781,0.13438 -0.215,0.215c-0.08062,0.06719 -0.14781,0.13438 -0.215,0.215c-0.08062,0.1075 -0.14781,0.215 -0.215,0.3225c-0.04031,0.06719 -0.08062,0.14781 -0.1075,0.215c-0.04031,0.06719 -0.08062,0.14781 -0.1075,0.215c-0.04031,0.04031 -0.06719,0.06719 -0.1075,0.1075c0,0.04031 0,0.06719 0,0.1075c-0.04031,0.06719 -0.08062,0.14781 -0.1075,0.215c0,0.04031 0,0.06719 0,0.1075c0,0.06719 0,0.14781 0,0.215c-0.04031,0.13438 -0.08062,0.28219 -0.1075,0.43c-0.02687,0.215 -0.02687,0.43 0,0.645v30.2075c-0.01344,1.23625 0.645,2.39188 1.72,3.01l27.305,15.1575l0.215,0.1075c0.04031,0.04031 0.06719,0.06719 0.1075,0.1075c0.06719,0 0.14781,0 0.215,0c0.04031,0.04031 0.06719,0.06719 0.1075,0.1075c0.06719,0.04031 0.14781,0.08063 0.215,0.1075c0.04031,0 0.06719,0 0.1075,0c0.06719,0 0.14781,0 0.215,0c0.04031,0.04031 0.06719,0.06719 0.1075,0.1075c0.06719,0 0.14781,0 0.215,0c0.04031,0 0.06719,0 0.1075,0c0.06719,0 0.14781,0 0.215,0c0.04031,0 0.06719,0 0.1075,0c0.06719,0 0.14781,0 0.215,0c0.06719,0 0.14781,0 0.215,0c0.29563,-0.04031 0.57781,-0.1075 0.86,-0.215c0.04031,0 0.06719,0 0.1075,0c0.04031,-0.04031 0.06719,-0.06719 0.1075,-0.1075c0.06719,-0.02687 0.14781,-0.06719 0.215,-0.1075l0.3225,-0.215c0.06719,-0.02687 0.14781,-0.06719 0.215,-0.1075l5.6975,-3.1175l38.485,21.3925c1.06156,0.61813 2.37844,0.61813 3.44,0l38.485,-21.3925l6.02,3.3325c0.1075,0.08063 0.215,0.14781 0.3225,0.215c0.06719,0 0.14781,0 0.215,0c0.04031,0.04031 0.06719,0.06719 0.1075,0.1075c0.06719,0.04031 0.14781,0.08063 0.215,0.1075c0.04031,0 0.06719,0 0.1075,0c0.06719,0 0.14781,0 0.215,0c0.04031,0.04031 0.06719,0.06719 0.1075,0.1075c0.06719,0 0.14781,0 0.215,0c0.04031,0 0.06719,0 0.1075,0c0.06719,0 0.14781,0 0.215,0c0.04031,0 0.06719,0 0.1075,0c0.06719,0 0.14781,0 0.215,0c0.06719,0 0.14781,0 0.215,0c0.29563,-0.04031 0.57781,-0.1075 0.86,-0.215c0.04031,0 0.06719,0 0.1075,0c0.04031,-0.04031 0.06719,-0.06719 0.1075,-0.1075c0.06719,-0.02687 0.14781,-0.06719 0.215,-0.1075l0.3225,-0.215c0.06719,-0.02687 0.14781,-0.06719 0.215,-0.1075l26.9825,-14.9425c1.075,-0.61812 1.73344,-1.77375 1.72,-3.01v-28.81c0.90031,-1.08844 1.03469,-2.62031 0.33594,-3.85656c-0.68531,-1.23625 -2.05594,-1.92156 -3.45344,-1.73344l-10.6425,-5.9125v-29.67c0.01344,-1.23625 -0.645,-2.39187 -1.72,-3.01l-32.68,-18.1675v-9.89c0.90031,-1.08844 1.03469,-2.62031 0.33594,-3.85656c-0.68531,-1.23625 -2.05594,-1.92156 -3.45344,-1.73344l-26.1225,-14.5125c-0.61812,-0.34937 -1.33031,-0.49719 -2.0425,-0.43c-0.1075,0 -0.215,0 -0.3225,0zM86,14.2975l20.425,11.2875l-20.425,11.0725l-20.425,-11.0725zM61.92,31.39l20.64,11.18v23.005l-20.64,-11.395v-13.8675c0.20156,-0.65844 0.20156,-1.38406 0,-2.0425zM110.08,31.39v6.88c-0.18812,0.63156 -0.18812,1.30344 0,1.935v13.975l-20.64,11.395v-23.005zM55.04,45.2575v10.965c-0.01344,1.23625 0.645,2.39188 1.72,3.01l27.52,15.265c0.04031,0.04031 0.06719,0.06719 0.1075,0.1075c0.06719,0 0.14781,0 0.215,0c0.04031,0.04031 0.06719,0.06719 0.1075,0.1075c0.06719,0.04031 0.14781,0.08063 0.215,0.1075c0.04031,0 0.06719,0 0.1075,0c0.06719,0 0.14781,0 0.215,0c0.04031,0.04031 0.06719,0.06719 0.1075,0.1075c0.06719,0 0.14781,0 0.215,0c0.04031,0 0.06719,0 0.1075,0c0.06719,0 0.14781,0 0.215,0c0.04031,0 0.06719,0 0.1075,0c0.06719,0 0.14781,0 0.215,0c0.06719,0 0.14781,0 0.215,0c0.29563,-0.04031 0.57781,-0.1075 0.86,-0.215c0.04031,0 0.06719,0 0.1075,0c0.04031,-0.04031 0.06719,-0.06719 0.1075,-0.1075c0.06719,-0.02687 0.14781,-0.06719 0.215,-0.1075l0.3225,-0.215c0.06719,-0.02687 0.14781,-0.06719 0.215,-0.1075l26.9825,-14.9425c1.075,-0.61812 1.73344,-1.77375 1.72,-3.01v-10.965l27.52,15.265v23.7575l-8.6,-4.73c-0.61812,-0.34937 -1.33031,-0.49719 -2.0425,-0.43c-0.1075,0 -0.215,0 -0.3225,0c-0.37625,0.08063 -0.73906,0.22844 -1.075,0.43l-27.52,15.265c-0.06719,0.02688 -0.14781,0.06719 -0.215,0.1075c-0.08062,0.06719 -0.14781,0.13438 -0.215,0.215c-0.04031,0.04031 -0.06719,0.06719 -0.1075,0.1075c-0.08062,0.06719 -0.14781,0.13438 -0.215,0.215c-0.26875,0.28219 -0.48375,0.60469 -0.645,0.9675c-0.04031,0.04031 -0.06719,0.06719 -0.1075,0.1075c0,0.04031 0,0.06719 0,0.1075c-0.04031,0.06719 -0.08062,0.14781 -0.1075,0.215c-0.06719,0.24188 -0.09406,0.49719 -0.1075,0.7525c0,0.06719 0,0.14781 0,0.215v30.6375c-0.01344,1.23625 0.645,2.39188 1.72,3.01l14.19,7.8475l-33.11,18.3825l-33.11,-18.3825l14.19,-7.8475c1.075,-0.61812 1.73344,-1.77375 1.72,-3.01v-28.81c0.90031,-1.08844 1.03469,-2.62031 0.33594,-3.85656c-0.68531,-1.23625 -2.05594,-1.92156 -3.45344,-1.73344l-26.1225,-14.5125c-0.61812,-0.34937 -1.33031,-0.49719 -2.0425,-0.43c-0.1075,0 -0.215,0 -0.3225,0c-0.37625,0.08063 -0.73906,0.22844 -1.075,0.43l-8.6,4.73v-23.7575zM37.84,86.5375l20.425,11.2875l-20.425,11.0725l-20.425,-11.0725l7.74,-4.3l0.645,-0.3225c0.06719,-0.02687 0.14781,-0.06719 0.215,-0.1075l0.1075,-0.1075c0.06719,-0.02687 0.14781,-0.06719 0.215,-0.1075zM134.16,86.5375l11.825,6.5575c0.20156,0.13438 0.41656,0.24188 0.645,0.3225l7.955,4.4075l-20.425,11.0725l-20.425,-11.0725zM13.76,103.63l20.64,11.18v23.005l-20.64,-11.395zM61.92,103.63v22.79l-17.415,9.675h-0.1075c-0.06719,0.02688 -0.14781,0.06719 -0.215,0.1075c-0.22844,0.08063 -0.44344,0.18813 -0.645,0.3225c-0.08062,0.06719 -0.14781,0.13438 -0.215,0.215l-2.0425,1.075v-23.005zM110.08,103.63l20.64,11.18v23.005l-2.365,-1.29c-0.04031,-0.04031 -0.06719,-0.06719 -0.1075,-0.1075l-0.215,-0.1075c-0.1075,-0.04031 -0.215,-0.08062 -0.3225,-0.1075l-17.63,-9.7825zM158.24,103.63v22.79l-20.64,11.395v-23.005z"></path></g></g></svg>Project Integration Management</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
width="20" height="20"
viewBox="0 0 172 172"
style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="#e9ecef"></path><g><path d="M86,154.08333c-37.44583,0 -68.08333,-30.6375 -68.08333,-68.08333c0,-37.44583 30.6375,-68.08333 68.08333,-68.08333c37.44583,0 68.08333,30.6375 68.08333,68.08333c0,37.44583 -30.6375,68.08333 -68.08333,68.08333zM86,28.66667c-31.53333,0 -57.33333,25.8 -57.33333,57.33333c0,31.53333 25.8,57.33333 57.33333,57.33333c31.53333,0 57.33333,-25.8 57.33333,-57.33333c0,-31.53333 -25.8,-57.33333 -57.33333,-57.33333z" fill="#198754"></path><path d="M86,129c-23.71092,0 -43,-19.28908 -43,-43c0,-23.71092 19.28908,-43 43,-43c23.71092,0 43,19.28908 43,43c0,23.71092 -19.28908,43 -43,43zM86,50.16667c-19.7585,0 -35.83333,16.07483 -35.83333,35.83333c0,19.7585 16.07483,35.83333 35.83333,35.83333c19.7585,0 35.83333,-16.07483 35.83333,-35.83333c0,-19.7585 -16.07483,-35.83333 -35.83333,-35.83333z" fill="#198754"></path><rect x="23" y="13" transform="scale(3.58333,3.58333)" width="2" height="22" fill="#198754"></rect><rect x="13" y="23" transform="scale(3.58333,3.58333)" width="22" height="2" fill="#198754"></rect><rect x="22" y="3" transform="scale(3.58333,3.58333)" width="4" height="13" fill="#37474f"></rect><rect x="22" y="32" transform="scale(3.58333,3.58333)" width="4" height="13" fill="#37474f"></rect><rect x="32" y="22" transform="scale(3.58333,3.58333)" width="13" height="4" fill="#37474f"></rect><rect x="3" y="22" transform="scale(3.58333,3.58333)" width="13" height="4" fill="#37474f"></rect></g></g></svg>Project Scope Management</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
width="20" height="20"
viewBox="0 0 172 172"
style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="#e9ecef"></path><g fill="#198754"><path d="M48.16,0c-6.57094,0 -12.92687,1.10188 -18.92,3.73563c-1.15562,0.45687 -1.97531,1.51844 -2.12312,2.76812c-0.16125,1.24969 0.37625,2.4725 1.3975,3.19813c1.00781,0.73906 2.35156,0.86 3.48031,0.3225c5.01219,-2.19031 10.36031,-3.14438 16.16531,-3.14438c22.92438,0 41.28,18.35563 41.28,41.28c0,22.92438 -18.35562,41.28 -41.28,41.28c-22.92437,0 -41.28,-18.35562 -41.28,-41.28c0,-10.45437 4.00438,-19.80687 10.32,-27.22437v8.98969c-0.01344,1.23625 0.63156,2.39187 1.70656,3.02344c1.075,0.61813 2.39187,0.61813 3.46687,0c1.075,-0.63156 1.72,-1.78719 1.70656,-3.02344v-19.60531h-19.60531c-1.23625,-0.01344 -2.39187,0.63156 -3.02344,1.70656c-0.61812,1.075 -0.61812,2.39187 0,3.46687c0.63156,1.075 1.78719,1.72 3.02344,1.70656h6.85313c-6.90688,8.42531 -11.32781,19.10813 -11.32781,30.96c0,26.61969 21.54031,48.16 48.16,48.16c26.61969,0 48.16,-21.54031 48.16,-48.16c0,-26.61969 -21.54031,-48.16 -48.16,-48.16zM130.72,0c-3.7625,0 -6.88,3.1175 -6.88,6.88v6.88h-32.7875c1.74688,2.16344 3.30563,4.47469 4.70313,6.88h28.08437v6.88c0,3.7625 3.1175,6.88 6.88,6.88h6.88c3.7625,0 6.88,-3.1175 6.88,-6.88v-6.88h17.2v24.08h-58.65469c0.06719,1.14219 0.17469,2.27094 0.17469,3.44c0,1.16906 -0.1075,2.29781 -0.17469,3.44h58.65469v106.64h-144.48v-64.6075c-2.45906,-1.67969 -4.73,-3.57437 -6.88,-5.60344v70.21094c0,3.99094 2.88906,6.88 6.88,6.88h144.48c3.99094,0 6.88,-2.88906 6.88,-6.88v-137.6c0,-3.99094 -2.88906,-6.88 -6.88,-6.88h-17.2v-6.88c0,-3.7625 -3.1175,-6.88 -6.88,-6.88zM130.72,6.88h6.88v20.64h-6.88zM48.10625,17.14625c-1.89469,0.04031 -3.41312,1.59906 -3.38625,3.49375v26.96906c-0.1075,0.73906 0.01344,1.49156 0.37625,2.15c0.30906,0.61812 0.80625,1.12875 1.41094,1.46469l13.35688,10.01094c1.51844,1.14219 3.66844,0.83313 4.81062,-0.69875c1.14219,-1.51844 0.83313,-3.66844 -0.69875,-4.81062l-12.37594,-9.28531v-25.8c0.01344,-0.92719 -0.34937,-1.8275 -1.00781,-2.48594c-0.65844,-0.65844 -1.55875,-1.02125 -2.48594,-1.00781zM100.405,65.36c-0.77937,2.37844 -1.74687,4.66281 -2.83531,6.88h12.51031v17.2h-24.08v24.08h-17.2v-14.36469c-2.21719,0.90031 -4.52844,1.62594 -6.88,2.23062v12.13406h-17.2v-10.49469c-2.33812,-0.14781 -4.63594,-0.40313 -6.88,-0.83313v42.28781h103.2v-79.12zM116.96,72.24h17.2v17.2h-17.2zM92.88,96.32h17.2v17.2h-17.2zM116.96,96.32h17.2v17.2h-17.2zM44.72,120.4h17.2v17.2h-17.2zM68.8,120.4h17.2v17.2h-17.2zM92.88,120.4h17.2v17.2h-17.2zM116.96,120.4h17.2v17.2h-17.2z"></path></g></g></svg>Project Schedule Management</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Project Cost Management</a></li>
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
            <li><a class="dropdown-item" href="#">Project Stakeholders Management</a></li>
      
 -->

</ul>
    


</div><!--col-md-4-->

<div class='col-md-9  bg-body ' >
<div class='row  bg-body p-3 h-auto '>
        <div class='col-12 text-muted h3 fw-bold'>
                History
          </div>
<table class="table">
  <thead>
    <tr>
      
      <th scope="col" >Project Name</th>
      <th scope="col">Project Module</th>
      <th scope="col">Date</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      
      <td class='text-success fw-bold'>Product lifecycle management</td>
      <td class='text-dark'>Risk</td>
      <td>7 jan 2021</td>
      <td><button class='btn btn-success btn-sm '>view</td>
    </tr>
    <tr>
     
    <!-- <td class='text-success fw-bold'>Product lifecycle management</td>
      <td>Schdule</td>
      <td>7 jan 2021</td>
      <td><button class='btn btn-success btn-sm'>view</td></tr>

    <tr>
     
    <td class='text-success fw-bold'>Product lifecycle management</td>
      <td>Cost</td>
      <td>7 jan 2021</td>
      <td><button class='btn btn-success btn-sm'>view</td></tr>


      <tr>
     
     <td class='text-success fw-bold'>Product lifecycle management</td>
       <td>Cost</td>
       <td>7 jan 2021</td>
       <td><button class='btn btn-success btn-sm'>view</td></tr>

       <tr>
     
     <td class='text-success fw-bold'>Product lifecycle management</td>
       <td>Cost</td>
       <td>7 jan 2021</td>
       <td><button class='btn btn-success btn-sm'>view</td></tr>


       <tr>
     
     <td class='text-success fw-bold'>Product lifecycle management</td>
       <td>Cost</td>
       <td>7 jan 2021</td>
       <td><button class='btn btn-success btn-sm'>view</td></tr>


       <tr>
     
     <td class='text-success fw-bold'>Product lifecycle management</td>
       <td>Cost</td>
       <td>7 jan 2021</td>
       <td><button class='btn btn-success btn-sm'>view</td></tr>

       <tr>
     
     <td class='text-success fw-bold'>Product lifecycle management</td>
       <td>Cost</td>
       <td>7 jan 2021</td>
       <td><button class='btn btn-success btn-sm'>view</td></tr>

       <tr>
     
     <td class='text-success fw-bold'>Product lifecycle management</td>
       <td>Cost</td>
       <td>7 jan 2021</td>
       <td><button class='btn btn-success btn-sm'>view</td></tr>

       <tr>
     
     <td class='text-success fw-bold'>Product lifecycle management</td>
       <td>Cost</td>
       <td>7 jan 2021</td>
       <td><button class='btn btn-success btn-sm'>view</td></tr>


       <tr>
     
     <td class='text-success fw-bold'>Product lifecycle management</td>
       <td>Cost</td>
       <td>7 jan 2021</td>
       <td><button class='btn btn-success btn-sm'>view</td></tr>


       <tr>
     
     <td class='text-success fw-bold'>Product lifecycle management</td>
       <td>Cost</td>
       <td>7 jan 2021</td>
       <td><button class='btn btn-success btn-sm'>view</td></tr>


       <tr>
     
     <td class='text-success fw-bold'>Product lifecycle management</td>
       <td>Cost</td>
       <td>7 jan 2021</td>
       <td><button class='btn btn-success btn-sm'>view</td></tr>

       <tr>
     
     <td class='text-success fw-bold'>Product lifecycle management</td>
       <td>Cost</td>
       <td>7 jan 2021</td>
       <td><button class='btn btn-success btn-sm'>view</td></tr> -->
  </tbody>
</table> 
</div><!--bg-light-->
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
    <script src='js/just-validate.js'></script>
    <script>
        var vali=0;
        $(document).ready(function(){
        

          
      

          
 
          $( "#datepicker" ).datepicker();
         
         
            $(".project_id").on("blur",function(){
               // console.log($(this).val());
                var p_id=$(this).val();
               // console.log($("#datepicker").val());

                $.ajax({
                 url:"php/admin/find_project.php",
                 method:"post",
                 data:{id:p_id},
                 beforeSend:function(){
                     $("#p_error").text('');
                 },
                 success:function(data){
                     if(data=="yes"){
                        $("#p_error").text(''); 
                        vali=0;  
                     }
                     else{
                        $("#p_error").text("this project id don't exist");
                        vali++;
console.log(vali);
                     }

                 }

                });
                    
  
});
           });
        </script>


<script>
    function validate_p_id(){
  console.log("come");
          // return false;
          if(vali==0){
              return true;
          }
          else{
            return false;
          }
         
          
        }

  </script>
      






</body>
</html>