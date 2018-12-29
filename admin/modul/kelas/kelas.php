<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/kelas/aksi_kelas.php";
switch($_GET[aksi]){
default:
echo "<div class='content'>
	   <div class='workplace'>
	   
	   
<div class='dr'><span></span></div>
		  <p align='right'><a href='?p=datakelas&aksi=tambah' role='button' class='btn'>Input Data Kelas</a></p>
            <div class='row-fluid'>
                <div class='span12'>                    
                    <div class='head clearfix'>
                        <div class='isw-grid'></div>
                        <h1>Data Kelas</h1>                               
                    </div>
                    <div class='block-fluid table-sorting clearfix'>
					<div class='cari'>Cari	: <input type='text' name='cari' style='height:20px; margin-top:10px;'></div>
                        <table cellpadding='0' cellspacing='0' width='100%' class='table' id='tSortable'>
                            <thead>
                                <tr>
                                    <th><input type='checkbox' name='checkbox'/></th>
									<th width='10%'>Kode Kelas</th>
                                    <th width='20%'>Jurusan</th>
                                    <th width='15%'>Tahun Akademik</th>
                                    <th width='15%'>Dosen Wali</th>
									<th width='10%'>Jenjang</th>
                                    <td width='25%'>Aksi</th>                                   
                                </tr>
                            </thead>
                            <tbody>";

							$tp=mysql_query('SELECT k.kd_kelas, k.jurusan, k.thn_akademik, k.nid, d.namadsn, k.jenjang 
							FROM tbl_kelas k, tbl_dosen d where k.nid=d.nid
							GROUP BY k.kd_kelas,  k.nid');
							while($r=mysql_fetch_array($tp)){
							$tahun=$r[thn_akademik];
							$dosenwali=$r[namadsn];
							$jenjang=$r[jenjang];
							$jurusan=$r[jurusan];
                             echo"<tr>
                                    <td><input type='checkbox' name='checkbox'/></td>
									<td>$r[kd_kelas]</td>
                                    <td>$jurusan</td>
                                    <td>$tahun</td>
                                    <td>$dosenwali</td>
									<td>$jenjang</td>
                                    <td><a href='?p=datakelas&aksi=edit&id=$r[kd_kelas]'>EDIT</a>|
									    <a href='$aksi?act=hapus&id=$r[kd_kelas]'>HAPUS</td>
                                    
                                </tr>";
							}
                               
                                        
                        echo"</tbody>
                        </table>";
						$tp=mysql_query('SELECT count(kd_kelas) as jumlah_data FROM tbl_kelas');
							while($r=mysql_fetch_array($tp)){
						echo "
						<div class='jumlahdata' style='margin-right:10px;float:right;'>Jumlah Kelas Yang Telah Terdata Sebanyak : $r[jumlah_data]</div>";}
					echo "
                    </div>
                </div>                                
            </div>            
            <div class='dr'><span></span></div>            
        </div>
    </div>";    

break;
case "edit":
	$edit = mysql_query("SELECT * FROM tbl_kelas WHERE kd_kelas='$_GET[id]'");
    $r    = mysql_fetch_array($edit);
echo "<form method='post' action='modul/kelas/aksi_kelas.php?act=update' enctype='multipart/form-data'>";
echo "<div class='content'>
		<div class='workplace'>
            <div class='row-fluid'>
                <div class='span6'>
                  <div class='block-fluid'>                        
                     <div class='head clearfix'>
                     
                        <h1>Edit Data Kelas</h1>
                    </div>    
					<input type=hidden name=id value=$r[kd_kelas]>
					
					<div class='row-form clearfix'>
                            <div class='span3'>Jurusan</div>
                            <div class='span9'><input type='text' name='jurusan' value='$r[jurusan]'/></div>
                    </div>        
					
						
					 <div class='row-form clearfix'>
                            <div class='span3'>Tahun Akademik</div>
                            <div class='span9'><input type='text' name='thn_akademik' value='$r[thn_akademik]'/></div>
                    </div>
					
					 <div class='row-form clearfix'>
                            <div class='span3'>Dosen Wali</div>
                            <div class='span9'>
							<select name='nid' id='s2_1' style='width: 100%;'>";
								  $tampil=mysql_query("SELECT * FROM tbl_dosen ORDER BY namadsn");
								  if ($r[nid]==0){
									echo "<option value=0 selected>- Pilih Dosen -</option>";
								  }   
								  
                                  while($w=mysql_fetch_array($tampil)){
									if ($r[nid]==$w[nid]){
									  echo "<option value=$w[nid] selected>$w[namadsn]</option>";
									}
									else{
									  echo "<option value=$w[nid]>$w[namadsn]</option>";
									}
								  }                                 
                       echo"</select>
							</div>
                        </div>
					
					 <div class='row-form clearfix'>
                            <div class='span3'>Jenjang</div>
                            <div class='span9'><input type='text' name='jenjang' value='$r[jenjang]'/></div>
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
echo "<form method='post' action='modul/kelas/aksi_kelas.php?act=input' enctype='multipart/form-data'>";
echo "<div class='content'>
		<div class='workplace'>
            <div class='row-fluid'>
                <div class='span6'>
                  <div class='block-fluid'>                        
                     <div class='head clearfix'>
                       
                        <h1>Input Data Kelas</h1>
                    </div>    
                      <div class='row-form clearfix'>
							<div class='span3'>Kode Kelas</div>
                            <div class='span9'><input type='text' name='kd_kelas'/></div>
                        </div>
					
					 <div class='row-form clearfix'>
                            <div class='span3'>Jurusan</div>
                            <div class='span9'><input type='text' name='jurusan'/></div>
                    </div>
						
					 <div class='row-form clearfix'>
                            <div class='span3'>Tahun Akademik</div>
                            <div class='span9'><input type='text' name='thn_akademik'/></div>
                    </div>
					
					 <div class='row-form clearfix'>
                            <div class='span3'>Dosen Wali</div>
                            <div class='span9'>
							<select name='nid' id='s2_1' style='width: 100%;'>
								  <option value=0 selected>- Pilih Dosen -</option>";
										$tampil=mysql_query("SELECT * FROM tbl_dosen ORDER BY namadsn");
										while($r=mysql_fetch_array($tampil)){
										  echo "<option value=$r[nid]>&nbsp;&nbsp;$r[namadsn]</option>";
										}                               
                       echo"</select>
							</div>
                        </div>
					
					 <div class='row-form clearfix'>
                            <div class='span3'>Jenjang</div>
                            <div class='span9'><input type='text' name='jenjang'/></div>
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