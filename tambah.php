<?php
    include('session.php');
?>

<!DOCTYPE html>
<html>
<head>
    <title>Rojo Tours n Travel</title>
    <link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
    <div id="profile">
        <b id="welcome">Welcome : <i><?php echo $login_session; ?></i></b>
        <b id="logout"><a href="logout.php">Log Out</a></b>
    </div>
    <h2>Simple CRUD</h2>
    
    <h3>Tambah Data User</h3>
    
    <form action="tambah_user.php" method="post">
        <table cellpadding="3" cellspacing="0">
            <tr>
                <td>Username</td>
                <td>:</td>
                <td><input type="text" name="username" required></td>
            </tr>
            <tr>
                <td>Password</td>
                <td>:</td>
                <td><input type="password" name="password" size="30" required></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td></td>
                <td><input type="submit" name="tambah" value="Tambah"></td>
            </tr>
        </table>
    </form>
</body>
</html>
