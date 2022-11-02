<?php
    session_start();
    include "functions/posts-functions.php";

    $posts_result = getPostDetails($_GET['post_id']);

    if(isset($_POST['update_post'])){
         updatePostuser($_GET['post_id']);
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog: Edit Post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/main-style.css">
    <link rel="stylesheet" href="css/add-post.css">
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


    
    <main class="container w-50 mx-auto">

        <a href="posts.php" class="text-secondary"><i class="fas fa-chevron-left fa-2x"></i></a>

        <h2 class="display-4 text-center my-4"><i class="far fa-edit me-1"></i>Add Post</h2>

        <div class="col-10 mx-auto ">
            <form method="post">
                <input type="text" value="<?= $posts_result['post_title'] ?>" name="title" class="form-control mb-3 border-3 border-info border-top-0 border-end-0 border-start-0 rounded-0" placeholder="TITLE" required autofocus>


                <input type="date" name="date_posted" value="<?= $posts_result['date_posted'] ?>" class="form-control mb-3 border-3 border-dark border-top-0 border-end-0 border-start-0 rounded-0" required>

                <select name="category_id" class="form-select mb-3 border-3 border-dark border-top-0 border-end-0 border-start-0 rounded-0" required>
                    <option value="" hidden>CATEGORY</option>
                    <?php                            
                            $categories_result = gettAllCategories();
                            while($categories_row = $categories_result->fetch_assoc()){
                                if($categories_row['category_id'] == $posts_result['category_id']){                                        
                        ?>
                                <option value="<?= $categories_row['category_id'] ?>" selected>
                                    <?= $categories_row['category_name'] ?>
                                </option>
                                
                        <?php
                            }else{
                        ?>
                                <option value="<?= $categories_row['category_id'] ?>">
                                    <?= $categories_row['category_name'] ?>
                                </option>

                        <?php
                                }
                        }
                          
                    ?>
                </select>

                <textarea name="message" value="" class="form-control mb-3 border-3 border-dark" rows="7" placeholder="MESSAGE"><?= $posts_result['post_message'] ?></textarea>

                <div class="input-group">
                    <span class="input-group-text bg-dark bg-opacity-75 rounded-0 text-white">Author</span>               
                    <select name="author_id" class= "form-select border-3 border-dark border-top-0 border-end-0 border-start-0 rounded-0">
                        <?php                            
                            $account_result = getUser();
                            while($account_row = $account_result->fetch_assoc()){
                                if($account_row['account_id'] == $posts_result['account_id']){                                        
                        ?>
                                <option value="<?= $account_row['account_id'] ?>" selected>
                                    <?= $account_row['username'] ?>
                                </option>

                        <?php
                            }
                        }
                          
                        ?>
                    </select>
                </div>
                
                <button type="submit" name="update_post" class="btn btn-dark w-100 my-5 text-uppercase">Update Post</button>
            </form>
        </div>
    </main>
</body>

</html>