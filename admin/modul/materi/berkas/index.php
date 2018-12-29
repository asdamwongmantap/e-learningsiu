<?php
include "koneksi.php";
?>
<html>
<head><title>Index Berita</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<a href="index.php">Halaman Depan</a> |
<a href="arsip.php">Arsip Berita</a> |
<a href="input.php">Input Berita</a>
<br><br>
<h2>Halaman Depan ~ Berita Terbaru</h2>
<?
$query = "SELECT*FROM artikel";
$sql = mysql_query ($query);
while ($hasil = mysql_fetch_array ($sql)) {
$id = $hasil['id'];
$judul = stripslashes ($hasil['judul']);
$isi=stripslashes ($hasil['isi']);
$tanggal = stripslashes ($hasil['tgl']);
//
//tampilkan berita
echo "<font size=4><a
href='berita_lengkap.php?id=$id'>$judul</a></font><br>";
echo "diposting pada tanggal <b>$tanggal</b> ";
echo "<p>$isi</p>";
echo "<hr>";
}
?>
</body>
</html>