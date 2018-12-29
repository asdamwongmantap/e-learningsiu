<?php
include "/config/koneksi.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>E-LEARNING</title>
	  <link rel="icon" type="image/png" id="favicon"
          href="../img/logosttikomiulagi.png"/>
		  
		<script src="../js/jquery-1.8.3.min.js" type="text/javascript"></script>

	
</head>

<body>
 <center>
 <?php
		$nim=$_SESSION['username'];
		$hasil=mysql_query("select p.username, mhs.nim,mhs.namamhs, mhs.kd_kelas 
from tbl_pengguna p, tbl_mahasiswa mhs where p.username=mhs.nim AND p.username='$nim'");

		$row =mysql_fetch_array($hasil);
		
			$nim=$row["nim"];
			$nama =$row["namamhs"];
			$kelas = $row["kd_kelas"];
		?>
      <div role="main" class="container products list">        
        <div class="row">         
		 <div class="span12" style="width:100%;border:1px solid black;text-align:left;height:30px;margin-bottom:20px;border:1px solid #abb4c2;
  box-shadow: 1px 1px 2px rgba(0,0,0,.3);padding-top:10px;padding-left:10px;">Selamat Datang <?php echo $nama?>
  <div style="text-align:right;float:right;margin-right:10px;width:100px;">
                  <a href="logout.php">
                    LOGOUT
                  </a>
 </div>
  </div>
          <div class="span8" style="height:auto;border:1px solid black;border:1px solid #abb4c2;
  box-shadow: 1px 1px 2px rgba(0,0,0,.3);">
  
  <?php
		$MK=$_POST['kdmk'];		
		$nisuser=$_SESSION['username'];
		$hasil=mysql_query("SELECT * FROM tbl_soal s, tbl_mahasiswa mhs, tbl_matakuliah mk, tbl_dosen d WHERE s.kd_mk='$MK' AND s.tgl_ujian=curdate() AND mhs.nim='$nisuser' AND s.kd_kelas=mhs.kd_kelas AND s.kd_mk=mk.kd_mk AND s.nid=d.nid");
		$jumlah=mysql_num_rows($hasil);
		if ($jumlah==0)
		{
		echo "<p style='padding-top:50px;'>Anda Tidak Memiliki Soal Ujian Untuk Mata Kuliah ini</p>";
		echo '<div class="span8" style="height:200px;border:0px solid black;border:0px solid #abb4c2;
  box-shadow: 0px 0px px rgba(0,0,0,.3);">';
  echo "<p style='padding-top:50px;'><a href='?hal=home'>Kembali Ke Beranda</a></p>";
		}
		
		else {
		$urut=0;
		
		$row =mysql_fetch_array($hasil);
		
		
			$id=$row["id_soalujian"];
			$kdmk =$row["kd_mk"];
			$namamk=$row["nma_mk"];
			$kdkelas=$row["kd_kelas"];
			$nid=$row["nid"];
			$waktu=$row["waktu"];
			$tipe=$row["tipe"];
			$tglujian=$row["tgl_ujian"];
			$namadsn=$row["namadsn"];
		
			?>
			
			<script type="text/javascript">
 
   $(document).ready(function() {
      /** Membuat Waktu Mulai Hitung Mundur Dengan 
       * var detik = 0,
       * var menit = 1,
       * var jam = 1
       */
       var detik = 0;
       var menit = <?php echo $waktu+1;?>;
   
 
      /**
       * Membuat function hitung() sebagai Penghitungan Waktu
       */
       function hitung() {
          /** setTimout(hitung, 1000) digunakan untuk 
	   *  mengulang atau merefresh halaman selama 1000 (1 detik) */
	   setTimeout(hitung,1000);
 
	  /** Menampilkan Waktu Timer pada Tag #Timer di HTML yang tersedia */
	   $('#timer').html( 'Sisa Waktu:' + menit + ' Menit - ' + detik + ' Detik ');
 
	  /** Melakukan Hitung Mundur dengan Mengurangi variabel detik - 1 */
	   detik --;
 
	  /** Jika var detik < 0
	   *  var detik akan dikembalikan ke 59
	   *  Menit akan Berkurang 1
	   */
	   if(detik < 0) {
	      detik = 59;
	      menit --;
 
	      /** Jika menit < 0
	       *  Maka menit akan dikembali ke 59
	       *  Jam akan Berkurang 1
	       */
	       if(menit < 0) {
 		  clearInterval();
			  alert('Maaf Batas Waktu pengerjaan Sudah Habis...Untuk Melanjutkan Silahkan Login Kembali');
 		      window.location = "logout.php";
 
		  /** Jika var jam < 0
		   *  clearInterval() Memberhentikan Interval 
		   *  Dan Halaman akan ke halaman logout
		   */
		   
	       }
	   } 		
        }
 	/** Menjalankan Function Hitung Waktu Mundur */
        hitung();
   });
// ]]></script> 
			
		<div class="main-slideshow hidden-phone">
		<div style="float:left;border:0px solid black;margin-left:20px;"><img src="../img/logosttikomiulagi.png" style="height:100px;"></div>
		<div style="align:center;border:0px solid black;margin-left:0px;margin-bottom:20px;"><p><h3>STTIKOM INSAN UNGGUL</h3></p>
			<h3>SOAL UJIAN TAHUN AKADEMIK 2015 - 2016</h3></div><p>
		
		<div style="border:1px solid black;margin-top:10px;">
        <div style="float:left;width:44%;border:0px solid black;margin-top:5px;margin-bottom:5px;text-align:left;padding-left:10px;"><font>Mata Kuliah :<?php echo $namamk;?></br>
		<?php
		$nim=$_SESSION['username'];
		$hasil=mysql_query("select p.username, mhs.nim,mhs.namamhs, mhs.kd_kelas 
from tbl_pengguna p, tbl_mahasiswa mhs where p.username=mhs.nim AND p.username='$nim'");

		$row =mysql_fetch_array($hasil);
		
			$nim=$row["nim"];
			$nama =$row["namamhs"];
			$kelas = $row["kd_kelas"];
		?>
			  Kelas : <?php echo $kdkelas; ?></br>
		
			  Dosen : <?php echo $namadsn; ?></font></div>
		<div style="text-align:left;padding-left:20px;float:right;width:50%;border:0px solid black;margin-top:5px;margin-bottom:5px;"><font>Waktu :<?php echo $waktu; ?> Menit</br>
			  Tipe / Sifat :<?php echo $tipe; ?></br>
			  Tanggal :<?php echo $tglujian; ?></font></div></div></div>
		<div style="float:left;width:97%;border:1px solid black;margin-left:0px;padding-left:20px;"></div>
		<div style="float:left;width:90%;border:0px solid black;margin-left:0px;padding-left:20px;">
		 <div style="float:left;height:30px;width:90%;border:0px solid black;margin-top:5px;margin-bottom:70px;text-align:left;padding-left:0px;padding-top:10px;"><font>
		 <div id="timer" style="border:1px solid #abb4c2;
  box-shadow: 1px 1px 2px rgba(0,0,0,.3);float:right;width:40%;height:auto;font-weight:bold;text-transform:uppercase;"></div>
		 NIM : <?php echo ucwords($_SESSION['username']);?></br>
		 Nama : <?php echo $nama; ?>
			  </font></div>
		
        <p>
        <?php
		
		//$hasil=mysql_query("select*from tbl_soaldetail sd,tbl_banksoalpg, tbl_soal bs where sd.id_soal=bs.id_soal AND sd.id_soalujian='$id'");
		$hasilpg=mysql_query("select*from tbl_soaldetail sd,tbl_banksoalpg bs, tbl_soal s where sd.id_soal=bs.id_soal AND sd.id_soalujian like 'SP%' AND s.id_soalujian=sd.id_soalujian AND sd.id_soalujian='$id' AND s.tgl_ujian=curdate()");
		
		//$jumlah=mysql_num_rows($hasil);
		$jumlahpg=mysql_num_rows($hasilpg);
		
		$urut=0;
		
		$nojawaban=mysql_query("select * from tbl_nilai order by id_jawaban DESC LIMIT 0,1");
	$data=mysql_fetch_array($nojawaban);
	$kodeawal=substr($data['id_jawaban'],3,3)+1;
	if($kodeawal<10){
		$kode='JP00'.$kodeawal;
	}elseif($kodeawal > 9 && $kodeawal <=99){
		$kode='JP0'.$kodeawal;
	}else{
		$kode='J'.$kodeawal;
	}
		if ($jumlahpg)
		{
		echo '	<form name="form1" method="post" action="?hal=jawaban">
			  <input type="hidden" name="idjawaban" value='.$kode.'>
			  <input type="hidden" name="kdmk" value='.$kdmk.'>
			  <input type="hidden" name="kdkelas" value='.$kdkelas.'>';
		
		$urut=0;
		while($row =mysql_fetch_array($hasilpg))
		{
			$idsoalujian=$row["id_soalujian"];
			$idsoal=$row["id_soal"];
			$soal=$row["soal"];
			$pil_a=$row["pil_a"];
			$pil_b=$row["pil_b"];
			$pil_c=$row["pil_c"];
			$pil_d=$row["pil_d"];
			?>
			
		
			
			<input type="hidden" name="idsoalujian" value=<?php echo $idsoalujian; ?>>
			<input type="hidden" name="id[]" value=<?php echo $idsoal; ?>>
			<input type="hidden" name="jumlahpg" value=<?php echo $jumlahpg; ?>>
			<table width="100%" border="0">
			<tr>
			  	<td width="17"><?php echo $urut=$urut+1; ?>.</td>
			  	<td width="430"><?php echo "$soal"; ?></td>
			</tr>
			<tr>
			  	<td height="21">&nbsp;</td>
			  	<td><input name="pilihan[<?php echo $idsoal; ?>]" type="radio" value="A"><?php echo "$pil_a";?></td>
			</tr>
			<tr>
			  	<td>&nbsp;</td>
			  	<td><input name="pilihan[<?php echo $idsoal; ?>]" type="radio" value="B"><?php echo "$pil_b";?></td>
			</tr>
			<tr>
			  	<td>&nbsp;</td>
			  	<td><input name="pilihan[<?php echo $idsoal; ?>]" type="radio" value="C"><?php echo "$pil_c";?></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			  	<td><input name="pilihan[<?php echo $idsoal; ?>]" type="radio" value="D"><?php echo "$pil_d";?></td>
            </tr>
			
			
			</table>
			
		<?php
		
		}
		echo'<tr>
				<td><br></td>
			  	<td><input type="submit" name="submit" value="Jawab" onclick="return confirm(Apakah Anda yakin dengan jawaban Anda?)"></td>
            </tr>';
		}
		
		}
		?>
        	
			
		</form>
        </p>
		</div>


          </div>
		  
		  <div class="span3" style="float:right; border:0px solid black;margin-top:11px;">

  <div class="col-md-8"></div>
  <div class="col-md-4">
  	<ul class="nav nav nav-pills nav-stacked">
	<li class="active">PENCARIAN</li>
 <li>
	<table style='width:100%;'><tr><td><form name='formcari' method='POST' action='?hal=search' style="margin-top:10px;width:100%;"/><input type='input-text' name='title' type='text' placeholder='Pencarian'/>
					<input type='submit' name='input' value='Cari' style="color: #ffffff;
  text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
  background-color: #363636;
  *background-color: #222222;
  background-image: -moz-linear-gradient(top, #444444, #222222);
  background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#444444), to(#222222));
  background-image: -webkit-linear-gradient(top, #444444, #222222);
  background-image: -o-linear-gradient(top, #444444, #222222);
  background-image: linear-gradient(to bottom, #444444, #222222);
  background-repeat: repeat-x;
  border-color: #222222 #222222 #000000;
  border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ff444444', endColorstr='#ff222222', GradientType=0);
  filter: progid:DXImageTransform.Microsoft.gradient(enabled=false);width:18%;
  text-align:left;"/></td></tr></table>
  </li>
  
	</ul>
  </div>
</div>
		  
		    <div class="span3" style="float:right; border:0px solid black;margin-top:11px;">

  <div class="col-md-8"></div>
  <div class="col-md-4">
  	<ul class="nav nav nav-pills nav-stacked">
	<li class="active">AKTIFITAS MAHASISWA</li>
 <li align="left">
 Kelas :
<?php
$kelasMHS = mysql_query("SELECT kd_kelas FROM tbl_mahasiswa where nim='$_SESSION[username]'");

$row =mysql_fetch_array($kelasMHS)
?>
&nbsp; <?php echo $row['kd_kelas'];?> 

  </li>
  
 
  <?php
$waliDSN = mysql_query("SELECT K.nid, D.namadsn FROM tbl_mahasiswa M, tbl_dosen D, tbl_kelas K where M.kd_kelas=K.kd_kelas AND K.nid=D.nid AND M.nim='$_SESSION[username]'");
?>
   <li align="left">
   Wali Dosen : 
	<?php 
$rowdata =mysql_fetch_array($waliDSN)
?>
&nbsp; <?php echo $rowdata['namadsn'];?> 

  </li>

  
  <li align="left">
 Kotak Materi :
<?php
$jawabTGS = mysql_query("SELECT COUNT(M.kd_materi) AS fileMTR 
FROM tbl_materi M, tbl_mahasiswa K 
where M.kd_kelas=K.kd_kelas AND K.nim='$_SESSION[username]'");
?> 
	<?php 
while ($rowdata =mysql_fetch_array($jawabTGS)){
?>
&nbsp; <?php echo $rowdata['fileMTR'];?>  Materi
<?php 
} 
?>
  </li>
  
	</ul>
  </div>
</div>
          
        </div>
      </div>
</body>
</html>