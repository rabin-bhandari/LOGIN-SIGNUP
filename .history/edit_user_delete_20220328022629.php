<?php
session_start();
include "connection.php";

if (
    isset($_POST['delete_id'])
) {

    $delete_id = $_POST['delete_id'];
    echo ""
    $delete_id = "DELETE FROM users WHERE id = '$delete_id'";
    $result2 = mysqli_query($conn, $delete);

    if ($result2) {
        if ($delete_id == $_SESSION['id']) {
            header("Location: logout.php");
        } else {
            echo "<script>
            alert('The account has been deleted.');
            window.location.href='welcome.php';
            </script>";
        }
    } else {
        echo "here";
        echo "Unknown Error Occurred";
    }
} else {
    echo "Unknown Error Occurred";
}
