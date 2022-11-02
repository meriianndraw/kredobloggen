<?php
    require_once "connection.php";


    // //function displayCategories
    function displayCategories(){
        $conn = connection();

        $sql = "SELECT * FROM categories";

        if($result = $conn->query($sql)){
            if($result->num_rows > 0){
                echo "<option value='' hidden>CATEGORY</option>";
                while($row = $result->fetch_assoc()){
                    echo "<option value='".$row['category_id']."'>".$row['category_name']."</option>";
                }
            }else{
                echo "<option value='' hidden>No Category Found</option>";
            }
        } else {
            die("Error: " . $conn->error);
        }
    }//end function displayCategories


    //get all sections
    function gettAllCategories(){
        //connection
        $conn = connection();

        //sql
        $sql = "SELECT * FROM categories";

        //execution
        if($result = $conn->query($sql)){
            return $result;
        }else {
            die("Error retrieving all sections: " . $conn->error);
        }
    }//end get all sections




    // //function displayUsers()
    // function displayUsers(){
    //     $conn = connection();
    //     $sql = "SELECT account_id, username FROM accounts";

    //     if($result = $conn->query($sql)){
    //         if($result->num_rows > 0){
    //             while($row = $result->fetch_assoc()){
    //                 echo "<option value='".$row['account_id']."'>".$row['username']."</option>";
    //             }
    //         }else{
    //             echo "<option value='' hidden>No Records Found</option>";
    //         }
    //     } else{
    //         die("Error: " . $conn->error);
    //     }
    // }//end function displayUsers()



    //function getUsername()
    function getUser(){
        $conn = connection();

        $sql = "SELECT * FROM accounts";

        if($result = $conn->query($sql)){
            return $result;
        }else{
            die("Error retrieving username: " . $conn->error);
        }
    }//end function getUser()



    //function addPost
    function addPost(){
        $conn = connection();

        $title = $_POST['title'];
        $date_posted = $_POST['date_posted'];
        $category_id = $_POST['category_id'];
        $message = $_POST['message'];
        $author_id = $_POST['author_id'];

        $sql = "INSERT INTO posts (post_title, post_message, date_posted, account_id, category_id) VALUES ('$title','$message', '$date_posted', $author_id, $category_id)";

        if($conn->query($sql)){
            header("location: posts.php");
            exit;
        }else{
            die("Error: " . $conn->error);
        }
    }//end function addPost
 


    //function displayUserPosts()
    function displayUserPosts($account_id){
        $conn = connection();

        $sql = "SELECT * FROM posts INNER JOIN categories ON categories.category_id = posts.category_id WHERE account_id = $account_id ORDER BY date_posted";

        if($result = $conn->query($sql)){
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    echo "
                        <tr>
                            <td>".$row['post_id']."</td>
                            <td>".$row['post_title']."</td>
                            <td>".$row['category_name']."</td>
                            <td>".$row['date_posted']."</td>
                            <td>
                                <a href='post-details.php?post_id=".$row['post_id']."' class='btn btn-sm btn-outline-dark'><i class='fas fa-angle-double-right'></i> Details</a>
                            </td>
                        </tr>
                    ";
                }
            } else {
                echo "<tr>
                    <td colspan='5' class='text-center lead fst-italic fw-bold'>
                        No Records Found
                    </td>
                </tr>";
            }
        } else {
            die("Error: " . $conn->error);
        }
    }//end function displayUserPosts()



    

    //function getPostDetailes() 
    function getPostDetails($post_id){
        $conn = connection();
        
        $sql = "SELECT * FROM posts 
                INNER JOIN categories ON categories.category_id = posts.category_id 
                INNER JOIN users ON users.account_id = posts.account_id 
                WHERE post_id = $post_id";

        if($result = $conn->query($sql)){
            return $result->fetch_assoc();
        } else {
            die("Error: ". $conn->error);
        }        
    }//end function getPostDetailes()



    //function updatePostuser()
    function updatePostuser($post_id){
        $conn = connection();
        $title = $_POST['title'];
        $date_posted = $_POST['date_posted'];
        $category_id = $_POST['category_id'];
        $author_id = $_POST['author_id'];
        $message = $_POST['message'];

        $sql = "UPDATE posts 
                SET post_title = '$title',
                    date_posted = '$date_posted',
                    category_id = $category_id,
                    post_message = '$message',
                    account_id = $author_id
                WHERE post_id = $post_id";

        if($conn->query($sql)){
            header("location: posts.php");
            exit;
        }else{
            die("Error: " . $conn->error);
        }
    }//end function updatePostuser()

    //function updatePostuser()
    function updatePostadmin($post_id){
        $conn = connection();
        $title = $_POST['title'];
        $date_posted = $_POST['date_posted'];
        $category_id = $_POST['category_id'];
        $author_id = $_POST['author_id'];
        $message = $_POST['message'];

        $sql = "UPDATE posts 
                SET post_title = '$title',
                    date_posted = '$date_posted',
                    category_id = $category_id,
                    post_message = '$message',
                    account_id = $author_id
                WHERE post_id = $post_id";

        if($conn->query($sql)){
            header("location: dashboard.php");
            exit;
        }else{
            die("Error: " . $conn->error);
        }
    }//end function updatePostuser()


   
    // //function displayUsers()
    // function displayUsers(){
    //     $conn = connection();
    //     $sql = "SELECT * FROM accounts";

    //     if($result = $conn->query($sql)){
    //         return $result;
    //     } else{
    //         die("Error: " . $conn->error);
    //     }
    // }//end function displayUsers()


?>