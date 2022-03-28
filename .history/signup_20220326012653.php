<?php
session_start();
include "connection.php";

if (
    (isset($_POST['email']) && isset($_POST['validation1'])
        && isset($_POST['fname']) && isset($_POST['lname'])) && isset($_POST['validation2'])
) {
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $email = validate($_POST['email']);
    $pass = validate($_POST['validation1']);

    $first_name = validate($_POST['fname']);
    $last_name = validate($_POST['lname']);

    $user_data = 'email=' . $email . '&first_name=' . $first_name . 'last_name=' . $last_name;

    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "<script>
        alert('Sorry, an account with that Email Address already exists. Please use another Email Address.');
        window.location.href='index.php';
        </script>";
        exit();
    } else {
        $sql2 = "INSERT INTO users(first_name, last_name, email, password) VALUES('$first_name', '$last_name', '$email', '$pass')";
        $result2 = mysqli_query($conn, $sql2);

        if ($result2) {
            echo "<script>
            alert('Account has been successfully created! Please Log In.');
            window.location.href='index.php';
            </script>";
        } else {
            echo "Unknown Error Occurred";
        }
    }
} else {
    echo "Unknown Error Occurred";
}
