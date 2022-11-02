<?php
    require_once "connection.php";

    function getProfileDetails($profile_id){
        $conn = connection();
        $sql = "SELECT * FROM accounts INNER JOIN users ON accounts.account_id = users.account_id WHERE accounts.account_id = $profile_id";

        if($result = $conn->query($sql)){
            return $result->fetch_assoc();
        } else {
            die("Error: " . $conn->error);
        }
    }




    function updateProfile($account_id){
        $conn = connection();
        $password = $_POST['password'];
        $db_password = getPassword($account_id);

        if(password_verify($password, $db_password)){
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $address = $_POST['address'];
            $contact_number = $_POST['contact_number'];
            $username = $_POST['username'];
            $avatar_name = $_FILES['avatar']['name'];
            $avatar_tmp = $_FILES['avatar']['tmp_name'];

            $sql = "UPDATE accounts INNER JOIN users ON users.account_id = accounts.account_id
                    SET users.first_name = '$first_name',
                    users.last_name = '$last_name',
                    users.address = '$address',
                    users.contact_number = '$contact_number',
                    accounts.username = '$username'
                    WHERE accounts.account_id = $account_id";

            if($conn->query($sql)){
                // Update a session variable
                $_SESSION['full_name'] = "$first_name $last_name";

                // New avatar
                if(!empty($avatar_name)){
                    $sql_avatar = "UPDATE users SET avatar = '$avatar_name' WHERE account_id = $account_id";

                    $conn->query($sql_avatar);

                    if($conn->error){
                        die("Error: " . $conn->error);
                    }

                    $destination = "images/$avatar_name";
                    move_uploaded_file($avatar_tmp, $destination);
                }
                header("refresh: 0");
            } else {
                die("Error: " . $conn->error);
            }
        } else {
            echo "<div class='alert alert-danger text-center fw-bold' role='alert'>Incorrect password.</div>";
        }    
    }



    function getPassword($account_id) {
        $conn = connection();

        $sql = "SELECT `password` FROM accounts WHERE account_id = $account_id";

        if($result = $conn->query($sql)) {
            $row = $result->fetch_assoc();
            return $row['password'];
        }
    }
?>