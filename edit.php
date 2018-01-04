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
        <b id="logout"><a href="logout.php">Log Out</a></b>
    </div>
    <h2>Simple CRUD</h2>
    
    <h3>Edit Data User</h3>

    <?php
        include('connection.php');

        $id = $_GET['id'];
        $show = mysql_query("SELECT * FROM login WHERE id='$id'");    
        if(mysql_num_rows($show) == 0){
            echo 'dodol';
        }else{
            $data = mysql_fetch_assoc($show);
        }
    ?>
    
    <form action="edit_user.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <table cellpadding="3" cellspacing="0">
            <tr>
                <td>Username</td>
                <td>:</td>
                <td><input type="text" name="username" value="<?php echo $data['username']; ?>" required></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td></td>
                <td><input type="submit" name="simpan" value="Simpan"></td>
            </tr>
        </table>
    </form>
</body>
</html>
