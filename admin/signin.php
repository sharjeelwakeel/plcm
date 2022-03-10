

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>login-plcm</title>
    <link rel='stylesheet' href='css/style.css'>
  </head>
  <body>
    <div class='container-fluid wrapper'>
       <div class='row m-0'>
           <div class='col-md-7 d-md-flex d-none'>
              <img src='web_material/plcm.svg' width='100%' height='400'>

            </div>    

           <div class='col-md-5 col-12 '>
             <div class='button align-self-end mt-1'>
              <a href='create_account.php'> <button class='btn btn-outline-success '>create admin</button></a>

                </div>

        <form method='POST' class=' js-form shadow p-3 bg-body rounded form my-auto'  width='100%'>
          <div class='text-center h2 text-muted'>PLCM
           </div>
           <div class='text-muted h3 text-center'>sign in</div>

          <label class='form-label text-muted h6'>email</label>
          <input type='email' class='form-control' placeholder='enter your email' name='email' data-validate-field='email'>
          <label class='form-label text-muted mt-2 h6'  >password</label>
          <input type='password' class='form-control'  placeholder='enter your password' name='password' data-validate-field='password'>
             <div class='error text-danger'>email and password invalid</div>
          <div class='text-end'>
                
          <!-- <a class='btn btn-outline-success mt-2' href='index.php'>sign in</a> -->
          <button class='btn btn-outline-success mt-2' name='signin' >sign in</button>
           </div>


      </form>
            
           </div>
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
        url: 'php/admin/signin.php',
        method: 'POST',
        data: values,
        async: true,
        callback: function(response)  {
        
          var data=JSON.parse(response);
          if(data['status']=="success"){
            window.location.replace("index.php?id="+data['id']);

          }
          else{
            
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
