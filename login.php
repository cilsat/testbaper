<?php
require_once 'syssession.php';
$error = '';
if (isset($_POST['submit'])) {
    if (empty($_POST['username']) || empty($_POST['password'])) {
        $error = "Username atau Password kosong";
    }
    else
    {
        $username = mysqli_real_escape_string($con, stripslashes($_POST['username']));
        $password = mysqli_real_escape_string($con, stripslashes(md5($_POST['password'])));
        $query = mysqli_query($con, "select * from login where password='$password' AND username='$username'");
        $rows = mysqli_num_rows($query);

        if ($rows == 1) {
            $_SESSION['login_user'] = $username;
            $_SESSION['sess_id'] = $_COOKIE['PHPSESSID'];
            mysqli_free_result($query);

            header("location: profile.php");
            $error = $_SESSION['login_user'];
        } else {
            $error = "Username atau Password salah";
        }
    }
}
?>
