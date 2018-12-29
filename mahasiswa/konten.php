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
if  ($_GET['hal']=='addtugas')
{ include "uploadtugas.php";}
else
if  ($_GET['hal']=='edittugas')
{ include "edittugas.php";}
else
if  ($_GET['hal']=='hapustugas')
{ include "hapustugas.php";}
else
if  ($_GET['hal']=='download')
{ include "downloadmateri.php";}
else
if  ($_GET['hal']=='ujian')
{ include "ujian.php";}
else
if  ($_GET['hal']=='ujianisi')
{ include "ujianessay.php";}
else
if  ($_GET['hal']=='jawaban')
{ include "jawaban.php";}
else
if  ($_GET['hal']=='jawabanisi')
{ include "jawabanessay.php";}
else
if  ($_GET['hal']=='pilihujian')
{ include "daftarujian.php";}
else
if  ($_GET['hal']=='listujian')
{ include "daftarujian.php";}
?>