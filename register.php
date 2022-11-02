    <?php
    include "functions/users-functions.php";

    if(isset($_POST['register'])){
         
        $password = $_POST['password'];
        $confim_password = $_POST['confirm_password'];
        
        if($password == $confim_password){
            register();
        }else{
            echo "<p class='text-danger'>Password and confirm password do not match</p>";
        }
        
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body class="bg-light">

   <div style="height: 100vh;">
      <div class="row h-100 m-0">
         <div class="card w-25 mx-auto my-auto p-0">
            <div class="card-header text-success">
               <h1 class="card-title h3 mb-0">Registration Form</h1>
            </div>
            <div class="card-body">
               <form action="" method="post">
                   <div class="row">
                       <div class="col">
                            <label for="first-name" class="small">First Name</label>
                            <input type="text" name="first_name" id="first-name" class="form-control mb-2" required autofocus>
                       </div>
                       <div class="col">
                            <label for="last-name" class="small">Last Name</label>
                            <input type="text" name="last_name" id="last-name" class="form-control mb-2" required>
                       </div>
                   </div>
                  
                
                <label for="address" class="small font-weight-bold">Address</label>
                <input type="text" name="address" id="address" class="form-control mb-2" maxlength="15" required>

                <label for="contact_number" class="small font-weight-bold">Contact Number</label>
                <input type="text" name="contact_number" id="contact_number" class="form-control mb-2" maxlength="15" required>

                <label for="username" class="small font-weight-bold">Username</label>
                <input type="text" name="username" id="username" class="form-control mb-2 fw-bold" maxlength="15" required>

                <label for="password" class="small">Password</label>
                <input type="password" name="password" id="password" class="form-control mb-2" required>

                <label for="confirm-password" class="small">Confirm Password</label>
                <input type="password" name="confirm_password" id="confirm-password" class="form-control mb-5">

                <button type="submit" class="btn btn-success w-100" name="register">Sign up</button>
               </form>

               <div class="text-center mt-3">
                  <p class="small">Already have an account? <a href="login.php">Log in.</a></p>
               </div>
            </div>
         </div>
      </div>
   </div>




    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>