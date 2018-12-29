<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/tugas/aksi_tugas.php";
switch($_GET[aksi]){
default:
echo "<div class='content'>
	   <div class='workplace'>
		<div class='dr'><span></span></div>
		  <p align='right'><a href='?p=listtugas&aksi=tambah' role='button' class='btn'>Input tugas</a></p>
            <div class='row-fluid'>
                <div class='span12'>                    
                    <div class='head clearfix'>
                        <div class='isw-grid'></div>
                        <h1>Data tugas</h1>                               
                    </div>
                    <div class='block-fluid table-sorting clearfix'>
						<div class='cari'>Cari	: <input type='text' name='cari' style='height:20px; margin-top:10px;'></div>
                        <table cellpadding='0' cellspacing='0' width='100%' class='table' id='tSortable'>
                            <thead>
                                <tr>
                                    <th><input type='checkbox' name='checkbox'/></th>
									<th width='7%'>No</th>
                                    <th width='13%'>Mata Kuliah</th>
                                    <th width='5%'>Kelas</th>
                                    
									<th width='15%'>Judul</th>
									<th width='25%'>Deskripsi</th>
									<th width='20%'>Nama File</th>
                                    <th width='15%'>Aksi</th>       
                                </tr>
                            </thead>
                            <tbody>";

							$tp=mysql_query('SELECT tbl_tugas.kd_tugas, tbl_tugas.kd_mk, tbl_matakuliah.nma_mk, tbl_tugas.kd_kelas, tbl_tugas.judultugas, tbl_tugas.deskripsi, tbl_tugas.filename FROM tbl_tugas, tbl_matakuliah where tbl_tugas.kd_mk=tbl_matakuliah.kd_mk ORDER BY tbl_tugas.kd_tugas ASC');
							while($r=mysql_fetch_array($tp)){
							
							$judultugas=$r[judultugas];
							$deskripsi=$r[deskripsi];
							$filetype=$r[filetype];
							$filename=$r[filename];
							
							
                             echo"<tr>
                                    <td><input type='checkbox' name='checkbox'/></td>
									<td>$r[kd_tugas]</td>
                                    <td>$r[nma_mk]</td>
									<td>$r[kd_kelas]</td>
                                   
                                    <td>$r[judultugas]</td>
									<td>$r[deskripsi]</td>
									<td>$r[filename]</td>
									
                                    <td><a href='?p=listtugas&aksi=edit&id=$r[kd_tugas]'>EDIT</a>|
									    <a href='$aksi?act=hapus&id=$r[kd_tugas]'>HAPUS</td>
                                    
                                </tr>";
							}
                               
                                        
                        echo"</tbody>
                        </table>";
						$tp=mysql_query('SELECT count(kd_tugas) as jumlah_data FROM tbl_tugas');
							while($r=mysql_fetch_array($tp)){
						echo "
						<div class='jumlahdata' style='margin-right:10px;float:right;'>Jumlah tugas Yang Disimpan Sebanyak : $r[jumlah_data]</div>";}
					echo "
                    </div>
                </div>                                
            </div>            
            <div class='dr'><span></span></div>            
        </div>
    </div>";    

break;
case "edit":
	$edit = mysql_query("SELECT * FROM tbl_tugas WHERE kd_tugas='$_GET[id]'");
    $r    = mysql_fetch_array($edit);
echo "<form method='post' action='modul/tugas/aksi_tugas.php?act=update' enctype='multipart/form-data'>";
echo "<div class='content'>
		<div class='workplace'>
            <div class='row-fluid'>
                <div class='span6'>
                  <div class='block-fluid'>                        
                     <div class='head clearfix'>
                     
                        <h1>Edit List tugas</h1>
                    </div>    
					<input type=hidden name=id value=$r[kd_tugas]>
					
					<div class='row-form clearfix'>
								 <div class='span3'>Mata Kuliah</div>
                            <div class='span9'>
							<select name='kdmk' id='s2_1' style='width: 100%;'>";
								  $tampil=mysql_query("SELECT * FROM tbl_matakuliah ORDER BY nma_mk");
								  if ($r[kd_mk]==0){
									echo "<option value=0 selected>- Pilih Mata Kuliah -</option>";
								  }   
								  
                                  while($w=mysql_fetch_array($tampil)){
									if ($r[kd_mk]==$w[kd_mk]){
									  echo "<option value=$w[kd_mk] selected>$w[nma_mk]</option>";
									}
									else{
									  echo "<option value=$w[kd_mk]>$w[nma_mk]</option>";
									}
								  }                                 
                       echo"</select>
							</div>
                        </div>
						
					<div class='row-form clearfix'>
                            <div class='span3'>Kelas</div>
                            <div class='span9'>
							<select name='kdkelas' id='s2_1' style='width: 100%;'>";
								  $tampil=mysql_query("SELECT * FROM tbl_kelas ORDER BY jurusan");
								  if ($r[kd_kelas]==0){
									echo "<option value=0 selected>- Pilih Kelas -</option>";
								  }   
								  
                                  while($w=mysql_fetch_array($tampil)){
									if ($r[kd_kelas]==$w[kd_kelas]){
									  echo "<option value=$w[kd_kelas] selected>$w[kd_kelas]</option>";
									}
									else{
									  echo "<option value=$w[kd_kelas]>$w[kd_kelas]</option>";
									}
								  }                                 
                       echo"</select>
							</div>
                        </div>
					
					<div class='row-form clearfix'>
                            <div class='span3'>Judul tugas</div>
                            <div class='span9'><textarea name='judultugas'/>$r[judultugas]</textarea></div>
                        </div>
					
					<div class='row-form clearfix'>
                            <div class='span3'>Deskripsi</div>
                            <div class='span9'><textarea name='deskripsi'/>$r[deskripsi]</textarea></div>
                        </div>
						
					
					 
					 <div class='row-form clearfix'>
                            <div class='span3'>File</div>
                            <div class='span9'> <input type='file' name='berkas'>
							<br>
							* Apabila File tidak diubah, dikosongkan saja.</br>
							* File Harus Bertipe .jpeg/.jpg
							</div>
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
echo "<form method='post' action='modul/tugas/aksi_tugas.php?act=input' enctype='multipart/form-data'>";
echo "<div class='content'>
		<div class='workplace'>
            <div class='row-fluid'>
                <div class='span6'>
                  <div class='block-fluid'>                        
                     <div class='head clearfix'>
                       
                        <h1>Input tugas</h1>
                    </div>    
                      <div class='row-form clearfix'>
							<div class='span3'>Kode tugas</div>
                            <div class='span9'><input type='text' name='kd_tugas'/></div>
                        </div>
						
					<div class='row-form clearfix'>
                            <div class='span3'>Mata Kuliah</div>
                            <div class='span9'>
							<select name='kdmk' id='s2_1' style='width: 100%;'>
								  <option value=0 selected>- Pilih Mata Kuliah -</option>";
										$tampil=mysql_query("SELECT * FROM tbl_matakuliah ORDER BY kd_mk");
										while($r=mysql_fetch_array($tampil)){
										  echo "<option value=$r[kd_mk]>$r[nma_mk]</option>";
										}                               
                       echo"</select>
							</div>
                        </div>
						
					<div class='row-form clearfix'>
                            <div class='span3'>Kelas</div>
                            <div class='span9'>
							<select name='kdkelas' id='s2_1' style='width: 100%;'>
								  <option value=0 selected>- Pilih Kelas -</option>";
										$tampil=mysql_query("SELECT * FROM tbl_kelas ORDER BY jurusan");
										while($r=mysql_fetch_array($tampil)){
										  echo "<option value=$r[kd_kelas]>$r[kd_kelas]</option>";
										}                               
                       echo"</select>
							</div>
                        </div>
									
					
					 <div class='row-form clearfix'>
                           <div class='span3'>Judul tugas</div>
                            <div class='span9'><textarea name='judultugas'></textarea></div>
                    </div>
					
					 <div class='row-form clearfix'>
                            <div class='span3'>Deskripsi</div>
                            <div class='span9'><textarea name='deskripsi'></textarea></div>
                    </div>
							
					 <div class='row-form clearfix'>
                            <div class='span3'>File</div>
                            <div class='span9'> <input type='file' name='berkas'>
							<br>
							* Apabila File tidak diubah, dikosongkan saja.</br>
							
							</div>
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