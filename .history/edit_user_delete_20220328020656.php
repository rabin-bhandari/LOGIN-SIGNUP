<?php
session_start();
include "connection.php";


if (
    (isset($_POST['role']))
) {

    $id = $_POST['id'];
}
