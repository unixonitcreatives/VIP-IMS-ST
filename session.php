<?php
session_start();
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin_ac"]) || $_SESSION["loggedin_ac"] !== true){
    header("location: login.php");
    exit;
}
?>

