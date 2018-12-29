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
  box-shadow: 1px 1px 2px rgba(0,0,0,.3);padding-top:10px;padding-left:10px;">Selamat Datang <?php echo $nama;?>
  <div style="text-align:right;float:right;margin-right:10px;width:100px;">
                  <a href="logout.php">
                    LOGOUT
                  </a>
 </div>
  </div>
          <div class="span8" style="height:400px;border:1px solid black;border:1px solid #abb4c2;
  box-shadow: 1px 1px 2px rgba(0,0,0,.3);">
		<div class="span8" style="height:auto;border:1px solid black;border:1px solid #abb4c2;
  box-shadow: 1px 1px 2px rgba(0,0,0,.3);">
			
		<div class="main-slideshow hidden-phone">
		<div style="float:left;border:0px solid black;margin-left:20px;"><img src="../img/logosttikomiulagi.png" style="height:100px;"></div>
		<div style="align:center;border:0px solid black;margin-left:0px;margin-bottom:20px;"><p><h3>STTIKOM INSAN UNGGUL</h3></p>
			<h3>SOAL UJIAN TAHUN AKADEMIK 2015 - 2016</h3></div><p>
		
		<div style="border:1px solid black;margin-top:10px;">
        <div style="float:left;width:44%;border:0px solid black;margin-top:5px;margin-bottom:5px;text-align:left;padding-left:10px;"><font>Mata Kuliah : </br>
			  Kelas :</br>
			  Dosen :</font></div>
		<div style="text-align:left;padding-left:20px;float:right;width:50%;border:0px solid black;margin-top:5px;margin-bottom:5px;"><font>Waktu : </br>
			  Tipe / Sifat :</br>
			  Tanggal :</font></div></div></div>
		<div style="float:left;width:97%;border:1px solid black;margin-left:0px;padding-left:20px;"></div>
		<div style="float:left;width:90%;border:0px solid black;margin-left:0px;padding-left:20px;">
		 <div style="float:left;height:30px;width:90%;border:0px solid black;margin-top:5px;margin-bottom:15px;text-align:left;padding-left:0px;padding-top:10px;"><font>NIM : <?php echo ucwords($_SESSION['username']);?></br>
			  </font></div>
        <p>
        <?php
		$MK=$_POST['kdmk'];		
		$hasil=mysql_query("select * from tbl_banksoalesay where kd_mk='$MK'");
		$jumlah=mysql_num_rows($hasil);
		if ($jumlah==0)
		{
		echo "<p>Anda Tidak Memiliki Soal Ujian Untuk Mata Kuliah ini</p>";
		}
		
		else {
		$urut=0;
		
		while($row =mysql_fetch_array($hasil))
		
		{
			$id=$row["id_soal"];
			$kdmk =$row["kd_mk"];
			$soal=$row["soal"];
			
		
			?>
			
		
			<form name="form1" method="post" action="?hal=jawabanisi">
			<input type="hidden" name="id[]" value=<?php echo $id; ?>>
			<input type="hidden" name="jumlah" value=<?php echo $jumlah; ?>>
			<table width="100%" border="0">
			<tr>
			  	<td width="17"><?php echo $urut=$urut+1; ?>.</td>
			  	<td width="430"><?php echo "$soal"; ?></td>
			</tr>
			<tr>
			  	<td>&nbsp;</td>
			  	<td><input name="pilihan[<?php echo $id; ?>]" type="text" style="height:100%;"></td>
			</tr>
			</table>
		<?php
		}
		}
		?>
		
        	<tr>
				<td><br></td>
			  	<td><input type="submit" name="submit" value="Jawab" onclick="return confirm('Apakah Anda yakin dengan jawaban Anda?')"></td>
            </tr>
		
			
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