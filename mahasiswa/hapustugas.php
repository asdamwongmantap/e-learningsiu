<?php
include "/config/koneksi.php";

$data=mysql_fetch_array(mysql_query("SELECT filename FROM tbl_materi WHERE kd_materi='$_GET[id]'"));
  if ($data['filename']!=''){
  
  unlink("berkas/$_GET[namafile]");    
  mysql_query("DELETE FROM tbl_tugas WHERE kd_tugas='$_GET[id]'");
  echo "<script>alert('Tugas Berhasil Di Hapus'); window.location = 'media.php?hal=tugas'</script>";
  }
  else
  {
  mysql_query("DELETE FROM tbl_tugas WHERE kd_tugas='$_GET[id]'");
  echo "<script>alert('Tugas Berhasil Di Hapus'); window.location = 'media.php?hal=tugas'</script>";
  }
  ?>
