<?php
require 'connection.php';
session_start();
$sessid = session_id();

$user_check = $_SESSION['login_user'];
$ses_sql = mysqli_query($con, "select username from login where username='$user_check'");
$row = mysqli_fetch_assoc($ses_sql);
$login_session = $row['username'];

if(!isset($login_session)) {
    header('location: index.php');
}
?>
