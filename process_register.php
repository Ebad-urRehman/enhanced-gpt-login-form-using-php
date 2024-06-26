<?php
include 'server.php';

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = htmlspecialchars($_POST['name']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = htmlspecialchars($_POST['password']);

    echo "name : " . $username . "<br>";

    # insertion into data base
    
    // # creating a new db
    // $sql = "CREATE DATABASE IF NOT EXISTS user_details";

    // # executing query
    // if ($connection->query($sql) === TRUE) {
    //     echo "DB CREATED SUCCESSFULLY or already exists";
    // } 
    // else {
    //     echo "Error creating data base". $connection->error;
    // }

    

    // Check if username or email already exists
    $sql_check = "SELECT * FROM registered_users WHERE UserName='$username' OR Email='$email'";
    $result_check = $connection->query($sql_check);

    if ($result_check->num_rows > 0) {
        echo "Username or email already exists.";
        exit();
    }

    # storing hashed password for extra security
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    # inserting data into sql
    $insert_query = "INSERT INTO registered_users(UserName, Email, passwor) values('$username', '$email', '$hashedPassword')";

    if ($connection->query($insert_query) === TRUE) {
        header("Location: login.php");
        exit();
    }
    else {
        echo "<br> Error : $connection->error <br>";
    }

    $connection->close();
    
}
?>