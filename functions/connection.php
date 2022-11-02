<?php
    function connection(){
        $servername = "localhost";
        $username = "root";
        $password = "root";
        $database = "blog";

        $conn = new mysqli($servername, $username, $password, $database);


        if($conn->connect_error){
            die("Connection Failed: " . $conn->connect_error);
        }
        else{
            return $conn;
            // echo "connected";
        }
    }

    // connection();

?>