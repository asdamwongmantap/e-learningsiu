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
			<!-- TinyMCE -->
<script type="text/javascript" src="tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
tinyMCE.init({
        // General options
        mode : "textareas",
        theme : "advanced",
        plugins : "autolink,lists,spellchecker,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",

        // Theme options
        theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull",
        theme_advanced_buttons2 : "search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo",
        theme_advanced_buttons3 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,spellchecker,|,del,ins,attribs",
        theme_advanced_buttons4 : "insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons5 :"charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons6 :"cut,copy,paste,pastetext,pasteword",
		theme_advanced_buttons7 :"link,unlink,anchor,image,cleanup,help,code",
		theme_advanced_buttons8 :"hr,removeformat,visualaid,|,sub,sup",
		theme_advanced_buttons9 : "visualchars,nonbreaking,template,blockquote,pagebreak,|,insertfile,insertimage,cite,abbr,acronym",
        theme_advanced_toolbar_location : "top",
        theme_advanced_toolbar_align : "left",
        theme_advanced_statusbar_location : "bottom",
        theme_advanced_resizing : true,

        // Skin options
        skin : "o2k7",
        skin_variant : "black",

        // Example content CSS (should be your site CSS)
        content_css : "css/example.css",

        // Drop lists for link/image/media/template dialogs
        template_external_list_url : "js/template_list.js",
        external_link_list_url : "js/link_list.js",
        external_image_list_url : "js/image_list.js",
        media_external_list_url : "js/media_list.js",

        // Replace values for the template plugin
        template_replace_values : {
                username : "Some User",
                staffid : "991234"
        }
});
</script>
			<?php
			$nojawaban=mysql_query("select * from tbl_banksoalpg order by id_soal DESC LIMIT 0,1");
	$data=mysql_fetch_array($nojawaban);
	$kodeawal=substr($data['id_soal'],3,3)+1;
	if($kodeawal<10){
		$kode='PG00'.$kodeawal;
	}elseif($kodeawal > 9 && $kodeawal <=99){
		$kode='PG0'.$kodeawal;
	}else{
		$kode='PG'.$kodeawal;
	}
	?>
            <ol class="rr">
              <li class="current" >
               <h6>Input Soal</h6>
                <div class="row">
                  <div class="span7 content-wrapper clearfix">
                    <div class="right-col">
                      <form action="simpanbanksoal.php" enctype="multipart/form-data" method="post">
                       <ul class="rr">
                        <table  style="border: 0pt dashed #0000CC;float:left;width:50%;" border="0" >
						<tr><td><input type='hidden'  value="<?php echo $kode;?>" name='id_soal' placeholder="ID Soal"/></td></tr>
						<tr><td><select name='kdmk' id='s2_1' style='width: 100%;'>
								  <option value=0 selected>- Pilih Mata Kuliah -</option>
										<?php
										$tampil=mysql_query("SELECT * FROM tbl_matakuliah ORDER BY kd_mk");
										while($r=mysql_fetch_array($tampil)){
										  echo "<option value=$r[kd_mk]>$r[nma_mk]</option>";
										}
										?>
									</select>
                          
						  <tr><td><textarea name='soal' id="elm1" placeholder="Soal" cols="10">Silahkan Tulis Soal Disini</textarea></textarea></td></tr>
						  <tr><td><input type='text' name='pil_a' placeholder="Pilihan A"></td></tr>
						  <tr><td><input type='text' name='pil_b' placeholder="Pilihan B"></td></tr>
						  <tr><td><input type='text' name='pil_c' placeholder="Pilihan C"></td></tr>
						  <tr><td><input type='text' name='pil_d' placeholder="Pilihan D"></td></tr>
						  <tr><td><input type='text' name='kunci_jwb' placeholder="Kunci Jawaban"/></td></tr>
						  
						  
                           <tr><td><input type="submit" class="btn secondary" value="MASUKKAN SOAL"></td></tr>

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