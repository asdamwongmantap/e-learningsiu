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
			$edit = mysql_query("SELECT * FROM tbl_soaldetail WHERE id_soalujian='$_GET[idsoalujian]' AND id_soal='$_GET[id]'");
			$r    = mysql_fetch_array($edit);?>
            <ol class="rr">
              <li class="current" >
               <h6>Pilih Soal Ujian</h6>
                <div class="row">
                  <div class="span7 content-wrapper clearfix">
                    <div class="right-col">
                      <form action="ubahsoalujianpgdetail.php" enctype="multipart/form-data" method="post">
                       <ul class="rr">
                        <table  style="border: 0pt dashed #0000CC;float:left;width:100%;" border="0" >
						
						<tr><td><input class="text-input"  style="width:50%;" type="text" name="id_soalujian" placeholder="ID Soal" value="<?php echo $r['id_soalujian'];?>"/></td></tr>
                          <tr><td><select name='id_soal' id='s2_1' style='width: 40%;' onchange="changeValue(this.value)">
								  <?php
										$tampil=mysql_query("SELECT * FROM tbl_banksoalpg ORDER BY id_soal");
										$jsArray = "var jrs = new Array();\n"; 
										if ($r[id_soal]==0){
									echo "<option value=0 selected>- Pilih Soal -</option>";
								  } 
										while($w=mysql_fetch_array($tampil))
										{
										if ($r[id_soal]==$w[id_soal]){
										  echo "<option value=$r[id_soal]>$r[id_soal]</option>";
										  $jsArray .= "jrs['" . $w['id_soal'] . "'] = {namajrs:'" . addslashes($w['soal']) . "',pilhana:'" . addslashes($w['pil_a']) . "', pilhanb:'" . addslashes($w['pil_b']) . "', pilhanc:'" . addslashes($w['pil_c']) . "', pilhand:'" . addslashes($w['pil_d']) . "'};\n";  
										  }
										  else{
										  echo "<option value=$w[id_soal]>$w[id_soal]</option>";
										  $jsArray .= "jrs['" . $w['id_soal'] . "'] = {namajrs:'" . addslashes($w['soal']) . "',pilhana:'" . addslashes($w['pil_a']) . "', pilhanb:'" . addslashes($w['pil_b']) . "', pilhanc:'" . addslashes($w['pil_c']) . "', pilhand:'" . addslashes($w['pil_d']) . "'};\n"; 
										  
										  }
										
										  
										}
										
								?>         
								</select></td></tr>
						  <tr><td><textarea class="text-input" style="color:black;" name="soal" id="soal" disabled></textarea></td></tr>
						  <tr><td>A.<textarea class="text-input" style="color:black;" name="soal" id="pilhana" disabled></textarea></td></tr>
						  <tr><td>B.<textarea class="text-input" style="color:black;" name="soal" id="pilhanb" disabled></textarea></td></tr>
						  <tr><td>C.<textarea class="text-input" style="color:black;" name="soal" id="pilhanc" disabled></textarea></td></tr>
						  <tr><td>D.<textarea class="text-input" style="color:black;" name="soal" id="pilhand" disabled></textarea>
						  
								<script type="text/javascript">  
								<?php echo $jsArray; ?>
									function changeValue(id){
									document.getElementById('soal').value = jrs[id].namajrs;
									document.getElementById('pilhana').value = jrs[id].pilhana;
									document.getElementById('pilhanb').value = jrs[id].pilhanb;
									document.getElementById('pilhanc').value = jrs[id].pilhanc;
									document.getElementById('pilhand').value = jrs[id].pilhand;
									};
								</script>
								</td></tr>
						  
                           <tr><td><input type="submit" class="btn secondary" value="MASUKKAN SOAL">
						   <a href='?hal=lihatujianpg&id_soalujian=<?php echo $idsoalujian;?>' role='button' class='btn'>Selesai</a></td></tr>

                          </table>
                        </ul>
                        
                        
                      
                      </form>
                    
                    </div>  
                  </div>                      
                </div>
             </li>
			 </ol>
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