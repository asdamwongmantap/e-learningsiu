<?php
include "../../../koneksi.php";
?>

  
  <?php
		$LAP=$_POST['lap'];		
		if ($LAP=='Laporan Dosen Wali')
		{
		
		header('location:lapdosenwali.php');
		
		}
		elseif ($LAP=='Laporan Dosen Mata Kuliah')
		{
		
		header('location:lapdosenmk.php');
		
		}
		
		?>