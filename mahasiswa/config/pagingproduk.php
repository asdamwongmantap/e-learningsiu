<?php
// class paging untuk halaman administrator
class PagingProduk{
// Fungsi untuk mencek halaman dan posisi data
function cariPosisi($batas){
if(empty($_GET['halproduk'])){
	$posisi=0;
	$_GET['halproduk']=1;
}
else{
	$posisi = ($_GET['halproduk']-1) * $batas;
}
return $posisi;
}

// Fungsi untuk menghitung total halagenda
function jumlahHalaman($jmldata, $batas){
$jmlhalaman = ceil($jmldata/$batas);
return $jmlhalaman;
}

// Fungsi untuk link halaman 1,2,3 (untuk admin)
function navHalaman($halaman_aktif, $jmlhalaman){
$link_halaman = "";

// Link ke halaman pertama (first) dan sebelumnya (prev)
if($halaman_aktif > 1){
	$prev = $halaman_aktif-1;
	$link_halaman .= "<a href=$_SERVER[PHP_SELF]?hal=produk-lists&halproduk=1>&laquo; First</a>
                    <a href=$_SERVER[PHP_SELF]?hal=produk-lists&halproduk=$prev>&lsaquo; Prev</a>";
}
else{ 
	$link_halaman .= "<a href=$_SERVER[PHP_SELF]?hal=produk-lists&halproduk=1>&laquo; First</a>
					<a href=$_SERVER[PHP_SELF]?hal=produk-lists&halproduk=1>&lsaquo; Prev </a>";
}

// Link halaman 1,2,3, ...
$angka = ($halaman_aktif > 3 ? " ... " : " "); 
for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
  if ($i < 1)
  	continue;
	  $angka .= "<a href=$_SERVER[PHP_SELF]?hal=produk-lists&halproduk=$i>$i | </a>";
  }
	  $angka .= " <strong>$halaman_aktif</strong>";
	  
    for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
    if($i > $jmlhalaman)
      break;
	  $angka .= "<a href=$_SERVER[PHP_SELF]?hal=produk-lists&halproduk=$i> | $i </a>";
    }
	  $angka .= ($halaman_aktif+2<$jmlhalaman ? " ... <a href=$_SERVER[PHP_SELF]?hal=produk-lists&halproduk=$jmlhalaman>$jmlhalaman</a> " : " ");

$link_halaman .= "$angka";

// Link ke halaman berikutnya (Next) dan terakhir (Last) 
if($halaman_aktif < $jmlhalaman){
	$next = $halaman_aktif+1;
	$link_halaman .= " <a href=$_SERVER[PHP_SELF]?hal=produk-lists&halproduk=$next>Next &rsaquo;</a>
                     <a href=$_SERVER[PHP_SELF]?hal=produk-lists&halproduk=$jmlhalaman>Last &raquo;</a> ";
}
else{
	$link_halaman .= " <a href=$_SERVER[PHP_SELF]?hal=produk-lists&halproduk=$jmlhalaman>Next &rsaquo;</a>
                     <a href=$_SERVER[PHP_SELF]?hal=produk-lists&halproduka=$jmlhalaman>Last &raquo;</a> ";
}
return $link_halaman;
}
}



// class paging untuk halaman administrator
class PagingProdukGrid{
// Fungsi untuk mencek halaman dan posisi data
function cariPosisi($batas){
if(empty($_GET['halproduk'])){
	$posisi=0;
	$_GET['halproduk']=1;
}
else{
	$posisi = ($_GET['halproduk']-1) * $batas;
}
return $posisi;
}

// Fungsi untuk menghitung total halagenda
function jumlahHalaman($jmldata, $batas){
$jmlhalaman = ceil($jmldata/$batas);
return $jmlhalaman;
}

// Fungsi untuk link halaman 1,2,3 (untuk admin)
function navHalaman($halaman_aktif, $jmlhalaman){
$link_halaman = "";

// Link ke halaman pertama (first) dan sebelumnya (prev)
if($halaman_aktif > 1){
	$prev = $halaman_aktif-1;
	$link_halaman .= "<a href=$_SERVER[PHP_SELF]?hal=produk-grid&halproduk=1>&laquo; First</a>
                    <a href=$_SERVER[PHP_SELF]?hal=produk-grid&halproduk=$prev>&lsaquo; Prev</a>";
}
else{ 
	$link_halaman .= "<a href=$_SERVER[PHP_SELF]?hal=produk-grid&halproduk=1>&laquo; First</a>
					<a href=$_SERVER[PHP_SELF]?hal=produk-grid&halproduk=1>&lsaquo; Prev </a>";
}

// Link halaman 1,2,3, ...
$angka = ($halaman_aktif > 3 ? " ... " : " "); 
for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
  if ($i < 1)
  	continue;
	  $angka .= "<a href=$_SERVER[PHP_SELF]?hal=produk-grid&halproduk=$i>$i | </a>";
  }
	  $angka .= " <strong>$halaman_aktif</strong>";
	  
    for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
    if($i > $jmlhalaman)
      break;
	  $angka .= "<a href=$_SERVER[PHP_SELF]?hal=produk-grid&halproduk=$i> | $i </a>";
    }
	  $angka .= ($halaman_aktif+2<$jmlhalaman ? " ... <a href=$_SERVER[PHP_SELF]?hal=produk-grid&halproduk=$jmlhalaman>$jmlhalaman</a> " : " ");

$link_halaman .= "$angka";

// Link ke halaman berikutnya (Next) dan terakhir (Last) 
if($halaman_aktif < $jmlhalaman){
	$next = $halaman_aktif+1;
	$link_halaman .= " <a href=$_SERVER[PHP_SELF]?hal=produk-grid&halproduk=$next>Next &rsaquo;</a>
                     <a href=$_SERVER[PHP_SELF]?hal=produk-grid&halproduk=$jmlhalaman>Last &raquo;</a> ";
}
else{
	$link_halaman .= " <a href=$_SERVER[PHP_SELF]?hal=produk-grid&halproduk=$jmlhalaman>Next &rsaquo;</a>
                     <a href=$_SERVER[PHP_SELF]?hal=produk-grid&halproduka=$jmlhalaman>Last &raquo;</a> ";
}
return $link_halaman;
}
}



?>