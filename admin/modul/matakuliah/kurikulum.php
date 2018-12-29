<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/matakuliah/aksi_kurikulum.php";
switch($_GET[aksi]){
default:
echo "<div class='content'>
	   <div class='workplace'>
		<div class='dr'><span></span></div>
		  <p align='right'><a href='?p=datamatakuliah&aksi=tambah' role='button' class='btn'>Input Data Matakuliah</a></p>
            <div class='row-fluid'>
                <div class='span12'>                    
                    <div class='head clearfix'>
                        <div class='isw-grid'></div>
                        <h1>Data Matakuliah</h1>                               
                    </div>
                    <div class='block-fluid table-sorting clearfix'>
					<div class='cari'>Cari	: <input type='text' name='cari' style='height:20px; margin-top:10px;'></div>
                        <table cellpadding='0' cellspacing='0' width='100%' class='table' id='tSortable'>
                            <thead>
                                <tr>
                                    <th><input type='checkbox' name='checkbox'/></th>
									<th width='20%'>Kode Matakuliah</th>
                                    <th width='30%'>Nama Matakuliah</th>
                                    <th width='5%'>SKS</th>
                                    <th width='25%'>Aksi</th>                                   
                                </tr>
                            </thead>
                            <tbody>";

							$tp=mysql_query('SELECT * FROM tbl_matakuliah ORDER BY kd_mk ASC');
							while($r=mysql_fetch_array($tp)){
							$sks=$r[sks];
							$kurikulum=$r[kurikulum];
							$jurusan=$r[jurusan];
                             echo"<tr>
                                    <td><input type='checkbox' name='checkbox'/></td>
									<td>$r[kd_mk]</td>
                                    <td>$r[nma_mk]</td>
                                    <td>$sks</td>
                                    <td><a href='?p=datamatakuliah&aksi=edit&id=$r[kd_mk]'>EDIT</a>|
									    <a href='$aksi?act=hapus&id=$r[kd_mk]'>HAPUS</td>
                                    
                                </tr>";
							}
                               
                                        
                        echo"</tbody>
                        </table>
                    </div>
                </div>                                
            </div>            
            <div class='dr'><span></span></div>            
        </div>
    </div>";    

break;
case "edit":
	$edit = mysql_query("SELECT * FROM tbl_matakuliah WHERE kd_mk='$_GET[id]'");
    $r    = mysql_fetch_array($edit);
echo "<form method='post' action='modul/matakuliah/aksi_matakuliah.php?act=update' enctype='multipart/form-data'>";
echo "<div class='content'>
		<div class='workplace'>
            <div class='row-fluid'>
                <div class='span6'>
                  <div class='block-fluid'>                        
                     <div class='head clearfix'>
                     
                        <h1>Edit Data Matakuliah</h1>
                    </div>    
					<input type=hidden name=id value=$r[kd_mk]>
					
					<div class='row-form clearfix'>
                            <div class='span3'>Nama Matakuliah</div>
                            <div class='span9'><input type='text' name='nma_mk' value='$r[nma_mk]'/></div>
                        </div>
						
					 <div class='row-form clearfix'>
                            <div class='span3'>SKS</div>
                            <div class='span9'><input type='text' name='sks' value='$r[sks]'/></div>
                    </div>
					
					 <div class='row-form clearfix'>
                            <div class='span3'>Kurikulum</div>
                            <div class='span9'><input type='text' name='kurikulum' value='$r[kurikulum]'/></div>
                    </div>
					
					
							
							
                    </div>
                </div>
            </div>
			<input type='submit' class='btn' value='Simpan'>
		  </form>
		</div>
<div class='dr'><span></span></div>";
echo "";
break;

case "tambah":
echo "<form method='post' action='modul/matakuliah/aksi_matakuliah.php?act=input' enctype='multipart/form-data'>";
echo "<div class='content'>
		<div class='workplace'>
            <div class='row-fluid'>
                <div class='span6'>
                  <div class='block-fluid'>                        
                     <div class='head clearfix'>
                       
                        <h1>Input Data Matakuliah</h1>
                    </div>    
                      <div class='row-form clearfix'>
							<div class='span3'>Kode matakuliah</div>
                            <div class='span9'><input type='text' name='kd_mk'/></div>
                        </div>
					
					<div class='row-form clearfix'>
                            <div class='span3'>Nama Matakuliah</div>
                            <div class='span9'><input type='text' name='nma_mk'/></div>
                        </div>
						
					 <div class='row-form clearfix'>
                            <div class='span3'>SKS</div>
                            <div class='span9'><input type='text' name='sks'/></div>
                    </div>
					
					 <div class='row-form clearfix'>
                            <div class='span3'>Kurikulum</div>
                            <div class='span9'><input type='text' name='kurikulum'/></div>
                    </div>
					
					
							
					 
							
                    </div>
                </div>
            </div>
			<input type='submit' class='btn' value='Simpan'>
		  </form>
		</div>
<div class='dr'><span></span></div>";
echo "";
break;
			}//penutup switch
}//penutup session
?>    
</body>
</html>