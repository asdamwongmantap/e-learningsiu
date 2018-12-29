<?php
include "/config/koneksi.php";
?>
<?php
						$idsoalujian=$_GET['id_soalujian'];
						
  mysql_query("DELETE FROM tbl_soaldetail WHERE id_soal='$_GET[id]' AND id_soalujian='$idsoalujian'");
  echo "<script>alert('Soal Berhasil Di Hapus'); window.location = 'media.php?hal=lihatujianpg&id_soalujian=$idsoalujian'</script>";
  
?>