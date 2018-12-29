<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/mahasiswa/aksi_mahasiswa.php";
switch($_GET[aksi]){
default:
echo "<div class='content'>
	   <div class='workplace'>
		<div class='dr'><span></span></div>
		  <p align='right'><a href='?p=datamahasiswa&aksi=tambah' role='button' class='btn'>Input Data Mahasiswa</a></p>
            <div class='row-fluid'>
                <div class='span12'>                    
                    <div class='head clearfix'>
                        <div class='isw-grid'></div>
                        <h1>Data Mahasiswa</h1>                               
                    </div>
                    <div class='block-fluid table-sorting clearfix'>
						<div class='cari'>Cari	: <input type='text' name='cari' style='height:20px; margin-top:10px;'></div>
                        <table cellpadding='0' cellspacing='0' width='100%' class='table' id='tSortable'>
                            <thead>
                                <tr>
                                    <th><input type='checkbox' name='checkbox'/></th>
									<th width='10%'>NIM</th>
                                    <th width='13%'>Nama Mahasiswa</th>
                                    <th width='13%'>Jenis Kelamin</th>
                                    <th width='15%'>Alamat</th>
									<th width='10%'>Kota</th>
									<th width='10%'>Tempat Lahir</th>
									<th width='10%'>Tanggal Lahir</th>
									<th width='5%'>Email</th>
									<th width='5%'>Kelas</th>
                                    <th width='25%'>Aksi</th>                                   
                                </tr>
                            </thead>
                            <tbody>";

							$tp=mysql_query('SELECT * FROM tbl_mahasiswa ORDER BY nim ASC');
							while($r=mysql_fetch_array($tp)){
							$jeniskelamin=$r[jeniskelamin];
							$alamat=$r[alamat];
							$kota=$r[kota];
							$tempatlahir=$r[tempatlahir];
							$tgllahir=$r[tgllahir];
							$email=$r[email];
							$kdkelas=$r[kd_kelas];
                             echo"<tr>
                                    <td><input type='checkbox' name='checkbox'/></td>
									<td>$r[nim]</td>
                                    <td>$r[namamhs]</td>
                                    <td>$r[jeniskelamin]</td>
                                    <td>$r[alamat]</td>
									<td>$r[kota]</td>
									<td>$r[tempatlahir]</td>
									<td>$r[tgllahir]</td>
									<td>$r[email]</td>
									<td>$r[kd_kelas]</td>
                                    <td><a href='?p=datamahasiswa&aksi=edit&id=$r[nim]'>EDIT</a>|
									    <a href='$aksi?act=hapus&id=$r[nim]'>HAPUS</td>
                                    
                                </tr>";
							}
                               
                                        
                        echo"</tbody>
                        </table>";
						$tp=mysql_query('SELECT count(nim) as jumlah_data FROM tbl_mahasiswa');
							while($r=mysql_fetch_array($tp)){
						echo "
						<div class='jumlahdata' style='margin-right:10px;float:right;'>Jumlah Mahasiswa Yang Telah Terdata Sebanyak : $r[jumlah_data]</div>";}
					echo "
                    </div>
                </div>                                
            </div>            
            <div class='dr'><span></span></div>            
        </div>
    </div>";    

break;
case "edit":
	$edit = mysql_query("SELECT * FROM tbl_mahasiswa WHERE nim='$_GET[id]'");
    $r    = mysql_fetch_array($edit);
	if ($r['jeniskelamin'] == "Pria")
{

    $option1 = "<input type=\"radio\" name=\"jeniskelamin\"
                value=\"Pria\" checked>";

    $option2 = "<input type=\"radio\" name=\"jeniskelamin\"
                value=\"Wanita\">";

}
// jika jenis kelamin wanita, maka radiobutton wanita
// dicek
else if ($r['jeniskelamin'] == "Wanita")

     {
        $option1 = "<input type=\"radio\" name=\"jeniskelamin\"

                    value=\"Pria\">";
        $option2 = "<input type=\"radio\" name=\"jeniskelamin\"

                    value=\"Wanita\" checked>";
     }
echo "<form method='post' action='modul/mahasiswa/aksi_mahasiswa.php?act=update' enctype='multipart/form-data'>";
echo "<div class='content'>
		<div class='workplace'>
            <div class='row-fluid'>
                <div class='span6'>
                  <div class='block-fluid'>                        
                     <div class='head clearfix'>
                     
                        <h1>Edit Data Mahasiswa</h1>
                    </div>    
					<input type=hidden name=id value=$r[nim]>
					
					<div class='row-form clearfix'>
                            <div class='span3'>Nama Mahasiswa</div>
                            <div class='span9'><input type='text' name='namamhs' value='$r[namamhs]'/></div>
                        </div>
						
					<div class='row-form clearfix'>
                            <div class='span3'>Jenis Kelamin</div>
                            <div class='span9'>".$option1." Pria 
							
							".$option2." Wanita 
							</div>
                    </div>
					
					 <div class='row-form clearfix'>
                            <div class='span3'>Alamat</div>
                            <div class='span9'><input type='text' name='alamat' value='$r[alamat]'/></div>
                    </div>
					
					 <div class='row-form clearfix'>
                            <div class='span3'>Kota</div>
                            <div class='span9'><input type='text' name='kota' value='$r[kota]'/></div>
                    </div>
							
					 <div class='row-form clearfix'>
                            <div class='span3'>Tempat Lahir</div>
                            <div class='span9'><input type='text' name='tempatlahir' value='$r[tempatlahir]'/></div>
                    </div> 

					<div class='row-form clearfix'>
                            <div class='span3'>Tanggal Lahir</div>
                            <div class='span9'><input type='text' name='tgllahir' value='$r[tgllahir]'/>
							<font style='font-style:italic;font-size:0.9em;'>Tahun-Bulan-Tanggal</font></div>
							
                    </div> 
					
					<div class='row-form clearfix'>
                            <div class='span3'>E-mail</div>
                            <div class='span9'><input type='text' name='email' value='$r[email]'/></div>
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
echo "<form method='post' action='modul/mahasiswa/aksi_mahasiswa.php?act=input' enctype='multipart/form-data'>";
echo "<div class='content'>
		<div class='workplace'>
            <div class='row-fluid'>
                <div class='span6'>
                  <div class='block-fluid'>                        
                     <div class='head clearfix'>
                       
                        <h1>Input Data mahasiswa</h1>
                    </div>    
                      <div class='row-form clearfix'>
							<div class='span3'>NIM</div>
                            <div class='span9'><input type='text' name='nim'/></div>
                        </div>
					
					<div class='row-form clearfix'>
                            <div class='span3'>Nama Mahasiswa</div>
                            <div class='span9'><input type='text' name='namamhs'/></div>
                        </div>
						
					 <div class='row-form clearfix'>
                            <div class='span3'>Jenis Kelamin</div>
                            <div class='span9'><input type='radio' name='jeniskelamin' value='Pria'/>Pria
							<input type='radio' name='jeniskelamin' value='Wanita'/>Wanita</div>
                    </div>
					
					 <div class='row-form clearfix'>
                            <div class='span3'>Alamat</div>
                            <div class='span9'><input type='text' name='alamat'/></div>
                    </div>
					
					 <div class='row-form clearfix'>
                            <div class='span3'>Kota</div>
                            <div class='span9'><input type='text' name='kota'/></div>
                    </div>
							
					 <div class='row-form clearfix'>
                            <div class='span3'>Tempat Lahir</div>
                            <div class='span9'><input type='text' name='tempatlahir'/></div>
                    </div> 

					<div class='row-form clearfix'>
                            <div class='span3'>Tanggal Lahir</div>
                            <div class='span9'><input type='text' name='tgllahir'/>
							<font style='font-style:italic;font-size:0.9em;'>Tahun-Bulan-Tanggal</font></div>
                    </div> 
					
					<div class='row-form clearfix'>
                            <div class='span3'>E-mail</div>
                            <div class='span9'><input type='text' name='email'/></div>
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