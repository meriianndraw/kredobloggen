<?php
    session_start();

    include "functions/categories-functions.php";

    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    

</head>
<body>
       <header>
        <?php include 'admin-menu.php';?>
        <div class="container-fluid bg-success bg-gradient text-white p-4 ps-5">
            <h2 class="display-2"><i class="fas fa-folder me-3"></i>Category</h2>
        </div>
    </header>
    

    <main class="container mt-4">
        <div class="w-50 mx-auto">
            <form action="" method="post">
                <div class="row">
                    <div class="col text-end">
                        <label for="category-name" class="mt-2">Add Category</label>
                    </div>
                    <div class="col ps-0">
                        <input type="text" name="category_name" id="category-name" class="form-control" required autofocus>
                    </div>
                    <div class="col px-0">
                        <button type="submit" name="add" class="btn btn-success text-uppercase fw-bold">Add</button>
                    </div>
                </div>
            </form>
           <?php
                if(isset($_POST['add'])){

                    addCategory();
                }
           ?>
        </div>
        
        <table class="table table-striped table-hover w-50 mx-auto text-center mt-5">
            <thead class="table-dark text-uppercase">
                <th>Category ID</th>
                <th>Category Name</th>
                <th></th>
                <th></th>
            </thead>
            <tbody>
                <?php
                    displayCategories();
                ?>
            </tbody>
        </table>
        
    </main>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
</body>
</html>