<?php
session_start();
include "connection.php";

if (isset($_POST['email']) && isset($_POST['password'])) {
    echo "hello";
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);

    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    echo "hello";
    $result = mysqli_query($conn, $sql);
    echo "hello2";


    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['email'] = $row['email'];
        $_SESSION['first_name'] = $row['first_name'];
        $_SESSION['last_name'] = $row['last_name'];
        $_SESSION['id'] = $row['id'];
        $_SESSION['admin'] = $row['admin'];
        header("Location: welcome.php");
        exit();
    } else {
        echo "<script>window.location.href='index.php'; alert('Email and Password doesn\'t match whats in our database.');</script>";
        // header("Location: index.php");
        exit();
    }
} else {
    header("Location: index.php");
    exit();
}
