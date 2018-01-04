<?php
require 'session.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Halaman Profile</title>
    <link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
    <div id="profile">
        <b id="welcome">Welcome : <i><?php echo $login_session; ?></i></b>
        <b id="logout"><a href="logout.php">Log Out</a></b>
    </div>
    <div>&nbsp;</div>
    <div><a href='tambah.php'><button>Tambah User</button></a></div>
    <div>&nbsp;</div>

    <?php
    echo "<div>".$_SESSION['sess_id']."</div>";
    echo "<div>".session_id()."</div>";

    $query = mysqli_query($con, "select * from login");
    $counter = 1;

    echo "<table border='2px solid black'>";
    echo "<tr><th>No.</th><th>Username</th><th>Action</th></tr>";
    while ($row = mysqli_fetch_assoc($query)) {
        echo "<tr><td>" . $counter . "</td>";
        echo "<td>" . $row['username'] . "</td>";
        echo "<td><a href='edit.php?id=" . $row['id'] . "'><button>Edit</button></a> &nbsp;&nbsp;&nbsp; <a href='hapus.php?id=" . $row['id'] . "'><button>Hapus</button></a></tr>";
        $counter++;
    }
    echo "</table>";
    mysqli_close($con);
    ?>
</body>
</html>
