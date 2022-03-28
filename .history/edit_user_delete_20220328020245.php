<?php
session_start();
include "connection.php";


f (
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
}