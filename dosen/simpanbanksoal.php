<?php
include "config/koneksi.php";
// include "config/library.php";
$id_soal=trim($_POST['id_soal']);
$soal=trim($_POST['soal']);
$kdmk=trim($_POST['kdmk']);
$pil_a=trim($_POST['pil_a']);
$pil_b=trim($_POST['pil_b']);
$pil_c=trim($_POST['pil_c']);
$pil_d=trim($_POST['pil_d']);
$kunci_jwb=trim($_POST['kunci_jwb']);





if (empty($id_soal)){
  echo "<script>alert('Anda Belum Mengisi ID Soal'); window.location = 'media.php?hal=inputbanksoal'</script>";
}
elseif (empty($soal)){
  echo "<script>alert('Anda Belum Mengisi Soal'); window.location = 'media.php?hal=inputbanksoal'</script>";
}
elseif (empty($kdmk)){
  echo "<script>alert('Anda Belum Memilih Mata Kuliah'); window.location = 'media.php?hal=inputbanksoal'</script>";
}
elseif (empty($pil_a)){
  echo "<script>alert('Anda Belum Mengisi Pilihan A'); window.location = 'media.php?hal=inputbanksoal'</script>";
}
elseif (empty($pil_b)){
  echo "<script>alert('Anda Belum Mengisi Pilihan B'); window.location = 'media.php?hal=inputbanksoal'</script>";
}
elseif (empty($pil_c)){
  echo "<script>alert('Anda Belum Mengisi Pilihan C'); window.location = 'media.php?hal=inputbanksoal'</script>";
}
elseif (empty($pil_d)){
  echo "<script>alert('Anda Belum Mengisi Pilihan D'); window.location = 'media.php?hal=inputbanksoal'</script>";
}
elseif (empty($kunci_jwb)){
  echo "<script>alert('Anda Belum Mengisi Kunci Jawaban'); window.location = 'media.php?hal=inputbanksoal'</script>";
}


else{


    mysql_query("INSERT INTO tbl_banksoalpg(id_soal,
                                    kd_mk,
                                    soal,
                                    pil_a,
                                    pil_b,
                                    pil_c,
									pil_d,
                                    kunci_jwb) 
                            VALUES('$_POST[id_soal]',
									'$_POST[kdmk]',
                                   '$_POST[soal]',
                                   '$_POST[pil_a]',                           
                                   '$_POST[pil_b]',
                                   '$_POST[pil_c]',
								   '$_POST[pil_d]',                           
                                   '$_POST[kunci_jwb]')");
  echo "<script>alert('Input Soal Berhasil'); window.location = 'media.php?hal=inputbanksoal'</script>";
}
?>