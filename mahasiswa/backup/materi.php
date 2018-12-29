    			<div class="span8">
				<div class="navbar-form">
			<h2><center>Form Upload Materi Pelajaran</h2>
<form enctype="multipart/form-data" method="post">
<table border="0">
<tbody>
<tr>
<td>File</td>
<td><input type="file" name="berkas" /></td>
</tr>
<tr>
<td>Deskripsi</td>
<td><textarea cols="30" name="keterangan" rows="6"></textarea></td>
</tr>
<tr>
<td></td>
<td><input type="submit" value="Upload" /> 
<a href="tampilmateri.php">LIHAT MATERI</a></td>
</tr>
</tbody>
</table>
</form>
</div>
<?php
include ("../koneksi.php"); //file koneksi.php yg dibbuat di langkah no 1
if ($_POST) {
$filedata = addslashes(fread(fopen($_FILES['berkas']['tmp_name'], 'r'), $_FILES['berkas']['size']));
$tipe  = $_FILES['berkas']['type'];
$ukuran = $_FILES['berkas']['size'];
$nama_file = $_FILES['berkas']['name'];
$keterangan = $_POST['keterangan'];
$result = mysql_query ("insert into upload values ('','$keterangan','$tipe','$filedata','$nama_file',$ukuran)") or die(mysql_error());
if ($result) echo "Upload sukses"; } ?>
			</div>	
<div class="span4" style="float:right;">

  <div class="col-md-8"></div>
  <div class="col-md-4">
  	<ul class="nav nav nav-pills nav-stacked">
	<li class="active">MENU</li>
 <li>
	<a href="">MENU A</a>
  </li>
  <li>
	<a href="">MENU B</a>
  </li>
  
	</ul>
  </div>
</div>	