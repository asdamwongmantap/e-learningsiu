<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['password'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/dosen/aksi_dosen.php";
switch($_GET[aksi]){
default:
echo "<div class='content'>
	   <div class='workplace'>
		<div class='dr'><span></span></div>
		  <p align='right'><a href='?p=datadosen&aksi=tambah' role='button' class='btn'>Input Data dosen</a></p>
		  <p align='right'><a href='?p=datadosenmatakuliah' role='button' class='btn'>Lihat Data dosen MK</a></p>
            <div class='row-fluid'>
                <div class='span12'>                    
                    <div class='head clearfix'>
                        <div class='isw-grid'></div>
                        <h1>Data dosen</h1>                               
                    </div>
                    <div class='block-fluid table-sorting clearfix'>
					<div class='cari'>Cari	: <input type='text' name='cari' style='height:20px; margin-top:10px;'></div>
                        <table cellpadding='0' cellspacing='0' width='100%' class='table' id='tSortable'>
                            <thead>
                                <tr>
                                    <th><input type='checkbox' name='checkbox'/></th>
									<th width='10%'>NID</th>
                                    <th width='13%'>Nama dosen</th>
                                    <th width='13%'>Jenis Kelamin</th>
                                    <th width='15%'>Alamat</th>
									<th width='10%'>Kota</th>
									<th width='10%'>Tempat Lahir</th>
									<th width='10%'>Tanggal Lahir</th>
									<th width='5%'>Email</th>
                                    <th width='25%'>Aksi</th>                                   
                                </tr>
                            </thead>
                            <tbody>";

							$tp=mysql_query('SELECT * FROM tbl_dosen ORDER BY nid ASC');
							while($r=mysql_fetch_array($tp)){
							$jeniskelamin=$r[jeniskelamin];
							$alamat=$r[alamat];
							$kota=$r[kota];
							$tempatlahir=$r[tempatlahir];
							$tgllahir=$r[tgllahir];
							$email=$r[email];
                             echo"<tr>
                                    <td><input type='checkbox' name='checkbox'/></td>
									<td>$r[nid]</td>
                                    <td>$r[namadsn]</td>
                                    <td>$jeniskelamin</td>
                                    <td>$alamat</td>
									<td>$kota</td>
									<td>$tempatlahir</td>
									<td>$tgllahir</td>
									<td>$email</td>
                                    <td><a href='?p=datadosen&aksi=edit&id=$r[nid]'>EDIT</a>|
									    <a href='$aksi?act=hapus&id=$r[nid]'>HAPUS</td>
                                    
                                </tr>";
							}
                               
                                        
                        echo"</tbody>
                        </table>";
						$tp=mysql_query('SELECT count(nid) as jumlah_data FROM tbl_dosen');
							while($r=mysql_fetch_array($tp)){
						echo "
						<div class='jumlahdata' style='margin-right:10px;float:right;'>Jumlah Dosen Yang Telah Terdata Sebanyak : $r[jumlah_data]</div>";}
					echo "
                    </div>
                </div>                                
            </div>       

			
            <div class='dr'><span></span></div>            
        </div>
    </div>";    

break;
case "edit":
	$edit = mysql_query("SELECT * FROM tbl_dosen WHERE nid='$_GET[id]'");
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
echo "<form method='post' action='modul/dosen/aksi_dosen.php?act=update' enctype='multipart/form-data'>";
echo "<div class='content'>
		<div class='workplace'>
            <div class='row-fluid'>
                <div class='span6'>
                  <div class='block-fluid'>                        
                     <div class='head clearfix'>
                     
                        <h1>Edit Data dosen</h1>
                    </div>    
					<input type=hidden name=id value=$r[nid]>
					
					<div class='row-form clearfix'>
                            <div class='span3'>Nama dosen</div>
                            <div class='span9'><input type='text' name='namadsn' value='$r[namadsn]'/></div>
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
                            <div class='span9'><input type='date' name='tgllahir' value='$r[tgllahir]'/>
							<font style='font-style:italic;font-size:0.9em;'>Tahun-Bulan-Tanggal</font></div>
                    </div> 
					
					<div class='row-form clearfix'>
                            <div class='span3'>E-mail</div>
                            <div class='span9'><input type='text' name='email' value='$r[email]'/></div>
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
$ngajar=$_POST['ngajar'];
echo "<form name='tambahform' method='post' action='modul/dosen/aksi_dosen.php?act=input' enctype='multipart/form-data'>";
echo "<div class='content'>
		<div class='workplace'>
            <div class='row-fluid'>
                <div class='span6'>
                  <div class='block-fluid'>                        
                     <div class='head clearfix'>
                       
                        <h1>Input Data dosen</h1>
                    </div>    
                      <div class='row-form clearfix'>
							<div class='span3'>NID</div>
                            <div class='span9'><input type='text' name='nid'/></div>
                        </div>
					
					<div class='row-form clearfix'>
                            <div class='span3'>Nama dosen</div>
                            <div class='span9'><input type='text' name='namadsn'/></div>
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
                            <div class='span9'><input type='date' name='tgllahir'/>
							<font style='font-style:italic;font-size:0.9em;'>Tahun-Bulan-Tanggal</font></div>
                    </div> 
					
					<div class='row-form clearfix'>
                            <div class='span3'>E-mail</div>
                            <div class='span9'><input type='text' name='email'/></div>
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