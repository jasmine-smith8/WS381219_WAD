<?php
//credentials
$server = "plesk.remote.ac";
$username = "WS381219_JasmineSmith8";
$password = '&jGc544p9';
$database = "WS381219_WAD";
//connect to the database
$connect = mysqli_connect($server,$username,$password,$database);

if (!$connect){
    echo '<script language="javascript">';
    echo 'alert("unable to connect")';
    echo '</script>';
}
//src/backend/php/auth.php