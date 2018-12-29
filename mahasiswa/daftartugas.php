<?php
include "/config/koneksi.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>E-LEARNING</title>
	  <link rel="icon" type="image/png" id="favicon"
          href="../../img/logosttikomiulagi.png"/>
</head>

<body>
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
  box-shadow: 1px 1px 2px rgba(0,0,0,.3);"><center>
			<div class="page">
    <h3 style="margin-top:10px;">Daftar Tugas</h3>
	<p align='right' style="margin-right:10px;"><a href='?hal=addtugas' role='button' class='btn'>Kirim Tugas</a></p>
<table class="layout display responsive-table">
    <thead>
        <tr>
			<th style="width:20%;">Mata Kuliah</th>   
            <th>Kelas</th>                        
            <th style="width:15%;">Tugas</th>                        
			<th>Judul</th>															
			<th style="width:20%;">Aksi</th>						                         
        </tr>
    </thead>
    <tbody>
	<?php
		$tp=mysql_query("SELECT tbl_tugas.kd_tugas, tbl_tugas.kd_mk, tbl_matakuliah.nma_mk, tbl_mahasiswa.kd_kelas, tbl_tugas.kd_kelas, tbl_tugas.judultugas, tbl_tugas.deskripsi, tbl_tugas.filename FROM tbl_tugas, tbl_matakuliah, tbl_mahasiswa, tbl_pengguna where tbl_tugas.kd_mk=tbl_matakuliah.kd_mk AND tbl_tugas.kd_kelas=tbl_mahasiswa.kd_kelas AND tbl_pengguna.username=tbl_mahasiswa.nim AND tbl_pengguna.username='$nim'");
							while($r=mysql_fetch_array($tp)){

	?>

        <tr>
           
									
                                    <td><?php echo $r['nma_mk'] ?></td>
									<td><?php echo $r['kd_kelas'] ?></td>
                                    <td><?php echo $r['judultugas'] ?></td>
									<td><?php echo $r['filename']?></td>
                                    <td><a href='?hal=edittugas&id=<?php echo $r['kd_tugas']?>'>EDIT</a>&nbsp;|
									    <a href='?hal=hapustugas&id=<?php echo $r['kd_tugas']?>&namafile=<?php echo $r['filename']?>'>HAPUS</td>
        </tr>
    <?php
	}
	?>
        

    </tbody>
</table>
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
      </div>    
</body>
</html>