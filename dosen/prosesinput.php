<?php
    if(isset($_POST['submit'])){
      $connection = mysql_connect("localhost","root","") or die(mysql_error());
      mysql_select_db("latihan") or die(mysql_error());
            foreach ($_POST['rows'] as $key => $count ){
                $nim = $_POST['nim_'.$count];
                $nama_depan = $_POST['nama_depan_'.$count];
                $nama_belakang = $_POST['nama_belakang_'.$count];
 
                $query_2 = "INSERT INTO kelas_mahasiswa (nim,nama_depan,nama_belakang) VALUES ('$nim','$nama_depan','$nama_belakang')";
 
                mysql_query($query_2) or die(mysql_error());
            }
 
            echo "Data Berhasil disimpan <br>";
            echo "<a href=\"jquery_dom.php\">Kembali</a>";
 
        mysql_close($connection);
 
    }else{
        header('Location: jquery_dom.php');
    }
?>