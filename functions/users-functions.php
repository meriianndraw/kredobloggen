<?php
    require_once "connection.php"; // will connect our connection.php once. if it is connected before then it will not inlude it again and again

    function register(){

        $conn = connection();

        //form data from register.php
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $address = $_POST['address'];
        $contact_number = $_POST['contact_number'];
        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $avatar = 'profile.jpg';
        


        //sql accounts
        $sql_accounts = "INSERT INTO accounts (username, password) VALUES ('$username', '$password')";

        if($conn->query($sql_accounts)){
            /*insert_id---> will help us get the last id generated in the accounts table. 
                And it will pass it to variable $account_id. and it is now the current id to send to the users table as Foreign Key*/
            $account_id = $conn->insert_id;
            //if successful then create another sql: below;
            
            // sql_users
            $sql_users = "INSERT INTO users (first_name, last_name, address, contact_number, avatar, account_id) VALUES ('$first_name', '$last_name', '$address', '$contact_number', '$avatar', '$account_id')";


            if($conn->query($sql_users)){
                header("location: login.php");
                // echo "<script> window.location = 'login.php'; </script>";
                exit;
            }else{
                die("Error inserting to users table: " . $conn->error);
            }
        }else{
            die("Error inserting to accounts table: " . $conn->error);
        }
    }// end function register()




    //function login
    function login(){

        $conn = connection();

        //form data
        $username = $_POST['username'];
        $password = $_POST['password'];

        //variable for error
        $error = "<div class='alert alert-danger text-center fw-bold' role='alert'>Incorrect Username or Password</div>";


        $sql = "SELECT * FROM accounts WHERE username = '$username'";

        if($result = $conn->query($sql)){
            if($result->num_rows == 1){
                $user_details = $result->fetch_assoc();
                if(password_verify($password, $user_details['password'])){
                    session_start();
                    $_SESSION['account_id'] = $user_details['account_id'];
                    $_SESSION['role'] = $user_details['role'];
                    $_SESSION['username'] = $user_details['username'];
                    $_SESSION['full_name'] = getFullname($user_details['account_id']);//create first the function getFullname then continue to get the account_id

                    if($user_details['role'] == 'A'){
                        header("location: dashboard.php");
                    }elseif($user_details['role'] == 'U'){
                        header("location: profile.php");
                    }
                    exit;
                }else{
                    echo $error;
                }
            }else{
                echo $error;
            }
        }else{
            die("Error: " . $conn->error); // try now login using different account admin and user
        }
    }//end function login


     //function getFullname
    function getFullname($account_id){
        $conn = connection();

        $sql = "SELECT first_name, last_name FROM users WHERE account_id = $account_id";

        if($result = $conn->query($sql)){
            $full_name = $result->fetch_assoc();
            return $full_name['first_name'] . " " . $full_name['last_name'];
        }else{
            die("Error: " . $conn->error); //now continue the login function
        }
    }// end function getFullname




    //function displayAllusers()
    function displayAllUsers(){
    $conn = connection();

    $sql = "SELECT * FROM users INNER JOIN accounts ON accounts.account_id = users.account_id WHERE accounts.role = 'U'";

    $result = $conn->query($sql);

        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                echo "
                    <tr>
                        <td>".$row['account_id']."</td>
                        <td>".$row['first_name']." ".$row['last_name']."</td>
                        <td>".$row['contact_number']."</td>
                        <td>".$row['address']."</td>
                        <td>".$row['username']."</td>
                        <td><a href='update-user.php?account_id=".$row['account_id']."' class='btn btn-sm btn-warning text-white'>Update</a></td>
                        <td><a href='delete-user.php?account_id=".$row['account_id']."' class='btn btn-sm btn-danger text-white'>Delete</a></td>
                    </tr>
                ";
            }
        }else{
            echo "<tr>
                <td colspan='7' class='text-center lead fw-bold fst-italic'>
                    No Records Found
                </td>
            </tr>";
        }
    }//end function displayAllusers()





    // function addUser()
    function addUser(){
    $conn = connection();
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $address = $_POST['address'];
    $contact_number = $_POST['contact_number'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $avatar = "profile.jpg";
    
    $sql_accounts = "INSERT INTO `accounts` (`username`, `password`) VALUES ('$username', '$password')";

        if($conn->query($sql_accounts)){
            $account_id = $conn->insert_id;

            $sql_users = "INSERT INTO users (first_name, last_name, `address`, contact_number, avatar, account_id) VALUES ('$first_name', '$last_name', '$address','$contact_number', '$avatar', $account_id)";

            if($conn->query($sql_users)){
                echo "<div class='mt-4 alert alert-success text-center fw-bold' role='alert'>NEW USER ADDED: $first_name $last_name</div>";
            }else{
                echo "<div class='alert alert-danger text-center fw-bold' role='alert'>Error: ".$conn->error."
                </div>";
            }
        }else{
            echo "<div class='alert alert-danger text-center fw-bold' role='alert'>
            Error: ".$conn->error."</div>";
        }
    }// end function addUser()






    //function  displayProfile()
    function displayProfile($profile_id){
        $conn = connection();

        $sql = "SELECT * FROM accounts INNER JOIN users ON accounts.account_id = users.account_id WHERE accounts.account_id = '$profile_id'";

        $result = $conn->query($sql);

        if($result->num_rows == 1){
            return $result->fetch_assoc();
        }else{
            echo "No User Found: ".$conn->error;
        }
    }// end function  displayProfile()



    // getPassword()
    function getPassword($account_id){
        $conn = connection();
        $sql = "SELECT `password` FROM accounts WHERE account_id = $account_id";
        if($result = $conn->query($sql)){
            $row = $result->fetch_assoc();
            return $row['password'];
        }
    }// end getPassword()



    //function updateProfile()
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

            $sql = "UPDATE accounts INNER JOIN users ON users.account_id = accounts.account_id SET users.first_name = '$first_name', users.last_name = '$last_name', users.address = '$address', users.contact_number = '$contact_number', accounts.username = '$username' WHERE accounts.account_id = $account_id";

            if($conn->query($sql)){
                //New Avatar
                if(!empty($avatar_name)){
                    $sql_avatar = "UPDATE users SET avatar = '$avatar_name' WHERE account_id = $account_id";

                    $conn->query($sql_avatar);

                    if($conn->error){
                        die("Error: " .$conn->error);
                    }
                    $destination = "images/$avatar_name";
                    move_uploaded_file($avatar_tmp, $destination);
                }
                header("location: users.php");
                exit;
            }else{
                die("Error: " .$conn->error);
            }

        }else{
            echo "<div class='alert alert-danger text-center fw-bold' role='alert'>Incorrect Password.</div>";
        }
    }// end function updateProfile()




    // function deleteProfile()
    function deleteProfile($profile_id){
        $conn = connection();

        $sql = "DELETE accounts, users FROM accounts INNER JOIN users ON accounts.account_id = users.account_id WHERE accounts.account_id = '$profile_id'";

        if($conn->query($sql)){
            header("location: users.php");
            exit;
        }else {
            die("Error: " . $conn->error);
        }

    }//end function deleteProfile()

    
?>
