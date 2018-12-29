<?php
include "config/koneksi.php";
	
 mysql_query("UPDATE tbl_banksoalpg SET kd_mk = '$_POST[kdmk]',
                                   soal = '$_POST[soal]',
                                   pil_a       = '$_POST[pil_a]',
                                   pil_b      = '$_POST[pil_b]',
                                   pil_c  = '$_POST[pil_c]',
								   pil_d       = '$_POST[pil_d]',
                                   kunci_jwb      = '$_POST[kunci_jwb]'
                             WHERE id_soal   = '$_POST[id]'");

  echo "<script>alert('Edit Soal berhasil'); window.location = 'media.php?hal=daftarsoal'</script>";

?>