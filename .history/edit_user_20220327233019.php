<?php
session_start();
include "connection.php";

if (
    (isset($_POST['role'])
        && isset($_POST['newPass']) && isset($_POST['newPass2']))
) {
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $id = $_POST['id'];
    $pass = validate($_POST['newPass']);
    $admin = $_POST['role'];

    $sql = "SELECT * FROM users WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);



    if (mysqli_num_rows($result) > 0) {
        echo "<script>
        alert('Sorry, an account with that Email Address already exists. Please use another Email Address.');
        window.location.href='index.php';
        </script>";
        exit();
    } else {

        $sql2 = "UPDATE ";
        $result2 = mysqli_query($conn, $sql2);
        if ($result2) {

            header("Location: welcome.php");
            echo "<script>
            alert('Accounts have been successfully updated.');
            window.location.href='welcome.php';
            </script>";
        } else {
            echo "here";
            echo "Unknown Error Occurred";
        }
    }
} else {
    echo "Unknown Error Occurred";
}
