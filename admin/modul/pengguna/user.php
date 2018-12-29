<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['password'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/pengguna/aksi_user.php";
switch($_GET[aksi]){
default:
echo "<div class='content'>
	   <div class='workplace'>
		

<div class='dr'><span></span></div>
		  <p align='right'><a href='?p=datapengguna&aksi=tambah' role='button' class='btn'>Input Data Pengguna</a></p>
            <div class='row-fluid'>
                <div class='span12'>                    
                    <div class='head clearfix'>
                        <div class='isw-grid'></div>
                        <h1>Data Pengguna</h1>                               
                    </div>
                    <div class='block-fluid table-sorting clearfix'>
					<div class='cari'>Cari	: <input type='text' name='cari' style='height:20px; margin-top:10px;'></div>
                        <table cellpadding='0' cellspacing='0' width='100%' class='table' id='tSortable'>
                            <thead>
                                <tr>
                                    <th><input type='checkbox' name='checkbox'/></th>
									<th width='20%'>Username</th>
                                    <th width='25%'>Password</th>
                                    <th width='25%'>Level</th>
                                    
                                    <th width='25%'>Aksi</th>                                   
                                </tr>
                            </thead>
                            <tbody>";

							$tp=mysql_query('SELECT * FROM tbl_pengguna');
							while($r=mysql_fetch_array($tp)){
							$level=$r[level];
							
							
                             echo"<tr>
                                    <td><input type='checkbox' name='checkbox'/></td>
									<td>$r[username]</td>
                                    <td>$r[password]</td>
                                    <td>$level</td>

									
                                    <td><a href='?p=datapengguna&aksi=edit&id=$r[username]'>EDIT</a>|
									<a href='$aksi?act=hapus&id=$r[username]'>HAPUS</td>
                                    
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
	$edit = mysql_query("SELECT * FROM tbl_pengguna WHERE username='$_GET[id]'");
    $r    = mysql_fetch_array($edit);
echo "<form method='post' action='modul/pengguna/aksi_user.php?act=update' enctype='multipart/form-data'>";
echo "<div class='content'>
		<div class='workplace'>
            <div class='row-fluid'>
                <div class='span6'>
                  <div class='block-fluid'>                        
                     <div class='head clearfix'>
                       
                        <h1>Ubah Data Pengguna</h1>
                    </div>  
							<input type=hidden name=id value=$r[username]>
					<div class='row-form clearfix'>
                            <div class='span3'>Level</div>
                            <div class='span9'>
							<select name='level' id='s2_1' style='width: 100%;'>";
								  $tampil=mysql_query("SELECT * FROM tbl_pengguna ORDER BY level");
								  if ($r[level]==0){
									echo "<option value=0 selected>- Pilih Level -</option>";
								  }   
								  
                                  while($w=mysql_fetch_array($tampil)){
									if ($r[level]==$w[level]){
									  echo "<option value=$w[level] selected>$w[level]</option>";
									}
									else{
									  echo "<option value=$w[level]>$w[level]</option>";
									}
								  }                                 
                       echo"</select>
							</div>
                        </div>
						
					
					 <div class='row-form clearfix'>
                            <div class='span3'>Password</div>
                            <div class='span9'><input type='text' name='password' value='$r[password]'/></div>
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
echo "<form method='post' action='modul/pengguna/aksi_user.php?act=input' enctype='multipart/form-data'>";
echo "<div class='content'>
		<div class='workplace'>
            <div class='row-fluid'>
                <div class='span6'>
                  <div class='block-fluid'>                        
                     <div class='head clearfix'>
                       
                        <h1>Input Data Pengguna</h1>
                    </div>    
					
					<div class='row-form clearfix'>
                            <div class='span3'>Username</div>
                            <div class='span9'>
							<select name='username' id='s2_1' style='width: 100%;'>
								  <option value=0 selected>- Pilih NIP / NIM -</option>";
										$tampil=mysql_query("SELECT * FROM tbl_dosen");
										while($r=mysql_fetch_array($tampil)){
										  echo "<option value=$r[nid]>$r[nid]&nbsp;&nbsp;|&nbsp;&nbsp;$r[namadsn]</option>";
										}
										echo "<hr>";
										$tampilmhs=mysql_query("SELECT * FROM tbl_mahasiswa");
										while($r=mysql_fetch_array($tampilmhs)){
										  echo "<option value=$r[nim]>$r[nim]&nbsp;&nbsp;|&nbsp;&nbsp;$r[namamhs]</option>";
										}          										
                       echo"
					   </select>
							</div>
                        </div>
					
					<div class='row-form clearfix'>
                            <div class='span3'>Level</div>
                            <div class='span9'>
							<select name='level' id='s2_1' style='width: 100%;'>
								  <option value=0 selected>- Pilih Level -</option>
								  <option>Mahasiswa</option>
								  <option>Dosen</option>			
                       </select>
							</div>
                        </div>
					
					
					
                     
					
					
					
					 <div class='row-form clearfix'>
                            <div class='span3'>Password</div>
                            <div class='span9'><input type='text' name='password'/></div>
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