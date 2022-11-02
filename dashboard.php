<?php
    session_start();

    include "functions/dashboard-functions.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>

    <header>
         <?php 
            include "admin-menu.php"; 
         ?>

        <div class="container-fluid bg-danger bg-gradient text-white p-4 ps-5">
            <h2 class="display-2"><i class="fas fa-user-cog me-3"></i>Dashboard</h2>
        </div>
    </header>


    <main class="container">
        <h3 class="h4 text-muted fw-bold text-uppercase">All Posts</h3>
        <div class="row">
            <div class="col-9">
                <table class="table table-striped table-hover">
                    <thead class="table-dark">
                        <th>#</th>
                        <th>TITLE</th>
                        <th>AUTHOR</th>
                        <th>CATEGORY</th>
                        <th>DATE POSTED</th>
                        <th></th>
                    </thead>
                    <tbody>
                    <?php
                        displayAllPosts();
                    ?>
                    </tbody>
                </table>
            </div> 
            <nav class="col-3">
                <div class="card bg-primary mb-4 border-5">
                    <div class="card-body text-center text-white">
                        <h3>Posts</h3>
                        <p class="fs-4"><i class="fas fa-pencil-alt"></i> </p>
                        <a href="posts.php" class="btn btn-outline-light btn-sm fw-bold text-uppercase">view</a>
                    </div>
                </div>
                
                <div class="card bg-success mb-4 border-5">
                    <div class="card-body text-center text-white">
                        <h3>Categories</h3>
                        <p class="fs-4"><i class="far fa-folder-open"></i></p>
                        <a href="categories.php" class="btn btn-outline-light btn-sm fw-bold text-uppercase">view</a>
                    </div>
                </div>

                <div class="card bg-warning border-5">
                    <div class="card-body text-center text-white">
                        <h3>Users</h3>
                        <p class="fs-4"><i class="fas fa-users"></i> </p>
                        <a href="users.php" class="btn btn-outline-light btn-sm fw-bold text-uppercase">view</a>
                    </div>
                </div>
            </nav>
        </div>
    </main>




    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>