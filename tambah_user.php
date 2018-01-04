<?php
    if(isset($_POST['tambah'])){
        include('connection.php');
        
        $username   = $_POST['username'];
        $password   = md5($_POST['password']);

        $input = mysql_query("INSERT INTO login VALUES(NULL, '$username', '$password')") or die(mysql_error());
        
        if($input){
            echo 'Data berhasil di tambahkan! ';
            echo '<a href="profile.php">Kembali</a>';
        }else{            
            echo 'Gagal menambahkan data! ';
            echo '<a href="profile.php">Kembali</a>';
        }
    }else{
        echo '<script>window.history.back()</script>';
    }
?>