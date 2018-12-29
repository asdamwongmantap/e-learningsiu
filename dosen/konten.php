<?php
if ($_GET['hal']=='home')
{ include "home.php";}
else
if  ($_GET['hal']=='materi')
{ include "daftarmateri.php";}
else
if  ($_GET['hal']=='addmateri')
{ include "uploadmateri.php";}
else
if  ($_GET['hal']=='editmateri')
{ include "editmateri.php";}
else
if  ($_GET['hal']=='hapusmateri')
{ include "hapusmateri.php";}
else
if  ($_GET['hal']=='tugas')
{ include "daftartugas.php";}
else
if  ($_GET['hal']=='download')
{ include "downloadtugas.php";}
else
if  ($_GET['hal']=='ujian')
{ include "pilihujian.php";}
else
if  ($_GET['hal']=='inputujian')
{ include "inputujian.php";}
else
if  ($_GET['hal']=='inputsoalujianisi')
{ include "inputsoalujianesay.php";}
else
if  ($_GET['hal']=='lihatujian')
{ include "lihatujian.php";}
else
if  ($_GET['hal']=='inputujianpg')
{ include "inputujianpg.php";}
else
if  ($_GET['hal']=='inputsoalujianpg')
{ include "inputsoalujianpg.php";}
else
if  ($_GET['hal']=='lihatujianpg')
{ include "lihatujianpg.php";}
else
if  ($_GET['hal']=='editujianpg')
{ include "editujianpg.php";}
else
if  ($_GET['hal']=='editsoalujian')
{ include "editsoalujian.php";}
else
if  ($_GET['hal']=='hapussoalujian')
{ include "hapussoalujian.php";}
else
if  ($_GET['hal']=='inputbanksoal')
{ include "tambahsoal.php";}
else
if  ($_GET['hal']=='daftarsoal')
{ include "daftarsoal.php";}
else
if  ($_GET['hal']=='daftarnilai')
{ include "daftarnilai.php";}
else
if  ($_GET['hal']=='editsoal')
{ include "editsoal.php";}
else
if  ($_GET['hal']=='hapussoal')
{ include "hapussoal.php";}
?>