<?php
include "/config/koneksi.php";

$data=mysql_fetch_array(mysql_query("SELECT filename FROM tbl_materi WHERE kd_materi='$_GET[id]'"));
  if ($data['filename']!=''){
 
     mysql_query("DELETE FROM tbl_materi WHERE kd_materi='$_GET[id]'");
  
     unlink("berkas/$_GET[namafile]");    
	 echo "<script>alert('Materi Berhasil Di Hapus'); window.location = 'media.php?hal=materi'</script>";
  }
  else{
  
     mysql_query("DELETE FROM tbl_materi WHERE kd_materi='$_GET[id]'");
	 echo "<script>alert('Materi Berhasil Di Hapus'); window.location = 'media.php?hal=materi'</script>";
  }
  
 
  ?>
