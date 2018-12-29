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
  box-shadow: 1px 1px 2px rgba(0,0,0,.3);padding-top:10px;padding-left:10px;">Selamat Datang Mahasiswa</div>
          <div class="span8" style="height:400px;border:1px solid black;border:1px solid #abb4c2;
  box-shadow: 1px 1px 2px rgba(0,0,0,.3);">
			<div style="float:left;border:0px solid black;margin-left:20px;">
        <h3>Hasil Jawaban <?php echo ucwords($_SESSION['username']);?></h3>
        
	   <?php 
       if(isset($_POST['submit'])){
			$pilihan=$_POST["pilihan"];
			$id_soal=$_POST["id"];
			$jumlah=$_POST['jumlah'];
			
			$nim=$_SESSION['nim'];
			// $benar=$_POST['benar'];
			// $salah=$_POST['salah'];
			// $kosong=$_POST['kosong'];
			// $point=$_POST['point'];
			$tanggal=date("Y-m-d");
			$tipe = $_SESSION['tipe'];
			
			$score=0;
			$benar=0;
			$salah=0;
			$kosong=0;
			
			for ($i=0;$i<$jumlah;$i++){
				//id nomor soal
				$nomor=$id_soal[$i];
				
				//jika user tidak memilih jawaban
				if (empty($pilihan[$nomor])){
					$kosong++;
				}else{
					//jawaban dari user
					$jawaban=$pilihan[$nomor];
					
					//cocokan jawaban user dengan jawaban di database
					$query=mysql_query("select * from tbl_banksoalesay where id_soal='$nomor' and kunci_jwb='$jawaban'");
					
					$cek=mysql_num_rows($query);
					
					if($cek){
						//jika jawaban cocok (benar)
						$benar++;
					}else{
						//jika salah
						$salah++;
					}
					
				} 
				$varnilai = 50;
				$score = $benar*$varnilai;
			}
		
		}
		?>
		<table width="100%" border="0">
		<tr>
			<td width="12%">Benar</font></td><td width="88%">= <?php echo $benar; ?> soal</td>
		</tr>
		<tr>
			<td>Salah</td><td>= <?php echo $salah;?> soal </td>
		</tr>
		<tr>
			<td>Kosong</td><td>= <?php echo $kosong;?> soal </td>
		</tr>
		<tr>
			<td><b>Score</b></td><td>= <b><?php echo $score;?></b> Point</td>
		</tr>
		</table>    
        </form> 
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
<?php
$jumDatacate = mysql_query("SELECT A.id_kategori, B.nama_kategori, COUNT(A.id_kategori) AS jumDatacate FROM produk A, kategori B where A.id_kategori=B.id_kategori group by A.id_kategori");
?>
  <div class="col-md-8"></div>
  <div class="col-md-4">
  	<ul class="nav nav nav-pills nav-stacked">
	<li class="active">Materi Per-MK</li>
 <li>
	<?php 
while ($rowdata =mysql_fetch_array($jumDatacate)){
?>
<a href="?hal=produk-lists-kategori&id=<?php echo $rowdata['id_kategori'] ?>"><?php echo $rowdata['nama_kategori'];?> &nbsp;[ <?php echo $rowdata['jumDatacate'];?> ]</a>
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