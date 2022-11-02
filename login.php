<?php
    include "functions/users-functions.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>

    <main class="container">
        <div class="card mx-auto w-50 border border-0">
            <div class="card-header bg-white border-0">
                <h1 class="text-center text-uppercase mb-4">Login</h1>
            </div>
            <div class="card-body">
                <?php
                if (isset($_POST['login'])) {
                    login();
                }
                ?>
                <form action="" method="post">
                    <input type="text" name="username" class="form-control mb-4  border-2 border-primary border-top-0 border-end-0 border-start-0 rounded-0" placeholder="USERNAME" required autofocus>
                    <input type="password" name="password" class="form-control mb-5 border-3 border-dark border-top-0 border-end-0 border-start-0 rounded-0" placeholder="PASSWORD" required>
                    <button type="submit" name="login" class="btn btn-success text-uppercase py-2 w-100">Enter</button>
                </form>
            </div>
            <div class="card-footer bg-white border-0">
                <div class="row">
                    <div class="col-6 text-center">
                        <a href="register.php" class="text-dark">Create an Account</a>
                    </div>
                    <div class="col-6 text-center">
                        <h6><a href="recover.php" class="text-dark">Recover Account</a></h6>
                    </div>
                </div>
            </div>
        </div>
    </main>




    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>