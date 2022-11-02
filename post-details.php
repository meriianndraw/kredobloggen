<?php
    session_start();
    
    include "functions/posts-functions.php";

    $post_row = getPostDetails($_GET['post_id']);
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog: Post Details</title>
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
    <main class="container w-50 ">
        <div class="row mb-4">
            <a href="posts.php" class="text-secondary col"><i class="fas fa-chevron-left fa-2x"></i></a>
           <?php
            // if($_SESSION['account_id'] == $post_row['account_id']){
                if($_SESSION['role'] == "U"){
                ?>
                    <a href="edit-post-by-user.php?post_id=<?= $_GET['post_id'] ?>" class="text-secondary col text-end text-decoration-none" style="font-size: 1.5em"><i class="fas fa-pen me-1"></i>Edit</a>
                <?php
                } else {
                ?>
                    <a href="edit-post-by-admin.php?post_id=<?= $_GET['post_id'] ?>" class="text-secondary col text-end text-decoration-none" style="font-size: 1.5em"><i class="fas fa-pen me-1"></i>Edit</a>
                <?php
                }
            // } 
            ?>
        </div>

        <article class="bg-light p-3">
            <h1 class="display-5"><?= $post_row['post_title'] ?></h1>
            <p class="small">
                By: <span class="text-primary"><?= $post_row['first_name'] . " " . $post_row['last_name']?></span>
                &emsp;
                <?= $post_row['date_posted'] ?>
                &emsp;
                <?= $post_row['category_name'] ?>
            </p>

            <p class="lead mt-5"><?= nl2br($post_row['post_message']) ?></p>
        </article>
    </main>
</body>

</html>