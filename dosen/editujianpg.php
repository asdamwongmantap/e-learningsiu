<?php
include "/config/koneksi.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>E-LEARNING</title>
	  <link rel="icon" type="image/png" id="favicon"
          href="img/logosttikomiulagi.png"/>
</head>

<body>
          <?php
		$nid=$_SESSION['username'];
		$hasil=mysql_query("select p.username, d.nid,d.namadsn 
from tbl_pengguna p, tbl_dosen d where p.username=d.nid AND p.username='$nid'");

		$row =mysql_fetch_array($hasil);
		
			$nid=$row["nid"];
			$nama =$row["namadsn"];
			
		?>
       <div role="main" class="container checkout">
        <div class="row">
        <div class="span12" style="width:100%;border:1px solid black;text-align:left;height:30px;margin-bottom:20px;border:1px solid #abb4c2;
  box-shadow: 1px 1px 2px rgba(0,0,0,.3);padding-top:10px;padding-left:10px;">Selamat Datang <?php echo $nama;?>
  <div style="text-align:right;float:right;margin-right:10px;width:100px;">
                  <a href="logout.php">
                    LOGOUT
                  </a>
 </div>
  </div>
         <div class="span8" style="height:auto;border:1px solid black;border:1px solid #abb4c2;
  box-shadow: 1px 1px 2px rgba(0,0,0,.3);"><center>
			<div class="span5 checkout-list" style="border:0px solid black;margin-top:30px;">
			<?php
			$edit = mysql_query("SELECT * FROM tbl_soal WHERE id_soalujian='$_GET[id]'");
			$r    = mysql_fetch_array($edit);?>
            <ol class="rr">
              <li class="current" >
               <h6>Edit Ujian</h6>
                <div class="row">
                  <div class="span7 content-wrapper clearfix">
                    <div class="right-col">
                      <form action="ubahsoalujianpg.php" enctype="multipart/form-data" method="post">
                       <ul class="rr">
                        <table  style="border: 0pt dashed #0000CC;float:left;width:100%;" border="0" >
						
                          <tr><td><input class="text-input"  style="width:50%;" type="text" name="id_soalujian" value="<?php echo $r['id_soalujian'];?>" placeholder="ID Soal Ujian"/></td></tr>
                          <tr><td><select name='kdmk' id='s2_1' style='width: 100%;'>
						  <?php
								  $tampil=mysql_query("SELECT * FROM tbl_matakuliah ORDER BY nma_mk");
								  if ($r[kd_mk]==0){
									echo "<option value=0 selected>- Pilih Mata Kuliah -</option>";
								  }   
								  
                                  while($w=mysql_fetch_array($tampil)){
									if ($r[kd_mk]==$w[kd_mk]){
									  echo "<option value=$w[kd_mk] selected>$w[nma_mk]</option>";
									}
									else{
									  echo "<option value=$w[kd_mk]>$w[nma_mk]</option>";
									}
								  }     ?>                            
                       </select></td></tr>
                          <tr><td><select name='kdkelas' id='s2_1' style='width: 100%;'>
						  <?php
								  $tampil=mysql_query("SELECT * FROM tbl_kelas ORDER BY jurusan");
								  if ($r[kd_kelas]==0){
									echo "<option value=0 selected>- Pilih Kelas -</option>";
								  }   
								  
                                  while($w=mysql_fetch_array($tampil)){
									if ($r[kd_kelas]==$w[kd_kelas]){
									  echo "<option value=$w[kd_kelas] selected>$w[kd_kelas]</option>";
									}
									else{
									  echo "<option value=$w[kd_kelas]>$w[kd_kelas]</option>";
									}
								  }  
						?>
                       </select></td></tr>
						   <tr><td><input class="text-input"  style="width:50%;" type="text" name="nid" value="<?php echo $r['nid'];?>"/></td></tr>
						   <tr><td><input class="text-input"  style="width:50%;" type="text" name="waktu" value="<?php echo $r['waktu'];?>" placeholder="Waktu Ujian"/></td></tr>
						   <tr><td><select name='tipe' id='s2_1' style='width: 60%;'>
								  <option value=<?php echo $r['tipe'];?>>- Pilih Tipe Ujian -</option>
								  </select>
								  </td></tr>
							<tr><td><input class="text-input"  style="width:50%;" type="date" name="tgl_ujian" value="<?php echo $r['tgl_ujian'];?>" placeholder="Waktu Ujian"/></td></tr>
                          
                           <tr><td><input type="submit" class="btn secondary" value="SIMPAN"></td></tr>

                          </table>
                        </ul>
                        
                        
                      
                      </form>
                    
                    </div>  
                  </div>                      
                </div>
             </li>
			 </ol>
          </div>

		   <div class="page">
		
<table class="layout display responsive-table">

    <thead>
        <tr>
			<th style="width:10%;">ID SOAL UJIAN</th>                      
            <th style="width:25%;">ID SOAL</th>                        															
			<th style="width:20%;">Aksi</th>						                         
        </tr>
    </thead>
    <tbody>
	<?php
		$tp=mysql_query('SELECT * FROM tbl_soaldetail where id_soalujian like "SP%"');
							while($r=mysql_fetch_array($tp)){

	?>

        <tr>
           
									
                                    <td><?php echo $r['id_soalujian'] ?></td>
									<td><?php echo $r['id_soal'] ?></td>
                                    
                                    <td><a href='?hal=editmateri&id=<?php echo $r['kd_materi']?>'>EDIT</a>&nbsp;|
									    <a href='?hal=hapusmateri&id=<?php echo $r['kd_materi']?>'>HAPUS</td>
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
	<li class="active">AKTIFITAS DOSEN</li>
 <li align="left">
 Mengajar :
<?php
$jumMK = mysql_query("SELECT COUNT(D.kd_mk) AS jumMK FROM tbl_dosenmk D where D.nid=$_SESSION[username]");
?> 
	<?php 
while ($rowdata =mysql_fetch_array($jumMK)){
?>
&nbsp; <?php echo $rowdata['jumMK'];?>  Mata Kuliah
<?php 
} 
?>
  </li>
  <?php
$waliDSN = mysql_query("SELECT K.kd_kelas, D.nid FROM tbl_pengguna P, tbl_dosen D, tbl_kelas K where D.nid=K.nid AND K.nid=$_SESSION[username]");
?>
   <li align="left">
   Wali Dosen : 
	<?php 
$rowdata =mysql_fetch_array($waliDSN)
?>
&nbsp; <?php echo $rowdata['kd_kelas'];?> 

  </li>
  
  <?php

?>
   <li align="left">
 Kotak Jawaban Tugas :
<?php
$jawabTGS = mysql_query("SELECT COUNT(T.kd_tugas) AS jawabTGS FROM tbl_tugas T, tbl_dosenmk M where T.kd_mk=M.kd_mk AND M.nid=$_SESSION[username]");
?> 
	<?php 
while ($rowdata =mysql_fetch_array($jawabTGS)){
?>
&nbsp; <?php echo $rowdata['jawabTGS'];?>  Mata Kuliah
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