<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/banksoal/aksi_soalpilihanganda.php";
switch($_GET[aksi]){
default:
echo "<div class='content'>
	   <div class='workplace'>
		<div class='dr'><span></span></div>
		  <p align='right'><a href='?p=soalpilihan&aksi=tambah' role='button' class='btn'>Input Soal</a></p>
            <div class='row-fluid'>
                <div class='span12'>                    
                    <div class='head clearfix'>
                        <div class='isw-grid'></div>
                        <h1>Data Soal</h1>                               
                    </div>
                    <div class='block-fluid table-sorting clearfix'>
						<div class='cari'>Cari	: <input type='text' name='cari' style='height:20px; margin-top:10px;'></div>
                        <table cellpadding='0' cellspacing='0' width='100%' class='table' id='tSortable'>
                            <thead>
                                <tr>
                                    <th><input type='checkbox' name='checkbox'/></th>
									<th width='7%'>ID Soal</th>
                                    <th width='13%'>Mata Kuliah</th>
                                    <th width='13%'>Soal</th>
                                    <th width='15%'>Pilihan A</th>
									<th width='10%'>Pilihan B</th>
									<th width='10%'>Pilihan C</th>
									<th width='10%'>Pilihan D</th>
									<th width='10%'>Kunci Jawaban</th>
                                    <th width='25%'>Aksi</th>                                   
                                </tr>
                            </thead>
                            <tbody>";

							$tp=mysql_query('SELECT tbl_banksoalpg.id_soal, tbl_banksoalpg.kd_mk, tbl_matakuliah.nma_mk, tbl_banksoalpg.soal, tbl_banksoalpg.pil_a, tbl_banksoalpg.pil_b, tbl_banksoalpg.pil_c, tbl_banksoalpg.pil_d, tbl_banksoalpg.kunci_jwb FROM tbl_banksoalpg, tbl_matakuliah where tbl_banksoalpg.kd_mk=tbl_matakuliah.kd_mk ORDER BY tbl_banksoalpg.id_soal ASC');
							while($r=mysql_fetch_array($tp)){
							$soal=$r[soal];
							$pil_a=$r[pil_a];
							$pil_b=$r[pil_b];
							$pil_c=$r[pil_c];
							$pil_d=$r[pil_d];
							$kunci_jwb=$r[kunci_jwb];
							
                             echo"<tr>
                                    <td><input type='checkbox' name='checkbox'/></td>
									<td>$r[id_soal]</td>
                                    <td>$r[nma_mk]</td>
                                    <td>$r[soal]</td>
                                    <td>$r[pil_a]</td>
									<td>$r[pil_b]</td>
									<td>$r[pil_c]</td>
									<td>$r[pil_d]</td>
									<td>$r[kunci_jwb]</td>
									
                                    <td><a href='?p=soalpilihan&aksi=edit&id=$r[id_soal]'>EDIT</a>|
									    <a href='$aksi?act=hapus&id=$r[id_soal]'>HAPUS</td>
                                    
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
	$edit = mysql_query("SELECT * FROM tbl_banksoalpg WHERE id_soal='$_GET[id]'");
    $r    = mysql_fetch_array($edit);
echo "<form method='post' action='modul/banksoal/aksi_soalpilihanganda.php?act=update' enctype='multipart/form-data'>";
echo "<div class='content'>
		<div class='workplace'>
            <div class='row-fluid'>
                <div class='span6'>
                  <div class='block-fluid'>                        
                     <div class='head clearfix'>
                     
                        <h1>Edit Soal</h1>
                    </div>    
					<input type=hidden name=id value=$r[id_soal]>
					
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
                            <div class='span3'>Soal</div>
                            <div class='span9'><textarea name='soal'/>$r[soal]</textarea></div>
                        </div>
					 
					 
					<div class='row-form clearfix'>
                            <div class='span3'>Jawaban A</div>
                            <div class='span9'><textarea name='pil_a'/>$r[pil_a]</textarea></div>
                        </div>
					
					<div class='row-form clearfix'>
                            <div class='span3'>Jawaban B</div>
                            <div class='span9'><textarea name='pil_b'/>$r[pil_b]</textarea></div>
                        </div>
							
					<div class='row-form clearfix'>
                            <div class='span3'>Jawaban C</div>
                            <div class='span9'><textarea name='pil_c'/>$r[pil_c]</textarea></div>
                        </div> 

					<div class='row-form clearfix'>
                            <div class='span3'>Jawaban D</div>
                            <div class='span9'><textarea name='pil_d'/>$r[pil_d]</textarea></div>
                        </div>
					
					<div class='row-form clearfix'>
                            <div class='span3'>Kunci Jawaban</div>
                            <div class='span9'><input type='text' name='kunci_jwb' value='$r[kunci_jwb]'/></div>
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
$nojawaban=mysql_query("select * from tbl_banksoalpg order by id_soal DESC LIMIT 0,1");
	$data=mysql_fetch_array($nojawaban);
	$kodeawal=substr($data['id_soal'],3,3)+1;
	if($kodeawal<10){
		$kode='PG00'.$kodeawal;
	}elseif($kodeawal > 9 && $kodeawal <=99){
		$kode='PG0'.$kodeawal;
	}else{
		$kode='PG'.$kodeawal;
	}
echo "<form method='post' action='modul/banksoal/aksi_soalpilihanganda.php?act=input' enctype='multipart/form-data'>";
echo "<div class='content'>
		<div class='workplace'>
            <div class='row-fluid'>
                <div class='span6'>
                  <div class='block-fluid'>                        
                     <div class='head clearfix'>
                       
                        <h1>Input Soal</h1>
                    </div>    
                      
                            <div class='span9'><input type='hidden'  value='$kode' name='id_soal'/></div>
                       
						
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
                            <div class='span3'>Soal</div>
                            <div class='span9'><textarea name='soal'></textarea></div>
                        </div>
						
					
					 <div class='row-form clearfix'>
                            <div class='span3'>Jawaban A</div>
                            <div class='span9'><textarea name='pil_a'></textarea></div>
                    </div>
					
					 <div class='row-form clearfix'>
                            <div class='span3'>Jawaban B</div>
                            <div class='span9'><textarea name='pil_b'></textarea></div>
                    </div>
							
					 <div class='row-form clearfix'>
                            <div class='span3'>Jawaban C</div>
                            <div class='span9'><textarea name='pil_c'></textarea></div>
                    </div> 

					<div class='row-form clearfix'>
                            <div class='span3'>Jawaban D</div>
                            <div class='span9'><textarea name='pil_d'></textarea></div>
                    </div> 
					
					<div class='row-form clearfix'>
                            <div class='span3'>Kunci Jawaban</div>
                            <div class='span9'><input type='text' name='kunci_jwb'/></div>
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