<?php
include "../../../koneksi.php";
?>

  
  <?php
		$LAP=$_POST['lap'];		
		if ($LAP=='Laporan Mahasiswa Keseluruhan')
		{
		
		header('location:lapmahasiswa.php');
		
		}
		elseif ($LAP=='Laporan Mahasiswa Peserta Ujian')
		{
		
		header('location:lapmhspesertaujian.php');
		
		}
		elseif ($LAP=='Laporan Mahasiswa Per-Kelas')
		{
		
		header('location:../../media.php?p=lapmahasiswakelas');
		
		}
		elseif ($LAP=='Laporan Mahasiswa Peserta Ujian')
		{
		
		header('location:lapmhspesertaujian.php');
		
		}
		
		?>