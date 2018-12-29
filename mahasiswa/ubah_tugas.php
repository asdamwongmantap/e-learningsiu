<?php
include "config/koneksi.php";


$lokasi_file    = $_FILES['berkas']['tmp_name'];
$tipe  = $_FILES['berkas']['type'];
$ukuran = $_FILES['berkas']['size'];
$nama_file = $_FILES['berkas']['name'];
	
 // Apabila File tidak diganti
  if (empty($lokasi_file)){
   mysql_query("UPDATE tbl_tugas SET kd_mk = '$_POST[kdmk]',
                                   kd_kelas = '$_POST[kdkelas]',
                                   judultugas     = '$_POST[judultugas]',
                                  deskripsi  = '$_POST[deskripsi]'
                             WHERE kd_tugas   = '$_POST[id]'");

  echo "<script>alert('Edit Materi berhasil'); window.location = 'media.php?hal=tugas'</script>";
  }
  else
  {
   mysql_query("UPDATE tbl_tugas SET kd_mk = '$_POST[kdmk]',
                                   kd_kelas = '$_POST[kdkelas]',
                                   judultugas     = '$_POST[judultugas]',
                                  deskripsi  = '$_POST[deskripsi]',
								   filename='$nama_file'
                             WHERE kd_tugas   = '$_POST[id]'");

	move_uploaded_file($_FILES['berkas']['tmp_name'], 'berkas/'.$_FILES['berkas']['name']);

  echo "<script>alert('Edit Materi berhasil'); window.location = 'media.php?hal=tugas'</script>";
  }

?>