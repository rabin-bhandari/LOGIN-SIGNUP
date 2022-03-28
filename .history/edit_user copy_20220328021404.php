<?php
session_start();
include "connection.php";

if (
    (isset($_POST['role'])
) { 
    $id = $_POST['id'];

    $delete = "DELETE users id = '$id'";
    $result2 = mysqli_query($conn, $delete);
    if ($result2) {
        if ($id == $_SESSION['id']) {
            header("Location: logout.php");
        }
    } else {
        echo "here";
        echo "Unknown Error Occurred";
    }
} else {
    echo "Unknown Error Occurred";
}
?>

<?php
session_start();
include "connection.php";

if (
    (isset($_POST['role'])
       )
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

    $update = "UPDATE users SET password='$pass', admin = '$admin' WHERE id = '$id'";
    $result2 = mysqli_query($conn, $update);
    if ($result2) {
        if ($id == $_SESSION['id']) {
            $_SESSION['admin'] = $admin;
        }
        echo "<script>
            alert('The account has been successfully updated.');
            window.location.href='welcome.php';
            </script>";
    } else {
        echo "here";
        echo "Unknown Error Occurred";
    }
} else {
    echo "Unknown Error Occurred";
}
