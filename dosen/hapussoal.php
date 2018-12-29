<?php
include "/config/koneksi.php";
  mysql_query("DELETE FROM tbl_banksoalpg WHERE id_soal='$_GET[id]'");
  echo "<script>alert('Soal Berhasil Di Hapus'); window.location = 'media.php?hal=daftarsoal'</script>";
  ?>
