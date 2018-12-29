<?php
include "../../../koneksi.php";
?>

  
  <?php
		$LAP=$_POST['lap'];		
		if ($LAP=='Laporan Nilai Mahasiswa Keseluruhan')
		{
		
		header('location:lapnilai.php');
		
		}
		
		elseif ($LAP=='Laporan Nilai Mahasiswa Per-Kelas')
		{
		
		header('location:../../media.php?p=lapnilaikelas');
		
		}
		
		
		?>