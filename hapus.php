<?php
    if(isset($_GET['id'])){
        include('connection.php');
        $id = $_GET['id'];

        $cek = mysql_query("SELECT id FROM login WHERE id='$id'") or die(mysql_error());
        
        if(mysql_num_rows($cek) == 0){
            echo '<script>window.history.back()</script>';
        }else{
            $del = mysql_query("DELETE FROM login WHERE id='$id'");
            if($del){                
                echo 'Data user berhasil di hapus! ';
                echo '<a href="profile.php">Kembali</a>';
            }else{                
                echo 'Gagal menghapus data! ';
                echo '<a href="profile.php">Kembali</a>';
            }            
        }        
    }else{
        echo '<script>window.history.back()</script>';
    }
?>