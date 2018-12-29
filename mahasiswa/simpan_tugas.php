<?php
include "config/koneksi.php";
// include "config/library.php";
$kd_tugas=trim($_POST['kd_tugas']);
$kdmk=trim($_POST['kdmk']);
$kd_kelas=trim($_POST['kdkelas']);
$judul_tugas=trim($_POST['judultugas']);
$deskripsi=trim($_POST['deskripsi']);




if (empty($kd_tugas)){
  echo "<script>alert('Anda Belum Mengisi Kode tugas'); window.location = 'media.php?hal=tugas'</script>";
}
elseif (empty($kdmk)){
  echo "<script>alert('Anda Belum Mengisi Mata Kuliah'); window.location = 'media.php?hal=tugas'</script>";
}
elseif (empty($kd_kelas)){
  echo "<script>alert('Anda Belum Mengisi Kelas'); window.location = 'media.php?hal=tugas'</script>";
}
elseif (empty($judul_tugas)){
  echo "<script>alert('Anda Belum Mengisi judul_tugas'); window.location = 'media.php?hal=tugas'</script>";
}
elseif (empty($deskripsi)){
  echo "<script>alert('Anda Belum Mengisi Deskripsi'); window.location = 'media.php?hal=tugas'</script>";
}
else{

$tipe  = $_FILES['berkas']['type'];
$ukuran = $_FILES['berkas']['size'];
$nama_file = $_FILES['berkas']['name'];
	
 
    mysql_query("INSERT INTO tbl_tugas(kd_tugas,
                                    kd_mk,
                                    kd_kelas,
                                    judultugas,
                                    deskripsi,
									filename) 
                            VALUES('$_POST[kd_tugas]',
									'$_POST[kdmk]',
                                   '$_POST[kdkelas]',
                                                              
                                   '$_POST[judultugas]',
                                   '$_POST[deskripsi]',
								   '$nama_file')");
								   
  move_uploaded_file($_FILES['berkas']['tmp_name'], 'berkas/'.$_FILES['berkas']['name']);
  echo "<script>alert('Upload tugas berhasil'); window.location = 'media.php?hal=tugas'</script>";
}
?>