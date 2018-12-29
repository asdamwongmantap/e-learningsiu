<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['password'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksidosenmk="modul/dosen/aksi_dosenmk.php";
switch($_GET[aksidosenmk]){
default:
echo "<div class='content'>
	   <div class='workplace'>
		

<div class='dr'><span></span></div>
		  <p align='right'><a href='?p=datadosenmatakuliah&aksidosenmk=tambah' role='button' class='btn'>Input Data Dosen Mata Kuliah</a></p>
            <div class='row-fluid'>
                <div class='span12'>                    
                    <div class='head clearfix'>
                        <div class='isw-grid'></div>
                        <h1>Data dosen Mata Kuliah</h1>                               
                    </div>
                    <div class='block-fluid table-sorting clearfix'>
					<div class='cari'>Cari	: <input type='text' name='cari' style='height:20px; margin-top:10px;'></div>
                        <table cellpadding='0' cellspacing='0' width='100%' class='table' id='tSortable'>
                            <thead>
                                <tr>
                                    <th><input type='checkbox' name='checkbox'/></th>
									<th width='10%'>NID</th>
                                    <th width='25%'>Nama dosen</th>
                                    <th width='15%'>Mata Kuliah</th>
                                    <th width='10%'>Kelas</th>
									<th width='10%'>Tahun Ajaran</th>
                                    <th width='25%'>Aksi</th>                                   
                                </tr>
                            </thead>
                            <tbody>";

							$tp=mysql_query('SELECT tbl_dosenmk.nid, tbl_dosen.namadsn, tbl_matakuliah.kd_mk,tbl_matakuliah.nma_mk, tbl_dosenmk.kd_kelas, tbl_dosenmk.thn_ajaran FROM tbl_dosenmk, tbl_dosen, tbl_matakuliah, tbl_kelas where tbl_dosenmk.nid=tbl_dosen.nid AND tbl_dosenmk.kd_mk=tbl_matakuliah.kd_mk AND tbl_dosenmk.kd_kelas=tbl_kelas.kd_kelas');
							while($r=mysql_fetch_array($tp)){
							$nma_mk=$r[nma_mk];
							$kd_kelas=$r[kd_kelas];
							$thn_ajaran=$r[thn_ajaran];
							
                             echo"<tr>
                                    <td><input type='checkbox' name='checkbox'/></td>
									<td>$r[nid]</td>
                                    <td>$r[namadsn]</td>
                                    <td>$nma_mk</td>
                                    <td>$kd_kelas</td>
									<td>$thn_ajaran</td>
									
                                    <td><a href='$aksidosenmk?act=hapus&id=$r[nid]&mk=$r[kd_mk]&kelas=$r[kd_kelas]&thn=$r[thn_ajaran]'>HAPUS</td>
                                    
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
case "tambah":
echo "<form method='post' action='modul/dosen/aksi_dosenmk.php?act=input' enctype='multipart/form-data'>";
echo "<div class='content'>
		<div class='workplace'>
            <div class='row-fluid'>
                <div class='span6'>
                  <div class='block-fluid'>                        
                     <div class='head clearfix'>
                       
                        <h1>Input Data dosen Mata Kuliah</h1>
                    </div>    
					
                      <div class='row-form clearfix'>
                            <div class='span3'>Nama Dosen</div>
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
                            <div class='span3'>Mata Kuliah</div>
                            <div class='span9'>
							<select name='kd_mk' id='s2_1' style='width: 100%;'>
								  <option value=0 selected>- Pilih Mata Kuliah -</option>";
										$tampil=mysql_query("SELECT * FROM tbl_matakuliah ORDER BY nma_mk");
										while($r=mysql_fetch_array($tampil)){
										  echo "<option value=$r[kd_mk]>&nbsp;&nbsp;$r[nma_mk]</option>";
										}                               
                       echo"</select>
							</div>
                        </div>
						
					 <div class='row-form clearfix'>
                            <div class='span3'>Kelas</div>
                            <div class='span9'>
							<select name='kdkelas' id='s2_1' style='width: 100%;'>
								  <option value=0 selected>- Pilih Kelas -</option>";
										$tampil=mysql_query("SELECT * FROM tbl_kelas ORDER BY kd_kelas");
										while($r=mysql_fetch_array($tampil)){
										  echo "<option value=$r[kd_kelas]>&nbsp;&nbsp;$r[kd_kelas]</option>";
										}                               
                       echo"</select>
							</div>
                        </div>
					
					 <div class='row-form clearfix'>
                            <div class='span3'>Tahun Ajaran</div>
                            <div class='span9'><input type='text' name='thn_ajaran'/></div>
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