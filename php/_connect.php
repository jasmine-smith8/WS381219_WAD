<?php
//credentials
$server = "plesk.remote.ac";
$username = "WS381219_JasmineSmith";
$password = 'entry_for_webapp';
$database = "WS381219_WAD";
//connect to the database
$connect = mysqli_connect($server,$username,$password,$database);

if (!$connect){
    echo '<script language="javascript">';
    echo 'alert("unable to connect")';
    echo '</script>';
}