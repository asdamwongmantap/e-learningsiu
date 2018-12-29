<?php
include "/config/koneksi.php"; 
$direktori = "../dosen/berkas/"; // folder tempat penyimpanan file yang boleh didownload

$data = mysql_query ("select*from tbl_materi where kd_materi=" . $_REQUEST['id']);
if ($row = mysql_fetch_assoc($data)) {
 
$filename = $row['filename']; 
 }

 header("Content-Disposition: attachment; filename=\"".basename($filename)."\";" );
  header("Content-Transfer-Encoding: binary");
  header("Content-Length: ".filesize($direktori.$filename));
  readfile("$direktori$filename");

 exit();
?>