<?php
include "config/koneksi.php";
// include "config/library.php";
$kd_materi=trim($_POST['kd_materi']);
$kdmk=trim($_POST['kdmk']);
$kd_kelas=trim($_POST['kdkelas']);
$judul_materi=trim($_POST['judul_materi']);
$deskripsi=trim($_POST['deskripsi']);




if (empty($kd_materi)){
  echo "<script>alert('Anda Belum Mengisi Kode Materi'); window.location = 'media.php?hal=materi'</script>";
}
elseif (empty($kdmk)){
  echo "<script>alert('Anda Belum Mengisi Mata Kuliah'); window.location = 'media.php?hal=materi'</script>";
}
elseif (empty($kd_kelas)){
  echo "<script>alert('Anda Belum Mengisi Kelas'); window.location = 'media.php?hal=materi'</script>";
}
elseif (empty($judul_materi)){
  echo "<script>alert('Anda Belum Mengisi judul_materi'); window.location = 'media.php?hal=materi'</script>";
}
elseif (empty($deskripsi)){
  echo "<script>alert('Anda Belum Mengisi Deskripsi'); window.location = 'media.php?hal=materi'</script>";
}
else{


$tipe  = $_FILES['berkas']['type'];
$ukuran = $_FILES['berkas']['size'];
$nama_file = $_FILES['berkas']['name'];
	
 
    mysql_query("INSERT INTO tbl_materi(kd_materi,
                                    kd_mk,
                                    kd_kelas,
                                    
                                    judul_materi,
                                    deskripsi,
									filename) 
                            VALUES('$_POST[kd_materi]',
									'$_POST[kdmk]',
                                   '$_POST[kdkelas]',
                                                              
                                   '$_POST[judul_materi]',
                                   '$_POST[deskripsi]',
								   '$nama_file')");
								   
  move_uploaded_file($_FILES['berkas']['tmp_name'], 'berkas/'.$_FILES['berkas']['name']);
  echo "<script>alert('Upload Materi berhasil'); window.location = 'media.php?hal=materi'</script>";
}
?>