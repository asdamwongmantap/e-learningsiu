<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
if ($_GET['p']=='home')
{ 
include "home.php";
}
else
if ($_GET['p']=='caraujian')
{ 
include "modul/caraikutujian/caraujian.php";
}
else
if ($_GET['p']=='gantipassword')
{ 
include "modul/gantipassword/gantipass.php";
}
else
if ($_GET['p']=='datakelas')
{ 
include "modul/kelas/kelas.php";
}
else
if ($_GET['p']=='datamatakuliah')
{ 
include "modul/matakuliah/matakuliah.php";
}
else
if ($_GET['p']=='datamahasiswa')
{ 
include "modul/mahasiswa/mahasiswa.php";
}
else
if ($_GET['p']=='datadosen')
{ 
include "modul/dosen/dosen.php";
}
else
if ($_GET['p']=='datadosenmatakuliah')
{ 
include "modul/dosen/dosenmk.php";
}
else
if ($_GET['p']=='datapengguna')
{ 
include "modul/pengguna/user.php";
}
else
if ($_GET['p']=='databanksoal')
{ 
include "modul/banksoal/banksoal.php";
}
else
if ($_GET['p']=='soalpilihan')
{ 
include "modul/banksoal/banksoal.php";
}
else
if ($_GET['p']=='soalisi')
{ 
include "modul/banksoal/soalessay.php";
}
else
if ($_GET['p']=='listmateri')
{ 
include "modul/materi/materi.php";
}
else
if ($_GET['p']=='listtugas')
{ 
include "modul/tugas/tugas.php";
}
else
if ($_GET['p']=='laporandsn')
{ 
include "modul/laporan/laporandosen.php";
}
else
if ($_GET['p']=='laporanmahasiswa')
{ 
include "modul/laporan/laporanmahasiswa.php";
}
else
if ($_GET['p']=='lapmahasiswakelas')
{ 
include "modul/laporan/lapmahasiswakelas.php";
}
else
if ($_GET['p']=='laporannilai')
{ 
include "modul/laporan/laporannilai.php";
}
else
if ($_GET['p']=='lapnilaikelas')
{ 
include "modul/laporan/lapnilaikelas.php";
}
else
{
include "not_found.php";	
}

?>
</body>
</html>