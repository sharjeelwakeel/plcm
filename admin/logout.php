<?php
$conn=mysqli_connect("localhost","root","","product_lifecycle_managment");
if(!$conn){
    echo"database connection dont build";
    exit(1);

}

if(isset($_REQUEST['signup'])){
    $email=mysqli_real_escape_string($conn,$_REQUEST['email']);
    $password=mysqli_real_escape_string($conn,$_REQUEST['pass']);
    
    if(mysqli_query($conn,"insert into user (email,password)values('".$email."','".$password."')"))
    {
      header("location:signin.php");
    }
    else{
        echo"not done";
    }

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

    <title>PLCM-create account</title>
    <style>
        .container-fluid,.wrapper{
            width:100vw;
            height:100vh;
        }
  form{
      width:100%;
      max-width:600px;
      background-color: #1A2226!important;;
      color:#0DB8DE;
  }
  .bg{
      background-color:#0DB8DE;
  }
  .color{
    color:#0DB8DE;
  }
    </style>
  </head>
  <body>
    <div class='container-fluid bg'>
        <div class='container d-flex justify-content-center align-items-center wrapper'>
            <form class='form shadow p-3 mb-5  rounded ' >
                
                  <div class='text-end'>
                      <button class='btn bg text-light' name='signup'>sign up</button>
                  </div>
            </form>


        </div>


    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>
