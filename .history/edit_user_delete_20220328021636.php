<?php
session_start();
include "connection.php";

if (
    isset($_POST['role'])
) {

    $id = $_POST['id'];
    $delete = "DELETE users id = '$id'";
    $result2 = mysqli_query($conn, $delete);
    if ($result2) {
        if ($id == $_SESSION['id']) {
            header("Location: logout.php");
        } else {
            header("Location:welcome.php");
        }
    } else {
        echo "here";
        echo "Unknown Error Occurred";
    }
} else {
    echo "hello";
    echo "Unknown Error Occurred";
}
