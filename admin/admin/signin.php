<?php
$conn=mysqli_connect("localhost","root","","product_lifecycle_managment");
if(!$conn){
    echo"database connection dont build";
    exit(1);

}

if(isset($_REQUEST['signup'])){
    $email=mysqli_real_escape_string($conn,$_REQUEST['email']);
    $password=mysqli_real_escape_string($conn,$_REQUEST['pass']);
    $result=mysqli_query($conn,"select * from user where email='".$email."' and password='".$password."'");
    if(mysqli_num_rows($result)>0)
    {
        header("location:logout.php");
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
  .error{
    display:none;
  }
    </style>
  </head>
  <body>
    <div class='container-fluid bg'>
        <div class='container d-flex justify-content-center align-items-center wrapper'>
            <form class='form shadow p-3 mb-5  rounded js-form ' method="POST" action=''>
                <div class='text-center h2'>PRODUCT LIFECYCLE MANAGEMENT</div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" name='email' data-validate-field='email' placeholder="email">
                  </div>
                  <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name='pass' data-validate-field='password' placeholder="password">
                  </div>
                  <div class='error text-danger '>email and password invalid</div>
                  <div class="mb-3">
                  <span class='color'>Don't  have Account?</span><a href='create_account.php' class='color text-decoration-none'>sign up</a>
                  </div>
                
                  <div class='text-end'>
                      <button class='btn bg text-light' name='signin'>sign in</button>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src='js/just-validate.js'></script>
   
   <script>
      $(document).ready(function(){

      

  new JustValidate('.js-form', {
    rules: {
  
      email: {
        required: true,
        email: true
      },
      password: {
        required:true
       
        
    },

  },

    messages: {
      password: {
        minLength: 'My custom message about only minLength rule'
      },
      email: {
        required:"this field is required"
      }
   

    },

    submitHandler: function (form, values, ajax) {

      ajax({
        url: 'php/admin_panel/signin.php',
        method: 'POST',
        data: values,
        async: true,
        callback: function(response)  {
          if(response=="success"){
            window.location.replace("logout.php");

          }
          else{
            console.log("hello");
                        $(".error").slideDown();

          }
        }
      });
    },
  

  })
});
</script>

  </body>
</html>
