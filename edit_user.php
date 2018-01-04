<?php
    if(isset($_POST['simpan'])){
        include('connection.php');
        
        $id = $_POST['id'];
        $username = $_POST['username'];
        $update = mysql_query("UPDATE login SET username='$username' WHERE id='$id'") or die(mysql_error());
        
        if($update){
            echo 'Data berhasil di simpan! ';
            echo '<a href="profile.php">Kembali</a>';
        }else{
            echo 'Gagal menyimpan data! ';
            echo '<a href="profile.php">Kembali</a>';
        }
    }else{
        echo '<script>window.history.back()</script>';
    }
?>