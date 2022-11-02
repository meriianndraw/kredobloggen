<?php
    session_start();


    include "functions/posts-functions.php"; 

    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog: Post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/main-style.css">
</head>

<body>
    <header>
        <?php 
        if($_SESSION['role'] == "U"){
            include 'user-menu.php';
        } else {
            include 'admin-menu.php';
        }
        ?>
        <div class="container-fluid bg-primary bg-gradient text-white p-4 ps-5">
            <h2 class="display-2"><i class="fas fa-pen-nib me-3"></i>Post</h2>        
        </div>
    </header>

    <main class="container">
        <div class="text-end">

            <?php
                $account_result = getUser();
                while($account_row = $account_result->fetch_assoc()){
                    if($account_row['account_id'] == $_SESSION['account_id']){
                        $account_id = $_SESSION['account_id'];
                    }

                }
                // echo $account_id;
            ?>

            
            <a href="add-post.php?account_id=<?= $account_id ?>" class="btn btn-lg btn-outline-dark"><i class="fas fa-edit"></i> Add Post</a>
            
        </div>
        <table class="table table-hover table-striped mt-3">
            <thead class="table-dark">
                <th>POST ID</th>
                <th>TITLE</th>
                <th>CATEGORY</th>
                <th>DATE POSTED</th>
                <th></th>
            </thead>
            <tbody>
                <?php
                    displayUserPosts($account_id);
                ?>
            </tbody>
        </table>
    </main>
</body>

</html>