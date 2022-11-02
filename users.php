<?php
    session_start();

    include "functions/users-functions.php"; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>

    <header>
         <?php include "admin-menu.php";?>
        <div class="container-fluid bg-warning bg-gradient text-white p-4 ps-5">
            <h2 class="display-2"><i class="fas fa-user-edit me-3"></i>User</h2>
        </div>
    </header>


    <main class="container">
        <div class="w-50 mx-auto">
            <form method="post">
                <h3 class="display-4">Add User</h3>
                <div class="row mb-2">
                    <div class="col-6">
                        <input type="text" name="first_name" class="form-control" placeholder="First Name" required autofocus>
                    </div>
                    <div class="col-6">
                        <input type="text" name="last_name" class="form-control" placeholder="Last Name" required>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-6">
                        <input type="text" name="contact_number" class="form-control" placeholder="Contact Number" required>
                    </div>
                    <div class="col-6">
                        <input type="text" name="address" class="form-control" placeholder="Address" required>
                    </div>
                </div>
                <input type="text" name="username" class="form-control mb-2" placeholder="Username" required>
                <input type="password" name="password" class="form-control mb-3" placeholder="Password" minlength="3" required>
                <input type="password" name="confirm_password" class="form-control mb-3" placeholder="Confirm Password" minlength="3" required>
                <!-- <a href="user" type="submit" name="add" class="btn btn-warning w-100 text-uppercase text-white fw-bold">Add</a> -->
                <button type="submit" name="add" class="btn btn-warning w-100 text-uppercase text-white fw-bold">Add</button>
            </form>
            <?php
                if(isset($_POST['add'])){
         
                    $password = $_POST['password'];
                    $confim_password = $_POST['confirm_password'];
                    
                    if($password == $confim_password){
                        addUser();
                    }else{
                        echo "<p class='text-danger'>Password and confirm password do not match</p>";
                    }
                    
                }
            ?>
        </div>
        
        <table class="table table-hover table-striped my-5">
            <thead class="table-dark text-uppercase">
                <th>Account ID</th>
                <th>Full Name</th>
                <th>Contact Number</th>
                <th>Address</th>
                <th>Username</th>
                <th></th>
                <th></th>
            </thead>
            <tbody>
                <?php
                    displayAllUsers();
                ?>
            </tbody>
        </table>
    </main>




    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>