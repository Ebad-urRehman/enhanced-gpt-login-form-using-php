<?php
include 'server.php';

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = htmlspecialchars($_POST['name']);
    $password = htmlspecialchars($_POST['password']);

    echo "name : " . $username . "<br>";

    // Check if username or email already exists
    $sql_check = "SELECT * FROM registered_users WHERE UserName='$username'";
    $result_check = $connection->query($sql_check);

    if ($result_check->num_rows > 0) {
        $user_data = $result_check->fetch_assoc();
        
        // Verify password
        if (password_verify($password, $user_data['passwor'])) {
            // Start the session and store user information
            session_start();
            $_SESSION['username'] = $user_data['UserName'];
            $_SESSION['email'] = $user_data['Email'];

            // Redirect to the user's account page or dashboard
            header("Location: index.php");
            exit();
        } else {
            echo "Invalid password.";
        }

    }
    else {
        echo "Account with this user name doesn't exist";
    }

    $connection->close();
    
}
?>