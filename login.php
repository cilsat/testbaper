<?php
session_start();
$error = '';
if (isset($_POST['submit'])) {
    if (empty($_POST['username']) || empty($_POST['password'])) {
        $error = "Username atau Password salah";
    }
    else
    {
        include 'connection.php';
        $username = mysqli_real_escape_string($con, stripslashes($_POST['username']));
        $password = mysqli_real_escape_string($con, stripslashes(md5($_POST['username'])));

        $query = mysqli_query($con, "select * from login where password='$password' AND username='$username'");
        if ($query > 0) {
            $rows = mysqli_num_rows($query);
            $_SESSION['login_user'] = $username;
            header("location: profile.php");
        } else {
            $error = "Username atau Password salah";
        }
    }
}
?>
