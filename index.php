<?php
    require 'login.php';

if(isset($_SESSION['login_user'])) {
    header("location: profile.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Halaman Login</title>
    <link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
    <div id="main">
        <h1>Halaman Login</h1>
        <div id="login">
            <h2>Form Login</h2>
            <form action="" method="post">
                <label>Username :</label>
                <input id="name" name="username" placeholder="username" type="text">
                <label>Password :</label>
                <input id="password" name="password" placeholder="**********" type="password">
                <input name="submit" type="submit" value=" Login ">
                <span><?php echo $error; ?></span>
            </form>
        </div>
    </div>
</body>
</html>
