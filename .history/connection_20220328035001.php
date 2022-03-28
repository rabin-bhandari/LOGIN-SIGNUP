<?php

// $sname = "localhost";
// $uname = "root";
// $password = "";
// $db_name = "LOGIN-SIGNUP";

// $conn = mysqli_connect($sname, $uname, $password, $db_name);

// if (!$conn) {
//     echo "Connection failed";
// }


//Get Heroku ClearDB connection information
$cleardb_url = parse_url(getenv("mysql://b49407036ab3d6:dcca5948@eu-cdbr-west-02.cleardb.net/heroku_6f25953872e8cc7?reconnect=true"));
$cleardb_server = $cleardb_url["host"];
$cleardb_username = $cleardb_url["user"];
$cleardb_password = $cleardb_url["pass"];
$cleardb_db = substr($cleardb_url["path"], 1);
$active_group = 'default';
$query_builder = TRUE;
// Connect to DB
// $conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);
$conn = mysqli_query("eu-cdbr-west-02.cleardb.net", "b49407036ab3d6", "dcca5948", "heroku_6f25953872e8cc7");
if (!$conn) {
    echo "Connection Failed";
}
