<?php
session_start();
include "db_conn.php";

if (isset($_POST['username']) && isset($_POST['password'])) {
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $username = validate($_POST['username']);
    $password = validate($_POST['password']);

    if(empty($username)){
        header("Location: index.php?error=Username is required");
        exit();
    } elseif(empty($password)){
        header("Location: index.php?error=Password is required");
        exit();
    } else {
        $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $result = mysqli_query($conn, $sql);
        
        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['username'] = $row['username'];
            $_SESSION['name'] = $row['name'];
            header("Location: ../personal.php"); // Redirect to home page after successful login
            exit();
        } else {
            header("Location: index.php?error=Incorrect username or password");
            exit();
        }
    }
} 
else {
    error_log("Redirecting to login.php");
    header("Location: login.php?error=Incorrect username or password");
    exit();
}

?>
