<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Posting Multiple form dengan PHP</title>
</head>
<body>
<form method="POST" action="">
Jumlah form : <input type="text" size="5" name="jumlah" />
<input type="submit" name="btnJumlah" value="OK" />
</form>
<form method="POST" action="proses.php">
<?php
$jumlah=$_POST['jumlah'];
for($i=0; $i<$jumlah; $i++){
$nomor = $i + 1;
echo $nomor .". ";
?>
NIM <input type="text" name="nim[]" /> Nama <input type="text" name="nama[]" /><br />
<?php
}
//cetak tombol jika inputan lebih dari 0
if($jumlah >0){
echo "<input type=\"submit\" name=\"btnSiswa\" value=\"Simpan\" />";
}
?>
</form>
</body>
</html>