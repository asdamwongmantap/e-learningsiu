<html>
<head>
<title>SITUS PENDIDIKAN</title>
<link href="css/bootstrap.css" rel="stylesheet"> 
<!-- <link href="css/custom.css" rel="stylesheet">  -->

</head>
<body>
<div class="container">
<div class="head">
<h1>HGOT</h1>
<h3>HETTY, GUSNA, OKTI, TPMMP</h3>
</div>
<div class="navbar">
                <div class="navbar-inner">
                    <ul class="nav">   
                        <li>
                            <a href="index.php"><i class="icon-home"></i> Home</a>
                        </li>                        
                        <li>
                            <a href="profil.php"> Profile</a>                                
                        </li>
                        <li>
                            <a href="gallery.php"> Gallery</a> 
                        </li>
						<li>
							<a href="daftarfile.php">Materi Pelajaran</a>
						</li>
						<li>
							<a href="evaluasi.php">Evaluasi Pelajaran</a>
						</li>
                    </ul>
                </div>
            </div>
			<div class="span7">
			<?php
//panggil file config.php untuk menghubung ke server
include('koneksi.php');
 
if (isset($_POST['input'])) {
	$nama = addslashes (strip_tags ($_POST['username']));
	$sandi = md5(strip_tags ($_POST['password']));
	$level = addslashes (strip_tags ($_POST['level']));
 
//simpan data ke database
$query = mysql_query("insert into tbl_pengguna values('$nama','$sandi','$level')") or die(mysql_error());
 
if ($query) {
    echo "<h3>sukses</h3>";
 }
} else { echo "ERROR!!!!";}
?>
			
			</div>  		
		</div>
		<div class="modal-footer"><small>&copy; 2014 - Wong Mantap</small></div> 
</div>
</body>
</html>
