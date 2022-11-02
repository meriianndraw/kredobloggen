<?php
    require_once "connection.php";


    //function addCategory
    function addCategory(){
        
        $conn = connection();

        $category_name = $_POST['category_name'];

        $sql = "INSERT INTO categories(category_name) VALUES ('$category_name')";

        if($conn->query($sql)){
            echo "<div class='mt-5 alert alert-success text-center fw-bold' role='alert'>NEW CATEGORY ADDED: ".$category_name."</div>";
        }else{
            die("Error: " . $conn->error);
        }
    }// end function addCategory



    //displayCategories
    function displayCategories(){
        
        $conn = connection();
        $sql = "SELECT * FROM categories ORDER BY category_id DESC";

        if($result = $conn->query($sql)){
            if($result->num_rows > 0){
               while($row = $result->fetch_assoc()){
                   echo "
                        <tr>
                            <td>".$row['category_id']."</td>
                            <td>".$row['category_name']."</td>
                            <td><a href='update-category.php?cat_id=".$row['category_id']."' class='btn btn-sm btn-warning text-white'>Update</a></td>
                            <td><a href='delete-category.php?cat_id=".$row['category_id']."' class='btn btn-sm btn-danger text-white'>Delete</a></td>
                        </tr>
                   
                   ";
               } 
            }else{
                echo "<tr>
                        <td colspan='4' class='text-center'>
                            <p class='lead fw-bold fst-italic mb-0'>No Records Found</p>
                        </td>
                    </tr>";
            }
        }else{
            die("Error retrieving all categories: " . $conn->error);
        }
    }// end displayCategories



    // function getCategory
    function getCategory($cat_id){
        
        $conn = connection();

        $sql = "SELECT * FROM categories WHERE category_id = $cat_id";

        if($result = $conn->query($sql)){
            return $result->fetch_assoc();
        }else {
            die("Error: " . $conn->error);
        }
    } // end function getCategory



    //  function updateCategory
    function updateCategory($cat_id){

        $conn = connection();
        $cat_name = $_POST['cat_name']; //cat_name is from the input name in update-category.php

        $sql = "UPDATE categories SET category_name = '$cat_name' WHERE category_id = $cat_id";

        if($conn->query($sql)){
            header("location: categories.php");
            exit;
        }else {
            die("Error: " . $conn->error);
        }
    }// end function updateCategory



    // function deleteCategory
    function deleteCategory($cat_id){

        $conn = connection();

        $sql = "DELETE FROM categories WHERE category_id = $cat_id";

        if($conn->query($sql)){
            header("location: categories.php");
            exit;
        }else {
            die("Error: " . $conn->error);
        }
    }// end function deleteCategory
?>