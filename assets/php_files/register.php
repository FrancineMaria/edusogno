<?php
session_start();
include "db_conn.php";

if (isset($_POST['submit'])) {
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $name = validate($_POST['name']);
    $last_name = validate($_POST['last_name']);
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);

    if(empty($name) || empty($last_name) || empty($email) || empty($password)){
        header("Location: register.php?error=All fields are required");
        exit();
    } else {
        // Hash the password for security
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Check if the email is already registered
        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){
            header("Location: register.php?error=Email is already registered");
            exit();
        } else {
            // Insert the user's information into the database
            $sql2 = "INSERT INTO users (name, last_name, email, password) VALUES ('$name', '$last_name', '$email', '$hashed_password')";
            mysqli_query($conn, $sql2);
            header("Location: login.php?success=Registration successful. You can now login.");
            exit();
        }
    }
}
else {
    error_log("Redirecting to index.php");
    header("Location: index.php?error=Incorrect username or password");
    exit();
}

?>
