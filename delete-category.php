<?php
    include "functions/categories-functions.php";


    $cat_details = getCategory($_GET['cat_id']);

    $cat_id = $_GET['cat_id'];

    if(isset($_POST['btn_delete'])){
        deleteCategory($cat_id);
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog: Update Category</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/main-style.css">
    <link rel="stylesheet" href="css/update-category.css">
</head>

<body>

    <main class="card w-25 mx-auto border-0 my-5">
        <div class="card-header bg-white border-0">
            <h2 class="card-title text-center text-danger h4 mb-0">Delete Product</h2>
        </div>
        <div class="card-body">
            <div class="text-center mb-4">
                <i class="fas fa-exclamation-triangle text-warning display-4 d-block mb-2"></i>
                <p class="fw-bold mb-0">Are you sure you want to delete "<?= $cat_details['category_name'] ?>?" </p>
            </div>
            <div class="row">
                <div class="col">
                    <a href="categories.php" class="btn btn-secondary w-100">Cancel</a>
                </div>
                <div class="col">
                    <form method="post">
                        <button type="submit" class="btn btn-outline-danger w-100" name="btn_delete">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </main>

</body>
</html>